<?php

use Core\Maintenance;
use Core\PageDashboard;
use Core\Rule;
use Core\Photo;
use Core\Validate;
use Core\Model\User;
use Core\Model\Party;
use Core\Model\Plan;






$app->get( "/dashboard/festa-de-casamento", function()
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



	if ( !User::validatePlanDashboard( $user ) )
	{
		# code...
		User::setError(Rule::VALIDATE_PLAN);
		header('Location: /dashboard');
		exit;

	}//end if






	$party = new Party();

	$party->get((int)$user->getiduser());



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
		


		"parties", 
		
		[
			'user'=>$user->getValues(),
			'party'=>$party->getValues(),
			'success'=>Party::getSuccess(),
			'error'=>Party::getError()
			

		]
	
	);//end setTpl

});//END route




















$app->post( "/dashboard/festa-de-casamento", function()
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


	if ( !User::validatePlanDashboard( $user ) )
	{
		# code...
		User::setError(Rule::VALIDATE_PLAN);
		header('Location: /dashboard');
		exit;

	}//end if






	if(
		
		!isset($_POST['dtparty']) 
		|| 
		$_POST['dtparty'] === ''
		
	){

		Party::setError("Insira a data da festa de casamento");
		header('Location: /dashboard/festa-de-casamento');
		exit;

	}//end if

	if( !$dtparty = Validate::validateDate($_POST['dtparty'], 1) )
	{

		Party::setError("Informe uma data válida");
		header('Location: /dashboard/festa-de-casamento');
		exit;

	}//end if











	if(
		
		!isset($_POST['tmparty']) 
		|| 
		$_POST['tmparty'] === ''
		
	){

		Party::setError("Insira o horário da festa de casamento");
		header('Location: /dashboard/festa-de-casamento');
		exit;

	}//end if

	if( !$tmparty = Validate::validateTime($_POST['tmparty']) )
	{	
		

		Party::setError("Informe uma hora válida");
		header('Location: /dashboard/festa-de-casamento');
		exit;

	}//end if













	if(
		
		!isset($_POST['desaddress']) 
		|| 
		$_POST['desaddress'] === ''
		
	)
	{

		Party::setError("Preencha o local da festa de casamento");
		header('Location: /dashboard/festa-de-casamento');
		exit;

	}//end if

	if( !$desaddress = Validate::validateStringWithAccent($_POST['desaddress']) )
	{

		Party::setError("O endereço não pode ser formado apenas com caracteres especiais, tente novamente");
		header('Location: /dashboard/festa-de-casamento');
		exit;

	}//end if







	if(
		
		!isset($_POST['desnumber']) 
		|| 
		$_POST['desnumber'] === ''
		
	)
	{

		Party::setError("Preencha o número da festa de casamento");
		header('Location: /dashboard/festa-de-casamento');
		exit;

	}//end if

	if( !$desnumber = Validate::validateNumber($_POST['desnumber']) )
	{

		Party::setError("O número não deve conter apenas caracteres especiais, nem pode ser vazio, tente novamente");
		header('Location: /dashboard/festa-de-casamento');
		exit;

	}//end if














	if(
		
		!isset($_POST['descity']) 
		|| 
		$_POST['descity'] === ''
		
	)
	{

		Party::setError("Preencha a cidade da festa de casamento");
		header('Location: /dashboard/festa-de-casamento');
		exit;

	}//end if

	if( !$descity = Validate::validateStringWithAccent($_POST['descity']) )
	{

		Party::setError("O nome da cidade não deve conter apenas caracteres especiais, nem pode ser vazio, tente novamente");
		header('Location: /dashboard/festa-de-casamento');
		exit;

	}//end if












	if(
		
		!isset($_POST['desstate']) 
		|| 
		$_POST['desstate'] === ''
		
	)
	{

		Party::setError("Preencha o estado da festa de casamento");
		header('Location: /dashboard/festa-de-casamento');
		exit;

	}//end if

	if( !$desstate = Validate::validateStringWithAccent($_POST['desstate']) )
	{

		Party::setError("O nome do estado não deve conter apenas caracteres especiais, nem pode ser vazio, tente novamente");
		header('Location: /dashboard/festa-de-casamento');
		exit;

	}//end if


















	$idparty = $_POST['idparty'];
	$desdescription = Validate::validateDescription($_POST['desdescription'], true);
	$desdistrict = Validate::validateStringWithAccent($_POST['desdistrict'], true);
	$descountry = Validate::validateStringWithAccent($_POST['descountry'], true);
	$descostume = Validate::validateStringWithAccent($_POST['descostume'], true);
	$desdirections = Validate::validateDescription($_POST['desdirections'], true);







	$party = new Party();

	$party->get((int)$user->getiduser());



	







	if( $_FILES["file"]["name"] !== "" )
	{

		$photo = new Photo();

		if( $party->getdesphoto() != Rule::DEFAULT_PHOTO )
		{

			$photo->deletePhoto($party->getdesphoto(), Rule::CODE_PARTIES);

		}//end if

		$basename = $photo->setPhoto(
			
			$_FILES["file"], 
			$user->getiduser(),
			Rule::CODE_PARTIES,
			$party->getidparty(),
			2
			
		);//end setPhoto


		if( $basename['basename'] === false )
		{
			Party::setError("Falha no envio da imagem, tente novamente | Se a falha persistir, tente enviar outra imagem ou entre em contato com o suporte");
			header('Location: /dashboard/festa-de-casamento');
			exit;

		}//end if
		else
		{
			
	
			$party->setdesphoto($basename['basename']);
			$party->setdesextension($basename['extension']);


		}//end else

	}//end if

	




	$party->setData([

		'idparty'=>$idparty,
		'iduser'=>$user->getiduser(),
		'dtparty'=>$dtparty,
		'tmparty'=>$tmparty,
		'desdescription'=>$desdescription,
		'descostume'=>$descostume,
		'desdirections'=>$desdirections,
		'desaddress'=>$desaddress,
		'desnumber'=>$desnumber,
		'desdistrict'=>$desdistrict,
		'descity'=>$descity,
		'desstate'=>$desstate,
		'descountry'=>$descountry,
		'desphoto'=>$party->getdesphoto(),
		'desextension'=>$party->getdesextension()

	]);//end setData

		




	$party->update();
	
	






	Party::setSuccess("Dados alterados");

	header('Location: /dashboard/festa-de-casamento');
	exit;



});//END route











?>