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

    /**
     * name: actionCreate
     * function:create  video
     * @author: shuai.du@jago-ag.cn
     */
    public function actionCreate()
    {
        $model = new Video();
        if(isset($_POST['Video']))
        {
            $model->attributes = $_POST['Video'];
            if($model->validate() && $model->save())
            {
                $this->redirect('admin');
            }
        }
        $this->render('create',array('model' => $model));
    }

    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);
        if(isset($_POST['Video']))
        {
            $model->attributes = $_POST['Video'];
            if($model->validate() && $model->save())
            {
                $this->redirect(array('admin'));
            }
        }
        $this->render('update',array('model'=>$model));
    }

    public function actionDelete($id)
    {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $this->loadModel($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }
        else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * name: loadModel
     * function: load model
     * @param $id int the video pk
     * @return Video
     * @throws CHttpException
     * @author: shuai.du@jago-ag.cn
     */
    public function loadModel($id)
    {
        $model = Video::model()->findByPk((int)$id);
        if($model == null)
        {
            throw new CHttpException(404,Yii::t('backend','您请求的页面不存在'));
        }
        return $model;
    }

}