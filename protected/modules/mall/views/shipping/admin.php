<?php
$this->breadcrumbs=array(
	'Shippings'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>"出货单", 'icon'=>'list', 'url'=>array('index')),
	array('label'=>"送货单", 'icon'=>'plus','url'=>array('create')),
);
?>

<h3>发货单</h3>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'shipping-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'ship_id',
		'order_id',
//		'user_id',
		'ship_sn',
		'type',
		'ship_method',
		/*
		'ship_fee',
		'op_name',
		'status',
		'receiver_name',
		'receiver_phone',
		'receiver_mobile',
		'location',
		'create_time',
		'update_time',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
