<?php
/**
 * Created by PhpStorm.
 * author: shuai.du@jago-ag.cn
 * Date: 4/21/14
 * Time: 3:26 PM
 */

$this->breadcrumbs=array(
    Yii::t('backend','视频')=>array('admin'),
    Yii::t('backend','管理'),
);

$this->menu=array(
    array('label'=>Yii::t('backend','添加视频'), 'icon'=>'plus','url'=>array('create')),
);
?>
<h1>视频管理</h1>

<?php
    $this->widget('bootstrap.widgets.TbGridView',array(
        'id' => 'video-view',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'columns' => array(
            'video_id',
            'title',
            'keywords',
            'description',
            'src',
            array(
                'class' => 'bootstrap.widgets.TbButtonColumn',
            ),
        ),
    ));
?>