function editPage($pagename){
  editMode();
  $.post('index.php/fgm/loadPage',
      {'pagename':$pagename},
      function(response){$('#editContent').append(response);});
}

function savePage($pagename){
  $content = $('#editContent').val();
  $.post('index.php/fgm/editPage',
      {'pagename':$pagename,'content':$content},
      function(response){loadPage('in');});
}

function loadPage($pagename){
  loadMode();
  $.post('index.php/fgm/loadPage',
      {'pagename':$pagename},
      function(response){
	var converter = new Showdown.converter();
	response = converter.makeHtml(response);
	$('#main').append(response);});
}

function editMode(){
  $('#main').hide();
  $('.btn').hide();
  $('#editContent').empty();
  $('#saveBtn').show();
  $('#editContent').show();
}

function loadMode(){
  $('#editContent').hide();
  $('.btn').hide();
  $('#main').empty();
  $('#main').show();
  $('#editBtn').show();
}

function init(){
  loadMode();
  loadPage();
}

function url(){
  $href = location.href ;
  $temp_arr = $href.split('/fgm.php/');
  if($temp_arr.length>1){
    loadPage($temp_arr[2]);
  }
}

$(document).ready(function(){
  init();
  $('#saveBtn').bind('click',function(){savePage('in');});
  $('#editBtn').bind('click',function(){editPage('in');});
});
