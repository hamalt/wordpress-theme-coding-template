<?php get_header();

while ( have_posts() ) : the_post(); ?>
<header class="pageHeadline">
    <div class="container">
        <h1 class="pageHeadline--title font-mincho"><?php the_title(); ?></h1>
    </div>
</header>

<div class="pageBody">
    <div class="pageBody--content">
        <div class="theContent">
            <?php the_content(); ?>
        </div>
    </div>
</div>
<?php endwhile;

get_footer(); ?>
