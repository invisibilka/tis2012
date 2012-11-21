<ul class="subnavigation">
    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/user/update">Upraviť profil</a></li>
    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/user/view">Zobraziť profil</a></li>
    <?php
    $model = Users::model()->findByPk(Yii::app()->user->id);
    if ($model->permissions) {
        ?>
        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/user/find">Správa účtov</a></li>
        <?php
    } else {
        ?>
        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/user/delete" onclick="return confirm('Ste si istý, že chcete vymazať váš profil?')">Vymazať profil</a></li>
        <?php
    }
    ?>
</ul>