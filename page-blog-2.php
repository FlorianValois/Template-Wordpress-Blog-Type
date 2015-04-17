<?php 
/*
	Template Name: Blog Style 2
*/
?>
<?php get_header(); ?>

<div id="container">
   <div id="content" class="align">  
		<?php // Display blog posts on any page @ http://m0n.co/l
		$temp = $wp_query; $wp_query= null;
		$wp_query = new WP_Query(); $wp_query->query('' . '&paged='.$paged);
		while ($wp_query->have_posts()) : $wp_query->the_post(); ?>

		<div id="article-loop2" class="col col-425">
        <div class="post-thumbnail">
        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('home-post-thumb-2'); ?></a>
        <div class="post-categories">
        <?php the_category(', '); ?>
        </div>
        </div>
        <div class="post-info">
        Publié par <a class="author-link" href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author"><?php the_author(); ?></a> - <?php the_time('j F Y'); ?>
        <h3 class="post-title">
        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h3>
        </div>
        <div class="post-content">
        <?php the_excerpt(); ?>
        </div>
        <a class="more-link" href="<?php the_permalink() ?>">Lire la suite</a>
        <div class="comments-link">
            <span>
                <?php comments_popup_link( 
                    __( '0 commentaire' ),
                    __( '1 commentaire' ), 
                    __( '% commentaires' ) ); 
                ?>
            </span>
        </div>
    </div>

		<?php endwhile;  ?>

		<?php wp_reset_postdata(); ?>

        <div class="clear"></div>
    
        <?php theme_pagination(); ?>
    </div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>