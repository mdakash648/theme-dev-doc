<?php 
$favicon = get_field('favicon', 'options');
$mainlogo = get_field('site_logo', 'options');
// echo "<pre>";
// print_r($mainlogo);
// echo "</pre>";
echo "My name is : ". $name;
?>

<?php 
    if(!empty($favicon['url'])){
        echo $favicon['url'];
    }else{
        echo (get_template_directory_uri()."/assets/image/home/logo.png");
    }
?>">

<?php 
    if(!empty($mainlogo['alt'])){
        echo $mainlogo['alt'];
    }else{
        echo 'logo';
    }
?>