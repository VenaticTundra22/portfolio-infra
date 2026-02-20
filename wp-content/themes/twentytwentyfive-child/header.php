<?php
/**
 * Header personnalisé du thème enfant
 * 
 * Ce fichier remplace automatiquement le header du parent
 * dès qu'il existe dans le thème enfant.
 * 
 * @package TwentyTwentyFive_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
    <nav class="nav-principale">
        <div class="nav-logo-container">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="nav-logo-link">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/logo.png" alt="Logo Mathéo" class="nav-logo-img">
                <span class="nav-logo-text">Mathéo</span>
            </a>
        </div>

        <ul class="nav-liens">
            <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Accueil</a></li>
            <li><a href="<?php echo esc_url( home_url( '/projets' ) ); ?>">Projets</a></li>
            <li><a href="<?php echo esc_url( home_url( '/blog' ) ); ?>">Blog</a></li>
            <li><a href="<?php echo esc_url( home_url( '/roadmap' ) ); ?>">Roadmap</a></li>
        </ul>
    </nav>
</header>
