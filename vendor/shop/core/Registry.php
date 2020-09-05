<?php
namespace shop;

/**
 * Description of Registry
 *
 * @author Evgeniya
 */
class Registry {
    use TSingleton;
    
    private static $properties = [];
    
    public function setProperty($name, $value) {
        self::$properties[$name] = $value;
    }
    
    public function getProperty($name) {
        if(isset(self::$properties[$name])){
            return self::$properties[$name];
        }
        return null;
    }
    /**
     * Метод для дебага
     * @return array
     */
    public function getProperties() {
        return self::$properties;
    }
}