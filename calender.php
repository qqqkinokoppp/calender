<?php

$datetime = new DateTime();//現在の日付のオブジェクト生成
if(isset($_POST['now']))
{
  $_POST = array();
}
if(isset($_POST['next']))
  {
  $year = $_POST['nextYear'];
  $month = $_POST['nextMonth']; 
  }
  else if(isset($_POST['previous']))
  {
  $year = $_POST['previousYear'];
  $month = $_POST['previousMonth']; 
  }
  else
  {
  $year = $datetime -> format('Y');//yearに現在の西暦を格納
  $month = $datetime -> format('m');//monthに現在の月（先頭に0）を格納
  }

  /*if(isset($_POST['previousMonth']))
  {
  $year = $_POST['previousYear'];
  $month = $_POST['previousMonth']; 
  }
  else
  {
  $year = $datetime -> format('Y');//yearに現在の西暦を格納
  $month = $datetime -> format('m');//monthに現在の月（先頭に0）を格納
  }*/

//$day = $datetime -> format('d');
//$week = $datetime -> format('w');
//print $year;
//print $month;
// print $day;
// print $week;

$datetime -> setDate($year, $month, 1);//現在の西暦、月の1日をセット、20190701
// $year = $datetime -> format('Y');
// $month = $datetime -> format('m');
// $day = $datetime -> format('d');
$firstDayWeek = $datetime -> format('w');//1日の曜日を格納　0-6が入る
$lastDay = $datetime -> format('t');//月の最終日を格納 
// print $year;
// print $month;
// print $day;
// print $lastDay;
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>カレンダー</title>
</head>

<body>
<h1><?php print $year.'年'.$month.'月';?></h1>
<table>
    <tr>
        <th>日</th><th>月</th><th>火</th><th>水</th><th>木</th><th>金</th><th>土</th>
    </tr>
    
    <tr>
    <?php if($firstDayWeek!==0):?><!--1日が日曜じゃないとき、曜日が一致するまで空白を出力-->    
      <?php for($a=0;$a<$firstDayWeek;$a++):?>       
        <td>&nbsp;</td>
    <?php endfor; ?>
    <?php endif; ?>
    <?php for($i=1;$i<=$lastDay;$i++):?><!--日付の出力、その月の日数分回す-->
    <td><?php print $i ?></td>
      <?php if(($i+$a)%7===0): ?><!--月初の空白分+その月の日数が7の倍数の時改行-->
        </tr><tr>
      <?php endif; ?>
    <?php endfor; ?>
    
</tr>
</table>
<?php 
$next = $datetime -> modify('+1 month');
$nextYear = $next -> format('Y');
$nextMonth = $next -> format('m');

$previous = $datetime -> modify('-2 month');
$previousYear = $next -> format('Y');
$previousMonth = $next -> format('m');


?>

<form action="calender.php" method="post">
<input type="hidden" name="previousMonth" value="<?php print $previousMonth; ?>">
<input type="hidden" name="previousYear" value="<?php print $previousYear; ?>">
<input type="submit" name="previous" value="前の月へ">
</form>

<form action="calender.php" method="post">
<input type="hidden" name="nextMonth" value="<?php print $nextMonth; ?>">
<input type="hidden" name="nextYear" value="<?php print $nextYear; ?>">
<input type="submit" name="next" value="次の月へ">
</form>

<form action="calender.php" method="post">
<input type="submit" name="now" value="今月へ">
</form>

</body>
</html>