<?php
$content = file_get_contents("http://thethao.vnexpress.net/");
echo $content;
$pattern = '/<div class="title_news">.*<\/div>/imsU';
preg_match_all($pattern, $content, $arr);
print_r($arr);
