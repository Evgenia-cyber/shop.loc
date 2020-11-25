<?php

namespace app\controllers;

use shop\App;
use shop\libs\Pagination;

class NewsController extends AppController {

    public function viewAction() {
        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        $perpage = App::$app->getProperty('pagination');
        $total = \R::count('news');
        $pagination = new Pagination($page, $perpage, $total);
        $start = $pagination->getStart();
        $news = \R::findAll('news', "ORDER BY date DESC LIMIT $start, $perpage");

        if ($this->isAjax()) {
            $newsForEventsCalendar = \R::getAll("SELECT `news`.`id`,`news`.`date`,`news`.`title`,`news`.`short_description` FROM `news`");
            echo $this->getJSON($newsForEventsCalendar);
            die();
        }

        $this->setMeta("Новости");
        $this->set(compact('news', 'pagination'));
    }

    protected function getJSON($array) {
        $data = '[';
	foreach($array as $item){
		$data .= '{ "date": "' . $item['date'] . '", "title": "' . $item['title'] . '", "description": "' . $item['short_description'] . '", "url": "/news?id=' . $item['id'] . '" },';
	}
        $data = substr($data, 0, -1);
	$data .= ']';
	return $data;
    }

    public function indexAction() {
        $id = $_GET['id'];
        \R::exec("UPDATE news SET views=views+1 WHERE id=?", [$id]);
        $new = \R::findOne('news', "id=?", [$id]);
        $this->setMeta($new->title);
        $this->set(compact('new'));
    }

}
