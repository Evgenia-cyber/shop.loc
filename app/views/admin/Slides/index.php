<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Все слайды
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= ADMIN; ?>"><i class="fa fa-dashboard"></i> Главная</a></li>
        <li class="active">Все слайды</li>
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
                                    <th>ID</th>
                                    <th>Изображение</th>
                                    <th>Описание</th>
                                    <th>Ссылка(название категории)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($slides as $slide): ?>
                                    <tr>
                                        <td><?=$slide['id'];?></td>
                                        <td class="col-md-4" ><img class="col-md-12" src="/images/<?=$slide['img']; ?>"></td>
                                        <td><?=($slide['description'])? $slide['description']:'Нет описания' ; ?></td>
                                         <td><?=($slide['alias'])?$slide['alias']:'Нет ссылки'; ?></td>
                                        <td>
                                            <a href="<?= ADMIN; ?>/slides/edit?id=<?= $slide['id']; ?>"><i class="fa fa-fw fa-pencil"></i></a>
                                            <a class="delete" href="<?= ADMIN; ?>/slides/delete?id=<?= $slide['id']; ?>"><i class="fa fa-fw fa-close text-danger"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->

