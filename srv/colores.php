<?php

require_once __DIR__ . "/../lib/php/ejecutaServicio.php";
require_once __DIR__ . "/../lib/php/select.php";
require_once __DIR__ . "/../lib/php/devuelveJson.php";
require_once __DIR__ . "/Bd.php";
require_once __DIR__ . "/TABLA_COLOR.php";

ejecutaServicio(function () {

$lista = select(pdo: Bd::pdo(),  from: COLOR,  orderBy: COL_NOMBRE);

$render = "";
foreach ($lista as $modelo) {
  $encodeId = urlencode($modelo[COL_ID]);
  $id = htmlentities($encodeId);
  $nombre = htmlentities($modelo[COL_NOMBRE]);
  $hexa = htmlentities($modelo[COL_HEXA]);
  $desc = htmlentities($modelo[COL_DESC]);
  $render .=
  "<dl>
    <dt>
      <a href='modifica.html?id=$id'>$nombre</a>
    </dt>
    <dd>
      <b>Hexadecimal: </b>$hexa
    </dd>
    <dd>
      <b>Descripción: </b>$desc
    </dd>
  </dl>";
}

 devuelveJson(["lista" => ["innerHTML" => $render]]);
});
