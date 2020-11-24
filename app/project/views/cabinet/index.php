<?php if (empty($articles)):?>
    <h2>Тут пусто</h2>
    <p>Створіть свою першу статтю: <a href="/cabinet/createArticle">Створити статтю</a></p>
<?php else:?>
    <?php foreach ($articles as $article):?>
        <article class="post summary hentry" itemscope itemprop="blogPost" itemtype="http://schema.org/BlogPosting">
            <header class="entry-header">
                <h2 class="entry-title" itemprop="headline"><?= $article['article_title'];?></h2>
                <span class="post-date">
                <i class="fa fa-clock-o fa-fw"></i>
            <span class="created"><?= $article['creation_date'];?></span>
        </span> <!-- .post-date -->
                <div class="entry-meta">
            <span class="post-status">
                <i class="fa fa-check" aria-hidden="true"></i>
                Status:
                    <?php if ((int)$article['status'] === 0):?>
                        <span class="vcard">Неопубліковано</span>
                    <?php else:?>
                        <span class="vcard">Опубліковано</span>
                    <?php endif;?>
            </span>
                    <span>
                <i class="fa fa-pencil" aria-hidden="true"></i>
                <a href="/cabinet/editPost/<?php echo $article['article_id'];?>">edit</a>
            </span>
                    <span>
                <i class="fa fa-trash" aria-hidden="true"></i>
                <a href="/cabinet/deletePost/<?php echo $article['article_id'];?>">delete</a>
            </span>

                </div> <!-- .entry-meta -->

            </header> <!-- .entry-header -->
            <div class="entry-summary" itemprop="articleBody">
                <p><?= $article['article_description'];?></p>
                <a class="more button" href="/article/<?= $article['article_id'];?>">Детальніше</a>
                <hr>
            </div> <!-- .entry-summary -->
        </article> <!-- .post.summary -->
    <?php endforeach;?>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <?php for ($i = 1; $i <= $pageCount; $i++):?>
                <li class="page-item"><a class="page-link" href="/page/<?= $i;?>"><?= $i;?></a></li>
            <?php endfor;?>
        </ul>
    </nav>
<?php endif;?>