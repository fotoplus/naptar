<?PHP
/*
 *
 */

// A HTML kódba begyazandó távoli elérési út, ahova a fájlok fel lesznek töltve, a végén / -el!
$remote_path="https://keprendeles.fotoplus.hu/public/upload/naptarkepek/2024/";


include('kozos.inc.php');

// Betöltjük a GD könyvtárat
if (!extension_loaded('gd')) {
  die('A GD könyvtár nincs telepítve a szerveren. Telepítse, hogy működjön a képgenerálás.');
}

echo('<div class="row" id="lightGallery">').chr(13);
if ($handle = opendir($dir)) {
  while (false !== ($file = readdir($handle))) {
      if ($file != "." && $file != ".." && isJPG($dir.$file) != false) {
          $template = pathinfo($dir.'/'.$file, PATHINFO_FILENAME);

          // Új thumbnail kép neve és elérési útja
          $thumbnail_path = $dir.'_th/'.strtolower($file);
          $thumbnail_url = $remote_path.'_th/'.strtolower($file);

          // Ellenőrizzük, hogy a thumbnail kép még nem létezik
          if (!file_exists($thumbnail_path)) {
              // Eredeti kép betöltése
              $original_image = imagecreatefromjpeg($dir.$file);
              $original_width = imagesx($original_image);
              $original_height = imagesy($original_image);

              // Új thumbnail kép létrehozása 150x150 méretben
              $thumbnail_width = 150;
              $thumbnail_height = 150;
              $thumbnail_image = imagecreatetruecolor($thumbnail_width, $thumbnail_height);

              // Szürke háttér létrehozása
              $background_color = imagecolorallocate($thumbnail_image, 209, 209, 209); // #d1d1d1
              imagefill($thumbnail_image, 0, 0, $background_color);

              // Thumbnail kép középre igazítása arányosan
              if ($original_width > $original_height) {
                  $new_width = $thumbnail_width;
                  $new_height = $original_height * ($thumbnail_width / $original_width);
              } else {
                  $new_height = $thumbnail_height;
                  $new_width = $original_width * ($thumbnail_height / $original_height);
              }

              $x_offset = ($thumbnail_width - $new_width) / 2;
              $y_offset = ($thumbnail_height - $new_height) / 2;

              imagecopyresampled($thumbnail_image, $original_image, $x_offset, $y_offset, 0, 0, $new_width, $new_height, $original_width, $original_height);

              // Thumbnail kép mentése
              imagejpeg($thumbnail_image, $thumbnail_path);
          }

          echo (
            '<div class="col-sm-6 col-md-4 col-lg-3 gallery_album">'.chr(13)
              .'<a href="'.$remote_path.strtolower($file).'" class="wbGallery_image" data-wbgallery-albumtitle="Naptárminták" data-wbgallery-title="'.$template.'" data-wbgallery-original="'.$remote_path.$file.'" data-wbgallery-large="'.$remote_path.$file.'" data-wbgallery-thumb="'.$thumbnail_url.'" data-lightbox="lightbox_" target="_blank">'.chr(13)
              .'<img src="'.$thumbnail_url.'" alt="'.$template.'">'.chr(13)
              .'</a>'.chr(13)
              .'<form style="clear:both;" method="POST" type="multipart/form-data" action="'.$form_action_target.'">'.chr(13)
                .'<textarea style="display:none;" name="note" id="ProductNote">Minta: '.$template.'&#13;&#10;Méret: '.substr($template, -4, 2).'x'.substr($template, -2).'&#13;&#10;Darabszám: 1db&#13;&#10;</textarea>'.chr(13)
                .'<input type="hidden" name="product" value="Naptár: '.$template.'" />'.chr(13)
                .'<div style="width:100%; background-color:#000000; color: #FFFFFF; font-weight:bold; padding:3px 3px 3px 5px; margin-top:5px;">'.chr(13)
                  .'<div style="display:inline-block;">'.$template.'</div>'.chr(13)
                  .'<input style="background-color:#00c373; float:right; border:none;" type="submit" name="val" value="Kiválaszt" />'.chr(13)
                .'</div>'.chr(13)
              .'</form>'.chr(13)
            .'</div>'.chr(13)
            .chr(13)
          );
      }
  }
  closedir($handle);
}

echo ('</div>').chr(13);

// Az egymásmellé rendezés megszüntetése
echo ('<div class="clear"></div>').chr(13);





?>
