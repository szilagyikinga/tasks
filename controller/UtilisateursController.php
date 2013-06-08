<?php
class UtilisateursController extends Controller{

    function login(){
            if($this->request->data){
                $data = $this->request->data;
                $this->loadModel('Utilisateur');
                if($this->Utilisateur->validates($data)){
                    $data->pwd = sha1($data->pwd);
                    $user = $this->Utilisateur->findFirst(array(
                        'conditions' => array('login' => $data->login,'pwd' => $data->pwd
                        )));
                    if(!empty($user)){
                        if($user->actif==1){
                            $this->Session->write('User',$user);
                            if($data->remember==1){
                                Cookie::set('auth', $user->login, '-----', sha1($user->login.$user->pwd.$_SERVER['REMOTE_ADDR']), 3);
                            }

                        }else{
                            $this->Session->setFlash("Votre compte n'est pas actif, merci de vérifier votre boîte mail", 'error');
                            $this->request->data->pwd = '';
                        }
                    }
                }else{
                    $this->Session->setFlash('Merci de corriger vos informations', 'error');
                }
                $this->request->data->pwd = '';
            }
            if($this->Session->isLogged()){
               if($this->Session->user('role') == 'admin'){
                    $this->redirect('cockpit/taches');
               }else{
                    $this->redirect('taches');
               }
            }
    }

    function register(){
        if($this->request->data){
            $this->loadModel('Utilisateur');
            if($this->Utilisateur->validates($this->request->data)){
                //on vérifie l'existance de l'adresse email et de l'identifiant dans la base
                $email = $this->Utilisateur->findFirst(array(
                    'conditions' => array('email' => $this->request->data->email
                    )));
                $login = $this->Utilisateur->findFirst(array(
                    'conditions' => array('login' => $this->request->data->login
                    )));
                if(empty($email) && empty($login)){
                    $this->request->data->pwd = sha1($this->request->data->pwd);
                    $this->request->data->token = sha1(uniqid(rand()));
                    $this->Utilisateur->save($this->request->data);
                    $lien ='<a href="' . Router::url('utilisateurs/activate?token=') .
                        $this->request->data->token.'&email='.$this->request->data->email.'">Activation du compte</a>';

                    $this->Session->setFlash('Votre compte à bien été créé. Lien d\'activation : '.$lien);
                }else{
                    $this->Session->setFlash('Il existe déjà un compte avec l\'identifiant et/ou l\'adresse email', 'error');
                }
                $this->request->data->pwd = '';
            }else{
                $this->Session->setFlash('Merci de corriger vos informations', 'error');
            }


        }

    }

    function activate(){
        if(!empty($_GET)){
            $this->loadModel('Utilisateur');
            $user = $this->Utilisateur->findFirst(array(
                'conditions' => array('email' => $_GET['email'],'token' =>$_GET['token']
                )));
            if(!empty($user)){
               if($user->actif==0){
                   $user->actif=1;
                   $this->Utilisateur->save($user);
                   $this->Session->setFlash('Votre compte a bien été activé');
                   $this->Session->write('User',$user);
               }else{
                   $this->Session->setFlash('Votre compte est déjà actif', 'error');
               }
            }else{
                $this->Session->setFlash('Merci de vérifier votre email de activation de compte', 'error');
            }
        }else{
            $this->Session->setFlash('Merci de vérifier votre email de activation de compte', 'error');
        }
    }

    function logout(){
        unset($_SESSION['User']);
        Cookie::delete('auth');
        $this->Session->setFlash('Vous êtes mainenant déconnecté');
        $this->redirect('taches');
    }

}