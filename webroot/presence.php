<!DOCTYPE html>
<html>
 <link href='http://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>
<style type="text/css">
#coach{
    width:450px;
    padding:30px;
    margin:40px auto;
    background: #FFF;
    border-radius: 10px;
    -webkit-border-radius:10px;
    -moz-border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.13);
    -moz-box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.13);
    -webkit-box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.13);
}
#coach .inner-wrap{
    padding: 30px;
    background: #F8F8F8;
    border-radius: 6px;
    margin-bottom: 15px;
}
.form-style-10 h1{
    background: #2A88AD;
    padding: 20px 30px 15px 30px;
    margin: -30px -30px 30px -30px;
    border-radius: 10px 10px 0 0;
    -webkit-border-radius: 10px 10px 0 0;
    -moz-border-radius: 10px 10px 0 0;
    color: #fff;
    text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.12);
    font: normal 30px 'Bitter', serif;
    -moz-box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.17);
    -webkit-box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.17);
    box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.17);
    border: 1px solid #257C9E;
}
.form-style-10 h1 > span{
    display: block;
    margin-top: 2px;
    font: 13px Arial, Helvetica, sans-serif;
}
#coach label{
    display: block;
    font: 13px Arial, Helvetica, sans-serif;
    color: #888;
    margin-bottom: 15px;
}
#coach input[type="text"],
#coach input[type="password"],
#coach textarea,
#coach select {
    display: block;
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    width: 100%;
    padding: 8px;
    border-radius: 6px;
    -webkit-border-radius:6px;
    -moz-border-radius:6px;
    border: 2px solid #fff;
    box-shadow: inset 0px 1px 1px rgba(0, 0, 0, 0.33);
    -moz-box-shadow: inset 0px 1px 1px rgba(0, 0, 0, 0.33);
    -webkit-box-shadow: inset 0px 1px 1px rgba(0, 0, 0, 0.33);
}
#coach .section {
    font: normal 20px 'Bitter', serif;
    color: #2A88AD;
    margin-bottom: 5px;
}
#coach .section span {
    background: #2A88AD;
    padding: 5px 10px 5px 10px;
    position: absolute;
    border-radius: 50%;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border: 4px solid #fff;
    font-size: 14px;
    margin-left: -45px;
    color: #fff;
    margin-top: -3px;
}
#coach input[type="button"], 
#coach input[type="submit"]{
    background: #2A88AD;
    padding: 8px 20px 8px 20px;
    border-radius: 5px;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    color: #fff;
    text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.12);
    font: normal 30px 'Bitter', serif;
    -moz-box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.17);
    -webkit-box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.17);
    box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.17);
    border: 1px solid #257C9E;
    font-size: 15px;
}
#coach input[type="button"]:hover, 
#coach input[type="submit"]:hover{
    background: #2A6881;
    -moz-box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.28);
    -webkit-box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.28);
    box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.28);
}
</style>
<body>
   
   
   
   <form action="action6.php" method="POST" id="coach"> 
      <div class="form-style-10">
   <h1>Indiquez votre presence a un evenement
       <span>Rappel vous devez faire parti de l'equipe</span></h1>
    </div>
   <br>
    <div class="section"><span>1</span>Vos Identifiants</div><br><br> 
      <div class="inner-wrap">
     <label>Login:<br>
       <input type="text" name="login" required></label>
  <br>
    
  <label>Mot de Passe:<br>
    <input type="password" name="mdp" required></label>
  <br>
     </div>
      <div class="section"><span>2</span>Votre presence</div><br><br>
      <div class="inner-wrap">
     <label>Evenement:<br>
       <?php
       $conn=mysqli_connect("dwarves.iut-fbleau.fr","mouhamad","mouhamad","mouhamad");
       $res=mysqli_query($conn,"select dateE,hdebut,hfin,nomE,idEvent from Evenement");
       echo "<select name='eve'>";
       foreach($res as $is){
         $ev=$is['dateE'];
         $deb=$is['hdebut'];
         $fin=$is['hfin'];
         $nom=$is['nomE'];
         $even=$is['idEvent'];
         $all=$ev." debut a ".$deb." fin a ".$fin." equipe ".$nom;
         
         echo "<option value='$even'>$all</option>";
         
       }
       echo "</select>";
       ?>
    <br>
     
     <label>Presence:<br>
      <input type="radio" name="presence" value="Oui" checked>Oui<br>
<input type="radio" name="presence" value="Non">Non<br>
     </div>
     <br><br>
       <input type="submit" value="Indiquer Presence">
   </form> 
  </body>
</html>