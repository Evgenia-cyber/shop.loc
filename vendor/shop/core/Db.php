<?php

namespace shop;
//use \RedBeanPHP\R as R;

/**
 * Description of Db
 *
 * @author Evgeniya
 */
class Db {

    use TSingleton;

    private function __construct() {
        $db = require_once CONFIG . '/config_db.php';
        class_alias('\RedBeanPHP\R', '\R');
        \R::setup($db['dsn'], $db['user'], $db['password']);
        if (!\R::testConnection()) {
            throw new \Exception("Нет соединения с БД", 500);
        } 
        \R::freeze(TRUE);
        if (DEBUG) {
            \R::debug(TRUE, 1);
        }
    }

//    public function __destruct() {
//        \R::close();;
//    }
}
