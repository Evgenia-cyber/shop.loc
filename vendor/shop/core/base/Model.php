<?php
namespace shop\base;

use shop\Db;
/**
 * Description of Model
 *
 * @author Evgeniya
 */
abstract class Model {

    public $attributes = [];
    public $errors = [];
    public $rules = [];

    public function __construct() {
        Db::instance();
    }

     public function load($data){
        foreach($this->attributes as $name => $value){
            if(isset($data[$name])){
                $this->attributes[$name] = $data[$name];
            }
        }
    }
}
