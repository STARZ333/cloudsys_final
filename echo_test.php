<?php
// 定义文件名
$filename = "newfile.txt";

// 打开文件，如果不存在则创建它
$file = fopen($filename, "w") or die("cant open");

// 写入内容到文件
$txt = "new file text";
fwrite($file, $txt);

// 关闭文件
fclose($file);
echo "success！";


sleep(10);

$filename = "newfile2.txt";


// 打开文件，如果不存在则创建它
$file = fopen($filename, "w") or die("cant open");

// 写入内容到文件
$txt = "new file text";
fwrite($file, $txt);

// 关闭文件
fclose($file);
echo "success！";
?>

