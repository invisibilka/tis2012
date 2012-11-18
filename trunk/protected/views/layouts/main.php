<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

    <link rel="shortcut icon" href="<?php echo Yii::app()->baseUrl.'/images/favicon.ico'; ?>" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

	<div id="<?php if (!Yii::app()->user->isGuest) echo "header-user"; else echo"header"; ?>">
		<h1><?php echo CHtml::encode(Yii::app()->name); ?></h1>
        
        <?php 
			if (!Yii::app()->user->isGuest) { 
		?>
        <ul id="navigation">
        	<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/task"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/design/icon-task.png" alt="Ikonka - Správa úloh" /><br />Správa úloh</a></li>
            <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/test"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/design/icon-test.png" alt="Ikonka - Správa písomiek" /><br />Správa písomiek</a></li>
            <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/studentList"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/design/icon-student-list.png" alt="Ikonka - Správa skupín" /><br />Správa skupín</a></li>
            <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/user"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/design/icon-user.png" alt="Ikonka - Upraviť profil" /><br />Upraviť profil</a></li>
            <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/user/invite"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/design/icon-invite.png" alt="Ikonka - Odoslať pozvánku" /><br />Odoslať pozvánku</a></li>
		</ul>
		<?php
			} ?>

	</div>
    
    <div id="main">
    
    <?php if (!Yii::app()->user->isGuest && $this->showSubmenu) { $this->renderPartial("subnavigation", array()); } ?>
    
    <?php 
	if (!Yii::app()->user->isGuest) {
		?><a href="<?php echo Yii::app()->request->baseUrl; ?>/user/logout">Odhlásiť sa (<?php echo Yii::app()->user->name; ?>)</a><?php
	}
	?>

	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
            'homeLink' => CHtml::link('Domov', Yii::app()->baseUrl),
		)); ?><!-- breadcrumbs -->
	<?php endif?>
    <div id="content">
	<?php echo $content; ?>
    </div>
    </div>

	<div id="footer" class="clear">
		Copyright &copy; <?php echo date('Y'); ?> by Tým Gumkáčik.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</body>
</html>