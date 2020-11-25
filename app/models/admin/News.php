<?php

namespace app\models\admin;

use app\models\AppModel;

class News extends AppModel {

    public $attributes = [
        'title' => '',
        'text' => '',
        'short_description' => '',
        'date' => ''
    ];
    public $rules = [
        'required' => [
            ['title'],
            ['text'],
            ['short_description'],
            ['date']
        ],
    ];

    public function getImg() {
        if (!empty($_SESSION['news-img'])) {
            $this->attributes['img'] = $_SESSION['news-img'];
            unset($_SESSION['news-img']);
        }
    }

}
