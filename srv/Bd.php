<?php

class Bd
{
 private static ?PDO $pdo = null;

 static function pdo(): PDO
 {
  if (self::$pdo === null) {

   self::$pdo = new PDO(
    // cadena de conexión
    "mysql:host=sql113.infinityfree.com;dbname=if0_37588896_srv;",
    // usuario
    "if0_37588896",
    // contraseña
    "jx04YcEhH3cIoV",
    // Opciones: pdos no persistentes y lanza excepciones.
    [PDO::ATTR_PERSISTENT => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
   );

   self::$pdo->exec(
    "CREATE TABLE IF NOT EXISTS COLOR (
      COL_ID INTEGER,
      COL_NOMBRE TEXT NOT NULL,
      COL_HEXA TEXT NOT NULL,
      COL_DESC TEXT NOT NULL,
      CONSTRAINT COL_PK
       PRIMARY KEY(COL_ID),
      CONSTRAINT COL_NOM_UNQ
       UNIQUE(COL_NOMBRE),
      CONSTRAINT COL_NOM_NV
       CHECK(LENGTH(COL_NOMBRE) > 0),
      CONSTRAINT COL_HEX_UNQ
       UNIQUE(COL_HEXA),
      CONSTRAINT COL_HEXA_NV
       CHECK(LENGTH(COL_HEXA) > 0),
      CONSTRAINT COL_DES_UNQ
       UNIQUE(COL_DESC),
      CONSTRAINT COL_DES_NV
       CHECK(LENGTH(COL_DESC) > 0)
     )"
   );
  }

  return self::$pdo;
 }
}
