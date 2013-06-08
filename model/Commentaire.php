<?php
class Commentaire extends Model{
    var $validate = array(
        'commentaire' => array(
            'rule' => 'notEmpty',
            'message' => 'Vous devez préciser un contenu'
        )
    );
}