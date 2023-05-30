<?php 
namespace Crimsoncircle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Crimsoncircle\Model\BlogModel;
use Exception;

class BlogController
{
    public function create(Request $request, $slug) : Response
    {
        $datos = json_decode(file_get_contents('php://input'));
        $blogModel = new BlogModel();
        $response = new Response();
        try{
            $data = $blogModel->insert($datos);
            $respuesta = array('respuesta' => 'Registro generado correctamente id: '.$data);
            $response->setStatusCode(Response::HTTP_OK);
            $response->setContent(json_encode($respuesta));
        }catch(Exception $ex){
            $response->setStatusCode(Response::HTTP_CONFLICT);
            $response->setContent($ex->getMessage());
        }
        return $response;
        
    }

    public function optionsAPI(Request $request, String $slug){
        $accion = $request->getMethod();
        $response = new Response();
        switch($accion){
            case 'GET': return $this->getBySlug($slug);
                        break;
            
            case 'DELETE': return $this->deleteBySlug($slug); 
                        break;          
        }
    }

    public function getBySlug(String $slug) : Response
    {
        $blogModel = new BlogModel();
        $response = new Response();
        try{
            $data = $blogModel->blogBySlug('/'.$slug);
            if($data == null){
                $msjValidacion = array('respuesta' => 'No se encontraron resultados con el SLUG: '.$slug);
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
    
    public function deleteBySlug(String $slug) : Response
    {
        $blogModel = new BlogModel();
        $response = new Response();
        try{
            $data = $blogModel->delete('/'.$slug);
            $respuesta = array('respuesta' => 'Registro eliminado correctamente slug: /'.$slug);
            $response->setStatusCode(Response::HTTP_OK);
            $response->setContent(json_encode($respuesta));
        }catch(Exception $ex){
            $response->setStatusCode(Response::HTTP_CONFLICT);
            $response->setContent($ex->getMessage());
        }
        return $response;
        
    }

}