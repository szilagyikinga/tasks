<div class="page-header">
    <h1>S'inscrire</h1>
</div>
<form action="<?php echo Router::url('utilisateurs/register'); ?>" method="post">
    <?php echo $this->Form->input('login', 'Identifiant');?>
    <?php echo $this->Form->input('email', 'Email');?>
    <?php echo $this->Form->input('pwd', 'Mot de pase', array('type'=>'password')); ?>

    <div class="actions">
        <input type="submit" class="btn-primary" value="S'inscrire">
    </div>
</form>