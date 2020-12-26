<?php
/*
 * Template Name: お問い合わせ
 * Template Post Type: page
 * Description: お問い合わせページ
 */
get_header(); ?>

<header class="pageHeader">
    <div class="container">
        <div class="pageHeader--inner">
            <h1 class="pageHeader--title font-josefin">Contact</h1>
            <p class="pageHeader--name font-mincho">お問い合わせ</p>
            <div class="pageHeader--description">
                <p>映像制作をはじめとした様々な制作、<br>また「こんなことはできますか？」など、お気軽に北映までご相談ください。</p>
            </div>
        </div>
    </div>
</header>

<div class="container">
    <div class="pageBody">
        <div class="theContent">
            <?php the_content(); ?>
        </div>
    </div>
</div>

<?php get_footer();
