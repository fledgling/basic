<?php

class CartController extends YController
{

    public function actionIndex()
    {

        $this->render('index', array('cart' => Yii::app()->cart));
    }

    public function actionAdd()
    {
        $item = $this->loadItem();
        $quantity = empty($_POST['qty']) ? 1 : intval($_POST['qty']);
        if(Yii::app()->cart->put($item, $quantity))
            echo json_encode(array('status' => 'success','number' => count(Yii::app()->cart)));
        else
            echo json_encode(array('status' => 'success'));
    }

    public function actionUpdate()
    {
       $sku=Sku::model()->findByPk(substr($_POST['sku_id'],3));
        if($sku->stock<$_POST['qty']){
            echo  '<div id="error-message" style="color:red">库存数量不足。</div>';
        }else{
            $item = CartItem::model()->with('skus')->findByPk(intval($_POST['item_id']));
            $item->cartProps = empty($_POST['props']) ? '' : $_POST['props'];
        $quantity = empty($_POST['qty']) ? 1 : intval($_POST['qty']);
        Yii::app()->cart->update($item, $quantity);
        }
    }

    public function actionRemove($key)
    {
        Yii::app()->cart->remove($key);
        $this->redirect('index');
    }

    public function actionClear()
    {
        Yii::app()->cart->clear();
        $this->redirect('index');
    }

    public function loadItem()
    {
        if (empty($_POST['item_id'])) {
            throw new CHttpException(400, 'Bad Request!.');
        }
        $item = CartItem::model()->with('skus')->findByPk(intval($_POST['item_id']));
        if (empty($item)) {
            throw new CHttpException(400, 'Bad Request!.');
        }
        $item->cartProps = empty($_POST['props']) ? '' : $_POST['props'];
        return $item;
    }

    public function actionGetPrice()
    {
        $positions = isset($_POST['positions']) ? $_POST['positions'] : array();
        $cart = Yii::app()->cart;
        $totalPrice = 0;
        foreach ($positions as $key) {
            $item = $cart->itemAt($key);
            $totalPrice += $item->getSumPrice();
        }
        echo json_encode(array('total' => $totalPrice));
    }

}