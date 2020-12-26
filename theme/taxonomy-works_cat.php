<?php get_header(); ?>

<header class="pageHeader">
    <div class="container">
        <div class="pageHeader--inner" data-scroll="fadeInUp">
            <h1 class="pageHeader--title font-josefin">Works</h1>
            <p class="pageHeader--name font-mincho">制作実績一覧</p>
        </div>
    </div>

    <?php $current_term_slug = get_query_var( "term" ); ?>

    <div class="worksTags" data-scroll="fadeInUp">
        <div class="container">
            <div class="worksTags--allLink">
                <ul>
                  <li><a href="<?php echo esc_url( get_post_type_archive_link( "works" ) ); ?>"><span>ALL</span></a></li>
                </ul>
            </div>

            <ul>
                <?php $terms = get_terms( 'works_cat' );
                foreach( $terms as $key => $term ) :
                    $item_class = $term->slug === $current_term_slug ? ' class="is-current"' : "";
                    ?>
                    <li<?php echo $item_class; ?>><a href="<?php echo esc_url( get_term_link( $term, "works_cat" ) ); ?>"><span><?php echo $term->slug; ?></span></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

    <div class="worksTaxInfo" data-scroll="fadeInUp">
        <div class="container">
            <?php
            $current_term = get_term_by( "slug", $current_term_slug, "works_cat" );
            ?>
            <h1 class="worksTaxInfo--title" data-ruby="<?php echo esc_attr( $current_term_slug ); ?>"><span class="font-mincho"><?php echo $current_term->name; ?></span></h1>
            <p class="worksTaxInfo--description"><?php echo $current_term->description; ?></p>
        </div>
    </div>
</header>

<section class="worksList">
    <div class="container">
        <?php if ( have_posts() ) : ?>
            <ul class="worksList--inner">
                <?php
                $count = 1;
                while ( have_posts() ) : the_post(); ?>
                    <?php if ( ( $count % 3 ) === 0 ) : ?>
                        <li class="worksList--item" data-scroll="fadeInUp" data-delay="400">
                    <?php elseif ( ( ( $count + 1 ) % 3 ) === 0 ) : ?>
                        <li class="worksList--item" data-scroll="fadeInUp" data-delay="200">
                    <?php else : ?>
                        <li class="worksList--item" data-scroll="fadeInUp">
                    <?php endif; ?>
                        <a href="<?php the_permalink(); ?>">
                            <div class="worksList--image" style="background-image: url(<?php the_post_thumbnail_url( 'works-list-thumbnail' ); ?>)"></div>

                            <div class="worksList--itemOverview">
                                <div class="worksList--text">
                                    <div class="worksList--tag"><?php the_field( "meta" ); ?></div>
                                    <h2 class="worksList--title font-mincho"><?php the_title(); ?></h2>
                                </div>
                            </div>
                        </a>
                    </li>
                <?php $count++; endwhile; ?>
            </ul>
        <?php else : ?>
            <p class="align-center">制作実績はまだありません。</p>
        <?php endif; ?>
    </div>
</section>

<?php the_posts_pagination( array(
    'prev_text' => "<i class='fas fa-chevron-left'></i>PREV",
    'next_text' => "NEXT<i class='fas fa-chevron-right'></i>",
) ); ?>

<div class="worksLink is-pc" data-scroll="fadeInUp">
    <div class="container">
        <a class="linkButton linkButton-white" href="<?php echo esc_url( get_post_type_archive_link( "works" ) ); ?>">ALL WORKS</a>
    </div>
</div>

<?php get_template_part( "template-parts/contact-link" ); ?>

<?php get_footer();
