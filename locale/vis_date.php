<?php
	require_once("var_conn.php");

	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Headers: *");

    $sql = "SELECT td.id, td.data, td.luogo, tb.nome FROM tData td INNER JOIN tband tb ON td.band = tb.id";
    if(isset($_REQUEST["idBand"])){
        $idBand = $_REQUEST["idBand"];
        $sql = $sql . " WHERE td.band = $idBand";
    }

    $res = mysqli_query($con,$sql);
    $i = 0;
    $resArr = [];
    while($array = mysqli_fetch_array($res)) {
        $row = array(
                    "id" => $array['id'],
                    "data" => $array['data'],
                    "luogo" => $array['luogo'],
                    "band" => $array['nome'],
                    );
        $resArr[$i] = $row;
        $i++;
    }
    $risFin = array(
                "Result" => $resArr,
                );
    echo json_encode($risFin);

	require_once("var_connclose.php");
?>