<?php
/**
 * The text-image-section block part for inner content constructor field
 *
 */
?>
<?php if( get_row_layout() == 'subheader' ): ?>
    <div class="row">
        <div class="col-12 d-flex flex-column align-items-center header">
            <?php the_sub_field('header', $post->ID ); ?>
        </div>
    </div>
<?php elseif( get_row_layout() == 'text' || get_row_layout() == 'text_text' ): ?>
        <div class="col-12 m-flexible-text d-flex flex-column align-items-center">
            <?php the_sub_field('text', $post->ID ); ?>
        </div>
<?php elseif( get_row_layout() == 'list' ): if( have_rows('list') ) : ?>
                    <div class="row">
                            <?php $counter = 1; ?>
                            <?php while ( have_rows('list') ) : the_row(); ?>
                                <?php $img = get_sub_field('icon', $post->ID);
                                      $size = 'icon';
                                      $thumb = $img['sizes'][ $size ];
                                      $width = $img['sizes'][ $size . '-width' ];
                                      $height = $img['sizes'][ $size . '-height' ];
                                ?>
                                <?php $width = get_sub_field('width'); ?>
                            <div class="m-list-block col-12 col-md-<?php if( $width == '50' ) : ?>6<?php else : ?>12<?php endif; ?> d-flex align-items-start justify-content-start">
                                    <?php if( !empty( $img ) ) : ?>
                                        <div class="icon-wrapper">
                                            <img src="<?php echo $img['url']; ?>" title="<?php echo $img['title']; ?>" alt="<?php echo $img['alt']; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" class="img-responsive">
                                        </div>
                                    <?php else: ?>
                                        <div class="icon-wrapper"><?php echo $counter; ?></div>
                                    <?php endif; ?> 
                                    <div class="flex-column e-list-wrapper">
                                        <div class="list-header"><?php the_sub_field( 'header', $post->ID ); ?></div>
                                        <div class="list-body"><?php the_sub_field( 'content', $post->ID ); ?></div>
                                    </div>
                            </div>
                        <?php $counter++; endwhile; ?>
                    </div>
    <?php endif; ?>
<?php elseif( get_row_layout() == 'adv_list' ): if( have_rows('list') ) : ?>
                        <?php $counter = 1; ?>
                                    <?php while ( have_rows('list') ) : the_row(); ?>
                                        <?php $img = get_sub_field('icon', $post->ID);
                                              $size = 'icon';
                                              $thumb = $img['sizes'][ $size ];
                                              $width = $img['sizes'][ $size . '-width' ];
                                              $height = $img['sizes'][ $size . '-height' ];
                                        ?>
                                        <?php $widthRow = get_sub_field('width'); ?>
                                        <?php if( !empty( $img ) ) : ?>
                                            <div class="m-advantage-block block-icon col-12 col-md-<?php if( $widthRow == '50' ) : ?>6<?php else : ?>12<?php endif; ?> d-flex align-items-start justify-content-start">
                                                    <div class="icon-wrapper">
                                                        <img src="<?php echo $img['url']; ?>" title="<?php echo $img['title']; ?>" alt="<?php echo $img['alt']; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" class="img-responsive">
                                                    </div>
                                                    <div class="flex-column e-text-adv-wrapper with-icon">
                                                        <div class="adv-header"><?php the_sub_field( 'header', $post->ID ); ?></div>
                                                        <div class="adv-body"><?php the_sub_field( 'content', $post->ID ); ?></div>
                                                    </div>
                                            </div>
                                        <?php else : ?>
                                            <div class="m-advantage-block block-number col-12 col-md-<?php if( $widthRow == '50' ) : ?>6<?php else : ?>12<?php endif; ?> d-flex align-items-start justify-content-start">
                                                    <div class="icon-wrapper <?php if( $counter % 2 == 0) : ?>in-left<?php endif; ?>">
                                                        <div class="big-counter e-counter"><?php echo $counter; ?></div>
                                                    </div>
                                                    <div class="flex-column e-text-adv-wrapper with-number <?php if( $counter % 2 == 0) : ?>in-left<?php endif; ?>">
                                                        <div class="adv-header"><?php the_sub_field( 'header', $post->ID ); ?></div>
                                                        <div class="adv-body"><?php the_sub_field( 'content', $post->ID ); ?></div>
                                                    </div>
                                            </div>
                                        <?php endif; ?>
                        <?php $counter++; endwhile; ?> 
<?php endif; endif; ?>