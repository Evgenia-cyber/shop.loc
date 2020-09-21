<?php

namespace app\controllers;

use app\models\User;

class UserController extends AppController {
public function signupAction(){
    if(!empty($_POST)){
            $user = new User();
            $data = $_POST;
            $user->load($data);
            if(!$user->validate($data) || !$user->checkUnique()){
                $user->getErrors();
                $_SESSION['form_data'] = $data;
            }else{
                $user->attributes['password'] = password_hash($user->attributes['password'], PASSWORD_DEFAULT);
//                    debug($data);
                  if($id=$user->save('user')){
                    $_SESSION['success'] = 'Вы успешно зарегистрировались';
                    foreach($data as $k => $v){
                    if($k != 'password'){ $_SESSION['user'][$k] = $v;}
                    }
                     $_SESSION['user']['id'] = $id;
                     redirect(PATH);
                }else{
                    $_SESSION['error'] = 'Ошибка!';
                    redirect();
                }
            }

    }
    $this->setMeta('Регистрация');
}

   public function loginAction(){
        if(!empty($_POST)){
            $user = new User();
            if($user->login()){
                $_SESSION['success'] = 'Вы успешно авторизовались';
                redirect(PATH);
            }else{
                $_SESSION['error'] = 'Вы ввели неправильный логин или пароль!';
            }
            redirect();
        }
        $this->setMeta('Вход');
    }

   public function logoutAction(){
        if(isset($_SESSION['user'])) unset($_SESSION['user']);
        redirect();
    }

}
