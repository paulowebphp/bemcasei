<?php

use Core\Maintenance;
use Core\Rule;
use Core\PageDashboard;
use Core\Validate;
use Core\Model\User;
use Core\Model\Address;
use Core\Model\Plan;








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

	}//end if*/






		
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
			'address'=>((int)$address->getValues() > 0) ? $address->getValues() : ['deszipcode'=>'','desaddress'=>'','desnumber'=>'','descomplement'=>'','desdistrict'=>'','idstate'=>'','idcity'=>''],
			'user'=>$user->getValues(),
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







	if ( !User::validatePlanDashboard( $user ) )
	{
		# code...
		User::setError(Rule::VALIDATE_PLAN);
		header('Location: /dashboard');
		exit;

	}//end if









	if( 
		
		!isset($_POST['desperson']) 
		|| 
		$_POST['desperson'] === ''
	)
	{

		User::setError("Informe o Nome");
		header('Location: /dashboard/meus-dados');
		exit;
		
	}//end if

	if( !$desperson = Validate::validateFullName($_POST['desperson']) )
	{

		User::setError("Preencha o seu nome completo");
		header('Location: /dashboard/meus-dados');
		exit;

	}//end if

	if( !$desperson = Validate::validateString($_POST['desperson']) )
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


	if( !$desnick = Validate::validateStringWithAccent($_POST['desnick']) )
	{

		User::setError("O seu nome não pode ser formado apenas com caracteres especiais, tente novamente");
		header('Location: /dashboard/meus-dados');
		exit;
	}











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













	if ( (int)$user->getinaccount() > 0 )
	{
		# code...







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

		if( !$desaddress = Validate::validateString($_POST['desaddress']) )
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

		if( !$desdistrict = Validate::validateString($_POST['desdistrict']) )
		{

			User::setError("O nome do bairro não pode ser formado apenas com caracteres especiais, tente novamente");
			header('Location: /dashboard/meus-dados');
			exit;

		}//end if

		/*if( 
			
			!isset($_POST['descity']) 
			|| 
			$_POST['descity'] === ''
		)
		{

			User::setError("Informe a Cidade");
			header('Location: /dashboard/meus-dados');
			exit;
			
		}//end if

		if( 
			
			!isset($_POST['desstate']) 
			|| 
			$_POST['desstate'] === ''
		)
		{

			User::setError("Informe o Estado");
			header('Location: /dashboard/meus-dados');
			exit;
			
		}//end if*/






		$descomplement = Validate::validateString($_POST['descomplement'], true);
		
		$city = Address::getCity($_POST['descity']);

		$state = Address::getState($_POST['desstate']);

		
		/*$address->setdeszipcode( $_POST['deszipcode'] );
		$address->setdesaddress( $_POST['desaddress'] );
		$address->setdesnumber( $_POST['desnumber'] );
		$address->setdescomplement( $_POST['descomplement'] );
		$address->setdesdistrict( $_POST['desdistrict'] );
		$address->setdescity( $_POST['descity'] );
		$address->setdesstate( $_POST['desstate'] );*/





		
		
		






		$address = new Address();

		$address->setData([

			'idaddress'=>$_POST['idaddress'],
			'iduser'=>$user->getiduser(),
			'deszipcode'=>$deszipcode,
			'desaddress'=>$desaddress,
			'desnumber'=>$desnumber,
			'descomplement'=>$descomplement,
			'desdistrict'=>$desdistrict,
			'idcity'=>$city['idcity'],
			'descity'=>Validate::validateString($city['descity']),
			'idstate'=>$state['idstate'],
			'desstate'=>Validate::validateString($state['desstate']),
			'desstatecode'=>$state['desstatecode'],
			'descountry'=>$_POST['descountry'],
			'descountrycode'=>$_POST['descountrycode']

		]);//end setData






		$address->update();




		$user->setnrddd( $nrddd );
		$user->setnrphone( $nrphone );


	}//end if

	//$user->setData($_POST);



	$user->setdesperson( $desperson );
	$user->setdesnick( $desnick );
	
	$user->setdtbirth( $dtbirth );


	
	# Core colocou $user->save(); Aula 120
	$user->update();

	$user->setToSession();

	User::setSuccess("Dados alterados");

	header('Location: /dashboard/meus-dados');
	exit;

});//END route










?>