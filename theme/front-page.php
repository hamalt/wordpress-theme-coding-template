<?php get_header(); ?>

<div class="homeTopWrapper">
    <div class="mainVisual" id="mainVisual">
    <div class="mainVisual--inner" data-scroll="fadeInUp">
        <div class="swiper-container swiper-container-vertical mainVisual--slider">
        <div class="swiper-wrapper">
            <div class="swiper-slide" id="mainVisualSlide1">
                <video-js class="mainVisual--video video-js" id="mainVisualVideo1" playsinline>
                    <source src="<?php echo get_theme_file_uri(); ?>/assets/videos/hokuei_pv/pv_video.m3u8?ver=1.0" type="application/x-mpegURL">
                    <p class="vjs-no-js">
                    To view this video please enable JavaScript, and consider upgrading to a
                    web browser that<a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                    </p>
                </video-js>
                <video-js class="mainVisual--sliderControls">
                    <div class="mainVisual--sliderAudioButton mainVisual--sliderAudioButton-on"><i class="fas fa-volume-up"></i><span class="font-josefin">ON</span></div>
                    <div class="mainVisual--sliderAudioButton mainVisual--sliderAudioButton-off is-active"><i class="fas fa-volume-off"></i><span class="font-josefin">OFF</span></div>
                </video-js>
            </div>
            <div class="swiper-slide" id="mainVisualSlide2">
                <video-js class="mainVisual--video video-js" id="mainVisualVideo2" playsinline>
                    <source src="<?php echo get_theme_file_uri(); ?>/assets/videos/launch_ceremony/launch_ceremony.m3u8" type="application/x-mpegURL">
                    <p class="vjs-no-js">
                    To view this video please enable JavaScript, and consider upgrading to a
                    web browser that<a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                    </p>
                </video-js>
                <div class="mainVisual--sliderControls">
                    <div class="mainVisual--sliderAudioButton mainVisual--sliderAudioButton-on"><i class="fas fa-volume-up"></i><span class="font-josefin">ON</span></div>
                    <div class="mainVisual--sliderAudioButton mainVisual--sliderAudioButton-off is-active"><i class="fas fa-volume-off"></i><span class="font-josefin">OFF</span></div>
                </div>
            </div>
        </div>
        <div class="swiper-pagination mainVisual--sliderPagination"></div>
        </div>
    </div>
    <div class="mainVisual--scrollLine">
        <div class="mainVisual--scrollLineText font-mincho">scroll</div>
        <div class="mainVisual--scrollLineBorder">
        <div class="mainVisual--scrollLineAnim"></div>
        </div>
    </div>
    </div>
    <div class="newsBar" data-scroll="fadeInUp">
    <div class="newsBar--inner container">
        <dl class="newsBar--contents">
            <?php
            $args = array( 'posts_per_page' => 1, 'post_type' => 'post' );
            $latest_news = get_posts( $args );
            foreach ( $latest_news as $latest_news_post ) : setup_postdata( $latest_news_post ); ?>
                <dt><span class="font-josefin">NEWS</span>
                <time datetime="<?php echo get_the_date( 'c', $latest_news_post ); ?>" class="font-mincho"><?php echo get_the_date( 'Y.m.d', $latest_news_post ); ?></time>
                </dt>
                <dd class="font-mincho"><a href="<?php echo get_the_permalink( $latest_news_post ); ?>"><?php echo get_the_title( $latest_news_post ); ?></a></dd>
            <?php endforeach;
            wp_reset_postdata(); ?>
        </dl>
    </div>
    </div>
</div>
<section class="topSection aboutSection contentsSection">
    <div class="container">
    <div class="aboutSection--inner">
        <header class="aboutSection--header" data-scroll="fadeInUp">
        <h2 class="font-josefin">WHO WE ARE</h2>
        </header>
        <div class="messageBox">
        <div class="messageBox--catchPhrase" data-scroll="fadeInUp">
            <p class="font-mincho">ココロ動く<br>映像をセカイに</p>
            <div class="moveLine is-sp" data-scroll></div>
        </div>
        <div class="messageBox--message" data-scroll="fadeInUp">
            <p>北映 Northern Filmsは、<br>映像コンテンツ制作を行うクリエイティブチームです。</p>
            <p>目には見えない「想い」を形にし、<br>感動を作り出すことが私たちのミッション。</p>
            <p>世界中の人々と出会い、さまざまな瞬間を共有し、<br>映像を通じて経験を感動へと繋げていきます。</p>
            <p>映像で世界は変わらないかもしれない、でも映像がなければ世界は変わらない。</p>
            <p>感動を生むコンテンツメーカーとして、<br>デジタルメディアへ貢献し続けます。</p>
            <p>そう、ココロ動く映像をセカイに。</p>
            <?php
            $about_page = get_page_by_path( "about" );
            $about_permalink = get_permalink( $about_page->ID );
            ?>
            <div class="messageBox--link">
                <a class="linkButton linkButton-white" href="<?php echo esc_url( $about_permalink ); ?>">VIEW MORE</a>
            </div>
        </div>
        </div>
    </div>
    </div>
    <div class="contentsSection--title rellax" data-rellax-percentage="0.5"><span class="contentsSection--title-about">HOKUEI Northern Films</span></div>
