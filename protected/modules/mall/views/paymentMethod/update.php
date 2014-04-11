<?php
$this->breadcrumbs=array(
	'Payment Methods'=>array('index'),
	$model->name=>array('view','id'=>$model->payment_method_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List PaymentMethod', 'icon'=>'list', 'url'=>array('index')),
	array('label'=>'Create PaymentMethod', 'icon'=>'plus','url'=>array('create')),
	array('label'=>'View PaymentMethod', 'url'=>array('view', 'id'=>$model->payment_method_id)),
	array('label'=>'Manage PaymentMethod', 'icon'=>'cog','url'=>array('admin')),
);
?>

<h3>更新支付方式 <?php echo $model->payment_method_id; ?></h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>