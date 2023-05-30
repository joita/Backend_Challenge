<?php 
namespace Crimsoncircle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Crimsoncircle\Model\AuthorModel;
use Exception;

class AuthorController
{
    public function create(Request $request) : Response
    {
        $datos = json_decode(file_get_contents('php://input'));
        $autor = new AuthorModel();
        $response = new Response();
        try{
            $data = $autor->insert($datos);
            $respuesta = array('respuesta' => 'Registro generado correctamente id: '.$data);
            $response->setStatusCode(Response::HTTP_OK);
            $response->setContent(json_encode($respuesta));
        }catch(Exception $ex){
            $response->setStatusCode(Response::HTTP_CONFLICT);
            $response->setContent($ex->getMessage());
        }
        return $response;
    }

    public function getAuthors() : Response
    {
        $autor = new AuthorModel();
        $response = new Response();
        try{
            $data = $autor->listAuthor();
            if($data == null){
                $msjValidacion = array('respuesta' => 'No se encontraron resultados de Autores: ');
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