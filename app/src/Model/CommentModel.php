<?php
namespace Crimsoncircle\Model;
use Crimsoncircle\Simplex\DbConnect;

class CommentModel
{
    public function insert($data){
        $db = new DbConnect();
        $db->DBClass();
        $post_id = $data->post_id;
        $content = $data->content;
        $author = $data->author;
        $db->query("INSERT INTO Comment(post_id, content, author, created_at) VALUES('".$post_id."', '".$content."', '".$author."', CURRENT_TIMESTAMP)");
        $id = $db->lastInsertedID();
        return $id;
    }

    public function commentById($id){
        $db = new DbConnect();
        $db->DBClass();
        $query = $db->query("SELECT
                                id, post_id, content, author, created_at
                            FROM Comment
                            WHERE id = '".$id."'");
        $resultado = $db->fetchAll($query);
        return $resultado;
    }

    public function delete($id){
        $db = new DbConnect();
        $db->DBClass();
        $query = $db->query("DELETE
                            FROM Comment
                            WHERE id = '".$id."'");
        $id = $db->lastInsertedID();                    
        return $id;
    }

    public function commentByPost($id, $pagina){
        $db = new DbConnect();
        $db->DBClass();
        $noRegs = ($pagina * 10);
        $ini = $pagina == 1 ? 0 : ($noRegs - 10); 
        $fin = $noRegs;
        $query = $db->query("SELECT
                                id, post_id, content, author, created_at
                            FROM Comment
                            WHERE post_id = '".$id."'
                            LIMIT $ini, $fin");
        $resultado = $db->fetchAll($query);
        return $resultado;
    }
    
}