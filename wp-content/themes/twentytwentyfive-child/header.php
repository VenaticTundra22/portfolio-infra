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
    <meta name="description" content="Portfolio de Vena (VenaticTundra22) - Étudiant au lycée. Découvrez mes projets, mon blog et ma roadmap.">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php
// Détermine si on a besoin d'un conteneur pleine largeur (Articles, Blog, Accueil)
$container_class = 'container';
if ( is_single() || is_page_template('page-blog.php') || is_front_page() || is_page_template('page-roadmap.php') || is_page('parcours') ) {
    $container_class .= ' full-width-layout';
}
?>
<div class="<?php echo esc_attr( $container_class ); ?>">
<header class="site-header">
    <!-- Navigation -->
    <nav>
        <div class="brand-container">
            <div class="header-date"></div>
            <div class="logo">PORTFOLIO</div>
        </div>
        
        <!-- Navigation Links -->
        <div class="nav-links">
            <?php
            // Détection de la page active pour placer la bulle
            $home_active    = is_front_page() ? 'active' : '';
            $blog_active    = ( ! is_front_page() && ( is_home() || is_page('blog') || is_page_template('page-blog.php') || is_single() || is_category() || is_archive() ) ) ? 'active' : '';
            $roadmap_active = ( is_page_template('page-roadmap.php') || is_page('roadmap') ) ? 'active' : '';
            $projets_active = ( is_page_template('page-projets.php') || is_page('projets') ) ? 'active' : '';
            ?>
            
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="<?php echo $home_active; ?>">Accueil</a>
            <a href="<?php echo esc_url( home_url( '/blog' ) ); ?>" class="<?php echo $blog_active; ?>">Blog</a>
            <a href="<?php echo esc_url( home_url( '/roadmap' ) ); ?>" class="<?php echo $roadmap_active; ?>">Roadmap</a>
            <a href="<?php echo esc_url( home_url( '/projets' ) ); ?>" class="<?php echo $projets_active; ?>">Projets</a>

        </div>
    </nav>
</header>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialisation et mise à jour de la date dans le header
        const headerDate = document.querySelector('.header-date');
        function updateHeaderDate() {
            if (!headerDate) return;
            const now = new Date();
            const day = now.getDate();
            const month = now.toLocaleString('en-US', { month: 'long' });
            const year = now.getFullYear();
            headerDate.textContent = `${day} ${month} ${year}`;
        }
        updateHeaderDate();
        setInterval(updateHeaderDate, 60000);
    });
</script>
