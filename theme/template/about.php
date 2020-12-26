<?php
/*
 * Template Name: 北映とは
 * Template Post Type: page
 * Description: 北映の説明ページ
 */
get_header(); ?>

<div class="heroHeader" data-scroll="fadeInUp">
    <div class="heroHeader--inner">
        <div class="heroHeader--contents rellax" data-rellax-percentage="0.5">
            <svg>
                <use xlink:href="<?php echo get_theme_file_uri(); ?>/assets/images/svg-sprite/sprite.svg#brand-logo"></use>
            </svg>
        </div>
    </div>
</div>
<section class="aboutUsSection contentsSection">
    <header class="aboutUsSection--header" data-scroll="fadeInUp">
    <div class="container">
        <h1 class="font-josefin">About Us</h1>
    </div>
    </header>
    <div class="aboutUsSection--videoWrapper">
    <div class="aboutUsSection--video" data-scroll="fadeInUp">
        <video-js class="video-js" id="aboutPageVideo" playsinline>
        <source src="<?php echo get_theme_file_uri(); ?>/assets/videos/hokuei_pv/pv_video.m3u8" type="application/x-mpegURL">
        <p class="vjs-no-js">
            To view this video please enable JavaScript, and consider upgrading to a
            web browser that<a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
        </p>
        </video-js>
    </div>
    <div class="contentsSection--title rellax" data-rellax-percentage="0.5">ABOUT US</div>
    </div>
    <div class="container">
    <div class="aboutUsSection--message">
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
        </div>
        </div>
    </div>
    </div>
    <div class="container">
    <div class="aboutUsSection--member">
        <div class="memberBox">
        <div class="memberBox--inner">
            <figure class="memberBox--image" data-scroll="fadeInUp">
            <div class="pictureFrame">
                <div class="pictureFrame--inner">
                    <picture>
                        <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/about/member.jpg 1x, <?php echo get_theme_file_uri(); ?>/assets/images/about/member@2x.jpg 2x" media="(min-width: 64em)">
                        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/about/member.jpg" srcset="<?php echo get_theme_file_uri(); ?>/assets/images/about/member_sp.jpg 1x, <?php echo get_theme_file_uri(); ?>/assets/images/about/member_sp@2x.jpg 2x">
                    </picture>
                </div>
            </div>
            </figure>
            <div class="memberBox--text">
            <div class="aboutSentence">
                <div class="aboutSentence--header">
                <h2 class="font-mincho" data-scroll="fadeInUp">全世界で感動を生み続ける<br>映像コンテンツを発信します。</h2>
                <div class="moveLine" data-scroll></div>
                </div>
                <figure class="aboutSentence--image is-sp" data-scroll="fadeInUp">
                <div class="pictureFrame">
                    <div class="pictureFrame--inner"><img src="<?php echo get_theme_file_uri(); ?>/assets/images/about/member.jpg"></div>
                </div>
                </figure>
                <div class="aboutSentence--desc" data-scroll="fadeInUp">
                <p>私たちは平均年齢22歳、北海道北見市出身の若手クリエイターが運営しているクリエイティブチームです。</p>
                <p>映像制作を大きな軸として、全国の中小企業・個人事業主様のプロモーション活動やWEBサイト制作・運営のお手伝いなど、クリエイティブとマーケティングの2つの側面からサポートしていきます。</p>
                <p>今後も日本をはじめ、全世界で感動を生み続ける映像コンテンツを発信していきます。</p>
                </div>

                <?php
                $member_page = get_page_by_path( "member" );
                $member_page_permalink = get_permalink( $member_page->ID );
                ?>

                <div class="aboutSentence--link"><a class="linkButton linkButton-white" href="<?php echo esc_url( $member_page_permalink ); ?>">MEMBER</a></div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
    <div class="container">
    <div class="aboutUsSection--service">
        <div class="serviceBox">
        <figure class="serviceBox--image" data-scroll="fadeInUp">
            <div class="pictureFrame">
                <div class="pictureFrame--inner">
                    <picture>
                        <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/about/service_pc.jpg 1x, <?php echo get_theme_file_uri(); ?>/assets/images/about/service_pc@2x.jpg 2x" media="(min-width: 64em)">
                        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/about/service_pc.jpg" srcset="<?php echo get_theme_file_uri(); ?>/assets/images/about/service_pc.jpg 1x, <?php echo get_theme_file_uri(); ?>/assets/images/about/service_pc@2x.jpg 2x">
                    </picture>
                </div>
            </div>
        </figure>
        <div class="serviceBox--text">
            <figure class="serviceBox--memberImage is-pc" data-scroll="fadeInUp">
            <div class="pictureFrame">
                <div class="pictureFrame--inner">
                    <picture>
                        <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/about/service_member_pc.jpg 1x, <?php echo get_theme_file_uri(); ?>/assets/images/about/service_member_pc@2x.jpg 2x" media="(min-width: 64em)">
                        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/about/service_member_pc.jpg" srcset="<?php echo get_theme_file_uri(); ?>/assets/images/about/service_member_pc.jpg 1x, <?php echo get_theme_file_uri(); ?>/assets/images/about/service_member_pc@2x.jpg 2x">
                    </picture>
                </div>
            </div>
            </figure>
            <div class="aboutSentence">
            <h2 class="font-mincho" data-scroll="fadeInUp">地域・事業・商品サービスの、<br class="is-pc-inline">そしてあなた自身の輝きを発信するのが私たちの仕事です。</h2>
            <div class="moveLine" data-scroll></div>
            <div class="aboutSentence--desc" data-scroll="fadeInUp">
                <p>北映 Northern Filmsは映像コンテンツ制作事業者として数多くの人々に感動とインスピレーションを与える創造的な企業です。</p>
                <p>私たちの使命は世界中の人々と映像によって感動を分かち合い、その瞬間、経験を共にすることです。</p>
                <p>ブランドの中心には必ず素晴らしい才能を持つ人がいて、その周りに文化が生まれ、時代となり、世界はより良い場所へ向かうと信じています。</p>
                <p>今後もトップクラスのブランド、企業、政府、慈善団体と協力し感動を生むコンテンツメーカー、ビジュアルストーリーテラーとしてデジタルメディアへ貢献し続けます。</p>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</section>
