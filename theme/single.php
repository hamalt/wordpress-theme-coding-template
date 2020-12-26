<?php get_header(); ?>

<div class="pageHeader">
    <div class="container">
        <div class="pageHeader--inner" data-scroll="fadeInUp">
            <h1 class="pageHeader--title font-josefin">News</h1>
            <p class="pageHeader--name font-mincho">ニュース</p>
        </div>
    </div>
</div>

<section class="newsContents">
    <div class="container">
        <?php while ( have_posts() ) : the_post(); ?>
        <div class="newsContents--inner">
            <header class="newsContents--header" data-scroll="fadeInUp">
                <time class="newsContents--time"><?php echo get_the_date( 'Y.m.d' ); ?></time>
                <h1 class="newsContents--title"><?php the_title(); ?></h1>
            </header>

            <?php if ( has_post_thumbnail() ) : ?>
                <figure class="newsContents--thumbnail" data-scroll="fadeInUp">
                    <?php the_post_thumbnail( "news-single-thumbnail" ); ?>
                </figure>
            <?php endif; ?>

            <div class="newsContents--text" data-scroll="fadeInUp">
                <div class="theContent">
                    <?php the_content(); ?>
                </div>
            </div>

            <div class="postsNav">
                <div class="postsNav--inner">
                    <?php
                    $previous_post = get_previous_post();
                    if ( $previous_post ) : ?>
                        <a class="postsNav--prev" href="<?php the_permalink( $previous_post->ID ) ?>"><i class="fas fa-chevron-left"></i></a>
                    <?php else : ?>
                        <span class="postsNav--prev postsNav--prev-disabled"><i class="fas fa-chevron-left"></i></span>
                    <?php endif; ?>

                    <?php
                    $next_post = get_next_post();
                    if ( $next_post ) : ?>
                        <a class="postsNav--next" href="<?php the_permalink( $next_post->ID ) ?>"><i class="fas fa-chevron-right"></i></a>
                    <?php else : ?>
                        <span class="postsNav--next postsNav--next-disabled"><i class="fas fa-chevron-right"></i></span>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</section>

<section class="otherNews">
    <div class="container">
        <h2 class="otherNews--headline font-josefin" data-scroll="fadeInUp">RECENT NEWS</h2>
        <ul class="newsList--inner">
            <?php
            $args = array( 'posts_per_page' => 3 );
            $other_news = get_posts( $args );
            $count = 1;
            foreach ( $other_news as $other_news_post ) : setup_postdata( $other_news_post ); ?>
                <?php if ( ( $count % 3 ) === 0 ) : ?>
                    <li class="newsList--item" data-scroll="fadeInUp" data-delay="400">
                <?php elseif ( ( ( $count + 1 ) % 3 ) === 0 ) : ?>
                    <li class="newsList--item" data-scroll="fadeInUp" data-delay="200">
                <?php else : ?>
                    <li class="newsList--item" data-scroll="fadeInUp">
                <?php endif; ?>
                    <a href="<?php the_permalink( $other_news_post ); ?>">
                        <figure class="newsList--image">
                            <div class="newsList--imageInner" style="background-image: url(<?php echo get_the_post_thumbnail_url( $other_news_post, 'news-list-thumbnail' ); ?>)"></div>
                        </figure>

                        <div class="newsList--overview">
                            <div class="newsList--timeWrapper">
                                <time class="newsList--time"><?php echo get_the_date( 'Y.m.d', $other_news_post ); ?></time>
                                <?php if ( ( $count % 3 ) === 0 ) : ?>
                                    <div class="moveLine is-pc" data-scroll data-delay="800"></div>
                                <?php elseif ( ( ( $count + 1 ) % 3 ) === 0 ) : ?>
                                    <div class="moveLine is-pc" data-scroll data-delay="600"></div>
                                <?php else : ?>
                                    <div class="moveLine is-pc" data-scroll data-delay="400"></div>
                                <?php endif; ?>
                            </div>
                            <h2 class="newsList--title font-mincho"><?php echo get_the_title( $other_news_post ); ?></h2>
                        </div>
                    </a>
                </li>
            <?php $count++; endforeach;
            wp_reset_postdata(); ?>
        </ul>
    </div>
</section>

<?php get_footer();
