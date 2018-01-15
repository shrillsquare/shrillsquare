<?php
$featured_on = get_theme_option('slider_on');
$featured_category = get_theme_option('feat_cat');
$featured_number = get_theme_option('feat_cat_count');
$featured_post = get_theme_option('feat_post');
$jslink = get_template_directory_uri() . '/lib/scripts/jssor';
?>

<?php if($featured_on == 'Enable'): ?>
<?php if(!$featured_category && !$featured_post): ?>

<?php else: ?>

<?php if($featured_category): ?>

<div id="slider1_container" style="background-color:#000;margin:0 0 2em;position: relative; width: 1000px;height: 420px; overflow: hidden;">

        <!-- Loading Screen -->
        <div u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block;
                background-color: #000; top: 0px; left: 0px;width: 100%;height:100%;">
            </div>
            <div style="position: absolute; display: block; background: url(<?php echo $jslink; ?>/img/loading.gif) no-repeat center center;
                top: 0px; left: 0px;width: 100%;height:100%;">
            </div>
        </div>

        <!-- Slides Container -->
        <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 1000px; height: 480px;
            overflow: hidden;">

<?php
$query = new WP_Query( "cat=$featured_category&posts_per_page=$featured_number&orderby=date" );
while ( $query->have_posts() ) : $query->the_post(); ?>

<div>
<img u="image" src="<?php echo get_featured_post_image_src('','','large',false) ; ?>" />
<img u="thumb" src="<?php echo get_featured_post_image_src('','','thumbnail',false) ; ?>" />

<div u=caption t="*" class="captionOrange">
<h3><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php echo the_title(); ?></a></h3>
<p><?php echo get_custom_the_excerpt(30); ?></p>
</div>

</div>

<?php endwhile; wp_reset_query(); ?>

</div>
        <!--#region Thumbnail Navigator Skin Begin -->
        <!-- Help: http://www.jssor.com/development/slider-with-thumbnail-navigator-jquery.html -->

        <!-- thumbnail navigator container -->
        <div u="thumbnavigator" class="jssort07" style="width: 1000px; height: 100px; left: 0px; bottom: 0px;">
            <!-- Thumbnail Item Skin Begin -->
            <div u="slides" style="cursor: pointer;">
                <div u="prototype" class="p">
                    <div u="thumbnailtemplate" class="i"></div>
                    <div class="o"></div>
                </div>
            </div>
            <!-- Thumbnail Item Skin End -->
            <!--#region Arrow Navigator Skin Begin -->
            <!-- Help: http://www.jssor.com/development/slider-with-arrow-navigator-jquery.html -->

            <!-- Arrow Left -->
            <span u="arrowleft" class="jssora11l" style="top: 123px; left: 8px;">
            </span>
            <!-- Arrow Right -->
            <span u="arrowright" class="jssora11r" style="top: 123px; right: 8px;">
            </span>
            <!--#endregion Arrow Navigator Skin End -->
        </div>
        <!--#endregion Thumbnail Navigator Skin End -->

        <!-- Trigger -->
    </div>


<?php elseif($featured_post && !$featured_category): ?>


<div id="slider1_container" style="background-color:#000;margin:0 0 2em;position: relative; width: 1000px;height: 420px; overflow: hidden;">

        <!-- Loading Screen -->
        <div u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block;
                background-color: #000; top: 0px; left: 0px;width: 100%;height:100%;">
            </div>
            <div style="position: absolute; display: block; background: url(<?php echo $jslink; ?>/img/loading.gif) no-repeat center center;
                top: 0px; left: 0px;width: 100%;height:100%;">
            </div>
        </div>

        <!-- Slides Container -->
        <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 1000px; height: 480px;
            overflow: hidden;">

<?php
$allposttype = mp_get_all_posttype();
query_posts( array( 'post__in' => explode(',', $featured_post), 'post_type'=> $allposttype, 'posts_per_page' => 100, 'ignore_sticky_posts' => 1, 'orderby' => 'post__in', 'order' => '' ) );
while ( have_posts() ) : the_post(); ?>

<div>
<img u="image" src="<?php echo get_featured_post_image_src('','','large',false) ; ?>" />
<img u="thumb" src="<?php echo get_featured_post_image_src('','','thumbnail',false) ; ?>" />

<div u=caption t="*" class="captionOrange">
<h3><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php echo the_title(); ?></a></h3>
<p><?php echo get_custom_the_excerpt(30); ?></p>
</div>

</div>

<?php endwhile; wp_reset_query(); ?>

</div>
        <!--#region Thumbnail Navigator Skin Begin -->
        <!-- Help: http://www.jssor.com/development/slider-with-thumbnail-navigator-jquery.html -->

        <!-- thumbnail navigator container -->
        <div u="thumbnavigator" class="jssort07" style="width: 1000px; height: 100px; left: 0px; bottom: 0px;">
            <!-- Thumbnail Item Skin Begin -->
            <div u="slides" style="cursor: default;">
                <div u="prototype" class="p">
                    <div u="thumbnailtemplate" class="i"></div>
                    <div class="o"></div>
                </div>
            </div>
            <!-- Thumbnail Item Skin End -->
            <!--#region Arrow Navigator Skin Begin -->
            <!-- Help: http://www.jssor.com/development/slider-with-arrow-navigator-jquery.html -->

            <!-- Arrow Left -->
            <span u="arrowleft" class="jssora11l" style="top: 123px; left: 8px;">
            </span>
            <!-- Arrow Right -->
            <span u="arrowright" class="jssora11r" style="top: 123px; right: 8px;">
            </span>
            <!--#endregion Arrow Navigator Skin End -->
        </div>
        <!--#endregion Thumbnail Navigator Skin End -->

        <!-- Trigger -->
    </div>

<?php endif; ?>

<?php endif; ?>

<?php endif; ?>