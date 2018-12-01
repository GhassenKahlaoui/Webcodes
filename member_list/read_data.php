
<?php
session_start() ; 
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

require_once('Classes/PHPExcel.php'); 

$excel = PHPExcel_IOFactory::load('CUMM.xlsx'); 

// set active first sheet 
$excel->setActiveSheetIndex(0); 

// first row 
$i = 2 ; 
$clubs_name = [];
$number =1;
$hand_list=[];  
$info_list= [];
$corgraphia_list= [];
$Volley_list= [];
$echecs_list= [];
$literature_list= [];
$debat_list = [];
$foot_list= [];

$musique_list = []; 
$dance_list = [];
$theatre_list = [];
$autre_list = [];

// loot until the end of data serie 

while($excel->getActiveSheet()->getCell('A'.$i)->getValue() !="" ) {
    // get Cells Value 
    $time =  $excel->getActiveSheet()->getCell('A'.$i)->getValue();
    $email =  $excel->getActiveSheet()->getCell('B'.$i)->getValue() ;
    $name =  $excel->getActiveSheet()->getCell('C'.$i)->getValue() ;
    
    $prename =  $excel->getActiveSheet()->getCell('D'.$i)->getValue() ;
    $DateOfBirth =  $excel->getActiveSheet()->getCell('E'.$i)->getValue() ;
    $phoneNumber =  $excel->getActiveSheet()->getCell('F'.$i)->getValue() ;
    $Clubs =  $excel->getActiveSheet()->getCell('G'.$i)->getValue() ;
    $Genre =  $excel->getActiveSheet()->getCell('H'.$i)->getValue() ;
    array_push($clubs_name,$Clubs);
    if($Clubs == "hand" || $Clubs == "Hand") {
        array_push($hand_list,$name . "*". $prename  . "*". $Genre ); 
        
    }
     if($Clubs == "Informatique" || $Clubs == "informatique" ) {
        array_push($info_list, $name . "*". $prename  . "*". $email );
        
    } if($Clubs == "foot" || $Clubs == "Foot") {
        array_push($foot_list,$name . "*". $prename . "*". $Genre);
    } if($Clubs == "Musique" || $Clubs == "musique" || $Clubs == "music" || $Clubs == "Music")  {
        array_push($musique_list,$name . "*". $prename. "*". $Genre);
    } if($Clubs == "Dance" || $Clubs == "dance") {
        array_push($dance_list,$name . "*". $prename . "*". $Genre);
    } if($Clubs == "Théâtre" || $Clubs == "théâtre" || $Clubs =="theatre") {
        array_push($theatre_list,$name . "*". $prename . "*". $Genre);
    }  if( $Clubs == "Corgraphia" || $Clubs == "corgraphia") {
      array_push($corgraphia_list,$name . "*". $prename . "*". $Genre);
    }  if ($Clubs == "Volley" || $Clubs == "volley") {
      array_push($Volley_list,$name . "*". $prename . "*". $Genre); 
    }  if($Clubs == "Debat" || $Clubs == "debat" || $Clubs =="Débat" || $Clubs == "débat") {
      array_push($debat_list,$name . "*". $prename . "*". $Genre);
    }   if($Clubs == "literature" || $Clubs == "litérature" || $Clubs =="Litérature" || $Clubs == "Literature") {
      array_push($literature_list,$name . "*". $prename . "*". $Genre);
    }

    //echo 
// increment $i ; 
$i++;
$number++;

}

?>

<html>
   <head>
       <meta charset="utf-8">
       
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!--Jquery-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript">
      $(document).ready(function() {
                    $('.alert-body').hide();
                    $('.alert-heading').click(function(){
                                    $('.alert-body').toggle(1000);
                                        
                    });
    
          });


  </script>
<script>

</script>
<title>Liste des inscriptions au clubs - Centre Universitaire et culturelle mahmoud mesaadi Jendouba</title>

</head>

<body>
  <header>
  <h1> Club WebCode Iset Jendouba</h1>

</header>
    <table border=2px>
    <tr>
      <th>Numéro </th>
        <th> photo</th>
        <th>Nom</th>
        
        <th>Prénom</th>
        
        <th>Email</th>
        <th>Status</th>
        </tr>
       
            <?php 
        $size = count($info_list) ; 
        $index = 0; 
    for(;$index<$size;$index++) 
{
        list($nom,$prenom,$email) = split('[*]',$info_list[$index]);
        $nom_complet= $nom . "*" . $prenom ;
        
        echo "<tr><td>".$index." <td> <img src='Blank_Avatar.png' width='40px' alt='picture'></td>
        <td>".$nom."       
        </td>
        ". "
        <td>".$prenom."       
        </td>
        ". "
        <td>".$email."       
        </td>
        <td><a href='status.php?nom_complet=$nom_complet&&index=$index'>status</a></td></tr>";
        
        
        

}   
    ?>
    </table>
</body>

</html>
<style>

  header >h1 {
    padding-left:90px;
    font-family: Arial;
  font-weight: 40px;
  font-size: 40px;
    text-shadow:30px 30px 10px black;
  
  }
  header {
    background-color: #BBB;
    padding: 40px;
    margin: 60px;
  }
    th {
   background-color:pink;
        text-align:center;
       
    }
    table {
color : gray;
    }
    td {
      color: white;
    padding : 20px;
    }
    body {
      background-color: #2c3e50;
    }
    a:visited {

          color: yellow;
          background-color: #B4B;
                text-decoration: overline; 
    }
</style>





















