<!--start-breadcrumbs-->
<div class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-main">
            <ol class="breadcrumb">
                <li><a href="<?= PATH ?>">Home</a></li>
                <li><a href="<?= PATH ?>/news/view">News</a></li>
                <li><?= $new->title ?></li>
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
                <?php if (!empty($new)): ?>
                    <div>
                        <div class="col-md-12">
                            <div  class="news-one">
                                <a href="news?id=<?= $new->id ?>" class="mask"><img class="img-responsive zoom-img" src="images/<?= $new->img ?>" alt="" /></a>
                                <div>
                                    <h3><?= $new->title ?></h3>
                                    <p><a data-id="<?= $new->id ?>" href="news?id=<?= $new->id ?>">
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
                        <div class="clearfix"></div>

                        <div class="text-right">
                            <a href="<?= PATH ?>/news/view" class="back-to-news">Back</a>
                        </div>

                    </div>
                <?php endif; ?>
            </div>
            <div class="col-md-3 prdt-right">
                <div class="w_sidebar">
                    <?php new widgets\news\News(); ?>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!--product-end-->



