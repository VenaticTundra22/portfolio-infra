<?php
/**
 * Template Name: Page Parcours
 * Description: Page affichant le parcours (actuellement masqué pour Parcoursup)
 * 
 * @package TwentyTwentyFive_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<?php get_header(); ?>

<div class="parcours-page-wrapper">
    <div class="parcours-header">
        <h1 class="parcours-page-title">Mon Parcours</h1>
        <p class="parcours-subtitle">Découvrez mon évolution professionnelle.</p>
    </div>

    <!-- Frise chronologique -->
    <div class="parcours-timeline">
        <!-- Stage 3e -->
        <div class="timeline-step">
            <div class="timeline-marker"></div>
            <div class="glass-card timeline-card">
                <div class="glass-card-inner">
                    <h3 class="card-title">Stage de 3e</h3>
                    <p class="card-excerpt">Premier stage d'observation : Fait au service informatique d'une entreprise de vente en ligne de pièces automobiles (développement web frontend et backend).</p>
                </div>
            </div>
        </div>
        <!-- Brevet -->
        <div class="timeline-step">
            <div class="timeline-marker"></div>
            <div class="glass-card timeline-card">
                <div class="glass-card-inner">
                    <h3 class="card-title">Brevet</h3>
                    <p class="card-excerpt">Obtention du diplôme</p>
                </div>
            </div>
        </div>
        <!-- Seconde -->
        <div class="timeline-step">
            <div class="timeline-marker"></div>
            <div class="glass-card timeline-card">
                <div class="glass-card-inner">
                    <h3 class="card-title">Seconde</h3>
                    <p class="card-excerpt">Option SI (Sciences de l'Ingénieur)</p>
                </div>
            </div>
        </div>
        <!-- Stage Seconde -->
        <div class="timeline-step">
            <div class="timeline-marker"></div>
            <div class="glass-card timeline-card">
                <div class="glass-card-inner">
                    <h3 class="card-title">Stage de Seconde</h3>
                    <p class="card-excerpt">Second stage d'observation : Fait au sein d'une entreprise de prestation de services (développement d'application mobile et web).</p>
                </div>
            </div>
        </div>
        <!-- Première -->
        <div class="timeline-step">
            <div class="timeline-marker"></div>
            <div class="glass-card timeline-card">
                <div class="glass-card-inner">
                    <h3 class="card-title">Première</h3>
                    <p class="card-excerpt">Spécialités NSI, Maths et Physique</p>
                </div>
            </div>
        </div>
        <!-- Terminale -->
        <div class="timeline-step">
            <div class="timeline-marker"></div>
            <div class="glass-card timeline-card">
                <div class="glass-card-inner">
                    <h3 class="card-title">Terminale</h3>
                    <p class="card-excerpt">Conservation des spécialités NSI et Maths</p>
                </div>
            </div>
        </div>
        <!-- Stage Initiative -->
        <div class="timeline-step">
            <div class="timeline-marker"></div>
            <div class="glass-card timeline-card">
                <div class="glass-card-inner">
                    <h3 class="card-title">Stage Volontaire</h3>
                    <p class="card-excerpt">Stage supplémentaire à mon initiative : Fait au service informatique d'une Mairie (administration système et réseaux).</p>
                </div>
            </div>
        </div>
        <!-- Étape 5 (Futur) -->
        <div class="timeline-step future">
            <div class="timeline-marker dashed"></div>
            <div class="glass-card timeline-card">
                <div class="glass-card-inner">
                    <h3 class="card-title">Le Bac</h3>
                    <p class="card-excerpt">Obtention du baccalauréat</p>
                </div>
            </div>
        </div>
        <!-- Étape 6 (Futur) -->
        <div class="timeline-step future">
            <div class="timeline-marker dashed"></div>
            <div class="glass-card timeline-card">
                <div class="glass-card-inner">
                    <h3 class="card-title">Supérieur</h3>
                    <p class="card-excerpt">Admission dans une école d'informatique</p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>