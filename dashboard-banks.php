<?php

use Core\Maintenance;
use Core\PageDashboard;
//use Core\Photo;
use Core\Wirecard;
use Core\Rule;
use Core\Validate;
use Core\Model\User;
//use Core\Model\Order;
//use Core\Model\Product;
//use Core\Model\Gift;
use Core\Model\Bank;
//use Core\Model\Transfer;
//use Core\Model\TransferStatus;
use Core\Model\Account;
//use Core\Model\Plan;













$app->get( "/dashboard/conta-bancaria/deletar/:hash", function( $hash ) 
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




	$idbank = Validate::getHash($hash);

	if( $idbank == '' )
	{

		Account::setError(Rule::VALIDATE_ID_HASH);
		header('Location: /dashboard/sua-carteira');
		exit;

	}//end if



	$bank = new Bank();

	$bank->getBank((int)$idbank);



	if( $bank->getinstatus() == 0 )
	{

		Account::setError(Rule::BANK_INACTIVE);
		header('Location: /dashboard/sua-carteira');
		exit;

	}//end if


	//$bank->delete();

	$bank->setinstatus(0);

	$bank->update();



	header('Location: /dashboard/sua-carteira');
	exit;
	
});//END route









































$app->post( "/dashboard/conta-bancaria/adicionar", function()
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


	/*if ( (int)$user->getinplancontext() == 0 )
	{
		# code...
		User::setError(Rule::VALIDATE_PLAN);
		header('Location: /dashboard');
		exit;

	}//end if*/


	if ( ( $validate = User::validatePlanDashboard( $user ) ) === false )
	{
		# code...
		User::setError(Rule::VALIDATE_PLAN);
		header('Location: /dashboard');
		exit;

	}//end if








	if( Bank::checkActiveBankExists((int)$user->getiduser()) )
	{

		Account::setError(Rule::BANK_ALREADY_EXISTS);
		header('Location: /dashboard/sua-carteira');
		exit;

	}//end



	$account = new Account();

	$account->get((int)$user->getiduser());



	if( 
		
		!isset($_POST['desbanknumber']) 
		|| 
		$_POST['desbanknumber'] === ''
		
	)
	{

		Bank::setError("Digite o número do banco");
		header("Location: /dashboard/conta-bancaria/adicionar");
		exit;

	}//end if

	if( !$desbanknumber = Validate::validateBankNumber($_POST['desbanknumber']) )
	{

		Bank::setError("Informe um numero de banco válido, de acordo com os Termos da Lista de Presentes Virtuais do Amar Casar");
		header("Location: /dashboard/conta-bancaria/adicionar");
		exit;

	}//end if










	if( 
		
		!isset($_POST['desaccounttype']) 
		|| 
		$_POST['desaccounttype'] === ''
		
	)
	{

		Bank::setError("Digite o número do banco");
		header("Location: /dashboard/conta-bancaria/adicionar");
		exit;

	}//end if

	if( !$desaccounttype = Validate::validateAccountType($_POST['desaccounttype']) )
	{

		Bank::setError("Informe um tipo de conta válida");
		header("Location: /dashboard/conta-bancaria/adicionar");
		exit;

	}//end if













	if(	!isset($_POST['desname']) || $_POST['desname'] == '' )
	{

		
		Bank::setError(Rule::ERROR_NAME);
		header("Location: /dashboard/conta-bancaria/adicionar");
		exit;

	}//end if








	if( ( $desname = Validate::validateStringUcwords($_POST['desname'], true, false) ) === false )
	{

		
		Bank::setError(Rule::VALIDATE_NAME);
		header("Location: /dashboard/conta-bancaria/adicionar");
		exit;

	}//end if









	if(
		
		!isset($_POST['desdocument']) 
		|| 
		$_POST['desdocument'] === ''
		
	)
	{

		Bank::setError(Rule::ERROR_CPF);
		header("Location: /dashboard/conta-bancaria/adicionar");
		exit;


	}//end if

	if( !$desdocument = Validate::validateDocument(0, $_POST['desdocument']) )
	{

		Bank::setError(Rule::VALIDATE_CPF);
		header("Location: /dashboard/conta-bancaria/adicionar");
		exit;

	}//end if
		




	if( $account->getdesdocument() != $desdocument )
	{

		Bank::setError(Rule::DOCUMENT_DIFERENCE);
		header("Location: /dashboard/conta-bancaria/adicionar");
		exit;
		
	}//en if
	









	if( 
		
		!isset($_POST['desagencynumber']) 
		|| 
		$_POST['desagencynumber'] === ''
		
	)
	{

		Bank::setError("Digite o número da agência sem dígito verificador");
		header("Location: /dashboard/conta-bancaria/adicionar");
		exit;

	}//end if



	if( !$desagencynumber = Validate::validateAgencyNumber($_POST['desagencynumber']) )
	{

		
		Bank::setError("O número da agência deve ter entre 4 a 6 caracteres, e deve conter apenas números");
		header("Location: /dashboard/conta-bancaria/adicionar");
		exit;

	}//end if










	if(
		
		!isset($_POST['desagencycheck']) 
		|| 
		$_POST['desagencycheck'] === ''
		
	)
	{

		Bank::setError("Digite o dígito verificador da agência");
		header("Location: /dashboard/conta-bancaria/adicionar");
		exit;

	}//end if

	if( ($desagencycheck = Validate::validateAgencyCheck($_POST['desagencycheck'])) === false )
	{

		
		Bank::setError("O dígito verificador da agência deve ter 1 caracter");
		header("Location: /dashboard/conta-bancaria/adicionar");
		exit;

	}//end if









	if(
		
		!isset($_POST['desaccountnumber'])
		|| 
		$_POST['desaccountnumber'] === ''
		
	)
	{

		Bank::setError("Digite o número da conta sem dígito verificador");
		header("Location: /dashboard/conta-bancaria/adicionar");
		exit;

	}//end if

	if( !$desaccountnumber = Validate::validateAccountNumber($_POST['desaccountnumber']) )
	{

		
		Bank::setError("O número da conta deve ter entre 6 a 8 caracteres");
		header("Location: /dashboard/conta-bancaria/adicionar");
		exit;

	}//end if











	if(
		
		!isset($_POST['desaccountcheck'])
		|| 
		$_POST['desaccountcheck'] === ''
		
	)
	{

		Bank::setError("Digite o dígito verificador da conta");
		header("Location: /dashboard/conta-bancaria/adicionar");
		exit;

	}//end if

	if( ($desaccountcheck = Validate::validateAccountCheck($_POST['desaccountcheck'])) === false )
	{

		
		Bank::setError("O dígito verificador da agência deve ter 1 caracter");
		header("Location: /dashboard/conta-bancaria/adicionar");
		exit;

	}//end if


	$intypedoc = 0;



	$wirecard = new Wirecard();

	

	$account = new Account();

	$account->get((int)$user->getiduser());



	$bank = new Bank();

	//$data = Bank::checkBankCodeExists( $user->getiduser() );

	//$bank->get((int)$user->getiduser());





	try 
	{


		$bankData = $wirecard->createBank(

			$desbanknumber,
			$desagencynumber,
			$desagencycheck,
			$desaccountnumber,
			$desaccountcheck,
			$desaccounttype,
			$desname,
			$desdocument,
			$intypedoc,
			$account->getdesaccesstoken(),
			$account->getdesaccountcode()
	
		);//end createBank


	}//end try
	catch (\Throwable $th) 
	{


		Bank::setError(Rule::BANK_UNEXPECTED);
		header('Location: /dashboard/sua-carteira');
		exit;


	}//end catch

	
	

	
	if( $bankData != '' )
	{

		
		$bank->setData([

			'iduser'=>$user->getiduser(),
			'idaccount'=>$account->getidaccount(),
			'instatus'=>1,
			'desname'=>$desname,
			'desdocument'=>$desdocument,
			'desbankcode'=>$bankData,
			'desbanknumber'=>$desbanknumber,
			'desagencynumber'=>$desagencynumber,
			'desagencycheck'=>$desagencycheck,
			'desaccounttype'=>$desaccounttype,
			'desaccountnumber'=>$desaccountnumber,
			'desaccountcheck'=>$desaccountcheck

		]);


		
		$bank->update();


		Account::setSuccess("Conta bancária criada");

		header("Location: /dashboard/sua-carteira");
		exit;


	}//end if



});//END route






































