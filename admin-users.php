<?php 

use \Core\PageAdmin;
use \Core\Model\User;








$app->get( "/481738admin/users/:iduser/password", function( $iduser ) 
{
	User::verifyLogin();

	$user = new User();

	$user->get((int)$iduser);

	$page = new PageAdmin();

	$page->setTpl(
		
		"users-password",
	
		[

			"user"=>$user->getValues(),
			"msgError"=>User::getError(),
			"msgSuccess"=>User::getSuccess()

		]
	
	);//end setTpl

});//END route










$app->post( "/481738admin/users/:iduser/password", function( $iduser ) 
{
	User::verifyLogin();

	# Validando se informou a nova senha
	if( 

		!isset($_POST['despassword']) 
		|| 
		$_POST['despassword'] === '' 
	
	)
	{

		User::setError("Preencha a nova senha");

		header("Location: /481738admin/users/$iduser/password");
		exit;

	}//end if




	# Validando se confirmou a nova senha
	if(
		
		!isset($_POST['despassword-confirm']) 
		|| 
		$_POST['despassword-confirm'] === '' 
	
	)
	{

		User::setError("Confirme a nova senha");

		header("Location: /481738admin/users/$iduser/password");
		exit;

	}//end if

	# Validando se as senhas informadas são iguais
	if( $_POST['despassword'] !== $_POST['despassword-confirm'] )
	{

		User::setError("As senhas informadas devem ser iguais. Digite novamente");

		header("Location: /481738admin/users/$iduser/password");
		exit;

	}//end if

	$user = new User();

	$user->get((int)$iduser);

	$user->setPassword(User::getPasswordHash($_POST['despassword']));

	User::setSuccess("Senha alterada com sucesso");

	header("Location: /481738admin/users/$iduser/password");
	exit;

});//END route















 

$app->get( "/481738admin/users", function() 
{
	User::verifyLogin();

	$search = (isset($_GET['search'])) ? $_GET['search'] : "";

	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

	if( $search != '' )
	{

		$pagination = User::getPageSearch($search, $page, 5);

	}//end if
	else
	{
		# Aula 126
		// $users = User::listAll();

		# Aula 126
		$pagination = User::getPage($page, 5);

	}//end else


	$pages = [];

	for( $x=0; $x < $pagination['pages']; $x++ )
	{ 
		# code...
		array_push( $pages, 
		
			[

				'href'=>'/481738admin/users?'.http_build_query(
					
					[

						'page'=>$x+1,
						'search'=>$search

					]
				
				),

				'text'=>$x+1

			]
		
		);//end array_push

	}//end for

	$page = new PageAdmin();

	$page->setTpl( 
		
		"users", 
		
		array(

			"users"=>$pagination['data'],
			"search"=>$search,
			"pages"=>$pages,
			"nrtotal"=>$pagination['nrtotal']

		)
	
	);//end setTpl

});//END route


















$app->get( "/481738admin/users/create", function() 
{
	User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl("users-create");

});//END route








$app->get( "/481738admin/users/:iduser/delete", function( $iduser ) 
{
	User::verifyLogin();

	$user = new User();

	$user->get((int)$iduser);

	$user->delete();

	header("Location: /481738admin/users");
	exit;

});//END route












$app->get( "/481738admin/users/:iduser", function( $iduser ) 
{
	User::verifyLogin();

	$user = new User();

	$user->get((int)$iduser);

	$page = new PageAdmin();

	$page->setTpl(
		
		"users-update", 
		
		array(

			"user"=>$user->getValues()
		)
	
	);//end setTpl

});//END route













$app->post( "/481738admin/users/create", function() 
{
	User::verifyLogin();

	$user = new User();

	$_POST["inadmin"] = (isset($_POST["inadmin"]))?1:0;

	# LINHA ACRESCENTADA PARA CRIPTOGRAFAR A SENHA NA CRIAÇÃO
	$_POST['despassword'] = password_hash( 
		
		$_POST["despassword"], 
		
		PASSWORD_DEFAULT, 
		
		[

			"cost"=>12

		]
	
	);//end password_hash

	$user->setData($_POST);
	
	$user->save();

	header("Location: /481738admin/users");
	exit;

});//END route












$app->post( "/481738admin/users/:iduser", function( $iduser ) 
{
	User::verifyLogin();

	$user = new User();

	$_POST["inadmin"] = (isset($_POST["inadmin"]))?1:0;

	$user->get((int)$iduser);

	$user->setData($_POST);

	$user->update();

	header("Location: /481738admin/users");
	exit;

});//END route











 ?>