        <div class="scrollProgressBar" id="scrollProgressBar">
            <div class="scrollProgressBar--progressBar"></div>
        </div>
      </main>
      <?php if ( is_404() ) : ?>
        <div class="errorBg"></div>
      <?php else : ?>
        <footer class="siteFooter" id="siteFooter" data-scroll-section data-scroll>
            <div class="container">
            <div class="siteFooter--top">
                <div class="siteFooter--topLeft">
                <div class="siteFooter--logo"><a href="<?php echo home_url( "/" ); ?>">
                    <svg>
                        <use xlink:href="<?php echo get_theme_file_uri(); ?>/assets/images/svg-sprite/sprite.svg#brand-logo"></use>
                    </svg></a></div>
                <div class="siteFooter--line">
                    <a href="https://lin.ee/nWTqzVQ"><img style="display: block;" src="https://scdn.line-apps.com/n/line_add_friends/btn/ja.png" alt="友だち追加" height="36" border="0"></a>
                    <p class="font-mincho">LINE＠はこちらから</p>
                </div>
                </div>
                <div class="siteFooter--sns">
                <ul>
                    <?php get_template_part( "template-parts/sns-link-list" ); ?>
                    <li class="is-sp"><a href="https://lin.ee/nWTqzVQ"><i class="fab fa-line"></i></a></li>
                </ul>
                </div>
            </div>
            <div class="siteFooter--bottom">
                <div class="siteFooter--menu font-mincho">
                    <ul class="footerMenu font-mincho">
                        <?php wp_nav_menu( array(
                            'theme_location' => 'footer-navi',
                            'container' => false,
                            'fallback_cb' => false,
                            'items_wrap' => '%3$s'
                        ) ); ?>

                        <?php
                        $news_page = get_page_by_path( "news" );
                        $news_permalink = get_permalink( $news_page->ID );
                        ?>
                        <li class="menu-item menu-item-type-post_type menu-item-object-page">
                            <a href="<?php echo esc_url( $news_permalink ); ?>"><?php echo $news_page->post_title; ?></a>
                            <ul class="sub-menu">
                            <?php
                            $args = array( 'posts_per_page' => 2, 'post_type' => 'post' );
                            $news_posts = get_posts( $args );
                            foreach ( $news_posts as $key => $news_post ) :
                                setup_postdata( $news_post ); ?>
                                <li class="newsWidget-card">
                                    <?php /* if ( has_post_thumbnail( $news_post ) ) : ?>
                                        <figure class="newsWidget-thumbnail">
                                            <a href="<?php the_permalink( $news_post ); ?>"><?php echo get_the_post_thumbnail( $news_post, "news-widget-thumbnail" ); ?></a>
                                        </figure>
                                    <?php endif; */ ?>

                                    <a href="<?php the_permalink( $news_post ); ?>" class="newsWidget-title">
                                        <span><?php echo get_the_date( "Y.m.d" ); ?> </span><?php echo get_the_title( $news_post ); ?>
                                    </a>
                                </li>
                            <?php endforeach;
                            wp_reset_postdata(); ?>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="siteFooter--copyright">
                <p class="font-josefin">© HOKUEI Northern Films</p>
                </div>
            </div>
            </div>
        </footer>
        <?php
        $request_page = get_page_by_path( "request" );
        $request_page_permalink = get_permalink( $request_page->ID );
        ?>

        <div id="productionFeeLink" class="productionFeeLink">
            <p>
                <a href="tel:0157-57-1137"><i class="fas fa-phone-alt"></i></a>
            </p>
            <p><a href="<?php echo $request_page_permalink; ?>">
                <svg>
                <use xlink:href="<?php echo get_theme_file_uri(); ?>/assets/images/svg-sprite/sprite.svg#icon-download"></use>
                </svg><span class="font-mincho">制作料金はこちら</span></a></p>
        </div>
        <div class="frameOrnament is-pc font-josefin">
            <span>HOKUEI Northern Films</span>
        </div>
        <?php endif; ?>

        <div class="globalMenu" id="globalMenu">
            <div class="globalMenu--inner">
                <div class="globalMenu--innerTop">
                <header class="globalMenu--logo">
                    <svg>
                    <use xlink:href="<?php echo get_theme_file_uri(); ?>/assets/images/svg-sprite/sprite.svg#brand-logo-ver"></use>
                    </svg>
                </header>
                <div class="globalMenu--menuList font-mincho" id="globalMenuList">
                    <?php wp_nav_menu( array(
                        'theme_location' => 'global-navi-left',
                        'container' => false,
                        'fallback_cb' => false
                    ) );
                    ?>
                    <?php wp_nav_menu( array(
                        'theme_location' => 'global-navi-right',
                        'container' => false,
                        'fallback_cb' => false
                    ) );
                    ?>
                </div>
                </div>
                <div class="globalMenu--innerBottom">
                <div class="globalMenu--contactInfo">
                    <div class="globalMenu--facebook">
                    <iframe src="//www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fnorthernfilms2018%2F&amp;tabs=timeline&amp;width=326&amp;height=328&amp;small_header=true&amp;adapt_container_width=true&amp;hide_cover=false&amp;show_facepile=true&amp;appId=425550594178251" width="326" height="328" style="border:none;overflow:hidden" allow="encrypted-media"></iframe>
                    </div>
                    <div class="globalMenu--contactOtherInfo">
                        <ul class="globalMenu--sns">
                    <?php get_template_part( "template-parts/sns-link-list" ); ?>
                    </ul>
                    <div class="globalMenu--lineButton">
                        <a href="https://lin.ee/nWTqzVQ"><img style="display: block;" src="https://scdn.line-apps.com/n/line_add_friends/btn/ja.png" alt="友だち追加" height="36" border="0"></a>
                    </div>
                    <div class="globalMenu--address">
                        <p class="font-mincho"><i>
                            <svg>
                            <use xlink:href="<?php echo get_theme_file_uri(); ?>/assets/images/svg-sprite/sprite.svg#icon-pin"></use>
                            </svg></i>北海道北見市北2条西2丁目13サンプラザビル3F</p>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div><!-- /.globalMenu -->

        <div class="preloader" id="preloader">
            <div class="preloader--inner" id="preloaderLogo">
                <div id="animLogo"></div>
                <svg id="staticLoaderLogo">
                    <use xlink:href="<?php echo get_theme_file_uri(); ?>/assets/images/svg-sprite/sprite.svg#brand-symbol"></use>
                </svg>
            </div>
        </div>
    </div><!-- /.site -->
    <?php wp_footer(); ?>
  </body>
</html>
