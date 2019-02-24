<?php 
/* 
   day1  给定一个字符串 找出这个字符串首次出现三次的英文字符
   首先写出一个字符串 然后计算出改字符串的长度 
   定义一个数组 用来存放字符串
   首先通过循环判断循环次数 
   然后看数组中是否存在该字符串  如果存在 则通过循环自增长 如果不存在 则等于1 如果该字符串中有字符首先出现3次 则进行返回
*/
$str = "have you even gone shopping and";
$res = find($str);
var_dump($res);
echo "<hr>";
function find($str)
{
	$len = strlen($str);
	$arr = [];
	for ($i=0; $i <$len ; $i++) { 
		if (isset($arr[$str[$i]])) {
			$arr[$str[$i]]++;
		}
		else
		{
			$arr[$str[$i]] = 1;
		}
		if ($arr[$str[$i]] == 3) {
			return $str[$i];
		}
	}
}



/*
   day2 编写一个php函数测试输入的数字是否为水仙花数。
   水仙花数是指一个三位数 他各位数字的立方和等于他本身
   一定要切记判断条件是 ==
*/
$res = flower();
function flower()
{
	for ($i=1; $i <=9 ; $i++) { 
		for ($j=0; $j <=9 ; $j++) { 
			for ($w=0; $w <=9 ; $w++) { 
				if ($i*$i*$i + $j*$j*$j + $w*$w*$w == 100*$i+10*$j+$w) {
					echo "$i$j$w"."<br>";

				}
			}
		}
	}
	echo "<hr>";
}

/* 
   day3 斐波那契数列：1 1 2 3 5 8 13 21 34 55...
	满足要求：当前项 = 前第一项 + 前第二项
	现在要求输入一个整数n，请你输出斐波那契数列的第n项（从0开始，第0项为0）
	递归与非递归
*/

//递归方式 
function digui($n)
{
	if($n == 1 || $n == 2)
	{
		return 1;
	}
	else
	{
		return digui($n-1)+digui($n-2);
	}
}
print_r(digui(9));

//非递归
function fbnq($m)
{
	if ($m<0) {
		return 0;
	}
	$array[1] = $array[2] = 1;
	for ($i=3; $i <=$m ; $i++) { 
		$array[$i] = $array[$i-1]+$array[$i-2];
	}
	return $array;

}
print_r(fbnq(20));
echo "<hr>";


/*
   day4 一只青蛙一次可以跳上1级台阶，也可以跳上2级。求该青蛙跳上一个n级的台阶总共有多少种跳法
   这实质上是斐波那契数列 f(n) = f(n-1)+f(n-2);
   有两种解法 一种是递归  另一种是非递归
*/
  //递归
function fbnq1($n)
{
	if($n==1 || $n==2)
	{
		return 1;
	}
	else
	{
		return fbnq1($n-1)+fbnq1($n-2);
	}
}
print_r(fbnq1(10));
//非递归
function feidigui($m)
{
	if($m <0)
	{
		return 0;
	}
	$array[1] = $array[2] = 1;
	for ($i=3; $i <=$m ; $i++) { 
		$array[$i] = $array[$i-1]+$array[$i-2];
	}
	return $array;
}
print_r(feidigui(15));
echo "<hr>";

/*
  day5 调整数组，使奇数位于偶数前面
		输入一个整数数组，实现一个函数来调整该数组中数字的顺序，
		使得所有的奇数位于数组的前半部分，所有的偶数位于数组的后半部分，
		并保证奇数和奇数，偶数和偶数之间的相对位置不变
*/
$array = [1,2,3,4,5,6,7,8];
$res = reOrder($array);
var_dump($res);
function reOrder($array)
{
    $jishu=[];
    $oushu=[];
    $res=[];
    $m=0;
    $n=0;
    
    $count=count($array);
    for($i=0;$i<$count;$i++){
        if($array[$i]%2==0){
            //偶数
            $oushu[$m]=$array[$i];
            $m++;
        }else{
            //基数
            $jishu[$n]=$array[$i];
            $n++;
        }
       
    }
    $res=array_merge($jishu,$oushu);
    return $res;
}
echo "<hr>";
$array = [1,2,3,4,5,6,7,8,9,10];
$res = Order($array);
var_dump($res);
function Order($array)
{
	$jishu = [];
	$oushu = [];
	$res = [];
	$m = 0;
	$n = 0;
	$count = count($array);
	for ($i=0; $i <$count ; $i++) { 
		if ($array[$i]%2 == 0) {
			//偶数
			$oushu[$m] = $array[$i];
			$m++;
		}
		else
		{
			$jishu[$n] = $array[$i];
			$n++;
		}
	}
	$res = array_merge($jishu,$oushu);
	return $res;
}
echo "<hr>";
/*
   day6 求出任意非负整数区间中1出现的次数（从1 到 n 中1出现的次数）。
   substr_count 统计某个字符在字符串中出现的次数
   //  function One($n,$m)
    //  {
    //    $num = 0;
    //    for ($i=$n; $i <=$m ; $i++) { 
    //      $data = substr_count($i,1);
    //      $num+=$data;
    //    }
    //    echo $num;
    //  }
    // echo One(1,13);
*/
function One($n,$m)
{
  $num = 0;
  for ($i=$n; $i <=$m ; $i++) { 
    $data = substr_count($i,1);
    $num+=$data;
  }
  echo $num;
}
One(1,13);

