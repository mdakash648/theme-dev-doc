<?php
// Check if the photo gallery exists
$images = get_field('photo_gallery', 'option');

if( $images ): ?>
    <div class="gallery">
        <?php foreach( $images as $image ): ?>
            <figure class="gallery-item">
                <img src="<?php echo esc_url($image['sizes']['medium']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                <figcaption><?php echo esc_html($image['caption']); ?></figcaption>
            </figure>
        <?php endforeach; ?>
    </div>
<?php endif; ?>