<section id="services" class="aboutUsSection aboutUsSection-service">
    <header class="aboutUsSection--header" data-scroll="fadeInUp">
    <div class="container">
        <h1 class="font-josefin">Services</h1>
    </div>
    </header>
    <div class="aboutUsSection--serviceList">
    <ol>
        <li data-scroll="fadeInUp"><span>
            <div class="moveLine" data-scroll data-delay="400"></div></span>
        <figure>
            <picture>
            <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/about/service_01_pc.jpg 1x, <?php echo get_theme_file_uri(); ?>/assets/images/about/service_01_pc@2x.jpg 2x" media="(min-width: 64em)"><img src="<?php echo get_theme_file_uri(); ?>/assets/images/about/service_01_sp.jpg" srcset="<?php echo get_theme_file_uri(); ?>/assets/images/about/service_01_sp.jpg 1x, <?php echo get_theme_file_uri(); ?>/assets/images/about/service_01_sp@2x.jpg 2x">
            </picture>
        </figure>
        <h2 class="font-mincho"><span>ビジュアルコンテンツ制作</span><i class="moveLine" data-scroll data-delay="600"></i></h2>
        <p>「動画の時代」におけるビジュアルコンテンツを「見られる→知られる→好きになる→売れる」のどんなフェーズにも合わせて、動画マーケティングとストーリーテリングの観点から制作します。”自分たちが作りたいもの”と”お客様の実現したいこと”をバランスよくマッチングします。</p>
        <p></p>
        </li>
        <li data-delay="200" data-scroll="fadeInUp"><span>
            <div class="moveLine" data-scroll data-delay="600"></div></span>
        <figure>
            <picture>
            <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/about/service_02_pc.jpg 1x, <?php echo get_theme_file_uri(); ?>/assets/images/about/service_02_pc@2x.jpg 2x" media="(min-width: 64em)"><img src="<?php echo get_theme_file_uri(); ?>/assets/images/about/service_02_sp.jpg" srcset="<?php echo get_theme_file_uri(); ?>/assets/images/about/service_02_sp.jpg 1x, <?php echo get_theme_file_uri(); ?>/assets/images/about/service_02_sp@2x.jpg 2x">
            </picture>
        </figure>
        <h2 class="font-mincho"><span>データと分析</span><i class="moveLine" data-scroll data-delay="800"></i></h2>
        <p>これまで制作してきた映像とウェブサイト、数千パターンのデザイン・・・などの実績と、オンライン及びオフライン上でトレンドとされる一つ一つの情報をいち早くキャッチし、お客様に合わせた丁寧なプランニングを定性長期ビジョンと中期ビジョンの２つの観点から分析共有します。</p>
        </li>
        <li data-delay="400" data-scroll="fadeInUp"><span>
            <div class="moveLine" data-scroll data-delay="800"></div></span>
        <figure>
            <picture>
            <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/about/service_03_pc.jpg 1x, <?php echo get_theme_file_uri(); ?>/assets/images/about/service_03_pc@2x.jpg 2x" media="(min-width: 64em)"><img src="<?php echo get_theme_file_uri(); ?>/assets/images/about/service_03_sp.jpg" srcset="<?php echo get_theme_file_uri(); ?>/assets/images/about/service_03_sp.jpg 1x, <?php echo get_theme_file_uri(); ?>/assets/images/about/service_03_sp@2x.jpg 2x">
            </picture>
        </figure>
        <h2 class="font-mincho"><span>ソーシャル政策</span><i class="moveLine" data-scroll data-delay="800"></i></h2>
        <p>私たちの得意とするオンラインスペースはYouTubeやInstagramなどのネットコンテンツを配信するプラットフォームで、初めのプランニングを元に一番適切なルートや場所で、ブランドや商品、サービスのファン獲得に向け、常に政策を練り、実行・実装します。</p>
        </li>
    </ol>
    <div class="contentsSection--title rellax" data-rellax-percentage="0.5">SERVICES</div>
    </div>
