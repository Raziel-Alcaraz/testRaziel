<!DOCTYPE html>
<?php include_once("menuClass.php");
$database = new dataBase("test", "test", "prueba123");
$database->crearTabla();
?>
<html>
<head>
  <title>Prueba técnica - lista</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   
   <link rel="stylesheet" href="estilos.css">
</head>
<body>
<?php 
$ids =$database->get_all_children_ids(0);
if($ids==false){
?>
<h1>Aún no hay nada aquí</h1>
<p>Puedes <button onclick="verAltasWindow()">agregar un menú</button></p>

<?php 
}else{
?>
 <div id='topbar'>
   <div class="barranav">
    <!-- 
     <div class="subnav">
       <button class="subnavbtn">About <i class="fa fa-caret-down"></i></button>
       <div class="subnav-content">
         <a ><button onclick="mostrar('id')">Company</button></a>
         <a >Team</a>
         <a >Careers</a>
       </div>
     </div>
     <div class="subnav">
       <button class="subnavbtn">Services <i class="fa fa-caret-down"></i></button>
       <div class="subnav-content">
         <a href="#bring">Bring</a>
         <a href="#deliver">Deliver</a>
         <a href="#package">Package</a>
         <a href="#express">Express</a>
       </div>
     </div>
     <div class="subnav">
       <button class="subnavbtn">Partners <i class="fa fa-caret-down"></i></button>
       <div class="subnav-content">
         <a href="#link1">Link 1</a>
         <a href="#link2">Link 2</a>
         <a href="#link3">Link 3</a>
         <a href="#link4">Link 4</a>
       </div>
     </div>
     <a href="#contact">Contact</a>
   </div>
   </div>
 -->
 <?php 
foreach($ids as $value){
  ?>
  <div class="subnav">
  <button class="subnavbtn" onclick="mostrar('<?php echo $value; ?>')"><?php echo $database->read_name_by_id($value); ?>
  <i class="fa fa-caret-down"></i></button>
  
  <?php
  $idsch =$database->get_all_children_ids($value);
  if($idsch !=false){
    ?><div class="subnav-content"><?php
        foreach($idsch as $child){
        ?>
        <a ><button onclick="mostrar('<?php echo $child; ?>')">
        <?php echo $database->read_name_by_id($child); ?></button></a>
        <?php 
        }
  ?>
  </div>
  <?php
}
     ?>
     </div>
   
   
   <?php
 }
 ?>
 <a><button class="subnavbtn" onclick="verAltasWindow()">Agregar<i class="fa fa-caret-down"></i></button>
 </a>
 <a href="?page=list"><button class="subnavbtn">Ver lista<i class="fa fa-caret-down"></i></button>
 </a>
 </div></div>
<?php 
}
?>

<div id='resultados'>
</div>
</body>
<script src="functions.js"></script> 
</html> 