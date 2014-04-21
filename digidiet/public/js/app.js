var userApp = angular.module('userApp', ['userCtrl', 'userService'], function($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
	});