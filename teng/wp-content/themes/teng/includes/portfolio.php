<?php

require_once "conn.php";
	
$get_posts_db = "select id, post_author, post_date, post_content, post_title from wp_posts where id in (select object_id from  wp_term_relationships where term_taxonomy_id = 3) and post_status = \"publish\"";
$get_posts = createQuery($get_posts_db, $conn);

$portfolio = '<div style="border-top:solid #666 3px; margin-bottom:20px"></div><table id="portfolio" width="100%"><tr>';
$count = 0;
while ($info = mysql_fetch_array($get_posts)) {
	if($count == 3){
		$portfolio .= "</tr><tr>";
		$count = 0;
	}
		
	$portfolio .= "<td width=\"200\" align=\"center\">";
	$portfolio .= '<div class="portfolio" id="portfolio_'.$info['id'].'">';
	
	$get_images_db = "select meta_key, meta_value from wp_postmeta where post_id = ". $info['id'];
	$get_images = createQuery($get_images_db, $conn);
	
	while ($image = mysql_fetch_array($get_images)) {
		if($image[0] == "thumbnail")
			$portfolio_image_1 = '<img rel="#popup_portfolio" class="'.$image[0].'" src="'.$image[1].'"';
		else if($image[0] == "image")
			$portfolio_image_2 = ' alt="'.$image[1].'" title="'.$info['post_title'].'" desc="'.$info['post_content'].'" width="200">';
		
	}
	$portfolio .= $portfolio_image_1;
	$portfolio .= $portfolio_image_2;
	$portfolio .= '<p><span class="title">'.$info['post_title'].'</span></div>';
	$portfolio .= "</td>";
		
	$count++;
	
}
$portfolio .= "</tr></table>
				<script type=\"text/javascript\">
					$(\"img[rel]\").overlay({effect: 'apple', mask: '#111111'});
									
					$(\"img.thumbnail\").hover(function(){
						$(\"div#popup_portfolio img\").attr(\"src\", $(this).attr(\"alt\"));
						$(\"div#popup_portfolio span\").html(\"<strong>\"+$(this).attr(\"title\")+\"</strong><br><span style='font-size:9px'>\"+$(this).attr(\"desc\")+\"</span>\");
					});
				</script>";

$return['count'] = $count;
$return['status'] = "OK";
$return['portfolio'] = $portfolio;

echo json_encode($return);

?>