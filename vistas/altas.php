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
echo "<option value='".$value."'>".$database->read_name_by_id($value)."</option>";
}
}

    ?>
    </select>
    <label>Nombre</label>
    <input type="text" name="nombre" id="nombre"><br>
    <label>Descripción</label>
    <textarea name="description" id="description"></textarea><br>
    <button type="button" onclick='guardarDatos()'>Guardar</button>
  </form>
  
</div>