 <?php
$login=$_POST['login'];
$mdp=$_POST['mdp'];

$e=$_POST['eve'];
$here=$_POST['presence'];

$bool=false;
$boolA=false;
$boolN=false;
$conn=mysqli_connect("dwarves.iut-fbleau.fr","mouhamad","mouhamad","mouhamad");
$priere=mysqli_query($conn,"SELECT nomE FROM Evenement where idEvent in ('$e')");
$mdpi=mysqli_query($conn,"SELECT loginU, pswdU FROM Utilisateur");

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
       $jpp=mysqli_query($conn,"insert into Presence (dateEF,loginM,presence) Values ('$e','$login','$here')");
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