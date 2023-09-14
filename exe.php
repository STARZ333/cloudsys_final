<?php

ini_set('display_errors','1');
error_reporting(E_ALL);


$dirname = time().".".rand(0,100);

$dirPaths = array(
    "/share/".$dirname."_candy/",
    "/share/".$dirname."_mosaic/",
    "/share/".$dirname."_rain/",
    "/share/".$dirname."_udnie/"
);

foreach ($dirPaths as $dirPath) {
    $cmd = "mkdir $dirPath;chmod -Rf 777 $dirPath";
    shell_exec($cmd);

    if ($_FILES["uploadFile"]["error"] > 0) {
        echo "ERROR.\n";
    } else {
        $tmpfile = $_FILES["uploadFile"]["tmp_name"];
        $newfile = $dirPath."/input.jpg";
        copy($tmpfile, $newfile); // create a copy of the temporary file
        shell_exec("chmod -Rf 777 $dirPath");
    }
}

echo "<script type='text/javascript'>window.location.href='http://192.168.159.131:8080/cloudsystem/view.php?jobId=".$dirname."'</script>";

?>
