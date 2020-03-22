<?php
/**
 * cntnd_image Class
 */
class CntndImage {

  public static function originalImage($image, $thumb, $extra_path=NULL){
    if ($thumb){
      $original_path = '/gross';
      if (!empty($extra_path)){
        $original_path='/'.$extra_path;
      }

      $path 	= substr($image,0,strrpos($image,'/'));

      $name 	= substr($image,strrpos($image,'/'));

      return $path.$original_path.$name;
    }
    return $image;
  }

  public static function image($image_source, $thumb, $extra_path=NULL){
    if (0 < strlen($image_source)) {
        $clientConfig = cRegistry::getClientConfig(cRegistry::getClientId());
        $filename = str_replace($clientConfig["upl"]["htmlpath"], $clientConfig["upl"]["path"], $image_source);
        list($imageWidth, $imageHeight) = getimagesize($filename);
        $image = new stdClass();
        $image->thumb = $image_source;
        $image->src = self::originalImage($image_source, $thumb, $extra_path);
        $image->alt = $imageDescription;
        $image->width = $imageWidth;
        $image->height = $imageHeight;
    } else {
        $image = NULL;
    }
    return $image;
  }

}
?>
