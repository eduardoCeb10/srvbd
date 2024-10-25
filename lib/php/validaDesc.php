<?php

require_once __DIR__ . "/BAD_REQUEST.php";
require_once __DIR__ . "/ProblemDetails.php";

function validaDesc(false|string $desc)
{

 if ($desc === false)
  throw new ProblemDetails(
   status: BAD_REQUEST,
   title: "Falta la descripción.",
   type: "/error/faltadescripcion.html",
   detail: "La solicitud no tiene el valor de descripcion."
  );

 $trimDesc = trim($desc);

 if ($trimDesc === "")
  throw new ProblemDetails(
   status: BAD_REQUEST,
   title: "Descripción en blanco.",
   type: "/error/descripcionenblanco.html",
   detail: "Pon texto en el campo descripcion.",
  );

 return $trimDesc;
}
