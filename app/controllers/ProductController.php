<?php
namespace app\controllers;

class ProductController extends AppController{
    public function viewAction() {
       $alias=$this->route['alias'];
       $product=\R::findOne('product',"alias=? AND status='1'",[$alias]);
//       debug($product);
        if (!$product) {
            throw new \Exception("Продукт $alias не найден в БД", 404);
        }
        
        
        
        $this->setMeta($product->title,$product->description,$product->keywords);
        $this->set(compact('product'));
    }
}
