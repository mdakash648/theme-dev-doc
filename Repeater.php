if you display normal text, image, or url using repeater than use this code
<?php if (have_rows('Parent_name', 'options')): ?>
    <?php while (have_rows('Parent_name', 'options')): the_row(); ?>
        
        <h1><?php the_sub_field('child_name'); ?></h1>
        
    <?php endwhile; ?> 
<?php endif; ?>


if you display normal text and fontawesome icon, using repeater than use this code
<?php if (have_rows('social_icon', 'options')): ?>
    <?php while (have_rows('social_icon', 'options')): the_row(); ?>
        <?php
            if(get_sub_field('icon') === "Facebook"){
                echo '<a href="'. get_sub_field('url').'" target="_blank"><i class="fa-brands fa-facebook-f fa-2xs"></i></a>';
            }
            elseif(get_sub_field('icon') === "Youtube"){
                echo '<a href="'. get_sub_field('url').'" target="_blank"><i class="fa-brands fa-youtube"></i></a>';
            }
            elseif(get_sub_field('icon') === "Whatsapp"){
                echo '<a href="'. get_sub_field('url').'" target="_blank"><i class="fa-brands fa-whatsapp"></i></a>';
            }
            elseif(get_sub_field('icon') === "Instagram"){
                echo '<a href="'. get_sub_field('url').'" target="_blank"><i class="fa-brands fa-instagram"></i></a>';
            }
            elseif(get_sub_field('icon') === "Wechat"){
                echo '<a href="'. get_sub_field('url').'" target="_blank"><i class="fa-brands fa-weixin"></i></a>';
            }
            elseif(get_sub_field('icon') === "twitter"){
                echo '<a href="'. get_sub_field('url').'" target="_blank"><i class="fa-brands fa-twitter"></i></i></a>';
            }
            elseif(get_sub_field('icon') === "linkedin"){
                echo '<a href="'. get_sub_field('url').'" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a>';
            }
            elseif(get_sub_field('icon') === "tumblr"){
                echo '<a href="'. get_sub_field('url').'" target="_blank"><i class="fa-brands fa-tumblr"></i></a>';
            }
        ?>
    <?php endwhile; ?> 
<?php endif; ?>




<!-- Repeater inside repeater print Normal -->
<?php $food_menu = get_field('food_menu', 'options');?>
<?php if ($food_menu) : ?> 
    <?php foreach ($food_menu as $category) : ?> 
        <h2><?php echo $category['menu_category_name']; ?></h2>

        <?php if ($category['menu_item_field']) : ?> 
            <ul>
                <?php foreach ($category['menu_item_field'] as $item) : ?> 
                    <li>
                        <?php if ($item['menu_item_left']) : ?> 
                            <?php echo $item['menu_item_left']; ?>
                        <?php endif; ?>

                        <?php if ($item['menu_item_left_price']) : ?> 
                            <?php echo ' - $' . $item['menu_item_left_price']; ?> 
                        <?php endif; ?>
                        <?php if ($item['menu_item_right']) : ?> 
                            <?php echo ' - ' . $item['menu_item_right']; ?>
                        <?php endif; ?>
                        <?php if ($item['menu_item_right_price']) : ?> 
                            <?php echo ' - $' . $item['menu_item_right_price']; ?>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?> 
    <?php endforeach; ?> 
<?php endif; ?> 

<?php $a_formatted = strtolower(str_replace(" ", "_", $a)) //convert id from normal text?>