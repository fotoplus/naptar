<?PHP
// A rendelési űrlap URL-je, ahova a érkeznünk kell
$form_action_target="https://keprendeles.fotoplus.hu/hu/kepkidolgozas/naptar-kartya#rendeles_leadas";


// Az esetleges hibák mutatása
ini_set('display_errors', "On");
ini_set('display_startup_errors', "On");
error_reporting(E_ALL);

// Gyorsítótárazás megakadályozása
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

// lista_keszites.php?raw esetén egyből forráskódot mutat
 if(isset($_SERVER['QUERY_STRING']) && $_SERVER['QUERY_STRING']=='raw') {
   header('Content-Type: text/plain');
 }

// Helyi mappa, ahol a képek vannak
$dir="mappa/";

function isJPG($file) {
  $path_parts = pathinfo($file);
  if (isset($path_parts['extension']) && strtolower($path_parts['extension']) == "jpg") {
    return true;
  } else {
    return false;
  }
}


?>
