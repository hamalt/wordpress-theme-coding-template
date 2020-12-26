<?php get_header(); ?>

<section class="worksContents">
    <div class="container">
        <?php while ( have_posts() ) : the_post(); ?>
        <div class="worksContents--inner">
            <div class="worksContents--video">
                <div class="worksContents--videoInner">
                    <div class="worksVideo">
                        <div class="worksVideo--inner">
                            <div class="worksVideo--frame">
                            <?php
                            $youtube_url = get_field( "youtube_url" );
                            if ( $youtube_url ) :
                                parse_str( parse_url( $youtube_url, PHP_URL_QUERY ), $youtube_id ); ?>
                                <iframe src="//www.youtube.com/embed/<?php echo esc_attr( $youtube_id['v'] ); ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
                            <?php else : ?>
                                <?php the_post_thumbnail( "single-works-thumbnail" ); ?>
                            <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="worksContents--body">
            <div class="worksContents--videoSpacer" data-scroll></div>
            <header class="worksContents--header font-mincho" data-scroll="fadeInUp">
                <p class="worksContents--meta"><?php the_field( "meta" ); ?></p>
                <h1 class="worksContents--title"><?php the_title(); ?></h1>
            </header>
            <div class="worksContents--text" data-scroll="fadeInUp">
                <div class="theContent">
                    <?php the_content(); ?>
                </div>
            </div>

            <?php $post_terms = wp_get_post_terms( get_the_ID(), "works_tag" );
            if ( $post_terms ) : ?>
                <ul class="worksContents--tags font-josefin" data-scroll="fadeInUp">
                    <?php foreach ( $post_terms as $post_term ) : ?>
                    <li><span><?php echo $post_term->name; ?></span></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <?php
            $gallery = get_field( "gallery" );
            if ( $gallery ): ?>
                <div class="worksContents--gallery" data-scroll="fadeInUp">
                    <div class="worksGallery">
                        <ul>
                            <?php foreach ( $gallery as $image ) : ?>
                                <li>
                                    <a href="<?php echo esc_url( $image["url"] ); ?>" data-lightbox="works-gallery">
                                        <div class="worksGallery--image" style="background-image: url(<?php echo esc_url( $image["sizes"]["works-gallery-thumbnail"] ); ?>);"></div>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            <?php endif; ?>
            <div class="worksContents--info" data-scroll="fadeInUp">
                <dl>
                <dt class="font-josefin">PROJECT</dt>
                <dd><?php echo get_field( "project" ) ? get_field( "project" ) : "-"; ?></dd>
                </dl>
                <dl>
                <dt class="font-josefin">CREDIT</dt>
                <dd><?php echo get_field( "credit" ) ? get_field( "credit" ) : "-"; ?></dd>
                </dl>
                <dl>
                <dt class="font-josefin">MEMBER</dt>
                <dd class="worksContents--members">
                    <?php
                    the_field( "other_member", get_the_ID() );
                    $member_array = get_field( "member" );
                    if ( $member_array ) :
                        foreach ( $member_array as $member ) :
                            $member_page = get_page_by_path( "member" );
                            $member_permalink = get_permalink( $member_page->ID );
                            if ( get_field( 'order', 'user_'. $member["ID"] ) ) : ?><span><a href="<?php echo esc_url( untrailingslashit ( $member_permalink ) ); ?>#<?php echo mb_strtolower( str_replace( " ","_", get_field( 'name_en', 'user_'. $member["ID"] ) ) ); ?>"><?php the_field( 'name_en', 'user_'. $member["ID"] ); ?></a></span><?php else : ?><span><?php the_field( 'name_en', 'user_'. $member["ID"] ); ?></span><?php endif; ?><?php
                        endforeach;
                    else : ?>
                        -
                    <?php endif; ?>
                </dd>
                </dl>
                <dl>
                <dt class="font-josefin">LINKS</dt>
                <dd class="worksContents--links">
                    <?php
                    if ( have_rows( 'links' ) ) :
                        while ( have_rows( 'links' ) ) : the_row(); ?>
                        <a href="<?php the_sub_field( 'link_url' ); ?>"<?php echo get_sub_field( 'link_blank' ) ? " target='_blank'" : ""; ?>><?php the_sub_field( 'link_label' ); ?></a>
                        <?php endwhile; ?>
                    <?php else : ?>
                        -
                    <?php endif; ?>
                </dd>
                </dl>
            </div>
            <?php
            $contact_page = get_page_by_path( "contact" );
            $contact_permalink = get_permalink( $contact_page->ID );
            ?>
            <div class="worksContents--contact" data-scroll="fadeInUp"><a class="linkButton" href="<?php echo esc_url( $contact_permalink ); ?>">お問い合わせ</a></div>
            <div class="worksContents--relatedWorks" data-scroll="fadeInUp">
                <div class="relatedWorks">
                <h3 class="relatedWorks--headline font-josefin">RELATED WORKS</h3>
                <?php
                $post_terms = get_the_terms( get_the_ID(), 'works_tag' );
                $tax_query_terms;

                if ( $post_terms ) {
                    foreach( $post_terms as $post_term ) {
                        $tax_query_terms[] = $post_term->slug;
                    }
                }

                $related_works_args = array(
                    'posts_per_page' => 2,
                    'post_type' => 'works',
                    'post__not_in' => array( get_the_ID() ),
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'works_cat',
                            'field'    => 'slug',
                            'terms'    => $tax_query_terms,
                        ),
                    ),
                );
                $related_works_posts = get_posts( $related_works_args );
                if ( $related_works_posts ) : ?>
                    <ul class="relatedWorks--list">
                        <?php foreach ( $related_works_posts as $works_post ) : setup_postdata( $works_post ); ?>
                            <li class="relatedWorks--item">
                                <a href="<?php echo get_permalink( $works_post->ID ); ?>">
                                    <figure class="relatedWorks--thumbnail">
                                        <div class="relatedWorks--thumbnailImage" style="background-image: url(<?php echo get_the_post_thumbnail_url( $works_post->ID, 'related-works-thumbnail' )?>);"></div>
                                    </figure>
                                    <div class="relatedWorks--overview">
                                        <div class="relatedWorks--text">
                                            <div class="relatedWorks--meta is-sp"><?php the_field( "meta", $works_post->ID ); ?></div>
                                            <h4 class="relatedWorks--title font-mincho"><?php echo get_the_title( $works_post->ID ); ?></h4>
                                        </div>
                                    </div>
                                    <?php $related_terms = wp_get_post_terms( $works_post->ID, "works_tag" );
                                    if ( $related_terms ) : ?>
                                        <div class="relatedWorks--tags font-josefin is-pc">
                                            <?php foreach ( $related_terms as $related_term ) : ?>
                                                <span><?php echo $related_term->name; ?></span>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php else : ?>
                    <p>関連した制作事例はまだありません。</p>
                <?php endif; ?>
                <div class="relatedWorks--worksLink font-mincho">
                    <a class="linkButton linkButton-white" href="<?php echo esc_url( get_post_type_archive_link( "works" ) ); ?>">制作実績一覧へ</a>
                </div>
                </div>
            </div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</section>

<?php get_footer();
