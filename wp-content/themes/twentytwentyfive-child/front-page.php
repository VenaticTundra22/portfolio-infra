<?php
/**
 * Template : Page d'accueil
 * 
 * Ce fichier est automatiquement utilisé par WordPress
 * pour afficher la page d'accueil du site.
 * 
 * @package TwentyTwentyFive_Child
 */

// Sécurité : empêche l'accès direct
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<?php get_header(); ?>

<main class="site-content" style="position: relative; z-index: 10; padding: 140px 36px 80px;">
    
    <!-- Encadré de présentation -->
    <div class="intro-container">
        <div class="intro-content">
            <h1 class="intro-title">Bonjour, je suis Vena</h1>
            <h2 class="intro-subtitle">Étudiant au lycée</h2>
            <p class="intro-text">
                Passionné par l'informatique et les nouvelles technologies, 
                j'ai toujours eu pour ambition d'en faire mon métier. <br>
                Au fil des années, cette vocation s'est concrétisée et affinée grâce à mes stages en entreprise fait au collège et au lycée. <br>
                Ce portfolio, sur lequel vous naviguez actuellement, a été conçu lors de mon dernier stage, effectué à mon entière initiative 
                en plus de ceux proposés au collège et au lycée. <br>
                Vous pourrez y découvrir comment ce site a été réalisé de zéro, 
                mon évolution professionnelle ainsi que mes différents projets et mon blog.
            </p>
            <div class="intro-actions">
                <a href="<?php echo esc_url( home_url( '/blog' ) ); ?>" class="card-read-more">Mon Blog</a>
                <a href="<?php echo esc_url( home_url( '/dev' ) ); ?>" class="card-read-more">Mes projets</a>
                <a href="<?php echo esc_url( home_url( '/parcours' ) ); ?>" class="card-read-more">Mon parcours</a>
            </div>
        </div>
        <div class="intro-image">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/front-page-image1.png" alt="Mathéo" onerror="this.src='https://images.unsplash.com/photo-1555066931-4365d14bab8c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'">
        </div>
    </div>

    <h2 class="section-heading">Mon Projet</h2>

    <!-- Exécute et affiche le shortcode directement en PHP -->
    <?php echo do_shortcode('[mes_projets]'); ?>
</main>

<?php get_footer(); ?>
