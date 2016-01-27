<?php

namespace common\models;

use Yii;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "categories".
 *
 * @property integer $id
 * @property string $name
 * @property string $slug
 * @property integer $parent_id
 * @property string $description
 * @property integer $order
 * @property integer $status
 */
class Category extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'categories';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['parent_id', 'status'], 'integer'],
            [['description'], 'string'],
            [['title', 'slug', 'type'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'title' => 'Name',
            'slug' => 'Slug',
            'parent_id' => 'Parent ID',
            'description' => 'Description',
            'status' => 'Status',
        ];
    }

    public function behaviors() {
        return array_merge(parent::behaviors(), [
//            'timestamp' => [
//                'class' => TimestampBehavior::className(),
//                'createdAtAttribute' => 'createdAt',
//                'updatedAtAttribute' => 'updatedAt',
//            ],
            'slug' => [
                'class' => SluggableBehavior::className(),
                'attribute' => 'title',
                'slugAttribute' => 'slug',
                'immutable' => true,
                'ensureUnique' => true
            ],
        ]);
    }

    public function getCategories(&$data = [], $parent = NULL) {
        $category = Category::find()->where(['parent_id' => $parent])->andWhere(['NOT IN', 'id', isset($this->id) ? $this->id : NULL])->all();
        foreach ($category as $key => $value) {
            $data[$value->id] = $this->getIndent($value->indent) . $value->title;
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

}
