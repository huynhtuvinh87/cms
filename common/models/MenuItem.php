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
class MenuItem extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'menu_item';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['parent_id', 'menu_id', 'type_id', 'order'], 'integer'],
            [['type'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'name' => 'Tên menu',
        ];
    }

    public static function getIndent($int) {
        if ($int > 0) {
            for ($index = 1; $index <= $int; $index++) {
                $data[] = '&nbsp;&nbsp;&nbsp;&nbsp;';
            }
            return implode('', $data) . ' ';
        } else
            return '';
    }

}
