<?php

use Core\Maintenance;
use Core\PageDashboard;
use Core\Rule;
use Core\Photo;
use Core\Validate;
use Core\Model\User;
use Core\Model\Wedding;
//use Core\Model\CustomStyle;
//use Core\Model\Plan;






$app->get( "/dashboard/meu-casamento", function()
{
	
	User::verifyLogin(false);

	$user = User::getFromSession();



	if( Maintenance::checkMaintenance() )
	{	

		$maintenance = new Maintenance();

		$maintenance->getMaintenance();

		User::setError($maintenance->getdesdescription());
		header("Location: /login");
		exit;
		
	}//end if









	


	if ( ( $validate = User::validatePlanDashboard( $user ) ) === false )
	{
		# code...
		User::setError(Rule::VALIDATE_PLAN);
		header('Location: /dashboard');
		exit;

	}//end if

	if ( (int)$user->getincheckout() == 0 && (int)$user->getinplancontext() != 0 )
	{
		# code...
		User::setError(Rule::VALIDATE_PLAN);
		header('Location: /dashboard');
		exit;

	}//end if


	$wedding = new Wedding();

	$wedding->get((int)$user->getiduser());






		
	$page = new PageDashboard();

	$page->setTpl(
		


		"wedding", 
		
		[
			'user'=>$user->getValues(),
			'wedding'=>$wedding->getValues(),
			'validate'=>$validate,
			'success'=>Wedding::getSuccess(),
			'error'=>Wedding::getError()
			

		]
	
	);//end setTpl

});//END route






















