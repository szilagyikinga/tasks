<?php
if($this->request->prefix == 'admin'){
    if(!$this->Session->isLogged() || !$this->Session->isAdmin()){
        $this->redirect('utilisateurs/login');
    }else{
        $this->layout = 'admin';
    }
}

if(Cookie::getCookie('auth')||!$this->Session->isLogged()){
    $auth = Cookie::getCookie('auth');
    $auth = explode('-----', $auth);
    $this->loadModel('Utilisateur');
    $user = $this->Utilisateur->findFirst(array(
        'conditions' => array('id' => $auth[0]
        )));
    $key = sha1($user->login.$user->pwd.$_SERVER['REMOTE_ADDR']);
    if($key==$auth[1]){
        $this->Session->write('User',$user);
        Cookie::set('auth', $user->id, '-----', $key, 3);

    }else{
        Cookie::delete('auth');
    }

}