<?php

namespace app\controllers;

use app\models\Sitemail;

class SitemailController extends AppController {

    public static function addToMail(){

        if (!empty($_POST)) {

            $data['theme'] = h($_POST['theme']);
            $data['user_phone'] = h($_POST['phone']);
            $data['user_name'] = h($_POST['name']);
            $data['user_mail'] = h($_POST['mail']);
            $data['content'] = h($_POST['content']);

            Sitemail::saveMail($data);
            $_SESSION['success'] = 'Благодарим за Ваш интерес к нам! Менеджер свяжется с Вами в ближайшее время.';
            redirect();
        }

    }

}