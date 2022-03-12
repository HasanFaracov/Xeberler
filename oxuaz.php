<?php
$con = mysqli_connect('localhost','u1491059_newspro','Eokad23247','u1491059_newspro');
mysqli_set_charset($con, "utf8mb4");
$tarix = date('Y-m-d H:i:s',strtotime("+1 hour"));
$source = 'oxu.az';
$data = file_get_contents('https://oxu.az/');

                
preg_match('/<section class="news-list">(.*)<\/section>/siU',$data,$list);
unset($list[0]);
              
                
preg_match_all('/<a .* class="news-i-inner" href="(.*)">/siU',$list[1],$links);
unset($links[0]);

                
for($i=0; $i<count($links[1]); $i++)
{
$link = 'https://oxu.az'.$links[1][$i];
$link_yoxla = mysqli_query($con,"SELECT link,foto FROM news");
$icaze= true;
$sdata = file_get_contents($link); 

preg_match('/<meta property="article:section" content="(.*)" \/><meta property="article:published_time" content="(.*)" \/>.*<meta property="twitter:title" content="(.*)" \/>.*<meta property="twitter:description" content="(.*)" \/><meta property="twitter:image" content="(.*)" \/>/siU',$sdata,$info);

while($linkler = mysqli_fetch_array($link_yoxla)){
    $i++;  
    if ($linkler['link']==$link OR $linkler['foto']==$info[5]) {
    $icaze= false;
    }                
}

if($icaze){
if($info[5]<>""){ 

$newsdate = str_replace('T',' ',$info[2]);
$newsdate = str_replace('+04:00','',$newsdate);


$daxilet = mysqli_query($con,"INSERT INTO news(title,foto,metn,link,source,cat,newsdate,tarix)
VALUES('".$info[3]."','".$info[5]."','".$info[4]."','".$link."','".$source."','".$info[1]."','".$newsdate."','".$tarix."')");
}
}
}

                
?>

