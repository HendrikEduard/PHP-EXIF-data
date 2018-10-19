<?php
$dir = 'images/';
$files = scandir($dir);

$ext_list = ['jpg', 'png'];

foreach($files as $file) {
  $stol = strtolower($file);
  $parse = explode(".", $stol);
  $ext = end($parse);
  if(in_array($ext, $ext_list)) {
    $exif_data = exif_read_data($dir.$file);
    $photos[] = [
      'FileName'      =>$exif_data['FileName'],
      'Model'         =>$exif_data['Model'],
      'ExposureTime'  =>$exif_data['ExposureTime'],
      'FNumber'       =>$exif_data['FNumber'],
      'ISOSpeedRatings'=>$exif_data['ISOSpeedRatings'],
      'FocalLength'   =>$exif_data['FocalLength']
    ];
  }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>exif</title>
    <link rel="stylesheet" href="assets/css/custom.css">
  </head>
  <body>
    <div class="container">
      <h1 class="headline">Photos with the Camera's EXIF data!</h1>
      <div class="row">
    <?php foreach($photos as $photo):?>
        <div class="col-xs-12 col-sm-6 col-med-4 col-lg-4">
          <img src="<?=$dir.$photo['FileName']?>" alt="<?=$dir.$photo['FileName']?>" class="img-responsive">
          <div class="thumbnail">
            <ul>
            <li><label>FileName: &nbsp;</label><?=$photo['FileName']?></li>
            <li><label>Model: &nbsp;</label><?=$photo['Model']?></li>
            <li><label>ExposureTime: &nbsp;</label><?=$photo['ExposureTime']?></li>
            <li><label>FNumber: &nbsp;</label><?=$photo['FNumber']?></li>
            <li><label>ISOSpeedRatings: &nbsp;</label><?=$photo['ISOSpeedRatings']?></li>
            <li><label>FocalLength: &nbsp;</label><?=$photo['FocalLength']?></li>
            </ul>
          </div>
        </div> 
    <?php endforeach;?>
      </div>
    </div>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>