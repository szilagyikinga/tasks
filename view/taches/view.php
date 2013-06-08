<?php $title_for_layout = $tache->nom; ?>

<div class="hero-unit">
	<h2>
        <em><?php echo $tache->date_limite; ?></em><br/>
        <?php echo $tache->nom; ?>
    </h2>
	<p><?php echo $tache->contenu; ?></p>
</div>
<div class="text-info">
    <?php if($this->Session->isLogged()): ?>
        <form action="<?php echo Router::url('commentaires/add/'.$tache->id); ?>" method="post">
            <?php echo $this->Form->input('commentaire','Commentaire',array('type'=>'textarea','class'=>'input-xxlarge','rows'=>3)); ?>
            <div class="actions">
                <input type="submit" class="btn primary" value="Envoyer">
            </div>
        </form>
    <?php endif;?>
</div>
<?php foreach ($commentaires as $k => $v): ?>
  <div class="lead">
      <strong><?php echo "$v->utilisateur" ?></strong>
      <em><?php echo "$v->date_creation" ?></em><br/>
      <?php echo "$v->commentaire"; ?>
  </div>
<?php endforeach; ?>
<div class="pagination">
    <ul>
        <?php for($i=1; $i<=$page; $i++): ?>
            <li <?php if($i== $this->request->page) echo 'class="active"'?>><a href="?page=<?php echo $i?>"><?php echo $i ?></a></li>
        <?php endfor;?>
    </ul>
</div>
