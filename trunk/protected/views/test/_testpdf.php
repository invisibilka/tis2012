<?php echo '<h1 style="text-align: center">' . $model->name . "</h1>";

foreach ($model->tests_tasks as $task) {
    echo "<br/> <div>";
    echo  "<b>" . $task->task_index . '.)';
    echo $task->task->name;
    echo " </b> <p>";
    echo  $task->task->html;
    echo "</p> </div>";
}
?>
