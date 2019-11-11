<?php

use Core\PageDashboard;
use Core\Rule;
use Core\Photo;
use Core\Validate;
use Core\Model\User;
use Core\Model\Consort;
use Core\Model\Plan;






$app->get( "/dashboard/meu-amor", function()
{
	
	User::verifyLogin(false);

	$user = User::getFromSession();

	$consort = new Consort();

	$consort->get((int)$user->getiduser());




	/*$plan = new Plan();


	if( (int)$user->getinplancontext() == 0 )
	{

		$plan->setinpaymentstatus('0');
		$plan->setinpaymentmethod('0');

	}//end if
	else
	{

		$plans = $plan->get((int)$user->getiduser());

		$plan->setinpaymentstatus($plans['results'][0]['inpaymentstatus']);
		$plan->setinpaymentmethod($plans['results'][0]['inpaymentmethod']);

	}//end else*/



		
	$page = new PageDashboard();

	$page->setTpl(
		


		"consorts", 
		
		[
			'user'=>$user->getValues(),
			'consort'=>$consort->getValues(),
			'success'=>Consort::getSuccess(),
			'error'=>Consort::getError()
			

		]
	
	);//end setTpl

});//END route








$app->post( "/dashboard/meu-amor", function()
{


	User::verifyLogin(false);

	$user = User::getFromSession();



	if(
		
		!isset($_POST['desconsort']) 
		|| 
		$_POST['desconsort'] === ''
		
	){

		Consort::setError("Insira o Nome do Seu Amor");
		header('Location: /dashboard/meu-amor');
		exit;

	}//end if

	if( !$desconsort = Validate::validateString($_POST['desconsort']) )
	{

		Consort::setError("O nome não pode ser formado apenas com caracteres especiais, tente novamente");
		header('Location: /dashboard/meu-amor');
		exit;

	}//end if





	

	
	if( ($desemail = Validate::validateEmail($_POST['desemail'], true)) === false )
	{	
		
		Consort::setError("O e-mail parece estar num formato inválido, tente novamente");
		header('Location: /dashboard/meu-amor');
		exit;

	}//end if


	

	$consort = new Consort();

	$consort->get((int)$user->getiduser());

	







	if( $_FILES["file"]["name"] !== "" )
	{

		$photo = new Photo();

		if( $consort->getdesphoto() != Rule::DEFAULT_PHOTO )
		{

			$photo->deletePhoto($consort->getdesphoto(), Rule::CODE_CONSORTS);

		}//end if

		$basename = $photo->setPhoto(
			
			$_FILES["file"], 
			$user->getiduser(),
			Rule::CODE_CONSORTS,
			$consort->getidconsort()
			
		);//end setPhoto


		if( $basename['basename'] === false )
		{
			Consort::setError("Falha no envio da imagem, tente novamente | Se a falha persistir, tente enviar outra imagem ou entre em contato com o suporte");
			header('Location: /dashboard/meu-amor');
			exit;

		}//end if
		else
		{
			
	
			$consort->setdesphoto($basename['basename']);
			$consort->setdesextension($basename['extension']);


		}//end else

	}//end if



	$consort->setData([


		'idconsort'=>$_POST['idconsort'],
		'iduser'=>$user->getiduser(),
		'desconsort'=>$desconsort,
		'desemail'=>$desemail,
		'desphoto'=>$consort->getdesphoto(),
		'desextension'=>$consort->getdesextension()

	]);//end setData

	//$_POST['iduser'] = $user->getiduser();

	//$consort->setData($_POST);

	//$consort->update();

	$consort->update();
	

	Consort::setSuccess("Dados alterados");

	header('Location: /dashboard/meu-amor');
	exit;



});//END route











?>