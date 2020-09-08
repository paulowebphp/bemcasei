<?php

use Core\Maintenance;
use Core\Rule;
use Core\PageDashboard;
use Core\Validate;
use Core\Model\User;
use Core\Model\Address;
//use Core\Model\Plan;








$app->get( "/dashboard/meus-dados", function()
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




	/*if ( !User::validatePlanDashboard( $user ) )
	{
		# code...
		User::setError(Rule::VALIDATE_PLAN);
		header('Location: /dashboard');
		exit;

	}//end if
	
	
	if ( ( $validate = User::validatePlanDashboard( $user ) ) === false )
	{
		# code...
		User::setError(Rule::VALIDATE_PLAN);
		header('Location: /dashboard');
		exit;

	}//end if
	
	*/

	



	$validate = User::validatePlanDashboard( $user );
	




	


		
	//$user->get((int)$user->getiduser());


	$address = new Address();

	$address->get((int)$user->getiduser());


	$state = Address::listAllStates();

	$city = [];

	if ( (int)$address->getidstate() > 0 ) 
	{
		# code...
		$city = Address::listAllCitiesByState((int)$address->getidstate());

	}//end if
	else
	{

		$city = Address::listAllCitiesByState(1);

	}//end else

	

	
	
	


	$page = new PageDashboard();

	$page->setTpl(
		
		"persons", 
		
		[
			'state'=>$state,
			'city'=>$city,
			'address'=>$address->getValues(),
			'user'=>$user->getValues(),
			'validate'=>$validate,
			'success'=>User::getSuccess(),
			'error'=>User::getError()

		]
	
	);//end setTpl

});//END route


























