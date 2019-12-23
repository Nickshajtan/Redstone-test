<?php
/**
 * The main page template file
 *
 */

get_header(); ?>
<main>
<?php if( is_plugin_active('advanced-custom-fields-pro/acf.php') ) : 
    
    if (get_field('flex_content', 'options')) :
        while (has_sub_field('flex_content', 'options')) :
            $row_layout_slug = get_row_layout();
            get_template_part('template-parts/part/section', $row_layout_slug);
        endwhile;
    else :
        get_template_part( 'template-parts/content/content', 'none' );
    endif;
    
?>
<?php else : ?>
    <section class="mn-scrn">
        <div class="swiper-container">
            <?php echo __('Включите плагин Advanced Custom Fields в админ-панели для корректной работы сайта', 'redstone'); ?>
        </div>
    </section>
<?php endif; ?>
</main>
<?php get_footer();  ?>