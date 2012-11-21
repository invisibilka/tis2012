<?php
/**
 *@author Milos Blascak
 */
/*
$this->breadcrumbs=array(
    'Študenti',
    $model->name,
);*/
$this->pageTitle = $model->name;
echo '<h2>' . $this->pageTitle . '</h2>';
?>
<div class="task">

    <?php
    echo '<h3>'. CHtml::encode($model->name) .'</h3>';
    echo '<p>'. $model->email .'</p>';
    echo '<a href="' . Yii::app()->request->baseUrl ."/student/update?id=".$model->id . '">Upraviť</a>';
    ?>
</div>