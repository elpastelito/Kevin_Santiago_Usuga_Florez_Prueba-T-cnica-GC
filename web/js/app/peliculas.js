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
        console.log($scope.listMovies);
      });
      $http
      .get(
        "https://api.themoviedb.org/3/genre/movie/list?api_key=15b23a6844a8fc6ccbc4316c8da69a0a&language=es-ES"
      )
      .then(function (res) {
        $scope.genres = res.data.genres;
        console.log($scope.genres);
      });
      $scope.loadMovie = function (movieId) {
        console.log(movieId);
        $http.get("https://api.themoviedb.org/3/movie/"+movieId+"?api_key=15b23a6844a8fc6ccbc4316c8da69a0a&language=es-ES")
        .then(function (res) {
          $scope.getMovie = res.data;
          console.log($scope.getMovie);
        })
        $http.get("http://localhost:8000/allComments?movieId="+movieId)
        .then(function (res) {
          $scope.comments = res.data;
          console.log($scope.comments.data);
        })
      }
  },
]);
