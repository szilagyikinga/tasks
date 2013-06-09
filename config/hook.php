<?php
if ($this->request->prefix == 'admin') {
    if (!$this->Session->isLogged() || !$this->Session->isAdmin()) {
        $this->redirect('utilisateurs/login');
    } else {
        $this->layout = 'admin';
    }
}

if (Cookie::getCookie('auth') || !$this->Session->isLogged()) {
    $auth = Cookie::getCookie('auth');
    $auth = explode('-----', $auth);
    $this->loadModel('Utilisateur');
    $user = $this->Utilisateur->findFirst(array(
        'conditions' => array('login' => $auth[0]
        )));
    $key = sha1($user->login . $user->pwd . $_SERVER['REMOTE_ADDR']);
    if ($key == $auth[1]) {
        $this->Session->write('User', $user);
        Cookie::set('auth', $user->login, '-----', $key, 3);

    } else {
        Cookie::delete('auth');
    }

}
if ($this->Session->isLogged()) {
    $this->loadModel('Tache');
    $nbTache = $this->Tache->findCount(array(
        'responsable' => $this->Session->user('login'),
        'en_ligne' => 1,
        'attribution_acceptee' => 0
    ));
    if (!empty($nbTache)) $_SESSION['User']->Taches = $nbTache;
    else  unset($_SESSION['User']->Taches);
}