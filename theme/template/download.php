<?php
/*
 * Template Name: 無料資料ダウンロード
 * Template Post Type: page
 * Description: 無料資料ダウンロードのページ
 */
get_header();

while ( have_posts() ) : the_post(); ?>
<header class="pageHeadline">
    <div class="container">
        <h1 class="pageHeadline--title font-mincho"><?php the_title(); ?></h1>
    </div>
</header>

<div class="pageBody pageBody-download">
    <div class="container">
        <div class="pageBody--content pageBody-download--content">
            <div class="downloadContents">
                <figure class="downloadContents--thumbnail">
                    <picture>
                        <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/global/download_img.jpg 1x, <?php echo get_theme_file_uri(); ?>/assets/images/global/download_img@2x.jpg 2x" media="(min-width: 64em)"><img src="<?php echo get_theme_file_uri(); ?>/assets/images/global/download_img.jpg" srcset="<?php echo get_theme_file_uri(); ?>/assets/images/global/download_img.jpg 1x, <?php echo get_theme_file_uri(); ?>/assets/images/global/download_img@2x.jpg 2x">
                    </picture>
                </figure>

                <div class="downloadContents--content">
                  <div class="theContent">
                    <?php the_content(); ?>
                  </div>
                </div>
              </div>
        </div>
    </div>
</div>
<?php endwhile;

get_footer(); ?>
