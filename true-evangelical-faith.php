<?php
/**
 * @package True Evangelical Faith
 * @version 1.1.6
 */
/*
Plugin Name: True Evangelical Faith
Plugin URI: https://wordpress.org/plugins/true-evangelical-faith/
Description: This is not just a plugin, it symbolizes the hope of an entire despised generation, as expressed by 16th century Anabaptist leader Menno Simons. When activated, you will randomly see a statement from <cite>True Evangelical Faith</cite> in the upper right of your admin screen on every page.
License: GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Author: Menno Simons
Version: 1.1.6

Author URI: https://en.wikisource.org/wiki/Why_I_Do_Not_Cease_Teaching_and_Writing
*/

function true_evangelical_faith_get_words() {
	/** This is adapted from Menno Simons' quote on true evangelical faith */
	$lyrics = "cannot lay dormant
manifests itself in all righteousness and works of love 
dies unto flesh and blood 
destroys all forbidden lusts and desires 
cordially seeks, serves and fears God 
clothes the naked 
feeds the hungry 
consoles the afflicted 
shelters the miserable 
aids and consoles all the oppressed 
returns good for evil 
serves those that injure it 
prays for those that persecute it 
teaches, admonishes and reproves with the Word of the Lord 
seeks that which is lost 
binds up that which is wounded 
heals that which is diseased 
saves that which is sound 
joyously receives persecution, suffering and anxiety";

	// Here we split it into lines
	$lyrics = explode( "\n", $lyrics );

	// And then randomly choose a line
	return wptexturize( $lyrics[ mt_rand( 0, count( $lyrics ) - 1 ) ] );
}

// This just echoes the initial words and the chosen line, we'll position it later
function true_evangelical_faith() {
	$chosen ="For true evangelical faith ".true_evangelical_faith_get_words();
	echo "<p id='true-evangelical-paragraph'>$chosen</p>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'true_evangelical_faith' );

// We need some CSS to position the paragraph
function true_evangelical_faith_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#true-evangelical-paragraph {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;		
		margin: 0;
		font-size: 11px;
	}
	</style>
	";
}

add_action( 'admin_head', 'true_evangelical_faith_css' );

?>
