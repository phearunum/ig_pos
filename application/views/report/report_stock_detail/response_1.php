<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of response
 *
 * @author hpt-srieng
 */

//=array();
//foreach($records as $r){
//    
//    $data = array(
//        array($r)
//    );
//    
//  

$results = array(
        "sEcho" => 1,
        "iTotalRecords" => count($records),
        "iTotalDisplayRecords" => count($records),
        "aaData"=>$records);

//while($records = $result->fetch_array(MYSQL_ASSOC)){
//  $results["data"][] = $row;
//}
  foreach($records as $r){
       $results["data"][] = $r;
  }
//}

echo json_encode($results);
