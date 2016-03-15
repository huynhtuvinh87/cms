<?php

namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;

class BackendController extends Controller {

    public function init() {
        if (\Yii::$app->user->isGuest)
            $this->redirect('/site/login');
    }

}
