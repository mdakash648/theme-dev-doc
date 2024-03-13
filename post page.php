<!--================================ 
    Normal post type posts display   
==================================-->
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <?php the_excerpt(); // Or the_content() for full post ?>
    <?php the_content(); ?> 
    <?php the_category(', '); ?>
    <?php the_tags(', '); ?>
    <?php the_post_thumbnail_url(); ?>
<?php endwhile; 
the_posts_pagination();
else : ?>
    <p>Sorry, no posts found.</p>
<?php endif; ?>

<!--=================================
    current page slug display
==================================-->

<?php
// Get the current queried object
$queried_object = get_queried_object();

// Get the slug of the queried object
$slug = $queried_object->slug;

// Display the slug
echo $slug;
?>


<!--=================================
    custom post type posts display 
==================================-->
<?php$args = array(
    'post_type' => 'project',
    'posts_per_page' => 6 // Adjust the number of projects to display
);
$project_query = new WP_Query($args);

if ($project_query->have_posts()) :
    while ($project_query->have_posts()) : $project_query->the_post(); ?>
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <?php the_content(); ?> 
    <?php endwhile;
    the_posts_pagination();
    wp_reset_postdata(); // Important: Reset query data after the loop
else :
    echo '<p>There are no projects to display.</p>';
endif;
?>

<!--================================
    if you order your posts 
==================================-->
<?php
$posts = get_posts(array(
    'posts_per_page'   => 3, 
    'meta_key'       => 'price', 
    'orderby'          => 'date',//data, price,title
    'order'            => 'DESC',//ASC, DESC
));

if ( $posts ) : foreach ( $posts as $post ) : setup_postdata( $post ); ?>
    <li>
        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    </li>
<?php endforeach; 
the_posts_pagination();
endif; 
wp_reset_postdata(); 
?>

<!--======================================
extract all categories from all post type 
=======================================-->

<?php
// Fetch categories for the post type 'project'. Replace 'category' with your custom taxonomy if different.
$categories = get_terms(array(
    'taxonomy' => 'category',
    'hide_empty' => false, // Change to false if you want to show empty categories
));

// Check if categories are found
if (!empty($categories) && !is_wp_error($categories)) {

    // Loop through each category
    foreach ($categories as $category) {

        echo '<a href="' . esc_url(get_category_link($category->term_id)) . '" alt="' . esc_attr(sprintf(__('View all posts in %s', 'textdomain'), $category->name)) . '">' . $category->name . '</a>';
    }
}
?>
<!--===========================================
extract custom taxonomy from current post type 
=============================================-->

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<?php 
$project_categories = get_the_terms( get_the_ID(), 'project_category' );
if ( ! empty( $project_categories ) && ! is_wp_error( $project_categories ) ){
    foreach(){
        
    }
}
?>

<?php endwhile; 
the_posts_pagination();
else : ?>
    <p>Sorry, no posts found.</p>
<?php endif; ?>