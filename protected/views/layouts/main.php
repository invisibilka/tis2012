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

    <link rel="shortcut icon" href="<?php echo Yii::app()->baseUrl.'/images/favicon3.ico'; ?>" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
</head>

<body>

	<div id="<?php if (!Yii::app()->user->isGuest) echo "header-user"; else echo"header"; ?>">

    	<div id="header-content">
			<h1><?php echo CHtml::encode(Yii::app()->name); ?><span></span></h1>

            <?php
				if (!Yii::app()->user->isGuest) {
				?>
                <div id="logout"><a href="<?php echo Yii::app()->request->baseUrl; ?>/user/logout"><span class="underline">Odhlásiť sa</span> [ <span class="name"><?php echo Yii::app()->user->name; ?></span> ]</a></div>
                <?php
				}
			?>
            
            </div>

        	<?php
				if (!Yii::app()->user->isGuest) {
			?>
        <div id="navigation-div">    
        <ul id="navigation">
        	<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/task"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/design/icon-task.png" alt="Ikonka - Správa úloh" /><br />Správa úloh</a></li>
            <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/test"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/design/icon-test.png" alt="Ikonka - Správa písomiek" /><br />Správa písomiek</a></li>
            <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/studentList"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/design/icon-student-list.png" alt="Ikonka - Správa skupín" /><br />Správa skupín</a></li>
            <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/user"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/design/icon-user.png" alt="Ikonka - Upraviť profil" /><br />Upraviť profil</a></li>
            <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/user/invite"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/design/icon-invite.png" alt="Ikonka - Odoslať pozvánku" /><br />Odoslať pozvánku</a></li>
		</ul>
        </div>

        <?php
			}?>

		
	</div>

	<div id="full">
    
    	<span id="horizontal-line"></span>

    <div id="main">
    
    <div id="panel">
    	<?php if (!Yii::app()->user->isGuest && $this->showSubmenu) {
			$this->renderPartial("subnavigation", array());
		}
		
		if (Yii::app()->user->isGuest) {
			echo "<p>Gumkáčik predstavuje nový systém pre učiteľa. Umožňuje vytvárať a spracovávať zadania úloh. Podporuje tvorbu písomiek z vytvorených úloh a ich následné exportovanie do PDF. Písomky je možné odoslať emailom študentom.</p><p>Funkcie sú prístupné len učiteľom, ktorí majú oprávnenie na vstup do systému.</p>";
		} else {
			echo $this->functionSubmenu;
		} ?>
    </div>

	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
            'homeLink' => CHtml::link('Domov', Yii::app()->baseUrl),
		)); ?><!-- breadcrumbs -->
	<?php endif?>
	<?php echo $content; ?>
    
    	<div class="clearfix"></div>
    
    </div>
    
    </div>

	<div id="footer" class="clear">
		Copyright &copy; <?php echo date('Y'); ?> by Tím Gumkáčik.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

    <?php /*
	<script type="text/javascript">
        $('.subnavigation').find('li:eq(<?php echo $this->submenuIndex; ?>) a').addClass('selected');
    </script> */ ?>
</body>
</html>