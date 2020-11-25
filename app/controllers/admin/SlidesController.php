<?php

namespace app\controllers\admin;

class SlidesController extends AppController {

    public function indexAction() {
        $slides = \R::getAll("SELECT * FROM `slides`");
        $this->setMeta('Слайды магазина');
        $this->set(compact('slides'));
    }

    public function addAction() {
        if (!empty($_POST)) {
            $slide = new \app\models\admin\Slide();
            $data = $_POST;
            $slide->load($data);
            $slide->getImg();
            if (!array_key_exists('img', $slide->attributes)) {
                $_SESSION['error'] = "Добавьте изображение!";
                redirect();
            }
            if ($slide->save('slides')) {
                $_SESSION['success'] = "Слайд добавлен";
                redirect();
            }
        }
        $this->setMeta('Новый слайд');
    }

    public function addImageAction() {
        if (isset($_GET['upload'])) {
            if ($_POST['name'] == 'slide-img') {
                $wmax = \shop\App::$app->getProperty('slide_img_width');
                $hmax = \shop\App::$app->getProperty('slide_img_height');
            }
            $name = $_POST['name'];
            \app\models\admin\Image::uploadImg($name, $wmax, $hmax);
        }
    }

    public function editAction() {
        if (!empty($_POST)) {
            $id = $this->getRequestID(FALSE);
            $slide = new \app\models\admin\Slide();
            $data = $_POST;
            $slide->load($data);
            $slide->getImg();
            $res = $slide->getImgFromDB($id);
            if (!array_key_exists('img', $slide->attributes)&& !$res) {
                $_SESSION['error'] = "Добавьте изображение!";
                redirect();
            }
            if ($slide->update('slides', $id)) {
                $_SESSION['success'] = 'Изменения сохранены';
                redirect();
            }
        }
        $id = $this->getRequestID();
        $slide = \R::load('slides', $id);
        $this->setMeta("Редактирование слайда");
        $this->set(compact('slide'));
    }

    public function deleteSlideImgAction() {
        $id = isset($_POST['id']) ? $_POST['id'] : null;
        $src = isset($_POST['src']) ? $_POST['src'] : null;
        if (!$id || !$src) {
            return;
        }
        if (\R::exec("UPDATE slides SET img=null WHERE id=?", [$id])) {
            @unlink(WWW . "/images/$src");
            exit('1');
        }
        return;
    }

    public function deleteAction() {
        $id = $this->getRequestID();
        $slide = \R::load('slides', $id);
        \R::trash($slide);
        $_SESSION['success'] = 'Слайд удалён';
        redirect();
    }

}
