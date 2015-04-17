<?php get_header(); ?>
 
		<div id="container">	
			<div id="content" class="align">
 
<?php if ( have_posts() ) : ?>				
 
<?php while ( have_posts() ) : the_post() ?>
<div id="article" class="col">
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
<?php endwhile; ?>
 
<?php else : ?>
 
    <p>Aucun article ne correspond à vos critères de recherche.</p>
                
<?php endif; ?>
    <div class="clear"></div>
    
    <?php theme_pagination(); ?>
    
</div><!-- Fin Content -->
 
<?php get_sidebar(); ?>	
<?php get_footer(); ?>