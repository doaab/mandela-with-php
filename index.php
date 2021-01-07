<?php
/**
 * Created by PhpStorm.
 * User: Doaa
 * Date: 02/01/21
 * Time: 11:18 م
 */
require 'Mandela.php';

if (isset($_GET['size'])){$size= intval($_GET['size']);}else{$size = 500;}
if (isset($_GET['points'])){$points= intval($_GET['points']);}else{$points = 20;}
if (isset($_GET['submit'])){
    switch ($_GET['submit']){
        case 'mandela_img_Symmetrically':
            /** @noinspection PhpVoidFunctionResultUsedInspection */
            $img = Mandela::mandela_img($size,$points);
            break;
        case 'mandela_img_not_Symmetrically':
            /** @noinspection PhpVoidFunctionResultUsedInspection */
            $img = Mandela::mandela_img_not_Symmetrically($size,$points);
            break;
        case 'mandela_img_crazy':
            /** @noinspection PhpVoidFunctionResultUsedInspection */
            $img = Mandela::mandela_img_crazy($size,$points);
            break;
        default :
            /** @noinspection PhpVoidFunctionResultUsedInspection */
            $img = Mandela::mandela_img($size,$points);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>-->
    <script src="vue.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" ></script>
    <link rel="stylesheet" href="mystyle.css">
</head>
<body>
<div class="container" onclick="onclick">
    <div class="top"></div>
    <div class="bottom"></div>
    <div class="center">

        <form id="app" action="" METHOD="get">

            <div class="input-group mb-3">
                <!--                <label for="exampleInputEmail1" class="form-label col-md-2">Size </label>-->
                <input type="text" @keyup="size_point()"   class="form-control col-md-8" v-model="size" name="size"
                       placeholder="(Size) Inter number between 100 to 1024">
            </div>
            <div class="input-group mb-3">
                <input type="text" @keyup="size_point()"  class="form-control col-md-8" v-model="points" name="points"
                       placeholder="(Points) Inter points between 10 to 100">
            </div>

            <div class="row">
                <div class="form-style  align-self-end">
                    <div class="input-group col-md-8 mb-3 col align-self-end">
                        <button type="submit"  class="form-control col-md-8 btn btn-outline-secondary" name="submit" value="mandela_img_Symmetrically" >
                            Symmetrically
                        </button>

                        <button type="submit"  class="form-control col-md-8 btn btn-outline-secondary" name="submit" value="mandela_img_not_Symmetrically" >
                            Not Symmetrically
                        </button>
                        <button type="submit"  class="form-control col-md-8 btn btn-outline-secondary" name="submit" value="mandela_img_crazy" >
                            crazy
                        </button>

                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>