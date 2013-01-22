<?php defined('SYSPATH') OR die('No direct script access.');

Route::set('user.view', 'user/view(/<id>)', array('id' => '[0-9]+'))
  ->defaults(array(  	
    'directory'  => 'User',	  	
    'controller' => 'View',	  	
    'action'     => 'Index',	  	
  ));

Route::set('user.edit', 'user/edit')
  ->defaults(array(  	
    'directory'  => 'User',	  	
    'controller' => 'Edit',	  	
    'action'     => 'Index',	  	
  ));

Route::set('user.login', 'user/login')
  ->defaults(array(  	
    'directory'  => 'User',	  	
    'controller' => 'Login',	  	
    'action'     => 'Index',	  	
  ));

Route::set('user.register', 'user/register')
  ->defaults(array(  	
    'directory'  => 'User',	  	
    'controller' => 'Register',	  	
    'action'     => 'Index',	  	
  ));

  	
Route::set('user', 'user(/<controller>(/<action>(/<id>)))')
  ->defaults(array(
    'directory'  => 'User',
    'controller' => 'Dashboard',
    'action'     => 'Index',
));

//Add link to manage users in admin
Event::listen('admin.nav_list', function(){
	return array(
			'title' => 'User',
			'link'  => URL::site('admin/user'),
			'icon'  => 'icon-user'
	);
});
