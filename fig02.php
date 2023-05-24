<?php // content="text/plain; charset=utf-8"

function TimeCallback($A) {
    return Date('Y-m-d H:i:s',$A);
}


$fp = fopen('./data/kadai.txt', 'r');
$index = 0;
$arr = [];


while (!feof($fp)) {
    $row = rtrim(fgets($fp), "\n");
    if($row !== ''){
        $arr[0][$index] = $index;
        $txt = explode(',', $row);
        for($i = 0;$i < count($txt); ++$i){
            if($i == 8){
                $arr[$i+1][$index] = TimeCallback($txt[$i]);    
            }
            $arr[$i+1][$index] = (int)$txt[$i];
        }
    }
    $index += 1;
} 
fclose($fp);
// var_dump($arr);




require_once ('jpgraph/src/jpgraph.php');
require_once ('jpgraph/src/jpgraph_scatter.php');

$datax = $arr[4];
$datay = $arr[5];
$graph = new Graph(400,300);
$graph->clearTheme();
// $graph->img->SetMargin(40,40,40,40);
// $graph->img->SetAntiAliasing();
$graph->SetScale("linlin");
$graph->SetShadow();
$graph->title->Set("height vs weight");
$graph->title->SetFont(FF_FONT1,FS_BOLD);

$sp1 = new ScatterPlot($datay,$datax);
$sp1->SetLinkPoints(false,"red",2);
$sp1->mark->SetType(MARK_FILLEDCIRCLE);
$sp1->mark->SetFillColor("white");
$sp1->mark->SetWidth(3);

$graph->Add($sp1);
$graph->Stroke();

?>
