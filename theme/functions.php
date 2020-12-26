<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

/**
 * テーマの初期設定
 */
function hokuei_setup_theme() {
    // 投稿とコメントのRSSフィードリンクをheadに追加
    add_theme_support( 'automatic-feed-links' );

    // タイトルタグの自動生成
    add_theme_support( 'title-tag' );

    // postとpageで投稿サムネイルのサポートを有効にします
    add_theme_support( 'post-thumbnails' );

    // デフォルトのコンテンツ横幅を設定
    $GLOBALS['content_width'] = 1000;

    // カスタムメニューの追加
    register_nav_menus( array(
        'header-navi' => 'ヘッダーメニュー',
        'footer-navi' => 'フッターメニュー',
        'global-navi-left' => 'グローバルメニュー左',
        'global-navi-right' => 'グローバルメニュー右',
    ) );

    // 検索フォーム、コメントフォーム、およびコメントのデフォルトのコアマークアップをHTML5で出力
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ) );

    // テーマカスタマイザーウィジェットをセレクティブリフレッシュに対応する
    add_theme_support( 'customize-selective-refresh-widgets' );

    // 画像のサイズ最適化
    add_image_size( 'top-service-slider_pc', 1400, 483, true );
    add_image_size( 'top-service-slider_pc_2x', 2800, 966, true );
    add_image_size( 'top-service-slider_sp', 935, 493, true );
    add_image_size( 'top-service-slider_sp_2x', 1870, 986, true );
    add_image_size( 'top-works-slider', 720, 396, true );
    add_image_size( 'top-news-thumbnail', 780, 384, true );
    add_image_size( 'news-list-thumbnail', 449, 283, true );
    add_image_size( 'news-single-thumbnail', 990, 650, true );
    add_image_size( 'single-works-thumbnail', 1318, 743, true );
    add_image_size( 'works-list-thumbnail', 534, 321, true );
    add_image_size( 'works-gallery-thumbnail', 328, 328, true );
    add_image_size( 'related-works-thumbnail', 581, 314, true );
    add_image_size( 'member-images-pc', 817, 497, true );
    add_image_size( 'member-images-sp', 175, 226, true );
    add_image_size( 'member-gallery', 960, 665, true );
    add_image_size( 'download-page-thumbnail', 626, 355, true );
    add_image_size( 'news-widget-thumbnail', 80, 80, true );


    // WordPressデフォルトの絵文字無効化
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
}

add_action( 'after_setup_theme', 'hokuei_setup_theme' );

/**
 * テーマ用CSS、JavaScriptの読み込み
 */
