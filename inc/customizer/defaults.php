<?php
$trivoo_panel_name = 'panel_trivoo_';
$trivoo_section_name = 'trivoo_';
$trivoo_setting_name = 'setting_trivoo_';

$trivoo_defaults = array (

	/************
	** General **
	*************/

	/* Site Title & Tagline */
	'title_tagline_hide_title' => 0,
	'title_tagline_hide_tagline' => 0,

	/* Logo */
	'logo_logo' => '',
	'logo_favicon' => '',

	/************
	** Layout **
	*************/

	/* Global */
	'layout_global_site' => 'wide',

	'layout_header_search' => 1,

	'layout_footer_widgets' => 3,


	/* Blog (Posts Page) */
	'layout_blog_sidebar' => 'right',
	'layout_blog_style' => 'normal',
	'layout_blog_title-bar' => 1,
	'layout_blog_meta' => '',
	'layout_blog_meta-cats' => 1,
	'layout_blog_meta-tags' => 1,


	/* Archive */
	'layout_archive_sidebar' => 'right',
	'layout_archive_style' => 'normal',
	'layout_archive_title-bar' => 1,
	'layout_archive_meta' => '',
	'layout_archive_meta-cats' => 1,
	'layout_archive_meta-tags' => 1,


	/* Search Results */
	'layout_search_sidebar' => 'right',
	'layout_search_style' => 'normal',
	'layout_search_title-bar' => 1,
	'layout_search_meta' => '',
	'layout_search_meta-cats' => 1,
	'layout_search_meta-tags' => 1,


	/* Single Post */
	'layout_post_sidebar' => 'right',
	'layout_post_title-bar' => 1,
	'layout_post_title' => 1,
	'layout_post_meta' => '',
	'layout_post_meta-cats' => 1,
	'layout_post_meta-tags' => 1,


	/* Single page */
	'layout_page_sidebar' => 'right',
	'layout_page_title-bar' => 1,
	'layout_page_title' => 1,

	/************
	** Colors **
	*************/

	/* Global */
	'colors_global_accent' => '#27ae60',
	'colors_global_accent_shade' => '#239e57',
	'colors_global_alt' => '#f5f5f5',
	'colors_global_border' => '#e0e0e0',
	'colors_global_heading' => '#222',
	'colors_global_text' => '#333',
	'colors_global_text_alt' => '#9d9a9a',
	'colors_global_site_bg' => '#ddd',
	'colors_global_content_bg' => '#fff',

	/* Header */
	'colors_header_bg' => '#fff',
	'colors_header_text' => '#333',
	'colors_header_border' => '#e0e0e0',

	/* Main Menu */
	'colors_menu_text' => '#333',
	'colors_menu_hover' => '#239e57',
	'colors_menu_sub_text' => '#333',
	'colors_menu_sub_hover' => '#239e57',
	'colors_menu_sub_hover_bg' => '#fff',
	'colors_menu_sub_bg' => '#f5f5f5',
	'colors_menu_sub_border' => '#e0e0e0',

	/* Title Container */
	'colors_title_bg' => '#f5f5f5',
	'colors_title_text' => '#333',
	'colors_title_border' => '#e0e0e0',


	/* Footer */
	'colors_footer_bg' => '#efefef',
	'colors_footer_heading' => '#777777',
	'colors_footer_text' => '#5f5f5f',
	'colors_footer_border' => '#c1c1c1',

	'colors_footer_sc_bg' => '#2B3A42',
	'colors_footer_sc_text' => '#d4d7d9',

	'colors_footer_sc_si' => '#959ca0',
	'colors_footer_sc_si_hover' => '#fff',
	'colors_footer_sc_si_hover_bg' => '#27ae60',


	/*****************
	** Typography **
	******************/

	/* Global */
	'typography_global_font_family' => 'Open Sans',
	'typography_global_font_variant' => '300',
	'typography_global_font_size' => 13,
	'typography_global_line_height' => 1.5,
	'typography_global_text_transform' => 'none',
	'typography_global_letter_spacing' => 0,
	'typography_global_word_spacing' => 0,


	/* Text Headings */
	/*H1*/
	'typography_heading_h1_font_family' => 'Open Sans',
	'typography_heading_h1_font_variant' => '300',
	'typography_heading_h1_font_size' => 32,
	'typography_heading_h1_line_height' => 1.5,
	'typography_heading_h1_text_transform' => 'none',
	'typography_heading_h1_letter_spacing' => 0,
	'typography_heading_h1_word_spacing' => 0,

	/* H2 */
	'typography_heading_h2_font_family' => 'Open Sans',
	'typography_heading_h2_font_variant' => '300',
	'typography_heading_h2_font_size' => 28,
	'typography_heading_h2_line_height' => 1.5,
	'typography_heading_h2_text_transform' => 'none',
	'typography_heading_h2_letter_spacing' => 0,
	'typography_heading_h2_word_spacing' => 0,

	/* H3 */
	'typography_heading_h3_font_family' => 'Open Sans',
	'typography_heading_h3_font_variant' => '300',
	'typography_heading_h3_font_size' => 24,
	'typography_heading_h3_line_height' => 1.5,
	'typography_heading_h3_text_transform' => 'none',
	'typography_heading_h3_letter_spacing' => 0,
	'typography_heading_h3_word_spacing' => 0,

	/* H4 */
	'typography_heading_h4_font_family' => 'Open Sans',
	'typography_heading_h4_font_variant' => '300',
	'typography_heading_h4_font_size' => 20,
	'typography_heading_h4_line_height' => 1.5,
	'typography_heading_h4_text_transform' => 'none',
	'typography_heading_h4_letter_spacing' => 0,
	'typography_heading_h4_word_spacing' => 0,

	/* H5 */
	'typography_heading_h5_font_family' => 'Open Sans',
	'typography_heading_h5_font_variant' => '300',
	'typography_heading_h5_font_size' => 16,
	'typography_heading_h5_line_height' => 1.5,
	'typography_heading_h5_text_transform' => 'none',
	'typography_heading_h5_letter_spacing' => 0,
	'typography_heading_h5_word_spacing' => 0,

	/* H6 */
	'typography_heading_h6_font_family' => 'Open Sans',
	'typography_heading_h6_font_variant' => '300',
	'typography_heading_h6_font_size' => 14,
	'typography_heading_h6_line_height' => 1.5,
	'typography_heading_h6_text_transform' => 'none',
	'typography_heading_h6_letter_spacing' => 0,
	'typography_heading_h6_word_spacing' => 0,


	/* Main Menu */
	/* Menu Items */
	'typography_menu_font_family' => 'Open Sans',
	'typography_menu_font_variant' => '300',
	'typography_menu_font_size' => 14,
	'typography_menu_line_height' => false,
	'typography_menu_text_transform' => 'none',
	'typography_menu_letter_spacing' => 0,
	'typography_menu_word_spacing' => 0,

	/* Sub Menu Items */
	'typography_menu_sub_font_family' => 'Open Sans',
	'typography_menu_sub_font_variant' => '300',
	'typography_menu_sub_font_size' => 14,
	'typography_menu_sub_line_height' => 2.5,
	'typography_menu_sub_text_transform' => 'none',
	'typography_menu_sub_letter_spacing' => 0,
	'typography_menu_sub_word_spacing' => 0,


	/* Site Title & Tagline */
	/* Title */
	'typography_site_title_font_family' => 'Open Sans',
	'typography_site_title_font_variant' => '300',
	'typography_site_title_font_size' => 32,
	'typography_site_title_line_height' => 1.5,
	'typography_site_title_text_transform' => 'none',
	'typography_site_title_letter_spacing' => 0,
	'typography_site_title_word_spacing' => 0,


	/* Tagline */
	'typography_site_tagline_font_family' => 'Open Sans',
	'typography_site_tagline_font_variant' => '300',
	'typography_site_tagline_font_size' => 13,
	'typography_site_tagline_line_height' => 1.5,
	'typography_site_tagline_text_transform' => 'uppercase',
	'typography_site_tagline_letter_spacing' => 0.5,
	'typography_site_tagline_word_spacing' => 0,


	/* Sidebar */
	/* Title */
	'typography_sidebar_title_font_family' => 'Open Sans',
	'typography_sidebar_title_font_variant' => '300',
	'typography_sidebar_title_font_size' => 24,
	'typography_sidebar_title_line_height' => 1.5,
	'typography_sidebar_title_text_transform' => 'none',
	'typography_sidebar_title_letter_spacing' => 0,
	'typography_sidebar_title_word_spacing' => 0,


	/* Body */
	'typography_sidebar_body_font_family' => 'Open Sans',
	'typography_sidebar_body_font_variant' => '300',
	'typography_sidebar_body_font_size' => 13,
	'typography_sidebar_body_line_height' => 1.5,
	'typography_sidebar_body_text_transform' => 'none',
	'typography_sidebar_body_letter_spacing' => 0,
	'typography_sidebar_body_word_spacing' => 0,


	/* Footer */
	/* Title */
	'typography_footer_title_font_family' => 'Open Sans',
	'typography_footer_title_font_variant' => '300',
	'typography_footer_title_font_size' => 24,
	'typography_footer_title_line_height' => 1.5,
	'typography_footer_title_text_transform' => 'none',
	'typography_footer_title_letter_spacing' => 0,
	'typography_footer_title_word_spacing' => 0,

	/* Body */
	'typography_footer_body_font_family' => 'Open Sans',
	'typography_footer_body_font_variant' => '300',
	'typography_footer_body_font_size' => 13,
	'typography_footer_body_line_height' => 1.5,
	'typography_footer_body_text_transform' => 'none',
	'typography_footer_body_letter_spacing' => 0,
	'typography_footer_body_word_spacing' => 0,


	/* Footer Text */
	'typography_footer_text_font_family' => 'Open Sans',
	'typography_footer_text_font_variant' => '300',
	'typography_footer_text_font_size' => 13,
	'typography_footer_text_line_height' => 1.5,
	'typography_footer_text_text_transform' => 'none',
	'typography_footer_text_letter_spacing' => 0,
	'typography_footer_text_word_spacing' => 0,

	'bgimages_site' => '',
	'bgimages_title_container' => '',


);

?>
