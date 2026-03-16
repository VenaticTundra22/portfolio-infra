<?php
/**
 * Template Name: Roadmap Page
 * Description: Page affichant la roadmap du projet
 * 
 * @package TwentyTwentyFive_Child
 */

// Sécurité : empêche l'accès direct
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<?php get_header(); 
?>

<!-- Layer 1: Title (behind image) - centered -->
<div class="hero-title">ROADMAP</div>

<!-- Roadmap Container - above the image -->
<div class="roadmap-container">
    <?php
    $args = array(
        'post_type'      => 'roadmap_phase',
        'posts_per_page' => -1,
        'orderby'        => 'menu_order',
        'order'          => 'ASC',
    );

    $roadmap_query = new WP_Query( $args );

    if ( $roadmap_query->have_posts() ) :
        while ( $roadmap_query->have_posts() ) : $roadmap_query->the_post();
            
            // Récupérer les champs personnalisés
            $status      = get_post_meta( get_the_ID(), '_roadmap_status', true );
            $progress    = get_post_meta( get_the_ID(), '_roadmap_progress', true );
            $description = get_post_meta( get_the_ID(), '_roadmap_description', true );

            // Déterminer la classe CSS en fonction du statut pour le style
            $phase_class = 'phase-custom'; // Classe par défaut
            if ( $status === 'En cours' ) $phase_class = 'phase-1';
            if ( $status === 'Planifié' ) $phase_class = 'phase-2';
            if ( $status === 'Vision' )   $phase_class = 'phase-3';
            if ( $status === 'Terminé' )  $phase_class = 'phase-4';

    ?>
    <div class="roadmap-phase <?php echo esc_attr( $phase_class ); ?>">
        <div class="phase-header">
            <h2><?php the_title(); ?></h2>
            <?php if ( ! empty( $status ) ) : ?>
                <div class="phase-status"><?php echo esc_html( $status ); ?></div>
            <?php endif; ?>
        </div>
        <div class="phase-description">
            <?php if ( ! empty( $description ) ) : ?>
                <p><?php echo esc_html( $description ); ?></p>
            <?php endif; ?>
            
            <?php the_content(); // Affiche la liste des tâches depuis l'éditeur de contenu ?>
        </div>
        <?php if ( is_numeric( $progress ) ) : ?>
        <div class="progress-bar">
            <div class="progress-fill" style="width: <?php echo esc_attr( $progress ); ?>%"></div>
        </div>
        <?php endif; ?>
    </div>

    <?php
        endwhile;
        wp_reset_postdata();
    else :
    ?>
        <div class="roadmap-phase"><p><?php _e( 'Aucune phase de roadmap définie.', 'twentytwentyfive-child' ); ?></p></div>
    <?php endif; ?>
</div>

<!-- Layer 2: 3D Image (large, bottom-anchored, on top of title) -->
<div class="abstract-image">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/windows.png" alt="Abstract 3D Shape">
</div>

<!-- Custom Footer Section -->
<div class="bottom-section">
    <div class="bottom-left">
        <div class="date"></div>
        <div class="creative-direction">© 2026 Mathéo</div>
    </div>
    <div class="social-links">
        <a href="https://github.com/venatictundra22">GITHUB</a>
        <a href="#">Games</a>
        <a href="#">CARDS</a>
    </div>
</div>

<script>
    // Update date dynamically
    const dateElement = document.querySelector('.date');

    function updateDate() {
        if (!dateElement) return;
        const now = new Date();
        const day = now.getDate();
        const month = now.toLocaleString('en-US', { month: 'long' });
        const year = now.getFullYear();
        dateElement.textContent = `${day} ${month} ${year}`;
    }

    updateDate();
    setInterval(updateDate, 60000);
</script>

</div> <!-- Fermeture du .container ouvert dans header.php -->

<?php wp_footer(); ?>

</body>
</html>
