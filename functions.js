function verAltasWindow(){
  cerrarToast();
  console.log("jala js");
  var toast = document.createElement("div");
  toast.id= "toast";
  $.post(window.location.href.replace("page=list",""),{
  abrir: "altasWindow"
  }, function(data, status){
   console.log("Data: " + data + "\n");
   quedice = data;
   toast.innerHTML = quedice;
  $("body").append(toast);
  var cerrar = document.createElement("button");
  cerrar.innerHTML = "x";
  cerrar.id= "cerrarToast";
  
  toast.append(cerrar);
  $("#cerrarToast").click(function(){
  cerrarToast();
  });
  });
}
function verEditWindow(cual){
  cerrarToast();
  console.log("jala js");
  var toast = document.createElement("div");
  toast.id= "toast";
  $.post(window.location.href.replace("page=list",""),{
  editar: cual
  }, function(data, status){
   console.log("Data: " + data + "\n");
   quedice = data;
   toast.innerHTML = quedice;
  $("body").append(toast);
  var cerrar = document.createElement("button");
  cerrar.innerHTML = "x";
  cerrar.id= "cerrarToast";
  
  toast.append(cerrar);
  $("#cerrarToast").click(function(){
  cerrarToast();
  });
  });
}
function Eliminar(cual){
  cerrarToast();
  console.log("jala js");
  var toast = document.createElement("div");
  toast.id= "toast";
  $.post(window.location.href.replace("page=list",""),{
  eliminar: cual
  }, function(data, status){
   window.location.assign(window.location.href);
  });
}
function cerrarToast(){
  console.log("debe borrarse esa madre");
  $("#toast").remove();
}
function guardarDatos(){
  $.post(window.location.href.replace("page=list",""),{
  parent: $("#parent").val(),
  nombre: $("#nombre").val(),
  description: $("#description").val(),
  }, function(data, status){
   console.log("Data: " + data + "\n");
   window.location.assign(window.location.href);
    });
  
  
}
function guardarDatosEditados(){
  $.post(window.location.href.replace("page=list",""),{
  parentEdit: $("#parent").val(),
  nombre: $("#nombre").val(),
  description: $("#description").val(),
  id: $("#aidi").val()
  }, function(data, status){
   console.log("Data: " + data + "\n");
   window.location.assign(window.location.href);
    });
  
  
}
function mostrar(cual){
console.log(cual); 
$.post(window.location.href,{
mostrar: cual
}, function(data, status){
 console.log("Data: " + data + "\n");
 quedice = data;
$("#resultados").html(quedice);
}); 
}
