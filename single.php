<?php get_header(); ?>
<div id="container">
<div id="content" class="align">
   
    <div class="pn_post">
        <div class="previous_post">
            <?php previous_post('%', '&laquo; Article précédent', 'no'); ?>
        </div>
        <div class="next_post">
            <?php next_post('%', 'Article suivant &raquo;', 'no'); ?>
        </div>
    </div>
    <div class="clear"></div>
    
  <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
      <div class="post">
        <hr/>
        <h1 class="post-title"><?php the_title(); ?></h1>
        <p class="post-info">
            Posté le <?php the_time('j F Y'); ?> dans <?php the_category(', '); ?> par <?php the_author(); ?>.
        </p>
        <p class="post-thumbnail-single">
            <?php the_post_thumbnail('post-thumb-1'); ?>
        </p>
        <div class="post-content">
            <?php the_content(); ?>
            <div class="post-tag">
                <?php the_tags(); ?>
            </div>
            <hr/>
            <div class="post-comments"> 
                <?php comments_template(); ?> 
            </div>
        </div>
    </div>
    <?php endwhile; ?>
  <?php endif; ?>
</div><!-- Fin Content -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>