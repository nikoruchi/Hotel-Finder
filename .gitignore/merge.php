<?php
$prices = array();
$id = $_POST["id"];
// print_r($id);
if($id==1){
    $prices = [2469 => "La Carmela de Boracay" ,3780 => "Nigi Nigi Too", 19000 =>"Shangri-La", 4061 => "Crown Regency", 5481 => "Hennan Garden Resort"];    
} elseif($id==2){
    $prices = [6240 => "Boracay Mandarin Hotel", 2717 => "White House", 25000 => "Shangri-La", 2587 => "Red Coco Inn Boracay", 17100 => "Asya Premier Suites"];    
} else{
    $prices = [15719 => "Marina Bay Sands", 20100 => "Park Regis", 23500 => "Carlton Hotel", 27800 => "Jen Orchardgateway", 30500 => "Mandarin Oriental Hotel"];    
}
$temp = $prices;

$price_value=(array_keys($temp));
$temp = merge_sort($price_value);

$final = array();      

for ($i=0; $i < count($prices); $i++) {
    $final[$temp[$i]] = $prices[$temp[$i]];
}
print_r(json_encode($final));

function merge_sort(&$arrayToSort){  
    if (sizeof($arrayToSort) <= 1)  
        return $arrayToSort; 

    // split input array into two halves  
    // left...  
    $leftFrag = array_slice($arrayToSort, 0, (int)(count($arrayToSort)/2));  
    // right...  
    $rightFrag = array_slice($arrayToSort, (int)(count($arrayToSort)/2));  
  
    // RECURSION  
    // split the two halves into their respective halves...  
    $leftFrag = merge_sort($leftFrag);  
    $rightFrag = merge_sort($rightFrag);  
  
    //merge both sides  
    $returnArray = merge($leftFrag, $rightFrag);  
  
    return $returnArray;  
}  
  
  
function merge(&$lF, &$rF){  
    $result = array();  

    while (count($lF)>0 && count($rF)>0) {  
        if ($lF[0] <= $rF[0]) {  
            array_push($result, array_shift($lF));  
        }  
        else {  
            array_push($result, array_shift($rF));  
        }  
    }  
  
    // necessary as one of the arrays  
    // can become empty before the other  
    array_splice($result, count($result), 0, $lF);  
    array_splice($result, count($result), 0, $rF);  
  
    return $result;  
}  

?>