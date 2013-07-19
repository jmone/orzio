<?php

class MessageModel {

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
    
    public function getMessages($page = 1, $size = 20){
        $dbh = DB::getInstance();
        
        $startid = $size * ($page - 1);
        $sth = $dbh->prepare('SELECT * FROM `message` LIMIT :startid, :size');
        $sth->bindParam(':startid', $startid, PDO::PARAM_INT);
        $sth->bindParam(':size', $size, PDO::PARAM_INT);
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

}

?>