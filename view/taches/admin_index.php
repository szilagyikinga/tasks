<div class="page-header">
    <h1><?php echo $total; ?> Tâches</h1>
</div>
<table class="table">
    <thead>
    <tr>
        <th>Id</th>
        <th>En ligne ?</th>
        <th>Date limite</th>
        <th>Nom</th>
        <th>Responsable</th>
        <th>Attribution acceptée</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
        <?php foreach($taches as $k=>$v):?>
            <tr>
                <td><?php echo $v->id;?></td>
                <td><span class="label label-<?php echo ($v->en_ligne==1)?'success':'warning'; ?>"><?php echo ($v->en_ligne==1)?'En ligne':'Hors ligne'; ?></span</td>
                <td><?php echo $v->date_limite;?></td>
                <td><?php echo $v->nom;?></td>
                <td><?php echo $v->login;?></td>
                <td><span class="label label-<?php echo ($v->attribution_validee==1)?'success':'warning'; ?>"><?php echo ($v->attribution_validee==1)?'Oui':'Non'; ?></span</td>
                <td>
                    <a href="<?php echo Router::url('admin/taches/edit/'.$v->id); ?>">Editer</a>
                    <a onclick="return confirm('Voulez vous vraiment supprimer ce contenu ? ')" href="<?php echo Router::url('admin/taches/delete/'.$v->id); ?>">Supprimer</a> </td>
                </td>

            </tr>
        <?php endforeach;?>

    </tbody>
</table>

<a href="<?php echo Router::url('admin/taches/edit'); ?>" class="primary btn">Ajouter une tâche</a>