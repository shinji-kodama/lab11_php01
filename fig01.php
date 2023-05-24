<?php

$fp = fopen('./data/kadai.txt', 'r');
$index = 0;
$arr = [];
$sum_m = 0;
$sum_f = 0;
$sum_o = 0;

while (!feof($fp)) {
    $row = rtrim(fgets($fp), "\n");
    if($row !== ''){
        $arr[0][$index] = $index;
        $txt = explode(',', $row);
        for($i = 0;$i < count($txt); ++$i){
            $arr[$i+1][$index] = $txt[$i];
            if($txt[$i]=='m'){
              $sum_m += 1;
            }
            if($txt[$i]=='f'){
              $sum_f += 1;
            }
            if($txt[$i]=='o'){
              $sum_o += 1;
            }
        }
    }
    $index += 1;
} 
fclose($fp);



require_once './jpgraph/src/jpgraph.php';
require_once './jpgraph/src/jpgraph_pie.php';

$data = array(
  'data' => array($sum_m, $sum_f, $sum_o),
  'legends' => array('male','female','others'),
  'colors' => array('#0000FF', '#6600FF', '#CC00FF')
);

$pie = new PiePlot($data['data']); 
$pie->setLegends($data['legends']); 
$pie->setSize(0.3); 
$pie->setSliceColors($data['colors']); 


$g = new PieGraph(300,300);
$g->title->set('Gender ratio'); 
$g->add($pie); 

$g->stroke();

?>