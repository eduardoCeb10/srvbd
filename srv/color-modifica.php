<?php

require_once __DIR__ . "/../lib/php/ejecutaServicio.php";
require_once __DIR__ . "/../lib/php/recuperaIdEntero.php";
require_once __DIR__ . "/../lib/php/recuperaTexto.php";
require_once __DIR__ . "/../lib/php/validaNombre.php";
require_once __DIR__ . "/../lib/php/validaHexa.php";
require_once __DIR__ . "/../lib/php/validaDesc.php";
require_once __DIR__ . "/../lib/php/update.php";
require_once __DIR__ . "/../lib/php/devuelveJson.php";
require_once __DIR__ . "/Bd.php";
require_once __DIR__ . "/TABLA_COLOR.php";

ejecutaServicio(function () {

 $id = recuperaIdEntero("id");
 $nombre = recuperaTexto("nombre");
 $hexa = recuperaTexto("hexa");
 $desc = recuperaTexto("desc");

 $nombre = validaNombre($nombre);
 $hexa = validaHexa($hexa);
 $desc = validaDesc($desc);

 update(
  pdo: Bd::pdo(),
  table: COLOR,
  set: [COL_NOMBRE => $nombre, COL_HEXA => $hexa, COL_DESC => $desc],
  where: [COL_ID => $id]
 );

 devuelveJson([
  "id" => ["value" => $id],
  "nombre" => ["value" => $nombre],
  "hexa" => ["value" => $hexa],
  "desc" => ["value" => $desc]
 ]);
});
