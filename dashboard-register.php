<?php

//use Core\Mailer;
use Core\Maintenance;
use Core\PageDashboard;
use Core\Rule;
use Core\Validate;
use Core\Wirecard;
use Core\Model\Account;
use Core\Model\Address;
//use Core\Model\Cart;
//use Core\Model\Consort;
//use Core\Model\Coupon;
//use Core\Model\Customer;
//use Core\Model\Fee;
//use Core\Model\Order;
//use Core\Model\Plan;
use Core\Model\Payment;
//use Core\Model\PaymentStatus;
use Core\Model\User;







$app->get( "/dashboard/cadastrar", function()
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

	




	$validate = User::validatePlanDashboard( $user );



	if ( (int)$user->getinplancontext() == 0 )
	{
		# code...
		Payment::setError(Rule::VALIDATE_PLAN);
		header('Location: /dashboard/meu-plano');
		exit;

	}//end if




	
	



	






	if ( (int)$user->getinaccount() == 1 )
	{
		# code...
		header("Location: /dashboard");
		exit;

	}//end if




	$state = Address::listAllStates();



	$city = [];
	

	if ( isset($_SESSION["planPurchaseRegisterValues"]) ) 
	{
		# code...
		$city = Address::listAllCitiesByState($_SESSION["planPurchaseRegisterValues"]['desstate']);

	}//end if
	else
	{

		$city = Address::listAllCitiesByState(1);
	

	}//end else


	


	$page = new PageDashboard();

	$page->setTpl(
		
		"register",

		[
			'user'=>$user->getValues(),
			//'payment'=>$payment->getValues(),
			'city'=>$city,
			'state'=>$state,
			'validate'=>$validate,
			'error'=>Account::getError(),
			'success'=>Account::getSuccess(),
			'planPurchaseRegisterValues'=> (isset($_SESSION["planPurchaseRegisterValues"])) ? $_SESSION["planPurchaseRegisterValues"] : ['desname'=>'','desemail'=>'','desdocument'=>'', 'nrddd'=>'', 'nrphone'=>'', 'dtbirth'=>'', 'zipcode'=>'', 'desaddress'=>'', 'desnumber'=>'', 'descomplement'=>'', 'desdistrict'=>'', 'desstate'=>'', 'descity'=>'']


		]
	
	);//end setTpl

});//END route





































