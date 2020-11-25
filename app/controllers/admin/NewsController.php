<?php

namespace app\controllers\admin;

use shop\libs\Pagination;

class NewsController extends AppController {

    public function indexAction() {
        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        $perpage = 3;
        $count = \R::count('news');
        $pagination = new Pagination($page, $perpage, $count);
        $start = $pagination->getStart();
        $news = \R::getAll("SELECT `news`.`id`,`news`.`date`,`news`.`title`,`news`.`short_description`,`news`.`views` FROM `news` ORDER BY date DESC LIMIT $start, $perpage");
        $this->setMeta('Новости магазина');
        $this->set(compact('news', 'pagination', 'count'));
    }

    public function addAction() {
        if (!empty($_POST)) {
            $myNew = new \app\models\admin\News();
            $data = $_POST;
            $myNew->load($data);
            $myNew->getImg();
            if (!$myNew->validate($data)) {
                $myNew->getErrors();
                redirect();
            }
            if ($myNew->save('news')) {
                $_SESSION['success'] = "Новость {$myNew->attributes['title']} добавлена";
                redirect();
            }
        }
        $this->setMeta('Новая новость');
    }

    public function addImageAction() {
        if (isset($_GET['upload'])) {
            if ($_POST['name'] == 'news-img') {
                $wmax = \shop\App::$app->getProperty('news_img_width');
                $hmax = \shop\App::$app->getProperty('news_img_height');
            }
            $name = $_POST['name'];
            \app\models\admin\Image::uploadImg($name, $wmax, $hmax);
        }
    }

    public function editAction() {
        if (!empty($_POST)) {
            $id = $this->getRequestID(FALSE);
            $myNew = new \app\models\admin\News();
            $data = $_POST;
            $myNew->load($data);
            $myNew->getImg();
            if (!$myNew->validate($data)) {
                $myNew->getErrors();
                redirect();
            }
            if ($myNew->update('news', $id)) {
                $_SESSION['success'] = 'Изменения сохранены';
                redirect();
            }
        }
        $id = $this->getRequestID();
        $myNew = \R::load('news', $id);
        $this->setMeta("Редактирование новости {$myNew->title}");
        $this->set(compact('myNew'));
    }

    public function deleteNewsImgAction() {
        $id = isset($_POST['id']) ? $_POST['id'] : null;
        $src = isset($_POST['src']) ? $_POST['src'] : null;
        if (!$id || !$src) {
            return;
        }
        if (\R::exec("UPDATE news SET img=null WHERE id=?", [$id])) {
            @unlink(WWW . "/images/$src");
            exit('1');
        }
        return;
    }

    public function deleteAction() {
        $id = $this->getRequestID();
        $myNews = \R::load('news', $id);
        \R::trash($myNews);
        $_SESSION['success'] = 'Новость удалена';
        redirect();
    }

}
