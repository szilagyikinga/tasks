<div class="page-header">
    <h1>Zone réservé</h1>
</div>
<form action="<?php echo Router::url('utilisateurs/login'); ?>" method="post">
    <?php echo $this->Form->input('login', 'Identifiant');?>
    <?php echo $this->Form->input('pwd', 'Mot de pase', array('type'=>'password')); ?>
    <?php echo $this->Form->input('remember', 'Se souvenir de moi', array('type'=>'checkbox'));?>
    <div class="actions">
        <input type="submit" class="btn-primary" value="Se connecter">
    </div>
</form>


