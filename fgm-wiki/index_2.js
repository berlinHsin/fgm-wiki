
function grab_url(){
  $url = location.href ;
  $temp = $url.splict('#');
  $page_name = '';
  if($temp[1]){
  	$page_name = $temp.splite('/');
  }else{
  	$page_name = 'index';
  }
  show_view($page_name);
}

function load(){

}

function edit(){

}
