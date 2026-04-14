<?php
/**
 * Template Name: Page en développement
 * Description: Page d'attente avec la photo du chat Zébulon.
 * 
 * @package TwentyTwentyFive_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<?php get_header(); ?>

<div class="dev-page-wrapper">
    <div class="glass-card dev-message-card">
        <div class="glass-card-inner">
            <h1 class="card-title" style="font-size: 36px; text-align: center; margin-bottom: 10px;">Page en construction 🚧</h1>
            
            <p class="card-excerpt" style="text-align: center; margin-bottom: 30px; font-size: 16px;">
                Je travaille activement sur cette section, elle sera bientôt disponible !<br>
                En attendant, voici mon chat <strong>Zébulon</strong> pour vous faire patienter :
            </p>
            
            <div class="dev-image-container">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/zebulon.jpg" alt="Zébulon le chat" class="dev-cat-image">
            </div>

            <div style="text-align: center; margin-top: 40px; display: flex; justify-content: center;">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="card-read-more">Retour à l'accueil</a>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>