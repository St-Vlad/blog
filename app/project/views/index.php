<?php if (empty($articles)):?>
    <h2>На цій сторінці пусто</h2>
<?php else:?>
<?php foreach ($articles as $article):?>
    <article class="post summary hentry" itemscope itemprop="blogPost">
        <header class="entry-header">
            <h2 class="entry-title" itemprop="headline"><?= $article->getArticleTitle();?></h2>
            <div class="entry-meta">
                <span class="post-date">
                    <i class="fa fa-clock-o fa-fw"></i> <span class="created"><?= $article->getCreationDate();?></span>
                </span> <!-- .post-date -->
            </div> <!-- .entry-meta -->
        </header> <!-- .entry-header -->
        <div class="entry-summary" itemprop="articleBody">
            <p><?= $article->getArticleDescription();?></p>
            <a class="more button" href="/article/<?= $article->getArticleId();?>">Детальніше</a>
        </div> <!-- .entry-summary -->
        <hr>
    </article> <!-- .post.summary -->
<?php endforeach;?>
<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <?php for ($i = 1; $i <= $pageCount; $i++):?>
        <li class="page-item"><a class="page-link" href="/page/<?= $i;?>"><?= $i;?></a></li>
        <?php endfor;?>
    </ul>
</nav>
<?php endif; ?>