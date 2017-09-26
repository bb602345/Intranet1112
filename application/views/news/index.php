<h2><?php echo $title; ?></h2>

<?php foreach ($news as $news_item){ ?>

        <h3><?=$news_item['chr_title']?></h3>
        <div class="main">
                <?=$news_item['chr_text']?>
        </div>
        <p><a href="<?='/news/'.$news_item['chr_slug']?>">View article</a></p>

<?php }; ?>
