<?php
class ViewAction{
    public function run(){
        $id = isset($_GET['id']) ? intval(trim($_GET['id'])) : '';
        if(empty($id)){
            header('Location:/');
        }
        
        echo 'view-'.$id.'.html';
    }
}
?>