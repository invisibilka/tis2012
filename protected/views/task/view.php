<?php
/**
 * @author Eva Libantova
 */

$this->breadcrumbs=array(
       'Správa úloh' => Yii::app()->request->baseUrl . '/task',
        'Moje úlohy'=>array('my'),
        $model->name,
    );
?>
<div class="task">

<?php
echo '<h2>'. $model->name .'</h2>';
echo '<p>'. $model->html .'</p>';
echo '<a href="' . Yii::app()->createUrl('task/update/id/' . $model->id) . '">Upraviť</a>';
?>
</div>

