<?php

namespace app\models;

class Sitemail extends AppModel {

    public static function saveMail($data){
        $mail = \R::dispense('sitemail');
        $mail->theme = $data['theme'];
        $mail->content = $data['content'];
        $mail->user_name = $data['user_name'];
        $mail->user_mail = $data['user_mail'];
        $mail->user_phone = $data['user_phone'];
        $mail = \R::store($mail);
    }

    public static function subscribe($data){
        $mail = \R::dispense('subscribes');
        $mail->sub_mail = $data['sub_mail'];
        $mail = \R::store($mail);
    }

}