<?php
/**
 * Template Name: Blog Page
 * Template : Page Blog
 *
 * Ce template affiche la page blog avec les articles
 *
 * @package TwentyTwentyFive_Child
 */

// Sécurité : empêche l'accès direct
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<?php get_header(); ?>

<main class="site-content">

    <section class="blog-hero">
        <h1>Mon Blog Technique</h1>
        <p>Découvrez mes articles sur l'informatique, le développement web et mes apprentissages</p>
    </section>

    <div class="blog-container">
        <?php
        // Arguments pour la requête des articles
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 10,
            'post_status' => 'publish',
            'orderby' => 'date',
            'order' => 'DESC'
        );

        $blog_query = new WP_Query($args);

        if ($blog_query->have_posts()) :
            while ($blog_query->have_posts()) : $blog_query->the_post();
        ?>
            <article class="blog-article">
                <header class="article-header">
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <div class="article-meta">
                        <time datetime="<?php echo get_the_date('Y-m-d'); ?>">
                            <?php echo get_the_date('d F Y'); ?>
                        </time>
                        <span class="article-author">Par <?php the_author(); ?></span>
                    </div>
                </header>

                <div class="article-content">
                    <?php
                    if (has_post_thumbnail()) {
                        the_post_thumbnail('medium', array('class' => 'article-thumbnail'));
                    }
                    ?>
                    <div class="article-excerpt">
                        <?php the_excerpt(); ?>
                    </div>
                    <a href="<?php the_permalink(); ?>" class="read-more">Lire la suite →</a>
                </div>
            </article>
        <?php
            endwhile;
            wp_reset_postdata();
        else :
        ?>
            <div class="no-posts">
                <h3>Aucun article pour le moment</h3>
                <p>Les articles de blog seront bientôt disponibles ici !</p>
            </div>
        <?php endif; ?>
    </div>

</main>

<?php get_footer(); ?>
