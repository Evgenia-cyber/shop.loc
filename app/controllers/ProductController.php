<?php

namespace app\controllers;

class ProductController extends AppController {

    public function viewAction() {
        $alias = $this->route['alias'];
        $product = \R::findOne('product', "alias=? AND status='1'", [$alias]);
        if (!$product) {
            throw new \Exception("Продукт $alias не найден в БД", 404);
        }

        $related = \R::getAll("SELECT * FROM related_product JOIN product ON product.id=related_product.related_id WHERE related_product.product_id=?", [$product->id]);

        $product_model = new \app\models\Product;
        $product_model->setRecentlyViewed($product->id);
        $recently_viewed_from_cookie = $product_model->getRecentlyViewed();
        $recently_viewed = null;
        if ($recently_viewed_from_cookie) {
            $recently_viewed = \R::find('product', 'id IN (' . \R::genSlots($recently_viewed_from_cookie) . ') LIMIT 3', $recently_viewed_from_cookie);
        }

        $gallery = \R::findAll('gallery', 'product_id=?', [$product->id]);

        $this->setMeta($product->title, $product->description, $product->keywords);
        $this->set(compact('product', 'related', 'gallery', 'recently_viewed'));
    }

}
