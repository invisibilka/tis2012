<?php
/**
 * @author Eva Libantova
 */

$isMyTask = $model->user_id == Yii::app()->user->id;
/*
if($isMyTask){
$this->breadcrumbs=array(
       'Správa úloh' => Yii::app()->request->baseUrl . '/task',
        'Moje úlohy'=>array('my'),
        $model->name,
    );
} else {
$this->breadcrumbs=array(
        'Správa úloh' => Yii::app()->request->baseUrl . '/task',
        'Vrejné úlohy'=>array('public'),
        $model->name,
    );
}*/
?>
<div class="task">

<?php
echo '<h2>'. $model->name .'</h2>';
echo '<p>'. $model->html .'</p>';
if ($isMyTask) echo '<a href="' . Yii::app()->createUrl('task/update/id/' . $model->id) . '">Upraviť</a>';
?>
</div>

<div class="comments">
    <h3>Komentáre</h3>
    <?php
      foreach ($comments as $comment) {
          echo '<div class="comment">' . $comment->user->full_name . '   ' . $comment->date . '<br />' .
              $comment->text . '</div>';
      }
    ?>
</div>

