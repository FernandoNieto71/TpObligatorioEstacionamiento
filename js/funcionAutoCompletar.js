$(function(){
			  var patentes = [ 

			   "vhs234","sss231","","tgv123","eee222","cdc444","ded444","","ere555","trt444","","frf","rrr333","tgb123","asd345","asd345","eee111","ddd111","www111","ggg444","ffr444","aqw333","ttt444", 

			   
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
			  

			});