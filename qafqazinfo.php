<?php
$con = mysqli_connect('localhost','u1491059_newspro','Eokad23247','u1491059_newspro');
mysqli_set_charset($con, "utf8mb4");
$tarix = date('Y-m-d H:i:s',strtotime("+1 hour"));
$source = 'qafqazinfo.az';
$data = file_get_contents('https://qafqazinfo.az/');


preg_match('/<ul .* class="sonxeber">(.*)<\/ul>/siU',$data,$list);
unset($list[0]);
//print_r($list);


preg_match_all('/<a .* href="(.*)" .*>/siU', $list[1], $links);
unset($links[0]); 
//$links = array_unique($links[1]);

for($i=0; $i<count($links[1]); $i++)
{
$link = $links[1][$i];
$link_yoxla = mysqli_query($con,"SELECT link,foto FROM news");
$icaze= true;
$sdata = file_get_contents($link);
                    
preg_match('/<meta name="twitter:title" content="(.*)" \/>.*<meta name="twitter:image" content="(.*)">.*<meta property="article:published_time" content="(.*)" \/>.*<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">.*<a .* title="(.*)">.*<div class="panel-body news_text">.*<p><p><strong>.*<\/strong><\/p>.*<p>(.*)<\/p>/siU',$sdata,$info);

while($linkler = mysqli_fetch_array($link_yoxla)){
    $i++;  
    if ($linkler['link']==$link OR $linkler['foto']==$info[2]) {
    $icaze= false;
    }                
}
if($icaze){
if($info[2]<>""){                                   
$daxilet = mysqli_query($con,"INSERT INTO news(title,foto,metn,link,source,cat,newsdate,tarix)
VALUES('".$info[1]."','".$info[2]."','".$info[5]."','".$link."','".$source."','".$info[4]."','".$info[3]."','".$tarix."')");
}
}                   
}
?>