$app->post( "/dashboard/meus-dados", function()
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







	/*
	if ( ( $validate = User::validatePlanDashboard( $user ) ) === false )
	{
		# code...
		User::setError(Rule::VALIDATE_PLAN);
		header('Location: /dashboard');
		exit;

	}//end if
	*/



	$validate = User::validatePlanDashboard( $user );






	if( 
		
		!isset($_POST['desperson']) 
		|| 
		$_POST['desperson'] === ''
	)
	{

		User::setError("Informe o seu Nome");
		header('Location: /dashboard/meus-dados');
		exit;
		
	}//end if

	if( !$desperson = Validate::validateFullName($_POST['desperson']) )
	{

		User::setError("Preencha o seu nome completo");
		header('Location: /dashboard/meus-dados');
		exit;

	}//end if



	if( ( $desperson = Validate::validateStringUcwords($_POST['desperson'], true, false ) ) === false )
	{

		User::setError("O seu nome não pode ser formado apenas com caracteres especiais, tente novamente");
		header('Location: /dashboard/meus-dados');
		exit;
	}


	






	if( 
		
		!isset($_POST['desnick']) 
		|| 
		$_POST['desnick'] === ''
	)
	{

		User::setError("Informe o Nome");
		header('Location: /dashboard/meus-dados');
		exit;
		
	}//end if


	if( ( $desnick = Validate::validateStringNumberSpecial($_POST['desnick'], true, false) ) === false )
	{

		User::setError("O seu nome não pode ser formado apenas com caracteres especiais, tente novamente");
		header('Location: /dashboard/meus-dados');
		exit;
	}//end if

	$descountry = Rule::DESCOUNTRY;
	$descountrycode = Rule::DESCOUNTRYCODE;

	$dtbirth = NULL;
	$nrddd = NULL;
	$nrphone = NULL;
	$deszipcode = NULL;
	$desaddress = NULL;
	$desnumber = NULL;
	$descomplement = NULL;
	$desdistrict = NULL;
	$idcity = NULL;
	$descity = NULL;
	$idstate = NULL;
	$desstate = NULL;
	$desstatecode = NULL;


	/*
	echo '<pre>';
	var_dump($_POST);
	var_dump($_POST['dtbirth'] != ''  );
	var_dump(isset( $_POST['dtbirth'] ));
	var_dump(empty($_POST['dtbirth'] != ''));
	exit;
	*/


	if( 

		!empty( $_POST['dtbirth'] )
		||
		$_POST['dtbirth'] != ''
		||
		!empty( $_POST['nrddd'] )
		||
		$_POST['nrddd'] != ''
		||		
		!empty( $_POST['nrphone'] )
		||
		$_POST['nrphone'] != ''
		||
		!empty( $_POST['deszipcode'] )
		||
		$_POST['deszipcode'] != ''
		||
		!empty( $_POST['desaddress'] )
		||
		$_POST['desaddress'] != ''
		||
		!empty( $_POST['desnumber'] )
		||
		$_POST['desnumber'] != ''
		||
		!empty( $_POST['descomplement'] )
		||
		$_POST['descomplement'] != ''
		||
		!empty( $_POST['desdistrict'] )
		||
		$_POST['desdistrict'] != ''
		||
		!empty( $_POST['desstate'] )
		||
		$_POST['desstate'] != 0
		||
		!empty( $_POST['descity'] )
		||
		$_POST['descity'] != 0
	


	 )
	{


		


		if(
				
			!isset($_POST['dtbirth']) 
			|| 
			$_POST['dtbirth'] === ''
			
		)
		{

			User::setError("Informe a data de nascimento");
			header('Location: /dashboard/meus-dados');
			exit;

		}//end if

		if( !$dtbirth = Validate::validateUserMajority($_POST['dtbirth']) )
		{

			User::setError("É preciso ter 18 anos para utilizar o site");
			header('Location: /dashboard/meus-dados');
			exit;

		}//end if











		if( 
			
			!isset($_POST['nrddd']) 
			|| 
			$_POST['nrddd'] === ''
		)
		{

			User::setError("Informe o DDD");
			header('Location: /dashboard/meus-dados');
			exit;
			
		}//end if





		if( 
			
			!isset($_POST['nrphone']) 
			|| 
			$_POST['nrphone'] === ''
		)
		{

			User::setError("Informe o Telefone");
			header('Location: /dashboard/meus-dados');
			exit;
			
		}//end if





		if( !$nrddd = Validate::validateDDD($_POST['nrddd']) )
		{

			User::setError("Informe um DDD válido");
			header('Location: /dashboard/meus-dados');
			exit;

		}//end if




		if( !$nrphone = Validate::validatePhone($_POST['nrphone']) )
		{

			User::setError("Informe um telefone ou celular válido");
			header('Location: /dashboard/meus-dados');
			exit;

		}//end if





		if( 
			
			!isset($_POST['deszipcode']) 
			|| 
			$_POST['deszipcode'] === ''
		)
		{

			User::setError("Informe o CEP");
			header('Location: /dashboard/meus-dados');
			exit;
			
		}//end if

		if( !$deszipcode = Validate::validateCEP($_POST['deszipcode']) )
		{

			User::setError("Informe um CEP válido");
			header('Location: /dashboard/meus-dados');
			exit;

		}//end if








		if( 
			
			!isset($_POST['desaddress']) 
			|| 
			$_POST['desaddress'] === ''
		)
		{

			User::setError("Informe o Endereço");
			header('Location: /dashboard/meus-dados');
			exit;
			
		}//end if

		if( ( $desaddress = Validate::validateStringNumber($_POST['desaddress'], true, false) ) === false )
		{

			User::setError("O seu endereço não pode ser formado apenas com caracteres especiais, tente novamente");
			header('Location: /dashboard/meus-dados');
			exit;

		}//end if








		if( 
			
			!isset($_POST['desnumber']) 
			|| 
			$_POST['desnumber'] === ''
		)
		{

			User::setError("Informe o Número");
			header('Location: /dashboard/meus-dados');
			exit;
			
		}//end if

		if( !$desnumber = Validate::validateNumber($_POST['desnumber']) )
		{

			User::setError("Informe o seu nome apenas com números");
			header('Location: /dashboard/meus-dados');
			exit;

		}//end if













		if( 
			
			!isset($_POST['desdistrict']) 
			|| 
			$_POST['desdistrict'] === ''
		)
		{

			User::setError("Informe o Bairro");
			header('Location: /dashboard/meus-dados');
			exit;
			
		}//end if

		if( ( $desdistrict = Validate::validateStringNumber($_POST['desdistrict'], true, false) ) === false )
		{

			User::setError("O nome do bairro não pode ser formado apenas com caracteres especiais, tente novamente");
			header('Location: /dashboard/meus-dados');
			exit;

		}//end if




		



		if( !isset($_POST['desholderstate']) || $_POST['desholderstate'] === '' )
		{

			User::setError(Rule::ERROR_STATE);
			header('Location: /dashboard/meus-dados');
			exit;

		}//end if








		if ( ( $stateArray = Address::getState($_POST['desholderstate']) ) === false ) 
		{

			User::setError(Rule::VALIDATE_STATE);
			header('Location: /dashboard/meus-dados');
			exit;

		}//end if
		
		//$state = $stateArray['desstatecode'];


		$idstate = $stateArray['idstate'];
		$desstate = $stateArray['desstate'];
		$desstatecode = $stateArray['desstatecode'];




		if( !isset($_POST['desholdercity']) || $_POST['desholdercity'] === '' )
		{

			User::setError(Rule::ERROR_CITY);
			header('Location: /dashboard/meus-dados');
			exit;

		}//end if








		if( ( $cityArray = Address::getCity($_POST['desholdercity']) ) === false ) 
		{

			User::setError(Rule::VALIDATE_CITY);
			header('Location: /dashboard/meus-dados');
			exit;

		}//end if

		//$city = $cityArray['descity'];

		$idcity = $cityArray['idcity'];
		$descity = $cityArray['descity'];


		



		$descomplement = Validate::validateStringNumber($_POST['descomplement'], false, true);
		
		//$state = Address::getState($_POST['desstate']);

		//$city = Address::getCity($_POST['descity']);


		$user->setdtbirth( $dtbirth );
		$user->setnrddd( $nrddd );
		$user->setnrphone( $nrphone );

		


	}//end if

	


	/*
	echo '<pre>';
	var_dump($idcity);
	var_dump($descity);
	var_dump($idstate);
	var_dump($desstate);
	var_dump($desstatecode);
	exit;
	*/



	$address = new Address();

	$address->get((int)$user->getiduser());




	$address->setData([

		'idaddress'=>$address->getidaddress(),
		'iduser'=>$user->getiduser(),
		'deszipcode'=>$deszipcode,
		'desaddress'=>$desaddress,
		'desnumber'=>$desnumber,
		'descomplement'=>$descomplement,
		'desdistrict'=>$desdistrict,
		'idcity'=>$idcity,
		'descity'=>$descity,
		'idstate'=>$idstate,
		'desstate'=>$desstate	,
		'desstatecode'=>$desstatecode,
		'descountry'=>$descountry,
		'descountrycode'=>$descountrycode

	]);//end setData


	$address->update();


	
	//$user->setData($_POST);
	$user->setdesperson( $desperson );
	$user->setdesnick( $desnick );
	

	$user->update();
	$user->setToSession();



	User::setSuccess("Dados alterados");
	header('Location: /dashboard/meus-dados');
	exit;






});//END route










?>