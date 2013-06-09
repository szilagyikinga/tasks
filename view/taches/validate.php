<div class="page-header" xmlns="http://www.w3.org/1999/html">
    <h2>Vos nouvelles tâches</h2>
</div>
<table class="table table-striped">
    <thead>
    <tr>
        <th>Date de lancement</th>
        <th>Date de limite</th>
        <th>Nom</th>
        <th></th>
        <th></th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($taches as $k => $v): ?>
        <tr>
            <td><?php echo $v->date_lancement; ?></td>
            <td><?php echo $v->date_limite; ?></td>
            <td><?php echo $v->nom; ?></td>
            <td>
                <button class="btn btn-mini btn-success"
                        onclick="window.location.href='<?php echo Router::url('taches/accept/' . $v->id); ?>'">Accepter
                </button>
            </td>
            <td>
                <button class="btn btn-mini btn-danger"
                        onclick="window.location.href='<?php echo Router::url('taches/reject/' . $v->id); ?>'">Rejeter
                </button>
            </td>
            <td><a href="<?php echo BASE_URL . '/taches/view/' . $v->id; ?>">Voir les détails </a></td>
        </tr>
    <?php endforeach; ?>

    </tbody>
</table>