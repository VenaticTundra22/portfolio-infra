<?php
/**
 * Template: Single Post
 * Description: Displays individual blog posts in the same theme as other pages.
 *
 * @package TwentyTwentyFive_Child
 */

// Prevent direct access
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();
?>

<div class="single-post-wrapper">
    <!-- Background Image -->
    <div class="abstract-image">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/windows.png" alt="">
    </div>

    <!-- Back Button -->
    <a href="<?php echo esc_url( home_url( '/blog' ) ); ?>" class="back-button">
        <div class="back-button-circle">
            ←
        </div>
    </a>

    <main class="site-content">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <article class="single-article">

                <!-- Article Header -->
                <header class="single-article-header">
                    <div class="article-category">
                        <?php 
                        $categories = get_the_category();
                        if ( ! empty( $categories ) ) {
                            echo '<span>' . esc_html( $categories[0]->name ) . '</span>';
                        }
                        ?>
                    </div>
                    <h1 class="single-article-title"><?php the_title(); ?></h1>
                    <div class="single-article-meta">
                        <time datetime="<?php echo get_the_date('Y-m-d'); ?>">
                            <?php echo get_the_date('d F Y'); ?>
                        </time>
                    </div>
                </header>

                <!-- Article Content -->
                <div class="single-article-content">
                    <?php the_content(); ?>
                </div>

                <!-- Article Navigation -->
                <nav class="article-navigation">
                    <div class="nav-previous">
                        <?php previous_post_link('%link', '← Article précédent'); ?>
                    </div>
                    <div class="nav-next">
                        <?php next_post_link('%link', 'Article suivant →'); ?>
                    </div>
                </nav>

            </article>
        <?php endwhile; else : ?>
            <p><?php esc_html_e( 'Aucun article trouvé.', 'twentytwentyfive-child' ); ?></p>
        <?php endif; ?>
    </main>
</div>

<?php get_footer(); ?>