echo "<hr>";
/*
  day7 如何判断一个数字是丑数
       设待推断整数位M，M循环除以2直到不能整除。
       此时接着循环除以3直到不能整除。
       接着循环除以5直到商为1或者不能整除为止
*/

function Ugly($n)
{
    while ($n %2 == 0) {
    	$index /=2;
    }
    while ($n %3 == 0) {
    	$index /=3;
    }
    while ($n %5 == 0) {
    	$index /=5;
    }
    if ($index == 1) {
    	return true;
    }
    else
    {
    	return false;
    }
}
echo "<hr>";
/*
  day8 每年六一儿童节,周院长都会准备一些小礼物去看望孤儿院的小朋友,今年亦是如此。
  每次周院长准备了一些小游戏。其中,有个游戏是这样的:首先,让小朋友们围成一个大圈。
  然后,他随机指定一个数m,让编号为0的小朋友开始报数。每次喊到m-1的那个小朋友要出列唱首歌,
  然后可以在礼品箱中任意的挑选礼物,并且不再回到圈中,从他的下一个小朋友开始,
  继续0...m-1报数....这样下去....直到剩下最后一个小朋友,可以不用表演,并且拿到礼物。
  请你试着想下,哪个小朋友会得到这份礼品呢？(注：小朋友的编号是从0到n-1)
  这其实是一个约瑟夫环 通常解决这类问题时我们把编号从0~n-1，最后 [1]  结果+1即为原问题的解
*/
function Solution($n,$m)
{
    $arr = range(1,$n);
    $i = 0;
    while (count($arr)>1) {
    	if (($i+1)%$m == 0) {
    		unset($arr[$i]);
    	}
    	else
    	{
    		array_push($arr,$arr[$i]);
    		unset($arr[$i]);
    	}
    	$i++;
    }
    var_dump($arr);
}
Solution(6,2);
echo "<hr>";
/*
   day9 输入一个正整数数组，把数组里所有数字拼接起来排成一个数，打印能拼接出的所有数字中最小的一个。
        例如输入数组{3，32，321}，则打印出这三个数字能排成的最小数字为321323
        function small($arr)
      {
         $len = count($arr);
         for ($i=0; $i <$len; $i++) { 
             for ($j=$i+1; $j <$len ; $j++) { 
                $a = intval($arr[$i].$arr[$j]);
                $b = intval($arr[$j].$arr[$i]);
                if ($a>$b) {
                  $temp = $arr[$i];
                  $arr[$i] = $arr[$j+1];
                  $arr[$j+1] = $temp;
                }
             } 
         }
         $res = implode("",$arr);
         var_dump($res);
      }
      $arr = array(3,32,321);
      small($arr);
*/
$arr =array(3,32,321);
day9($arr);
function day9($arr)
{
  $count = count($arr);
  for ($i=0; $i <$count ; $i++) { 
      for ($j=$i+1; $j <$count ; $j++) { 
        $a= intval($arr[$i].$arr[$j]);
        $b=intval($arr[$j].$arr[$i]);
        if ($a>$b) {
          $temp = $arr[$i];
          $arr[$i] = $arr[$j+1];
          $arr[$j+1] = $temp;
        }
      }
  }
  $res = implode("",$arr);
  var_dump($res);
}
echo "<hr>";
/*
   day10 一个整型数组里除了两个数字之外，其他的数字都出现了偶数次。请写程序找出这两个只出现一次的数字
*/
$array = [5,2,2,3,8,7,3,6,7,9,1];
day10($array);
function day10($array)
{
   $count = count($array);
   $arr = [];
   for ($i=0; $i <$count ; $i++) { 
     if (isset($arr[$array[$i]])) {
         $arr[$array[$i]]++;
     }
     else
     {
         $arr[$array[$i]] =1;
     }
   }

   foreach ($arr as $key => $value) {
     if ($value == 1) {
       echo $key."\n";
     }
   }
}
echo "<hr>";
/*
   day11  翻转函数  例如:student. a am i 翻转顺序过来为 i am a student.
   explode 把字符串分割成数组 
*/
$str = "student. a am I";
echo reverse($str);
function reverse($str)
{
   $res = explode(" ", $str);
   $count = count($res);
   for ($i=$count - 1; $i >=0; $i--) { 
     $result [] = $res[$i];
   }
   $last = implode(" ",$result);
   print_r($last);
}
echo "<hr>";
/*
   day12  求1+2+3+...+n，不能使用乘除法、for、while、if、else、switch、case等关键字及条件判断语句（A?B:C）（提示逻辑运算）
*/
function day12($n)
{
   $r = 0;
   $n &&($r = day12($n-1) + $n);
   return $r;
}
echo day12(4);
echo "<hr>";
/*
   day13 写一个函数，求两个整数之和，要求在函数体内不得使用+、-、*、/四则运算符号
*/
function Sum($num1,$num2)
{
   $data = array();
   array_push($data,$num1,$num2);
   $res = array_sum($data);
   var_dump($res);
}
Sum(12,13);
echo "<hr>";
/*
   day14 输入一个递增排序的数组和一个数字S，在数组中查找两个数，使得他们的和正好是S，
         如果有多对数字的和等于S，输出两个数的乘积最小的
*/
$array = [1,2,3,4,5,6,7,8,9,10];
echo day14($array,9);
function day14($array,$sum)
{
   $count = count($array);
   for ($i=0; $i < $count; $i++) { 
     for ($j=0; $j <$i ; $j++) { 
         if(($i+$j) == $sum)
         {
            $arr [] =$i*$j;
            $arrs[] = $i.$j;
         }
     }
   }
   print_r($arr);
   $cou = count($arr);
   foreach ($arr as $key => $value) {
       $arr[]=$i;
   }
}
echo "<hr>";
/* 
   day15 在一个字符串(0<=字符串长度<=10000，全部由字母组成)中找到第一个只出现一次的字符,并返回它的位置, 
         如果没有则返回 -1（需要区分大小写
*/       
echo "<hr>";
/* 
   day16 在一个二维数组中（每个一维数组的长度相同），每一行都按照从左到右递增的顺序排序，
         每一列都按照从上到下递增的顺序排序。请完成一个函数，输入这样的一个二维数组和一个整数，
         判断数组中是否含有该整数
*/ 
function day16($array,$target)
{
   for ($i=0; $i <count($array); $i++) { 
       for ($j=0; $j <count($array); $j++) { 
           if ($array[$i][$j] == $target ) {
                return true;
           }
       }
   }
}
$target = 7;
$array = [[1,2,4],[3,5,7],[4,6,9]];
echo day16($array,$target);
echo "<hr>";
/* 
   day17 给定两个从小到大排好序的整型数组，要求编写一个函数实现两个有序数组的合并，并保持从小到大的顺序。
   （除了count函数外不能使用任何其他函数，不能单独排序）
*/

