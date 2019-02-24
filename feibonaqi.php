//递归方式实现
// $res = fbnq(10);
// var_dump($res);
function fbnq($n){
	if($n == 1 || $n == 2){
		return 1;
	}
	 return fbnq($n-1)+fbnq($n-2);

}
for ($i = 1;$i<=20;$i++) {
    echo fbnq($i).'<br />';
}



//非递归方式实现
function fbnq1($m){
	if($m<=0){
		return 0;
	}
	$array[1] = $array[2] = 1;
	for ($i=3; $i <$m ; $i++) { 
		$array[$i] = $array[$i-1] + $array[$i-2];
	}
	return $array;
}
 // print_r(fbnq1(20));
