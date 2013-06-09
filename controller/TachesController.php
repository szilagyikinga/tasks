<?php
class TachesController extends Controller
{

    public function view($id)
    {
        $this->loadModel('Tache');
        $this->loadModel('Commentaire');
        $t['tache'] = $this->Tache->findFirst(array(
            'conditions' => array('id' => $id, 'en_ligne' => 1)
        ));
        if (empty($t['tache'])) {
            $this->e404('Page introuvable');
        }
        $perPage = 20;
        $t['commentaires'] = $this->Commentaire->find(array(
            'conditions' => array('id_tache' => $id),
            'limit' => ($perPage * ($this->request->page - 1)) . ',' . $perPage,
            'order desc' => 'id'
        ));
        if(empty($t['commentaires'])) unset($t['commentaires']);
        $t['total'] = $this->Commentaire->findCount(array('id_tache' => $id));
        $t['page'] = ceil($t['total'] / $perPage);
        $this->set($t);

    }

    public function index()
    {
        $perPage = 10;
        $conditions = array('en_ligne' => 1);
        $this->loadModel('Tache');
        $t['taches'] = $this->Tache->find(array(
            'conditions' => $conditions,
            'limit' => ($perPage * ($this->request->page - 1)) . ',' . $perPage,
            'order' => 'date_limite'
        ));
        $t['total'] = $this->Tache->findCount($conditions);
        $t['page'] = ceil($t['total'] / $perPage);
        $this->set($t);
    }

    public function validate()
    {
        if (!$this->Session->isLogged()) {
            $this->redirect('taches');
        }
        $this->loadModel('Tache');
        $t['taches'] = $this->Tache->find(array(
            'conditions' => array(
                'en_ligne' => 1,
                'responsable' => $this->Session->user('login'),
                'attribution_acceptee' => 0
            )));
        if (empty($t['taches'])) {
            $this->redirect('taches');
        } else {
            $this->set($t);
        }
    }

    public function accept($id)
    {
        $this->loadModel('Tache');
        $tache = $this->Tache->findFirst(array(
            'conditions' => array(
                'id' => $id,
                'en_ligne' => 1,
                'responsable' => $this->Session->user('login'),
                'attribution_acceptee' => 0
            )));
        if (!empty($tache)) {
            $tache->attribution_acceptee = 1;
            $this->Tache->save($tache);
        }
        $this->redirect('taches/validate');
    }

    public function reject($id)
    {
        $this->loadModel('Tache');
        $tache = $this->Tache->findFirst(array(
            'conditions' => array(
                'id' => $id,
                'en_ligne' => 1,
                'responsable' => $this->Session->user('login'),
                'attribution_acceptee' => 0
            )));
        if (!empty($tache)) {
            $tache->responsable = null;
            $this->Tache->save($tache);
        }
        $this->redirect('taches/validate');
    }

    public function admin_index()
    {
        $this->loadModel('Tache');
        $t['taches'] = $this->Tache->find(array(
            'order' => 'date_lancement'
        ));
        $this->set($t);
    }

    public function admin_delete($id)
    {
        $this->loadModel('Tache');
        $this->Tache->delete($id);
        $this->Session->setFlash('La tâche a bien été supprimée');
        $this->redirect('admin/taches/index');
    }

    public function admin_edit($id = null)
    {
        $this->loadModel('Tache');
        $t['id'] = '';
        if ($this->request->data) {
            if ($this->Tache->validates($this->request->data)) {
                if ($this->request->data->responsable === "") {
                    $this->request->data->responsable = null;
                    $this->request->data->attribution_acceptee = 0;
                }
                if (isset($this->request->data->id)) {
                    $tache = $this->Tache->findFirst(array(
                        'conditions' => array(
                            'id' => $this->request->data->id
                        )));
                    if ($tache->responsable !== $this->request->data->responsable) {
                        $this->request->data->attribution_acceptee = 0;
                    }
                }
                $this->Tache->save($this->request->data);
                $this->Session->setFlash('Le contenu a bien été modifié');
                $this->redirect('admin/taches/index');

            } else {
                $this->Session->setFlash('Merci de corriger vos informations', 'error');
            }
        } elseif ($id) {
            $this->request->data = $this->Tache->findFirst(array(
                'conditions' => array('id' => $id)
            ));
            $t['id'] = $id;
        }
        $this->loadModel('Utilisateur');
        $utilisateurs = array();
        $users = $this->Utilisateur->find(array('fields' => 'login'));
        $utilisateurs[] = "";
        foreach ($users as $v) {
            $utilisateurs[] = $v->login;
        }
        $t['utilisateurs'] = $utilisateurs;
        $this->set($t);

    }

}
