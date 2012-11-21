<ul id="subnavigation">
    <li><a href="<?php echo $this->createUrl('test/printPdf',array('id'=>Yii::app()->request->getParam('id'))); ?>" target="_blank">Vytlacit PDF</a></li>
    <li><a href="<?php echo $this->createUrl('test/email',array('id'=>Yii::app()->request->getParam('id'))); ?>">Poslat studentom</a></li>
</ul>