$current = 'home' ;

function save($title){
	$.ajax({
		url:'php/save.php',
		dataType:'text',
		type:'POST',
		data:{
			text:$('#edit_content').val(),
			title:$title},
		success:function(){
			load($title);
			load_data_base();
			},
		error:function(){alert('error');}
	});
}
function edit($title){
	$.ajax({
		url:'php/edit.php',
		dataType:'text',
		type:'POST',
		data:{title:$title},
		success:function(res){
			document.getElementById('edit_content').value=res;
		},
		error:function(){
			alert('erre');
		}	
	});

}
function escapeHtml(unsafe) {
  return unsafe
  .replace(/&/g, "&amp;")
  .replace(/</g, "&lt;")
  .replace(/>/g, "&gt;")
}

function load($title){
	$.ajax({
		url:'php/load.php',
		dataType:'text',
		type:'POST',
		data:{title:$title},
		success:function(response){
			var converter = new Showdown.converter();
			var content = converter.makeHtml(escapeHtml(response));
			$('#content').html(content);
		},
		error:function(){
			alert('load erroe');
		}
	});
}
function change_page($title){
	$current = $title;
	load($title);
}
function check_url(){
	$url = location.href ;
	$temp = $url.split('?');
	if($temp[1]!=null){
		load($temp[1]);
		change_page($temp[1]);
	}else{
		location.href = location.href+"?home";
	}
}

function init(){
	$('.edit').hide();
	check_url();
}
$(document).ready(function(){
	init();
	$('#edit_button').click(function(){
		edit($current);
		$('#main').hide();
		$('#edit_button').hide();
		$('.edit').show();
	});	
	$("#sent").click(function(){
		save($current);
		$('#main').show();
		$('.edit').hide();
		$('#edit_button').show();
	});
	$('.logout').click(function(){
		$.ajax({
			url:'php/logout.php',
			success:function(){location.reload();},
		});
	});
});
