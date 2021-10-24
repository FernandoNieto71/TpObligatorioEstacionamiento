$(function(){
			  var patentes = [ 

			   'HZS696','JDL465','AB343DS','ab123rs','ab124rs','ab125rs','jdl866','vpu677','ab345re','tsi444','ery555','eri555','jjj444','kli222','aaa111','ab127rd','a','qwe333','brb565','brb564','rrr555','ttt666','ttt555','ttt878','ccc555','ccc444','jdl343','ppp333','vvv444','iii345','trt400',

			   
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