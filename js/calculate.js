$(document).ready(function (){
var lang='';
	$('#getignouPageId').click( function () {$('#stuDetailId').fadeOut('slow');$('#mainDiv').fadeOut('slow');$('#resultDivTmp').fadeIn('slow');})
	$('#getresultId').click( function () {$('#resultDivTmp').fadeOut('slow');$('#stuDetailId').fadeIn('slow');$('#mainDiv').fadeIn('slow');})
	$("#enrolId").blur(function (){});
	$('#buttonAjax').click( function () { 
		var enrollment = $("#enrolId").val();
		var course = $('input:radio:checked').val();
		if (enrollment == '' || course == null ){ alert("Enter your Enrollment No OR Choose your appropriate Course"); return false;}
		$('#resultId').fadeOut();
		$('#mainDiv').fadeOut();
		$('#stuDetailId').fadeOut();
		$('#resultDivTmp').fadeOut();
		$('#mca').fadeOut();
		$('#bca').fadeOut();
	
		$.ajax({ 
			type: "POST", 
			url: "ignou.php", 
			data: {"enrol": enrollment,"course":course},
			datatype : "json",
			beforeSend: function(){
				$('#loader').html('<img src="/images/progress.gif" />');
			},
			success: function (data) {
				var obj = $.parseJSON(data);
				if(obj=='false'){  $('#resultId').fadeOut();$('#prasantId').fadeIn(); alert("IGNOU responded =>'Enrolment Number Not found....' Either enrollment no or course is wrong.");  return false}
				else{ $('#resultId').fadeIn();$('#mainDiv').fadeIn(); $('#stuDetailId').fadeIn();$('#prasantId').fadeOut();}
				var d=obj.d;$('#stuDetailId td').filter(':eq(1)').html(d.en).end().filter(':eq(3)').html("<address>"+d.cu+"</address>").end().filter(':eq(5)').html(d.na).end().filter(':eq(7)').text(d.em).end().filter(':eq(9)').text(d.fa).end().filter(':eq(11)').text(d.mo).end();
				if(obj.c =='BCA'){
					alert($('#bca').fadeIn().length);

				}
				if(obj.c =='MCA'){
				$.each(obj.m, function(i,item){
					$('#'+item.cc+'A').val(item.a1);
					$('#'+item.cc).children(':eq(3)').text(item.ac);
					$('#'+item.cc).children(':eq(10)').text(item.tc);
					$('#'+item.cc).children(':eq(11)').text(item.total);
					$('#'+item.cc).children(':eq(13)').text(item.p);
					$('#'+item.cc).children(':eq(14)').text(item.s);
					$('#'+item.cc+'T').val(item.t);
					switch(item.cc){
						case 'MCSL016':
						$('#'+item.cc+'L1').val(item.l1); break;
						case 'MCSL017':
						case 'MCSL045':
						case 'MCSL054':
						$('#'+item.cc+'L1').val(item.l1);
						$('#'+item.cc+'L2').val(item.l2); break;
						case 'MCSL025':
						$('#'+item.cc+'L1').val(item.l1);
						$('#'+item.cc+'L2').val(item.l2);
						$('#'+item.cc+'L3').val(item.l3);
						$('#'+item.cc+'L4').val(item.l4); break;
						case 'MCSL036':
						$('#'+item.cc+'L1').val(item.l1);
						$('#'+item.cc+'L2').val(item.l2);
						$('#'+item.cc+'L3').val(item.l3); break;
            case 'MCSP060':
            $('#'+item.cc).children(':eq(3)').text('');
            $('#'+item.cc).children(':eq(10)').text('');
            $('#'+item.cc+'L').val(item.l4); break;
					}});$('#mca').fadeIn(); } 
				$.ajax({
					type:"POST",
					url:"ignou.php",
					data:{"enrol": enrollment,"course":course,"type":"getHtml"},
					datatype:"text/html",
					success: function(htmlData){ $("#resultDivTmp").html(htmlData);	}
				})},
			complete:function(){ $('.contentarea').modal("hide");},			
			error: function () { alert("someting failed") } 
		}); 
		return false })
});
