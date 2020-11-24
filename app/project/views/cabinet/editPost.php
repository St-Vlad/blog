<?php if(isset($errors)): ?>
    <ul>
        <?php foreach ($errors as $error):?>
            <li><?= $error?></li>
        <?php endforeach;?>
    </ul>
<?php endif;?>
<form action="/cabinet/updateArticle" method="post">
    <div class="form-group">
        <label for="article_name">Назва статті</label>
        <textarea class="form-control" name="article_name" id="article_name" rows="4" style="resize: none"><?= $article['article_title'];?></textarea>
    </div>
    <div class="form-group">
        <label for="short_description">Короткий опис</label>
        <input type="text" name="short_description" class="form-control" id="short_description" value="<?= $article['article_description'];?>">
    </div>
    <div class="form-group">
        <label for="article_text">Текст статті</label>
        <textarea class="form-control" name="article_text" id="article_text" rows="10" style="resize: none"><?= $article['article_text'];?></textarea>
    </div>
    <div class="form-check">
        <input type="checkbox" name="publish_status" class="form-check-input" id="exampleCheck1" <?php if((int)$article['status'] === 1) {echo "checked";}?>>
        <label class="form-check-label" for="exampleCheck1">Опублікована</label>
    </div>
    <input type="submit" name="submit" class="btn btn-primary" value="Змінити статтю"/>
</form>