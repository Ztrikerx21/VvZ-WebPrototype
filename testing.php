<?php
class card{
  public $type = "";
  public $id = "";
  public $name = "";
  public $quick = "";
  public $target = "";
  public $description = "";

   public function  __construct($type, $id, $name, $quick, $target, $description){
    $this->type = $type;
    $this->id = $id;
    $this->name = $name;
    $this->quick = $quick;
    $this->target = $target;
    $this->description = $description;
  }

}


$type = "blessing";
$id = "id";
$name = "name";
$quick = "yes";
$target = "target";
$description = "lols";


$_SESSION["cardBlessing"][] = new card($type, $id, $name, $quick, $target, $description);

$type = "blessing2";
$id = "id2";
$name = "name2";
$quick = "yes2";
$target = "target2";
$description = "lols2";


$_SESSION["cardBlessing"][] = new card($type, $id, $name, $quick, $target, $description);

echo current($_SESSION["cardBlessing"])->id;
next($_SESSION["cardBlessing"]);
echo current($_SESSION["cardBlessing"])->id;
echo key($_SESSION["cardBlessing"]);
$_SESSION["index"] = 0;
echo $_SESSION["index"];
$_SESSION["index"] = $_SESSION["index"] +1;
echo $_SESSION["index"];
echo json_encode($_SESSION["cardBlessing"]);

$fcontent = "ID\tName\tQuick\tTarget\tDescription";
$type = "blessing";
$id = strtok($fcontent, "\t");
$temp = strtok("\t");
$name = $temp;
$temp = strtok("\t");
$quick = $temp;
$temp = strtok("\t");
$target = $temp;
$temp = strtok("\t");
$description = $temp;
echo"<br>";
echo $id;
echo"<br>";
echo $name;
echo"<br>";
echo $quick;
echo"<br>";
echo $target;
echo"<br>";
echo $description
?>
<hrml>
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
var cardBlessing = [];
$(document).ready(function() {

cardBlessing.push({type:"Fiat", model:"500", color:"white"});
cardBlessing.push({type:"Fiat2", model:"5002", color:"white2"});
document.getElementById("demo").innerHTML = cardBlessing[1].type;
});
</script>
</head>
<body>
  <hr>
<p id="demo"></p>
</body>
</html>
