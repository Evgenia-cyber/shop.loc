<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Новая новость
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= ADMIN; ?>"><i class="fa fa-dashboard"></i> Главная</a></li>
        <li><a href="<?= ADMIN; ?>/news">Список новостей</a></li>
        <li class="active">Новая новость</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <form action="<?= ADMIN; ?>/news/add" method="post" data-toggle="validator">
                    <div class="box-body">
                        <div class="form-group has-feedback">
                            <label for="title">Заголовок</label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="Заголовок" required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="text">Текст новости</label>
                            <input type="text" name="text" class="form-control" id="text" placeholder="Текст новости" required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                         <div class="form-group has-feedback">
                            <label for="short_description">Краткое содержание новости</label>
                            <input type="text" name="short_description" class="form-control" id="short_description" placeholder="Краткое содержание новости, которое будет отображено в календаре событий" required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                         <div class="form-group has-feedback">
                            <label for="date">Дата и время</label>
                            <input type="datetime-local" name="date" class="form-control" id="date" placeholder="Дата и время новости" required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8">
                                <div class="box box-danger box-solid file-upload">
                                    <div class="box-header">
                                        <h3 class="box-title">Изображение</h3>
                                    </div>
                                    <div class="box-body">
                                        <div id="news-img" class="btn btn-success" data-url="/news/add-image" data-name="news-img">Выбрать файл</div>
                                        <p><small>Рекомендуемые размеры: 795х323</small></p>
                                        <div class="news-img"></div>
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