<?php

$fp = fopen('./data/kadai.txt', 'r');
$index = 0;
$arr = [];
$sum_20 = 0;
$sum_30 = 0;
$sum_40 = 0;
$sum_50 = 0;
$sum_60 = 0;

while (!feof($fp)) {
    $row = rtrim(fgets($fp), "\n");
    if($row !== ''){
        $arr[0][$index] = $index;
        $txt = explode(',', $row);
        for($i = 0;$i < count($txt); ++$i){
            $arr[$i+1][$index] = (int)$txt[$i];
            if($i == 1){
              if($txt[$i]<30){
                $sum_20 += 1;
              }
              if($txt[$i]>=30 && $txt[$i]<40){
                $sum_30 += 1;
              }
              if($txt[$i]>=40 && $txt[$i]<50){
                $sum_40 += 1;
              }
              if($txt[$i]>=50 && $txt[$i]<60){
                $sum_50 += 1;
              }
              if($txt[$i]>=60){
                $sum_60 += 1;
              }
            }
            
        }
    }
    $index += 1;
} 
fclose($fp);



// $data = array(
//   'data' => array($sum_20, $sum_30, $sum_40, $sum_50, $sum_60),
//   'legends' => array('-29','30-39','40-49','50-59','60-'),
//   'colors' => array('#0000FF', '#6600FF', '#CC00FF', '#CC00FF', '#CC00FF')
// );

require_once ('jpgraph/src/jpgraph.php');
require_once ('jpgraph/src/jpgraph_bar.php');

$data1y=array($sum_20, $sum_30, $sum_40, $sum_50, $sum_60);

// Create the graph. These two calls are always required
$graph = new Graph(400,300,'auto');
$graph->SetScale("textlin");

$theme_class=new UniversalTheme;
$graph->SetTheme($theme_class);

// $graph->yaxis->SetTickPositions(array(0,30,60,90,120,150), array(15,45,75,105,135));
$graph->SetBox(false);

$graph->ygrid->SetFill(false);
$graph->xaxis->SetTickLabels(array('-29','30-39','40-49','50-59','60-'));
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);

// Create the bar plots
$b1plot = new BarPlot($data1y);
// $b2plot = new BarPlot($data2y);
// $b3plot = new BarPlot($data3y);

// Create the grouped bar plot
$gbplot = new GroupBarPlot(array($b1plot));
// ...and add it to the graPH
$graph->Add($gbplot);


$b1plot->SetColor("white");
$b1plot->SetFillColor("darkgreen");

// $b2plot->SetColor("white");
// $b2plot->SetFillColor("#11cccc");

// $b3plot->SetColor("white");
// $b3plot->SetFillColor("#1111cc");

$graph->title->Set("age composition");

// Display the graph
$graph->Stroke();

?>