$app->post( "/dashboard/cadastrar", function()
{

	$_SESSION['planPurchaseRegisterValues'] = $_POST;






	/*if ( 

		isset($_POST['checkout-own-card'])
		||
		isset($_POST['checkout-boleto']) 

	) 
	{
		# code...
		$_SESSION['planPurchaseRegisterValues']['dtholderbirth'] = '';
		$_SESSION['planPurchaseRegisterValues']['desholderaddress'] = '';
		$_SESSION['planPurchaseRegisterValues']['desholderdocument'] = '';
		$_SESSION['planPurchaseRegisterValues']['desholdernumber'] = '';
		$_SESSION['planPurchaseRegisterValues']['desholdercomplement'] = '';
		$_SESSION['planPurchaseRegisterValues']['desholderdistrict'] = '';
		$_SESSION['planPurchaseRegisterValues']['desholderstate'] = '';
		$_SESSION['planPurchaseRegisterValues']['desholdercity'] = '';
		$_SESSION['planPurchaseRegisterValues']['nrholderddd'] = '';
		$_SESSION['planPurchaseRegisterValues']['nrholderphone'] = '';
		$_SESSION['planPurchaseRegisterValues']['zipcode'] = '';
	

	}//end if*/
	







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

	$validate = User::validatePlanDashboard( $user );



	if ( (int)$user->getinplancontext() == 0 )
	{
		# code...
		Payment::setError(Rule::VALIDATE_PLAN);
		header('Location: /dashboard/meu-plano');
		exit;

	}//end if





	





	



	



	if ( (int)$user->getinaccount() == 1 )
	{
		# code...
		header("Location: /dashboard");
		exit;
		
	}//end if









	if( 
		
		!isset($_POST['desname']) 
		|| 
		$_POST['desname'] == ''
	)
	{

		

		Account::setError(Rule::ERROR_NAME);
		header('Location: /dashboard/cadastrar');
		exit;

	}//end if






	if( !Validate::validateFullName($_POST['desname']) )
	{ 


		Account::setError(Rule::VALIDATE_FULL_NAME);
		header('Location: /dashboard/cadastrar');
		exit;

	}//end if






	if( ( $desname = Validate::validateStringUcwords($_POST['desname'], true, false) ) === false )
	{



		Account::setError(Rule::VALIDATE_NAME);
		header('Location: /dashboard/cadastrar');
		exit;

	}//end if













	if(
		
		!isset($_POST['desemail']) 
		|| 
		$_POST['desemail'] == ''
	)
	{


		Account::setError(Rule::ERROR_EMAIL);
		header('Location: /dashboard/cadastrar');
		exit;

	}//end if

	if( ($desemail = Validate::validateEmail($_POST['desemail'])) === false )
	{	

		Account::setError(Rule::VALIDATE_EMAIL);
		header('Location: /dashboard/cadastrar');
		exit;

	}//end if













	if(
		
		!isset($_POST['desdocument']) 
		|| 
		$_POST['desdocument'] === ''
		
	)
	{

		Account::setError(Rule::ERROR_CPF);
		header('Location: /dashboard/cadastrar');
		exit;

	}//end if







	if( !$desdocument = Validate::validateDocument($user->intypedoc(), $_POST['desdocument']) )
	{

		Account::setError(Rule::VALIDATE_CPF);
		header('Location: /dashboard/cadastrar');
		exit;

	}//end if





	




	if(
		
		!isset($_POST['dtbirth']) 
		|| 
		$_POST['dtbirth'] === ''
		
	)
	{

		Account::setError(Rule::ERROR_DATE_BIRTH);
		header('Location: /dashboard/cadastrar');
		exit;

	}//end if






	if( !$dtbirth = Validate::validateUserMajority($_POST['dtbirth']) )
	{

		Account::setError(Rule::VALIDATE_DATE_MAJORITY);
		header('Location: /dashboard/cadastrar');
		exit;

	}//end if



	






	if(
		
		!isset($_POST['nrddd']) 
		|| 
		$_POST['nrddd'] === ''
		
	)
	{

		Account::setError(Rule::ERROR_DDD);
		header('Location: /dashboard/cadastrar');
		exit;

	}//end if






	if( !$nrddd = Validate::validateDDD($_POST['nrddd']) )
	{

		Account::setError(Rule::VALIDATE_DDD);
		header('Location: /dashboard/cadastrar');
		exit;

	}//end if








	if(
		
		!isset($_POST['nrphone']) 
		|| 
		$_POST['nrphone'] === ''
		
	)
	{

		Account::setError(Rule::ERROR_PHONE);
		header('Location: /dashboard/cadastrar');
		exit;

	}//end if







	if( !$nrphone = Validate::validatePhone($_POST['nrphone']) )
	{

		Account::setError(Rule::VALIDATE_PHONE);
		header('Location: /dashboard/cadastrar');
		exit;

	}//end if














	
	if( 
		
		!isset($_POST['zipcode']) 
		|| 
		$_POST['zipcode'] === ''
	)
	{

		Account::setError(Rule::ERROR_ZIPCODE);
		header('Location: /dashboard/cadastrar');
		exit;
		
	}//end if







	if( !$deszipcode = Validate::validateCEP($_POST['zipcode']) )
	{

		Account::setError(Rule::VALIDATE_ZIPCODE);
		header('Location: /dashboard/cadastrar');
		exit;

	}//end if
	










	if(
		!isset($_POST['desaddress']) 
		|| 
		$_POST['desaddress'] === ''
		
	)
	{

		Account::setError(Rule::ERROR_ADDRESS);
		header('Location: /dashboard/cadastrar');
		exit;

	}//end if






	if( ( $desaddress = Validate::validateStringNumber($_POST['desaddress'])  ) === false )
	{

		Account::setError(Rule::VALIDATE_ADDRESS);
		header('Location: dashboard/comprar-plano//checkout');
		exit;

	}//end if













	

	if(
		
		!isset($_POST['desnumber']) 
		|| 
		$_POST['desnumber'] === ''
		
	)
	{

		Account::setError(Rule::ERROR_NUMBER);
		header('Location: /dashboard/cadastrar');
		exit;

	}//end if






	if( !$desnumber = Validate::validateNumber($_POST['desnumber']) )
	{

		Account::setError(Rule::VALIDATE_NUMBER);
		header('Location: /dashboard/cadastrar');
		exit;

	}//end if










	if(
		
		!isset($_POST['desdistrict']) 
		|| 
		$_POST['desdistrict'] === ''
		
	)
	{

		Account::setError(Rule::ERROR_DISTRICT);
		header('Location: /dashboard/cadastrar');
		exit;

	}//end if






	if( ( $desdistrict = Validate::validateStringNumber($_POST['desdistrict'])  ) === false )
	{

		Account::setError(Rule::VALIDATE_DISTRICT);
		header('Location: /dashboard/cadastrar');
		exit;

	}//end if



	

	
	



	


	








	if(
				
		!isset($_POST['descity']) 
		|| 
		$_POST['descity'] === ''
		
	)
	{

		Account::setError(Rule::ERROR_CITY);
		header('Location: /dashboard/cadastrar');
		exit;

	}//end if



	if ( ( $descity = Address::getCity($_POST['descity']) ) === false ) 
	{
		# code...
		Account::setError(Rule::VALIDATE_CITY);
		header('Location: /dashboard/cadastrar');
		exit;

	}//end if
















	if(
				
		!isset($_POST['desstate']) 
		|| 
		$_POST['desstate'] === ''
		
	)
	{

		Account::setError(Rule::ERROR_STATE);
		header('Location: /dashboard/cadastrar');
		exit;

	}//end if



	if ( ( $desstate = Address::getState($_POST['desstate']) ) === false ) 
	{
		# code...
		Account::setError(Rule::VALIDATE_STATE);
		header('Location: /dashboard/cadastrar');
		exit;

	}//end if




	

	if(
		
		!isset($_POST['interms']) 
		|| 
		$_POST['interms'] === ''
		||
		(int)$_POST['interms'] != 1
		
	)
	{

		Account::setError(Rule::ERROR_INTERMS);
		header('Location: /dashboard/cadastrar');
		exit;

	}//end if





	$descomplement = Validate::validateStringNumber($_POST['descomplement'], false, true);
	



	/*
	echo '<pre>';
	var_dump($desname);
	var_dump($desemail);
	var_dump($dtbirth);
	var_dump($desdocument);
	var_dump(Rule::NR_COUNTRY_AREA);
	var_dump($nrddd);
	var_dump($nrphone);
	var_dump($deszipcode);
	var_dump($desaddress);
	var_dump($desnumber);
	var_dump($descomplement);
	var_dump($desdistrict);		
	var_dump($descity['descity']);
	var_dump($desstate['desstatecode']);
	var_dump(Rule::DESCOUNTRYCODE);
	exit;
	*/


	$wirecard = new Wirecard();

	//$inplan = Wirecard::getPlan($user->getinplan());
	



	$wirecardAccountData = $wirecard->createAccount(

		$desname,
		$desemail,
		$dtbirth,
		$desdocument,
		Rule::NR_COUNTRY_AREA,
		(int)$nrddd,
		(int)$nrphone,
		$deszipcode,
		$desaddress,
		(int)$desnumber,
		$descomplement,
		$desdistrict,		
		$descity['descity'],
		$desstate['desstatecode'],
		Rule::DESCOUNTRYCODE

	);//END createAccount

	/*
	echo '<pre>';
	var_dump($wirecardAccountData);
	exit;
	*/



	


	$account = new Account();


	$account->get((int)$user->getiduser());


	


	$account->setData([


		'idaccount'=>$account->getidaccount(),
		'iduser'=>$user->getiduser(),
		'desaccountcode'=>$wirecardAccountData['desaccountcode'],
		'desaccesstoken'=>$wirecardAccountData['desaccesstoken'],
		'deschannelid'=>$wirecardAccountData['deschannelid'],
		'desname'=>$desname,
		'desemail'=>$desemail,
		'nrcountryarea'=>Rule::NR_COUNTRY_AREA,
		'nrddd'=>$nrddd,
		'nrphone'=>$nrphone,
		'intypedoc'=>0,
		'desdocument'=>$desdocument,
	  	'deszipcode' =>$deszipcode,
		'desaddress'=>$desaddress,
		'desnumber' =>$desnumber,
	  	'descomplement'=>$descomplement,
	  	'desdistrict'=>$desdistrict,
	  	'descity'=>$descity['descity'],
	  	'desstate'=>$desstate['desstatecode'],
	  	'descountry'=>Rule::DESCOUNTRYCODE,
	  	'dtbirth'=>$dtbirth

	]);//end setData

	

	$account->update();


	/*
	echo '<pre>';
	var_dump($account);
	exit;
	*/







	/*
	
	$address = new Address();

	$address->get((int)$user->getiduser());



	$address->setData([


		'idaddress'=>$address->getidaddress(),
		'iduser'=>$user->getiduser(),
		'deszipcode'=>$account->getdeszipcode(),
		'desaddress'=>$account->getdesaddress(),
		'desnumber'=>$account->getdesnumber(),
		'descomplement'=>$account->getdescomplement(),
		'desdistrict'=>$account->getdesdistrict(),
		'idcity'=>$descity['idcity'],
		'descity'=>$descity['descity'],
		'idstate'=>$desstate['idstate'],
		'desstate'=>$desstate['desstate'],
		'desstatecode'=>$desstate['desstatecode'],
		'descountry'=>Rule::DESCOUNTRY,
		'descountrycode'=>Rule::DESCOUNTRYCODE


	]);//end setData

	



	$address->update();
	
	*/



	



	/*
	
	echo '<pre>';
	var_dump($address);
	exit;*/



	





	$timezone = new DateTimeZone('America/Sao_Paulo');
	$dt_now = new DateTime("now");
	$dt_now->setTimezone($timezone);


	


	//$user->setdesdocument($account->getdesdocument());
	//$user->setnrcountryarea($account->getnrcountryarea());
	//$user->setnrddd($account->getnrddd());
	//$user->setnrphone($account->getnrphone());
	//$user->setdtbirth($account->getdtbirth());

	

	$user->setdtterms($dt_now->format('Y-m-d H:i:s'));
	$user->setdesipterms($_SERVER['REMOTE_ADDR']);
	$user->setinterms($_POST['interms']);

	$user->setinaccount(1);

	


	$user->update();
	$user->setToSession();









	

	if(isset($_SESSION['planPurchaseRegisterValues'])) unset($_SESSION['planPurchaseRegisterValues']);

	
	

	header("Location: /dashboard/painel-financeiro");
	exit;
	



});//END route





















?>