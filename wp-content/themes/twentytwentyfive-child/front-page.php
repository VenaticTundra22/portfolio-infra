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

<main class="site-content">

    <section class="hero">
        <h1>Mathéo</h1>
        <p>Élève en Terminale · Passionné d'informatique</p>
    </section>

    <div class="projets-container">
        <?php echo do_shortcode('[mes_projets]'); ?>
    </div>

</main>

<?php get_footer(); ?>
