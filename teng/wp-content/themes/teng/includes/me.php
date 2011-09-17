<?php
$page_id = 12;
$page_data = get_page($page_id);

$page_title = $page_data->post_title;
$page_content = $page_data->post_content;

$return = '<table width="800" style="color:#000">
        	<tr>
            	<td valign="top" style="border:1px solid #000">
                	<img src="'.get_post_meta($page_id, 'image', true).'" border="0" style="margin:5px 5px 0px 5px"></div></td>
                <td style="padding-left:50px; font-size:10px; padding-top:30px; font-size:10px">
                	<div style="font-size:24px; width:100%">'.$page_title.'</div>
                    '.$page_content.'

                </td>
            </tr>
        </table>
        <br><br>';	
echo $return;
?>