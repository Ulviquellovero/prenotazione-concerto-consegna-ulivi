<?php
	require_once("var_conn.php");
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Headers: *");
	$sql = "SELECT * FROM tBand";
	$res = mysqli_query($con,$sql);
	$i = 0;
	while($array = mysqli_fetch_array($res)) {
		$row = array(
					"id" => $array['id'],
					"nome" => $array['nome'],
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