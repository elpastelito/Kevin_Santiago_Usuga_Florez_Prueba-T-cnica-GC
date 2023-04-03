app.config(function ($routeProvider) {
  $routeProvider
      .when('/', {
          templateUrl: 'pages/peliculas.html',
          controller: 'PeliculasController',
      })
      .when('/peliculas', {
          templateUrl: 'pages/peliculas.html',
          controller: 'PeliculasController',
      })
      .when('/inicio', {
        templateUrl: 'pages/inicio.html',
        controller: 'InicioController',
    })
      .otherwise({
          redirectTo: '/peliculas',
      });
});