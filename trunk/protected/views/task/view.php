<?php
$this->breadcrumbs=array(
        'Úlohy'=>array('find'),
        $model->name,
    );
?>
<div class="task">

<?php
echo '<h2>'. $model->name .'</h2>';
echo '<p>'. $model->html .'</p>';
?>
</div>

