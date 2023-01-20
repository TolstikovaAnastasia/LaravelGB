<?php foreach ($categories as $c): ?>
    <div style="border: 1px solid black">
        <h2><?=$c['category_title']?></h2>
        <p><?=$c['category_description']?></p>
        <div><strong><?=$c['category_author']?> (<?=$c['category_created_at']?>)</strong>
            <a href="<?=route('categories.show', ['category_id' => $c['category_id']])?>">Next</a>
        </div>
        <div>
            <a href="<?=route('news')?>">Next</a>
        </div>
    </div>
<?php endforeach; ?>

