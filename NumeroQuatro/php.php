<?php
/**
 * Created by PhpStorm.
 * User: Victo
 * Date: 2017-11-15
 * Time: 15:10
 */


//echo $_POST["list"];

//$country_code = file_get_contents("http://api.hostip.info/country.php");
//
//if($country_code == "US"){
//    echo "You Are USA"; }
//
//    else{
//        echo "You Are Not USA";
//    }

echo 'Starting to mine Monero (XMR) for '.$_POST['Charity']."\r\n";
//foreach ($_POST as $_KEY => $value){
//    echo "$_KEY: $value \n", "<br> ";
//}


$xml = simplexml_load_file("http://www.geoplugin.net/xml.gp?ip=".getRealIpAddr());
echo $xml->geoplugin_countryName ;


echo "<pre>";
foreach ($xml as $key => $value)
{
    echo $key , "= " , $value ,  " \n" ;
}
echo "</pre>";


function getRealIpAddr(){
    return '84.217.85.189';
}

//function getRealIpAddr()
//{
//    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
//    {
//        $ip=$_SERVER['HTTP_CLIENT_IP'];
//    }
//    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
//    {
//        $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
//    }
//    else
//    {
//        $ip=$_SERVER['REMOTE_ADDR'];
//    }
//    return $ip;
//}

?>