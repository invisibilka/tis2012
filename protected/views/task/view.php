<?php
/**
 * @author Eva Libantova
 */

$this->breadcrumbs=array(
        'Moje úlohy'=>array('my'),
        $model->name,
    );
?>
<div class="task">

<?php
echo '<h2>'. $model->name .'</h2>';
echo '<p>'. $model->html .'</p>';
?>
</div>

