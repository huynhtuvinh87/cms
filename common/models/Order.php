<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use common\models\User;
use common\models\Post;

/**
 * This is the model class for table "giicms_orders".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $content
 */
class Order extends ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'giicms_orders';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['user_id', 'post_id', 'number', 'created_at', 'updated_at'], 'integer'],
            ['code', 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'post_id' => 'Tên sản phẩm',
            'user_id' => 'Người mua',
            'number' => 'Số lượng',
            'code' => 'Mã đơn hàng',
            'created_at' => 'Ngày tạo'
        ];
    }

    public function behaviors() {
        return array_merge(parent::behaviors(), [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
            ],
        ]);
    }

    public function getUser() {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getPost() {
        return $this->hasOne(Post::className(), ['id' => 'post_id']);
    }

}