</section>
<section class="topSection servicesSection">
    <div class="container">
    <div class="servicesSection--inner">
        <header class="servicesSection--header" data-scroll="fadeInUp">
        <h2 class="font-josefin">SERVICES</h2>
        <div class="servicesSection--description">
            <p>北映 Northern Filmsではお客様のご予算に合わせて最大限クリエイティブな作品を考えます。</p>
            <p>動画、デザイン共に相場価格よりも低価格ですが、クオリティには自信があります。<br class="is-pc-inline">「20万円でなんとかしてほしい」「100万円でハイクオリティな映像を」など気軽にお申し付けください。</p>
            <p>また急な発注にも対応できるように、スピード制作プラン（要相談）もご用意しています。</p>
        </div>
        </header>
        <div class="servicesSection--sliderWrapper" data-scroll="fadeInUp">
        <div class="servicesSection--sliderLink">
            <div class="servicesSection--slider swiper-container">
            <div class="swiper-wrapper">
                <?php /*
                if( have_rows('servces_slider', get_option( "page_on_front" )) ):
                    while ( have_rows('servces_slider', get_option( "page_on_front" )) ) : the_row(); ?>
                    <a class="swiper-slide" href="<?php echo esc_url( get_term_link( "video", "works_cat" ) ); ?>">
                        <?php
                        $pc_img = get_sub_field( 'pc_img', get_option( "page_on_front" ) );
                        var_dump($pc_img);
                        echo wp_get_attachment_image( $pc_img["ID"], "top-service-slider_pc" );
                        ?>
                        <div class="glitch">
                            <?php for ($i = 0; $i < 5; $i++) : ?>
                            <div class="glitch--img">
                                <picture>
                                    <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/home/services_0<?php echo $slide; ?>_pc.jpg 1x, <?php echo get_theme_file_uri(); ?>/assets/images/home/services_0<?php echo $slide; ?>_pc@2x.jpg 2x" media="(min-width: 64em)"><img src="<?php echo get_theme_file_uri(); ?>/assets/images/home/services_0<?php echo $slide; ?>_sp.jpg" srcset="<?php echo get_theme_file_uri(); ?>/assets/images/home/services_0<?php echo $slide; ?>_sp.jpg 1x, <?php echo get_theme_file_uri(); ?>/assets/images/home/services_0<?php echo $slide; ?>_sp@2x.jpg 2x">
                                </picture>
                            </div>
                            <?php endfor; ?>
                        </div>
                    </a>
                <?php endwhile;
                endif; */ ?>
                <?php for ($slide = 1; $slide <= 4; $slide++) : ?>
                    <a class="swiper-slide" href="<?php echo esc_url( get_term_link( "video", "works_cat" ) ); ?>">
                        <div class="glitch">
                            <?php for ($i = 0; $i < 5; $i++) : ?>
                            <div class="glitch--img">
                                <picture>
                                    <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/home/services_0<?php echo $slide; ?>_pc.jpg 1x, <?php echo get_theme_file_uri(); ?>/assets/images/home/services_0<?php echo $slide; ?>_pc@2x.jpg 2x" media="(min-width: 64em)"><img src="<?php echo get_theme_file_uri(); ?>/assets/images/home/services_0<?php echo $slide; ?>_sp.jpg" srcset="<?php echo get_theme_file_uri(); ?>/assets/images/home/services_0<?php echo $slide; ?>_sp.jpg 1x, <?php echo get_theme_file_uri(); ?>/assets/images/home/services_0<?php echo $slide; ?>_sp@2x.jpg 2x" alt="映像制作のイメージ画像<?php echo $slide; ?>枚目">
                                </picture>
                            </div>
                            <?php endfor; ?>
                        </div>
                    </a>
                <?php endfor; ?>
            </div>
            <!-- Add Pagination-->
            <div class="servicesSection--sliderPagination swiper-pagination"></div>
            </div>
            <div class="servicesSection--sliderDesc">
            <div class="serviceLinkPanel serviceLinkPanel-top">
                <div class="serviceLinkPanel--inner serviceLinkPanel--inner-width">
                <p class="font-mincho"><span class="font-mincho">映像制作</span><i class="font-josefin">VIDEO</i></p>
                <div class="serviceLinkPanel--text is-pc">
                    <p>実写映像はもちろん、モーショングラフィック、3D映像などの幅広い映像に対応可能です。企業紹介・商品PV・人材採用・シティプロモーション・また時にはTVCMなど、目的・ご要望に合わせ多種多様な動画バリエーションをご提案・ご提供します。</p>
                </div>
                <div class="lineArrow is-pc"></div>
                </div>
                <div class="lineArrow is-sp"></div>
            </div>
            </div>
        </div>
        </div>
        <div class="servicesSection--contentsList">
            <div class="servicesSection--contentsItem" data-scroll="fadeInUp">
                <a class="serviceLinkPanel serviceLinkPanel-bottom" href="<?php echo esc_url( get_term_link( "website", "works_cat" ) ); ?>">
                    <div class="serviceLinkPanel--inner">
                        <p class="font-mincho"><span class="font-mincho">ウェブサイト制作</span><i class="font-josefin">WEBSITE</i></p>
                    </div>
                    <div class="lineArrow"></div>
                    <div class="serviceLinkPanel--image serviceLinkPanel--image-website"></div>
                </a>
            </div>
            <div class="servicesSection--contentsItem" data-delay="200" data-scroll="fadeInUp">
                <a class="serviceLinkPanel serviceLinkPanel-bottom" href="<?php echo esc_url( get_term_link( "design", "works_cat" ) ); ?>">
                    <div class="serviceLinkPanel--inner">
                        <p class="font-mincho"><span class="font-mincho">デザイン・その他</span><i class="font-josefin">DESIGN</i></p>
                    </div>
                    <div class="lineArrow"></div>
                    <div class="serviceLinkPanel--image serviceLinkPanel--image-design glitch"></div>
                </a>
            </div>
            <div class="servicesSection--contentsItem" data-delay="400" data-scroll="fadeInUp">
                <a class="serviceLinkPanel serviceLinkPanel-bottom" href="<?php echo esc_url( $about_permalink ); ?>#services">
                    <div class="serviceLinkPanel--inner">
                        <p class="font-mincho"><span class="font-mincho">マーケティング</span><i class="font-josefin">MARKETING</i></p>
                    </div>
                    <div class="lineArrow"></div>
                    <div class="serviceLinkPanel--image serviceLinkPanel--image-marketing glitch"></div>
                </a>
            </div>
        </div>
    </div>
    </div>
    <div class="contentsSection--title rellax" data-rellax-percentage="0.5">SERVICES</div>
