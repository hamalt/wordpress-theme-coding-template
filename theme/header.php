<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-156705547-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-156705547-1');
    </script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="format-detection" content="telephone=no,address=no,email=no">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <?php wp_head(); ?>
    <?php if ( is_post_type_archive( 'works' ) && !is_paged() ) : ?>
    <meta name="description" content="北映の制作実績一覧です。">
    <meta property="og:type" content="article" />
    <meta property="og:title" content="制作実績 | 北映 Northern Films" />
    <meta property="og:description" content="北映の制作実績一覧です。" />
    <meta property="og:url" content="<?php echo get_post_type_archive_link( "works" ); ?>" />
    <meta property="og:site_name" content="北映 Northern Films" />
    <meta property="og:image" content="https://northern-films.com/wp-content/uploads/2020/09/eyecatch_hokuei_1200630.jpg" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="630" />
    <meta property="og:image:secure_url" content="https://northern-films.com/wp-content/uploads/2020/09/eyecatch_hokuei_1200630.jpg" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@hokuei2018" />
    <meta name="twitter:domain" content="northern-films.com" />
    <meta name="twitter:title" content="制作実績 | 北映 Northern Films" />
    <meta name="twitter:description" content="北映の制作実績一覧です。" />
    <meta name="twitter:image" content="https://northern-films.com/wp-content/uploads/2020/09/eyecatch_hokuei_1200630.jpg" />
    <?php elseif ( is_post_type_archive( 'works' ) && is_paged() ) : ?>
    <meta name="description" content="北映の制作実績一覧の<?php echo get_query_var( 'paged', 1 ); ?>ページ目です。">
    <?php endif; ?>
  </head>

  <body <?php body_class(); ?>>
    <div class="site">
        <?php if ( ! is_404() ) : ?>
            <div id="fixedBrandLogo" class="fixedBrandLogo">
                <a class="brandLogo" id="brandLogo" href="<?php echo home_url( "/" ); ?>">
                    <div class="brandLogo--horizontal">
                        <svg>
                            <use xlink:href="<?php echo get_theme_file_uri(); ?>/assets/images/svg-sprite/sprite.svg#brand-logo"></use>
                        </svg>
                    </div>
                    <div class="brandLogo--vertical is-sp">
                        <svg>
                            <use xlink:href="<?php echo get_theme_file_uri(); ?>/assets/images/svg-sprite/sprite.svg#brand-logo-ver"></use>
                        </svg>
                    </div>
                </a>
            </div>
        <?php endif; ?>
        <div id="fixedGlobalMenu" class="fixedGlobalMenu">
          <div class="menuButton" id="globalMenuButton">
            <div class="menuButton--lineBox"><span class="menuButton--line"></span><span class="menuButton--line"></span><span class="menuButton--line"></span></div><span class="menuButton--text font-josefin">menu</span>
          </div>
        </div>
      <header class="siteHeader" id="siteHeader">
        <div class="container siteHeader--container" id="siteHeaderContainer" data-scroll-section>
          <div class="siteHeader--inner" data-scroll="fadeInUp">
            <div class="siteHeader--siteId">
              <div class="siteHeader--brandLogo"></div>
              <<?php echo is_front_page() ? "h1" : "p"; ?>  class="siteHeader--catchPhrase font-mincho">ココロ動く映像をセカイに</<?php echo is_front_page() ? "h1" : "p"; ?> >
            </div>
            <nav class="headerNavigation">
                <?php wp_nav_menu( array(
                    'theme_location' => 'header-navi',
                    'container' => false,
                    'fallback_cb' => false,
                    'items_wrap' => '<ul class="headerNavigation--list font-mincho">%3$s</ul>',
                    'add_li_class'  => 'headerNavigation--item'
                ) ); ?>
              <div class="headerNavigation--button"></div>
            </nav>
          </div>
        </div>
      </header>
      <main class="main" id="main" data-scroll-section>
