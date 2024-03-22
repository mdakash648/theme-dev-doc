<?php if( get_row_layout() == 'content_us' ): 
//dynamic css php start
$secOption = get_sub_field('sec_stg');
$title = $secOption['sec_title'];
$extraClass = myesptGetElementExtraClass($secOption['extra_class']);
$secId = myesptGetElement_ID($j);
$before = $secOption['before_cnt'];
$after = $secOption['after_cnt'];
$customCSS = $secOption['custom_css'];
//dynamic css php end

?>
<section class="<?php echo $extraClass?>" id = "<?php echo $secId //add css and id?>">
    <div class="contact-us container">
        <!-- title php and before content -->
        <?php if($title){
            $align = $secOption['sec_align'];echo myespt_get_section_title($title, $align);
        }
        if($before){
            echo '<div class="bss_beforeSection">'. apply_filters('the_content', $before) .'</div>';
            }?>

        <p>Your Name: <?php the_sub_field('your_name'); ?></p>
        <p>Your Email: <?php the_sub_field('your_email'); ?></p>
        <p>Your Comment: <?php the_sub_field('your_comment'); ?></p>
        
        <!-- After content -->
        <?php if($after){
            echo '<div class="bss_afterSection">'. apply_filters('the_content', $after) .'</div>';
            }?>
    </div>
</section>
<?php endif;?>  