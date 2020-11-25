<?php

namespace app\controllers\admin;

class MainController extends AppController {

    public function indexAction() {
        $countNewOrders = \R::count('order', "status = '0'");
        $countUsers = \R::count('user');
        $countProducts = \R::count('product');
        $countCategories = \R::count('category');
        $countNews = \R::count('news');
        $countSlides = \R::count('slides');
        $this->setMeta('Панель управления');
        $this->set(compact('countNewOrders', 'countCategories', 'countProducts', 'countUsers','countNews','countSlides'));
    }

}
