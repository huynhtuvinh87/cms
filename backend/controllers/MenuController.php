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
                    $category = Category::findOne($value);
                    $menuitem = new MenuItem();
                    $menuitem->menu_id = $id;
                    if (!empty($category->parent_id))
                        $menuitem->parent_id = $category->parent_id;
                    $menuitem->type_id = $category->id;
                    $menuitem->type = 'category';
                    $menuitem->type_name = $category->title;
                    $menuitem->type_slug = $category->slug;
                    $menuitem->order = 0;
                    $menuitem->save();
                }
                return $this->redirect(['view', 'id' => $model->id]);
            }
            if (!empty($_POST['page'])) {
                foreach ($_POST['page'] as $value) {
                    $page = Post::findOne($value);
                    $menuitem = new MenuItem();
                    $menuitem->menu_id = $id;
                    $menuitem->type_id = $page->id;
                    $menuitem->type = 'page';
                    $menuitem->type_name = $page->title;
                    $menuitem->type_slug = $page->slug;
                    $menuitem->order = 0;
                    $menuitem->save();
                }
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }
        $menuitem = MenuItem::find()->where(['menu_id' => $id])->orderBy(['order' => SORT_ASC])->all();
        $menuall = Menu::find()->all();
        return $this->render('view', ['category' => $category, 'page' => $page, 'model' => $model, 'menuitem' => $menuitem, 'menuall' => $menuall]);
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
        if (!empty($_POST['Menu']['id']) && !empty($_POST['order'])) {
            foreach ($_POST['order'] as $key => $value) {
                $item = MenuItem::findOne($value);
                $item->parent_id = $_POST['parent'][$value];
                $item->order = $key + 1;
                $item->save();
            }
        }
    }

    protected function findModel($id) {
        if (($model = Menu::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
