<?php

namespace app\controllers\admin;

class MainController extends AppController {

    public function indexAction(){
        $countMails = \R::count('sitemail', "status='1'");
        $this->setMeta('Панель управления');
        $this->set(compact('countMails'));
    }

}