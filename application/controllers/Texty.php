<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Texty extends CI_Controller{
    function __construct()
    {
        parent::__construct();  
    }

    function index()
    {
         // you need to load the url helper to call base_url()
          $this->load->helper("url");
          // you can change the location of your file wherever you want
          $MyFile = file_get_contents(base_url()."assets/mak/pemb.txt");
          //echo $MyFile;
          $number=["1","2","3","4","5","6","7","8","9"];
          $findme=["I. ","II. ","III. ","IV. ","V. ","VI. ","VII. ","VIII. "];
          $result=[];
          $arrnum=-1;
          $end =strlen($MyFile);
          foreach ($findme as $value) {
              $arrnum+=1;
              $pos = strpos($MyFile, $value);
              $rest = substr($MyFile, $pos, $end);
              foreach ($number as $value) {
                $posx = strpos($rest, $value);
                if($posx!==false){
                    $rest = substr($MyFile, $pos, $posx);
                }
                
              }
              $result[]=array(
                    'start'=>$pos,
                    'heading1'=>$rest
                );
          }

           for($x=0;$x<count($result);$x++){
              if($x<count($result)-2){
                 $result[$x]["end"]=($result[$x+1]["start"])-1;
              }else{
                $result[$x]["end"]=$end;
              }
              $result[$x]["content"]=substr($MyFile, $result[$x]["start"],$result[$x]["end"]-$result[$x]["start"]);
              echo $result[$x]["heading1"]."<br>";

               $findme2=[];
              for ($y=1;$y<=109;$y++){
                    array_push($findme2, $y.". ");
              }
              foreach ($findme2 as $value) {
                  $pos2 = strpos($result[$x]["content"], $value);
                  $end2 =strlen($result[$x]["content"]);
                  $rest2 = substr($result[$x]["content"], $pos2, $end2);
                    $posx2 = strpos($rest2, "A.");
                    if($posx2!==false){
                        $rest2 = substr($result[$x]["content"], $pos2, $posx2);
                        echo "lal<br>";
                    }

                  
              }

            }

          

         
}



}
