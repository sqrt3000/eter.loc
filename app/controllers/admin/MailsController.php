<?php

namespace app\controllers\admin;

use eter\libs\Pagination;
use RedBeanPHP\R;

class MailsController extends AppController {

    public function indexAction(){
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = 15;
        $count = 45;
        $pagination = new Pagination($page, $perpage, $count);
        $start = $pagination->getStart();
        $mails = \R::find('sitemail', "ORDER BY date DESC LIMIT $start, $perpage");
        $this->setMeta('Входящие сообщения');
        $this->set(compact('mails', 'pagination', 'count'));
    }

    public function deleteAction(){
        $id = $_GET['id'];
        R::exec("DELETE FROM sitemail WHERE id = ?" , [$id]);
        $_SESSION['success'] = 'Письмо успешно удалено!';
        redirect();
    }

}