function hokuei_enqueue_styles_scripts() {
    ### region CSS
    wp_enqueue_style(
        'swiper-style',
        get_theme_file_uri() . '/assets/css/vendor/swiper-bundle.min.css',
        array(),
        '6.1.1'
    );

    wp_enqueue_style(
        'video-js-style',
        get_theme_file_uri() . '/assets/css/vendor/video-js.min.css',
        array(),
        '7.9.2'
    );

    wp_enqueue_style(
        'slick-style',
        get_theme_file_uri() . '/assets/css/vendor/slick.css',
        array(),
        '1.8.1'
    );

    wp_enqueue_style(
        'lightbox-style',
        get_theme_file_uri() . '/assets/css/vendor/lightbox/css/lightbox.min.css',
        array(),
        '2.11.3'
    );

    wp_enqueue_style(
        'lightbox-style',
        get_theme_file_uri() . '/assets/css/vendor/lightbox/css/jquery.mCustomScrollbar.min.css',
        array(),
        '3.1.13'
    );

    // テーマのスタイルシート
    wp_enqueue_style(
        'hokuei-style',
        get_theme_file_uri() . '/assets/css/main.css',
        array(),
        filemtime( get_theme_file_path() . '/assets/css/main.css')
    );
    ### endregion


    ### region JS
    wp_enqueue_script( 'jquery' );

    // jQuery Easing
    wp_enqueue_script(
        'jquery-easing',
        get_theme_file_uri() . '/assets/js/vendor/jquery.easing.min.js',
        array( 'jquery' ),
        '1.3',
        true
    );

    // Lottie
    wp_enqueue_script(
        'lottie-script',
        get_theme_file_uri() . '/assets/js/vendor/lottie.min.js',
        array(),
        '5.7.3',
        true
    );

    // svg4everybody
    wp_enqueue_script(
        'svg4everybody',
        get_theme_file_uri() . '/assets/js/vendor/svg4everybody.min.js',
        array(),
        '3.0.3',
        true
    );

    $svg4everybody_data = <<< EOT
svg4everybody();
EOT;

    wp_add_inline_script('svg4everybody', $svg4everybody_data, 'after' );

    // Font Awesome 5
    wp_enqueue_script(
        'font-awesome-5',
        '//kit.fontawesome.com/2b5237d088.js',
        array(),
        '5.8.2',
        true
    );

    $font_awesome_data = <<< EOT
FontAwesomeConfig = { searchPseudoElements: true };
EOT;

    wp_add_inline_script('font-awesome-5', $font_awesome_data, 'before' );

    // テーマのスクリプト
    wp_enqueue_script(
        'swiper-script',
        get_theme_file_uri() . '/assets/js/vendor/swiper-bundle.min.js',
        array(),
        '6.1.1',
        true
    );

    // 動画再生プレイヤーライブラリ
    wp_enqueue_script(
        'video-js-script',
        get_theme_file_uri() . '/assets/js/vendor/video.min.js',
        array(),
        '7.9.2',
        true
    );

    // スクロールを管理してアニメーションやプログラム発火させるライブラリ
    wp_enqueue_script(
        'scroll-magic-script',
        get_theme_file_uri() . '/assets/js/vendor/ScrollMagic.min.js',
        array( 'jquery' ),
        '2.0.8',
        true
    );

    // ScrollMagicをデバッグしたいときに読み込ませる
    // wp_enqueue_script(
    //     'debug-addIndicators-script',
    //     get_theme_file_uri() . '/assets/js/vendor/debug.addIndicators.min.js',
    //     array( 'scroll-magic-script' ),
    //     '2.0.8',
    //     true
    // );

    // センター配置用スライダー
    wp_enqueue_script(
        'slick-script',
        get_theme_file_uri() . '/assets/js/vendor/slick.min.js',
        array(),
        '1.8.1',
        true
    );

    // パララックスライブラリ
    wp_enqueue_script(
        'rellax-script',
        get_theme_file_uri() . '/assets/js/vendor/rellax.min.js',
        array(),
        '1.12.1',
        true
    );

    // pictureタグのPolyfill
    wp_enqueue_script(
        'picturefill-script',
        get_theme_file_uri() . '/assets/js/vendor/picturefill.min.js',
        array(),
        '3.0.2',
        true
    );

    // ライトボックス
    wp_enqueue_script(
        'lightbox-script',
        get_theme_file_uri() . '/assets/js/vendor/lightbox.min.js',
        array(),
        '2.11.31',
        true
    );

    // 制作実績ページのSPで必要な横スクロール用ライブラリ
    wp_enqueue_script(
        'mCustomScrollbar-script',
        get_theme_file_uri() . '/assets/js/vendor/jquery.mCustomScrollbar.concat.min.js',
        array(),
        '3.1.13',
        true
    );

    // 北映のJavaScript郡をIEなどで実行するためのPolyfill
    wp_enqueue_script(
        'hokuei-polyfill-script',
        get_theme_file_uri() . '/assets/js/polyfill.js',
        array(),
        filemtime( get_theme_file_path() . '/assets/js/polyfill.js'),
        true
    );

    // テーマのスクリプト
    wp_enqueue_script(
        'hokuei-script',
        get_theme_file_uri() . '/assets/js/main.js',
        array( 'jquery', 'hokuei-polyfill-script' ),
        filemtime( get_theme_file_path() . '/assets/js/main.js'),
        true
    );
    ### endregion
}
add_action( 'wp_enqueue_scripts', 'hokuei_enqueue_styles_scripts' );

/**
 * Font awesome 5用に出力scriptタグを修正
 *
 * @param $tag
 * @param $handle
 * @param $src
 *
 * @return string
 */
function add_attribs_to_scripts( $tag, $handle, $src ) {

    $font_awesome_5 = array(
        'font-awesome-5'
    );

    if ( in_array( $handle, $font_awesome_5 ) ) {
        return '<script defer src="' . $src . '" crossorigin="anonymous"></script>' . "\n";
    }

    return $tag;
}
add_filter( 'script_loader_tag', 'add_attribs_to_scripts', 10, 3 );

/**
 * HTML5用にscriptタグからtype属性を削除
 */
add_action( 'template_redirect', function () {
    ob_start(function ( $buffer ) {
        $buffer = str_replace( array( 'type="text/javascript"', "type='text/javascript'" ), '', $buffer );
        return $buffer;
    });
});

/**
 * カスタムナビゲーションのliに専用クラスを付与できる機能追加
 *
 * @param [type] $classes
 * @param [type] $item
 * @param [type] $args
 * @return void
 */
