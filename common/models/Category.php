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

    const PUBLISH_ACTIVE = 1;
    const PUBLISH_NOACTIVE = 2;

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
            [['parent_id', 'publish'], 'integer'],
            ['publish', 'default', 'value' => self::PUBLISH_ACTIVE],
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
            'title' => Yii::t('cms', 'Title'),
            'slug' => Yii::t('cms', 'Slug'),
            'parent_id' => Yii::t('cms', 'Parent'),
            'description' => Yii::t('cms', 'Description'),
            'type' => Yii::t('cms', 'Type'),
            'publish' => Yii::t('cms', 'Publish'),
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

    public function getCategories($type = NULL, &$data = [], $parent = NULL) {
        $category = Category::find()->where(['parent_id' => $parent, 'type' => $type])->andWhere(['NOT IN', 'id', (!$this->isNewRecord) ? $this->id : 0])->all();
        foreach ($category as $key => $value) {
            $data[$value->id] = $this->getIndent($value->indent) . $value->title;
            unset($category[$key]);
            $this->getCategories($type, $data, $value->id);
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
