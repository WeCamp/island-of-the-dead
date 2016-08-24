<?php
// default route
$app->get('/', function () {
    return "List of avaiable methods:
  - /getsurrounding/{x}/{y} - returns your surroundings;";
});
