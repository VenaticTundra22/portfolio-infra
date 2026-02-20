<?php
/**
 * Template : Article individuel (Single Post)
 *
 * Ce template contrôle l'affichage des articles individuels
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

    <div class="single-post-container">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <article class="single-article">

                <!-- En-tête de l'article -->
                <header class="single-article-header">
                    <div class="article-category">
                        <?php
                        $categories = get_the_category();
                        if (!empty($categories)) {
                            echo '<span class="category-badge">' . esc_html($categories[0]->name) . '</span>';
                        }
                        ?>
                    </div>

                    <h1 class="single-article-title"><?php the_title(); ?></h1>

                    <div class="single-article-meta">
                        <time datetime="<?php echo get_the_date('Y-m-d'); ?>" class="article-date">
                            📅 <?php echo get_the_date('l j F Y'); ?>
                        </time>
                        <span class="article-author">
                            ✍️ Par <?php the_author(); ?>
                        </span>
                        <span class="article-reading-time">
                            ⏱️ <?php echo estimated_reading_time(); ?> min de lecture
                        </span>
                    </div>
                </header>

                <!-- Image à la une -->
                <?php if (has_post_thumbnail()) : ?>
                    <div class="single-article-thumbnail">
                        <?php the_post_thumbnail('large', array('class' => 'featured-image')); ?>
                    </div>
                <?php endif; ?>

                <!-- Contenu de l'article -->
                <div class="single-article-content">
                    <?php the_content(); ?>

                    <!-- Pagination pour articles longs -->
                    <?php
                    wp_link_pages(array(
                        'before' => '<div class="page-links">Pages : ',
                        'after'  => '</div>',
                    ));
                    ?>
                </div>

                <!-- Tags de l'article -->
                <?php
                $tags = get_the_tags();
                if ($tags) :
                ?>
                    <div class="article-tags">
                        <h3>🏷️ Tags :</h3>
                        <div class="tags-list">
                            <?php foreach ($tags as $tag) : ?>
                                <a href="<?php echo get_tag_link($tag->term_id); ?>" class="tag-link">
                                    #<?php echo esc_html($tag->name); ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Navigation entre articles -->
                <nav class="article-navigation">
                    <div class="nav-previous">
                        <?php previous_post_link('%link', '← Article précédent : %title'); ?>
                    </div>
                    <div class="nav-next">
                        <?php next_post_link('%link', 'Article suivant : %title →'); ?>
                    </div>
                </nav>

                <!-- Auteur (si activé) -->
                <?php if (get_the_author_meta('description')) : ?>
                    <div class="author-bio">
                        <h3>À propos de l'auteur</h3>
                        <div class="author-info">
                            <div class="author-avatar">
                                <?php echo get_avatar(get_the_author_meta('ID'), 80); ?>
                            </div>
                            <div class="author-details">
                                <h4><?php the_author(); ?></h4>
                                <p><?php the_author_meta('description'); ?></p>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Articles similaires -->
                <?php
                $related_posts = get_related_posts(get_the_ID(), 3);
                if (!empty($related_posts)) :
                ?>
                    <div class="related-posts">
                        <h3>📚 Articles similaires</h3>
                        <div class="related-posts-grid">
                            <?php foreach ($related_posts as $post) : setup_postdata($post); ?>
                                <article class="related-post">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <div class="related-post-thumbnail">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_post_thumbnail('medium'); ?>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                    <p><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                                </article>
                            <?php endforeach; wp_reset_postdata(); ?>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Commentaires -->
                <?php if (comments_open() || get_comments_number()) : ?>
                    <div class="comments-section">
                        <?php comments_template(); ?>
                    </div>
                <?php endif; ?>

            </article>

        <?php endwhile; else : ?>

            <div class="no-post-found">
                <h2>Article non trouvé</h2>
                <p>Désolé, l'article que vous cherchez n'existe pas.</p>
                <a href="<?php echo esc_url(home_url('/blog.php')); ?>" class="back-to-blog">← Retour au blog</a>
            </div>

        <?php endif; ?>
    </div>

</main>

<?php get_footer(); ?>

<?php
/**
 * Fonction pour estimer le temps de lecture
 */
function estimated_reading_time() {
    $content = get_post_field('post_content', get_the_ID());
    $word_count = str_word_count(strip_tags($content));
    $reading_time = ceil($word_count / 200); // 200 mots par minute
    return $reading_time;
}

/**
 * Fonction pour récupérer les articles similaires
 */
function get_related_posts($post_id, $number_posts = 3) {
    $categories = get_the_category($post_id);
    if (empty($categories)) return array();

    $category_ids = array();
    foreach ($categories as $category) {
        $category_ids[] = $category->term_id;
    }

    $args = array(
        'category__in' => $category_ids,
        'post__not_in' => array($post_id),
        'posts_per_page' => $number_posts,
        'orderby' => 'rand'
    );

    return get_posts($args);
}
?>