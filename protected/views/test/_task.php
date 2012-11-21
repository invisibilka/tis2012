<?php
/**
 * User: V. Jurenka
 * Date: 21.11.2012
 * Time: 13:10
 */
?>
<tr class="task_item">
    <td class="checkbox"><?php echo CHtml::checkBox('task_'.$model->id); ?></td>
    <td class="task_index"><?php echo $index; ?></td>
    <td class="task_name"><?php echo $model->name; ?></td>
    <td class="task_up_down"><?php echo CHtml::link('hore','javascript:move('.$index.', 0)'); ?>&nbsp;<?php echo CHtml::link('dole','javascript:move('.$index.', 1)'); ?></td>
</tr>