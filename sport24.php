<?php
$source = 'sport24.az';
$data = file_get_contents('https://sport24.az/');
//echo $data;
                
preg_match('/<div class="latest-post mb-50">(.*)<!--/siU',$data,$list);
unset($list[0]);
//print_r($list[1]);       
              
preg_match_all('/<a class="color-white" href="(.*)">/siU',$list[1],$links);
unset($links[0]);
//print_r($links[1]);
               
for($i=0; $i<count($links[1]); $i++)
{
$link = 'https://sport24.az'.$links[1][$i];
$sdata = file_get_contents($link);

preg_match('/<meta name="og:title" content="(.*)">.*<meta name="og:image" content="(.*)">
            /siU',$sdata,$info);
echo 'Title: '; echo $info[1].'<br>';
echo 'FOTO: '; echo $info[2].'<br>';
echo 'date: '; echo $info[3].'<br>';
break;
/*
$link_yoxla = mysqli_query($con,"SELECT link FROM news");
$icaze= true;
while($linkler = mysqli_fetch_array($link_yoxla)){
    $i++;  
    if ($linkler['link']==$link) {
    $icaze= false;
    }                
}

if($icaze){
$sdata = file_get_contents($link);                   
preg_match('/<meta property="article:section" content="(.*)" \/><meta property="article:published_time" content="(.*)" \/>.*<meta property="twitter:title" content="(.*)" \/>.*<meta property="twitter:description" content="(.*)" \/><meta property="twitter:image" content="(.*)" \/>/siU',$sdata,$info);


$newsdate = str_replace('T',' ',$info[2]);
$newsdate = str_replace('+04:00','',$newsdate);


$daxilet = mysqli_query($con,"INSERT INTO news(title,foto,metn,link,source,cat,newsdate,tarix)
VALUES('".$info[3]."','".$info[5]."','".$info[4]."','".$link."','".$source."','".$info[1]."','".$newsdate."','".$tarix."')");
}*/
}

                
?>

