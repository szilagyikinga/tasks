<div class="page-header">
    <h2>Liste des tâches</h2>
</div>
<table class="table">
    <thead>
    <tr>
        <th>En ligne ?</th>
        <th>Début</th>
        <th>Fin</th>
        <th>Nom</th>
        <th>Responsable</th>
        <th>Acceptée ?</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($taches as $k => $v): ?>
        <tr>
            <td><span
                    class="label label-<?php echo ($v->en_ligne == 1) ? 'success' : 'warning'; ?>"><?php echo ($v->en_ligne == 1) ? 'En ligne' : 'Hors ligne'; ?></span
            </td>
            <td><?php echo $v->date_lancement; ?></td>
            <td><?php echo $v->date_limite; ?></td>
            <td><?php echo $v->nom; ?></td>
            <td><?php echo $v->responsable; ?></td>
            <?php if ($v->responsable): ?>
                <td><span
                        class="label label-<?php echo ($v->attribution_acceptee == 1) ? 'success' : 'warning'; ?>"><?php echo ($v->attribution_acceptee == 1) ? 'Oui' : 'Non'; ?></span
                </td>
            <?php else: ?>
                <td></td>
            <?php endif; ?>
            <td>
                <a href="<?php echo Router::url('admin/taches/edit/' . $v->id); ?>">Editer</a>
                <a onclick="return confirm('Voulez vous vraiment supprimer ce contenu ? ')"
                   href="<?php echo Router::url('admin/taches/delete/' . $v->id); ?>">Supprimer</a></td>
            </td>

        </tr>
    <?php endforeach; ?>

    </tbody>
</table>

<a href="<?php echo Router::url('admin/taches/edit'); ?>" class="primary btn">Ajouter une tâche</a>