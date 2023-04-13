<?php
$url = "https://newlms.magtu.ru/mod/folder/view.php?id=219208";
$html = file_get_contents($url);
$pattern = '/<a\s[^>]*?href=[\'"](.+?)[\'"].*?>/i';
preg_match($pattern, $html, $matches);
// if($matches==null){
// echo 'f';    
// }

echo $html;
