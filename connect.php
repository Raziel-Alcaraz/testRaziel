<?php
class dataBase{
  public $dbname;
  public $user;
  public $password;
  public $dbh;
  
function  __construct($dbname, $user, $password){
  $this->dbname = $dbname;
  $this->user = $user;
  $this->password = $password;
  try {
      $dsn = "mysql:host=localhost;dbname=$dbname";
      $dbh = new PDO($dsn, $user, $password);
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
      $this->dbh = $dbh;
  } catch (PDOException $e){
      echo $e->getMessage();
  }  
  
}
function crearTabla(){
  try {
      $dsn = "mysql:host=localhost;dbname=$this->dbname";
      $dbh = new PDO($dsn, $this->user, $this->password);
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
      $statement = 'CREATE TABLE IF NOT EXISTS menues( 
            menu_id   INT AUTO_INCREMENT,
            name  VARCHAR(100) NOT NULL, 
            description VARCHAR(150) NULL, 
            parent   INT NULL,
            PRIMARY KEY(menu_id)
        );';
        $statement = $dbh->prepare($statement);
        $statement ->execute();
  } catch (PDOException $e){
      echo $e->getMessage();
  }
  
}
function write($name, $description, $parent){
  $sql = 'INSERT INTO menues(name, description, parent)
        VALUES(?,?,?)';
  $statement = $this->dbh->prepare($sql);
  $statement->execute([$name, $description, $parent]);
} 
function read_by_id($menu_id){
  include_once("menuClass.php");
  $sql = 'SELECT * FROM menues WHERE menu_id = ?';
  $statement = $this->dbh->prepare($sql);
  $statement->execute([$menu_id]);
  while ($objeto = $statement->fetch()){
    
    $retornoMenu =new Menu($menu_id, $objeto["name"], $objeto["description"], $objeto["parent"]);
    return $retornoMenu;
  }
} 
function delete_by_id($menu_id){
  include_once("menuClass.php");
  $sql = 'DELETE FROM menues WHERE menu_id = ?';
  $statement = $this->dbh->prepare($sql);
  $statement->execute([$menu_id]);
  while ($objeto = $statement->fetch()){
    
    
    return true;
  }
} 
function read_name_by_id($menu_id){
  $sql = 'SELECT * FROM menues WHERE menu_id = ?';
  $statement = $this->dbh->prepare($sql);
  $statement->execute([$menu_id]);
  while ($objeto = $statement->fetch()){
    $retorno = $objeto["name"];
    return $retorno;
  }
}
function edit_by_id($menu_id, $nombre, $descripcion, $parent){
  $sql = 'UPDATE menues set name=?,parent=?,description=? WHERE menu_id = ?';
  $statement = $this->dbh->prepare($sql);
  $statement->execute([$nombre, $parent, $descripcion,$menu_id]);
  while ($objeto = $statement->fetch()){
  return true;
    
    }
  
} 
function get_all_ids(){
  $sql = 'SELECT menu_id FROM menues ORDER BY parent DESC';
  $statement = $this->dbh->prepare($sql);
  $statement->execute();
  $retorno = array();
  while ($objeto = $statement->fetch()){
    array_push($retorno, $objeto["menu_id"]);
  }
  if(count($retorno)==0){
  return false;  
  }
  return $retorno;
}  
function get_all_children_ids($idParent){
  $sql = 'SELECT menu_id FROM menues WHERE parent = ?';
  $statement = $this->dbh->prepare($sql);
  $statement->execute([$idParent]);
  $retorno = array();
  while ($objeto = $statement->fetch()){
    array_push($retorno, $objeto["menu_id"]);
  }
  if(count($retorno)==0){
  return false;  
  }
  return $retorno;
} 
}