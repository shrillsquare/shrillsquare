<?php $wl_theme_options = weblizar_get_options(); ?>
<div class="rev-slider-full">
    <div class="rev-slider-banner-full  rev-slider-full">		
		<ul>			
            <li data-transition="fade" data-slotamount="7" data-masterspeed="300" >
                <img src="<?php echo GL_TEMPLATE_DIR_URI; ?>/images/slide1-bg.jpg"  alt="rev-full1" data-fullwidthcentering="on">
				<?php if($wl_theme_options['slide_image']!='') { ?>
				<div class="tp-caption lfb stb stl"  data-x="0" data-y="120" data-speed="100" data-start="200" data-easing="easeOutExpo" data-end="6000" data-endspeed="500">
					
				 <img src="<?php echo $wl_theme_options['slide_image']; ?>" class="img-responsive img-slide" alt="First slide">
				</div>
                <?php } ?>
				<div class="tp-caption very_large_text2 sft str"
                     data-x="672"
                     data-y="100"
                     data-speed="300"
                     data-start="1800"
                     data-easing="easeOutCubic" data-end="5800" data-endspeed="500">
				</div>
				<?php if($wl_theme_options['slide_title']!='') { ?>
                <div class="tp-caption main_color_text sfl str "
                     data-x="672"
                     data-y="145"
                     data-speed="200"
                     data-start="2000"
                     data-easing="easeOutCubic" data-end="5600" data-endspeed="500">
					 <h1 class="weblizar_slide_title"><?php echo $wl_theme_options['slide_title']; ?></h1>
				</div>
				<?php }
				 if($wl_theme_options['slide_desc']!='') { ?>
                <div class="tp-caption default_text sfl str "
                     data-x="672"
                     data-y="200"
                     data-speed="200"
                     data-start="2200"
                     data-easing="" data-end="5400" data-endspeed="500"  > 
					<span class="slide_desc"><?php echo get_theme_mod('slide_desc' , $wl_theme_options['slide_desc']); ?></span>
				</div>
				<?php } if($wl_theme_options['slide_btn_text']!='') { ?>				
				<div class="tp-caption sfl str weblizar_slide_btn_text"
                     data-x="672"
                     data-y="290"
                     data-speed="200"
                     data-start="2400"
                     data-easing="" data-end="5000" data-endspeed="500" >					
					<a href="<?php if($wl_theme_options['slide_btn_link']!='') { echo $wl_theme_options['slide_btn_link']; } ?>" class="btn btn-primary btn-lg">
						<?php echo $wl_theme_options['slide_btn_text']; ?></a>
					<?php } ?>
				</div>				
			</li>
			<li data-transition="fade" data-slotamount="7" data-masterspeed="300" >
                <img src="<?php echo GL_TEMPLATE_DIR_URI; ?>/images/slide1-bg.jpg"  alt="rev-full1" data-fullwidthcentering="on">
				<?php if($wl_theme_options['slide_image_1']!='') { ?>
				<div class="tp-caption lfb stb stl"  data-x="0" data-y="120" data-speed="1500" data-start="200" data-easing="easeOutExpo" data-end="6000" data-endspeed="500">
					
				 <img src="<?php echo $wl_theme_options['slide_image_1']; ?>" class="img-responsive img-slide" alt="First slide">
				</div>
                <?php } ?>
				<div class="tp-caption very_large_text2 sft str"
                     data-x="672"
                     data-y="100"
                     data-speed="300"
                     data-start="1800"
                     data-easing="easeOutCubic" data-end="5800" data-endspeed="500">					
				</div>
				<?php if($wl_theme_options['slide_title_1']!='') { ?>
                <div class="tp-caption main_color_text sfl str "
                     data-x="672"
                     data-y="145"
                     data-speed="200"
                     data-start="2000"
                     data-easing="easeOutCubic" data-end="5600" data-endspeed="500">
					 <h1 class="weblizar_slide_title_1"><?php echo $wl_theme_options['slide_title_1']; ?></h1>
				</div>
				<?php }
				 if($wl_theme_options['slide_desc_1']!='') { ?>
                <div class="tp-caption default_text sfl str "
                     data-x="672"
                     data-y="200"
                     data-speed="200"
                     data-start="2200"
                     data-easing="" data-end="5400" data-endspeed="500"  > 
					<span class="slide_desc_1"><?php echo get_theme_mod('slide_desc_1' , $wl_theme_options['slide_desc_1']); ?></span>
				</div>
				<?php } if($wl_theme_options['slide_btn_text_1']!='') { ?>				
				<div class="tp-caption sfl str weblizar_slide_btn_text_1 "
                     data-x="672"
                     data-y="290"
                     data-speed="200"
                     data-start="2400"
                     data-easing="" data-end="5000" data-endspeed="500" >					
					<a href="<?php if($wl_theme_options['slide_btn_link_1']!='') { echo $wl_theme_options['slide_btn_link_1']; } ?>" class="btn btn-primary btn-lg">
						<?php echo $wl_theme_options['slide_btn_text_1']; ?></a>
					<?php } ?>
				</div>				
			</li>
			<li data-transition="fade" data-slotamount="7" data-masterspeed="300" >
                <img src="<?php echo GL_TEMPLATE_DIR_URI; ?>/images/slide1-bg.jpg"  alt="rev-full1" data-fullwidthcentering="on">
				<?php if($wl_theme_options['slide_image_2']!='') { ?>
				<div class="tp-caption lfb stb stl"  data-x="0" data-y="120" data-speed="1500" data-start="200" data-easing="easeOutExpo" data-end="6000" data-endspeed="500">
					
				 <img src="<?php echo $wl_theme_options['slide_image_2']; ?>" class="img-responsive img-slide" alt="First slide">
				</div>
                <?php } ?>
				<div class="tp-caption very_large_text2 sft str"
                     data-x="672"
                     data-y="100"
                     data-speed="300"
                     data-start="1800"
                     data-easing="easeOutCubic" data-end="5800" data-endspeed="500">
					<?php //echo the_title(); ?>
				</div>
				<?php if($wl_theme_options['slide_title_2']!='') { ?>
                <div class="tp-caption main_color_text sfl str "
                     data-x="672"
                     data-y="145"
                     data-speed="200"
                     data-start="2000"
                     data-easing="easeOutCubic" data-end="5600" data-endspeed="500">
					 <h1 class="weblizar_slide_title_2"><?php echo $wl_theme_options['slide_title_2']; ?></h1>
				</div>
				<?php }
				 if($wl_theme_options['slide_desc_2']!='') { ?>
                <div class="tp-caption default_text sfl str "
                     data-x="672"
                     data-y="200"
                     data-speed="200"
                     data-start="2200"
                     data-easing="" data-end="5400" data-endspeed="500"  > 
					<span class="slide_desc_2"><?php echo get_theme_mod('slide_desc_2' , $wl_theme_options['slide_desc_2']); ?></span>
				</div>
				<?php } if($wl_theme_options['slide_btn_text_2']!='') { ?>				
				<div class="tp-caption sfl str weblizar_slide_btn_text_2"
                     data-x="672"
                     data-y="290"
                     data-speed="200"
                     data-start="2400"
                     data-easing="" data-end="5000" data-endspeed="500" >					
					<a href="<?php if($wl_theme_options['slide_btn_link_2']!='') { echo $wl_theme_options['slide_btn_link_2']; } ?>" class="btn btn-primary btn-lg">
						<?php echo $wl_theme_options['slide_btn_text_2']; ?></a>
					<?php } ?>
				</div>				
			</li>
        </ul>		
        <div class="tp-bannertimer tp-bottom"></div>
    </div>
</div>