<?php foreach ($this->news as $new):?>
    <div  class="news-one-sidebar">
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
<?php endforeach; ?>
