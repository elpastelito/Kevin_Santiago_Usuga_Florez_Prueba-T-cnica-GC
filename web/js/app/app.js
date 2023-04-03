/**
 * Cargamos el módulo de rutas para nuestra aplicación.
 */
var app = angular.module('StartModule', ['ngRoute','ngResource'])

app.controller('StartController', ['$scope', function ($scope) {
  $scope.navbarComponent = `shared/navbar.html`;

  $scope.setActive = function($option) {
    $scope.menuInicio = '';
    $scope.menuPeliculas = '';

    $scope[$option] = 'active';
  }
}]);