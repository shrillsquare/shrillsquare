<?php $wl_theme_options = weblizar_get_options();
if ($wl_theme_options['service_home']=="on"){ ?>
<div class="section-content top-body section-services">    
    <div class="container">
        <div class="row">
        	<?php if($wl_theme_options['service_1_title'] || $wl_theme_options['service_1_icons']) { ?>
			<div class="col-md-3 col-sm-3">
				<div data-animdelay="0.2s" data-animspeed="1s" data-animrepeat="0" data-animtype="fadeIn" class="content-box animated  fadeIn animatedVisi" style="-webkit-animation: 1s 0.2s;">
					<?php if($wl_theme_options['service_1_title']) { ?>
					<i class="fa <?php if($wl_theme_options['service_1_icons']) { echo $wl_theme_options['service_1_icons']; } ?> weblizar_service_1_icons"></i>
					<h4 class="h4-body-title weblizar_service_1_title"><?php echo $wl_theme_options['service_1_title'];   ?></h4>
					<?php } ?>
					<?php if($wl_theme_options['service_1_text']) { ?>
					<div class="content-box-text service_1_text">
						<?php echo apply_filters('the_content', get_theme_mod('service_1_text', $wl_theme_options['service_1_text']), true); ?>
					</div>
					<?php } ?>
				</div>    
			</div>
			<?php } if($wl_theme_options['service_2_title'] || $wl_theme_options['service_2_icons']) { ?>
			<div class="col-md-3 col-sm-3">
				<div data-animdelay="0.2s" data-animspeed="1s" data-animrepeat="0" data-animtype="fadeIn" class="content-box animated  fadeIn animatedVisi" style="-webkit-animation: 1s 0.2s;">
					<?php if($wl_theme_options['service_2_title']) { ?>
					<i class="fa <?php if($wl_theme_options['service_2_icons']) { echo $wl_theme_options['service_2_icons']; } ?> weblizar_service_2_icons"></i>
					<h4 class="h4-body-title weblizar_service_2_title"><?php echo $wl_theme_options['service_2_title'];   ?></h4>
					<?php } ?>
					<?php if($wl_theme_options['service_2_text']) { ?>
					<div class="content-box-text service_2_text">
						<?php echo apply_filters('the_content', get_theme_mod('service_2_text' , $wl_theme_options['service_2_text']), true); ?>
					</div>
					<?php } ?>
				</div>    
			</div>
			<?php } if($wl_theme_options['service_3_title'] || $wl_theme_options['service_3_icons']) { ?>
			<div class="col-md-3 col-sm-3">
				<div data-animdelay="0.2s" data-animspeed="1s" data-animrepeat="0" data-animtype="fadeIn" class="content-box animated  fadeIn animatedVisi" style="-webkit-animation: 1s 0.2s;">
					<?php if($wl_theme_options['service_3_title']) { ?>
					<i class="fa <?php if($wl_theme_options['service_3_icons']) { echo $wl_theme_options['service_3_icons']; } ?> weblizar_service_3_icons"></i>
					<h4 class="h4-body-title weblizar_service_3_title"><?php echo $wl_theme_options['service_3_title'];   ?></h4>
					<?php } ?>
					<?php if($wl_theme_options['service_3_text']) { ?>
					<div class="content-box-text service_3_text">
						<?php echo apply_filters('the_content', get_theme_mod('service_3_text' , $wl_theme_options['service_3_text']), true); ?>
					</div>
					<?php } ?>
				</div>    
			</div>
			<?php } if($wl_theme_options['service_4_title'] || $wl_theme_options['service_4_icons']) { ?>
			<div class="col-md-3 col-sm-3">
				<div data-animdelay="0.2s" data-animspeed="1s" data-animrepeat="0" data-animtype="fadeIn" class="content-box animated  fadeIn animatedVisi" style="-webkit-animation: 1s 0.2s;">
					<?php if($wl_theme_options['service_4_title']) { ?>
					<i class="fa <?php if($wl_theme_options['service_4_icons']) { echo $wl_theme_options['service_4_icons']; } ?> weblizar_service_4_icons"></i>
					<h4 class="h4-body-title weblizar_service_4_title"><?php echo $wl_theme_options['service_4_title'];   ?></h4>
					<?php } ?>
					<?php if($wl_theme_options['service_4_text']) { ?>
					<div class="content-box-text service_4_text">
						<?php echo apply_filters('the_content', get_theme_mod('service_4_text' , $wl_theme_options['service_4_text']), true); ?>
					</div>
					<?php } ?>
				</div>    
			</div>
			<?php } ?>
		</div>
	</div> 
</div>
<?php } ?>