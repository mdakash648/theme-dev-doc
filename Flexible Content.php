<?php if( have_rows('test', 'options') ): ?>

<?php while( have_rows('test', 'options') ): the_row(); ?>

    <?php if( get_row_layout() == 'personal_info' ): ?>

        <div class="personal-info">
            <p>Name: <?php the_sub_field('name_'); ?></p>
            <p>Number: <?php the_sub_field('number'); ?></p>
            <p>Content: <?php the_sub_field('content'); ?></p>
        </div>

    <?php elseif( get_row_layout() == 'content_us' ): ?>
        
        <div class="contact-us">
            <p>Your Name: <?php the_sub_field('your_name'); ?></p>
            <p>Your Email: <?php the_sub_field('your_email'); ?></p>
            <p>Your Comment: <?php the_sub_field('your_comment'); ?></p>
        </div>
        
        <?php elseif( get_row_layout() == 'social_media' ): ?>
        <a href="<?php echo get_sub_field('your_facebook_link')['url']; ?>" target="<?php echo get_sub_field('your_facebook_link')['target']; ?>"><?php echo get_sub_field('your_facebook_link')['title']; ?></a>
    <?php endif; ?>

<?php endwhile; ?>

<?php endif; ?>