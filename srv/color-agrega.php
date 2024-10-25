<?php

require_once __DIR__ . "/../lib/php/ejecutaServicio.php";
require_once __DIR__ . "/../lib/php/recuperaTexto.php";
require_once __DIR__ . "/../lib/php/validaNombre.php";
require_once __DIR__ . "/../lib/php/validaHexa.php";
require_once __DIR__ . "/../lib/php/validaDesc.php";
require_once __DIR__ . "/../lib/php/insert.php";
require_once __DIR__ . "/../lib/php/devuelveCreated.php";
require_once __DIR__ . "/Bd.php";
require_once __DIR__ . "/TABLA_COLOR.php";

ejecutaServicio(function () {

 $nombre = recuperaTexto("nombre");
 $hexa = recuperaTexto("hexa");
 $desc = recuperaTexto("desc");

 $nombre = validaNombre($nombre);
 $hexa = validaHexa($hexa);
 $desc = validaDesc($desc);

 $pdo = Bd::pdo();
 insert(pdo: $pdo, into: COLOR, values: [COL_NOMBRE => $nombre, COL_HEXA => $hexa, COL_DESC => $desc]);
 $id = $pdo->lastInsertId();

 $encodeId = urlencode($id);
 devuelveCreated("/srv/color.php?id=$encodeId", [
  "id" => ["value" => $id],
  "nombre" => ["value" => $nombre],
  "hexa" => ["value" => $hexa],
  "desc" => ["value" => $desc],
 ]);
});
