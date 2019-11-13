<?PHP
/*
 *
 */

// A HTML kódba begyazandó távoli elérési út, ahova a fájlok fel lesznek töltve, a végén / -el!
$remote_path="https://keprendeles.fotoplus.hu/public/upload/naptarkepek/2020/12_honapos/";


include('kozos.inc.php');


echo('<div class="row">').chr(13);
if ($handle = opendir($dir)) {

    while (false !== ($file = readdir($handle))) {
        if ($file != "." && $file != ".." && isJPG($dir.$file) != false) {

            $template=pathinfo($dir.'/'.$file, PATHINFO_FILENAME);

            echo (
              '<div class="col-sm-6 col-md-4 col-lg-3 gallery_album">'.chr(13)
                .'<a href="'.$remote_path.$file.'" class="wbGallery_image" data-wbgallery-albumtitle="Naptárminták" data-wbgallery-title="sheet-001.jpg" data-wbgallery-original="'.$remote_path.$file.'" data-wbgallery-large="'.$remote_path.$file.'" data-wbgallery-thumb="'.$remote_path.'_medium/'.$file.'" target="_blank">'.chr(13)
                .'<img src="'.$remote_path.'_th/'.$file.'" alt="'.$template.'">'.chr(13)
                .'</a>'.chr(13)
                .'<form style="clear:both;" method="POST" type="multipart/form-data" action="'.$form_action_target.'">'.chr(13)
                  .'<textarea style="display:none;" name="note" id="ProductNote">Minta: '.$template.'&#13;&#10;Méret:&#13;&#10;Darabszám: 1db&#13;&#10;</textarea>'.chr(13)
                  .'<input type="hidden" name="product" value="Naptár: '.$template.'" />'.chr(13)
                  .'<div style="width:100%; background-color:#000000; color: #FFFFFF; font-weight:bold; padding:3px 3px 3px 5px; margin-top:5px;">'.chr(13)
                    .'<div style="display:inline-block;">'.$template.'</div>'.chr(13)
                    .'<input style="background-color:#00c373; float:right; border:none;" type="submit" name="val" value="Kiv&aacute;laszt" />'.chr(13)
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
