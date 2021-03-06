
<!--banner-starts-->
<div class="bnr" id="home">
    <div  id="top" class="callbacks_container">
        <ul class="rslides" id="slider4">
            <?php foreach ($slides as $slide): ?>
                <li>
                    <?php if ($slide->alias): ?>
                        <a href="category/<?= $slide->alias ?>">
                            <img class="img-responsive" src="images/<?php echo $slide->img; ?>" alt="<?php echo $slide->alias ?>"/></a>
                    <?php else: ?>
                        <img class="img-responsive" src="images/<?php echo $slide->img; ?>" alt="watches"/>
                    <?php endif; ?>
                    <?php if ($slide->description): ?>
                        <p class="text-center"><?php echo $slide->description; ?></p>
                         <?php else: ?>
                        <p class="invisible">Нет описания слайда</p>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <div class="clearfix"> </div>
</div>
<!--banner-ends-->

<!--about-starts-->
<?php if ($brands): ?>
    <div class="about">
        <div class="container">
            <div class="about-top grid-1">
                <?php foreach ($brands as $brand): ?>
                    <div class="col-md-4 about-left">
                        <figure class="effect-bubba">
                            <img class="img-responsive" src="images/<?php echo $brand->img; ?>" alt="<?php echo $brand->title; ?>"/>
                            <figcaption>
                                <h2><?php echo $brand->title; ?></h2>
                                <p><?php echo $brand->description; ?></p>
                            </figcaption>
                        </figure>
                    </div>
                <?php endforeach; ?>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
<?php endif; ?>
<!--about-end-->
<!--product-starts-->
<?php if ($hits): ?>
    <?php $curr = shop\App::$app->getProperty('currency'); ?>
    <div class="product">
        <div class="container">
            <div class="product-top">
                <div class="product-one">
                    <?php foreach ($hits as $hit): ?>
                        <div class="col-md-3 product-left">
                            <div class="product-main simpleCart_shelfItem">
                                <a href="product/<?= $hit->alias ?>" class="mask"><img class="img-responsive zoom-img" src="images/<?= $hit->img; ?>" alt="" /></a>
                                <div class="product-bottom">
                                    <h3><a href="product/<?= $hit->alias; ?>"><?= $hit->title; ?></a></h3>
                                    <p>Explore Now</p>
                                    <h4><a data-id="<?= $hit->id ?>" class="add-to-cart-link" href="cart/add?id=<?= $hit->id; ?>"><i></i></a> <span class=" item_price"><?= $curr['symbol_left'] ?><?= $hit->price * $curr['value']; ?><?= $curr['symbol_right'] ?></span>
                                        <?php if ($hit->old_price): ?>
                                            <small>
                                                <del><?= $curr['symbol_left'] ?><?= $hit->old_price * $curr['value']; ?><?= $curr['symbol_right'] ?></del>
                                            </small>
                                        <?php endif; ?>
                                    </h4>
                                </div>
                                <div class="srch">
                                    <span>-50%</span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<!--product-end-->
