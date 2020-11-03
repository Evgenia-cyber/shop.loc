<?php

namespace app\controllers;

use app\models\User;

class UserController extends AppController {

    public function signupAction() {
        if (!empty($_POST)) {
            $user = new User();
            $data = $_POST;
//            if (array_key_exists('role', $data)) {
//                 $data['role'] = 'user';
//            }
            $user->load($data);
            if (!$user->validate($data) || !$user->checkUnique()) {
                $user->getErrors();
                $_SESSION['form_data'] = $data;
            } else {
                $user->attributes['password'] = password_hash($user->attributes['password'], PASSWORD_DEFAULT);
//                    debug($data);
                if ($id = $user->save('user')) {
                    $_SESSION['success'] = 'Вы успешно зарегистрировались';
                    foreach ($data as $k => $v) {
                        if ($k != 'password') {
                            $_SESSION['user'][$k] = $v;
                        }
                    }
                    $_SESSION['user']['id'] = $id;
                    redirect(PATH);
                } else {
                    $_SESSION['error'] = 'Ошибка!';
                    redirect();
                }
            }
        }
        $this->setMeta('Регистрация');
    }

    public function loginAction() {
        if (!empty($_POST)) {
            $user = new User();
            if ($user->login()) {
                $_SESSION['success'] = 'Вы успешно авторизовались';
                redirect(PATH);
            } else {
                $_SESSION['error'] = 'Вы ввели неправильный логин или пароль!';
            }
            redirect();
        }
        $this->setMeta('Вход');
    }

    public function logoutAction() {
        if (isset($_SESSION['user']))
            unset($_SESSION['user']);
        redirect();
    }

    public function newPswAction() {
        if (!empty($_POST)) {
            $email = $_POST['email'];
            $hasEmail = \R::count('user', 'email = ?', [$email]); //0 или 1
            if ($hasEmail) {
                $recovery_psw = new \app\models\RecoveryPSW();
                $recovery_psw->attributes['email'] = $email;
                $recovery_psw->attributes['time'] = time();
                $recovery_psw->attributes['hash'] = password_hash($recovery_psw->attributes['time'], PASSWORD_DEFAULT);
                if ($id = $recovery_psw->save('psw_recovery', FALSE)) {
                    $_SESSION['hash'] = $recovery_psw->attributes['hash'];
                    $_SESSION['email'] = $recovery_psw->attributes['email'];
                    //отправить письмо с hash
                    $user_email = $recovery_psw->attributes['email'];
                    \app\models\RecoveryPSW::mailNewPsw($user_email);
                    $_SESSION['success'] = 'Мы отправили на Ваш email ссылку для восстановления пароля';
                    redirect(PATH);
                }
            } else {
                $_SESSION['error'] = 'К сожалению, нет такого email.';
            }
            redirect();
        }
        $this->setMeta('Восстановление пароля');
    }

    public function newUserPswAction() {
        $hash_from_user = $_GET['getPass'];
        if ($hash_from_user) {
            $dataToRecovery = \R::getRow('SELECT * FROM `psw_recovery` WHERE `hash` LIKE :hash LIMIT 1', ['hash' => "%$hash_from_user%"]);
            if (!$dataToRecovery) {
                $_SESSION['error'] = 'К сожалению, ссылка недействительна. Повторите действия по восстановлению пароля заново.';
                redirect(PATH . "/user/new-psw");
            }
            $difference = (time() - $dataToRecovery['time']) / 60; //минуты
            if ($difference > 60) {
                \R::exec('DELETE FROM `psw_recovery` WHERE `hash`=?', [$hash_from_user]);
                $_SESSION['error'] = 'К сожалению, срок действия ссылки истек. Повторите действия по восстановлению пароля заново.';
                redirect(PATH . "/user/new-psw");
            }
            redirect(PATH . "/user/save-user-psw");
        }
        redirect(PATH);
    }

    public function saveUserPswAction() {
        if (!empty($_POST)) {
            $email = $_SESSION['email'];
            $new_psw = trim($_POST['password']);
            $new_psw = password_hash($new_psw, PASSWORD_DEFAULT);
            \R::exec('UPDATE `user` SET `password`=? WHERE `email`=?', [$new_psw, $email]);
            $user = \R::findOne('user', "email = ?", [$email]);
            if ($user) {
                foreach ($user as $k => $v) {
                    if ($k != 'password')
                        $_SESSION['user'][$k] = $v;
                }
            }
            unset($_SESSION['email']);
            $_SESSION['success'] = 'Вы успешно изменили пароль';
            redirect(PATH);
        }
        $this->setMeta('Восстановление пароля');
    }

}