function add_additional_class_on_li( $classes, $item, $args ) {
    if ( isset( $args->add_li_class ) ) {
        $classes[] = $args->add_li_class;
    }

    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

/**
 * ウィジェットの実装
 *
 * @return void
 */
function hokuei_widgets_init() {
    register_sidebar( array(
        'name' => __( 'サイドバー' ),
        'id' => 'sidebar-widget',
        'before_widget' => '<div id="%1$s" class="m-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="m-widget__title">',
        'after_title' => '</h3>',
    ) );
}
add_action( 'widgets_init', 'hokuei_widgets_init' );

/**
 * ページネーションのHTML構造を変更
 *
 * @param [type] $template
 * @return void
 */
function custom_the_posts_pagination( $template ) {
    $template = '
    <nav class="navigation pagination %1$s" data-scroll="fadeInUp">
        <div class="container">
            <h2 class="screen-reader-text">%2$s</h2>
            <div class="nav-links">%3$s</div>
        </div>
    </nav>';
    return $template;
}
add_filter( 'navigation_markup_template', 'custom_the_posts_pagination' );


/**
 * カスタム投稿タイプの実装
 * 制作実績用
 */
function my_custom_post() {
    $labels = array(
        'name' => '制作実績',
        'singular_name' => '制作実績',
        'add_new' => '新規追加',
        'add_new_item' => '制作実績を追加',
        'edit_item' => '制作実績を編集',
        'new_item' => '新しい制作実績',
        'view_item' => '制作実績を表示',
        'view_items' => '制作実績一覧を表示',
        'search_items' => '制作実績を探す',
        'not_found' =>  '制作実績はありません',
        'not_found_in_trash' => 'ゴミ箱に制作実績はありません',
        'parent_item_colon' => '',
    );

    $works = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => true,
        'show_in_rest' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => 4,
        'supports' => array('title','editor','thumbnail','custom-fields','excerpt','trackbacks','revisions','page-attributes'),
        'has_archive' => true,
    );
    register_post_type( 'works',$works );

    //カテゴリータイプ
    $works_cat_args = array(
        'label' => '制作実績カテゴリー',
        'public' => true,
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'hierarchical' => true
    );
    register_taxonomy( 'works_cat', 'works', $works_cat_args );

    $works_tag_args = array(
        'label' => '制作実績タグ',
        'public' => false,
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'hierarchical' => true
    );
    register_taxonomy( 'works_tag', 'works', $works_tag_args );
}
add_action( 'init', 'my_custom_post' );


/**
 * 担当者で制作実績一覧のフィルタリング
 *
 * @param [type] $query
 * @return void
 */
function works_by_member( $query ) {
    if ( is_admin() || ! $query->is_main_query() )
        return;

    if ( is_post_type_archive( 'works' ) ) {
        $member_name = filter_input( INPUT_GET, 'member', FILTER_SANITIZE_SPECIAL_CHARS );

        if ( is_null( $member_name ) ) return;

        // 大文字に変換
        $member_name = mb_strtoupper( $member_name );

        // アンダースコアを半角スペースへ
        $member_name = str_replace( "_", " ", $member_name );

        // ユーザー情報を取得
        $users_args = array(
            "number"        => 1,
            "meta_key"      => "name_en",
            "meta_value"    => $member_name
        );
        $user = get_users( $users_args );

        if ( is_null( $user ) ) return;

        $meta_query = array(
            array(
                'key'       => 'member',
                'value'     => $user[0]->ID,
                'compare'   => 'LIKE',
            ),
        );

        $query->set( 'meta_query', $meta_query );
        return;
    }
}
add_action( 'pre_get_posts', 'works_by_member' );

/**
 * 記事の公開、更新日に合わせて「New」ラベルの表示
 *
 * @param int $days             公開（更新）されてからラベルを表示する日数
 * @param string $label_text    ラベルに表示するテキストを指定
 * @param string $class         クラス名を指定
 * @param string $date_type     ラベルの表示条件が公開日なら'release'、更新日なら'modified'
 * @param int|WP_Post $post     WP_Post object or ID. Default is global $post object.
 */
function the_new_label( $days = 3, $label_text = 'New', $class = 'label', $date_type = 'release', $post = null ) {
    $today  = date_i18n( 'U' );
    $date   = get_the_time( 'U', $post );

    if ( $date_type === 'modified' ) {
        $date = get_the_modified_date( 'U', $post );
    }

    $elapsed = date( 'U', ( $today - $date ) ) / 86400;

    if ( $days > $elapsed ) {
        echo '<span class="' . $class . '">' . $label_text . '</span>';
    }
}

/**
 * 制作実績一覧のALLから特定のカテゴリの記事を除外
 *
 * @param [type] $query
 * @return void
 */
function hokuei_works_filter( $query ) {
    if ( is_admin() || ! $query->is_main_query() )
        return;

    if ( is_post_type_archive( 'works' ) ) {
        // YouTubeカテゴリーに属し、トルダケのタグが貼られている記事を制作実績一覧から除外する
        // 「relation」を"OR"にすると両方設定している記事が除外される（ANDだと方方設定しているだけで除外されるのでだめ）
        $tax_query = array(
            'relation' => 'OR',
            array(
                'taxonomy'  => 'works_cat',
                'field'     => 'slug',
                'terms'     => array( 'youtube' ),
                'operator'  => 'NOT IN',
            ),
            array(
                'taxonomy'  => 'works_tag',
                'field'     => 'slug',
                'terms'     => array( 'torudake' ),
                'operator'  => 'NOT IN',
            ),
        );

        $query->set( 'tax_query', $tax_query );

        return;
    }
}
add_action( 'pre_get_posts', 'hokuei_works_filter' );
