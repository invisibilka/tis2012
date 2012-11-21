<ul class="subnavigation">
    <li><a href="<?php echo $this->createUrl('test/printPdf',array('id'=>Yii::app()->request->getParam('id'))); ?>" target="_blank">Vytlačiť PDF</a></li>
    <li><a href="<?php echo $this->createUrl('test/email',array('id'=>Yii::app()->request->getParam('id'))); ?>">Poslať študentom</a></li>
    <li><a href="<?php echo $this->createUrl('test/update',array('id'=>Yii::app()->request->getParam('id'))); ?>">Upraviť</a></li>
</ul>