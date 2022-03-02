<?php

require_once 'adodb.inc.php';
require_once 'adodb-exceptions.inc.php';
require_once 'database.php';   //資料庫class
require_once 'config_inc.php';
require_once 'startsession.php';

error_reporting(E_ALL);
ini_set('display_errors', false);
ini_set('html_errors', false);  


$target = $_GET['term'];


$target = strtoupper($target);

$target = mb_convert_encoding($target, "BIG5", "UTF-8");

$db = new Database('oracle', DB_HT_S, '1521',DB_SD_S);
$db->initDB(DB_UR_S, DB_PD_S);
$result = $db->selStmt('syc_user', '*', 'where userid like \'%'.$target.'%\' or username like \'%'.$target.'%\'', '');


$outp = "[";

for ($i=0; $i<count($result); $i++) 
{
    $id = $result[$i][0];
    //$name = $result[$i][2];

    $name = mb_convert_encoding($result[$i][2], "UTF-8", "BIG5");

    if ($outp != "[") {$outp .= ",";}

    //$outp .= '{"label":"'.$name.','";
    $outp .= '{"label":"'.$id.' '.$name.'",';
    $outp .= '"value":"'. $id.'"}';
}

$outp .="]";

echo($outp);

?>