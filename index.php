<head>
  <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.2/angular-sanitize.js"></script
</head>

<body>
<div ng-app="myApp" ng-controller="planetController">
  <!--<div ng-repeat="model in names">
    <ul >
      <li  ng-repeat="friend in model['movies']">
        {{friend.title}}
      </li>

    </ul>
  </div>
-->


  <div ng-bind-html="desc"></div>



</div>

<script>

  var app = angular.module('myApp', ['ngSanitize']);
  /*app.controller('planetController', function($scope, $http,$sce) {
    $http.get("http://nepalstock.com.np/todaysprice/export")
        .success(function(response) {$scope.names = response ;});
  });*/
  app.controller('planetController', function($scope, $http,$sce) {
    $http.get("http://nepalstock.com.np/todaysprice/export").success(function (response, status, headers, config) {
      $scope.desc = $sce.trustAsHtml(response);
    })
  }).config(function ($sceProvider) {
    $sceProvider.enabled(false);
  });
</script>

</body>
</html>