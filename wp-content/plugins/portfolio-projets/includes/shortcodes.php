<?php
/**
 * Gestion des shortcodes du plugin
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Shortcode [mes_projets]
 * 
 * Affiche la liste des projets sous forme de cartes HTML
 * 
 * @return string HTML généré
 */
function portfolio_shortcode_projets() {
    // Récupérer les données
    $projets = portfolio_get_projets();
    
    // Commencer la capture de sortie
    ob_start();
    
    echo '<div class="projets-container">';
    
    // Boucle sur chaque projet
    foreach ($projets as $projet) {
        ?>
        <div class="carte-projet">
            <h3><?php echo esc_html($projet['emoji'] . ' ' . $projet['titre']); ?></h3>
            <p><?php echo esc_html($projet['description']); ?></p>
            <p>
                <?php foreach ($projet['badges'] as $badge): ?>
                    <span class="badge"><?php echo esc_html($badge); ?></span>
                <?php endforeach; ?>
            </p>
            <p>
                <strong>Compétences démontrées :</strong> 
                <?php echo esc_html($projet['competences']); ?>
            </p>
        </div>
        <?php
    }
    
    echo '</div>';
    
    // Retourner le contenu capturé
    return ob_get_clean();
}

// Enregistrer le shortcode dans WordPress
add_shortcode('mes_projets', 'portfolio_shortcode_projets');
