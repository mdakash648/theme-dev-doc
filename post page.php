<!--================================ 
    Normal post type posts display   
==================================-->
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <?php the_excerpt(); // Or the_content() for full post ?>
<?php endwhile; else : ?>
    <p>Sorry, no posts found.</p>
<?php endif; ?>



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
<?php endforeach; endif; 
wp_reset_postdata(); 
?>
