<?php
/**
 * Données des projets techniques
 * 
 * Ce fichier contient la liste des projets sous forme de tableau PHP.
 * Pour ajouter un projet, il suffit d'ajouter un élément au tableau.
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Retourne la liste des projets
 * 
 * @return array Tableau associatif des projets
 */
function portfolio_get_projets() {
    return array(
        array(
            'emoji' => '🖥️',
            'titre' => 'Infrastructure Web Full-Stack',
            'description' => 'Déploiement d\'un site WordPress sécurisé sur serveur Debian, avec architecture Docker (Nginx + MariaDB + PHP-FPM), pare-feu UFW, et authentification SSH par clés Ed25519.',
            'badges' => array('Docker', 'Nginx', 'Linux', 'PHP', 'MariaDB'),
            'competences' => 'SysAdmin, DevOps, Sécurité réseau'
        ),
        array(
            'emoji' => '🎨',
            'titre' => 'Développement Frontend',
            'description' => 'Création d\'un thème enfant WordPress avec variables CSS personnalisées, animations au survol, et design responsive adapté aux mobiles.',
            'badges' => array('CSS3', 'HTML5', 'Responsive Design', 'WordPress'),
            'competences' => 'Frontend, UX/UI, Accessibilité'
        ),
        array(
            'emoji' => '🔐',
            'titre' => 'Sécurité & Hardening',
            'description' => 'Mise en place de Fail2Ban pour le bannissement automatique d\'IP malveillantes, configuration d\'un reverse proxy Nginx avec en-têtes de sécurité HTTP, et gestion des secrets via variables d\'environnement (.env).',
            'badges' => array('Fail2Ban', 'UFW', 'SSL/TLS', 'OWASP'),
            'competences' => 'CyberSécurité, Best Practices'
        ),
        array(
            'emoji' => '📝',
            'titre' => 'Documentation Technique',
            'description' => 'Rédaction d\'un journal de bord détaillé (JOURNAL.md) documentant chaque étape du projet, les problèmes rencontrés, et les solutions apportées. Publication sous forme d\'articles de blog sur le site.',
            'badges' => array('Markdown', 'Git', 'Communication écrite'),
            'competences' => 'Veille technique, Rigueur méthodologique'
        ),
	array(
            'emoji' => '🚀',
            'titre' => 'Plugin WordPress Maison',
            'description' => 'Développement d\'un plugin PHP personnalisé avec shortcode [mes_projets], séparation données/présentation, et sécurisation via esc_html(). Code versionné sur Git.',
            'badges' => array('PHP', 'WordPress API', 'Shortcodes', 'POO'),
            'competences' => 'Développement Backend, Architecture logicielle'
        ),
    );
}
