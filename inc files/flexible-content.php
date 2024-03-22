<?php
$theme_dir = get_template_directory_uri();
if (have_rows('easy_content')) {
    $j = 1;
    while (have_rows('easy_content')) : the_row(); ?>
    <?php
    // Slider
    if(get_row_layout() == 'hoslider'):
        $secOption = get_sub_field('sec_stg');
        $title = $secOption['sec_title'];
        $extraClass = $secOption['extra_class'];
        $before = $secOption['before_cnt'];
        $after = $secOption['after_cnt'];
        $customCSS = $secOption['custom_css'];
        jkbssteelLoadSectionCSS(jkbssteelGetElement_ID($j), $secOption['cssdesktop'], $secOption['csstab'], $secOption['cssmobile'], $customCSS);
        echo '<div class="'.jkbssteelGetElementExtraClass($extraClass).'" id="'.jkbssteelGetElement_ID($j).'"><div class="container">';
            if($title){
                $align = $secOption['sec_align'];
                echo jkbssteel_get_section_title($title, $align);
            }
            echo '<div id="carouselExampleControls'.$j.'" class="default_silder carousel slide carousel-fade" data-bs-ride="carousel"><div class="carousel-inner">';
            $i=0;
            while ( have_rows('slider_repeat') ) :the_row();
                $img = get_sub_field('slider_image');
                if($i<1){$active = 'active';}else{$active = '';}
                echo '<div class="carousel-item '.$active.'">
                        <img src="'.$img['url'].'" alt="'.$img['alt'].'">
                    </div>';
                $i++;
            endwhile;
        echo '</div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls'.$j.'" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls'.$j.'" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        </div></div></div>';
    endif;
    ?>

    <?php
    // Multi Column
    if( get_row_layout() == 'multi_column' ):
        $secOption = get_sub_field('sec_stg');
        $title = $secOption['sec_title'];
        $extraClass = $secOption['extra_class'];
        $before = $secOption['before_cnt'];
        $after = $secOption['after_cnt'];
        $customCSS = $secOption['custom_css'];
        jkbssteelLoadSectionCSS(jkbssteelGetElement_ID($j), $secOption['cssdesktop'], $secOption['csstab'], $secOption['cssmobile'], $customCSS); ?>
        <section class="<?=jkbssteelGetElementExtraClass($extraClass)?>" id="<?=jkbssteelGetElement_ID($j)?>">
            <div class="container">
                <?php
                if($title){
                    $align = $secOption['sec_align'];
                    echo jkbssteel_get_section_title($title, $align);
                }
                if($before){
                    echo '<div class="bss_beforeSection">'. apply_filters('the_content', $before) .'</div>';
                }
                ?>
                <div class="row">
                <?php
                $column_no = get_sub_field('no_of_column');
                $content = get_sub_field('multi_content');
                $one_column = $content['one_column'];
                if ($column_no == 1){
                    echo '<div class="col-md-12">'.$one_column.'</div>';
                }elseif ($column_no == 2) {
                    $two_column = $content['two_column'];
                    $column_width = get_sub_field('two_column_width');
                    if($column_width == '1-1'){
                        echo '<div class="col-md-6">'.$one_column.'</div><div class="col-md-6">'.$two_column.'</div>';
                    }elseif ($column_width == '1-2') {
                        echo '<div class="col-md-4">'.$one_column.'</div><div class="col-md-8">'.$two_column.'</div>';
                    }else{
                        echo '<div class="col-md-8">'.$one_column.'</div><div class="col-md-4">'.$two_column.'</div>';
                    }
                }elseif ($column_no == 3) {
                    $two_column = $content['two_column'];
                    $three_column = $content['three_column'];
                    $column_width = get_sub_field('three_column_width');
                    if($column_width == '1-1-1'){
                        echo '<div class="col-md-4">'.$one_column.'</div>
                        <div class="col-md-4">'.$two_column.'</div>
                        <div class="col-md-4">'.$three_column.'</div>';
                    }elseif ($column_width == '1-1-2') {
                        echo '<div class="col-md-3">'.$one_column.'</div>
                        <div class="col-md-3">'.$two_column.'</div>
                        <div class="col-md-6">'.$three_column.'</div>';
                    }elseif ($column_width == '1-2-1') {
                        echo '<div class="col-md-3">'.$one_column.'</div>
                        <div class="col-md-6">'.$two_column.'</div>
                        <div class="col-md-3">'.$three_column.'</div>';
                    }else{
                        echo '<div class="col-md-6">'.$one_column.'</div>
                        <div class="col-md-3">'.$two_column.'</div>
                        <div class="col-md-3">'.$three_column.'</div>';
                    }
                }else{
                    $two_column = $content['two_column'];
                    $three_column = $content['three_column'];
                    $four_column = $content['four_column'];
                    echo '<div class="col-md-3">'.$one_column.'</div>
                        <div class="col-md-3">'.$two_column.'</div>
                        <div class="col-md-3">'.$three_column.'</div>
                        <div class="col-md-3">'.$four_column.'</div>';
                }
                ?>
                </div>
                <?php
                if($after){
                    echo '<div class="bss_afterSection">'. apply_filters('the_content', $after) .'</div>';
                }
                ?>
            </div>
        </section>
    <?php endif; ?>

    <?php
    // default Editor
    if( get_row_layout() == 'default_editor' ):
        $secOption = get_sub_field('sec_stg');
        $title = $secOption['sec_title'];
        $extraClass = $secOption['extra_class'];
        $before = $secOption['before_cnt'];
        $after = $secOption['after_cnt'];
        $customCSS = $secOption['custom_css'];
        jkbssteelLoadSectionCSS(jkbssteelGetElement_ID($j), $secOption['cssdesktop'], $secOption['csstab'], $secOption['cssmobile'], $customCSS);
        echo '<section class="defualtSection '.jkbssteelGetElementExtraClass($extraClass).'" id="'.jkbssteelGetElement_ID($j).'">';
        echo '<div class="container">';
            if($title){
                $align = $secOption['sec_align'];
                echo jkbssteel_get_section_title($title, $align);
            }
            while ( have_posts() ) : the_post();
                the_content();
            endwhile;
            echo '</div></section>';
    endif;
    ?>

    <?php
    // Tab
    if( get_row_layout() == 'tab_option' ):
        $secOption = get_sub_field('sec_stg');
        $title = $secOption['sec_title'];
        $extraClass = $secOption['extra_class'];
        $before = $secOption['before_cnt'];
        $after = $secOption['after_cnt'];
        $customCSS = $secOption['custom_css'];
        jkbssteelLoadSectionCSS(jkbssteelGetElement_ID($j), $secOption['cssdesktop'], $secOption['csstab'], $secOption['cssmobile'], $customCSS);
        echo '<section class="simple-tab '.jkbssteelGetElementExtraClass($extraClass).'" id="'.jkbssteelGetElement_ID($j).'">
            <div class="container">';
                if($title){
                    $align = $secOption['sec_align'];
                    echo jkbssteel_get_section_title($title, $align);
                }
                if( have_rows('tab_outer') ){
                    echo '<div class="inner_tab">';
                    $i=1;
                    $btn_option = '<ul class="nav nav-tabs" id="myTab'.$j.'" role="tablist">';
                    $ctn_option = '<div class="tab-content" id="myTabContent'.$j.'">';
                    while( have_rows('tab_outer') ): the_row();
                        $btn = get_sub_field('button_text');
                        $id = strtolower(str_replace(' ', '', $btn)).$j.$i;
                        if ($i==1) {
                            $class = 'active';
                        }else{
                        $class = '';
                        }
                        $btn_option .= '<li class="nav-item">
                            <button class="nav-link '.$class.'" id="'.$id.'-tab" data-bs-toggle="tab" data-bs-target="#'.$id.'" type="button" role="tab" aria-controls="home" aria-selected="true">'.$btn.'</button>
                        </li>';
                        $content = get_sub_field('tab_content');
                        $ctn_option .= '<div class="tab-pane fade show '.$class.'" id="'.$id.'" role="tabpanel" aria-labelledby="'.$id.'-tab">'.$content.'</div>';
                        $i++;
                    endwhile;
                    $btn_option .= '</ul>';
                    $ctn_option .= '</div>';
                    echo $btn_option;
                    echo $ctn_option;
                    echo '</div>';
                }
            echo '
            </div>
        </section>';
    endif; ?>

    <?php
    // Shortcode
    if( get_row_layout() == 'shortcode' ):
        $secOption = get_sub_field('sec_stg');
        $title = $secOption['sec_title'];
        $extraClass = $secOption['extra_class'];
        $before = $secOption['before_cnt'];
        $after = $secOption['after_cnt'];
        $customCSS = $secOption['custom_css'];
        jkbssteelLoadSectionCSS(jkbssteelGetElement_ID($j), $secOption['cssdesktop'], $secOption['csstab'], $secOption['cssmobile'], $customCSS); ?>
        <section class="<?=jkbssteelGetElementExtraClass($extraClass)?>" id="<?=jkbssteelGetElement_ID($j)?>">
            <div class="container">
                <?php
                if($title){
                    $align = $secOption['sec_align'];
                    echo jkbssteel_get_section_title($title, $align);
                }
                if($before){
                    echo '<div class="bss_beforeSection">'. apply_filters('the_content', $before) .'</div>';
                }
                $formCode = get_sub_field('scode');
                if($formCode){
                    echo do_shortcode($formCode);
                }
                if($after){
                    echo '<div class="bss_afterSection">'. apply_filters('the_content', $after) .'</div>';
                }
                ?>
            </div>
        </section>
    <?php endif; ?>

    <?php
    // Accordion [FAQ]
    if( get_row_layout() == 'accordions' ):
        $secOption = get_sub_field('sec_stg');
        $title = $secOption['sec_title'];
        $extraClass = $secOption['extra_class'];
        $before = $secOption['before_cnt'];
        $after = $secOption['after_cnt'];
        $customCSS = $secOption['custom_css'];
        jkbssteelLoadSectionCSS(jkbssteelGetElement_ID($j), $secOption['cssdesktop'], $secOption['csstab'], $secOption['cssmobile'], $customCSS);?>
        <section class="<?=jkbssteelGetElementExtraClass($extraClass)?>" id="<?=jkbssteelGetElement_ID($j)?>">
            <div class="container">
                <?php
                if($title){
                    $align = $secOption['sec_align'];
                    echo jkbssteel_get_section_title($title, $align);
                }
                if($before){
                    echo '<div class="bss_beforeSection">'. apply_filters('the_content', $before) .'</div>';
                }
                $expendedItems = get_sub_field('expendedItems');
                if($expendedItems){
                    $expendedItems = explode (",", $expendedItems);
                }else{
                    $expendedItems = array();
                }
                $accrodionItems = get_sub_field('accordion_list');
                if($accrodionItems){
                    echo '<div class="bss_accordion" id="accordionExample'.$j.'">';
                    $i=1;
                    foreach($accrodionItems as $item){
                        $title =$item['acc_title'];
                        $content =$item['acc_content'];
                        $id = 'accordionExample'.$j;
                        if($expendedItems){
                            if(in_array($i, $expendedItems)){
                                $class = ' show';
                                $collapsed = '';
                                $expanded = 'true';
                            }else{
                                $class = '';
                                $collapsed = ' collapsed';
                                $expanded = 'false';
                            }
                        }else{
                            $class = '';
                            $collapsed = ' collapsed';
                            $expanded = 'false';
                        }
                        ?>
                        <div class="accordion-item">
                            <h3 class="accordion-header<?=$collapsed?>" id="flush-heading<?=$j.$i?>" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?=$j.$i?>" aria-expanded="<?=$expanded?>" aria-controls="flush-collapse<?=$j.$i?>" role="button"><?=$title?></h3>
                        
                            <div id="flush-collapse<?=$j.$i?>" class="accordion-collapse collapse<?=$class?>" aria-labelledby="flush-heading<?=$j.$i?>" data-bs-parent="#<?=$id?>">
                                <div class="accordion-body"><?=$content?></div>
                            </div>
                        </div>
                        <?php $i++;
                    }
                    echo '</div>';
                }
                if($after){
                    echo '<div class="bss_afterSection">'. apply_filters('the_content', $after) .'</div>';
                }
                ?>
            </div>
        </section>
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
