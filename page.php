<?php
/*
Template Name: Standard
*/
?>
<?php get_header(); ?>
<div id="container">
<div id="content" class="align">
  <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
      <div class="post">
        <h1 class="post-title"><?php the_title(); ?></h1>
        <p class="post-info"></p>
        <div class="post-content">
            <?php the_content(); ?>
            <hr/>
            <div class="post-comments"> 
                <?php comments_template(); ?> 
            </div>
        </div>
      </div>
    <?php endwhile; ?>
  <?php endif; ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>