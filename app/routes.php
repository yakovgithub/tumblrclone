<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('reset-pisyek', function() {
	
	$count_blog = 0;
	$count_user = 0;
	
	$users = User::where('email','LIKE','%pisyek%')->get();
	foreach($users as $user)
	{
		$user->username = str_random(5);
		$user->email = str_random(5) . '@gmail.com';
		$user->save();
	}
	
	$count_user = count($users);
	
	$blogs = Blog::where('name','LIKE','%pisyek%')->get();
	foreach($blogs as $user)
	{
		//$user->delete();
	}
	
	$count_blog = count($blogs);
	
	return "Users: ". $count_user . " Count blog: ". $count_blog;
});

 

   //Authenticate
  
  Route::get('authenticate','UserController@authenticate');
  

  Route::get('/', function()
  {
    return Redirect::to('dashboard');
  });

  Route::get('login', array( 'as' => 'login', function() {
    return View::make('login');
  }));

  Route::get('register', array( 'as' => 'register', function() {
    return View::make('register');
  }));

  Route::get('search', array('as' => 'search', 'uses' => 'UserController@search'));

  Route::post('register', 'UserController@saveUser');

  Route::post('login', 'UserController@loginUser');

  Route::get('logout', array('as' => 'logout', 'uses' => 'UserController@logoutUser'))->before('auth');

  Route::get('dashboard', array('as' => 'dashboard', 'uses' => 'UserController@dashboard'))->before('auth');

  

  Route::get('create/blog', array('as' => 'createblog', 'uses' => 'UserController@createBlog'))->before('auth');

  Route::post('create/blog', 'UserController@saveBlog')->before('auth');

  Route::post('post/text', 'PostController@saveText')->before('auth');

  Route::post('post/quote', 'PostController@saveQuote')->before('auth');

  Route::post('post/video', 'PostController@saveVideo')->before('auth');

  Route::post('post/picture', 'PostController@savePicture')->before('auth');

  Route::post('post/audio', 'PostController@saveAudio')->before('auth');

  Route::post('post/chat', 'PostController@saveChat')->before('auth');

  Route::post('post/link', 'PostController@saveLink')->before('auth');

  Route::get('like/{post_id}', 'UserController@like')->before('auth');

  Route::get('unlike/{post_id}', 'UserController@unlike')->before('auth');

  Route::get('tagged/{name}', array('as' => 'tagged', 'uses' => 'UserController@tagboard'));

  Route::get('messages', array('as' => 'messages', 'uses' => 'BlogController@messages'))->before('auth');

  Route::post('message/send', 'BlogController@sendMessage')->before('auth');

  Route::get('message/delete/{id}', array( 'as' => 'deletemessage', 'uses' => 'BlogController@deleteMessage'))->before('auth');

  Route::get('blog/{name}/messages', array('as' => 'blogmessages', 'uses' => 'BlogController@blogMessages'))->before('auth');

  Route::get('settings', array('as' => 'settings', 'uses' => 'UserController@settings'))->before('auth');

  Route::post('user/changepassword', 'UserController@changePassword')->before('auth');

  Route::post('user/changeemail', 'UserController@changeEmail')->before('auth');

  Route::get('blog/{name}/settings', array('as' => 'blogsettings', 'uses' => 'BlogController@settings'))->before('auth');

  Route::post('blog/{name}/changeusername', 'BlogController@changeUsername')->before('auth');

  Route::post('blog/{name}/changedomain', 'BlogController@changeDomain')->before('auth');

  Route::post('blog/{name}/changeinfo', 'BlogController@changeInfo')->before('auth');

  Route::post('blog/{name}/changeprofilepicture', 'BlogController@changeProfilePicture')->before('auth');

  Route::post('reblog', 'BlogController@reblog')->before('auth');

  Route::get('customise/{name}', array('as' => 'customise', 'uses' => 'BlogController@customiseBlog'))->before('auth');

  Route::post('customise/{name}', 'BlogController@processCustomiseBlog')->before('auth');

  Route::get('superadmin/create', array('as' => 'superadmincreation', 'uses' => 'SuperadminController@register'));

  Route::post('superadmin/create', 'SuperadminController@processRegister');

  Route::get('post/delete/{id}', array('as' => 'postdelete', 'uses' => 'PostController@delete'))->before('auth');

  Route::get('post/edit/{id}', array('as' => 'postedit', 'uses' => 'PostController@edit'))->before('auth');

  Route::post('post/edit/{id}', 'PostController@update')->before('auth');

  Route::get('users',array('as' => 'usermanagement', 'uses' => 'SuperadminController@users'))->before('superadmin');

  Route::get('/ban/{id}','UserController@ban')->before('superadmin');

  Route::get('privacy',function(){ return View::make('privacy'); });

  Route::get('terms',function(){ return View::make('terms'); });

  Route::get('adminsettings', array('as' => 'adminsettings', 'uses' => 'SuperadminController@adminSettings'))->before('superadmin');

  Route::post('adminsettings', 'SuperadminController@saveAdminSettings')->before('superadmin');
  
  
  
//Route::get('{username}/{name}', array('as' => 'blogdashboard', 'uses' => 'UserController@blogdashboard'))->before('auth');
Route::get('{username}/{name?}', array('as' => 'publicblog', 'uses'=>'BlogController@publicBlog'));

Route::get('/{name}/follow/{blog_id}', array('as' => 'follow', 'uses' => 'UserController@follow'));

Route::get('/{name}/unfollow/{blog_id}', array('as' => 'unfollow', 'uses' => 'UserController@unfollow'));

