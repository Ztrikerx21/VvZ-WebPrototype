<?php
//reset all dice1b
if(!empty($_GET["resetDice"])){
  session_unset();
  session_destroy();
}

function diceType($i,$dice){
  //%dice es zdice o dice para saber el dado de quien se modifica
  echo "
  <option value='" . $_SESSION[$dice][$i] . "'>" . $_SESSION[$dice][$i] . "</option>
  <option value='d4'>d4</option>
  <option value='d4+1'>d4+1</option>
  <option value='d4+2'>d4+2</option>
  <option value='d4+4'>d4+4</option>
  <option value='d4x2'>d4x2</option>
  <option value='d6'>d6</option>
  <option value='d6+1'>d6+1</option>
  <option value='d6+2'>d6+2</option>
  <option value='d10max8'>d10max8</option>
  <option value='d12min3'>d12min3</option>
  <option value='d3'>d3</option>
  <option value='3d3'>3d3</option>
  ";
}
function roll($a, $b){
  return (rand(1,$a) + $b);
}
function rolld10(){
  $num = rand(1,8);
  if($num>8) $num = 8;
  return $num;
}
function rolld12(){
  $num = rand(1,12);
  if($num<3) $num = 3;
  return $num;
}
function rollDice($type){
  $result = "Not Found";
  switch($type){
    case "d4": $result = roll(4,0);
    break;
    case "d4+1": $result = roll(4,1);
    break;
    case "d4+2": $result = roll(4,2);
    break;
    case "d4+4": $result = roll(4,4);
    break;
    case "d4x2": $result = (roll(4,0)+roll(4,0));
    break;
    case "d6": $result = roll(6,0);
    break;
    case "d6+1": $result = roll(6,1);
    break;
    case "d6+2": $result = roll(6,2);
    break;
    case "d3": $result = roll(3,0);
    break;
    case "3d3": $result = (roll(3,0) + roll(3,0) + roll(3,0));
    break;
    case "d10max8": $result = rolld10();
    break;
    case "d12min3": $result = rolld12();
    break;

  }
  return $result;
}
if(empty($_SESSION["content"])){
  $_SESSION["content"] = "";
}

if(empty($_SESSION["dice"])){
  $_SESSION["dice"][0] = "d6";
  $_SESSION["dice"][1] = "d6";
  $_SESSION["dice"][2] = "d6";
  $_SESSION["dice"][3] = "d6";
}
if(empty($_SESSION["zdice"])){
  $_SESSION["zdice"][0] = "d6";
  $_SESSION["zdice"][1] = "d6";
  $_SESSION["zdice"][2] = "d6";
  $_SESSION["zdice"][3] = "d6";
}

//viking submit buttons
if(!empty($_GET["sub"])){
  $dice1 = rollDice($_SESSION["dice"][0]);
  $dice2 = rollDice($_SESSION["dice"][1]);
  $dice3 = rollDice($_SESSION["dice"][2]);
  $dice4 = rollDice($_SESSION["dice"][3]);

  $_SESSION["content"] = $_SESSION["dice"][0] .": ". $dice1 . "\t" .
  $_SESSION["dice"][1] .": ". $dice2 . "\t" .
  $_SESSION["dice"][2] .": ". $dice3 . "\t" .
  $_SESSION["dice"][3] .": ". $dice4 . "\n" . $_SESSION["content"];
}elseif (!empty($_GET["dice"])) {

  $_SESSION["content"] = $_GET["dice"] .": ". rollDice($_GET["dice"]) . "\n" . $_SESSION["content"];

}elseif(!empty($_GET["subcha"])){
  $_SESSION["dice"][0] = $_GET["dice1"];
  $_SESSION["dice"][1] = $_GET["dice2"];
  $_SESSION["dice"][2] = $_GET["dice3"];
  $_SESSION["dice"][3] = $_GET["dice4"];
}
//zombie submit buttons
if(!empty($_GET["zsub"])){
  $dice1 = rollDice($_SESSION["zdice"][0]);
  $dice2 = rollDice($_SESSION["zdice"][1]);
  $dice3 = rollDice($_SESSION["zdice"][2]);
  $dice4 = rollDice($_SESSION["zdice"][3]);

  $_SESSION["content"] = $_SESSION["zdice"][0] .": ". $dice1 . "\t" .
  $_SESSION["zdice"][1] .": ". $dice2 . "\t" .
  $_SESSION["zdice"][2] .": ". $dice3 . "\t" .
  $_SESSION["zdice"][3] .": ". $dice4 . "\n" . $_SESSION["content"];
}elseif (!empty($_GET["zdice"])) {

  $_SESSION["content"] = $_GET["zdice"] .": ". rollDice($_GET["zdice"]) . "\n" . $_SESSION["content"];

}elseif(!empty($_GET["zsubcha"])){
  $_SESSION["zdice"][0] = $_GET["zdice1"];
  $_SESSION["zdice"][1] = $_GET["zdice2"];
  $_SESSION["zdice"][2] = $_GET["zdice3"];
  $_SESSION["zdice"][3] = $_GET["zdice4"];
}
?>
