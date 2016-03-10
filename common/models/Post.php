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
class Post extends \yii\db\ActiveRecord {

    const STATUS_PRIVATE = 'private';
    const STATUS_PUBLISH = 'publish';
    const FEATURED_OPEN = 1;
    const FEATURED_CLOSE = 0;
    const SLIDE_OPEN = 1;
    const SLIDE_CLOSE = 0;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'posts';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['title', 'category_id'], 'required', 'message' => '{attribute} không được rỗng'],
            [['description', 'content', 'image'], 'string'],
            [['title', 'type', 'slug', 'status'], 'string', 'max' => 255],
            ['price','default'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'category_id' => 'Danh mục',
            'title' => 'Tiêu đề',
            'description' => 'Mô tả',
            'content' => 'Nội dung',
            'image' => 'Hình ảnh',
            'price' => 'Giá',
            'featured' => 'Nổi bật',
            'slide' => 'Hiển thị trên slide',
            'created_at' => 'Ngày tạo',
            'status' => 'Trạng thái'
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
            'slug' => [
                'class' => 'yii\behaviors\SluggableBehavior',
                'attribute' => 'title',
                'slugAttribute' => 'slug',
                'immutable' => true,
                'ensureUnique' => true
            ],
        ]);
    }

    public function getPostStatus() {
        return [
            self::STATUS_PUBLISH => 'Mọi người',
            self::STATUS_PRIVATE => 'Riêng tư',
        ];
    }

    public function getFeatureds() {
        return [
            self::FEATURED_CLOSE => 'Đóng',
            self::FEATURED_OPEN => 'Mở',
        ];
    }

    public function getSlides() {
        return [
            self::SLIDE_CLOSE => 'Đóng',
            self::SLIDE_OPEN => 'Mở',
        ];
    }

    public function getCategories($type, &$data = [], $parent = NULL) {
        $post = Post::findOne($this->id);
        $category = Category::find()->where(['parent_id' => $parent, 'type' => $type])->all();
        foreach ($category as $key => $value) {
            if (!empty($post->category_id) && in_array($value->id, explode(',', $post->category_id)))
                $checked = 1;
            else
                $checked = 0;
            $data[] = ['id' => $value->id, 'title' => $this->getIndent($value->indent) . $value->title, 'checked' => $checked];
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
