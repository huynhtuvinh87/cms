<?php

namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;

/**
 * File controller
 */
class FileController extends Controller {

    public function actionIndex() {
        return $this->render('index');
    }

}
