<?php

namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use backend\controllers\BackendController;
/**
 * File controller
 */
class FileController extends BackendController {

    public function actionIndex() {
        return $this->render('index');
    }

}
