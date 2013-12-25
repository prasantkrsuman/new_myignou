$(document).ready(function (){
	var enrolmnt = ["084279608"];
	$( "#enrolId" ).autocomplete({
		source: function( request, response ) {
	    $.ajax({
	      type: "POST",
	      url: "ajax_search_suggest.php",
	      dataType: "json",
	      data: { 
	      	'callback': "enrolment",
	      	'q' : request.term
	  			},
	      success: function( dataxyz ) {
	      	if (!dataxyz) {return false};
	      	
	        response( $.map( dataxyz, function( item ) {
	        	// console.log(item.enrol +  ", "+item.course);
	          return {
	            label: item.name + "/" +item.enrol + "/" + item.course,
	            value: item.enrol,
		    course:item.course
	          }
	        }));
	      }
	    });
	  	},
      	minLength: 2,
      select: function( event, ui ) {
      	$(this).val(ui.item.enrol); $('#course').val(ui.item.course).attr('selected');
        },
      open: function() {
        $( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
      },
      close: function() {
        $( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
      }
    });

	    
	$('form').submit(function() {
	  var toPost = $(this).serializeArray();
	  	$.ajax({
					type:"POST",
					url:"ignourecal.php",
					data: toPost,
					datatype:"text/html",
					success : function (htmlData){
					//console.log(htmlData); 
						var obj = $.parseJSON(htmlData);
						var sumMCA = 0;
						var sumBCA = 0;
						var courseMca = ["MCS011","MCS012","MCS013","MCS014","MCS015","MCS021","MCS022","MCS023","MCS024","MCS031","MCS032","MCS033","MCS034","MCS035","MCS041","MCS042","MCS043","MCS044","MCS051","MCS052","MCS053","MCSE003","MCSE004","MCSE011","MCSL016","MCSL017","MCSL025","MCSL036","MCSL045","MCSL054","MCSP060"];
						var courseBca= ["BSHF1","BCS61","CS5","CS6","CS60","CS610","CS611","CS612","CS62","CS63","CS64","CS65","CS66","CS67","CS68","CS70","CS71","CS72","CS73","CS74","CS75","CS76","FHS1","FST1"];
						$.each(obj,function(i,j){
							if($.inArray(j.cc,courseMca) > -1 ){
								console.log(i,j);
								sumMCA+=j.total;
								$('#'+j.cc+' td:eq(8)').text(j.ac);
								$('#'+j.cc+' td:eq(9)').text(j.tc);
								$('#'+j.cc+' td:eq(10)').text(j.total);
								$('#'+j.cc+' td:eq(12)').text(j.p+' %');
							}
							if ($.inArray(j.cc,courseBca) > -1) {
								console.log(i,j);
								if(j.cc == 'CS76'){  
								var y=Math.round(j.total/4);  $('#'+j.cc+' td:eq(9)').html(j.s); 
								$('#'+j.cc+'P').val(j.p).parent().next().html('<b>'+j.total+ '</b>').next().next().next().html( '<b>'+y+'</b>').addClass('res');$('#'+j.cc+'T').val(j.t);}
								$('#'+j.cc+'td:eq(4)').text(j.af);
								$('#'+j.cc+'td:eq(6)').text(j.tf);
								$('#'+j.cc+'td:eq(8)').text(j.pf);
								$('#'+j.cc+' td:eq(9)').html('<b>'+j.total+ '</b>');
								var fm = $('#'+j.cc+' td:eq(10)').html();var wt = $('#'+j.cc+' td:eq(11)').html();
								var perF = Math.round(((j.total/fm)*wt)); sumBCA+=perF;
								$('#'+j.cc+' td:eq(12)').html('<b>'+perF+' %</b>').addClass('res'); 
								$('#'+j.cc+' td:eq(13)').html(j.s);
							}

						});
						},
					complete : function(){},
					error : function(){} 
				});

	  return false;
	});
	$('#buttonAjax').click( function () {
		var courseMca= ["MCS011","MCS012","MCS013","MCS014","MCS015","MCS021","MCS022","MCS023","MCS024","MCSL016","MCSL017","MCSL025"];
		var courseCode = ["MCS011","MCS012","MCS013","MCS014","MCS015","MCS021","MCS022","MCS023","MCS024","MCS031","MCS032","MCS033","MCS034","MCS035","MCS041","MCS042","MCS043","MCS044","MCS051","MCS052","MCS053","MCSE003","MCSE004","MCSE011","MCSL016","MCSL017","MCSL025","MCSL036","MCSL045","MCSL054","MCSP060"];
		var courseBca= ["BSHF1","BCS61","CS5","CS6","CS60","CS610","CS611","CS612","CS62","CS63","CS64","CS65","CS66","CS67","CS68","CS70","CS71","CS72","CS73","CS74","CS75","CS76","FHS1","FST1"];
		var enrollment = $.trim($("#enrolId").val());
		var course = $('option:selected').val(); //alert(enrollment+course);
		if (enrollment == "" || course == "" ){ alert("Enter your Enrollment No OR Choose your appropriate Course"); return false;}
		$('#stuDetailId').fadeOut();
		$('#stuMarksId').fadeOut();
		$('#bca').fadeOut();
		$('#mca').fadeOut();
		$('#mcatoggle').fadeOut();

		$.ajax({ 
			type: "POST", 
			url: "ignou.php", 
			data: {"enrol": enrollment,"course":course,"type":"show"},
			datatype : "json",
			beforeSend: function(){ $('#loader').html('<img src="/images/progress.gif" />');},
			success: function (data) {
				//console.log(data); 
				var obj = $.parseJSON(data); //alert (typeof obj);
				if(obj == null){$('#topId').fadeIn(); alert("IGNOU responded =>'Enrolment Number Not found....' Either enrollment no or course is wrong."); return false}
				$('#topId').fadeOut();
				var name = obj.d.na;
				var percentBCA = 0;
				var percentMCA = 0;
				var percent = '';
				var d=obj.d;$('#stuDetailId td').filter(':eq(1)').html(d.en).end().filter(':eq(3)').html(d.cu).end().filter(':eq(5)').html(d.na).end().filter(':eq(7)').text(d.em).end().filter(':eq(9)').text(d.fa).end().filter(':eq(11)').text(d.mo).end();
				if(obj.c =='BCA' || obj.b != null ){
					var bcaMarks;
					if (obj.c =='MCA'){ bcaMarks= obj.b;}else{ $('#mca').fadeOut();bcaMarks= obj.m; }
					var sumBCA=0; 
					$.each(bcaMarks, function(k,j){
					if($.inArray(j.cc,courseBca) > -1 ){courseBca.splice($.inArray(j.cc,courseBca),1);}
					if(j.cc == 'CS76'){  var y=Math.round(j.total/4); sumBCA+=y; $('#'+j.cc+' td:eq(9)').html(j.s); 
					$('#'+j.cc+'P').val(j.p).parent().next().html('<b>'+j.total+ '</b>').next().next().next().html( '<b>'+y+'</b>').addClass('res');$('#'+j.cc+'T').val(j.t); }else {
					$('#'+j.cc+'A1').val(j.a1);
					$('#'+j.cc+'A2').val(j.a2).parent().next().text(j.af);
					$('#'+j.cc+'T').val(j.t).parent().next().text(j.tf);
					$('#'+j.cc+'P').val(j.p).parent().next().text(j.pf);
					$('#'+j.cc+' td:eq(9)').html('<b>'+j.total+ '</b>');
					$('#'+j.cc+' td:eq(13)').html(j.s);
					var fm = $('#'+j.cc+' td:eq(10)').html();var wt = $('#'+j.cc+' td:eq(11)').html();
					var perF = Math.round(((j.total/fm)*wt)); sumBCA+=perF;
					$('#'+j.cc+' td:eq(12)').html('<b>'+perF+'</b>').addClass('res'); }	}); 
					if($.inArray('FHS1',courseBca) >-1){$('#FHS1').hide();$('#BSHF1').show();}else{ $('#BSHF1').hide();$('#FHS1').show();}
					$.each(courseBca,function(m,n){
					if(n=='CS76'){$('#'+n+'P').val('').parent().next().html('').next().next().next().html('').removeClass('res');$('#'+n+'T').val('');}else{
					$('#'+n+'A1').val('');
					$('#'+n+'A2').val('').parent().next().text('').next(':eq(5)').text('');
					$('#'+n+'T').val('').parent().next().text('');
					$('#'+n+'P').val('').parent().next().text('');
					$('#'+n+' td:eq(9)').val('').html('');
					$('#'+n+' td:eq(12)').html('').removeClass('res'); 
					$('#'+n+' td:eq(13)').html('');	} });
					percentBCA = (sumBCA/12).toFixed(2);
					percent = (sumBCA/12).toFixed(2);
					$('#gtA td:eq(4)').html(sumBCA).next().html((sumBCA/12).toFixed(2)+' %').addClass('res');
					$('#bca').fadeIn();
				}
				if(obj.c =='MCA'){
					$('#bca').fadeOut(); 
					var sumMarks=0; 
					$.each(obj.m, function(i,item){
					sumMarks+=item.total;
					if($.inArray(item.cc,courseCode) > -1 ){courseCode.splice($.inArray(item.cc,courseCode),1);}
					$('#'+item.cc+'A').val(item.a1);
					$('#'+item.cc+' td:eq(8)').text(item.ac);
					$('#'+item.cc+' td:eq(9)').text(item.tc);
					$('#'+item.cc+' td:eq(10)').text(item.total);
					$('#'+item.cc+' td:eq(12)').text(item.p+' %');
					$('#'+item.cc+' td:eq(13)').text(item.s);
					$('#'+item.cc+'T').val(item.t);
					switch(item.cc){
						case 'MCSL016':
						$('#'+item.cc+'L1').val(item.l1); break;
						case 'MCSL017':	case 'MCSL045': case 'MCSL054':
						$('#'+item.cc+'L1').val(item.l1); $('#'+item.cc+'L2').val(item.l2); break;
						case 'MCSL025':
						$('#'+item.cc+'L1').val(item.l1);$('#'+item.cc+'L2').val(item.l2);$('#'+item.cc+'L3').val(item.l3);$('#'+item.cc+'L4').val(item.l4); break;
						case 'MCSL036':
						$('#'+item.cc+'L1').val(item.l1);$('#'+item.cc+'L2').val(item.l2);$('#'+item.cc+'L3').val(item.l3); break;
						case 'MCS044':
						$('#'+item.cc+'L').val(item.l4); break;
            			case 'MCSP060':
            			$('#'+item.cc+' td:eq(8)').text('');$('#'+item.cc+' td:eq(9)').text('');$('#'+item.cc+'L').val(item.l4); break;
					}});
					$.each(courseCode , function(i,it){
					$('#'+it+'A').val('');
					$('#'+it+' td:eq(8)').text('');
					$('#'+it+' td:eq(9)').text('');
					$('#'+it+' td:eq(10)').text('');
					$('#'+it+' td:eq(12)').text('');
					$('#'+it+' td:eq(13)').text('');
					$('#'+it+'T').val('');
					switch(it){
						case 'MCSL016':
						$('#'+it+'L1').val(''); break;
						case 'MCSL017':	case 'MCSL045': case 'MCSL054':
						$('#'+it+'L1').val(''); $('#'+it+'L2').val(''); break;
						case 'MCSL025':
						$('#'+it+'L1').val('');$('#'+it+'L2').val('');$('#'+it+'L3').val('');$('#'+it+'L4').val(''); break;
						case 'MCSL036':
						$('#'+it+'L1').val('');$('#'+it+'L2').val('');$('#'+it+'L3').val(''); break;
            			case 'MCSP060':
            			$('#'+it+' td:eq(8)').text('');$('#'+it+' td:eq(9)').text('');$('#'+it+'L').val(''); break;} });
					percentMCA = (sumMarks/28).toFixed(2);
					percent = (sumMarks/28).toFixed(2); //console.log(percent);
					$('#totalMca td:eq(2)').html(sumMarks);$('#totalMca td:eq(4)').html((sumMarks/28).toFixed(2)+' %').addClass('res');$('#mca').fadeIn(); 
				}
				if((typeof obj.b !== 'undefined')){
					$('#bca').fadeIn();
					$('#mcatoggle').fadeIn();
					var bcamca = Math.round(percentBCA*10);
					sumMarks += bcamca;
					$.each(courseMca, function(e,f){ $('#'+f).fadeOut(); }); 
					$('#mcatoggle td:eq(2)').text(bcamca);
					$('#mcatoggle td:eq(4)').text(percentBCA+'%').addClass('res');
					percent = (sumMarks/28).toFixed(2); //console.log(percent);
					$('#totalMca td:eq(2)').html(sumMarks);$('#totalMca td:eq(4)').html((sumMarks/28).toFixed(2)+' %').addClass('res');


				}
				$('#stuDetailId').fadeIn();$('#stuMarksId').fadeIn();
				$.ajax({
					type:"POST",
					url:"ignou.php",
					data:{"enrol": enrollment,"course":course,"type":"getHtml"},
					datatype:"text/html",
					success : function (htmlData){ 
						$('#resultTmp').html(htmlData);},
					complete : function(){},
					error : function(){} 
				});
				$.ajax({
							type: "POST", 
							url: "ignou.php", 
							data: {"enrol": enrollment,"course":course,"percent":percent,"name":name,"type":"update"},
							datatype : "text/html",
							success: function (data1) { //console.log(data1); 
							}
						});
					},
			complete:function(){ $('.contentarea').modal("hide");},			
			error: function () { alert("someting failed"); return false;} 
		});

		
	return false  });

});
