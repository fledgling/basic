<?php/** * Image helper functions *  * @author Chris * @link http://con.cept.me */class ImageHelper {    /**     * Directory to store thumbnails     * @var string      */    const THUMB_DIR = '.tmb';    /**     * Create a thumbnail of an image and returns relative path in webroot     * the options array is an associative array which can take the values     * quality (jpg quality) and method (the method for resizing)     *     * @param int $width     * @param int $height     * @param string $img     * @param array $options     * @return string $path     */    public static function thumb($width, $height, $img, $options = null) {        $url=explode('/',$img);        for($i=0;$i<2;$i++){            unset($url[$i]);        }        $img='/'.implode('/',$url);        if (!file_exists($img)) {            $img = str_replace('\\', '/', YiiBase::getPathOfAlias('webroot') . $img);                if (!file_exists($img)) {                    $url=explode('/',$img);                    $num=count($url);                    for($i=0;$i<$num;$i++){                        $url[$i]=urldecode($url[$i]);                    }                    $img=implode('/',$url);                    if (!file_exists($img)) {                        return $img='can not find image';                    }                }        }        // Jpeg quality        $quality = 80;        // Method for resizing        $method = 'adaptiveResize';        if ($options) {            extract($options, EXTR_IF_EXISTS);        }        $pathinfo = pathinfo($img);        $thumb_name = "thumb_" . $pathinfo['filename'] . '_' . $method . '_' . $width . '_' . $height . '.' . $pathinfo['extension'];        $thumb_path = $pathinfo['dirname'] . '/' . self::THUMB_DIR . '/';        if (!file_exists($thumb_path)) {//            echo $thumb_path;//            exit;            mkdir($thumb_path, 0777);        }        if (!file_exists($thumb_path . $thumb_name) || filemtime($thumb_path . $thumb_name) < filemtime($img)) {            Yii::import('ext.phpThumb.PhpThumbFactory');            $options = array('jpegQuality' => $quality);            $thumb = PhpThumbFactory::create($img, $options);            $thumb->{$method}($width, $height);            $thumb->save($thumb_path . $thumb_name);        }        $relative_path = str_replace(YiiBase::getPathOfAlias('webroot'), '', $thumb_path . $thumb_name);        return $relative_path;    }}