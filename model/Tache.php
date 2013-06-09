<?php
class Tache extends Model
{
    var $validate = array(
        'nom' => array(
            'rule' => 'notEmpty',
            'message' => 'Vous devez préciser un titre'
        ),
        'contenu' => array(
            'rule' => 'notEmpty',
            'message' => 'Vous devez préciser un contenu'
        ),
        'date_lancement' => array(
            'rule' => 'date',
            'message' => "Vous devez saisir une date valide sous format AAAA-MM-JJ"
        ),
        'date_limite' => array(
            'rule' => 'date',
            'message' => "Vous devez saisir une date valide sous format AAAA-MM-JJ"
        )
    );

}
