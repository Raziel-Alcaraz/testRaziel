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
$ids =$database->get_all_ids(0);
if($ids==false){
?>
<h1>Aún no hay nada aquí</h1>
<p>Puedes <button onclick="verAltasWindow()">agregar un menú</button></p>

<?php 
}else{
?>
 <div id='topbar'>
   <div class="barranav">
     <a><button class="subnavbtn" onclick="verAltasWindow()">Agregar<i class="fa fa-caret-down"></i></button>
     </a>
 <a href="?"><button class="subnavbtn">Inicio<i class="fa fa-caret-down"></i></button>
 </a>
 </div></div>
<?php 

}
?>
<div id="tablaMain">
  <table>
  <thead></tr><th>ID</th><th>Nombre</th><th>Menú padre</th><th>Descripción</th><th>Acciones</th></tr></thead>
  <tbody>
  <?php
  foreach($ids as $value){
    ?>
    <tr><td><?php echo $value;?></td>
    <td><?php echo $database->read_name_by_id($value);?></td>
  <td><?php echo $database->read_name_by_id($database->read_by_id($value)->parent);?></td>
<td><?php echo $database->read_by_id($value)->description;?></td>
<td><button onclick="verEditWindow('<?php echo $value;?>')">Editar</button>
<button onclick="Eliminar('<?php echo $value;?>')">Eliminar</button></td></tr>
    <?php
  }  
  ?>
  </tbody>  
    
  </table>
</div>
<div id='resultados'>
</div>
</body>
<script src="functions.js"></script> 
</html> 