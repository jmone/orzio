<?php
class ChannelAction{
    public function run(){
        $alias = isset($_GET['alias']) ? strtolower(trim($_GET['alias'])) : '';
        if(empty($alias)){
            header('Location:/');
        }
        
        $page = isset($_GET['page']) ? intval(trim($_GET['page'])) : '1';

        header('Content-Type:text/html; charset=utf-8');

        $channelModel = new ChannelModel();
        //$channelModel->getChannels();
        $channel = $channelModel->getChannelByAlias($alias);
        $messageModel = new MessageModel();
        $messages = $messageModel->getMessages($page);
        //var_dump($messages);
        include 'views/default/channel.php';
    }
}
?>