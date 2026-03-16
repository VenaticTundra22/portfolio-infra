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

<!-- Layer 1: Title (behind image) - centered -->
<div class="hero-title">VenaticTundra22</div>

<!-- Layer 2: 3D Image (large, bottom-anchored, on top of title) -->
<div class="abstract-image">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/windows.png" alt="Abstract 3D Shape">
</div>

<?php get_footer(); ?>
