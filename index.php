<?php

	/*
		Plugin Name: Share to Social Bookmarking
		Plugin URI: https://wordpress.org/plugins/share-to-social-bookmarking/
		Description: افزونه اشتراک گذاری مطالب در دنبالر، لینک پد، بالاترین، دنباله، کلوب، گوگل پلاس، توئیتر، فیس بوک و ... 
		Version: 1.6
		Author: M.Majidi, Nima Saberi
		Author URI: http://ideyeno.ir
	*/

	function share_to_social_bookmarking($stsb_align = 'center', $stsb_width = '30px', $stsb_height = '30px', $tool_width = '100%') {
		global $post;
		$stsb_image_dir = trailingslashit( plugin_dir_url( __FILE__ ) ).'images/';
		$stsb_link = get_permalink($post->ID);
		$ps_title = str_replace(' ', '+', get_the_title( $post->ID ));
		$content = '';
		$content .= '<'.$stsb_align.'>'."\n";
		$content .= '<div id="share_to_social_bookmarking" style="width:' . $tool_width . ';">'."\n";
		$content .= '<a href="http://www.cloob.com/share/link/add?url=' . $stsb_link . '&title=' . $ps_title . '" data-toggle="tooltip" data-placement="bottom" title="اشتراک گذاری در کلوب"><img src="' . $stsb_image_dir . 'cloob.png" border="0" alt="cloob" /></a>';
		$content .= '<a href="http://donbaler.com/share/link/add/?url=' . $stsb_link . '&title=' . $ps_title . '" target="_blank" rel="nofollow" data-toggle="tooltip" data-placement="bottom" title="اشتراک گذاری در دنبالر" ><img src="' . $stsb_image_dir . 'donbaler.png" border="0" alt="Donbaler" /></a>';
		$content .= '<a href="http://www.linkpad.ir/index.php?page=submit&url=' . $stsb_link . '" target="_blank" rel="nofollow" data-toggle="tooltip" data-placement="bottom" title="اشتراک گذاری در لینک پد" ><img src="' . $stsb_image_dir . 'linkpad.png" border="0" alt="LinkPad" /></a>';
		$content .= '<a href="http://twitter.com/home?status=' . $ps_title . ' - ' . $stsb_link . '" target="_blank" rel="nofollow" data-toggle="tooltip" data-placement="bottom" title="اشتراک در توییتر"" ><img src="' . $stsb_image_dir . 'twitter.png" border="0" alt="Twitter" /></a>';
		$content .= '<a href="http://facebook.com/sharer.php?u=' . $stsb_link . '&amp;t=' . $ps_title . '" target="_blank" rel="nofollow" data-toggle="tooltip" data-placement="bottom" title="اشتراک گذاری در Facebook" ><img src="' . $stsb_image_dir . 'facebook.png" border="0" alt="Facebook" /></a>';
		$content .= '<a href="ymsgr:im?msg=ino bebin - ' . $stsb_link . ' - ' . $ps_title . '" target="_blank" rel="nofollow" data-toggle="tooltip" data-placement="bottom" title="اشتراک گذاری در یاهو مسنجر" ><img src="' . $stsb_image_dir . 'yahoo.png" border="0" alt="yahoo" /></a>'."\n";
		$content .= '</div>'."\n";
		$content .= '</'.$stsb_align.'>'."\n";
		return $content;
	}

	function share_to_social_head(){
		wp_enqueue_style('share_to_social_bookmarking', plugins_url('style.css', __FILE__), array(), '1.6', 'all');
	}

	add_action( 'wp_enqueue_scripts', 'share_to_social_head' );

?>