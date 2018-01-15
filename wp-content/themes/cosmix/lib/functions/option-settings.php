<?php
$global_options = array (
/*header setting*/
array(
"header-title" => __("Header Setting", TEMPLATE_DOMAIN),
"name" => __("Site Logo", TEMPLATE_DOMAIN),
"section" => "header",
	"description" => __("Enter your logo url path here.", TEMPLATE_DOMAIN),
	"id" => "header_logo",
    "filename" => "header_logo",
	"type" => "text",
	"default" => ""),

array(
"name" => __("Favourite Icon", TEMPLATE_DOMAIN),
	"description" => __("Enter your fav icon url path here.", TEMPLATE_DOMAIN),
    "section" => "header",
    "id" => "fav_icon",
    "filename" => "fav_icon",
	"type" => "text",
	"default" => ""),


/* typography setting */
array(
"header-title" => __("Typography Settings", TEMPLATE_DOMAIN),
"name" => __("Body Font", TEMPLATE_DOMAIN),
	"description" => __("Choose a font for the body text.", TEMPLATE_DOMAIN),
    "section" => "typography",
    "id" => "body_font",
	"type" => "select-fonts",
	"default" => ""),

array(
"name" => __("Body Font Weight", TEMPLATE_DOMAIN),
	"description" => "",
    "section" => "typography",
    "id" => "body_font_weight",
	"type" => "select-fonts-weight",
	"default" => ""),

array(
"name" => __("Headline and Title Font", TEMPLATE_DOMAIN),
	"description" => __("Choose a font for the headline text.", TEMPLATE_DOMAIN),
    "section" => "typography",
    "id" => "headline_font",
	"type" => "select-fonts",
	"default" => ""),

array(
"name" => __("Headline Font Weight", TEMPLATE_DOMAIN),
	"description" => "",
    "section" => "typography",
    "id" => "headline_font_weight",
	"type" => "select-fonts-weight",
	"default" => ""),


array(
"name" => __("Navigation Font", TEMPLATE_DOMAIN),
	"description" => __("Choose a font for the navigation text.", TEMPLATE_DOMAIN),
    "section" => "typography",
    "id" => "navigation_font",
	"type" => "select-fonts",
	"default" => ""),
    
array(
"name" => __("Navigation Font Weight", TEMPLATE_DOMAIN),
	"description" => "",
    "section" => "typography",
    "id" => "navigation_font_weight",
	"type" => "select-fonts-weight",
	"default" => ""),

/* Posts setting */
array(
"header-title" => __("Posts Settings", TEMPLATE_DOMAIN),
"name" => __("Enable Author Bio", TEMPLATE_DOMAIN),
"description" => __("Choose if you want to enable or disable post author bio.", TEMPLATE_DOMAIN),
    "section" => "post",
"id" => "author_bio",
	"type" => "radio-enable-disable",
	"default" => "Disable"),


/* Slider setting */
array(
"header-title" => __("Featured Slider Settings", TEMPLATE_DOMAIN),
"name" => __("Enable Featured slider", TEMPLATE_DOMAIN),
"description" => __("Choose if you want to enable or disable featured slider.", TEMPLATE_DOMAIN),
    "section" => "slider",
"id" => "slider_on",
	"type" => "radio-enable-disable",
	"default" => "Disable"),

array(
"name" => __("Categories ID", TEMPLATE_DOMAIN),
"description" => __("Add a list of category ids if you want to use category as featured. <em>*leave blank to use bottom post ids featured</em><br /><small>example: 3,4,68</small>", TEMPLATE_DOMAIN),
    "section" => "slider",
"id" => "feat_cat",
	"type" => "text",
	"default" => ""),

array(
"name" => __("Limit to how many posts", TEMPLATE_DOMAIN),
"description" => __("How many posts in categories you listed you want to show?", TEMPLATE_DOMAIN),
    "section" => "slider",
"id" => "feat_cat_count",
	"type" => "select-count",
	"default" => ""),


array(
"name" => __("Posts ID", TEMPLATE_DOMAIN),
"description" => __("Add a list of post ids if you want to use posts as featured. <em>*leave blank to use above category ids featured</em><br /><small>example: 136,928,925,80,77,55,49</small>", TEMPLATE_DOMAIN),
     "section" => "slider",
"id" => "feat_post",
	"type" => "text",
	"default" => ""),


/*advertisement setting*/
array(
"header-title" => __("Advertisment Settings", TEMPLATE_DOMAIN),
"name" => __("Advertisment in Top Header", TEMPLATE_DOMAIN),
  "description" => __("Insert script code or banner code for the top header.", TEMPLATE_DOMAIN),
	 "section" => "ads",
     "id" => "ads_top_header",
	"type" => "textarea",
	"default" => ""),


array(
"name" => __("Advertisment in Single Post Top", TEMPLATE_DOMAIN),
  "description" => __("Insert script code or banner code for the top single post page. It will appeared before <em>post_content()</em>. Leave blank if not use.", TEMPLATE_DOMAIN),
	 "section" => "ads",
     "id" => "ads_single_top",
	"type" => "textarea",
	"default" => ""),

array( "name" => __("Advertisment in Single Post Bottom", TEMPLATE_DOMAIN),
  "description" => __("Insert script code or banner code for the bottom single post page. It will appeared after <em>post_content()</em>. Leave blank if not use.", TEMPLATE_DOMAIN),
	 "section" => "ads",
     "id" => "ads_single_bottom",
	"type" => "textarea",
	"default" => ""),


array(
"name" => __("Advertisment in Post Loop One", TEMPLATE_DOMAIN),
  "description" => __("Insert script code or banner code for the post loop one.", TEMPLATE_DOMAIN),
	 "section" => "ads",
     "id" => "ads_loop_one",
	"type" => "textarea",
	"default" => ""),

array( "name" => __("Advertisment in Post Loop Two", TEMPLATE_DOMAIN),
  "description" => __("Insert script code or banner code for the post loop two.", TEMPLATE_DOMAIN),
	 "section" => "ads",
     "id" => "ads_loop_two",
	"type" => "textarea",
	"default" => ""),

array( "name" => __("Advertisment in Left Sidebar", TEMPLATE_DOMAIN),
  "description" => __("Insert script code or banner code for the left sidebar. 160x600 or 120x600 dimension preferable. *use widget - Ads Left", TEMPLATE_DOMAIN),
	 "section" => "ads",
     "id" => "ads_left_sidebar",
	"type" => "textarea",
	"default" => ""),

array( "name" => __("Advertisment in Right Sidebar", TEMPLATE_DOMAIN),
  "description" => __("Insert script code or banner code for the right sidebar. 300x250 or 250x250 dimension preferable. *use widget - Ads Right", TEMPLATE_DOMAIN),
	 "section" => "ads",
     "id" => "ads_right_sidebar",
	"type" => "textarea",
	"default" => ""),

array( "name" => __("Header Code", TEMPLATE_DOMAIN),
	"description" => __("Insert any code in header. <em>*this will appearead after wp_head()</em>", TEMPLATE_DOMAIN),
	 "section" => "ads",
     "id" => "header_code",
	"type" => "textarea",
	"default" => ""),


array( "name" => __("Footer Code", TEMPLATE_DOMAIN),
	"description" => __("Insert any code in footer. <em>*this will appearead after wp_footer()</em>", TEMPLATE_DOMAIN),
	 "section" => "ads",
     "id" => "footer_code",
	"type" => "textarea",
	"default" => ""),


/* services setting */
array(
"header-title" => __("Social Settings", TEMPLATE_DOMAIN),
"name" => __("Social Submit links in posts", TEMPLATE_DOMAIN),
	"description" => __("Enable social share in posts", TEMPLATE_DOMAIN),
    "section" => "social",
    "id" => "social_on",
	"type" => "radio-enable-disable",
	"default" => "Disable"),

array(
"name" => __("Schema for Posts", TEMPLATE_DOMAIN),
	"description" => __("Enable schema.org markup in posts", TEMPLATE_DOMAIN),
    "section" => "social",
    "id" => "schema_post_on",
	"type" => "radio-enable-disable",
	"default" => "Disable"),

array(
"name" => __("Schema for Breadcrumbs", TEMPLATE_DOMAIN),
	"description" => __("Enable schema.org markup in breadcrumbs", TEMPLATE_DOMAIN),
    "section" => "social",
    "id" => "schema_breadcrumbs_on",
	"type" => "radio-enable-disable",
	"default" => "Disable"),

array(
"name" => __("Twitter Widget ID", TEMPLATE_DOMAIN),
	"description" => __("Insert your Twitter widget ID here. example: 487277644619067392", TEMPLATE_DOMAIN),
     "section" => "social",
"id" => "twitter_widget_id",
	"type" => "text",
	"default" => "")

);
?>
