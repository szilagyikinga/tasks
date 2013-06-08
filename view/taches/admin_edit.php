<div class="page-header">
    <h1>Editer une tâche</h1>
</div>

<form action="<?php echo Router::url('admin/taches/edit/'.$id); ?>" method="post">
    <?php echo $this->Form->input('en_ligne','En ligne',array('type'=>'checkbox')); ?>
    <?php echo $this->Form->input('nom', 'Nom'); ?>
    <?php echo $this->Form->input('slug','Url'); ?>
    <?php echo $this->Form->input('id','hidden'); ?>
    <?php echo $this->Form->input('contenu','Contenu',array('type'=>'textarea','class'=>'input-xxlarge','rows'=>3)); ?>
    <?php echo $this->Form->input('date_limite','Date limite',array('type'=>'date')); ?>
    <?php echo $this->Form->input('login', 'Responsable', array('type'=>'select')); ?>

    <div class="actions">
        <input type="submit" class="btn primary" value="Envoyer">
    </div>
</form>

