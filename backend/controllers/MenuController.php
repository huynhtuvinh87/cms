<?php

namespace backend\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Post;
use common\models\Category;
use common\models\Menu;
use common\models\MenuItem;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class MenuController extends Controller {

    public function actionIndex() {
        $category = $this->getCategories();
        $page = Post::find()->where(['type' => 'page'])->all();
        return $this->render('index', ['category' => $category, 'page' => $page]);
    }

    public function actionCreate() {
        $model = new Menu();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    public function actionView($id) {
        $category = $this->getCategories();
        $page = Post::find()->where(['type' => 'page'])->all();
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post())) {
            if (!empty($_POST['category'])) {
                foreach ($_POST['category'] as $value) {
                    $order = MenuItem::find()->max('order');
                    $category = Category::findOne($value);
                    $menuitem = new MenuItem();
                    $menuitem->menu_id = $id;
                    $menuitem->parent_id = $category->parent_id;
                    $menuitem->type_id = $category->id;
                    $menuitem->type = 'category';
                    $menuitem->order = $order + 1;
                    $menuitem->save();
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        }
        return $this->render('view', ['category' => $category, 'page' => $page, 'model' => $model]);
    }

    public function getCategories(&$data = [], $parent = NULL) {
        $post = Post::findOne($this->id);
        $category = Category::find()->where(['parent_id' => $parent])->all();
        foreach ($category as $key => $value) {
            $data[] = ['id' => $value->id, 'title' => $value->title, 'indent' => $value->indent];
            unset($category[$key]);
            $this->getCategories($data, $value->id);
        }
        return $data;
    }

    public function getIndent($int) {
        if ($int > 0) {
            for ($index = 1; $index <= $int; $index++) {
                $data[] = '—';
            }
            return implode('', $data) . ' ';
        } else
            return '';
    }

    public function actionOrder() {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        var_dump(explode(',', $_POST['order']));
        exit;
    }

    protected function findModel($id) {
        if (($model = Menu::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
