<?php 
/**
 * Theme header
 *
 */
//LOGO
$logo_img = '';
if( $custom_logo_id = get_theme_mod('custom_logo') ){
	$logo_img = wp_get_attachment_image( $custom_logo_id, 'full', false, array(
		'class'    => 'custom-logo',
		'itemprop' => 'logo',
	) );
}
//MENU PARAMS
$args = array(
	'theme_location' => 'first_menu',
    'container' => 'nav',
    'container_class' => 'nav',
    'menu_class' => 'nav-list',
    'fallback_cb' => '',
    'walker'=> new My_Nav_Walker()
 
);
$mobileArgs = array(
	'theme_location' => 'second_menu',
    'container' => 'nav',
    'container_class' => 'nav nav--mbl',
    'menu_class' => 'nav-list nav-list--mbl',
    'fallback_cb' => '',
    'walker'=> new My_Nav_Mobile_Walker()
 
);
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<!-- HEADER -->
	<header class="header">
		<!-- header top -->
		<div class="header__top">
			<div class="center-wrap">
				<!-- logo group -->
				<a class="logo-grp" href="<?php echo ( is_front_page() || is_home() ) ? '#' : home_url(); ?>" >
					<?php echo $logo_img; ?>
					<div class="logo-grp__txt">
						<p class="logo-grp__txt-nm"><span><?php echo __('Psychology', 'redstone'); ?></span> <?php echo __('Care', 'redstone'); ?></p>
						<p class="logo-grp__txt-slgn"><?php echo __('We Care you & your family', 'redstone'); ?></p>
					</div>
				</a>

				<!-- call group -->
				<div class="call-grp call-grp--dtp">
					<div class="call-phn">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/phone-i.png" alt="phone" />
						<?php if( is_plugin_active('advanced-custom-fields-pro/acf.php') ) : ?>
						    <?php $phone = get_field('phone', 'options'); if( $phone ) : ?>
                            <div class="call-phn-txt">
                                <p class="call-phn__now"><?php echo __('Call Us now', 'redstone'); ?></p>
                                <a href="tel:<?php echo $phone; ?>" class="call-phn__num"><?php echo $phone; ?></a>
                            </div>
                            <?php endif; ?>
						<?php endif; ?>
					</div>
					<div class="btn call-grp--btn"><span><?php echo __('Book Appointment', 'redstone'); ?></span></div>
				</div>
                <?php if( wp_is_mobile() ) : ?>
				<!-- btn-mobile -->
				<div class="nav__bgr"><span></span></div>
                <?php if( has_nav_menu( 'second_menu' ) ) : ?>
                    <!-- menu-mobile -->
                    <div class="menu-mbl">
                        <?php wp_nav_menu( $mobileArgs ); ?>
                        <!-- call-grp--mbl-->

                        <div class="call-grp call-grp--mbl">
                            <div class="call-phn call-phn--mbl">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/phone-mbl-i.png" alt="phone" />
                                <?php if( is_plugin_active('advanced-custom-fields-pro/acf.php') ) : ?>
						            <?php $phone = get_field('phone', 'options'); if( $phone ) : ?>
                                    <div class="call-phn-txt call-phn-txt--mbl">
                                        <p class="call-phn__now call-phn-txt--mbl"><?php echo __('Call Us now', 'redstone'); ?></p>
                                        <a href="tel:<?php echo $phone; ?>" class="call-phn__num call-phn-txt--mbl"><?php echo $phone; ?></a>
                                    </div>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                            <div class="btn call-grp--btn"><span><?php echo __('Book Appointment', 'redstone'); ?></span></div>
                        </div>
                    </div>
			    <?php endif; ?>
		      <?php endif; ?>
			</div>
		</div>
		
		<!-- header bottom -->
		<?php if( has_nav_menu( 'first_menu' ) ) : ?>
		<div class="header__bottom">
			<div class="center-wrap">
				<?php wp_nav_menu( $args ); ?>
			</div>
		</div>
		<?php endif; ?>
	</header>
