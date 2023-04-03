app.controller("PeliculasController", [
  "$scope",
  "$http",
  function ($scope, $http, $rtmFactory) {
    $scope.listMovies = [];
    $scope.genres = [];
    $scope.comments = [];
    $scope.getMovie = [];
    $scope.setActive("menuPeliculas");

    $http
      .get(
        "https://api.themoviedb.org/3/movie/popular?api_key=15b23a6844a8fc6ccbc4316c8da69a0a&language=es-ES"
      )
      .then(function (res) {
        $scope.listMovies = res.data.results;
      });
      $http
      .get(
        "https://api.themoviedb.org/3/genre/movie/list?api_key=15b23a6844a8fc6ccbc4316c8da69a0a&language=es-ES"
      )
      .then(function (res) {
        $scope.genres = res.data.genres;
      });
      $scope.loadMovie = function (movieId) {
        $http.get("https://api.themoviedb.org/3/movie/"+movieId+"?api_key=15b23a6844a8fc6ccbc4316c8da69a0a&language=es-ES")
        .then(function (res) {
          $scope.getMovie = res.data;
        })
        $http.get("http://localhost:8000/allComments?movieId="+movieId)
        .then(function (res) {
          $scope.comments = res.data;
        })
      }
      $scope.postComment = function (comment,idMovie) {

        var data = {
          comment: comment,
          idMovie: idMovie
        }

        $http.post("http://localhost:8000/allComments/postComments",{
          comment: data.comment,
          idMovie: data.idMovie
        })
        .then(function (response) {
          console.log(response);
        }).catch(function(response) {
          console.log("ERROR:", response);
        });
      }
      $scope.delete = function (id) {
        $http.delete("http://localhost:8000/allComments/deleteComments?id="+id)
        .then(function (response) {
          console.log(response);
        }).catch(function(response) {
          console.log("ERROR:", response);
        });
      }
  },
]);
