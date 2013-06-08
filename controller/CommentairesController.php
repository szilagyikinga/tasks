<?php
class CommentairesController extends Controller{
    function add($id){
        if(!$this->Session->isLogged()){
            $this->Session->setFlash('Vous devez être connecté pour ajouter un commentaire', 'erreur');
            $this->redirect("taches/view/$id");
        }
        else{
            if($this->request->data){
                $this->loadModel('Commentaire');
                if($this->Commentaire->validates($this->request->data)){
                    $this->request->data->date_creation = date('Y-m-d h:i:s');
                    $this->request->data->id_tache = $id;
                    $this->request->data->id_utilisateur= $this->Session->user('id');
                    $this->Commentaire->save($this->request->data);
                    $this->Session->setFlash('Votre commentaire à bien été sauvegardé');
                }else{
                    $this->Session->setFlash('Vous devez soumettre un commentaire', 'erreur');
                }
            }
            $this->redirect("taches/view/$id");
        }
    }

}