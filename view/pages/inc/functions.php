<?php



function success_msg($msg){
    return ('<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Sucess !</strong> '.$msg.'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>');
}

function error_msg($msg){
    return ('<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error !</strong> '.$msg.'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>');
}

function compress_image($image, $output_image, $compress_size){
  $allowed_extensions = array('jpg', 'jpeg', 'gif', 'png');

  $image_ext = getimagesize($image);
  $image_extension = $image_ext['mime'];
//  echo $image_extension = pathinfo($image, PATHINFO_EXTENSION);

  // if(array_key_exists($image_extension, $allowed_extensions)){

    if($image_extension == 'image/jpg' || $image_extension == 'image/jpeg'){
      $img = imagecreatefromjpeg($image);
     $compressed =  imagejpeg($img, $output_image, $compress_size);
     echo success_msg("Image uploaded");
    }else{
      // echo error_msg("Image no uploaded");
    }

    if($image_extension == 'image/png'){
      $img = imagecreatefrompng($image);
      imagejpeg($img, $output_image, $compress_size);
    echo success_msg("Image uploaded");

    }else{
      // echo error_msg("Image no uploaded");
    }

    if($image_extension == 'image/gif'){
      $img = imagecreatefromgif($image);
      imagejpeg($img, $output_image, $compress_size);
    echo success_msg("Image uploaded");

    }else{
      // echo error_msg("Image no uploaded");
    }


  // }else{
  //   echo error_msg('Uploaded Image extension is not allowed and not supported. Please upload jpg, jpeg or png images only !');
  // }

}


?>