<?php 

use \Core\PageAdmin;
use \Core\Rule;
use \Core\Validate;
use \Core\Model\User;
use \Core\Model\Mailing;







 











$app->get( "/481738admin/mailing/:idmailing/deletar", function( $idmailing ) 
{
	User::verifyLogin();

	$mailing = new Mailing();

	$mailing->getMailing((int)$idmailing);

	$mailing->delete();

	header("Location: /481738admin/mailing");
	exit;

});//END route






















$app->get( "/481738admin/mailing", function() 
{



	
	User::verifyLogin();
	

	$mailing = Mailing::listAll();


	$page = new PageAdmin();

	$page->setTpl( 
		
		"mailing",

		[

			'mailing'=>$mailing,
			'search'=>'',
			'pages'=>'',
			'success'=>Mailing::getSuccess(),
			'error'=>Mailing::getError()

		]
	
	);//end setTpl

});//END route
























 ?>