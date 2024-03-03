<?php
if (have_rows('easy_content')) {
    $j = 1;
    while (have_rows('easy_content')) : the_row(); 
?>

<?php if( get_row_layout() == 'personal_info' ): ?>

    <div class="personal-info">
        <p>Name: <?php the_sub_field('name_'); ?></p>
        <p>Number: <?php the_sub_field('number'); ?></p>
        <p>Content: <?php the_sub_field('content'); ?></p>
    </div>
<?php endif;?>
<?php if( get_row_layout() == 'content_us' ): ?>

    <div class="contact-us">
        <p>Your Name: <?php the_sub_field('your_name'); ?></p>
        <p>Your Email: <?php the_sub_field('your_email'); ?></p>
        <p>Your Comment: <?php the_sub_field('your_comment'); ?></p>
    </div>
<?php endif;?>    
<?php if( get_row_layout() == 'social_media' ): ?>
    <a href="<?php echo get_sub_field('your_facebook_link')['url']; ?>" target="<?php echo get_sub_field('your_facebook_link')['target']; ?>"><?php echo get_sub_field('your_facebook_link')['title']; ?></a>
<?php endif; ?>

<?php
    $j++;
    endwhile;
} else {
    echo '<section class="defaultSection"><div class="container">';
    while (have_posts()) : the_post();
    the_content();
    endwhile;
    echo '</div></section>';
}
?>

<?php include 'inc/flexible-content.php'//connect flexible-content.php file in page.php and front-page.php?>