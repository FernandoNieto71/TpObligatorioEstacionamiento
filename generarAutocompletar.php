<?php
include_once "baseEstacionamiento.php";
$listadoPatentes=baseEstacionamiento::retornarListadoAutocomplit();

$textoDelArchivoJS="$(function(){
			  var patentes = [ 

			   $listadoPatentes 

			   
			  ];
			  
			  // setup autocomplete function pulling from patentes[] array
			  $('#autocomplete').autocomplete({
			    lookup: patentes,
			    onSelect: function (suggestion) {
			      var thehtml = '<strong>patente: </strong> ' + suggestion.value + ' <br> <strong>ingreso: </strong> ' + suggestion.data;
			      $('#outputcontent').html(thehtml);
			         $('#botonIngreso').css('display','none');
      						console.log('aca llego');
			    }
			  });
			  

			});";

$archivoJS=fopen("js/funcionAutoCompletar.js","w");
fwrite($archivoJS, $textoDelArchivoJS);
fclose($archivoJS);

?>