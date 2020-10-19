<?php

namespace app\controllers;

use app\models\Breadcrumbs;
use app\models\Category;
use shop\App;
use shop\libs\Pagination;
use widgets\filter\Filter;

class CategoryController extends AppController{
    public function viewAction() {
        $alias= $this->route['alias'];
        $category = \R::findOne('category','alias=?',[$alias]);
        if (!$category) {
            throw new \Exception('Станица не найдена',404);
        }
            $breadcrumbs= Breadcrumbs::getBreadcrumbs($category->id);

            $cat_model = new Category();
            $ids=$cat_model->getIds($category->id);
            $ids=!$ids?$category->id:$ids.$category->id;

 $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = App::$app->getProperty('pagination');
          $sql_part = '';
        if(!empty($_GET['filter'])){
            $filter = Filter::getFilter();
            if($filter){
                /*
             * //1 option - simplest filter
            SELECT `product`.*  FROM `product`  WHERE category_id IN (6) AND id IN
            (
            SELECT product_id FROM attribute_product WHERE attr_id IN (1,5)
            )
                 *  $sql_part = "AND id IN (SELECT product_id FROM attribute_product WHERE attr_id IN ($filter))";
             //end simplest filter
            */
                //2 option - more complex filter
                 /*
            SELECT `product`.*  FROM `product`  WHERE category_id IN (6) AND id IN
            (
            SELECT product_id FROM attribute_product WHERE attr_id IN (1,5) GROUP BY product_id HAVING COUNT(product_id) = 2
            )
            */
                $countGroupsOfFilters = Filter::getCountGroups($filter);
                $sql_part = "AND id IN (SELECT product_id FROM attribute_product WHERE attr_id IN ($filter) GROUP BY product_id HAVING COUNT(product_id) = $countGroupsOfFilters)";
                //end more complex filter
            }
        }
        $total = \R::count('product', "category_id IN ($ids) $sql_part");
        $pagination = new Pagination($page, $perpage, $total);
        $start = $pagination->getStart();

        $products = \R::find('product', "status='1' AND category_id IN ($ids) $sql_part LIMIT $start, $perpage");

        if($this->isAjax()){
            $this->loadView('filter', compact('products', 'total', 'pagination'));
        }
        $this->setMeta($category->title, $category->description, $category->keywords);
        $this->set(compact('products', 'breadcrumbs', 'pagination', 'total'));
    }

}
