<?php

// Load Blocks
add_action('init', 'load_blocks');

// Function to load block settings
function load_blocks(){
    // Define the blocks directory
    $blocks_dir = get_stylesheet_directory() . '/blocks/';
    
    // Call the recursive function to load block settings
    load_block_settings($blocks_dir);
}

// Recursive function to search for and load block settings in the specified directory and its subdirectories
function load_block_settings($dir) {
    // Search for directories in the specified directory
    $blocks = glob($dir . '*', GLOB_ONLYDIR);

    // Loop through each directory
    foreach ($blocks as $block) {
        // Define the path to the block settings file
        $settings = $block . '/settings.php';
        
        // Check if the block settings file exists
        if (file_exists($settings)) {
            // Include the block settings file
            include ($settings);
        }

        // Call the function recursively to search for block settings in subdirectories
        load_block_settings($block . '/');
    }
}

// Better Gutenberg Styles
add_action( 'enqueue_block_editor_assets', 'better_gutenberg');
function better_gutenberg() {
	wp_enqueue_style( 'better_gutenberg', get_theme_file_uri( 'style.css' ), false, _VER, 'all' );
}

// Custom Blocks Category
add_filter( 'block_categories_all', 'custom_block_category', 10, 2);
function custom_block_category( $categories, $post ) {
	
	array_unshift( $categories, array(
		'slug'	=> 'custom',
		'title' => 'Custom',
	) );
	return $categories;
}

// Add Patterns to Admin Column
add_menu_page( 'linked_url', 'Patterns', 'read', 'edit.php?post_type=wp_block', '', 'dashicons-layout', 30 );