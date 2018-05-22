<?php
//$l=0;
//$r=5;
function test ($l,$r){
$num =0;
for ($i=$l; $i <= $r; $i++) { 
if (($i & 1)!==0) {
	$num = $i;
	echo "$num";
	continue;
}
	
}
//$arr= array(1,2)
}

test(0,5);
?>