<?php

namespace app\controllers\admin;

use app\models\admin\FilterAttr;
use app\models\admin\FilterGroup;

class FilterController extends AppController {

    public function attributeGroupAction() {
        $attrs_group = \R::findAll('attribute_group');
        $this->setMeta('Группы фильтров');
        $this->set(compact('attrs_group'));
    }

    public function groupDeleteAction() {
        $id = $this->getRequestID();
        $count = \R::count('attribute_value', 'attr_group_id=?', [$id]);
        if ($count) {
            $_SESSION['error'] = "Удаление невозможно. В этой группе фильтров есть другие фильтры. Сначала удалите их.";
            redirect();
        }
        \R::exec('DELETE FROM attribute_group WHERE id=?', [$id]);
        $_SESSION['success'] = "Группа фильтров удалена";
        redirect();
    }

    public function groupAddAction() {
        if (!empty($_POST)) {
            $group = new FilterGroup();
            $data = $_POST;
            $group->load($data);
            if (!$group->validate($data)) {
                $group->getErrors();
                redirect();
            }
            if ($group->save('attribute_group', FALSE)) {
                $_SESSION['success'] = 'Группа фильтров добавлена';
                redirect();
            }
        }
        $this->setMeta('Новая группа фильтров');
    }

    public function attributeAction() {
        $attrs = \R::getAssoc("SELECT attribute_value.*, attribute_group.title FROM attribute_value JOIN attribute_group ON attribute_group.id=attribute_value.attr_group_id");
        $this->setMeta("Фильтры");
        $this->set(compact('attrs'));
    }

    public function attributeAddAction() {
        if (!empty($_POST)) {
            $attr = new FilterAttr();
            $data = $_POST;
            $attr->load($data);
            if (!$attr->validate($data)) {
                $attr->getErrors();
                redirect();
            }
            if ($attr->save('attribute_value', FALSE)) {
                $_SESSION['success'] = 'Фильтр добавлен';
                redirect();
            }
        }
        $group=\R::findAll('attribute_group');
        $this->setMeta('Новый фильтр');
        $this->set(compact('group'));
    }

}
