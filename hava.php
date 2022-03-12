<?php
$data = file_get_contents('https://weather.day.az/az/');

                
preg_match('/<div class="col-lg-8 prn pln">(.*)<\/div>/siU',$data,$list);
unset($list[0]);
//print_r($list);        
                
preg_match('/<p class="degree">(.*)<span>/siU',$list[1],$links);
unset($links[0]);
//print_r($links[1]);

?>