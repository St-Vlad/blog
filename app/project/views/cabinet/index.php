<?php if (empty($articles)): ?>
    <h2>На цій сторінці пусто</h2>
<?php else: ?>
<?php foreach ($articles as $article):?>
        <article class="post summary hentry" itemscope itemprop="blogPost" itemtype="http://schema.org/BlogPosting">
            <header class="entry-header">
                <h2 class="entry-title" itemprop="headline"><?= $article->getArticleTitle(); ?></h2>
                <span class="post-date">
                <i class="fa fa-clock-o fa-fw"></i>
            <span class="created"><?= $article->getCreationDate(); ?></span>
        </span> <!-- .post-date -->
                <div class="entry-meta">
            <span class="post-status">
                <i class="fa fa-check" aria-hidden="true"></i>
                Status:
                    <?php if ((int)$article->getStatus() === 0):?>
                        <span class="vcard">Неопубліковано</span>
                    <?php else:?>
                        <span class="vcard">Опубліковано</span>
                    <?php endif;?>
            </span>
                    <span>
                <i class="fa fa-pencil" aria-hidden="true"></i>
                <a href="/cabinet/editArticle/<?php echo $article->getArticleId(); ?>">edit</a>
            </span>
                    <span>
                <i class="fa fa-trash" aria-hidden="true"></i>
                <a href="/cabinet/deleteArticle/<?php echo $article->getArticleId(); ?>">delete</a>
            </span>

                </div> <!-- .entry-meta -->

            </header> <!-- .entry-header -->
            <div class="entry-summary" itemprop="articleBody">
                <p><?= $article->getArticleDescription(); ?></p>
                <a class="more button" href="/article/<?= $article->getArticleId(); ?>">Детальніше</a>
                <hr>
            </div> <!-- .entry-summary -->
        </article> <!-- .post.summary -->
    <?php endforeach;?>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <?php for ($i = 1; $i <= $pageCount; $i++):?>
                <li class="page-item"><a class="page-link" href="/cabinet/page/<?= $i;?>"><?= $i;?></a></li>
            <?php endfor;?>
        </ul>
    </nav>
<?php endif;?>