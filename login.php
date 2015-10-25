<?php 
require_once('core/init.php');
if(Input::exists()){
	 if(Token::check(Input::get('token'))){
	 	$validate = new Validate();
	 	$validation = $validate->check($_POST, array(
	 			'username' => array('required' => true),
	 			'password' => array('required' => true)
	 		));
	 	if($validate->passed()){
	 		$user = new User();
	 		$login = $user->login(Input::get('username'), Input::get('password'));

	 		if($login){
	 			echo 'Success';
	 		} else {
	 			echo '<p>Sorry, Login failed</p>';
	 			print_r($login);
	 		}


	 	}else{
	 		foreach ($validate->errors() as $error) {
	 			echo $error, '<br>';
	 		}
	 	}
	 }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css" integrity="sha384-aUGj/X2zp5rLCbBxumKTCw2Z50WgIr1vs/PFN4praOTvYXWlVyh2UtNUU0KAUhAX" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
</head>
 
<body>
 <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">
         Test OOP Programing
      </a>
    </div>
  </div>
</nav>
<div class="container-fluid">
	<div class="panel panel-success">
		<div class="panel-heading">
		<h3 class="panel-title">Login</h3>
		</div>
		<div class="panel-body">
			<form action="" method="POST" class="form-inline" role="form">

				<div class="form-group">
					<label class="sr-only" for="filed">Username</label>
					<input type="text" class="form-control" name="username" id="username" value="<?php echo escape(Input::get('username')); ?>" placeholder="username">
				</div>
				<div class="form-group">
					<label class="sr-only" for="filed">Password</label>
					<input type="password" class="form-control" name="password" id="password" placeholder="password">
				</div>


				<input type="hidden" name="token" value="<?php echo Token::generate(); ?>" >
				<button type="submit" class="btn btn-primary">Login</button>
				
			
		</div>
	</div>
</div>
</body>
</html>
