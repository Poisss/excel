<?php
$url = "https://newlms.magtu.ru/pluginfile.php/622195/mod_folder/content/0/%D0%98%D0%A1%D0%BF%D0%92-20-1.xlsx?forcedownload=1";
$local_path = __DIR__."\dd\dd.xlsx";
copy($url, $local_path);