<?
class Fgm_model extends CI_Model
{
  function  __construct(){
    parent ::__construct(); 
  }


  function editPage($pagename,$content){
    $url = explode(':',$pagename);
    $length = count($url) - 1;
    $name = $url[$length];
    chdir('./source/');
    for($i=0;$i<$length;$i++){
      if(file_exists($url[$i])){
	chdir($url[$i]);
      }else{
	mkdir($url[$i]);
	chdir($url[$i]);
      }
    }
    $fp = fopen("$name.text",'a');
    fwrite($fp,$content);
    fclose($fp); 
  }

  function loadPage($pagename){
    chdir('./source');
    $url = explode(':',$pagename);
    $name = implode('/',$url);
    $fn = $name.'.text';
    if(is_file($fn)){
      $fp = fopen($fn,'r') ; 	
      $data = fread($fp,filesize($fn));
      fclose($fp);
    }else{
      $data = "file dosen't exist !"; 
    }
    return $data;
  }

}
?>
