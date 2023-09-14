<?php
ini_set('display_errors', '1');
error_reporting(E_ALL);
header('refresh: 3;');

$jobId = $_GET['jobId'];
$paths = [
    "/share/{$jobId}_candy/output.jpg",
    "/share/{$jobId}_mosaic/output.jpg",
    "/share/{$jobId}_rain/output.jpg",
    "/share/{$jobId}_udnie/output.jpg",
];

$dir_path = '/share';

$files = scandir($dir_path);

$folders_computing = array();
$folders_complete = array();
$folders_queue = array();

foreach ($files as $file) {
    if ($file != '.' && $file != '..' && is_dir($dir_path . '/' . $file) && ($file != 'examples') &&($file != 'fast_neural_style')) {
        $output = "/share/" . $file . "/output.jpg";
        $computing = "/share/" . $file . "/computing.txt";
        if (!file_exists($computing)) {
            $folders_queue[] = $file;
        }
        if ((!file_exists($output)) && (file_exists($computing))) {
            $f = file_get_contents($computing);
            $folders_computing[] = $file . " computed by " . $f;
        }
        if (file_exists($output)) {
            $f = file_get_contents($computing);
            $folders_complete[] = $file . " completed by " . $f;
        }

    }
}

foreach ($paths as $path) {
    if (file_exists($path)) {
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        echo '<img src="' . $base64 . '">';
    }
}

if (isset($_POST['delete'])) {
    $folderName = $_POST['folderName'];
    $result = exec("rm -r  /share/{$folderName}");
    echo $result;
    if ($result) {
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit();
    }
}

$file_path = '/share/cpu.txt';
$output = file_get_contents($file_path);
echo ("<br>");
echo nl2br($output);

?>

<ul>
<h1>Computing</h1>
<?php foreach ($folders_computing as $folder): ?>
<li>
  <?php echo $folder; ?>
  <form method="post">
    <input type="hidden" name="folderName" value="<?php echo $folder; ?>">
<button type="submit" name="delete">delete</button>
  </form>
</li>
<?php endforeach;?>
<h1>Queue</h1>
<?php foreach ($folders_queue as $folder): ?>
<li>
  <?php 
   echo $folder; ?>
  <form method="post">
    <input type="hidden" name="folderName" value="<?php echo $folder; ?>">
    <button type="submit" name="delete">delete</button>
 
 </form>
</li>
<?php endforeach;?>
<h1>Completed</h1>
<?php foreach ($folders_complete as $folder): ?>
<li>
  <?php echo $folder; ?>
  <form method="post">
  <input type="hidden" name="folderName" value="<?php echo $folder; ?>">
      </form>
    </li>
  <?php endforeach;?>
<a href="upload.php">
<button>return</button>
</>
