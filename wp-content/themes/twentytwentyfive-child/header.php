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

<!-- Message de maintenance temporaire -->
<div id="maintenanceNotice" class="maintenance-overlay">
    <div class="maintenance-content">
        <h2>⚠️ Info Maintenance</h2>
        <p>Le site sera en travaux aujourd'hui de <strong>20h00 à 01h00</strong>. Certaines pages pourraient être inaccessibles.</p>
        <button id="closeMaintenance">Compris</button>
    </div>
</div>

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
            ?>
            
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="<?php echo $home_active; ?>">Accueil</a>
            <a href="<?php echo esc_url( home_url( '/blog' ) ); ?>" class="<?php echo $blog_active; ?>">Blog</a>
            <a href="<?php echo esc_url( home_url( '/roadmap' ) ); ?>" class="<?php echo $roadmap_active; ?>">Roadmap</a>
            <a href="<?php echo esc_url( home_url( '/dev' ) ); ?>" class="<?php echo $roadmap_active; ?>">Projets</a>

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

        // Gestion du popup de maintenance
        const notice = document.getElementById('maintenanceNotice');
        const closeBtn = document.getElementById('closeMaintenance');
        
        // Afficher seulement si l'utilisateur ne l'a pas encore fermé pendant sa session
        if (!sessionStorage.getItem('maintenanceSeen') && notice) {
            notice.style.display = 'flex';
        }

        if(closeBtn && notice) {
            closeBtn.addEventListener('click', () => {
                notice.style.opacity = '0';
                setTimeout(() => {
                    notice.style.display = 'none';
                    sessionStorage.setItem('maintenanceSeen', 'true');
                }, 300); // Laisse le temps à l'animation de fondu de s'exécuter
            });
        }
    });
</script>
