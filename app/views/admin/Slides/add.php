<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Новый слайд
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= ADMIN; ?>"><i class="fa fa-dashboard"></i> Главная</a></li>
        <li><a href="<?= ADMIN; ?>/slides">Все слайды</a></li>
        <li class="active">Новый слайд</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <form action="<?= ADMIN; ?>/slides/add" method="post" data-toggle="validator">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="alias">Ссылка(название категории)</label>
                            <input type="text" name="alias" class="form-control" id="alias" placeholder="Ссылка(название категории)">
                        </div>
                        <div class="form-group">
                            <label for="description">Описание</label>
                            <input type="text" name="description" class="form-control" id="description" placeholder="Описание">
                        </div>
                        <div class="form-group">
                            <div class="col-md-8">
                                <div class="box box-danger box-solid file-upload">
                                    <div class="box-header">
                                        <h3 class="box-title">Изображение</h3>
                                    </div>
                                    <div class="box-body">
                                        <div id="slide-img" class="btn btn-success" data-url="/slides/add-image" data-name="slide-img">Выбрать файл</div>
                                        <p><small>Рекомендуемые размеры: 1600х650</small></p>
                                        <div class="slide-img"></div>
                                    </div>
                                    <div class="overlay">
                                        <i class="fa fa-refresh fa-spin"></i>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-success">Добавить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->