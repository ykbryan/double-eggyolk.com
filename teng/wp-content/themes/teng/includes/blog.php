<?php

require_once "conn.php";

$last_post_id = $_POST['last'];

if($last_post_id > 0)
	$get_posts_db = "select id, post_author, post_date, post_content, post_title from wp_posts where id in (select object_id from  wp_term_relationships where term_taxonomy_id = 1) AND post_status = \"publish\" and post_type = \"post\" and id < $last_post_id ORDER BY post_date DESC LIMIT 5";
else
	$get_posts_db = "select id, post_author, post_date, post_content, post_title from wp_posts where id in (select object_id from  wp_term_relationships where term_taxonomy_id = 1) AND post_status = \"publish\" and post_type = \"post\" ORDER BY post_date DESC LIMIT 5";
$get_posts = createQuery($get_posts_db, $conn);

$blog = "";

$count = 0;
while ($info = mysql_fetch_array($get_posts)) {
	$blog .= '<div style="border-top: solid #000 10px; border-bottom: solid #000 10px; padding-top:2px">
		<div style="border-top: solid #000 3.5px; border-bottom: solid #000 3.5px; height:100%; padding-top:5px; padding-bottom:5px; margin-bottom:2px; text-align:left; font-family:Helvetica, sans-serif; font-size:20px; font-weight:bold; color:#000; text-transform:uppercase">';
		
	$blog .= $info['post_title'];
	$blog .= '<span style="font-family:Helvetica, sans-serif; font-size:20px; font-weight:bold; color:#000; float:right">';
	
	
	$datetime = explode(" ",  $info['post_date']);
	$time = explode(":", $datetime[1]);
	$date = explode("-", $datetime[0]);
	
	$datetime = mktime($time[0], $time[1], $time[2], $date[1], $date[2], $date[0]);
	$post_date = date("jS F  Y", $datetime);
	
	$blog .= $post_date;
	$blog .= '</span>
		</div>
	</div>
	<div style=" text-align:left; font-size:11px; margin:10px 0px 20px 0px">';
	
	$blog .= $info['post_content'];
	$blog .= '</div>
	<div style="border-top:dotted #000 1px; margin-bottom:20px"></div>';
	
	if($count==0){
		$last_id = $info['id'];
		$count++;
	}
}

if($count == 4)
	$blog .= '<div class="load_more_blog" id="'.$last_id.'"></div>';
else
	$blog .= '<div class="load_more_blog"></div>';

$return['status'] = "OK";
$return['blog'] = $blog;

echo json_encode($return);

?>