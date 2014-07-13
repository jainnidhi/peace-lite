<?php
/**
 * The template for displaying posts in the Gallery post format
 *
 * @package Peace
 * @since Peace 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
    <header class="entry-header clearfix">
                <div class="avatar-image">
                    <?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'peace_author_bio_avatar_size', 68 ) ); ?>
                </div>
                <div class="post-title">
                    <?php if ( is_single() ) { ?>
				<h1 class="entry-title"><?php the_title(); ?></h1>
			<?php }
			else { ?>
                        <h2 class="entry-title">
                                <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr(get_the_title()); ?>" rel="bookmark"><?php the_title(); ?></a>
                        </h2>
                        <?php } ?>
                        <div class="header-meta">
                        <p>
                            <span>Posted by <?php the_author_posts_link(); ?> &middot; </span>
                        
                            <span class="post-category">
                            <?php  $categories_list = get_the_category_list( esc_html__( ' &middot; ' ) ); 
                            echo  $categories_list;
                            ?>    
                            </span>
                        </p>
                        </div>
                </div>
                
                <div class="post-type post-type-standard">
                    <?php peace_post_format_icon(); ?>
                </div>
            </header><!-- /. entry-header -->
            
            <div class="featured-media">
		
			<?php peace_flexslider('post_feature_full_width'); ?>
					
		</div> <!-- /featured-media -->
	
	<div class="entry-content">
		<?php the_content(); ?>
				
                <?php wp_link_pages(); ?>
	</div> <!-- /.entry-content -->
       

	<footer class="entry-meta">
		<?php if ( is_singular() ) {
			// Only show the tags on the Single Post page
			peace_entry_meta();
		} ?>
		
		<?php if ( is_singular() && get_the_author_meta( 'description' ) && is_multi_author() ) {
			// If a user has filled out their description and this is a multi-author blog, show their bio
			get_template_part( 'author-bio' );
		} ?>
	</footer> <!-- /.entry-meta -->
</article> <!-- /#post -->
