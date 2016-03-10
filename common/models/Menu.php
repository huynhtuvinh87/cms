<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "post".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $content
 */
class Menu extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'menu';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['name'], 'required', 'message' => '{attribute} không được rỗng'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'name' => 'Tiêu đề',
        ];
    }

    public function getCategories($type, &$data = [], $parent = NULL) {
        $post = Post::findOne($this->id);
        $category = Category::find()->where(['parent_id' => $parent, 'type' => $type])->all();
        foreach ($category as $key => $value) {
            $data[] = ['id' => $value->id, 'title' => $this->getIndent($value->indent) . $value->title];
            unset($category[$key]);
            $this->getCategories($type, $data, $value->id);
        }
        return $data;
    }

    public function getCategory() {
        $post = Post::findOne($this->id);
        foreach (explode(',', $post->category_id) as $value) {
            $category = Category::findOne($value);
            $data[] = ['id' => $category->id, 'parent_id' => $category->parent_id, 'title' => $category->title, 'indent' => $this->getIndent($category->indent)];
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