</section>
<section class="topSection worksSection">
    <div class="container">
    <div class="worksSection--inner">
        <header class="worksSection--header" data-scroll="fadeInUp">
            <h2 class="font-josefin">WORKS</h2>
        </header>
    </div>
    </div>
    <div class="worksSection--sliderWrapper" data-scroll="fadeInUp">
        <div class="worksSection--slider">
            <?php
            $args = array( 'posts_per_page' => 6, 'post_type' => 'works' );
            $works_posts = get_posts( $args );
            foreach ( $works_posts as $works_post ) : setup_postdata( $works_post ); ?>
                <div class="worksSection--slide">
                    <a href="<?php the_permalink( $works_post->ID ); ?>">
                        <div class="worksSection--slideThumb">
                            <?php
                            $works_thumb_id = get_post_thumbnail_id( $works_post );
                            echo wp_get_attachment_image( $works_thumb_id, "top-works-slider" ); ?><?php the_new_label( 30, "NEW", "font-josefin", "release", $works_post ); ?>
                        </div>
                        <p><?php the_field( "meta", $works_post->ID ); ?></p>
                        <h3 class="font-mincho"><?php echo get_the_title( $works_post->ID ); ?></h3>
                    </a>
                </div>
            <?php endforeach;
            wp_reset_postdata(); ?>
        </div>
    </div>
    <div class="worksSection--moreLink" data-scroll="fadeInUp"><a class="linkButton linkButton-white" href="<?php echo esc_url( get_post_type_archive_link( "works" ) ); ?>">ALL WORKS</a></div>
    <div class="contentsSection--title rellax" data-rellax-percentage="0.5">WORKS</div>
