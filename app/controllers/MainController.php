<?php

namespace app\controllers;

class MainController extends AppController {

    public function indexAction() {
        $slides = \R::find('slides');
        $brands = \R::find('brand', 'LIMIT 3');
        $hits = \R::find('product', "hit='1' AND status='1' LIMIT 8");
        $this->setMeta('Main page', 'Description...', 'Keywords');
        $this->set(compact('brands', 'hits','slides'));
    }

}
