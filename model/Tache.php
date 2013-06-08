<?php
class Tache extends Model{
    var $validate = array(
        'nom' => array(
            'rule' => 'notEmpty',
            'message' => 'Vous devez préciser un titre'
        ),
        'contenu' => array(
            'rule' => 'notEmpty',
            'message' => 'Vous devez préciser un contenu'
        ),
        'slug' => array(
            'rule' => '([a-z0-9\-]+)',
            'message' => "L'url n'est pas valide"
        ),
        'date_limite' => array(
            'rule' => 'date',
            'message' =>"Vous devez saisir une date valide sous format AAAA-MM-JJ"
        )
    );
	
}