$app->post( "/dashboard/meu-casamento", function()
{

	if( Maintenance::checkMaintenance() )
	{	

		$maintenance = new Maintenance();

		$maintenance->getMaintenance();

		User::setError($maintenance->getdesdescription());
		header("Location: /login");
		exit;
		
	}//end if




	User::verifyLogin(false);

	$user = User::getFromSession();


	if ( ( $validate = User::validatePlanDashboard( $user ) ) === false )
	{
		# code...
		User::setError(Rule::VALIDATE_PLAN);
		header('Location: /dashboard');
		exit;

	}//end if



	if ( (int)$user->getincheckout() == 0 && (int)$user->getinplancontext() != 0 )
	{
		# code...
		User::setError(Rule::VALIDATE_PLAN);
		header('Location: /dashboard');
		exit;

	}//end if
	




	if(
		
		!isset($_POST['dtwedding']) 
		|| 
		$_POST['dtwedding'] === ''
		
	){

		Wedding::setError("Insira a data do casamento");
		header('Location: /dashboard/meu-casamento');
		exit;

	}//end if

	if( !$dtwedding = Validate::validateDate($_POST['dtwedding'], 1) )
	{

		Wedding::setError("Informe uma data válida");
		header('Location: /dashboard/meu-casamento');
		exit;

	}//end if











	if(
		
		!isset($_POST['tmwedding']) 
		|| 
		$_POST['tmwedding'] === ''
		
	){

		Wedding::setError("Insira o horário do casamento");
		header('Location: /dashboard/meu-casamento');
		exit;

	}//end if

	if( !$tmwedding = Validate::validateTime($_POST['tmwedding']) )
	{	
		

		Wedding::setError("Informe uma hora válida");
		header('Location: /dashboard/meu-casamento');
		exit;

	}//end if













	if(
		
		!isset($_POST['desaddress']) 
		|| 
		$_POST['desaddress'] === ''
		
	)
	{

		Wedding::setError("Preencha o endereço do casamento");
		header('Location: /dashboard/meu-casamento');
		exit;

	}//end if

	if( ( $desaddress = Validate::validateStringNumber($_POST['desaddress'], true, false) ) === false )
	{

		Wedding::setError("O endereço não pode ser formado apenas com caracteres especiais, tente novamente");
		header('Location: /dashboard/meu-casamento');
		exit;

	}//end if







	if(
		
		!isset($_POST['desnumber']) 
		|| 
		$_POST['desnumber'] === ''
		
	)
	{

		Wedding::setError("Preencha o número");
		header('Location: /dashboard/meu-casamento');
		exit;

	}//end if

	if( !$desnumber = Validate::validateNumber($_POST['desnumber']) )
	{

		Wedding::setError("O número não deve conter apenas caracteres especiais, nem pode ser vazio, tente novamente");
		header('Location: /dashboard/meu-casamento');
		exit;

	}//end if














	if(
		
		!isset($_POST['descity']) 
		|| 
		$_POST['descity'] === ''
		
	)
	{

		Wedding::setError("Preencha a cidade");
		header('Location: /dashboard/meu-casamento');
		exit;

	}//end if

	if( ( $descity = Validate::validateString($_POST['descity'], true, false) ) === false )
	{

		Wedding::setError("A cidade não deve conter apenas caracteres especiais, nem pode ser vazio, tente novamente");
		header('Location: /dashboard/meu-casamento');
		exit;

	}//end if












	if(
		
		!isset($_POST['desstate']) 
		|| 
		$_POST['desstate'] === ''
		
	)
	{

		Wedding::setError("Preencha o estado");
		header('Location: /dashboard/meu-casamento');
		exit;

	}//end if

	if( ( $desstate = Validate::validateString($_POST['desstate'], true, false) ) === false )
	{

		Wedding::setError("O estado não deve conter apenas caracteres especiais, nem pode ser vazio, tente novamente");
		header('Location: /dashboard/meu-casamento');
		exit;

	}//end if





	












	$idwedding = $_POST['idwedding'];
	
	$descountry = Validate::validateString($_POST['descountry'], true, true);
	$desdistrict = Validate::validateStringNumber($_POST['desdistrict'], true, true);
	$descostume = Validate::validateStringNumberSpecial($_POST['descostume'], true, true);

	$desdirections = Validate::validateDescription($_POST['desdirections'], true);
	$desdescription = Validate::validateDescription($_POST['desdescription'], true);



	
	/*
	echo '<pre>';
	var_dump($_POST);
	var_dump($desdescription);
	var_dump($desdistrict);
	var_dump($descountry);
	var_dump($descostume);
	var_dump($desdirections);
	var_dump($_FILES);
	exit;*/
	
	

	




	
	


	

	$wedding = new Wedding();

	$wedding->get((int)$user->getiduser());

	
	/*
	
	echo '<pre>';
	var_dump($_POST);
	var_dump($_FILES);
	var_dump($wedding);
	var_dump($_FILES["file"]["name"] !== "");
	exit;
	
	*/



	if( $_FILES["file"]["name"] !== "" )
	{

		$photo = new Photo();

		if( $wedding->getdesphoto() != Rule::DEFAULT_PHOTO )
		{

			$photo->deletePhoto($wedding->getdesphoto(), Rule::CODE_WEDDINGS);

		}//end if

		$basename = $photo->setPhoto(
			
			$_FILES["file"], 
			$user->getiduser(),
			Rule::CODE_WEDDINGS,
			$wedding->getidwedding(),
			2
			
		);//end setPhoto



		if( $basename['basename'] === false )
		{
			Wedding::setError("Falha no envio da imagem, tente novamente | Se a falha persistir, tente enviar outra imagem ou entre em contato com o suporte");
			header('Location: /dashboard/meu-casamento');
			exit;

		}//end if
		else
		{
			
	
			$wedding->setdesphoto($basename['basename']);
			$wedding->setdesextension($basename['extension']);


		}//end else

	}//end if

	$wedding->setData([

		'idwedding'=>$idwedding,
		'iduser'=>$user->getiduser(),
		'dtwedding'=>$dtwedding,
		'tmwedding'=>$tmwedding,
		'desdescription'=>$desdescription,
		'descostume'=>$descostume,
		'desdirections'=>$desdirections,
		'desaddress'=>$desaddress,
		'desnumber'=>$desnumber,
		'desdistrict'=>$desdistrict,
		'descity'=>$descity,
		'desstate'=>$desstate,
		'descountry'=>$descountry,
		'desphoto'=>$wedding->getdesphoto(),
		'desextension'=>$wedding->getdesextension()

	]);//end setData

	



	$wedding->update();
	

	Wedding::setSuccess("Dados alterados");

	header('Location: /dashboard/meu-casamento');
	exit;



});//END route











?>