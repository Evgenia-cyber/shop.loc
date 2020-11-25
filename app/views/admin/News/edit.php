<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Редактирование новости <?=$myNew->title?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= ADMIN; ?>"><i class="fa fa-dashboard"></i> Главная</a></li>
        <li><a href="<?= ADMIN; ?>/news">Список новостей</a></li>
        <li class="active">Редактирование новости</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <form action="<?= ADMIN; ?>/news/edit" method="post" data-toggle="validator">
                    <div class="box-body">
                        <div class="form-group has-feedback">
                            <label for="title">Заголовок</label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="Заголовок" value="<?=h($myNew->title)?>" required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="text">Текст новости</label>
                            <input type="text" name="text" class="form-control" id="text" placeholder="Текст новости" value="<?=h($myNew->text)?>" required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                         <div class="form-group has-feedback">
                            <label for="short_description">Краткое содержание новости</label>
                            <input type="text" name="short_description" class="form-control" id="short_description" placeholder="Краткое содержание новости, которое будет отображено в календаре событий" value="<?=h($myNew->short_description)?>" required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                         <div class="form-group has-feedback">
                            <label for="date">Дата и время</label>
                            <input name="date" class="form-control" id="date" placeholder="Дата и время новости" value="<?=h($myNew->date)?>" required>
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
                                        <div class="news-img">
                                             <img src="/images/<?=$myNew->img?>" alt="" data-id="<?=$myNew->id?>" data-src="<?=$myNew->img?>" class="del-news-img">
                                        </div>
                                    </div>
                                    <div class="overlay">
                                        <i class="fa fa-refresh fa-spin"></i>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>
                    <div class="box-footer">
                         <input type="hidden" name="id" value="<?=$myNew->id?>">
                        <button type="submit" class="btn btn-success">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->