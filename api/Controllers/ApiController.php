<?php

require $_SERVER['DOCUMENT_ROOT'] . '/Controllers/CommentsController.php';

class ApiController
{
  private CommentsController $commentsController;

  public function __construct()
  {
    $this->commentsController = new CommentsController();
    $this->initAPI();
  }

  /**
   * Inicializa la API.
   * 
   * Lógica encargada de recibir todas las peticiones que envian desde la API.
   */
  private function initAPI()
  {
    // Obtendremos todas las solicitudes de GET.
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['movieId'])) {
        $movie = $_GET['movieId'];
        echo $this->commentsController->getAllByMovie($movie);
        return;
      }
    }

    // Obtendremos todas las solicitudes de POST.
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      if ($_SERVER['REQUEST_URI'] === '/allComments/postComments') {
        // header('Access-Control-Allow-Origin: *');
        // header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
        // header('Access-Control-Allow-Headers: token, Content-Type');
        // header('Access-Control-Max-Age: 1728000');
        // header('Content-Length: 0');
        // header('Content-Type: text/plain');
        $paste = file_get_contents("php://input");
          echo $this->commentsController->create($paste);
          return;
      } else {
        return $this->methodNotFound2();
      }
    }

    // Obtendremos todas las solicitudes de PATCH.
    if ($_SERVER['REQUEST_METHOD'] === 'PATCH') {
      $req = explode('/', $_SERVER['REQUEST_URI']);
      if (('/' . $req[1]) === '/patchComments') {
        echo $this->commentsController->update($req[2]); // => Envía el id del registro a actualizar
        return;
      }
    }

    // Obtendremos todas las solicitudes de DELETE.
    if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
      if (isset($_GET['id'])) {
        $id = $_GET['id'];
        echo $this->commentsController->delete($id);
        return;
      }
    }

    return $this->methodNotFound2();
  }

  /**
   * Lógica encargada de envíar una respuesta de Endpoint no encontrado.
   */
  private function methodNotFound1()
  {
    http_response_code(404);
    echo json_encode(['error' => 'ya casi entramoooos.']);
  }

  private function methodNotFound2()
  {
    http_response_code(404);
    echo json_encode(['error' => 'Metodo no ejecutado correctamente.']);
  }
}
