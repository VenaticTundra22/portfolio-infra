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
<html <?php language_attributes(); ?> <?php 
if ( is_page_template('page-roadmap.php') || is_page(142) || is_front_page() ) {
    echo 'style="background-color: #000; overflow: hidden; height: 100%;"';
}
?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Portfolio de Mathéo (VenaticTundra22) - Étudiant en BUT Informatique. Découvrez mes projets, mon blog et ma roadmap.">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php
// Détermine si on a besoin d'un conteneur pleine largeur (Articles, Blog, Accueil)
$container_class = 'container';
if ( is_single() || is_page_template('page-blog.php') || is_front_page() || is_page_template('page-roadmap.php') || is_page(142) ) {
    $container_class .= ' full-width-layout';
}
?>
<div class="<?php echo esc_attr( $container_class ); ?>">
<header class="site-header">
    <!-- Navigation -->
    <nav>
        <div class="logo">WORDPRESS</div>
        
        <!-- Liquid Glass Navigation Bar -->
        <div class="nav-glass" id="navGlass">
            <!-- Decorative liquid bubbles -->
            <span class="bubble bubble-1"></span>
            <span class="bubble bubble-2"></span>
            <span class="bubble bubble-3"></span>
            
            <?php
            // Détection de la page active pour placer la bulle
            $home_active    = is_front_page() ? 'active' : '';
            $blog_active    = ( ! is_front_page() && ( is_home() || is_page('blog') || is_page_template('page-blog.php') || is_single() || is_category() || is_archive() ) ) ? 'active' : '';
            $roadmap_active = ( is_page_template('page-roadmap.php') || is_page('roadmap') ) ? 'active' : '';
            ?>
            
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="<?php echo $home_active; ?>" data-index="0">Accueil</a>
            <a href="<?php echo esc_url( home_url( '/blog' ) ); ?>" class="<?php echo $blog_active; ?>" data-index="2">Blog</a>
            <a href="<?php echo esc_url( home_url( '/roadmap' ) ); ?>" class="<?php echo $roadmap_active; ?>" data-index="3">Roadmap</a>
        </div>

        <a href="<?php echo esc_url( 'https://github.com/venatictundra22' ); ?>" class="get-in-touch">Github</a>
    </nav>
</header>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const navGlass = document.getElementById('navGlass');
        if (!navGlass) return;
        
        const navLinks = navGlass.querySelectorAll('a[data-index]');

        function updateHighlight(element) {
            const rect = element.getBoundingClientRect();
            const parentRect = navGlass.getBoundingClientRect();
            const left = rect.left - parentRect.left;
            const width = rect.width;
            
            navGlass.style.setProperty('--highlight-left', `${left}px`);
            navGlass.style.setProperty('--highlight-width', `${width}px`);
        }

        // Set initial highlight on active link
        const activeLink = navGlass.querySelector('a.active');
        if (activeLink) {
            updateHighlight(activeLink);
        }

        // Move highlight on hover
        navLinks.forEach(link => {
            link.addEventListener('mouseenter', () => {
                updateHighlight(link);
            });

            link.addEventListener('click', (e) => {
                navLinks.forEach(l => l.classList.remove('active'));
                link.classList.add('active');
                updateHighlight(link);
            });
        });

        // Return to active link when mouse leaves nav
        navGlass.addEventListener('mouseleave', () => {
            const activeLink = navGlass.querySelector('a.active');
            if (activeLink) {
                updateHighlight(activeLink);
            }
        });
    });
</script>
