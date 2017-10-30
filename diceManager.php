<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>

  </head>
  <body>
    <main>



    <?php
      require "diceFunctions.php";
     ?>
     <h2>Viking Dice</h2>
     <form method="get">

       <!--Change dice starts here-->
       <input type="submit" name="cha" value="Change Dice" ><br>
       <?php
          if(!empty($_GET["cha"])){
       ?>
        <select name="dice1">
         <?php diceType(0,"dice"); ?>
        </select>
        <select name="dice2">
          <?php diceType(1,"dice"); ?>
        </select>
        <select name="dice3">
          <?php diceType(2,"dice"); ?>
        </select>
        <select name="dice4">
          <?php diceType(3,"dice"); ?>
        </select>
        <input type="submit" name="subcha" value="submit"><br>
       <?php
          }
        ?>
        <!--Change dice ends here-->

        <!--dice buttons starts here-->
       <input type="submit" name="dice" value="<?php echo $_SESSION["dice"][0];?>" >
       <input type="submit" name="dice" value="<?php echo $_SESSION["dice"][1];?>" >
       <input type="submit" name="dice" value="<?php echo $_SESSION["dice"][2];?>" >
       <input type="submit" name="dice" value="<?php echo $_SESSION["dice"][3];?>" >
       <input type="submit" name="sub" value="submit all">
       <!--dice buttons ends here-->
     <h2>Zombie Dice</h2>
       <!--Change dice starts here-->
       <input type="submit" name="zcha" value="Change Dice" ><br>
       <?php
          if(!empty($_GET["zcha"])){
       ?>
        <select name="zdice1">
         <?php diceType(0,"zdice"); ?>
        </select>
        <select name="zdice2">
          <?php diceType(1,"zdice"); ?>
        </select>
        <select name="zdice3">
          <?php diceType(2,"zdice"); ?>
        </select>
        <select name="zdice4">
          <?php diceType(3,"zdice"); ?>
        </select>
        <input type="submit" name="zsubcha" value="submit"><br>
       <?php
          }
        ?>
        <!--Change dice ends here-->

        <!--dice buttons starts here-->
       <input type="submit" name="zdice" value="<?php echo $_SESSION["zdice"][0];?>" >
       <input type="submit" name="zdice" value="<?php echo $_SESSION["zdice"][1];?>" >
       <input type="submit" name="zdice" value="<?php echo $_SESSION["zdice"][2];?>" >
       <input type="submit" name="zdice" value="<?php echo $_SESSION["zdice"][3];?>" >
       <input type="submit" name="zsub" value="submit all">
       <!--dice buttons ends here-->
     </form>
     <!--print them dice here-->
     <textarea name="area1" cols="60" rows="5"><?php echo $_SESSION["content"]; ?></textarea>
     </main>
     <form method="get">
       <input type="submit" value="Reset Dice" name="resetDice">

     </form>
  </body>


</html>
