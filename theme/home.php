<?php get_header(); ?>

<header class="pageHeader">
    <div class="container">
        <div class="pageHeader--inner" data-scroll="fadeInUp">
            <h1 class="pageHeader--title font-josefin">News</h1>
            <p class="pageHeader--name font-mincho">ニュース</p>
        </div>
    </div>
</header>

<section class="newsList">
    <div class="container">
        <?php if ( have_posts() ) : ?>
            <ul class="newsList--inner">
                <?php
                $count = 1;
                while ( have_posts() ) : the_post(); ?>
                    <?php if ( ( $count % 3 ) === 0 ) : ?>
                        <li class="newsList--item" data-scroll="fadeInUp" data-delay="400">
                    <?php elseif ( ( ( $count + 1 ) % 3 ) === 0 ) : ?>
                        <li class="newsList--item" data-scroll="fadeInUp" data-delay="200">
                    <?php else : ?>
                        <li class="newsList--item" data-scroll="fadeInUp">
                    <?php endif; ?>
                        <a href="<?php the_permalink(); ?>">
                        <figure class="newsList--image">
                            <div class="newsList--imageInner" style="background-image: url(<?php the_post_thumbnail_url( 'news-list-thumbnail' ); ?>)"></div>
                        </figure>
                        <div class="newsList--overview">
                            <div class="newsList--timeWrapper">
                                <time class="newsList--time"><?php echo get_the_date( 'Y.m.d' ); ?></time>
                                <?php if ( ( $count % 3 ) === 0 ) : ?>
                                    <div class="moveLine is-pc" data-scroll data-delay="800"></div>
                                <?php elseif ( ( ( $count + 1 ) % 3 ) === 0 ) : ?>
                                    <div class="moveLine is-pc" data-scroll data-delay="600"></div>
                                <?php else : ?>
                                    <div class="moveLine is-pc" data-scroll data-delay="400"></div>
                                <?php endif; ?>
                            </div>
                        <h2 class="newsList--title font-mincho"><?php the_title(); ?></h2>
                        </div>
                        </a>
                    </li>
                <?php $count++; endwhile; ?>
            </ul>
        <?php endif; ?>
    </div>
</section>

<?php the_posts_pagination( array(
    'prev_text' => "<i class='fas fa-chevron-left'></i>PREV",
    'next_text' => "NEXT<i class='fas fa-chevron-right'></i>",
) ); ?>

<?php get_template_part( "template-parts/contact-link" ); ?>

<?php get_footer();
