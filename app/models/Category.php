<?php

namespace app\models;

use shop\App;

class Category extends AppModel {

    public function getIds($id) {
        $cats = App::$app->getProperty('cats');
        $ids = null;
        foreach ($cats as $key => $value) {
            if($value['parent_id']==$id) {
                $ids .= $key.',';
                $ids .= $this->getIds($key);
            }
        }
        return $ids;
    }

}
