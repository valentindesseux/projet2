<html>
  <head>
    		<link rel="stylesheet" href="https://cdn.concisecss.com/concise.min.css">
		<link rel="stylesheet" href="https://cdn.concisecss.com/concise-utils/concise-utils.min.css">
		<link rel="stylesheet" href="https://cdn.concisecss.com/concise-ui/concise-ui.min.css">
  </head>
  <body>
    <?php
$login=$_POST['login'];
$mdp=$_POST['mdp'];
$nomE=$_POST['nomE'];
$bool=false;
$boolA=false;
$boolN=false;
$conn=mysqli_connect("dwarves.iut-fbleau.fr","mouhamad","mouhamad","mouhamad");
$faiz=mysqli_query($conn,"SELECT loginM,nomE FROM Membre");
$mdpi=mysqli_query($conn,"SELECT loginU, pswdU FROM Utilisateur");
$eventi=mysqli_query($conn,"SELECT nomE,lieux,dateE,hdebut,hfin,typeE,descriptionE FROM Evenement where  nomE in ('$nomE')");
foreach($faiz as $is){
   if($nomE==$is['nomE'] AND $login==$is['loginM']){
  $bool=true;
 echo "<p>Vous etes bien membre de l'equipe</p>";
      }
  }
if($bool==false){
   echo "<p>Vous n'etes pas membre de l'equipe ou celle ci n'existe pas ou mauvais mdp</p>";
}
  if($bool==true){
  foreach($mdpi as $value){
    if($login==$value['loginU'] AND $mdp==$value['pswdU']){
      $boolA=true;
      echo "<p>Bon mdp</p>";
       
    }
    
  }
  if($boolA==false){
     echo "<p>Mauvais mdp</p>";
  }
  }
  
if($boolA==true){
  echo "<table style='border: 1px solid #ddd;
    text-align: center;border-collapse: collapse;
    width: 90%;margin:auto'>
  <tr style='background-color: #20B2AA;
    color: white;border: 1px solid #ddd;
    text-align: center;height:45px'>
  <th>Nom de l'equipe</th>
  <th>Lieu</th>
  <th>Date</th>
  <th>Heure de Debut</th>
  <th>Heure de Fin</th>
  <th>Type</th>
  <th>Description</th>
  <th>Presence</th>
  </tr>";
     
  foreach($eventi as $e){
  
      echo "<tr style='border: 1px solid #ddd;
    text-align: center;height:45px'>";
  echo "<td style='border: 1px solid #ddd;'>".$e['nomE']."</td>";
    echo "<td style='border: 1px solid #ddd;'>".$e['lieux']."</td>";
    echo "<td style='border: 1px solid #ddd;'>".$e['dateE']."</td>";
    echo "<td style='border: 1px solid #ddd;'>".$e['hdebut']."</td>";
    echo "<td style='border: 1px solid #ddd;'>".$e['hfin']."</td>";
    echo "<td style='border: 1px solid #ddd;'>".$e['typeE']."</td>";
    echo "<td style='border: 1px solid #ddd;'>".$e['descriptionE']."</td>";
  
      
    echo "</tr>"; 
  }
     
}
  
  
?>
   
    
  </body>
</html>
