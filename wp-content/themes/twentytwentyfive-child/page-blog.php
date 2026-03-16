<?php
/**
 * Template Name: Blog Page
 * Template : Page Blog
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<?php get_header(); ?>

<div class="blog-page-wrapper">
    <!-- Hero title for blog page -->
    <div class="hero-title">JOURNAL.md</div>

    <!-- Article slider container -->
    <div class="articles-slider-wrapper">
        <div class="articles-slider" id="articlesSlider">
            <?php
            $args = array(
                'post_type'      => 'post',
                'posts_per_page' => 10,
                'post_status'    => 'publish',
                'orderby'        => 'date',
                'order'          => 'DESC',
            );

            $blog_query = new WP_Query( $args );
            $index = 0;

            if ( $blog_query->have_posts() ) :
                while ( $blog_query->have_posts() ) : $blog_query->the_post();
            ?>
                <div class="glass-card <?php echo $index === 0 ? 'active' : ''; ?>" data-index="<?php echo $index; ?>">
                    <div class="glass-card-inner">
                        <div class="card-number"><?php echo str_pad($index + 1, 2, '0', STR_PAD_LEFT); ?></div>
                        <h2 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <div class="card-category"><?php the_category(' / '); ?></div>
                        <p class="card-excerpt"><?php echo wp_trim_words( get_the_excerpt(), 25 ); ?></p>
                        <div class="card-date"><?php echo get_the_date('d.m.Y'); ?></div>
                        <a href="<?php the_permalink(); ?>" class="card-read-more">LIRE →</a>
                    </div>
                    <!-- Glass reflections -->
                    <div class="glass-reflection"></div>
                    <div class="glass-reflection-2"></div>
                </div>
            <?php
                $index++;
                endwhile;
                wp_reset_postdata();
            else :
            ?>
                <div class="glass-card active">
                    <div class="glass-card-inner">
                        <h2 class="card-title">Aucun article</h2>
                        <p class="card-excerpt">Les articles seront bientôt disponibles ici !</p>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <!-- Slider Controls -->
        <div class="slider-controls">
            <button class="slider-btn slider-prev" id="sliderPrev">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M15 18l-6-6 6-6"/></svg>
            </button>
            <div class="slider-counter">
                <span id="currentSlide">01</span>
                <span class="slider-divider">/</span>
                <span id="totalSlides"><?php echo str_pad($index, 2, '0', STR_PAD_LEFT); ?></span>
            </div>
            <button class="slider-btn slider-next" id="sliderNext">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 18l6-6-6-6"/></svg>
            </button>
        </div>

        <!-- Dots indicator -->
        <div class="slider-dots" id="sliderDots">
            <?php for ($i = 0; $i < $index; $i++) : ?>
                <div class="slider-dot <?php echo $i === 0 ? 'active' : ''; ?>" data-index="<?php echo $i; ?>"></div>
            <?php endfor; ?>
        </div>
    </div>

    <!-- Abstract image -->
    <div class="abstract-image">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/windows.png" alt="">
    </div>
</div>

<!-- Slider Script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const slider = document.getElementById('articlesSlider');
    const cards = slider.querySelectorAll('.glass-card');
    const prevBtn = document.getElementById('sliderPrev');
    const nextBtn = document.getElementById('sliderNext');
    const currentSlideEl = document.getElementById('currentSlide');
    const dots = document.querySelectorAll('.slider-dot');
    const totalCards = cards.length;
    let currentIndex = 0;
    let startX = 0;
    let isDragging = false;

    function goToSlide(index) {
        if (index < 0) index = totalCards - 1;
        if (index >= totalCards) index = 0;
        
        currentIndex = index;
        
        // Calcul pour centrer la carte active
        const cardWidth = cards[0].offsetWidth; // Largeur dynamique (380px PC / 80vw Mobile)
        const gap = window.innerWidth <= 768 ? 16 : 24; // Espace dynamique selon CSS
        const containerWidth = window.innerWidth;
        const centerPosition = (containerWidth / 2) - (cardWidth / 2);
        const offset = centerPosition - (currentIndex * (cardWidth + gap));

        slider.style.transform = `translateX(${offset}px)`;
        
        cards.forEach((card, i) => {
            card.classList.toggle('active', i === currentIndex);
        });
        
        dots.forEach((dot, i) => {
            dot.classList.toggle('active', i === currentIndex);
        });
        
        currentSlideEl.textContent = String(currentIndex + 1).padStart(2, '0');
    }

    // Initialiser la position au chargement
    goToSlide(0);
    // Recalculer au redimensionnement de la fenêtre pour garder le centrage
    window.addEventListener('resize', () => goToSlide(currentIndex));

    prevBtn.addEventListener('click', () => goToSlide(currentIndex - 1));
    nextBtn.addEventListener('click', () => goToSlide(currentIndex + 1));
    
    dots.forEach(dot => {
        dot.addEventListener('click', () => {
            goToSlide(parseInt(dot.dataset.index));
        });
    });

    // Interaction au survol (Hover)
    cards.forEach((card, index) => {
        card.addEventListener('mouseenter', () => {
            if (currentIndex !== index) {
                goToSlide(index);
            }
        });
    });

    // Touch/swipe support
    slider.addEventListener('touchstart', (e) => {
        startX = e.touches[0].clientX;
        isDragging = true;
    });

    slider.addEventListener('touchend', (e) => {
        if (!isDragging) return;
        const endX = e.changedTouches[0].clientX;
        const diff = startX - endX;
        if (Math.abs(diff) > 50) {
            diff > 0 ? goToSlide(currentIndex + 1) : goToSlide(currentIndex - 1);
        }
        isDragging = false;
    });

    // Keyboard support
    document.addEventListener('keydown', (e) => {
        if (e.key === 'ArrowLeft') goToSlide(currentIndex - 1);
        if (e.key === 'ArrowRight') goToSlide(currentIndex + 1);
    });
});
</script>

<?php get_footer(); ?>
