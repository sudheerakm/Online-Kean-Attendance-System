<?php
//$people = array(1,2,2,3);
//$k=2;

function test($a, $people){
	//$people = array(1,2,2,3);
if (in_array($a, $people))
  {
  return "Match found 2";
  }
else
  {
  return "Match not found";
  }

}

$result= test(2, array(1,2,2,3));
echo "$result";
?>