<?php
/**
 * Slider section template file
 *
 */
?>
<?php $slider = get_sub_field('slider'); 
      $tag    = get_sub_field( 'tag' ); 
      if (empty($tag)) { $tag = 'div';	};
      $title  = '<'.$tag.' class="h1">'. get_sub_field( 'block_title' ) . '</'.$tag.'>' ;
?>
<?php if( get_row_layout() == 'slider' ): ?>
<section class="mn-scrn">
			<!-- Slider-->
			<?php if( $slider ) : ?>
			<div class="swiper-container">
				<!-- Slider wrapper -->
				<div class="swiper-wrapper">
					<?php foreach( $slider as $slide ) : ?>
					<div class="swiper-slide">
						<?php echo wp_get_attachment_image( $slide['slide']['id'], 'full'); ?>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
			<?php endif; ?>
			<!-- mn-scrn-cnt -->
			<div class="mn-scrn-cnt">
				<?php echo $title; ?>
				<div class="mn-scrn__btn-grp">
					<div class="btn btn--mn-scrn btn--view" data-link="<?php the_sub_field('first_b_link'); ?>">
						<span><?php the_sub_field('first_b_text'); ?></span>
					</div>
					<div class="btn btn--mn-scrn btn--get" data-link="<?php the_sub_field('second_b_link'); ?>">
						<span><?php the_sub_field('second_b_text'); ?></span>
					</div>
				</div>
			</div>
</section>
<?php endif; ?>