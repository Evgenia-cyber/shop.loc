<?php

namespace app\models;

class Product extends AppModel {

//    public function setRecentlyViewed($id) {
//        $resentlyViewed = $this->getAllRecentlyViewed();
//        if (!$resentlyViewed) {
//            setcookie('resentlyViewed', $id, time() + 3600 * 24, '/');
//        } else {
//            $resentlyViewed = explode('-', $resentlyViewed);
//            if (!in_array($id, $resentlyViewed)) {
//                $resentlyViewed[] = $id;
//                $resentlyViewed = implode('-', $resentlyViewed);
//                setcookie('resentlyViewed', $resentlyViewed, time() + 3600 * 24, '/');
//            }
//        }
//    }
    
      public function setRecentlyViewed($id) {
        $resentlyViewed = $this->getAllRecentlyViewed();
        if (!$resentlyViewed) {
            setcookie('resentlyViewed', $id, time() + 3600 * 24, '/');
        } else {
            if (!in_array($id, $resentlyViewed)) {
                $resentlyViewed[] = $id;
                $resentlyViewed = implode('-', $resentlyViewed);
                setcookie('resentlyViewed', $resentlyViewed, time() + 3600 * 24, '/');
            }
        }
    }

    public function getRecentlyViewed() {
        if (!empty($_COOKIE['resentlyViewed'])) {
            $resentlyViewed = $_COOKIE['resentlyViewed'];
            $resentlyViewed = explode('-', $resentlyViewed);
            return array_slice($resentlyViewed, -3);
        }
        return FALSE;
    }

//    public function getAllRecentlyViewed() {
//        if (!empty($_COOKIE['resentlyViewed'])) {
//             return $_COOKIE['resentlyViewed'];
//        }
//        return FALSE;
//    }
    public function getAllRecentlyViewed() {
        if (!empty($_COOKIE['resentlyViewed'])) {
            $allResentlyViewed = $_COOKIE['resentlyViewed'];
            $allResentlyViewed = explode('-', $allResentlyViewed);
             return $allResentlyViewed;
        }
        return FALSE;
    }

}
