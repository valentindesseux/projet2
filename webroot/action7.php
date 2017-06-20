<?php
$login=$_POST['login'];
$mdp=$_POST['mdp'];

$e=$_POST['eve'];


$bool=false;
$boolA=false;
$boolN=false;
$conn=mysqli_connect("dwarves.iut-fbleau.fr","mouhamad","mouhamad","mouhamad");
$priere=mysqli_query($conn,"SELECT nomE FROM Evenement where idEvent in ('$e')");
$mdpi=mysqli_query($conn,"SELECT loginU, pswdU FROM Utilisateur");
$aff=mysqli_query($conn,"SELECT loginM,presence FROM Presence where dateEF in ('$e')");
foreach($mdpi as $is){
   if($login==$is['loginU'] AND $mdp==$is['pswdU']){
  $bool=true;
 echo "<p>Vous etes bien user</p>";
      }
  }
if($bool==false){
   echo "<p>Vous n'etes user</p>";
}
  if($bool==true){
    foreach($priere as $res){
      $pt=$res['nomE'];
      $team=mysqli_query($conn,"SELECT loginM FROM Membre where nomE in ('$pt')");
      foreach($team as $resain){
        if($login==$resain['loginM']){
          $boolA=true;
        }
        
      }
      if($boolA==true){
        echo "t dans la team";
        echo "<table style='border: 1px solid #ddd;
    text-align: center;border-collapse: collapse;
    width: 90%;margin:auto'>
  <tr style='background-color: #20B2AA;
    color: white;border: 1px solid #ddd;
    text-align: center;height:45px'>
  <th>Login</th>
  <th>Present</th>
  </tr>";
       foreach($aff as $is){
           echo "<tr style='border: 1px solid #ddd;
    text-align: center;height:45px'>";
  echo "<td style='border: 1px solid #ddd;'>".$is['loginM']."</td>";
    echo "<td style='border: 1px solid #ddd;'>".$is['presence']."</td>";
    
  
      
    echo "</tr>"; 
         
       }
        echo "</table>";
      }
      if($boolA==false){
        echo "t'es pas dans la team";
      }
      
    }  
 
  }

if($bool=false){
  echo "t'existe pas";
}
  
  
?>