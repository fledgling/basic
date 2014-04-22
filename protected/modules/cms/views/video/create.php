<?php
/**
 * Created by PhpStorm.
 * author: shuai.du@jago-ag.cn
 * Date: 4/22/14
 * Time: 8:48 AM
 */
$this->breadcrumbs=array(
   Yii::t('backend','视频')=>array('admin'),
    Yii::t('backend','添加'),
);
?>
<div class="">
    <h1><?php echo Yii::t('backend','添加视频')?></h1>
    <?php
        $form = $this->beginWidget('bootstrap.widgets.TbActiveForm',array(
            'id' => 'createForm',
            'clientOptions' => array(
                'enableClientValidate' => 'true',
            )
        ));
    ?>
    <?php echo $form->errorSummary($model);?>
    <div class="form-group">
        <?php echo $form->labelEx($model,'标题');?>
        <?php echo $form->textField($model,'title');?>
    </div>
    <div class="form-group">
        <?php echo $form->labelEx($model,'关键字');?>
        <?php echo $form->textField($model,'keywords');?>
    </div>
    <div>
        <?php echo $form->labelEx($model,'描述');?>
        <?php echo $form->textArea($model,'description');?>
    </div>
    <div>
        <?php echo $form->labelEx($model,'链接');?>
        <?php echo $form->textField($model,'src');?>
    </div>
    <button class="btn-default" type="submit"><?php echo Yii::t('backend','提交')?></button>
    <?php $this->endWidget();?>
</div>