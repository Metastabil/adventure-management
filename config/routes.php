<?php

$routes[] = ['Pages', 'login'];
$routes['admin/login'] = ['Pages', 'admin_login'];
$routes['logout'] = ['Pages', 'logout'];
$routes['register'] = ['Pages', 'register'];
$routes['login'] = ['Pages', 'login'];
$routes['game'] = ['Pages', 'game'];

$routes['admin/users'] = ['Users', 'index'];
$routes['admin/create-user'] = ['Users', 'create'];
$routes['admin/show-user/:param'] = ['Users', 'show'];
$routes['admin/update-user/:param'] = ['Users', 'update'];
$routes['admin/delete-user/:param'] = ['Users', 'delete'];

$routes['admin/players'] = ['Players', 'index'];
$routes['admin/create-player'] = ['Players', 'create'];
$routes['admin/show-player/:param'] = ['Players', 'show'];
$routes['admin/update-player/:param'] = ['Players', 'update'];
$routes['admin/delete-player/:param'] = ['Players', 'delete'];

$routes['admin/inventories'] = ['Inventories', 'index'];
$routes['admin/show-inventory/:param'] = ['Inventories', 'show'];

$routes['admin/resources'] = ['Resources', 'index'];
$routes['admin/create-resource'] = ['Resources', 'create'];
$routes['admin/show-resource/:param'] = ['Resources', 'show'];
$routes['admin/update-resource/:param'] = ['Resources', 'update'];
$routes['admin/delete-resource/:param'] = ['Resources', 'delete'];

return $routes;