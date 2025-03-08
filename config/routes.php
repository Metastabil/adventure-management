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

return $routes;