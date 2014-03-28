<?php$action = 'page';$id = NULL;Yii::app()->getClientScript()->registerScript('editorparam', 'window.KEDITOR_PARAM = "action=' . $action . '&id=' . $id . '"', CClientScript::POS_HEAD);/** @var BootActiveForm $form */$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(    'id' => 'page-form',    'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,        ));?><fieldset>    <p class="note">带星号（<span class="required">*</span>）的是必须的。</p>    <?php echo $form->errorSummary($model); ?>    <div class="control-group ">        <label for="Page_category_id" class="control-label required">单页分类 <span class="required">*</span></label>        <div class="controls">            <?php                        echo '<select id="Page_category_id" name="Page[category_id]">';            $category = Category::model()->findByPk(4);            $descendants = $category->descendants()->findAll();            $level = 3;            echo '<option value="0" >请选择分类</option>';            foreach ($descendants as $child) {                $string = '&nbsp;&nbsp;';                $string .= str_repeat('&nbsp;&nbsp;', $child->level - $level);                if ($child->isLeaf() && !$child->next()->find()) {                    $string .= '';                } else {                    $string .= '';                }                $string .= '' . $child->name;//		echo $string;                if (!$model->isNewRecord) {                    if ($model->category_id == $child->category_id) {                        $selected = 'selected';                        echo '<option value="' . $child->category_id . '" selected="' . $selected . '">' . $string . '</option>';                    } else {                        echo '<option value="' . $child->category_id . '" >' . $string . '</option>';                    }                } else {                    echo '<option value="' . $child->category_id . '" >' . $string . '</option>';                }            }            echo '</select>';            ?>        </div>    </div>    <?php echo $form->textFieldControlGroup($model, 'key', array('class' => 'span5')); ?>    <?php echo $form->textFieldControlGroup($model, 'title', array('class' => 'span5')); ?>    <?php echo $form->dropDownListControlGroup($model, 'language', array('en_us' => 'English', 'zh_cn' => '中文')); ?>        <?php echo $form->textAreaControlGroup($model, 'content'); ?>    <?php$this->widget('ext.kindeditor.KindEditorWidget', array(    'id' => 'Page_content', //Textarea id    'items' => array(        'width' => '700px',        'height' => '300px',        'themeType' => 'simple',        'allowImageUpload' => true,        'allowFileUpload' => true,        'allowFileManager' => true,        'items' => array(            'source', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic',            'underline', 'removeformat', '|', 'justifyleft', 'justifycenter',            'justifyright', 'insertorderedlist', 'insertunorderedlist', '|',            'emoticons', 'image', 'multiimage', 'link',        ),    ),    'options' => array('action' => $action, 'id' => $id)));?>            <?php echo $form->textFieldControlGroup($model, 'keywords', array('class' => 'span5', 'value'=>$model->isNewRecord ? '' : $model->getEav('keywords'))); ?>    <?php echo TbHtml::formActions(array(        TbHtml::submitButton('Submit', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),        TbHtml::resetButton('Reset'),    )); ?><?php $this->endWidget(); ?>