<?php 
namespace Crimsoncircle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Crimsoncircle\Model\CommentModel;
use Exception;

class CommentController
{
    public function create(Request $request) : Response
    {
        $datos = json_decode(file_get_contents('php://input'));
        $comment = new CommentModel();
        $response = new Response();
        try{
            $data = $comment->insert($datos);
            $respuesta = array('respuesta' => 'Registro generado correctamente id: '.$data);
            $response->setStatusCode(Response::HTTP_OK);
            $response->setContent(json_encode($respuesta));
        }catch(Exception $ex){
            $response->setStatusCode(Response::HTTP_CONFLICT);
            $response->setContent($ex->getMessage());
        }
        return $response;
    }

    public function optionsAPI(Request $request, String $id){
        $accion = $request->getMethod();
        switch($accion){
            case 'GET': return $this->getById($id);
                        break;
            
            case 'DELETE': return $this->deleteById($id); 
                        break;          
        }
    }

    public function getById(String $id) : Response
    {
        $comment = new CommentModel();
        $response = new Response();
        try{
            $data = $comment->commentById($id);
            if($data == null){
                $msjValidacion = array('respuesta' => 'No se encontraron resultados con el id: '.$id);
                $response->setStatusCode(Response::HTTP_CONFLICT);
                $response->setContent(json_encode($msjValidacion));
                return $response;
            }
            $response->setStatusCode(Response::HTTP_OK);
            $response->setContent(json_encode($data));
        }catch(Exception $ex){
            $response->setStatusCode(Response::HTTP_CONFLICT);
            $response->setContent($ex->getMessage());
        }
        return $response;
        
    }

    public function deleteById(String $id) : Response
    {
        $comment = new CommentModel();
        $response = new Response();
        try{
            $data = $comment->delete($id);
            $respuesta = array('respuesta' => 'Registro eliminado correctamente id: '.$id);
            $response->setStatusCode(Response::HTTP_OK);
            $response->setContent(json_encode($respuesta));
        }catch(Exception $ex){
            $response->setStatusCode(Response::HTTP_CONFLICT);
            $response->setContent($ex->getMessage());
        }
        return $response;
        
    }

    public function commentsByPost(Request $request, int $id) : Response
    {
        $comment = new CommentModel();
        $response = new Response();
        try{
            $noPage = $request->query->get('page');
            $data = $comment->commentByPost($id, $noPage);
            if($data == null){
                $msjValidacion = array('respuesta' => 'No se encontraron resultados de el blog: '.$id.' En la pagina '.$noPage);
                $response->setStatusCode(Response::HTTP_CONFLICT);
                $response->setContent(json_encode($msjValidacion));
                return $response;
            }
            $response->setStatusCode(Response::HTTP_OK);
            $response->setContent(json_encode($data));
        }catch(Exception $ex){
            $response->setStatusCode(Response::HTTP_CONFLICT);
            $response->setContent($ex->getMessage());
        }
        return $response;
        
    }
}