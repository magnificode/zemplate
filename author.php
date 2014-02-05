<?php
/**
 * The template for displaying Author Archive pages.
 *
 * @package WordPress
 * @subpackage Zemplate
 * @since Zemplate 1.0
 */

get_header(); ?>

<section class="main author-main--sidebar">
    <div class="author-main__inner">
       <?php if ( have_posts() ) : ?>

            <?php //Queue the first post, that way we know what author we're dealing with (if that is the case). We reset this later so we can run the loop properly with a call to rewind_posts().
            the_post(); ?>

            <header class="author__header">
                <h1 class="author__title"><?php printf( __( 'Author Archives: %s' ), '<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( "ID" ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' ); ?></h1>
            </header><!-- author__header -->

            <?php
            //Since we called the_post() above, we need to rewind the loop back to the beginning that way we can run the loop properly, in full.
            rewind_posts(); ?>

            <?php
            // If a user has filled out their description, show a bio on their entries.
            if ( get_the_author_meta( 'description' ) ) : ?>
            <div class="author__info">
                <div class="author__avatar">
                    <?php echo get_avatar( get_the_author_meta( 'user_email' ) ); ?>
                </div><!-- author__avatar -->
                <div class="author__bio">
                    <h2><?php printf( __( 'About %s' ), get_the_author() ); ?></h2>
                    <p><?php the_author_meta( 'description' ); ?></p>
                </div><!-- author__bio  -->
            </div><!-- author__info -->
            <?php endif; ?>

        <div class="author-main__posts">
            <?php /* Start the Loop */ ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <?php get_template_part( 'template/parts/blog', 'excerpt' ); ?>
            <?php endwhile; ?>
        </div>
        <?php endif; ?>
    <aside class="author-main__sidebar">
        <?php get_sidebar(); ?>
    </aside> <!-- //main__sidebar -->
    </div> <!-- //main__inner -->
</section> <!-- //author-main -->
<?php get_footer(); ?>