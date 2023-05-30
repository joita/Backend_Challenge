<?php
namespace Crimsoncircle\Model;
use Crimsoncircle\Simplex\DbConnect;
class AuthorModel
{
    public function insert($data){
        $db = new DbConnect();
        $db->DBClass();
        $name = $data->name;
        $db->query("INSERT INTO Author(name) VALUES('".$name."')");
        $id = $db->lastInsertedID();
        return $id;
    }

    public function listAuthor(){
        $db = new DbConnect();
        $db->DBClass();
        $query = $db->query("SELECT
                                id, name
                            FROM Author");
        $resultado = $db->fetchAll($query);
        return $resultado;
    }

}