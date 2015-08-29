<?php
/**
 * Created by PhpStorm.
 * User: HiepLuong
 * Date: 12/27/14
 * Time: 2:14 PM
 */

namespace WebPlatform\AseagleBundle\Services;


class ImageHelper {

    protected  $image_source_path;

    public function __construct($kernel)
    {
        $this->image_source_path = $kernel->getContainer()->getParameter('image_source_path');
    }

    public function generate_image_url($str_images) {
        $root = $this->image_source_path;
        $result = array();
        if(isset($str_images) && $str_images != ""){
            $images = explode(";", $str_images);
            foreach ($images as &$image) {
                $filename = basename($image);
                $dirname = dirname($image);
                array_push($result, array(
                    "name" => $filename,
                    "size" => 0,
                    "type" => "image/jpeg",
                    "dir" => $dirname,
                    "url" => $root.$image,
                    "smallUrl" => $root.$dirname."/small/".$filename,
                    "thumbnailUrl" => $root.$dirname."/thumbnail/".$filename,
                    "deleteUrl" => $root.$image,
                    "deleteType" => "DELETE"
                ));
            }
        }
        return $result;
    }

    public function generate_thumb_image_url($str_images, $root) {

        $result = '';
        if(isset($str_images) && $str_images != ""){
            $images = explode(";", $str_images);
            foreach ($images as &$image) {
                $filename = basename($image);
                $dirname = dirname($image);
                if ($result == ''){
                $result = $result.($this->image_source_path.$dirname."/thumbnail/".$filename);
                }else{
                    $result = $result.','.($this->image_source_path.$dirname."/thumbnail/".$filename);
                }
            }
        }
        return $result;
    }

    public function generate_small_image_url($str_images, $root) {

        $result = '';
        if(isset($str_images) && $str_images != ""){
            $images = explode(";", $str_images);
            foreach ($images as &$image) {
                $filename = basename($image);
                $dirname = dirname($image);
                if ($result == ''){
                    $result = $result.($this->image_source_path.$dirname."/small/".$filename);
                }else{
                    $result = $result.','.($this->image_source_path.$dirname."/small/".$filename);
                }
            }
        }
        return $result;
    }
    public function generate_one_small_image_url($str_images, $root) {

        $result = '';
        if(isset($str_images) && $str_images != ""){
            $images = explode(";", $str_images);
            $result = $result.($this->image_source_path.dirname($images[0])."/small/".basename($images[0]));
        }
        return $result;
    }

    public function generate_one_large_image_url($str_images) {

        $result = '';
        if(isset($str_images) && $str_images != ""){
            $images = explode(";", $str_images);
            $result = $result.($this->image_source_path.dirname($images[0])."/".basename($images[0]));
        }
        return $result;
    }


} 