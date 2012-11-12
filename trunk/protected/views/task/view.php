<?php
$this->breadcrumbs=array(
    'Úlohy', 'Úloha č.' . $model->id,
);
?>
<div class="task">

<?php
echo '<h2>'. $model->name .'</h2>';
echo '<p>'. $model->html .'</p>';
?>
</div>

