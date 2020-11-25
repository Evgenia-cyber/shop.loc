<?php

namespace app\models\admin;

class Slide extends \app\models\AppModel {

    public $attributes = [
        'description' => '',
        'alias' => ''
    ];

    public function getImg() {
        if (!empty($_SESSION['slide-img'])) {
            $this->attributes['img'] = $_SESSION['slide-img'];
            unset($_SESSION['slide-img']);
        }
    }

    public function getImgFromDB($id) {
        return \R::getCell("SELECT `slides`.`img` FROM `slides` WHERE `slides`.`id`=?", [$id]);
    }

}
