<?php

namespace backend\controllers;

use backend\controllers\ItemController;
use yii\rbac\Item;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class RoleController extends ItemController {

    /**
     * @inheritdoc
     */
    public function labels() {
        return[
            'Item' => 'Role',
            'Items' => 'Roles',
        ];
    }

    /**
     * @inheritdoc
     */
    public function getType() {
        return Item::TYPE_ROLE;
    }

}
