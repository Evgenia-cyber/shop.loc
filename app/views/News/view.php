<!--start-breadcrumbs-->
<div class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-main">
            <ol class="breadcrumb">
                <li><a href="<?= PATH ?>">Home</a></li>
                <li>News</li>
            </ol>
        </div>
    </div>
</div>
<!--end-breadcrumbs-->
<!--prdt-starts-->
<div class="prdt">
    <div class="container">
        <div class="prdt-top">
            <div class="col-md-9 prdt-left">
                <?php if (!empty($news)): ?>
                    <div>
                        <?php foreach ($news as $new): ?>
                            <div class="col-md-12">
                                <div  class="news-one">
                                    <a href="news?id=<?= $new->id ?>" class="mask"><img class="img-responsive zoom-img" src="images/<?= $new->img ?>" alt="" /></a>
                                    <div>
                                        <h3><?= $new->title ?></h3>
                                        <p class="news-text"><a data-id="<?= $new->id ?>" href="news?id=<?= $new->id ?>">
                                                <?= $new->text ?>
                                            </a>
                                        </p>
                                        <div>
                                            <div> <?= $new->date ?></div>
                                            <div><span class="glyphicon glyphicon-eye-open"></span> <?= $new->views ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <div class="clearfix"></div>
                        <div class="text-center">
                            <?php if ($pagination->countPages > 1): ?>
                                <?= $pagination; ?>
                            <?php endif; ?>
                        </div>

                    </div>
                <?php else: ?>
                    <h3>Новостей пока нет</h3>
                <?php endif; ?>
            </div>
            <div class="col-md-3 prdt-right">
                <div class="w_sidebar">
                    <div id="calendar"></div>
                    <?php new widgets\news\News(3); ?>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!--product-end-->



