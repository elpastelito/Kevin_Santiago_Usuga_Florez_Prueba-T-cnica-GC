app.controller("PeliculasController", [
  "$scope",
  "$http",
  function ($scope, $http) {
    $scope.listMovies = [];
    $scope.setActive("menuPeliculas");

    $http
      .get(
        "https://api.themoviedb.org/3/movie/550?api_key=YOU_KEY_ACCESS"
      )
      .then(function (res) {
        console.log(res.data);
      });
  },
]);
