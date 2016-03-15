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
        return 'giicms_menu';
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
