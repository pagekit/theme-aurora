<?php $view->script('posts', 'blog:app/bundle/posts.js', 'vue') ?>

<?php foreach ($posts as $post) : ?>
<article class="uk-article tm-article-blog">

    <h1 class="uk-article-title"><a href="<?= $view->url('@blog/id', ['id' => $post->id]) ?>"><?= $post->title ?></a></h1>

    <p class="uk-article-meta">
        <?= __('Written by %name% on %date%', ['%name%' => $post->user->name, '%date%' => '<time datetime="'.$post->date->format(\DateTime::W3C).'" v-cloak>{{ "'.$post->date->format(\DateTime::W3C).'" | date "longDate" }}</time>' ]) ?>
    </p>

    <?php if ($image = $post->get('image.src')): ?>
    <a class="uk-display-block" href="<?= $view->url('@blog/id', ['id' => $post->id]) ?>"><img src="<?= $image ?>" alt="<?= $post->get('image.alt') ?>"></a>
    <?php endif ?>

    <div class="uk-margin"><?= $post->excerpt ?: $post->content ?></div>

    <p>
        <?php if (isset($post->readmore) && $post->readmore || $post->excerpt) : ?>
        <a class="uk-button uk-button-link tm-article-button-link" href="<?= $view->url('@blog/id', ['id' => $post->id]) ?>"><?= __('Read more') ?></a>
        <?php endif ?>

        <?php if ($post->isCommentable() || $post->comment_count) : ?>
        <a class="uk-button uk-button-link tm-article-button-link" href="<?= $view->url('@blog/id#comments', ['id' => $post->id]) ?>"><?= _c('{0} No comments|{1} %num% Comment|]1,Inf[ %num% Comments', $post->comment_count, ['%num%' => $post->comment_count]) ?></a>
        <?php endif ?>
    </p>

</article>

<hr class="uk-article-divider">

<?php endforeach ?>

<?php

    $range     = 3;
    $total     = intval($total);
    $page      = intval($page);
    $pageIndex = $page - 1;

?>

<?php if ($total > 1) : ?>
<ul class="uk-pagination">


    <?php for($i=1;$i<=$total;$i++): ?>
        <?php if ($i <= ($pageIndex+$range) && $i >= ($pageIndex-$range)): ?>

            <?php if ($i == $page): ?>
            <li class="uk-active"><span><?=$i?></span></li>
            <?php else: ?>
            <li>
                <a href="<?= $view->url('@blog/page', ['page' => $i]) ?>"><?=$i?></a>
            <li>
            <?php endif; ?>

        <?php elseif($i==1): ?>

            <li>
                <a href="<?= $view->url('@blog/page', ['page' => 1]) ?>">1</a>
            </li>
            <li><span>...</span></li>

        <?php elseif($i==$total): ?>

            <li><span>...</span></li>
            <li>
                <a href="<?= $view->url('@blog/page', ['page' => $total]) ?>"><?=$total?></a>
            </li>

        <?php endif; ?>
    <?php endfor; ?>


</ul>
<?php endif ?>