</section>
<section class="topSection projectSection">
    <div class="container">
    <div class="projectSection--inner">
        <header class="projectSection--header" data-scroll="fadeInUp">
        <h2 class="font-josefin">PROJECT</h2>
        </header>
        <div class="projectSection--contents">
            <?php
            if( have_rows( 'project_info', get_option( "page_on_front" ) ) ):
            $pro_count = 1;
            while ( have_rows( 'project_info', get_option( "page_on_front" ) ) ) : the_row(); ?>
            <?php if ( ( $pro_count % 2 ) === 0 ) : ?>
                <div class="projectSection--item" data-delay="200" data-scroll="fadeInUp">
            <?php else : ?>
                <div class="projectSection--item" data-scroll="fadeInUp">
            <?php endif; ?>
                <div class="projectSection--itemTop">
                <?php
                $project_img = get_sub_field( "project_img", get_option( "page_on_front" ) );
                if ( $project_img ) : ?>
                    <figure>
                        <a href="<?php echo esc_url( get_sub_field( "project_url", get_option( "page_on_front" ) ) ); ?>"<?php echo get_sub_field( "project_target", get_option( "page_on_front" ) ) ? ' target="_blank"' : ""; ?>>
                            <?php echo wp_get_attachment_image( $project_img["ID"], "full" ); ?>
                        </a>
                    </figure>
                <?php endif; ?>
                <h3 class="font-mincho"><?php the_sub_field( "project_name", get_option( "page_on_front" ) ); ?></h3>
                <p><?php the_sub_field( "project_desc", get_option( "page_on_front" ) ); ?></p>
                </div>
                <div class="projectSection--itemBottom"><a class="linkButton linkButton-white" href="<?php echo esc_url( get_sub_field( "project_url", get_option( "page_on_front" ) ) ); ?>"<?php echo get_sub_field( "project_target", get_option( "page_on_front" ) ) ? ' target="_blank"' : ""; ?>>VIEW MORE</a></div>
            </div>
            <?php $pro_count++; endwhile;
            endif; ?>
        </div>
    </div>
    </div>
    <div class="contentsSection--title rellax" data-rellax-percentage="0.5">PROJECT</div>
</section>
<section class="topSection newsSection">
    <div class="newsSection--inner">
        <header class="newsSection--header" data-scroll="fadeInUp">
            <h2 class="font-josefin">NEWS</h2>
        </header>

        <div class="newsSection--contents">
        <div class="newsSection--contentsInner">
            <div class="newsSection--thumbnails" data-scroll="fadeInUp">
            <?php
            $args = array( 'posts_per_page' => 5 );
            $news_posts = get_posts( $args );
            ?>

                <ul id="homeNewsThumbnails">
                    <?php
                    foreach ( $news_posts as $key => $news_post ) :
                        setup_postdata( $news_post );
                        $item_class = $key === 0 ? ' class="is-active"' : ""; ?>
                        <li<?php echo $item_class; ?>>
                            <a href="<?php the_permalink( $news_post ); ?>">
                                <?php if ( has_post_thumbnail( $news_post ) ) : ?>
                                    <?php echo get_the_post_thumbnail( $news_post, "top-news-thumbnail" ); ?>
                                <?php endif; ?>
                            </a>
                        </li>
                    <?php endforeach;
                    wp_reset_postdata(); ?>
                </ul>
            </div>
            <dl id="homeNewsList" data-scroll="fadeInUp">
                <dt class="font-josefin">NEWS</dt>
                <?php
                    foreach ( $news_posts as $key => $news_post ) :
                        setup_postdata( $news_post ); ?>
                        <dd data-news-item="<?php echo $key; ?>">
                            <p><a href="<?php the_permalink( $news_post ); ?>"><i><?php echo get_the_date( 'Y.m.d', $news_post ); ?></i><span><?php echo get_the_title( $news_post ); ?></span></a></p>
                        </dd>
                    <?php endforeach;
                    wp_reset_postdata(); ?>
            </dl>
        </div>
        <div class="newsSection--contentsDeco"></div>
        </div>

        <div class="newsSection--moreLink" data-scroll="fadeInUp">
            <a class="linkButton linkButton-white" href="<?php the_permalink( get_option( "page_for_posts" ) ); ?>">VIEW MORE</a>
        </div>
    </div>

    <div class="contentsSection--title rellax" data-rellax-percentage="0.5">NEWS</div>
</section>
<section class="topSection contactSection">
    <div class="container">
    <div class="contactSection--inner">
        <header class="contactSection--header" data-scroll="fadeInUp">
        <h2 class="font-josefin">CONTACT</h2>
        <div class="contactSection--description">
            <p>映像制作をはじめとした様々な制作、<br>また「こんなことはできますか？」など、お気軽に北映までご相談ください。</p>
        </div>
        </header>
        <div class="contactSection--contents" data-scroll="fadeInUp">
            <?php echo do_shortcode( '[contact-form-7 id="6" title="コンタクトフォーム 1"]' ); ?>
        </div>
        <?php
        $contact_page = get_page_by_path( "contact" );
        $contact_permalink = get_permalink( $contact_page->ID );
        ?>
        <div class="contactSection--moreLink" data-scroll="fadeInUp"><a class="linkButton" href="<?php echo esc_url( $contact_permalink ); ?>">お問い合わせ</a></div>
    </div>
    </div>
</section>

<?php get_footer();
