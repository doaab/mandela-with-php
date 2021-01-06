<?php
/**
 * Created by PhpStorm.
 * User: Doaa
 * Date: 02/01/21
 * Time: 11:18 م
 */
require 'Mandela.php';

//$img = Mandela::mandela_img(500,20);
//$img = Mandela::mandela_img_not_Symmetrically(500,20);
//$img = Mandela::mandela_img_with_style(500,20);
if (isset($_GET['size'])){
    $size= intval($_GET['size']);
}else{
    $size = 500;
}
if (isset($_GET['points'])){
    $points= intval($_GET['points']);
}else{
    $points = 20;
}
if (isset($_GET['submit'])){
    switch ($_GET['submit']){
        case 'mandela_img_Symmetrically':
            $img = Mandela::mandela_img($size,$points);
            break;
        case 'mandela_img_not_Symmetrically':
            $img = Mandela::mandela_img_not_Symmetrically($size,$points);
            break;
        case 'mandela_img_crazy':
            $img = Mandela::mandela_img_crazy($size,$points);
            break;
        default :
            $img = Mandela::mandela_img($size,$points);

    }

}
?>
<form action="" METHOD="get">
    <input type="text" name="size" placeholder="Inter number between 100 to 1024">
    <input type="text" name="points" placeholder="Inter number between 10 to 100">
    <input type="submit" name="submit" value="mandela_img_Symmetrically">
    <input type="submit" name="submit" value="mandela_img_not_Symmetrically">
    <input type="submit" name="submit" value="mandela_img_crazy">
</form>
