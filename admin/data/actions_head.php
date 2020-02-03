<?php
/**
 * Head cleaning
 */
public function wpspeed_wp_generator() {
	remove_action( 'wp_head', 'wp_generator' );					
public function wpspeed_wlwmanifest_link() {
	remove_action( 'wp_head', 'wlwmanifest_link' );			
}
public function wpspeed_rsd_link() {
	remove_action( 'wp_head', 'rsd_link' );						
}
public function wpspeed_xmlrpc_enabled() {
	add_filter( 'xmlrpc_enabled', '__return_false' );
public function wpspeed_xmlrpc_enabled_rsd() {
	remove_action( 'wp_head', 'rsd_link' );
	add_filter( 'xmlrpc_enabled', '__return_false' );			
}
public function wpspeed_feed_link() {
	add_filter( 'feed_links_show_posts_feed', '__return_false' );
}
public function wpspeed_comments_feed() {
	add_filter( 'feed_links_show_comments_feed', '__return_false' );
public function wpspeed_start_post_rel_link() {
	remove_action( 'wp_head', 'start_post_rel_link' );
}
public function wpspeed_wp_shortlink_wp_head() {
	remove_action( 'wp_head', 'wp_shortlink_wp_head' );		
}
public function wpspeed_index_rel_link() {
	remove_action( 'wp_head', 'index_rel_link' );					
public function wpspeed_parent_post_rel_link() {
	remove_action( 'wp_head', 'parent_post_rel_link' );	
