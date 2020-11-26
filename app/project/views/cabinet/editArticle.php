<?php if (!$article): ?>
    <p>Такої статті не існує</p>
<?php else: ?>
    <?php if(isset($errors)): ?>
        <ul>
            <?php foreach ($errors as $error):?>
                <li><?= $error?></li>
            <?php endforeach;?>
        </ul>
    <?php endif;?>
    <form action="/cabinet/editArticle/<?= $article->getArticleId(); ?>" method="post">
        <div class="form-group">
            <input type="hidden" name="CSRFtoken" class="form-control" id="secret" value="<?php echo $_SESSION['CSRFtoken'];?>">
        </div>
        <div class="form-group">
            <input type="hidden" name="article_id" class="form-control" value="<?= $article->getArticleId(); ?>">
        </div>
        <div class="form-group">
            <label for="article_title">Назва статті</label>
            <input type="text" name="article_title" class="form-control" id="article_title" value="<?= $article->getArticleTitle(); ?>">
        </div>
        <div class="form-group">
            <label for="article_description">Короткий опис</label>
           <textarea class="form-control" name="article_description" id="article_description" rows="4" style="resize: none"><?= $article->getArticleDescription(); ?></textarea>
        </div>
        <div class="form-group">
        <label for="article_text">Текст статті</label>
        <textarea class="form-control" name="article_text" id="article_text" rows="10" style="resize: none"><?= $article->getArticleDescription(); ?></textarea>
    </div>
    <div class="form-check">
        <input type="checkbox" name="status" class="form-check-input" id="exampleCheck1" <?php if((int)$article->getStatus() === 1) {echo "checked";}?>>
        <label class="form-check-label" for="exampleCheck1">Опублікована</label>
    </div>
    <input type="submit" name="submit" class="btn btn-primary" value="Змінити статтю"/>
</form>
<?php endif;?>