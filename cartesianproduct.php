<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>



<?php
$start = array(
			array('spain','greece'),
			array('1','2','3'),
	);

//$output = Cartesian::build($start);
//echo "$output";

 foreach ($start[0] as $value1) { 
        foreach ($start[1] as $value2) {
                $res[] = array($value1,$value2); 
                //echo $res. "-"; 
        }
        //echo "<br>";
   }
   //var_dump($res);
   print_r($res);
   //echo "$res";
   //foreach ($res as $result) {
   //	foreach ($result as $result1) {
   		# code...
   	//}
   	# code...
   //	echo $result;
   	//print_r(array_values($result1));


   //}
?>
<table>
  <th>test</th>
  <th>test2</th>
  <tr><?php print_r($res[0]);?></tr>
</table>
</body>
</html>