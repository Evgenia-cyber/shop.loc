<?php

namespace shop\base;

abstract class Controller {

    public $route;
    public $controller;
    public $view;
    public $layout;
    public $model;
    public $prefix;
    public $data = [];
    public $meta = ['title'=>'', 'description'=>'','keywords'=>''];

    public function __construct($route) {
        $this->route = $route;
        $this->controller = $route['controller'];
        $this->model = $route['controller'];
        $this->view = $route['action'];
        $this->prefix = $route['prefix'];
    }

    public function set($data) {
        $this->data = $data;
    }

    public function setMeta($title = '', $description = '', $keywords = '') {
        $this->meta['title'] = h($title);
        $this->meta['description'] = h($description);
        $this->meta['keywords'] = h($keywords);
    }

    public function getView() {
        $viewObject = new View($this->route, $this->meta, $this->layout, $this->view);
        $viewObject->render($this->data);
    }

    public function isAjax() {
        return isset($_SERVER['HTTP_X_REQUESTED_WITH'])&& $_SERVER['HTTP_X_REQUESTED_WITH']==='XMLHttpRequest';
    }

    public function loadView($view,$vars =[]) {
        extract($vars);
        require APP."/views/{$this->prefix}{$this->controller}/{$view}.php";
        die();
    }

}
