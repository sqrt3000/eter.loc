<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Панель управления
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN;?>"><i class="fa fa-dashboard"></i> Главная</a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-fuchsia">
                <div class="inner">
                    <h3><?=$countMails;?></h3>
                    <p>Почта (новые письма)</p>
                </div>
                <div class="icon">
                    <i class="ion ion-social-snapchat-outline"></i>
                </div>
                <a href="<?=ADMIN;?>/mails" class="small-box-footer">Детальнее <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->