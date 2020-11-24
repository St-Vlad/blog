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
<div class="pagination">

    <a class="prev button" href="blog.html"><i class="fa fa-chevron-left"></i> Previous Page</a>
    <a class="next button" href="blog.html">Next Page <i class="fa fa-chevron-right"></i></a>

</div> <!-- .pagination -->
