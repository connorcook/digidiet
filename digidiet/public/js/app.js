
//create the main angular app with dependencies injected for the admin control panel.  Override {{}} notation to avoid
//confusion with blade templating engine
var userApp = angular.module('userApp', ['userCtrl', 'userService', 'ngAnimate'], function($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
	});