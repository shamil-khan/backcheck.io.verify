<?php 
include('include/config.php');

$mystring = $_SERVER['HTTP_REFERER'];
		$findme   = 'google';
		$pos = strpos($mystring, $findme);

		// The !== operator can also be used.  Using != would not work as expected
		// because the position of 'a' is 0. The statement (0 != false) evaluates 
		// to false.
		if ($pos !== false) {
			@header("location:https://backcheckgroup.com/");
			die;							
		}

if(is_numeric($_REQUEST['id']) && is_numeric($_REQUEST['plogid'])){
	$case = 	$_REQUEST['plogid'];
	$ascase = $_REQUEST['id'];
	$access=true;
}else $access=false;

if($access){
	$db = new DB();
	$varData = $db->select("ver_data","*","v_id=$case");
	if($ascase!=0){
		$asWhere = "v_id=$case AND as_id=$ascase AND as_status='Close'";
	}else{
		$asWhere = "v_id=$case AND as_status='Close' AND as_isdlt=0";
	}
	$asDatas = $db->select("ver_checks","*",$asWhere);
	if((mysql_num_rows($varData)>0) && (mysql_num_rows($asDatas)>0)){
		$varData = mysql_fetch_array($varData);
		
		

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>View Report</title>
	<link rel="stylesheet" type="text/css" href="css/reportcss.css">
</head>

<body>
	<?php include("include_pages/case_report_inc.php"); ?>
</body>
</html>

<?php }
}else{ ?>
	<div class="norc">
		<h1 style="margin-top:10%" align="center">No Record Found</h1>
	</div>		
<?php } ?>