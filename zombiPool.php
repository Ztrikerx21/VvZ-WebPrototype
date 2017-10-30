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
$file = fopen("resources/blessing.txt","r") or die("can't open file");
$titles = fgets($file);
$i=0;
while(!feof($file)){
  $fcontent = fgets($file);
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
$cardBlessing[] = new card($type, $id, $name, $quick, $target, $description);
}
fclose($file);
$file = fopen("resources/curse.txt","r") or die("can't open file");
$titles = fgets($file);
while(!feof($file)){
  $fcontent = fgets($file);
  $type = "curse";
  $id = strtok($fcontent, "\t");
  $temp = strtok("\t");
  $name = $temp;
  $temp = strtok("\t");
  $quick = $temp;
  $temp = strtok("\t");
  $target = $temp;
  $temp = strtok("\t");
  $description = $temp;
  $cardCurse[] = new card($type, $id, $name, $quick, $target, $description);
}
fclose($file);
shuffle($cardBlessing);
shuffle($cardCurse);


?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script type="text/javascript">
      $(document).ready(function() {

        //Asignar el array de PHP a JS
        var cardBlessing = <?php echo json_encode($cardBlessing); ?>;
        var cardCurse = <?php echo json_encode($cardCurse); ?>;
        var i=0;
        var j=0;
        var tempActive = false;//si hay un temp (gris), al dar click en cualquier carta, esta se debe transferir.
        var tempCardText = "";//holder del temp text
        var tempCardTitle = "";//holder del temp title
        var activeCard = "card1";


        function reprintCard(card) {
          $(card).attr("title", tempCardTitle);
          $(card).html(tempCard);
          $("#tempCard").attr("title", "none" );
          $("#tempCard").html("none");
          tempActive = false;
        }

        $(".card").click(function(){
          if(tempActive){
            if($(this).attr("id")=="card1"){
              reprintCard("#card1");
            }else if ($(this).attr("id")=="card2") {
              reprintCard("#card2");
            }else if ($(this).attr("id")=="card3") {
              reprintCard("#card3");
            }else if ($(this).attr("id")=="card4") {
              reprintCard("#card4");
            }else if ($(this).attr("id")=="card5") {
              reprintCard("#card5");
            }else if ($(this).attr("id")=="tempCard") {
              activeCard = $(this).attr("id");
              $(this).attr("style", "background-color:orange");
            }

          }else{
              //decide que carta es la activa de antemano y la pinta de su color original
              if(activeCard != ""){
                if(activeCard == "tempCard")$("#" + activeCard).attr("style", "background-color:litegray");
                else $("#" + activeCard).attr("style", "background-color:white");
              }
              //asigna la carta activa y pinta de naranja
              activeCard = $(this).attr("id");
              $(this).attr("style", "background-color:orange");
          }
        });
        $(".blessing").click(function(){
          //asignar el valor de la carta en la posicion [i]
          tempCard = cardBlessing[i].name + "<br>" + "type: " + cardBlessing[i].type + "<br>" + "target: " + cardBlessing[i].target + "<br>" + "Quick: " + cardBlessing[i].quick;
          tempCardTitle = cardBlessing[i].description;
          $("#tempCard").attr("title", tempCardTitle);
          $("#tempCard").html(tempCard);
          i++;
          tempActive = true;
        });
        $(".curse").click(function(){
          //asignar el valor de la carta en la posicion [i]
          tempCard = cardCurse[j].name + "<br>" + "type: " + cardCurse[j].type + "<br>" + "target: " + cardCurse[j].target + "<br>" + "Quick: " + cardCurse[j].quick;
          tempCardTitle = cardCurse[j].description;
          $("#tempCard").attr("title", tempCardTitle);
          $("#tempCard").html(tempCard);
          j++;
          tempActive = true;
        });

        $("#trashbin").click(function(){//Vacia la carta activa
          //Despinta la carta activa
          if(activeCard == "tempCard"){
              $("#" + activeCard).attr("style", "background-color:litegray");
              tempActive = false;
          }
          else {
            $("#" + activeCard).attr("style", "background-color:white");

          }

          //Vacia la carta activa
          $("#" + activeCard).attr("title", "none" );
          $("#" + activeCard).html("none");
          activeCard = "";
        });


    });
  </script>

  </head>
  <body>
    <main>
      <div id="cardHolder">
        <div class="card" id="card1">none</div>
        <div class="card" id="card2">none</div>
        <div class="card" id="card3">none</div>
        <div class="card" id="card4">none</div>
        <div class="card" id="card5">none</div>
        <div class="card" id="tempCard">none</div>
        <div id="trashbin" style="color:orange"><strong>Click aqui para borrar el naranja</strong></div>
      </div>
      <div id="decks">
        <div class="blessing">Blessing</div>
        <div class="curse">Curse</div>


      </div>
      <div class="lastCard"></div>
    </main>
  </body>


</html>
