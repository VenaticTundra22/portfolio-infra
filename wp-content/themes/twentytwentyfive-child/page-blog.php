<?php
/**
 * Template Name: Blog Page
 * Template : Page Blog
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<?php get_header(); ?>

<div class="blog-page-wrapper">
    <!-- En-tête de recherche -->
    <div class="blog-header">
        <h1 class="blog-page-title">Rechercher un article</h1>
        <form role="search" method="get" class="blog-search-form" action="<?php echo esc_url( get_permalink() ); ?>">
            <input type="search" class="blog-search-input" placeholder="Taper un mot-clé..." value="<?php echo isset($_GET['blog_search']) ? esc_attr($_GET['blog_search']) : ''; ?>" name="blog_search" />
        </form>
    </div>

    <!-- Grille des articles -->
    <div class="blog-grid">
            <?php
            $search_query = isset($_GET['blog_search']) ? sanitize_text_field($_GET['blog_search']) : '';
            
            $args = array(
                'post_type'      => 'post',
                'posts_per_page' => 12,
                'post_status'    => 'publish',
                'orderby'        => 'date',
                'order'          => 'DESC',
                's'              => $search_query
            );

            $blog_query = new WP_Query( $args );

            if ( $blog_query->have_posts() ) :
                while ( $blog_query->have_posts() ) : $blog_query->the_post();
            ?>
                <div class="glass-card">
                    <div class="glass-card-inner">
                        <h2 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <div class="card-category"><?php the_category(' / '); ?></div>
                        
                        <?php if ( ! empty( $search_query ) ) : 
                            // On récupère le contenu complet + le titre pour compter le nombre d'occurrences exactes
                            $content_text = wp_strip_all_tags( get_the_content() . ' ' . get_the_title() );
                            $occurrences = substr_count( mb_strtolower( $content_text, 'UTF-8' ), mb_strtolower( $search_query, 'UTF-8' ) );
                        ?>
                            <div class="search-matches" style="font-family: 'Inter', sans-serif; font-size: 11px; font-weight: 500; color: #3498db; margin-bottom: 15px; border: 1px solid rgba(52, 152, 219, 0.3); background: rgba(52, 152, 219, 0.1); padding: 4px 10px; border-radius: 50px; display: inline-block; align-self: flex-start;">
                                🔍 <?php echo $occurrences; ?> itération(s) trouvée(s)
                            </div>
                        <?php endif; ?>

                        <p class="card-excerpt"><?php echo wp_trim_words( get_the_excerpt(), 20 ); ?></p>
                        <div class="card-date"><?php echo get_the_date('d.m.Y'); ?></div>
                        <a href="<?php the_permalink(); ?>" class="card-read-more">LIRE →</a>
                    </div>
                </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
            ?>
                <p class="no-articles" style="color: #fff; text-align: center; width: 100%; grid-column: 1 / -1; font-family: 'Inter', sans-serif;">
                    Aucun article trouvé pour cette recherche.
                </p>
            <?php endif; ?>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.querySelector('.blog-search-input');
    const searchForm = document.querySelector('.blog-search-form');
    
    if (searchInput && searchForm) {
        // L'événement 'search' se déclenche quand on appuie sur "Entrée" ou quand on clique sur la petite croix (x)
        searchInput.addEventListener('search', function() {
            if (this.value === '') {
                window.location.href = searchForm.action; // Recharge la page de base sans paramètres de recherche
            }
        });
    }
});
</script>

<?php get_footer(); ?>