function day17($arrA,$arrB)
{
   $arr = array_merge($arrA,$arrB);
   $res = sort($arr);
   print_r($arr);
}
$arrA = [1,2,3,4];
$arrB = [5,6,7,8];
echo day17($arrA,$arrB);
echo "<hr>";
/* 
   day18 输入一个正整数，输出该数二进制表示1的个数
*/
function day18($n)
{
    $r = 0;
    while ($n !=0) {
      $r++;
      $n &=($n - 1);
    }
    return $r;
}
$n = 10;
echo day18($n);
echo "<hr>";
/*
   day19 根据已知有序数组，实现二分查找算法（折半查找），输入任意数字，返回该数字在数组中的下标位置。
*/
$array = [1,3,5,9,8,6,45,91];
echo zheban($array,45);
function zheban($array,$n)
{
   $count = count($array);
   while ($count>1) {
     $half = ceil($count/2);
     if ($n == $array[$half]) {
         foreach ($array as $key => $value) {
          if ($value == $n) {
              return $key;
          }
         }
     }
     elseif ($n > $array[$half]) {
         $len = $count-1-$half-1;
         $start = $half +1;
         $array = array_slice($array,$start,$len);
         return zheban($array,$n);
     }
     elseif ($n<$array[$half]) {
         $array = array_slice($array,0,$half);
         return zheban($array,$n);
     }
   }
}
echo "<hr>";
/*
   day20 有一个X*Y的网格，小团要在此网格上从左上角到右下角，只能走格点且只能向右或向下走。
         请设计一个算法，计算小团有多少种走法。给定两个正整数int x,int y，请返回小团的走法数目
*/
function day20($a,$b)
{
  if ($a==0 && $b==0) {
    return 0;
  }
  elseif ($a==0 || $b==0) {
    return 1;
  }
  else
  {
    return day20($a,$b-1)+day20($a-1,$b);
  }
}
echo day20(2,2);
echo "<hr>";
?>