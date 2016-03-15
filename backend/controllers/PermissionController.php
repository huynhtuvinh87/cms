<?php

namespace backend\controllers;

use backend\controllers\ItemController;
use yii\rbac\Item;


class PermissionController extends ItemController {

    /**
     * @inheritdoc
     */
    public function labels() {
        return[
            'Item' => 'Permission',
            'Items' => 'Permissions',
        ];
    }

    /**
     * @inheritdoc
     */
    public function getType() {
        return Item::TYPE_PERMISSION;
    }

}
