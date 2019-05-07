<?php

// Site-specific Post Types
// Create Jobs Post Type
// https://developer.wordpress.org/reference/functions/register_post_type/
function create_bioclub_post_types() {
  
  // BioClub Events
  register_post_type( 'bioclub-event',
    array(
      'labels'             => array(
        'name'             => __( 'Events' ),
        'singular_name'    => __( 'Event' ),
        'add_new_item'     => __( 'Add New Event' ),
      ),
      'public'             => true,
      'hierarchical'       => false, // false -> Post, true -> Page
      'has_archive'        => true,
      'menu_icon'          => 'dashicons-admin-page',
      'rewrite'            => array('slug' => 'events', 'with_front' => false),   // TODO Add Note to CODEC
      'supports'           => array('title')
    )
  );

  register_taxonomy(
    'bioclub-event-category',
    'bioclub-event',
    array(
      'label'              => __( 'Event Category' ),
      'hierarchical'       => true,
      'show_ui'            => true,
      'show_in_quick_edit' => false,
      'meta_box_cb'        => false
    )
  );


  // Create "BioClub Projects"
  register_post_type( 'bioclub-project',
    array(
      'labels'             => array(
        'name'             => __( 'Projects' ),
        'singular_name'    => __( 'Project' ),
      ),
      'public'             => false, // false -> Not shown in UI
      'hierarchical'       => false, // false -> Post, true -> Page
      'has_archive'        => true,
      'menu_icon'          => 'dashicons-admin-users',
      'rewrite'            => array('slug' => 'projects', 'with_front' => false),   // TODO Add Note to CODEC
      'supports'           => array('title', 'author')
    )
  );

  register_taxonomy(
    'bioclub-project-tags',
    'bioclub-project',
    array(
      'label'              => __( 'Project Tags' ),
      'hierarchical'       => false,
      'show_ui'            => true,
      'show_in_quick_edit' => false,
      'meta_box_cb'        => false
    )
  );

}

add_action( 'init', 'create_bioclub_post_types' );

?>