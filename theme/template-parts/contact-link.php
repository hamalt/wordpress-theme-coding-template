<section class="aboutContactSection">
    <div class="aboutContactSection--contact" data-scroll="fadeInUp">
        <p class="align-center is-pc">映像制作をはじめとした様々な制作、<br>また「こんなことはできますか？」など、お気軽に北映までご相談ください。</p>

        <?php
        $page = get_page_by_path( "contact" );
        $contact_permalink = get_permalink( $page->ID );
        ?>

        <div class="aboutContactSection--link" data-scroll="fadeInUp">
            <a class="linkButton" href="<?php echo esc_url( $contact_permalink ); ?>">お問い合わせ</a>
        </div>
    </div>
</section>
