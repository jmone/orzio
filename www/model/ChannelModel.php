<?php

class ChannelModel {

    public function create($data) {
        $dbh = DB::getInstance();
        
        $sth = $dbh->prepare('INSERT INTO `message` (`channel_id`, `title`, `content`, `link`, `email`, `delete_code`, `status`, `dateline`) VALUES (:channel_id, :title, :content, :link, :email, :delete_code, :status, :dateline);');
        $sth->bindParam(':channel_id', $data['channel_id'], PDO::PARAM_INT);
        $sth->bindParam(':title', $data['title'], PDO::PARAM_STR, 30);
        $sth->bindParam(':content', $data['content'], PDO::PARAM_STR);
        $sth->bindParam(':link', $data['link'], PDO::PARAM_STR, 300);
        $sth->bindParam(':email', $data['email'], PDO::PARAM_STR, 200);
        $sth->bindParam(':delete_code', $data['delete_code'], PDO::PARAM_STR, 100);
        $sth->bindParam(':status', $data['status'], PDO::PARAM_INT);
        $sth->bindParam(':dateline', $data['dateline'], PDO::PARAM_INT);
        return $sth->execute();
    }

    public function getChannels(){
        $dbh = DB::getInstance();
        
        $sth = $dbh->query('SELECT * FROM `channel`');
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getChannelByAlias($alias){
        $dbh = DB::getInstance();
        
        $sth = $dbh->prepare('SELECT * FROM `channel` where alias=:alias');
        $sth->bindParam(':alias', $alias, PDO::PARAM_STR, 100);
        $sth->execute();
        return $sth->fetch(PDO::FETCH_ASSOC);
    }
    
    public function getChannelById($id){
        $dbh = DB::getInstance();
        
        $sth = $dbh->prepare('SELECT * FROM `channel` where id=:id');
        $sth->bindParam(':id', $id, PDO::PARAM_INT);
        $sth->execute();
        return $sth->fetch(PDO::FETCH_ASSOC);
    }
}

?>