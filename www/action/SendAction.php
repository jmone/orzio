<?php
class SendAction{
	public function run(){
        if(isset($_POST)){
            $messageModel = new MessageModel;
            
            if ((($_FILES["link"]["type"] == "image/gif") || 
            ($_FILES["link"]["type"] == "image/jpeg") || 
            ($_FILES["link"]["type"] == "image/pjpeg")) && 
            ($_FILES["link"]["size"] < 20000)) {
                if ($_FILES["link"]["error"] > 0) {
                    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
                } else {                    
                    //图片目录
                    $directoryNamePieces = explode('/', date('Y/m/d/H'));
                    $path = 'upload';
                    foreach($directoryNamePieces as $namePiece){
                        $path .= '/'.$namePiece;
                        if(is_dir($path)){
                            continue;
                        }
                        mkdir($path);
                    }
                    
                    //图片名称
                    $pathinfo = pathinfo($_FILES["link"]["name"]);
                    $extension = strtolower($pathinfo['extension']);
                    $name = $path . '/' . time() . rand(1, 99999) . '.' . $extension;
                    
                    //上传图片
                    if (file_exists($name)) {
                        echo $name . " already exists. ";
                    } else {
                        move_uploaded_file($_FILES["link"]["tmp_name"], $name);
                    }
                }
            } else {
                echo "Invalid file";
            }
            $_POST['message']['link'] = $name;
            $_POST['message']['dateline'] = time();
            $_POST['message']['status'] = 0;
            
            if($messageModel->create($_POST['message'])){
                echo "Create success.";
            }else{
                echo "Create fail.";
            }
        }
	}
}
?>