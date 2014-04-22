<?php
/**
 * Created by PhpStorm.
 * author: shuai.du@jago-ag.cn
 * Date: 4/21/14
 * Time: 3:28 PM
 */

class VideoController extends Controller
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout='//layouts/cms';

    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * name: actionAdmin
     * function:render the admin view
     * @author: shuai.du@jago-ag.cn
     */
    public function actionAdmin()
    {
        $model = new Video('Search');
        $this->render('admin',array('model' => $model));
    }


    public function actionCreate()
    {
        $model = new Video();
        $this->render('create',array('model' => $model));
    }
}