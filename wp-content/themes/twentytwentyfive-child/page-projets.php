<?php
/**
 * Template Name: Page Projets
 * Description: Page affichant les projets personnels (Minecraft, TeamSpeak, Discord)
 * 
 * @package TwentyTwentyFive_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<?php get_header(); ?>

<div class="projets-page-wrapper">
    <div class="projets-header">
        <h1 class="projets-page-title">Mes Projets Personnels</h1>
        <p class="projets-subtitle">Découvrez mes différents projets d'hébergement et de développement sous Docker.</p>
    </div>

    <div class="projets-grid">
        <!-- Serveur Minecraft -->
        <div class="glass-card projet-card">
            <div class="projet-image">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/minecraft.png" alt="Serveur Minecraft" onerror="this.src='https://images.unsplash.com/photo-1607853202273-797f1c22a38e?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'">
            </div>
            <div class="glass-card-inner">
                <h2 class="card-title">Serveur Minecraft</h2>
                <p class="card-excerpt">Mise en place et administration d'un serveur Minecraft conteneurisé avec Docker, permettant une gestion simplifiée et isolée de l'environnement de jeu.</p>
                <div class="projet-badges">
                    <span class="badge">Docker</span>
                    <span class="badge">Linux</span>
                    <span class="badge">Minecraft</span>
                </div>
            </div>
        </div>

        <!-- Serveur TeamSpeak -->
        <div class="glass-card projet-card">
            <div class="projet-image">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/Teamspeak.jpg" alt="Serveur TeamSpeak" onerror="this.src='https://images.unsplash.com/photo-1596495578065-6e0763fa1178?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'">
            </div>
            <div class="glass-card-inner">
                <h2 class="card-title">Serveur TeamSpeak</h2>
                <p class="card-excerpt">Déploiement d'un serveur vocal TeamSpeak 3 via Docker. Gestion des permissions, des canaux et sécurisation de l'accès pour les utilisateurs.</p>
                <div class="projet-badges">
                    <span class="badge">Docker</span>
                    <span class="badge">TeamSpeak</span>
                    <span class="badge">VoIP</span>
                </div>
            </div>
        </div>

        <!-- Bot Discord -->
        <div class="glass-card projet-card">
            <div class="projet-image">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/bot-discord.png" alt="Bot Discord" onerror="this.src='https://images.unsplash.com/photo-1614680376573-3e4e120f14f5?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'">
            </div>
            <div class="glass-card-inner">
                <h2 class="card-title">Bot Discord</h2>
                <p class="card-excerpt">Développement d'un bot Discord sur mesure et hébergement de celui-ci dans un conteneur Docker pour assurer sa disponibilité 24/7.</p>
                <div class="projet-badges">
                    <span class="badge">Docker</span>
                    <span class="badge">Discord API</span>
                    <span class="badge">Développement</span>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>