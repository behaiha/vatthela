<?php
    function compress($source, $destination) {
        $quality = 50;
        $minSize = 100000;
        $maxSize =$minSize * 10;
        $info = getimagesize($source);
        $size = filesize($source);
        if ($size <= $minSize) {
            return null;
        }
        if ($size > $minSize && $size <= $maxSize) {
            $quality = 80;
        }
        if ($info['mime'] == 'image/jpeg') 
         $image = imagecreatefromjpeg($source);

        elseif ($info['mime'] == 'image/gif') 
         $image = imagecreatefromgif($source);

        elseif ($info['mime'] == 'image/png') 
         $image = imagecreatefrompng($source);

        imagejpeg($image, $destination, $quality);

        return $destination;
    }
    function getTypeFile($string){
        $pieces = explode(".", $string);
        $leng = count($pieces);
        return $pieces[$leng-1];
    }
    function formatPath($path){
        return str_replace("../","/",$path);
    }
    function checkdirectory($name_root_directory)
    {
        if (!is_dir($name_root_directory))
        {
            // echo $name_root_directory;
            mkdir($name_root_directory, 0777);
                //mkdir($name_root_directory, 0777);
                    //mkdir($name_root_directory.'Banner/originimage', 0777);
                    //mkdir($name_root_directory.'Banner/resize', 0777);
    
                /*mkdir($name_root_directory.'Place', 0777);
                    mkdir($name_root_directory.'Place/originimage', 0777);
                    mkdir($name_root_directory.'Place/resize', 0777);
    
                mkdir($name_root_directory.'Avatar',0777);
                    mkdir($name_root_directory.'Avatar/originimage', 0777);
    
                mkdir($name_root_directory.'Member', 0777);
                    mkdir($name_root_directory.'Member/originimage', 0777);
                    mkdir($name_root_directory.'Member/173_150', 0777);
    
                mkdir($name_root_directory.'Thumb',0777);
                    mkdir($name_root_directory.'Thumb/originimage', 0777);*/
        }
    }
    // clrean [!#@##^$&%*^] in string to tag input
    // convert string to : ex: add-comment-add
     function toSlug($string, $force_lowercase = true, $anal = false) {
            $strip = array("~", "`", "!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "_", "=", "+", "[", "{", "]","'","-",
                           "}", "\\", "|", ";", ":", "\"","“","”", "'", "&#8216;", "&#8217;", "&#8220;", "&#8221;", "&#8211;", "&#8212;",
                           "â€”", "â€“", ",", "<", ".", ">", "/", "?","-");
            $clean = trim(str_replace($strip, "", strip_tags($string)));
            $clean = preg_replace('/\s+/', "-", $clean);
            $clean = ($anal) ? preg_replace("/[^a-zA-Z0-9]/", "", $clean) : $clean ;
            return ($force_lowercase) ?
                (function_exists('mb_strtolower')) ? mb_strtolower($clean, 'UTF-8') :strtolower($clean) :
        $clean;
    }
    
    function CutString($string,$leghth){
    // nếu độ dài chuỗi nhỏ hơn hay bằng vị trí cắt
    // thì không thay đổi chuỗi ban đầu
    if(strlen($string)<=$leghth)
    {
        return $string;
    }
    else{
        /* 
        so sánh vị trí cắt 
        với kí tự khoảng trắng đầu tiên trong chuỗi ban đầu tính từ vị trí cắt
        nếu vị trí khoảng trắng lớn hơn
        thì cắt chuỗi tại vị trí khoảng trắng đó
        */
        if(strpos($string," ",$leghth) > $leghth){
            $new_leghth=strpos($string," ",$leghth);
            $new_string = substr($string,0,$new_leghth);
            return $new_string." ...";
        }
        // trường hợp còn lại không ảnh hưởng tới kết quả
        $new_string = substr($string,0,$leghth);
        return $new_string;
    }
    } 
    
    function stripVietnamese($str){
        $unicode = array(
            'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
            'd'=>'đ',
            'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
            'i'=>'í|ì|ỉ|ĩ|ị',
            'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
            'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
            'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
            'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
            'D'=>'Đ',
            'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
            'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
            'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
            'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ứ|Ữ|Ự',
            'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
        );
        
       foreach($unicode as $nonUnicode=>$uni){
            $str = preg_replace("/($uni)/i", $nonUnicode, $str);
       }
        return $str;
    }


    // convert string to slug url 
    function convertToSlug($string){
        $string = toSlug(stripVietnamese($string));
        return $string ;
    }

    function accept($id='',$update='',$action = 1,$div=''){
        $accept = Yii::app()->theme->BaseUrl.'/img/icon/accept.png';
        $image = CHtml::image($accept) ;
        return '<a onclick="UpdateAccess('.$id.','.$update.','.$action.','.$div.');">'.$image.'</a>' ;
    }

    function unaccept($id='',$update='',$action = 2,$div=''){
        $accept = Yii::app()->theme->BaseUrl.'/img/icon/unaccept.png';
        $image = CHtml::image($accept) ;
        return '<a onclick="UpdateAccess('.$id.','.$update.','.$action.','.$div.');">'.$image.'</a>' ;
    }

    function convertTextInput($string){
        return $string ;
    }
    #---------------------------------------------------------------------------------
     # Check current images
     #---------------------------------------------------------------------------------
     function getExtendFile($filename){
      $arrName = explode(".",$filename);
      return $arrName[sizeof($arrName)-1];
     }
     #---------------------------------------------------------------------------------
     # Check current images
     #---------------------------------------------------------------------------------
     function getFilename($filename){
      $arrName = explode(".",$filename);
      return $arrName[sizeof($arrName)-2];
     }
     
     
    function formatImage($inputString) {
        $strOut = preg_replace("/([\s]+)/","_",strtolower(trim($inputString)));
        $strOut = preg_replace("/([\W]+)/","",strtolower(trim($strOut )));
        $strOut = str_replace("__","_",$strOut);
        return rand(0,1000)."_".$strOut;
    }
    
    function isImage($value){
      $pattern ="/\.(JPG|jpg|GIF|gif|PNG|png|JPEG|jpeg)/";
      preg_match($pattern, $value, $matches);
      if (count($matches)>0)
       return true;
      else
       return false;
     }

     function parserContent($value){
          $pattern ="/(http|https|ftp)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(:[a-zA-Z0-9]*)?\/?([a-zA-Z0-9\-\._\?\,\'\/\\\+&amp;%\$#\=~])*/m"; 
          preg_match_all($pattern, $value, $matches, PREG_SET_ORDER);
          return $matches;
     }

    function convertImage($value, $domain, $uploadPath, $newName = ''){
        $arrTemp = parserContent($value);
        $arrPattern = array();
        $arrReplace = array();
        $r_value = "";
        if (count($arrTemp)>0){
            $link = "";
            for ($i=0; $i<count($arrTemp); $i++){
                $link = preg_replace('/\\\/','',$arrTemp[$i][0]);
                array_push($arrPattern, trim("'".preg_replace('/(\/|\:|\.|\-|\%)/', '\\\\\\1', $link)."'"));
                if (isImage($link) == true) {
                $newName = 'event-content-'.rand(999,999999999).'.jpg';
                     copy($link, $uploadPath.$newName);
                     /*$objImage = new image();*/
                     //$newImage = $objImage->copyImage($link, $link, $newName);
                     /*$newImage = $objImage->saveImageII("", $link, $link, $newName);*/
                     array_push($arrReplace, $domain.'/'.$uploadPath.$newName);
                } else {
                     if (strpos($arrTemp[$i][0], $domain) > 0) {
                        array_push($arrReplace, $arrTemp[$i][0]);
                     } else {
                        array_push($arrReplace, $domain);
                     }
                }
            }
        
        }
        $r_value = preg_replace($arrPattern, $arrReplace, $value);
        $r_value = preg_replace('/\<span([^\>]*)\>/', '', $r_value);
        $r_value = preg_replace('/\<div([^\>]*)\>/', '', $r_value);
        $r_value = preg_replace('/\<\/span\>/', '', $r_value);
        $r_value = preg_replace('/\<\/div\>/', '', $r_value);
        return $r_value;
    }
    function formatInputContent($value) {
        //$str = trim($value); 
        $str = nl2br(trim($value));
        // Replace all blocked words in content
        $arrBlock = array("#sex|porn|xxx#ie");
        $arrBlockReplace = array("");
        $str = preg_replace($arrBlock,$arrBlockReplace,trim($str));
        // Replace all link http:// or www in content
        //$arrBlock = array("/\b(?:(?:https?|ftp|file):\/\/|www\.|ftp\.)[-A-Z0-9+&@#\/%=~_|$?!:,.]*[A-Z0-9+&@#\/%=~_|$]/i");
        $arrBlock = array("/(http|https|ftp)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(:[a-zA-Z0-9]*)?\/?([a-zA-Z0-9\-\._\?\,\'\/\\\+&amp;%\$#\=~])*/m");
        $arrBlockReplace = array("<a style=\"color:#3b5998\" href=\"$0\" target=\"_blank\">$0</a>");
        $str = preg_replace($arrBlock, $arrBlockReplace, $str);     
        // Replace more than two space in content
        $str = preg_replace("/  /", " ", $str); 
        
        return trim($str);
    }
    function formatContent($value) {
        // Break line
        $str = nl2br(trim($value)); 
        return trim($str);
    }
    
    function get_youtube_id_from_url($url){
        if(stristr($url,'youtu.be/') === FALSE and stristr($url,'youtube') === FALSE){
            return false;
        }
        else if(stristr($url,'youtu.be/')){ 
            preg_match('/(https|http):\/\/(.*?)\/([a-zA-Z0-9_]{11})/i', $url, $final_ID);
            if($final_ID != null and $final_ID != ''){
                return $final_ID[3]; 
            }else{
                return false;
            }
        }else { 
            preg_match('/(https|http):\/\/(.*?)\/(embed\/|watch\?v=|(.*?)&v=|v\/|e\/|.+\/|watch.*v=|)([a-zA-Z0-9_]{11})/i', $url, $IDD); 
            if($IDD != null and $IDD != ''){
                return $IDD[5]; 
            }else{
                return false;
            }
        }
    }
?>