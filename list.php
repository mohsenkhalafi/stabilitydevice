<?php
include "config.php";

$marakez = array();

$sql = "select * from markaz";
mysqli_query($link,'SET NAMES utf8');
$result = mysqli_query($link,$sql);
 
if(mysqli_num_rows($result) > 0){
    while ($row = mysqli_fetch_array($result)){
        $markaz = array(
			"id" => $row['id'],
            "graph" => $row['graph'],
            "namef" => $row['namef'],
			 "city" => $row['city'],
            "vlan" => $row['vlan'],
            "ip" => $row['ip'],
           


        );
        array_push($marakez,$markaz);
    }
}


