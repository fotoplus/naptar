# naptar

HTML forráskód generálására a galéria alapú rendelési űrlapokhoz fájllista alapján.
A mappa nevét kategóriaként és a képeket csoportosítva jeleníti meg.

- Nem rekurzív fájl lista
- Csak jpg fájlok megjelenítése

---

## Rövid leírás

Ez a projekt lehetővé teszi HTML forráskód generálását a keprendeles.fotoplus.hu online naptárrendelési felületén történő naptárminta kiválasztásához. Az alkalmazás egy mappa struktúrát használ, és a képeket kategóriákba és csoportokba szervezi, így könnyen elérhetővé válnak az online rendeléshez.

Egyoldalas minták esetében a fájlnevek tartalmazzák a minta azonosítóját, például "[kollekció]-[minta]" formában (pl.: 01-023). Többoldalas minták esetében a mappanevek tartalmazzák a minta azonosítóját "[kollekció]-[első minta]-[utolsó minta]" formában (pl.: 07-001-012).

A kód automatikusan generál egy előnézeti képgalériát, valamint kinyeri a képek elérési útjait és egyéb információkat, amelyeket fel lehet használni a rendelési űrlap kitöltéséhez. A generált HTML forráskódot használhatja a naptárminta választáshoz.

## Használati utasítások

1. Helyezze el a képeket a "mappa" mappában. Az egyoldalas minták fájlnevei tartalmazzák a minta azonosítóját.
2. Futtassa a "lista_keszites_cak_1-1_minta.php" fájlt a böngészőben. Ez generálja a galériát és a generált HTML forráskódot.
3. Használja a generált HTML forráskódot a naptárminta választáshoz a keprendeles.fotoplus.hu oldalon.

## Technikai követelmények

- PHP telepítése a szerveren
- A GD könyvtár telepítése a PHP-ban (a thumbnail képek generálásához)
- Egy mappa a képeknek (a "mappa" mappában), amely tartalmazza az egyoldalas és többoldalas naptár mintákat.

## Megjegyzések

Ez a projekt nem rendelkezik grafikus felülettel és igényel némi technikai ismereteket a használathoz. A forráskódot a saját igényeihez igazíthatja, ha szükséges.

A PHP fájlok a "?raw" kérés esetén csak a forráskódot jelenítik meg szöveges formában.

Kérjük, vegye figyelembe, hogy a kód a képekkel együtt működik, és a képek helyes elrendezése a "mappa" mappában nagyon fontos a megfelelő működéshez.
