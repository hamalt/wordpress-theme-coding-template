<?php
/*
 * Template Name: メンバー
 * Template Post Type: page
 * Description: メンバーの説明ページ
 */
get_header(); ?>

<header class="pageHeader" data-scroll="fadeInUp">
    <div class="container">
        <div class="pageHeader--inner">
            <h1 class="pageHeader--title font-josefin">Member</h1>
            <p class="pageHeader--name font-mincho">メンバー</p>
        </div>
    </div>
</header>

<div class="memberList">
    <div class="memberList--inner">
    <?php
    $users_args = array(
        'order'     => 'ASC',
        'orderby'   => 'meta_value',
        'meta_key'  => 'order',
        'meta_value' => 1,
        'meta_compare' => '>='
    );
    $members = get_users( $users_args );
    foreach ( $members as $key => $member ) :
    ?>
        <div id="<?php echo mb_strtolower( str_replace( " ","_",get_field( 'name_en', 'user_'. $member->ID ) ) ); ?>" class="memberList--item" data-scroll="fadeInUp">
            <div class="memberCard<?php echo ( ( $key + 1 ) % 2 ) === 0 ? " even" : " odd"; ?>">
                <div class="pictureFrame">
                    <div class="pictureFrame--inner">
                        <div class="memberCard--frame">
                            <div class="memberCard--image is-pc">
                                <?php $image_pc = get_field( 'image_pc', 'user_'. $member->ID );
                                echo wp_get_attachment_image( $image_pc["ID"], "member-images-pc" ); ?>
                            </div>
                            <div class="memberCard--text">
                                <div class="memberCard--textInner">
                                    <div class="memberCard--textTop">
                                        <div class="memberCard--spImage is-sp">
                                            <figure class="memberCard--spImage-sp">
                                                <?php $image_sp = get_field( 'image_sp', 'user_'. $member->ID );
                                                echo wp_get_attachment_image( $image_sp["ID"], "member-images-sp" ); ?>
                                            </figure>
                                            <figure class="memberCard--spImage-pad">
                                                <?php echo wp_get_attachment_image( $image_pc["ID"], "member-images-pc" ); ?>
                                            </figure>
                                        </div>
                                        <div class="memberCard--textHeader">
                                            <div class="memberCard--title font-mincho"><?php the_field( 'title', 'user_'. $member->ID ); ?></div>
                                            <h2 class="memberCard--name font-mincho"><?php the_field( 'name', 'user_'. $member->ID ); ?></h2>
                                            <div class="moveLine" data-scroll data-delay="400"></div>
                                        </div>
                                    </div>
                                    <div class="memberCard--description">
                                        <?php the_field( 'description', 'user_'. $member->ID ); ?>
                                    </div><a class="memberCard--link font-mincho" href="<?php echo esc_url( untrailingslashit ( get_post_type_archive_link( "works" ) ) ); ?>?member=<?php echo mb_strtolower( str_replace( " ", "_", get_field( 'name_en', 'user_'. $member->ID ) ) ); ?>"><span>担当作品はこちら</span>
                                    <div class="lineArrow lineArrow-black"></div></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    </div>
</div>

<?php
$member_images = get_field( "member_images" );
if ( $member_images ) : ?>
    <div class="memberGallery" data-scroll="fadeInUp">
        <div class="memberGallery--slider swiper-container" dir="rtl">
            <div class="swiper-wrapper">
                <?php
                    $member_images = get_field( "member_images" );
                    foreach ( $member_images as $member_image ) : ?>
                        <div class="swiper-slide">
                            <?php echo wp_get_attachment_image( $member_image["ID"], "member-gallery" ); ?>
                        </div>
                    <?php endforeach; ?>
            </div>
        </div>
        <div class="memberGallery--count font-josefin">
            <div class="memberGallery--currentNum">01</div>
            <div class="memberGallery--countTie">-</div>
            <div class="memberGallery--totalNum"><?php echo str_pad( count( $member_images ), 2, 0, STR_PAD_LEFT ); ?></div>
        </div>
    </div>
<?php endif; ?>

<?php get_footer();
