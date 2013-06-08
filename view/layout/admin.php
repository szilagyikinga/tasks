<!DOCTYPE html>
<html lang="fr">
<head>
    <title><?php echo isset($title_for_layout)?$title_for_layout:'Administration'; ?></title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href ="<?php echo Router::url('bootstrap/css/bootstrap.css');?>" rel="stylesheet" media="screen">
</head>
<body>

<div class="topbar" style="position:static">
    <div class="topbar-inner">
        <div class="container">
            <h3><a href="<?php echo Router::url('admin/taches/index'); ?>">Administration</a></h3>
            <ul class="nav nav-tabs">
                <li><a href="<?php echo Router::url('admin/taches/index'); ?>">Tâches</a> </li>
                <li><a href="<?php echo Router::url('taches'); ?>">Voir le site</a> </li>
                <li><a href="<?php echo Router::url('utilisateurs/logout'); ?>">Se déconnecter</a> </li>
            </ul>
        </div>
    </div>
</div>

<div class="container" style="padding-top:60px;">
    <?php echo $this->Session->flash(); ?>
    <?php echo $content_for_layout; ?>
</div>
<script src="bootstrap/js/jquery-1.9.1.js"></script>
<!-- Intégration de la libraire de composants du Bootstrap -->
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>