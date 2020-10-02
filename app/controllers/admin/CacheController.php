<?php

namespace app\controllers\admin;

use shop\Cache;

class CacheController extends AppController{
     public function indexAction(){
        $this->setMeta('Очистка кеша');
    }

    public function deleteAction(){
        $key = isset($_GET['key']) ? $_GET['key'] : null;
        $cache = Cache::instance();
        switch($key){
            case 'category':
                $cache->delete('cats');
                $cache->delete('shop_menu');
                break;
            case 'filter':
                $cache->delete('filter_group');
                $cache->delete('filter_attrs');
                break;
        }
        $_SESSION['success'] = 'Выбранный кэш удалён';
        redirect();
    }
}
