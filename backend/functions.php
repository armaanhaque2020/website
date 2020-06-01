<?php 








function fileUpload($file,$location,$format=['jpg','png'],$def_file= null){
   
//file name gather
   $file_name      = $file['name'];
   $file_tmp_name  = $file['tmp_name'];


//extention collect

   $explode_image  =  explode('.',$file_name);
   $extension      =  end($explode_image);

//unique file name generator
   $file_name = md5(rand(1,20)).'.'.$extension;

//default file with some conditions

  if (!isset($def_file['type'])) {
  	$def_file['type'] = 'image';
  }
  if (!isset($def_file['file_name'])) {
  	$def_file['file_name'] = 'img';
  }
  if (!isset($def_file['pname'])) {
  	$def_file['pname'] = '';
  }

  if (!isset($def_file['tag'])) {
  	$def_file['tag'] = '';
  }
    if (!isset($def_file['brand'])) {
  	$def_file['brand'] = '';
  }
   if (!isset($def_file['category'])) {
  	$def_file['category'] = '';
  }

//set real file name

  if ($def_file['type'] == 'image') {
  	$file_name = date('d_M_Y_g_h_s').'_'.$def_file['pname'].'_'.$def_file['tag'].'_'.$def_file['category'].'_'.$def_file['brand'].'.'.$extension;
  }








  //check file format
  $msg = '';
if (in_array($extension,$format) == false) {
	$msg = "File Format Invalid";

}else{
	 //move uploaded file location
 move_uploaded_file($file_tmp_name,$location.$file_name); 
}

return[

    'msg'        => $msg,
    'file_name'  => $file_name




];














}













 ?>