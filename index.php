<?php 
if(isset($_GET["page"])){
if($_GET["page"]=="list"){
  include("vistas/listado.php");
  
}else{
  include("vistas/principal.php");
}
}else{
  if(count($_POST)>0){
  if(isset($_POST["abrir"])){
    include_once("connect.php");
    include_once("menuClass.php");
    $database = new dataBase("test", "test", "prueba123");
    include("vistas/altas.php");
  }
  elseif(isset($_POST["nombre"])&& !isset($_POST["parentEdit"])){
  include_once("connect.php");
  $database = new dataBase("test", "test", "prueba123");
  $database->write($_POST["nombre"], $_POST["description"], $_POST["parent"]);
  }
  elseif(isset($_POST["mostrar"])){
  include_once("connect.php");
  $database = new dataBase("test", "test", "prueba123");
  $eco = $database->read_by_id($_POST["mostrar"])->get_description();
  echo $eco;
  }
  elseif(isset($_POST["parentEdit"])){
  include_once("connect.php");
  $database = new dataBase("test", "test", "prueba123");
  //edit_by_id($menu_id, $nombre, $descripcion, $parent)
  $database->edit_by_id($_POST["id"], $_POST["nombre"],
  $_POST["description"], $_POST["parentEdit"]);
  }
  elseif(isset($_POST["editar"])){
    include_once("connect.php");
    include_once("menuClass.php");
    $database = new dataBase("test", "test", "prueba123");
    include("vistas/editar.php");
  }
  elseif(isset($_POST["eliminar"])){
    include_once("connect.php");
    $database = new dataBase("test", "test", "prueba123");
    $database->delete_by_id($_POST["eliminar"]);
  }
}else{
  include("vistas/principal.php");
  
}
}