$app->get( "/dashboard/conta-bancaria/adicionar", function() 
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



	/*if ( (int)$user->getinplancontext() == 0 )
	{
		# code...
		User::setError(Rule::VALIDATE_PLAN);
		header('Location: /dashboard');
		exit;

	}//end if*/



	if ( ( $validate = User::validatePlanDashboard( $user ) ) === false )
	{
		# code...
		User::setError(Rule::VALIDATE_PLAN);
		header('Location: /dashboard');
		exit;

	}//end if

	



	


	if( Bank::checkActiveBankExists((int)$user->getiduser()) )
	{

		Account::setError(Rule::BANK_ALREADY_EXISTS);
		header('Location: /dashboard/sua-carteira');
		exit;

	}//end


	//$bank = new Bank();


	//$bank->get((int)$user->getiduser());


	


	/*if( !$bank->getdesbanknumber()) $bank->setdesbanknumber('');
	if( !$bank->getdesagencynumber()) $bank->setdesagencynumber('');
	if( !$bank->getdesagencycheck()) $bank->setdesagencycheck('');
	if( !$bank->getdesaccounttype()) $bank->setdesaccounttype('');
	if( !$bank->getdesaccountnumber()) $bank->setdesaccountnumber('');
	if( !$bank->getdesaccountcheck()) $bank->setdesaccountcheck('');*/




	$bankValues = Bank::getBanksValues();




	$page = new PageDashboard();

	$page->setTpl(
		

 
		"banks-create", 
		
		[
			'user'=>$user->getValues(),
			//'bank'=>$bank->getValues(),
			'bankvalues'=>$bankValues,
			'validate'=>$validate,
			'success'=>Bank::getSuccess(),
			'error'=>Bank::getError()

		]
	
	);//end setTpl
	
});//END route

































































