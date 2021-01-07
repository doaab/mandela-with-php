<?php

/**
 * Created by PhpStorm.
 * User: Doaa
 * Date: 02/01/21
 * Time: 11:18 م
 */
class Mandela
{


    /**
     * @param $size: integer value size of image should be between 10 to 1000
     * @param $points: integer value number of points should be between 10 ti 100
     */

    public static function check_in_data($size,$points){
        if($size < 100 || $size > 1024){
            echo "please , Inter size number between 100 to 1000";
            return false;
        // Test the number of points
        }elseif($points < 1 || $points > 100){
            echo "please , Inter points number between 10 to 100";
            return false;
        }else{
            return true;
        }
    }

    /**
     * @param $size
     * @param $points
     */
    public static function mandela_img($size, $points){
        if(self::check_in_data($size,$points)){
            //Set the position of the circle by radius
            $radius = $size/2;
            // Find the number of degrees between points (in radians)
            $degrees = deg2rad(360/$points);
            // The offset used to push the whole drawing into the first quadrant,
            // normally put it centered on 0,0
            $offset = $size/2;
            // Create a square image
            $im = imagecreatetruecolor($size, $size);
            // Set the background color white
            $background = imagecolorallocate($im, 255, 255, 255);
            imagefill($im, 0, 0, $background);
            // Set the color of the lines black
            $lines = imagecolorallocate($im, 0, 0, 0);
            // Until we have made our way around the circle
            while($angle < deg2rad(360)){
                // Increase the angle to point to the next point
                $angle = $angle + $degrees;
                // Find the new points
                $x = $radius * cos($angle) + $offset;
                $y = $radius * sin($angle) + $offset;
                // Add those points to the array of points
                $pointsArr[] = array($x, $y);
            }
            // For each point
            while($from = array_pop($pointsArr)){
                // For each point that has not yet been plotted
                foreach($pointsArr as $to){
                    // Draw a line
                    imagerectangle($im, $from[0], $from[1], $to[0], $to[1], $lines);
                    imageline($im, $from[0], $from[1], $to[0], $to[1], $lines);
                }
            }
            // Output the image
            header ("Content-type: image/png");
            imagepng($im);
            // Clear the image form memory
            imagedestroy($im);
        }
    }

    /**
     * @param $size: integer value size of image should be between 10 to 1000
     * @param $points: integer value number of points should be between 10 ti 100
     */
    public static function mandela_img_not_Symmetrically($size, $points){

        if(self::check_in_data($size,$points)){
            $radius = $size/2;
            $degrees = deg2rad(180/$points);
            $offset = $size/2;

            // Create the image
            $im = imagecreatetruecolor($size, $size);
            $background = imagecolorallocate($im, 255, 255, 255);
            imagefill($im, 0, 0, $background);
            $lines = imagecolorallocate($im, 0, 0, 0);

            while($angle < deg2rad(100)){
                $angle = $angle + $degrees;

                $x = $radius * cos($angle) + $offset;
                $y = $radius * sin($angle) + $offset;
                $pointsArr[] = array($x, $y);
            }
            // For each point
            while($from = array_pop($pointsArr)){
                foreach($pointsArr as $to){
                    // Draw a line
                    imageline($im, $from[0], $from[1], $to[0], $to[1], $lines);
                }
            }

            $radius = $size/2;
            $degrees = deg2rad(360/$points);
            $offset = $size/2;

            // Create the image
            $im = imagecreatetruecolor($size, $size);
            $background = imagecolorallocate($im, 255, 255, 255);
            imagefill($im, 0, 0, $background);
            $lines = imagecolorallocate($im, 0, 0, 0);


            while($angle < deg2rad(360)){
                $angle = $angle + $degrees;

                $x = $radius * cos($angle) + $offset;
                $y = $radius * sin($angle) + $offset;
                $pointsArr[] = array($x, $y);
            }

            while($from = array_pop($pointsArr)){
                foreach($pointsArr as $to){
                    // Draw a line
                    imageline($im, $from[0], $from[1], $to[0], $to[1], $lines);
                }
            }

            // Output the image
            header ("Content-type: image/png");
            imagepng($im);
            // Clear the image form memory
            imagedestroy($im);
        }
    }
    /**
     * @param $size: integer value size of image should be between 10 to 1000
     * @param $points: integer value number of points should be between 10 ti 100
     */
    public static function mandela_img_crazy($size,$points){
        if(self::check_in_data($size,$points)){

            $radius = $size/2;
            $degrees = deg2rad(360/$points);
            $offset = $size/2;

            // Create the image
            $im = imagecreatetruecolor($size, $size);
            $background = imagecolorallocate($im, 255, 255, 255);
            imagefill($im, 0, 0, $background);
            $lines = imagecolorallocate($im, 0, 0, 0);

            while($angle < deg2rad(360)){
                $angle = $angle + $degrees;

                $x = $radius * cos($angle) + $offset;
                $y = $radius * sin($angle) + $offset;
                $pointsArr[] = array($x, $y);
            }
            while($from = array_pop($pointsArr)){
                foreach($pointsArr as $to){
                    imagerectangle($im, 0, 0, $size-1, $size-1, $lines);

                    $center_x = (int)$size/2;
                    $center_y = (int)$size/2;

                    $angle = 0;
                    $radius = 0;
                    while($radius <= $size ) {
                        imagearc($im, $center_x, $center_y, $radius,
                            $radius, $angle-5, $angle, $lines);
                        $angle += 5;
                        $radius++;
                    }
                    imagerectangle($im, 0, 0, $size-1, $size-1, $lines);
                    imagefilledarc($im,$center_x-20,$center_y-20,$size/2,$size/2,0,90,$lines,IMG_ARC_PIE);
                    imagefilledarc($im,$center_x+20,$center_y+20,$size/2,$size/2,180,-90,$lines,IMG_ARC_PIE);

                    imagefilledarc($im,$center_x,$center_y,$size/3,$size/3,-90,0,$lines,IMG_ARC_PIE);
                    imagefilledarc($im,$center_x,$center_y,$size/3,$size/3,90,180,$lines,IMG_ARC_PIE);
                    imagefilledarc($im,$center_x,$center_y,$size/2,$size/2,-70,-20,$lines,IMG_ARC_PIE);
                    imagefilledarc($im,$center_x,$center_y,$size/2,$size/2,110, 160,$lines,IMG_ARC_PIE);
                    imageline($im, $from[0], $from[1], $to[0], $to[1], $lines);
                }
            }

            header ("Content-type: image/png");
            imagepng($im);
            imagedestroy($im);
        }
    }

}