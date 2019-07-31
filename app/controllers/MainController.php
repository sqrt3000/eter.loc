<?php

namespace app\controllers;

use app\models\Sitemail;

class MainController extends AppController {

    public function indexAction(){
        $canonical = PATH;
        SitemailController::addToMail();
        $this->setMeta('Eter.dp.ua | IT-лабораторія Eter-City-Dnipro | Разработка веб-приложений, настройка домена, хостинга, SEO, сайт под ключ, интернет магазин', 'Eter.dp.ua | IT-лабораторія Eter-City-Dnipro | IT-лаборатория Eter-City-Dnipro | Разработка веб-приложений, настройка домена, хостинга, SEO', 'eter.dp.ua | IT-лабораторія Eter-City-Dnipro | IT-лаборатория Eter-City-Dnipro | Разработка веб-приложений, настройка домена, хостинга, SEO, сайт под ключ, интернет магазин');
        $this->set(compact('canonical'));
    }

    public function subscribeAction(){

        if (!empty($_POST)){
            $data['sub_mail'] = h($_POST['submail']);

            Sitemail::subscribe($data);
            $_SESSION['success'] = 'Ваш E-mail успешно добавлен в базу данных для рассылки!';
            redirect();
        }

    }

}