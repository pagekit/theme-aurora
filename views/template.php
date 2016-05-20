<!DOCTYPE html>
<html class="<?= $params['html_class'] ?>" lang="<?= $intl->getLocaleTag() ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= $view->render('head') ?>
        <?php $view->style('theme', $params['style'] ? 'theme:css/theme.'.$params['style'].'.css' : 'theme:css/theme.css') ?>
        <?php $view->script('verticalDropdown', 'theme:js/verticalDropdown.js', ['jquery']) ?>
        <?php $view->script('theme', 'theme:js/theme.js', ['uikit-sticky',  'uikit-lightbox',  'uikit-parallax', 'uikit-slideshow', 'verticalDropdown']) ?>
    </head>

    <body <?= $params['classes.body'] ?>>

        <div class="uk-grid tm-wrapper" data-uk-grid-match>

            <div class="uk-width-1-1 tm-sidebar-wrapper uk-hidden-medium uk-hidden-small">

                <?php if ($params['logo'] || $view->menu()->exists('main') || $view->position()->exists('sidebar_menu')) : ?>
                <div class="tm-sidebar-menu-container" <?= $params['classes.sticky'] ?>>

                    <a class="tm-sidebar-logo" href="<?= $view->url()->get() ?>">
                        <?php if ($params['logo']) : ?>
                        <img class="tm-logo uk-responsive-height" src="<?= $this->escape($params['logo']) ?>" alt="">
                        <?php else : ?>
                        <?= $params['title'] ?>
                        <?php endif ?>
                    </a>

                    <?php if ($view->menu()->exists('main') || $view->position()->exists('sidebar_menu')) : ?>
                    <div class="tm-sidebar-nav">
                        <?= $view->menu('main', 'menu-navbar.php') ?>
                        <?= $view->position('sidebar_menu', 'position-blank.php') ?>
                    </div>
                    <?php endif ?>

                </div>
                <?php endif ?>

                <?php if ($view->position()->exists('sidebar_main') || $view->position()->exists('sidebar_social')) : ?>
                <div class="tm-sidebar-widget-container">

                    <?php if ($view->position()->exists('sidebar_main')) : ?>
                    <div class="tm-sidebar-main">
                        <?= $view->position('sidebar_main', 'position-grid.php') ?>
                    </div>
                    <?php endif ?>

                    <?php if ($view->position()->exists('sidebar_social')) : ?>
                    <div class="tm-sidebar-social uk-flex uk-flex-middle uk-flex-center">
                        <?= $view->position('sidebar_social', 'position-blank.php') ?>
                    </div>
                    <?php endif ?>

                </div>
                <?php endif ?>

            </div>

            <div class="uk-width-1-1 tm-content-wrapper <?= ($params['totop_scroller'] || $view->menu()->exists('footer')) ? 'tm-footer-true' : '' ?>">

                <?php if ($view->position()->exists('toolbar')) : ?>
                <div class="tm-toolbar uk-flex uk-flex-middle uk-flex-space-between uk-visible-large">
                    <?= $view->position('toolbar', 'position-blank.php') ?>
                </div>
                <?php endif ?>

                <?php if ($params['logo_small'] || $view->position()->exists('offcanvas') || $view->menu()->exists('offcanvas')) : ?>
                <nav class="tm-navbar uk-navbar uk-hidden-large">

                    <?php if ($view->position()->exists('offcanvas') || $view->menu()->exists('offcanvas')) : ?>
                    <a href="#offcanvas" class="uk-navbar-toggle" data-uk-offcanvas></a>
                    <?php endif ?>

                    <div class="uk-navbar-content uk-navbar-center">
                        <a class="uk-navbar-brand" href="<?= $view->url()->get() ?>">
                            <?php if ($params['logo_small']) : ?>
                            <img class="tm-logo-small uk-responsive-height" src="<?= $this->escape($params['logo_small']) ?>" alt="">
                            <?php else : ?>
                            <?= $params['title'] ?>
                            <?php endif ?>
                        </a>
                    </div>

                </nav>
                <?php endif ?>

                <?php if ($view->position()->exists('hero')) : ?>
                <div id="tm-hero" class="tm-hero uk-block uk-block-large uk-cover-background uk-flex uk-flex-middle <?= $params['classes.hero'] ?>" <?= $params['hero_image'] ? "style=\"background-image: url('{$view->url($params['hero_image'])}');\"" : '' ?> <?= $params['classes.parallax'] ?>>
                    <div class="uk-container uk-container-center">

                        <section class="uk-grid uk-grid-match" data-uk-grid-margin>
                            <?= $view->position('hero', 'position-grid.php') ?>
                        </section>

                    </div>
                </div>
                <?php endif ?>

                <?php if ($view->position()->exists('content_top')) : ?>
                <div id="content-top" class="tm-block-content-top<?= ($params['content_top_padding']) ? ' tm-content-top-padding-false' : '' ?>">

                    <section class="uk-grid uk-grid-match" data-uk-grid-margin>
                        <?= $view->position('content_top', 'position-grid.php') ?>
                    </section>

                </div>
                <?php endif; ?>

                <div class="tm-content-container">

                    <?php if ($view->position()->exists('top')) : ?>
                    <div id="tm-top" class="tm-top uk-block uk-block-default">

                        <section class="uk-grid uk-grid-match" data-uk-grid-margin>
                            <?= $view->position('top', 'position-grid.php') ?>
                        </section>

                    </div>
                    <?php endif ?>

                    <?php if ($view->position()->exists('top_b')) : ?>
                    <div id="tm-top-b" class="tm-top-b uk-block uk-block-default">

                        <section class="uk-grid uk-grid-match" data-uk-grid-margin>
                            <?= $view->position('top_b', 'position-grid.php') ?>
                        </section>

                    </div>
                    <?php endif ?>

                    <?php if ($view->position()->exists('top_c')) : ?>
                    <div id="tm-top-c" class="tm-top-c uk-block uk-block-default">

                        <section class="uk-grid uk-grid-match" data-uk-grid-margin>
                            <?= $view->position('top_c', 'position-grid.php') ?>
                        </section>

                    </div>
                    <?php endif ?>

                    <?php if ($view->position()->exists('top_d')) : ?>
                    <div id="tm-top-d" class="tm-top-d uk-block uk-block-default">

                        <section class="uk-grid uk-grid-match" data-uk-grid-margin>
                            <?= $view->position('top_d', 'position-grid.php') ?>
                        </section>

                    </div>
                    <?php endif ?>

                    <div id="tm-main" class="tm-main uk-block uk-block-default">

                        <div class="uk-grid" data-uk-grid-match data-uk-grid-margin>

                            <main class="<?= $view->position()->exists('sidebar') ? 'uk-width-medium-3-4' : 'uk-width-1-1'; ?>">
                                <?= $view->render('content') ?>
                            </main>

                            <?php if ($view->position()->exists('sidebar')) : ?>
                            <aside class="uk-width-medium-1-4 <?= $params['sidebar_first'] ? 'uk-flex-order-first-medium' : ''; ?>">
                                <?= $view->position('sidebar', 'position-panel.php') ?>
                            </aside>
                            <?php endif ?>

                        </div>

                    </div>

                    <?php if ($view->position()->exists('bottom')) : ?>
                    <div id="tm-bottom" class="tm-bottom uk-block uk-block-default">

                        <section class="uk-grid uk-grid-match" data-uk-grid-margin>
                            <?= $view->position('bottom', 'position-grid.php') ?>
                        </section>

                    </div>
                    <?php endif ?>

                    <?php if ($view->position()->exists('bottom_b')) : ?>
                    <div id="tm-bottom-b" class="tm-bottom-b uk-block uk-block-default">

                        <section class="uk-grid uk-grid-match" data-uk-grid-margin>
                            <?= $view->position('bottom_b', 'position-grid.php') ?>
                        </section>

                    </div>
                    <?php endif ?>

                    <?php if ($view->position()->exists('bottom_c')) : ?>
                    <div id="tm-bottom-c" class="tm-bottom-c uk-block uk-block-default">

                        <section class="uk-grid uk-grid-match" data-uk-grid-margin>
                            <?= $view->position('bottom_c', 'position-grid.php') ?>
                        </section>

                    </div>
                    <?php endif ?>

                    <?php if ($view->position()->exists('bottom_d')) : ?>
                    <div id="tm-bottom-d" class="tm-bottom-d uk-block uk-block-default">

                        <section class="uk-grid uk-grid-match" data-uk-grid-margin>
                            <?= $view->position('bottom_d', 'position-grid.php') ?>
                        </section>

                    </div>
                    <?php endif ?>

                </div>

                <?php if ($view->position()->exists('content_bottom')) : ?>
                <div id="content-bottom" class="tm-block-content-bottom<?= ($params['content_bottom_padding']) ? ' tm-content-bottom-padding-false' : '' ?>">

                    <section class="uk-grid uk-grid-match" data-uk-grid-margin>
                        <?= $view->position('content_bottom', 'position-grid.php') ?>
                    </section>

                </div>
                <?php endif; ?>

                <?php if ($view->position()->exists('footer')) : ?>
                <div class="tm-block-footer uk-text-center uk-text-muted">

                    <section class="uk-grid uk-grid-match" data-uk-grid-margin>
                        <?= $view->position('footer', 'position-grid.php') ?>
                    </section>

                </div>
                <?php endif ?>

                <?php if ($view->menu()->exists('footer') || $params['totop_scroller']) : ?>
                <div id="tm-footer" class="tm-footer uk-flex uk-flex-middle uk-flex-center">
                    <?php if ($params['totop_scroller']) : ?>
                        <a id="tm-anchor-bottom" class="tm-totop-scroller" data-uk-smooth-scroll href="#"></a>
                    <?php endif ?>
                    <?php if ($view->menu()->exists('footer')) : ?>
                        <?= $view->menu('footer', 'menu-footer.php') ?>
                    <?php endif ?>
                </div>
                <?php endif ?>

            </div>

        </div>

        <?php if ($view->position()->exists('offcanvas') || $view->menu()->exists('offcanvas')) : ?>
       <div id="offcanvas" class="uk-offcanvas">
           <div class="uk-offcanvas-bar">

               <?php if ($params['logo_offcanvas']) : ?>
               <div class="uk-panel uk-text-center">
                   <a href="<?= $view->url()->get() ?>">
                       <img src="<?= $this->escape($params['logo_offcanvas']) ?>" alt="">
                   </a>
               </div>
               <?php endif ?>

               <?php if ($view->menu()->exists('offcanvas')) : ?>
                   <?= $view->menu('offcanvas', ['class' => 'uk-nav-offcanvas']) ?>
               <?php endif ?>

               <?php if ($view->position()->exists('offcanvas')) : ?>
                   <?= $view->position('offcanvas', 'position-panel.php') ?>
               <?php endif ?>

           </div>
       </div>
       <?php endif ?>

       <?= $view->render('footer') ?>

    </body>
</html>
