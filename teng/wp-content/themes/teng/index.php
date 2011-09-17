<?php
/**
 * @package WordPress
 * @subpackage double-eggyolk
 * @by BRYAN CHUA =) http://www.bryanchua.com
 */
?><!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="description" content="Graphic design is a creative process that combines art and technology to communication ideas."  />
<title><?php
	
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '-', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo "-$site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo '-' . sprintf( __( 'Page %s', 'teng' ), max( $paged, $page ) );

	?></title>
<link type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/base.css" rel="stylesheet" />
<link type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/main.css" rel="stylesheet" />
<link type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/overlay-apple.css" rel="stylesheet" /> 
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.tools.min.js"></script>
<!-- <script type="text/javascript" src="js/jquery-1.5.1.min.js"></script> -->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery-ui-1.8.14.custom.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/main.js"></script>

</head>

<body bgcolor="#000000">

<div id="loading">
	<img src="<?php echo get_template_directory_uri(); ?>/images/me_rollover.png" class="preload" />
    <img src="<?php echo get_template_directory_uri(); ?>/images/photography_rollover.png" class="preload" />
    <img src="<?php echo get_template_directory_uri(); ?>/images/portfolio_rollover.png" class="preload"  />
    <img src="<?php echo get_template_directory_uri(); ?>/images/double-eggyolk_rollover.png" class="preload" />
    <img src="<?php echo get_template_directory_uri(); ?>/images/tumblr_rollover.png" class="preload" />
    <img src="<?php echo get_template_directory_uri(); ?>/images/behance_rollover.png" class="preload" />
    <img src="<?php echo get_template_directory_uri(); ?>/images/facebook_rollover.png" class="preload"  />
    
    <div id="loading_screen"></div>
    <div id="loading_img" align="center"><img src="<?php echo get_template_directory_uri(); ?>/images/loading.gif" /><br /><br />one moment please..</div>
</div>

<center>
<div id="wrap" align="center">
	<div id="top">
    	<img id="banner_prev" src="<?php echo get_template_directory_uri(); ?>/images/banner_left.png" style="float:left; padding-right:5px" />
        <div id="banners" style="float:left; overflow:hidden">
        	<?php
				$images = get_post_meta(5, 'image', false);
				if($images){
					$count_banner = 0;
					foreach($images as $image){
						if($image) $count_banner++;
						echo '<img id="banner_'.$count_banner.'" src="'.$image.'" style="position:absolute" />';
					}
				}
			?>
        </div>
        <img id="banner_next" src="<?php echo get_template_directory_uri(); ?>/images/banner_right.png" style="float:right; padding-left:5px" />
    </div>
    
    <div id="bio">
    	<img id="home_logo" src="<?php echo get_template_directory_uri(); ?>/images/home.png" style="float:left; padding:20px;" border="0" />
        <div style="float:left; width:450px; text-align:left; border-top: #666666 solid 2px; border-bottom: #666666 solid 2px; padding:20px 10px 30px 10px; margin:20px 15px 5px 5px" align="center">
        	<span style="font-family:Helvetica, sans-serif; font-size:14px; text-transform:uppercase; color:#999999;">
            	<span style="color:#4D4D4D">graphic design</span> is a creative process that combines art and technology to communication ideas. the designer works with a variety of communication tools in order to convey a message to a client to a particular audience. the main tools are image and topography.
            </span><br /><br />
            <span style="font-family:Helvetica, sans-serif; font-size:12px; color:#333333">
            	Images, patterns, layouts, and other graphic devices composed into a coherent, distinctive design intended for printing or display over visual media. A graphic design does not have to be complicated but to be effective. Passion + fun is the motto.
            </span>
        </div>
        <div style="float:right; padding-right:25px">
            <a href="http://www.behance.net/teng-theeggyolkeater" target="_blank"><div class="tag_behance"></div></a>
            <a href="http://www.facebook.com/profile.php?id=1670690952" target="_blank"><div class="tag_facebook"></div></a>
            <a href="http://birdflyhigh-teng.tumblr.com/" target="_blank"><div class="tag_tumblr"></div></a>
        </div>
    </div>
    
    <div id="me"><?php include_once "includes/me.php" ?></div>
    
    <div id="photography">
        <br><br>
    	<center><span style="font-size:24px">Coming soon...</span></center>
    </div>
    
    <div id="icons">
    	<div class="icon_me"></div>
        <div class="icon_portfolio"></div>
        <div class="icon_photography"></div>
        <div class="icon_double-eggyolk"></div>
    </div>
    
    <div id="information" align="left"></div>
    <div class="apple_overlay" id="popup_portfolio"><center><img src="#" /></center></div>
