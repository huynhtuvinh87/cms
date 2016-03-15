<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "gii_settings".
 */
class Setting extends ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'giicms_settings';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['key', 'value'], 'required', 'message' => '{attribute} không được rỗng'],
            [['description'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'key' => 'Từ khóa',
            'value' => 'Giá trị',
            'description' => 'Mô tả',
        ];
    }

}
