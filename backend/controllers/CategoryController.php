<?php

namespace backend\controllers;

use Yii;
use common\models\Category;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\controllers\BackendController;

/**
 * CategoryController implements the CRUD actions for Category model.
 */
class CategoryController extends BackendController {

    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Category models.
     * @return mixed
     */
    public function actionIndex() {
        $model = $this->categories();
        $dataProvider = new ArrayDataProvider([
            'key' => 'id',
            'allModels' => $model,
            'pagination' => [
                'pageSize' => 200,
            ],
        ]);
        $categories = new Category();
        if ($categories->load(Yii::$app->request->post())) {
            $parent = Category::findOne($categories->parent_id);
            if (!empty($parent))
                $categories->indent = $parent->indent + 1;
            else
                $categories->indent = 0;
            $categories->save();
            return $this->redirect(['index']);
        }
        return $this->render('index', [
                    'dataProvider' => $dataProvider,
                    'model' => $categories
        ]);
    }

    /**
     * Displays a single Category model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Category model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Category();

        if ($model->load(Yii::$app->request->post())) {
            $parent = Category::findOne($model->parent_id);
            if (!empty($parent))
                $model->indent = $parent->indent + 1;
            else
                $model->indent = 0;
            $model->save();
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Category model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $parent = Category::findOne($model->parent_id);
            if (!empty($parent))
                $model->indent = $parent->indent + 1;
            else
                $model->indent = 0;
            $model->save();
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    public function actionPublish() {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $model = $this->findModel($_POST['id']);
        if (!empty($model)) {
            if ($model->publish == Category::PUBLISH_ACTIVE)
                $model->publish = Category::PUBLISH_NOACTIVE;
            else
                $model->publish = Category::PUBLISH_ACTIVE;
            if ($model->save()) {
                return ['messages' => $model->publish];
            }
        }
    }

    /**
     * Deletes an existing Category model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function categories(&$data = [], $parent = NULL) {
        $category = Category::find()->where(['parent_id' => $parent, 'type' => 'post'])->all();
        foreach ($category as $key => $value) {
            $data[] = $value;
            unset($category[$key]);
            $this->categories($data, $value->id);
        }
        return $data;
    }

    /**
     * Finds the Category model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Category the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Category::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