</section>
<section class="aboutUsSection aboutUsSection-outline">
    <div class="container">
    <div class="aboutUsSection--company">
        <div class="aboutUsSection--companyOutline">
        <header class="aboutUsSection--header aboutUsSection--outlineHeader">
            <h1 class="font-josefin">Outline</h1>
        </header>
        <dl class="font-mincho">
            <dt>名称：</dt>
            <dd>北映 Northern Films</dd>
        </dl>
        <dl class="font-mincho">
            <dt>代表：</dt>
            <dd>磯川 実</dd>
        </dl>
        <dl class="font-mincho">
            <dt>設立：</dt>
            <dd>平成30年1月1日</dd>
        </dl>
        <dl class="font-mincho">
            <dt>所在地：</dt>
            <dd>《北海道・北見オフィス》<br>〒090-0042　北海道北見市北2条西2丁目13 サンプラザビル3F</dd>
        </dl>
        <dl class="font-mincho">
            <dt>連絡先：</dt>
            <dd>TEL  0157-57-1137</dd>
        </dl>
        <dl class="font-mincho">
            <dt>従業員：</dt>
            <dd>6名</dd>
        </dl>
        <dl class="font-mincho">
            <dt>営業時間：</dt>
            <dd>AM10:00 – PM18:00（土日/祝日休業）</dd>
        </dl>
        <dl class="font-mincho">
            <dt>事業内容：</dt>
            <dd>映像製作 / ウェブサイト製作 / デザイン /<br>マーケティング / 宣伝・販売</dd>
        </dl>
        <div class="aboutUsSection--companySns">
            <div class="socialLinks">
                <ul>
                    <?php get_template_part( "template-parts/sns-link-list" ); ?>
                </ul>
            </div>
        </div>
        <ul class="aboutUsSection--companyProject">
            <?php
            $torudake_page = get_page_by_path( "torudake" );
            $torudake_page_permalink = get_permalink( $torudake_page->ID );
            ?>
            <li><a href="<?php echo esc_url( $torudake_page_permalink ); ?>"><img src="<?php echo get_theme_file_uri(); ?>/assets/images/about/project_torudake.png" alt="TORUDAKE"></a></li>
            <li><a href="https://medialab.northern-films.com/" target="_blank"><img src="<?php echo get_theme_file_uri(); ?>/assets/images/about/project_hokueimedialab.png" alt="北映メディアラボ"></a></li>
            <li><a href="https://www.youtube.com/channel/UClrf0wD28B9WDB2PsNKHwDw" target="_blank"><img src="<?php echo get_theme_file_uri(); ?>/assets/images/about/project_cws.png" alt="Chill and Work Sounds"></a></li>
        </ul>
        </div>
        <div class="aboutUsSection--companyMap">
        <div class="aboutUsSection--access">
            <div class="aboutUsSection--map">
            <iframe src="//www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d11517.902093527659!2d143.8939178!3d43.804495!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x6a347485de8e6675!2z5YyX5pigIE5vcnRoZXJuIEZpbG1z!5e0!3m2!1sja!2sjp!4v1596174305047!5m2!1sja!2sjp" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
            <div class="aboutUsSection--accessInfo font-mincho">
            <div class="aboutUsSection--accessInfoText">
                <h3>北海道北見オフィス</h3>
                <p>〒090-0042<br>北海道北見市北2条西2丁目13 サンプラザビル3F</p>
            </div>
            <div class="aboutUsSection--accessInfoText">
                <h3>最寄り駅</h3>
                <p>JR北見駅、徒歩5分</p>
            </div>
            </div>
        </div>
        </div>
    </div>
    <div class="contentsSection--title rellax" data-rellax-percentage="0.5">OUTLINE</div>
    </div>
</section>

<?php get_template_part( "template-parts/contact-link" ); ?>

<?php get_footer();
