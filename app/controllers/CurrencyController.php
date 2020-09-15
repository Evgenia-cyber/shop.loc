<?php
namespace app\controllers;

use app\models\Cart;
use shop\App;

/**
 * Description of CurrencyController
 *
 * @author Evgeniya
 */
class CurrencyController extends AppController{
    public function changeAction() {
        $currency=!empty($_GET['curr'])?$_GET['curr']:NULL;
        if ($currency) {
           //  $curr= App::$app->getProperty('currency');
            $curr=\R::findOne('currency','code=?',[$currency]);
//             if (!empty($curr['code'])) {
             if (!empty($curr)) {
                 setcookie('currency', $currency, time()+3600*24*7, '/');
                 Cart::recalc($curr);
             }
        }
        redirect();
    }
}
