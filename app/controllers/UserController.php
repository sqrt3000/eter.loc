<?php

namespace app\controllers;

use app\models\User;

class UserController extends AppController {

    public function loginAction(){
        if(!empty($_POST)){
            $user = new User();
            if($user->login()){
                $_SESSION['success'] = 'Вы успешно авторизованы';
                redirect('/user/cabinet');
            }else{
                $_SESSION['error'] = 'Логин/пароль введены неверно';
            }
            redirect();
        }
        $footer = \R::find('footer');
        $this->setMeta('carsparts.com.ua | Вход');
        $this->set(compact('footer'));
    }

    public function logoutAction(){
        if(isset($_SESSION['user'])) unset($_SESSION['user']);
        redirect(PATH);
    }

}