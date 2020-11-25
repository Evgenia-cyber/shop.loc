<?php

namespace widgets\news;

class News {

    public $news_count;
    public $tpl;
    public $news;

    public function __construct($news_count = 2, $tpl = '') {
        $this->news_count = $news_count;
        $this->tpl = $tpl ?: __DIR__ . '/news_tpl.php';
        $this->news = $this->getNews();
        echo $this->getHTML();
    }

    protected function getNews() {
        return \R::findAll('news', "ORDER BY views DESC LIMIT $this->news_count");
    }

    protected function getHTML(){
        ob_start();
        require_once $this->tpl;
        return ob_get_clean();
    }

}
