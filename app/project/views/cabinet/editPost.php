<?php if(isset($errors)): ?>
    <ul>
        <?php foreach ($errors as $error):?>
            <li><?= $error?></li>
        <?php endforeach;?>
    </ul>
<?php endif;?>
<form action="/cabinet/updatePost" method="post">
    <div class="form-group">
        <label for="article_id">Id статті</label>
        <input type="text" name="article_id" class="form-control" id="article_id" value="<?= $article['article_id'];?>" readonly>
    </div>
    <div class="form-group">
        <label for="user_id">Id користувача</label>
        <input type="text" class="form-control" id="user_id" value="<?= $article['user_id'];?>" readonly>
    </div>
    <div class="form-group">
        <label for="article_name">Назва статті</label>
        <textarea class="form-control" name="article_name" id="article_name" rows="4" style="resize: none"><?= $article['article_name'];?></textarea>
    </div>
    <div class="form-group">
        <label for="short_description">Короткий опис</label>
        <input type="text" name="short_description" class="form-control" id="short_description" value="<?= $article['short_description'];?>">
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