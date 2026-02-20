<?php
/**
 * Fonctions du thème enfant TwentyTwentyFive - Portfolio Mathéo
 * 
 * @package TwentyTwentyFive_Child
 * @version 1.0.0
 */

// ══════════════════════════════════════════════════════════════
// SÉCURITÉ : Empêcher l'accès direct au fichier
// ══════════════════════════════════════════════════════════════
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

// ══════════════════════════════════════════════════════════════
// CHARGEMENT DES FEUILLES DE STYLE
// ══════════════════════════════════════════════════════════════

/**
 * Charge les styles du thème parent ET du thème enfant
 * 
 * Ordre de chargement :
 * 1. Style du parent (twentytwentyfive/style.css)
 * 2. Style de l'enfant (twentytwentyfive-child/style.css)
 * 
 * Ainsi, le CSS de l'enfant surcharge celui du parent.
 */
function twentytwentyfive_child_enqueue_styles() {
    
    // 1. Style du thème parent
    wp_enqueue_style( 
        'twentytwentyfive-parent-style',           // Handle (identifiant unique)
        get_template_directory_uri() . '/style.css', // Chemin vers le parent
        array(),                                    // Pas de dépendances
        wp_get_theme()->parent()->get('Version')    // Version du parent (pour le cache)
    );
    
    // 2. Style du thème enfant
    wp_enqueue_style( 
        'twentytwentyfive-child-style',            // Handle
        get_stylesheet_uri(),                       // Chemin vers l'enfant (style.css)
        array( 'twentytwentyfive-parent-style' ),  // Dépend du style parent (ordre garanti)
        wp_get_theme()->get('Version')             // Version de l'enfant (pour le cache)
    );
}

// Hook WordPress : Exécute la fonction au moment du chargement des styles
add_action( 'wp_enqueue_scripts', 'twentytwentyfive_child_enqueue_styles' );


// ══════════════════════════════════════════════════════════════
// PERSONNALISATIONS FUTURES (à décommenter si besoin)
// ══════════════════════════════════════════════════════════════

/**
 * Exemple : Ajouter un script JavaScript personnalisé
 * 
 * function twentytwentyfive_child_enqueue_scripts() {
 *     wp_enqueue_script(
 *         'custom-script',
 *         get_stylesheet_directory_uri() . '/assets/js/custom.js',
 *         array('jquery'),
 *         '1.0.0',
 *         true
 *     );
 * }
 * add_action( 'wp_enqueue_scripts', 'twentytwentyfive_child_enqueue_scripts' );
 */

/**
 * Exemple : Modifier la longueur des extraits
 * 
 * function custom_excerpt_length( $length ) {
 *     return 30; // 30 mots au lieu de 55 par défaut
 * }
 * add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
 */
