<?php get_header(); ?>

<div class="errorBody">
    <div class="container">
        <div class="errorBody--content"><a class="brandLogo" href="<?php echo home_url( "/" ); ?>"  data-scroll="fadeInUp">
            <div class="brandLogo--horizontal">
                <svg>
                <use xlink:href="<?php echo get_theme_file_uri(); ?>/assets/images/svg-sprite/sprite.svg#brand-logo"></use>
                </svg>
            </div></a>
            <div class="theContent" data-scroll="fadeInUp">
                <h1 class="font-mincho">ページが見つかりませんでした。</h1>
                <p>指定されたURLのページは存在しません。</p>
                <p>サイト更新などによってURLが変更になったか、URLが正しく入力されていない可能性があります。</p>
                <p><a href="<?php echo home_url( "/" ); ?>">トップへ戻る。</a></p>
            </div>
        </div>
    </div>
</div>

<?php get_footer();
