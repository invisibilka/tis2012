<ul id="subnavigation">
    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/user/update">Upravit profil</a></li>
    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/user/view">Zobrazit profil</a></li>
    <?php
    $model = Users::model()->findByPk(Yii::app()->user->id);
    if ($model->permissions) {
        ?>
        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/user/find">Sprava uctov</a></li>
        <?php
    } else {
        ?>
        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/user/delete">Vymazat profil</a></li>
        <?php
    }
    ?>
</ul>