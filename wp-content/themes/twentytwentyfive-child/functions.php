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
// CONFIGURATION DU THÈME (SETUP)
// ══════════════════════════════════════════════════════════════

/**
 * Configuration initiale du thème enfant
 */
function twentytwentyfive_child_setup() {
    // Chargement des traductions pour le thème enfant (dossier /languages)
    load_child_theme_textdomain( 'twentytwentyfive-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'twentytwentyfive_child_setup' );

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
    
    // Le thème parent charge déjà son style sous le handle 'twentytwentyfive-style'.
    // On charge uniquement le style enfant en le déclarant dépendant du parent pour garantir l'ordre.
    wp_enqueue_style( 
        'twentytwentyfive-child-style',            // Handle
        get_stylesheet_uri(),                       // Chemin vers l'enfant (style.css)
        array( 'twentytwentyfive-style' ),         // Dépendance vers le handle officiel du parent
        wp_get_theme()->get('Version')             // Version de l'enfant (pour le cache)
    );

    // 3. Google Fonts (Optimisation : chargement non-bloquant via PHP au lieu de @import CSS)
    wp_enqueue_style( 
        'twentytwentyfive-child-fonts', 
        'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500&family=Playfair+Display:ital,wght@0,400;0,700;0,900;1,400;1,700;1,900&display=swap', 
        array(), 
        null 
    );
}

// Hook WordPress : Exécute la fonction au moment du chargement des styles
add_action( 'wp_enqueue_scripts', 'twentytwentyfive_child_enqueue_styles' );


// ══════════════════════════════════════════════════════════════
// INTÉGRATION ÉDITEUR (GUTENBERG)
// ══════════════════════════════════════════════════════════════

/**
 * Enregistre une catégorie de compositions pour le Portfolio
 * Utile pour organiser les patterns liés au plugin 'portfolio-projets'
 */
function twentytwentyfive_child_register_pattern_categories() {
    register_block_pattern_category(
        'portfolio',
        array( 'label' => __( 'Portfolio', 'twentytwentyfive-child' ) )
    );
}
add_action( 'init', 'twentytwentyfive_child_register_pattern_categories' );

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

// ══════════════════════════════════════════════════════════════
// CUSTOM POST TYPE: ROADMAP
// ══════════════════════════════════════════════════════════════

/**
 * Enregistre le Custom Post Type pour les phases de la roadmap.
 */
function tt25_child_register_roadmap_cpt() {
    $labels = array(
        'name'                  => _x( 'Phases de Roadmap', 'Post Type General Name', 'twentytwentyfive-child' ),
        'singular_name'         => _x( 'Phase de Roadmap', 'Post Type Singular Name', 'twentytwentyfive-child' ),
        'menu_name'             => __( 'Roadmap', 'twentytwentyfive-child' ),
        'name_admin_bar'        => __( 'Phase de Roadmap', 'twentytwentyfive-child' ),
        'all_items'             => __( 'Toutes les phases', 'twentytwentyfive-child' ),
        'add_new_item'          => __( 'Ajouter une nouvelle phase', 'twentytwentyfive-child' ),
        'add_new'               => __( 'Ajouter', 'twentytwentyfive-child' ),
        'new_item'              => __( 'Nouvelle Phase', 'twentytwentyfive-child' ),
        'edit_item'             => __( 'Modifier la Phase', 'twentytwentyfive-child' ),
        'search_items'          => __( 'Rechercher une Phase', 'twentytwentyfive-child' ),
        'not_found'             => __( 'Non trouvée', 'twentytwentyfive-child' ),
    );
    $args = array(
        'label'                 => __( 'Phase de Roadmap', 'twentytwentyfive-child' ),
        'description'           => __( 'Les différentes phases de la roadmap du projet.', 'twentytwentyfive-child' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'revisions', 'page-attributes' ), // 'title' pour la période, 'editor' pour les tâches, 'page-attributes' pour l'ordre
        'hierarchical'          => true,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 20,
        'menu_icon'             => 'dashicons-chart-line',
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => true,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
        'show_in_rest'          => true,
    );
    register_post_type( 'roadmap_phase', $args );
}
add_action( 'init', 'tt25_child_register_roadmap_cpt', 0 );

/**
 * Ajoute une boîte de métadonnées pour les détails de la phase.
 */
function tt25_child_add_roadmap_meta_boxes() {
    add_meta_box(
        'roadmap_phase_details',
        __( 'Détails de la Phase', 'twentytwentyfive-child' ),
        'tt25_child_roadmap_meta_box_callback',
        'roadmap_phase',
        'side', // Mettre la boîte sur le côté pour une meilleure ergonomie
        'high'
    );
}
add_action( 'add_meta_boxes', 'tt25_child_add_roadmap_meta_boxes' );

/**
 * Affiche les champs de la boîte de métadonnées.
 */
function tt25_child_roadmap_meta_box_callback( $post ) {
    wp_nonce_field( 'tt25_child_save_roadmap_meta_box_data', 'tt25_child_roadmap_meta_box_nonce' );

    $status      = get_post_meta( $post->ID, '_roadmap_status', true );
    $progress    = get_post_meta( $post->ID, '_roadmap_progress', true );
    $description = get_post_meta( $post->ID, '_roadmap_description', true );
    ?>
    <p><strong><label for="roadmap_description"><?php _e( 'Description courte', 'twentytwentyfive-child' ); ?></label></strong>
        <input type="text" id="roadmap_description" name="roadmap_description" value="<?php echo esc_attr( $description ); ?>" style="width:100%;" /></p>
    
    <p><strong><label for="roadmap_status"><?php _e( 'Statut', 'twentytwentyfive-child' ); ?></label></strong>
        <select name="roadmap_status" id="roadmap_status" style="width:100%;">
            <option value="En cours" <?php selected( $status, 'En cours' ); ?>><?php _e( 'En cours', 'twentytwentyfive-child' ); ?></option>
            <option value="Planifié" <?php selected( $status, 'Planifié' ); ?>><?php _e( 'Planifié', 'twentytwentyfive-child' ); ?></option>
            <option value="Vision" <?php selected( $status, 'Vision' ); ?>><?php _e( 'Vision', 'twentytwentyfive-child' ); ?></option>
            <option value="Terminé" <?php selected( $status, 'Terminé' ); ?>><?php _e( 'Terminé', 'twentytwentyfive-child' ); ?></option>
        </select></p>

    <p><strong><label for="roadmap_progress"><?php _e( 'Progression (%)', 'twentytwentyfive-child' ); ?></label></strong>
        <input type="number" id="roadmap_progress" name="roadmap_progress" value="<?php echo esc_attr( $progress ); ?>" min="0" max="100" style="width:100%;" /></p>
    
    <hr><p><em><?php _e( 'Utilisez l\'éditeur principal pour la liste des tâches et le champ "Ordre" (dans Attributs de la page) pour les trier.', 'twentytwentyfive-child' ); ?></em></p>
    <?php
}

/**
 * Sauvegarde les données de la boîte de métadonnées.
 */
function tt25_child_save_roadmap_meta_box_data( $post_id ) {
    if ( ! isset( $_POST['tt25_child_roadmap_meta_box_nonce'] ) || ! wp_verify_nonce( $_POST['tt25_child_roadmap_meta_box_nonce'], 'tt25_child_save_roadmap_meta_box_data' ) ) {
        return;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    // Sauvegarde de la description
    if ( isset( $_POST['roadmap_description'] ) ) {
        update_post_meta( $post_id, '_roadmap_description', sanitize_text_field( $_POST['roadmap_description'] ) );
    }

    // Sauvegarde du statut (Validation par liste blanche)
    if ( isset( $_POST['roadmap_status'] ) ) {
        $valid_statuses = array( 'En cours', 'Planifié', 'Vision', 'Terminé' );
        $status = sanitize_text_field( $_POST['roadmap_status'] );
        if ( in_array( $status, $valid_statuses, true ) ) {
            update_post_meta( $post_id, '_roadmap_status', $status );
        }
    }

    // Sauvegarde de la progression (Validation entier positif)
    if ( isset( $_POST['roadmap_progress'] ) ) {
        update_post_meta( $post_id, '_roadmap_progress', absint( $_POST['roadmap_progress'] ) );
    }
}
add_action( 'save_post', 'tt25_child_save_roadmap_meta_box_data' );

// ══════════════════════════════════════════════════════════════
// SÉCURITÉ & NETTOYAGE
// ══════════════════════════════════════════════════════════════

/**
 * 1. Désactive XML-RPC
 * Empêche les attaques par force brute et DDoS via ce protocole obsolète.
 */
add_filter( 'xmlrpc_enabled', '__return_false' );
add_action( 'init', function() {
    if ( defined( 'XMLRPC_REQUEST' ) && XMLRPC_REQUEST ) {
        http_response_code( 403 );
        exit( 'XML-RPC Forbidden' );
    }
});

/**
 * 2. Désactive l'énumération des utilisateurs via l'API REST
 * Correction : Utilisation des vrais chevrons < > au lieu des entités HTML.
 */
add_filter( 'rest_endpoints', function( $endpoints ){
    if ( isset( $endpoints['/wp/v2/users'] ) ) {
        unset( $endpoints['/wp/v2/users'] );
    }
    if ( isset( $endpoints['/wp/v2/users/(?P<id>[\d]+)'] ) ) {
        unset( $endpoints['/wp/v2/users/(?P<id>[\d]+)'] );
    }
    return $endpoints;
});

/**
 * 3. Bloque l'énumération des auteurs via l'URL (?author=1)
 * Redirige vers l'accueil si un bot tente de scanner les ID utilisateurs.
 */
function tt25_child_block_author_scans() {
    if ( is_admin() ) return;
    
    // Si le paramètre author est présent ou si c'est une page auteur
    if ( isset( $_GET['author'] ) || ( is_author() && ! is_admin() ) ) {
        wp_redirect( home_url(), 301 );
        exit;
    }
}
add_action( 'template_redirect', 'tt25_child_block_author_scans', 1 );

/**
 * 4. Masque la version de WordPress dans le code source
 * Rend les scans via curl moins informatifs pour les attaquants.
 */
remove_action('wp_head', 'wp_generator');