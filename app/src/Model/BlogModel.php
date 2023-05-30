<?php
namespace Crimsoncircle\Model;
use Crimsoncircle\Simplex\DbConnect;

class BlogModel
{
    public function insert($data){
        $db = new DbConnect();
        $db->DBClass();
        $title = $data->title;
        $content = $data->content;
        $author_id = $data->author;
        $slug = $data->slug;
        $db->query("INSERT INTO blog(title, content, author_id, slug, created_at) VALUES('".$title."', '".$content."', '".$author_id."', '".$slug."', CURRENT_TIMESTAMP)");
        $id = $db->lastInsertedID();
        return $id;
    }

    public function blogBySlug($slug){
        $db = new DbConnect();
        $db->DBClass();
        $query = $db->query("SELECT
                                blog.id, blog.title, blog.content, Author.name, blog.slug, blog.created_at
                            FROM blog
                            INNER JOIN Author on Author.id = blog.author_id
                            WHERE slug = '".$slug."'");
        $resultado = $db->fetchAll($query);
        return $resultado;
    }

    public function delete($slug){
        $db = new DbConnect();
        $db->DBClass();
        $query = $db->query("DELETE
                            FROM blog
                            WHERE slug = '".$slug."'");
        $id = $db->lastInsertedID();                    
        return $id;
    }

}