</div>
</center>
</body>
</html>
<script>
// JavaScript Document
var max_files = <?php echo $count_banner; ?>;
var current_file = 1;
var last_post = 0;

function change_banners(){
	$("img#banner_"+current_file).hide("slide", { direction: "left" }, "1000");
	
	if(current_file==5)
		current_file = 1;
	else
		current_file=current_file+1;
		
	$("img#banner_"+current_file).show("slide", { direction: "right" }, "1000");
	setTimeout("change_banners()",5000);
};
setTimeout("change_banners()",5000);

$(function(){
	
	$("img#banner_prev").click(function(){
		$("img#banner_"+current_file).hide("slide", { direction: "right" }, "1000");
		
		if(current_file==1)
			current_file = 5;
		else
			current_file=current_file-1;
			
		$("img#banner_"+current_file).show("slide", { direction: "left" }, "1000");
	});
	
	$("img#banner_next").click(function(){
		$("img#banner_"+current_file).hide("slide", { direction: "left" }, "1000");
		
		if(current_file==5)
			current_file = 1;
		else
			current_file=current_file+1;
			
		$("img#banner_"+current_file).show("slide", { direction: "right" }, "1000");
	});

	$("div#loading").ajaxStart(function() {
        $(this).show();
		$("button").button("option", "disabled", true);
    });
	$("div#loading").ajaxStop(function() {
        $(this).hide();
		$("button").button("option", "disabled", false);
    });
	$("div#loading").hide();
	
	get_blogs();
	
	
	function get_blogs(){
		
		$.ajax({
			type: 'POST',
			url: "<?php echo get_template_directory_uri(); ?>/includes/blog.php",
			data:'last='+last_post,
			dataType: 'json',
			success: function(data){
				if(data.status != "OK"){
					alert("oops! please try again later...");
				}else{
					$("div#information").fadeOut(function(){
						$(this).html(data.blog).fadeIn();
						
	
					});
				}
			}
		});
	}
	
	$("img#home_logo").click(function(){
		get_blogs();
	});
	
	$("div.icon_portfolio").click(function(){
		$.ajax({
			type: 'POST',
			url: '<?php echo get_template_directory_uri(); ?>/includes/portfolio.php',
			dataType: 'json',
			success: function(data){
				if(data.status != "OK"){
					alert("oops! please try again later...");
				}else{
					$("div#information").fadeOut(function(){
						$(this).html(data.portfolio).fadeIn();
						if(data.count == 0)
							$(this).append("<div style=\"font-size:24px; text-align:center\">Coming soon...</div>");
					});
				}
			}
		});
	});
	
	$("div.icon_photography").click(function(){
		$.ajax({
			type: 'POST',
			url: '<?php echo get_template_directory_uri(); ?>/includes/photography.php',
			dataType: 'json',
			success: function(data){
				if(data.status != "OK"){
					alert("oops! please try again later...");
				}else{
					$("div#information").fadeOut(function(){
						$(this).html(data.portfolio).fadeIn();
						if(data.count == 0)
							$(this).append("<div style=\"font-size:24px; text-align:center\">Coming soon...</div>");
					});
				}
			}
		});
	});
	
	$("div.icon_me").click(function(){
		$("div#information").fadeOut(function(){
			$(this).html($("div#me").html()).fadeIn();
		});
	});
	
	$("div.icon_double-eggyolk").click(function(){
		$("div#information").fadeOut(function(){
			$(this).html($("div#photography").html()).fadeIn();
		});
	});
	
	
	$(window).scroll(function(){
		if($(window).scrollTop() == $(document).height() - $(window).height()){
			last_post = $("div.load_more_blog:last-child").attr("id");
			if(last_post){
				$.ajax({
					type: 'POST',
					url: "<?php echo get_template_directory_uri(); ?>/includes/blog.php",
					data:'last='+last_post,
					dataType: 'json',
					success: function(data){
						if(data.status != "OK")
							alert("oops! please try again later...");
						else
							$("div#information").append(data.blog).show();
					}
				});
			}
		}
	});
	

});
</script>