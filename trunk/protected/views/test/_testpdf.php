<?php echo '<h1 style="text-align: center">' . $model->name . "</h1>";

foreach ($model->tests_tasks as $task) {
    echo '<br/> <div style="page-break-inside: avoid;">';
    echo  "<b>" . $task->task_index . '.) ';
    echo $task->task->name;
    echo " </b> ";
    echo  $task->task->html;
    echo " </div>";
}
?>
