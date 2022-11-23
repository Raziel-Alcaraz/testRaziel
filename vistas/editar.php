<div id='altasWindow'>
  <div>Formulario</div>
  <form>
    <label>Menú padre</label> <select name='parent' id='parent'>
      <option value='0'></option>
    <?php
    
    $allIds = $database->get_all_children_ids(0);
    echo "count ids: ";var_dump($allIds);
    
    if($allIds!=false){
      foreach ($allIds as $value){
echo "<option value='".$value."'";
if($database->read_by_id($_POST["editar"])->parent == $value){
echo " selected ";  
}
echo ">".$database->read_name_by_id($value)."</option>";
}
}

    ?>
    </select>
    <label>Nombre</label>
    <input type="text" name="nombre" id="nombre" value="<?php echo $database->read_name_by_id($_POST["editar"]); ?>"><br>
    <input type="text" name="aidi" id="aidi" value="<?php echo $_POST["editar"]; ?>" hidden>
    <label>Descripción</label>
    <textarea name="description" id="description"><?php echo $database->read_by_id($_POST["editar"])->get_description(); ?></textarea><br>
    <button type="button" onclick='guardarDatosEditados()'>Guardar</button>
  </form>
  
</div>