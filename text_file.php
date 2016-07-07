<?php
include("../connect/connect.php");
include("../config/config.php");
ini_set('memory_limit', '-1');
$file = "36342_3024586_27001609_cmp.txt";
echo "here";
exit;
$handle = @fopen($file,'r'); 
//echo '<pre>'; print_r($file); exit;
$params = array(); 
if($handle) 
{ 
$i=0;
   while(!feof($handle)) 
   { 
       $line = fgets($handle);  
       $temp = explode('|',$line);
		$params[] = $temp; 
		
   } 
	//echo '<pre>'; print_r($params); exit;
	foreach($params as $key => $val){
		if($i == '0' || $i > '12000'){
			echo '<br />'.$i.'_'.$key[0].$val[2];
			
		}else{
		//echo $i.'_greater_'.'<br />';
		if(empty($val[9])){
			$desc= $val[8];
		}else{
			$desc= $val[9];
		}
		//echo '<br />'.$key . '<===> '. $val[0].'<=====>'.$val[3];
		$Qry =mysql_query("insert into gift_product set 	pr_id = '".$val[0]."', pro_name='".$val[1]."', price ='".$val[13]."', userId='1',image_code='".stripslashes($val[5])."', img='".$val['6']."' , description ='".$desc."' , vendor ='Buy.com (dba Rakuten.com Shopping)',	category='".$val[3]."', gender = 'Man,Woman,Boy,Girl' , dated=NOW() ");
		}
			  $i++;
	}
   fclose($handle); 
}  
?>