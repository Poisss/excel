<?php
$url = "https://newlms.magtu.ru/mod/folder/view.php?id=219208";
$html = file_get_contents($url);
$pattern = '/<a\s[^>]*?href=[\'"]([^"]*forcedownload=1)[\'"].*?>/i';
preg_match_all($pattern, $html, $matches);

// echo '<pre>';
// var_dump($matches);
// echo '</pre>';
// echo $matches[1][0];
$count=0;
foreach($matches[1] as $value){
    echo $value.'<br>';
    $local_path = __DIR__."\dd\dd".$count.".xlsx";
    copy($value, $local_path);
    $count++;
}

// echo $html;
