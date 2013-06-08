<?php
class Utilisateur extends Model{

    var $validate = array(
        'login' => array(
            'rule' => 'notEmpty',
            'message' => 'Vous devez préciser un login'
        ),
        'pwd' => array(
            'rule' => 'notEmpty',
            'message' => 'Vous devez préciser votre mot de passe'
        ),
        'email' => array(
            'rule' => 'email',
            'message' => "Merci d'entrer un email valide"
        )
    );

}