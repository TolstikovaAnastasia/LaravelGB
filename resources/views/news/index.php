<?php foreach ($news as $n): ?>
    <div style="border: 1px solid green">
        <h2><?=$n['news_title']?></h2>
        <p><?=$n['news_description']?></p>
        <div><strong><?=$n['news_author']?> (<?=$n['news_created_at']?>)</strong>
            <a href="<?=route('news.show', ['news_id' => $n['news_id']])?>">Next</a>
        </div>
    </div>
<?php endforeach; ?>
