# naptar


Generate HTML source code for gallery based ordering form by file list.
Use folder name as category and groupping images.

- Non recursive file listing
- Show only jpg files

---

HTML forráskód generálására a keprendeles.fotoplus.hu on-line naptárrendelési felületéhez naptárminta kiválasztásához.


A PHP-t futtató számítógép adott mappáját alapulvéve készít képgalériát. A *lista_keszites.php* egy oldalas mintáknál használható, ahol minden egyes kép egy külön választható minta.
A *lista_keszites_csoportokkal.php* esetében pedig a több oldalas naptárakhoz készíthetünk listát. Itt alpakkában 
helyezzük el a képeket, melysket mappánként csoportositva jelenit meg, és ezeket a csoportokat lehet kiválasztani.


**Elnevezés:**

  Egyoldalas és többoldlas minták esetében is a fájlnév neve megegyezik a minta számával: [kollekció]-[minta]
  *Pl.: 01-023*
  Többoldalas minták esetében a mappa neve megegyezik a minta számával: [kollekció]-[első minta]-[utolsó minta]
  *Pl.: 07-001-012*
