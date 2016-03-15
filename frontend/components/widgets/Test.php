<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace frontend\components\widgets;

use Yii;
use yii\base\Component;
use yii\web\Application;
use yii\base\InvalidConfigException;

class Test extends \yii\base\Widget {

    public function init() {
        
    }

    public function run() {
        echo $this->render('themes/demo/widgets/test');
    }

}
