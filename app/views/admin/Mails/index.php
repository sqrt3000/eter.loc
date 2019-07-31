<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        45 последних входящих сообщений (писем)
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN;?>"><i class="fa fa-dashboard"></i> Главная</a></li>
        <li class="active">Входящая почта</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Имя Отправителя</th>
                                <th>Содержание</th>
                                <th>Почта Отправителя</th>
                                <th>Телефон Отправителя</th>
                                <th>Дата</th>
                                <th>Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($mails as $mail): ?>
                                <tr>
                                    <td><?=$mail['user_name'];?></td>
                                    <td><?=$mail['content'];?></td>
                                    <td><?=$mail['user_mail'];?></td>
                                    <td><?=$mail['user_phone'];?></td>
                                    <td><?=$mail['date'];?></td>
                                    <td><a class="delete" href="<?=ADMIN;?>/mails/delete?id=<?=$mail['id'];?>"><i class="fa fa-fw fa-close text-danger"></i></a></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center">
                        <p>(<?=count($mails);?> писем из <?=$count;?>)</p>
                        <?php if($pagination->countPages > 1): ?>
                            <?=$pagination;?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->