<?php
/**
 *@author Milos Blascak
 */
/*
$this->breadcrumbs=array(
    'Študenti',
    $model->name,
);*/
?>
<div class="task">

    <?php
    echo '<h2>'. CHtml::encode($model->name) .'</h2>';
    echo '<p>'. $model->email .'</p>';
    echo '<a href="' . Yii::app()->request->baseUrl ."/student/update?id=".$model->id . '">Upraviť</a>';
    ?>
</div>