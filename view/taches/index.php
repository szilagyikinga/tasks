<div class="page-header" xmlns="http://www.w3.org/1999/html">
    <h2>Les tâches en cours</h2>
</div>
<table class="table table-striped">
    <thead>
    <tr>
        <th>Début</th>
        <th>Fin</th>
        <th>Nom</th>
        <th>Responsable</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($taches as $k => $v): ?>
        <tr>
            <td><?php echo $v->date_lancement; ?></td>
            <td><?php echo $v->date_limite; ?></td>
            <td><?php echo $v->nom; ?></td>
            <?php if ($v->attribution_acceptee == 1) : ?>
                <td><?php echo $v->responsable; ?></td>
            <?php else : ?>
                <td></td>
            <?php endif; ?>
            <td><a href="<?php echo BASE_URL . '/taches/view/' . $v->id; ?>">Voir les détails </a></td>
        </tr>
    <?php endforeach; ?>

    </tbody>
</table>


<div class="pagination">
    <ul>
        <?php for ($i = 1; $i <= $page; $i++): ?>
            <li <?php if ($i == $this->request->page) echo 'class="active"' ?>><a
                    href="?page=<?php echo $i ?>"><?php echo $i ?></a></li>
        <?php endfor; ?>
    </ul>
</div>
