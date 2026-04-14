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
    <!-- Bottom Section - on top of everything -->
    <div class="bottom-section">
        <div class="bottom-left">
            <div class="date"></div>
            <div class="creative-direction">© 2026 Vena</div>
        </div>
        <div class="social-links">
            <a href="https://github.com/VenaticTundra22" target="_blank">GITHUB</a>
        </div>
    </div>
</footer>

</div> <!-- Fermeture du container -->

<script>
    // Update date dynamically
    const dateElement = document.querySelector('.date');

    function updateDate() {
        const now = new Date();
        const day = now.getDate();
        const month = now.toLocaleString('en-US', { month: 'long' });
        const year = now.getFullYear();
        dateElement.textContent = `${day} ${month} ${year}`;
    }

    // Update date on load and every minute
    updateDate();
    setInterval(updateDate, 60000);
</script>

<?php wp_footer(); ?>
</body>
</html>
