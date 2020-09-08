<?php
namespace app\controllers;

class ProductController extends AppController{
    public function viewAction() {
       $alias=$this->route['alias'];
       $product=\R::findOne('product',"alias=? AND status='1'",[$alias]);
        if (!$product) {
            throw new \Exception("Продукт $alias не найден в БД", 404);
        }
        $related = \R::getAll("SELECT * FROM related_product JOIN product ON product.id=related_product.related_id WHERE related_product.product_id=?", [$product->id]);
//       debug($related);
        
        
        $this->setMeta($product->title,$product->description,$product->keywords);
        $this->set(compact('product', 'related'));
    }
}
