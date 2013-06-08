<?php
class TachesController extends Controller{

	public function view($id){
        $this->loadModel('Tache');
        $this->loadModel('Commentaire');
		$t['tache'] = $this->Tache->findFirst(array(
			'conditions'=>array('id'=>$id, 'en_ligne'=>1)
		));
        if(empty($t['tache'])){
            $this->e404('Page introuvable');
        }
        $perPage = 20;
        $t['commentaires'] = $this->Commentaire->find(array(
            'conditions'=>array('id_tache'=>$id),
            'limit' => ($perPage*($this->request->page-1)).','.$perPage,
            'order desc' =>'id'
        ));
        $t['total'] = $this->Commentaire->findCount(array('id_tache'=>$id));
        $t['page'] = ceil($t['total'] / $perPage);
        $this->set($t);

	}

    public function index(){
        $perPage = 10;
        $conditions = array('en_ligne' => 1);
        $this->loadModel('Tache');
        $t['taches'] = $this->Tache->find(array(
            'conditions' => $conditions,
            'limit' => ($perPage*($this->request->page-1)).','.$perPage,
            'order' =>'date_limite'
        ));
        $t['total'] = $this->Tache->findCount($conditions);
        $t['page'] = ceil($t['total'] / $perPage);
        $this->set($t);
    }

    public function admin_index(){
        $perPage = 10;
        $this->loadModel('Tache');
        $t['taches'] = $this->Tache->find(array(
            'limit' => ($perPage*($this->request->page-1)).','.$perPage,
            'order' =>'date_limite'
        ));
        $t['total'] = $this->Tache->findCount();
        $t['page'] = ceil($t['total'] / $perPage);
        $this->set($t);
    }

    public function admin_delete($id){
        $this->loadModel('Tache');
       $this->Tache->delete($id);
        $this->Session->setFlash('La tâche a bien été supprimée');
        $this->redirect('admin/taches/index');
    }

    public function admin_edit($id=null){
        $this->loadModel('Tache');
        $t['id']='';
        if($this->request->data){
            if($this->Tache->validates($this->request->data)){
                $this->Tache->save($this->request->data);
                $this->Session->setFlash('Le contenu a bien été modifié');
                $this->redirect('admin/taches/index');

            }else{
                $this->Session->setFlash('Merci de corriger vos informations', 'error');
            }
        }elseif($id){
            $this->request->data =$this->Tache->findFirst(array(
                'conditions' => array('id'=>$id)
            ));
            $t['id']=$id;
        }
        $this->loadModel('Utilisateur');
        $utilisateurs = array();
        $users = $this->Utilisateur->find(array('fields' =>'login'));
        foreach($users as $v){
            $utilisateurs[] = $v->login;
        }
        $t['utilisateurs'] = $utilisateurs;
        $this->set($t);

    }

}