$app->post( "/dashboard/conta-bancaria/:hash", function( $hash )
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


	/*if ( (int)$user->getinplancontext() == 0 )
	{
		# code...
		User::setError(Rule::VALIDATE_PLAN);
		header('Location: /dashboard');
		exit;

	}//end if*/


	if ( ( $validate = User::validatePlanDashboard( $user ) ) === false )
	{
		# code...
		User::setError(Rule::VALIDATE_PLAN);
		header('Location: /dashboard');
		exit;

	}//end if








	$idbank = Validate::getHash($hash);

	if( $idbank == '' )
	{

		Account::setError(Rule::VALIDATE_ID_HASH);
		header('Location: /dashboard/sua-carteira');
		exit;

	}//end if

	





	$bank = new Bank();

	$bank->getBank((int)$idbank);






	if( $bank->getinstatus() == 0 )
	{

		Account::setError(Rule::BANK_INACTIVE);
		header('Location: /dashboard/sua-carteira');
		exit;

	}//end if







	$account = new Account();

	$account->get((int)$user->getiduser());










	if(	!isset($_POST['desname']) || $_POST['desname'] == '' )
	{

		
		Bank::setError(Rule::ERROR_NAME);
		header("Location: /dashboard/conta-bancaria/".$hash);
		
		exit;

	}//end if








	if( ( $desname = Validate::validateStringUcwords($_POST['desname'], true, false) ) === false )
	{

		
		Bank::setError(Rule::VALIDATE_NAME);
		header("Location: /dashboard/conta-bancaria/".$hash);
		exit;

	}//end if








	if( 
		
		!isset($_POST['desbanknumber']) 
		|| 
		$_POST['desbanknumber'] === ''
		
	)
	{

		Bank::setError("Digite o número do banco");
		header("Location: /dashboard/conta-bancaria/".$hash);
		exit;

	}//end if

	if( !$desbanknumber = Validate::validateBankNumber($_POST['desbanknumber']) )
	{

		Bank::setError("Informe um numero de banco válido, de acordo com os Termos da Lista de Presentes Virtuais do Amar Casar");
		header("Location: /dashboard/conta-bancaria/".$hash);
		exit;

	}//end if










	if( 
		
		!isset($_POST['desaccounttype']) 
		|| 
		$_POST['desaccounttype'] === ''
		
	)
	{

		Bank::setError("Digite o número do banco");
		header("Location: /dashboard/conta-bancaria/".$hash);
		exit;

	}//end if

	if( !$desaccounttype = Validate::validateAccountType($_POST['desaccounttype']) )
	{

		Bank::setError("Informe um tipo de conta válida");
		header("Location: /dashboard/conta-bancaria/".$hash);
		exit;

	}//end if













	if(	!isset($_POST['desname']) || $_POST['desname'] == '' )
	{

		
		Bank::setError(Rule::ERROR_NAME);
		header("Location: /dashboard/conta-bancaria/".$hash);
		exit;

	}//end if








	if( ( $desname = Validate::validateStringUcwords($_POST['desname'], true, false) ) === false )
	{

		
		Bank::setError(Rule::VALIDATE_NAME);
		header("Location: /dashboard/conta-bancaria/".$hash);
		exit;

	}//end if








	
	









	if( 
		
		!isset($_POST['desagencynumber']) 
		|| 
		$_POST['desagencynumber'] === ''
		
	)
	{

		Bank::setError("Digite o número da agência sem dígito verificador");
		header("Location: /dashboard/conta-bancaria/".$hash);
		exit;

	}//end if



	if( !$desagencynumber = Validate::validateAgencyNumber($_POST['desagencynumber']) )
	{

		
		Bank::setError("O número da agência deve ter entre 4 a 6 caracteres, e deve conter apenas números");
		header("Location: /dashboard/conta-bancaria/".$hash);
		exit;

	}//end if










	if(
		
		!isset($_POST['desagencycheck']) 
		|| 
		$_POST['desagencycheck'] === ''
		
	)
	{

		Bank::setError("Digite o dígito verificador da agência");
		header("Location: /dashboard/conta-bancaria/".$hash);
		exit;

	}//end if

	if( ($desagencycheck = Validate::validateAgencyCheck($_POST['desagencycheck'])) === false )
	{

		
		Bank::setError("O dígito verificador da agência deve ter 1 caracter");
		header("Location: /dashboard/conta-bancaria/".$hash);
		exit;

	}//end if









	if(
		
		!isset($_POST['desaccountnumber'])
		|| 
		$_POST['desaccountnumber'] === ''
		
	)
	{

		Bank::setError("Digite o número da conta sem dígito verificador");
		header("Location: /dashboard/conta-bancaria/".$hash);
		exit;

	}//end if

	if( !$desaccountnumber = Validate::validateAccountNumber($_POST['desaccountnumber']) )
	{

		
		Bank::setError("O número da conta deve ter entre 6 a 8 caracteres");
		header("Location: /dashboard/conta-bancaria/".$hash);
		exit;

	}//end if











	if(
		
		!isset($_POST['desaccountcheck'])
		|| 
		$_POST['desaccountcheck'] === ''
		
	)
	{

		Bank::setError("Digite o dígito verificador da conta");
		header("Location: /dashboard/conta-bancaria/".$hash);
		exit;

	}//end if

	if( ($desaccountcheck = Validate::validateAccountCheck($_POST['desaccountcheck'])) === false )
	{

		
		Bank::setError("O dígito verificador da agência deve ter 1 caracter");
		header("Location: /dashboard/conta-bancaria/".$hash);
		exit;

	}//end if


	$intypedoc = 0;
	$desdocument = $account->getdesdocument();



	$wirecard = new Wirecard();

	

	$account = new Account();

	$account->get((int)$user->getiduser());



	$bank = new Bank();

	//$data = Bank::checkBankCodeExists( $user->getiduser() );

	//$bank->get((int)$user->getiduser());
	
	
	
	$bank->get((int)$user->getiduser());

	/*
	echo '<pre>';
	var_dump($desbanknumber);
	var_dump($desagencynumber);
	var_dump($desagencycheck);
	var_dump($desaccountnumber);
	var_dump($desaccountcheck);
	var_dump($desaccounttype);
	var_dump($desname);
	var_dump($desdocument);
	var_dump($intypedoc);
	var_dump($account->getdesaccesstoken());
	var_dump($account->getdesaccountcode());
	exit;
	*/

	try 
	{


		$bankData = $wirecard->updateBank(

			$desbanknumber,
			$desagencynumber,
			$desagencycheck,
			$desaccountnumber,
			$desaccountcheck,
			$desaccounttype,
			$desname,
			$desdocument,
			$intypedoc,
			$account->getdesaccesstoken(),
			$bank->getdesbankcode(),
			$hash
	
		);//end createBank


	}//end try
	catch (\Throwable $th) 
	{


		Bank::setError(Rule::BANK_UNEXPECTED);
		header('Location: /dashboard/sua-carteira');
		exit;


	}//end catch

	
	





	
	if( $bankData != '' )
	{

		
		$bank->setData([

			'idbank'=>$bank->getidbank(),
			'iduser'=>$user->getiduser(),
			'idaccount'=>$account->getidaccount(),
			'instatus'=>1,
			'desname'=>$desname,
			'desdocument'=>$desdocument,
			'desbankcode'=>$bankData['desbankcode'],
			'desbanknumber'=>$bankData['desbanknumber'],
			'desagencynumber'=>$bankData['desagencynumber'],
			'desagencycheck'=>$bankData['desagencycheck'],
			'desaccounttype'=>$bankData['desaccounttype'],
			'desaccountnumber'=>$bankData['desaccountnumber'],
			'desaccountcheck'=>$bankData['desaccountcheck']

		]);


		
		$bank->update();


		Account::setSuccess("Conta bancária atualizada");

		header("Location: /dashboard/sua-carteira");
		exit;


	}//end if



});//END route





















































