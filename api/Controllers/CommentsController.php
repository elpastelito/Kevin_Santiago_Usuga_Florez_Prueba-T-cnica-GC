<?php

require $_SERVER['DOCUMENT_ROOT'] . '/Models/CommentsMovies.php';
require $_SERVER['DOCUMENT_ROOT'] . '/Controllers/DBContextController.php';

class CommentsController
{
  private DBContextController $context;

  public function __construct()
  {
    $this->context = new DBContextController();
  }

  public function getAll()
  {
    // Prepará la conexión con la base de datos.
    $pdo = $this->context->prepareConnectionToDatabase();

    // Realizará la respectiva consulta.
    $query = $pdo->query("SELECT * FROM comments;");
    $comments = $query->fetchAll();
    $data = [];

    foreach ($comments as $item) {
      $data[] = new CommentsMovies($item['comment'], $item['idMovie'], $item['id']);
    }

    unset($pdo);

    http_response_code(200);
    return json_encode(['message' => 'successfully', 'data' => $data]);
  }

  // TODO: Realizar la lógica para obtener los comentarios de una película en especifico.
  public function getAllByMovie($movieId)
  {
    // Prepará la conexión con la base de datos.
    $pdo = $this->context->prepareConnectionToDatabase();

    // Realizará la respectiva consulta.
    $query = $pdo->query("SELECT * FROM comments WHERE idMovie='$movieId'");
    $comments = $query->fetchAll();
    $data = [];

    foreach ($comments as $item) {
      $data[] = new CommentsMovies($item['comment'], $item['idMovie'], $item['id']);
    }

    unset($pdo);

    http_response_code(200);
    return json_encode(['message' => 'successfully', 'data' => $data]);
  }

  public function create()
  {
    // Obtiene los datos del cuerpo.
    $data = $_POST;

    // Crear el objeto.
    $obj = new CommentsMovies($data['comment'], $data['idMovie'], null);

    // Prepará la conexión con la base de datos.
    $pdo = $this->context->prepareConnectionToDatabase();

    // Realizará la respectiva creación.
    $query = $pdo->prepare("INSERT INTO comments(comment, idMovie) VALUES (?, ?)");
    $query->execute([$obj->comment, $obj->idMovie]);

    http_response_code(201);
    return json_encode(['message' => 'successfully', 'data' => [ 'comment' => $obj->comment, 'idMovie' => $obj->idMovie ]]);
  }

  // TODO: Realizar la lógica de actualización de un comentario.
  public function update($id)
  {
    // Obtiene los datos del cuerpo.
    $data = $_POST;

    http_response_code(200);
    return json_encode(['message' => 'successfully', 'data' => $data]);
  }

  // TODO: Realizar la lógica de eliminación de un comentario.
  public function delete()
  {
    http_response_code(200);
    return json_encode(['message' => 'successfully']);
  }
}
