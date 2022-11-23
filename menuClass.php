<?php

include_once("connect.php");
class Menu{
public $nombre;
public $description;
public $parent;
public $menu_id;  
  function __construct($menu_id = null, $nombre, $description, $parent){
  $this->menu_id = $menu_id;  
  $this->nombre = $nombre; 
  $this->description = $description; 
  $this->parent = $parent; 
  }
  function get_menu_id(){
  return $this->menu_id;  
  }
  function get_nombre(){
  return $this->nombre;  
  }
  function get_description(){
  return $this->description;  
  }
  function get_parent(){
  return $this->parent;  
  }
  function write(){
    
  }
}