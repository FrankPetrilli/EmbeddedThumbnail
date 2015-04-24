<?php
function thumbnail($filename, $thumbWidth = 100) {
    
    $img = imagecreatefromfile($filename);
    $width = imagesx($img);
    $height = imagesy($img);

    $new_width = $thumbWidth;
    $new_height = floor( $height * ( $thumbWidth / $width ) );

    $tmp_img = imagecreatetruecolor( $new_width, $new_height );

    imagecopyresized( $tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height );

    // Capture output.
    ob_start();
    imagepng($tmp_img);
    $image_data = ob_get_contents();
    ob_end_clean();

    return "data:image/png;base64," . base64_encode($image_data);
}

function imagecreatefromfile( $filename ) {
    if (!file_exists($filename)) {
        throw new InvalidArgumentException('File "' . $filename . '" not found.');
    }
    switch ( strtolower( pathinfo( $filename, PATHINFO_EXTENSION ))) {
    case 'jpeg':
    case 'jpg':
        return imagecreatefromjpeg($filename);
        break;

    case 'png':
        return imagecreatefrompng($filename);
        break;

    case 'gif':
        return imagecreatefromgif($filename);
        break;

    default:
        throw new InvalidArgumentException('File "' . $filename . '" is not valid jpg, png or gif image.');
        break;
    }
}
?>