$app->get( "/dashboard/conta-bancaria/:hash", function( $hash ) 
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



	/*if ( (int)$user->getinplancontext() == 0 )
	{
		# code...
		User::setError(Rule::VALIDATE_PLAN);
		header('Location: /dashboard');
		exit;

	}//end if*/



	if ( ( $validate = User::validatePlanDashboard( $user ) ) === false )
	{
		# code...
		User::setError(Rule::VALIDATE_PLAN);
		header('Location: /dashboard');
		exit;

	}//end if

	





	$idbank = Validate::getHash($hash);

	if( $idbank == '' )
	{

		Account::setError(Rule::VALIDATE_ID_HASH);
		header('Location: /dashboard/sua-carteira');
		exit;

	}//end if







	$bank = new Bank();

	$bank->get((int)$user->getiduser());



	if( $bank->getinstatus() == 0 )
	{

		Account::setError(Rule::BANK_INACTIVE);
		header('Location: /dashboard/sua-carteira');
		exit;

	}//end if


	


	/*if( !$bank->getdesbanknumber()) $bank->setdesbanknumber('');
	if( !$bank->getdesagencynumber()) $bank->setdesagencynumber('');
	if( !$bank->getdesagencycheck()) $bank->setdesagencycheck('');
	if( !$bank->getdesaccounttype()) $bank->setdesaccounttype('');
	if( !$bank->getdesaccountnumber()) $bank->setdesaccountnumber('');
	if( !$bank->getdesaccountcheck()) $bank->setdesaccountcheck('');*/




	$bankValues = Bank::getBanksValues();


	

	$page = new PageDashboard();

	$page->setTpl(
		

 
		"banks-update", 
		
		[
			'user'=>$user->getValues(),
			'bank'=>$bank->getValues(),
			'bankvalues'=>$bankValues,
			'validate'=>$validate,
			'success'=>Bank::getSuccess(),
			'error'=>Bank::getError()

		]
	
	);//end setTpl
	
});//END route




















?>