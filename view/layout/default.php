<!DOCTYPE html>
<html lang="fr">
<head>
	<title><?php echo isset($title_for_layout)?$title_for_layout:'Gestion des tâches'; ?></title>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href ="<?php echo(URL_ROOT . DS . 'bootstrap/css/bootstrap.css');?>" rel="stylesheet" media="screen">
</head>
<body>      
       
        <div class="topbar">
          <div class="topbar-inner">
            <div class="container">
              <h3><a href="<?php echo Router::url('taches'); ?>">Gestion des tâches</a></h3>
                <ul class="nav nav-tabs">
                    <?php if($this->Session->isAdmin()):?>
                        <li><a href="<?php echo Router::url('admin/taches/index'); ?>">Administration</a> </li>
                    <?php endif;?>
                    <?php if($this->Session->isLogged()):?>
                        <li><a href="<?php echo Router::url('utilisateurs/logout'); ?>">Se déconnecter</a> </li>
                    <?php else: ?>
                        <li><a href="<?php echo Router::url('utilisateurs/login'); ?>">Se connecter</a> </li>
                        <li><a href="<?php echo Router::url('utilisateurs/register'); ?>">Créer un compte</a> </li>
                    <?php endif;?>
                </ul>
            </div>
          </div>
        </div>
  
        <div class="container" style="padding-top:60px;">
            <?php echo $this->Session->flash(); ?>
            <?php echo $content_for_layout; ?>
        </div> 
    	<script src="bootstrap/js/jquery-1.9.1.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
