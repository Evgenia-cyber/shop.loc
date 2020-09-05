<?php

namespace shop;

/**
 * Description of App
 *
 * @author Evgeniya
 */
class App {
    
    public static $app;

    public function __construct() {
        $query_string = filter_input(INPUT_SERVER, 'QUERY_STRING');
        $query = trim($query_string, '/');
        session_start();
        self::$app = Registry::instance();
        $this->getParams();
        new ErrorHandler();
        Router::dispatch($query);
    }
    
    protected function getParams() {
        $params = require_once CONFIG.'/params.php';
        if(!empty($params)) {
            foreach ($params as $key => $value) {
                self::$app->setProperty($key, $value);
            }
        }
    }

}
