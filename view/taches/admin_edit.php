<div class="page-header">
    <h2>Editer une tâche</h2>
</div>

<form action="<?php echo Router::url('admin/taches/edit/' . $id); ?>" method="post">
    <?php echo $this->Form->input('en_ligne', 'En ligne', array('type' => 'checkbox')); ?>
    <?php echo $this->Form->input('nom', 'Nom'); ?>
    <?php echo $this->Form->input('id', 'hidden'); ?>
    <?php echo $this->Form->input('contenu', 'Desciption', array('type' => 'textarea', 'class' => 'input-xxlarge', 'rows' => 3)); ?>
    <?php echo $this->Form->input('date_lancement', 'Début', array('type' => 'date')); ?>
    <?php echo $this->Form->input('date_limite', 'Fin', array('type' => 'date')); ?>
    <?php echo $this->Form->input('responsable', 'Responsable', array('options' => $utilisateurs), 'non attribuée'); ?>

    <div class="actions">
        <input type="submit" class="btn primary" value="Envoyer">
    </div>
</form>

