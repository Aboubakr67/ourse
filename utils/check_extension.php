<?php

// Fonction qui vérifie si l'extension et le type MIME correspondent à une image
function check_extension_image($extension, $mime_type)
{
    $image_extensions = array(
        ".jpg" => "image/jpeg",
        ".jpeg" => "image/jpeg",
        ".png" => "image/png",
        ".gif" => "image/gif",
        ".bmp" => "image/bmp",
        ".tiff" => "image/tiff"
    );

    return isset($image_extensions[$extension]) && $image_extensions[$extension] === $mime_type;
}

?>
