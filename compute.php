<?php
$list = scandir("/share");

array_shift($list);
array_shift($list);
#print_r($list);
$min_seconds = 3;
$max_seconds = 5;

$random_seconds = rand($min_seconds, $max_seconds);
$random_microseconds = $random_seconds * 1000000;

//usleep($random_microseconds);

foreach($list as $d){
        $state = "/share/".$d."/computing.txt";
        $output = "/share/".$d."/output.jpg";
        $input = "/share/".$d."/input.jpg";
        $style = preg_replace('/.*_/', '', $d);
       

        if(!file_exists($state) && !file_exists($output)){
                $file = fopen($state,"w") or die ("cant open file");

                $txt = "c1";
                fwrite($file,$txt);
        
                fclose($file);
        
                sleep(10);
                // shell_exec("touch $state");
                // $outfile = fopen($output, "w");
                if(file_exists($input)){
                        $file = file_get_contents($input,true);

      $cmd ="cd /share/fast_neural_style;python3 neural_style/neural_style.py eval --content-image ../../share/".$d."/input.jpg --model ./saved_models/".$style.".pth --output-image ../../share/".$d."/output.jpg --cuda 0";
                        exec($cmd);
			break;
		}
        }
}

?>

