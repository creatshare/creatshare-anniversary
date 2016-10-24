<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>CreatShare</title>
</head>

<body bgcolor="#000000">
<div style=" margin-top:20px;color:#FFF; font-size:50px; text-align:center"> <font color="#33FFFF"> CreatShare </font><br></div>

<div align="center" style="margin:40px 0px 0px 558px;border:20px; background-color:#0CF; text-align:center; width:400px; height:180px;">	

<div style="padding-top:10px; font-size:15px;">
 

<!--Form to post the data-->
<form action="" name="form1" method="post">
	<div style="margin-top:15px; height:30px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;name : 
	    <input type="text"  name="name" value=""/>
	</div>  
	<div>Anniversary :
		<input type="text" name="anniversary" value=""/>
	</div>
	<div style="margin-top:8px; height:30px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;year : 
		<input type="text" name="year" value=""/>
	</div></br>
	<div style="margin-top:0px;margin-left:90px;">
		<input type="submit" name="submit" value="Submit" />
	</div>
</form>

</div></div>

<div style=" margin-top:10px;color:#FFF; font-size:23px; text-align:center">
<font size="6" color="#FFFF00">

<?php
$dbuser ='root';
$dbpass ='root';
$dbname ="CreatShare";
$host = 'localhost';

@error_reporting(0);
@$con = mysql_connect($host,$dbuser,$dbpass);
// Check connection
if (!$con)
{
    echo "Failed to connect to MySQL: " . mysql_error();
}
@mysql_select_db($dbname,$con) or die ( "Unable to connect to the database: $dbname");

// take the variables
if(isset($_POST['name']) && isset($_POST['anniversary']) && isset($_POST['year']))
{
	$name=$_POST['name'];
	$anniversary=$_POST['anniversary'];
	$year=$_POST['year'];

	// connectivity
	$name='"'.$name.'"';
	$anniversary='"'.$anniversary.'"'; 
	$year='"'.$year.'"';
	@$sql="SELECT name, anniversary, year FROM demo WHERE name=($name) and anniversary=($anniversary) and year = ($year)LIMIT 0,1";
	$result=mysql_query($sql);
	$row = mysql_fetch_array($result);

	if($row)
	{
  		echo '<font color= "#0000ff">';	
  		
  		echo "<br>";
		echo '<font color= "#FFFF00" font size = 8>';
		echo "Happy 5 Anniversary!";	
		echo '<font size="3" color="#0000ff">';	
		echo "<br>";
		echo 'name:'. $row['name'];
		echo "<br>";
		echo 'Anniversary:' .$row['anniversary'];
		echo "<br>";
		echo 'year:' .$row['year'];
		echo "<br>";
		echo "</font>";
		
		
  		echo "</font>";
  	}
	else  
		echo '<font color= "#FF0000" font size="8"><br>error!</font>';
}

?>

</font>
</div>
</body>
</html>
