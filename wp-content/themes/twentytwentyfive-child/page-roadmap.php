<?php
/**
 * Template Name: Roadmap Page
 * Description: Page affichant la roadmap du projet
 * 
 * @package TwentyTwentyFive_Child
 */

// Sécurité : empêche l'accès direct
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<?php get_header(); 
?>

<div class="roadmap-page-wrapper">
    <div class="roadmap-header">
        <h1 class="roadmap-page-title">Roadmap</h1>
        <p class="roadmap-subtitle">Découvrez les prochaines étapes et l'évolution du projet.</p>
    </div>

    <?php
    $args = array(
        'post_type'      => 'roadmap_phase',
        'posts_per_page' => -1,
        'orderby'        => 'menu_order',
        'order'          => 'ASC',
    );

    $roadmap_query = new WP_Query( $args );

    // Organiser les phases par statut
    $columns = array(
        'Vision'   => array(),
        'Planifié' => array(),
        'En cours' => array(),
        'Terminé'  => array()
    );

    if ( $roadmap_query->have_posts() ) {
        while ( $roadmap_query->have_posts() ) {
            $roadmap_query->the_post();
            $status = get_post_meta( get_the_ID(), '_roadmap_status', true );
            if ( isset( $columns[$status] ) ) {
                $columns[$status][] = $post;
            } else {
                $columns['Vision'][] = $post;
            }
        }
    }
    ?>

    <div class="roadmap-board">
        <?php foreach ( $columns as $col_name => $col_posts ) : ?>
            <div class="roadmap-column">
                <h3 class="roadmap-column-title"><?php echo esc_html( $col_name ); ?> <span class="count"><?php echo count( $col_posts ); ?></span></h3>
                <div class="roadmap-cards">
                    <?php if ( ! empty( $col_posts ) ) : ?>
                        <?php 
                        global $post;
                        foreach ( $col_posts as $post ) : 
                            setup_postdata( $post );
                            $progress    = get_post_meta( get_the_ID(), '_roadmap_progress', true );
                            $description = get_post_meta( get_the_ID(), '_roadmap_description', true );

                            $phase_class = 'phase-custom';
                            if ( $col_name === 'En cours' ) $phase_class = 'phase-1';
                            if ( $col_name === 'Planifié' ) $phase_class = 'phase-2';
                            if ( $col_name === 'Vision' )   $phase_class = 'phase-3';
                            if ( $col_name === 'Terminé' )  $phase_class = 'phase-4';
                        ?>
                            <div class="glass-card roadmap-phase <?php echo esc_attr( $phase_class ); ?>">
                                <div class="glass-card-inner">
                                    <div class="phase-header">
                                        <h4 class="card-title"><?php the_title(); ?></h4>
                                    </div>
                                    
                                    <div class="phase-description card-excerpt">
                                        <?php if ( ! empty( $description ) ) : ?>
                                            <p><strong><?php echo esc_html( $description ); ?></strong></p>
                                        <?php endif; ?>
                                        <?php the_content(); ?>
                                    </div>

                                    <?php if ( is_numeric( $progress ) ) : ?>
                                    <div class="progress-bar-container">
                                        <div class="progress-bar-fill" style="width: <?php echo esc_attr( $progress ); ?>%"></div>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; wp_reset_postdata(); ?>
                    <?php else : ?>
                        <p class="empty-column">Aucune étape pour le moment.</p>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php get_footer(); ?>
