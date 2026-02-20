<?php
/**
 * Footer personnalisé du thème enfant
 * 
 * @package TwentyTwentyFive_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<footer class="site-footer">
    <div class="footer-contenu">
        <p>&copy; <?php echo date('Y'); ?> Mathéo · Portfolio Technique</p>
        <p class="footer-mention">
            Infrastructure sécurisée · Hébergé sur serveur personnel
        </p>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
