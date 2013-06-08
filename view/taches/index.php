<div class="page-header" xmlns="http://www.w3.org/1999/html">
    <h1>Les tâches</h1>
</div>
    <?php foreach ($taches as $k => $v): ?>

        <h2>
            <em><?php echo $v->date_limite; ?></em><br/>
            <?php echo $v->nom; ?>
        </h2>
        <?php echo $v->contenu; ?>
        <p><a href="<?php echo BASE_URL.'/taches/view/'.$v->id;?>">Voir les détails </a> </p>
<?php endforeach; ?>
<div class="pagination">
    <ul>
        <?php for($i=1; $i<=$page; $i++): ?>
        <li <?php if($i== $this->request->page) echo 'class="active"'?>><a href="?page=<?php echo $i?>"><?php echo $i ?></a></li>
        <?php endfor;?>
    </ul>
</div>
