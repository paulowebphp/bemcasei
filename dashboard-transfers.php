<?php

use Core\Maintenance;
use Core\PageDashboard;
//use Core\Photo;
use Core\Wirecard;
use Core\Rule;
use Core\Validate;
use Core\Model\User;
use Core\Model\Order;
use Core\Model\Payment;
//use Core\Model\Product;
//use Core\Model\Gift;
use Core\Model\Bank;
use Core\Model\Transfer;
use Core\Model\TransferStatus;
use Core\Model\Account;
//use Core\Model\Plan;








$app->get( "/dashboard/transferencias/transferir-saldo", function() 
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



	if($validate)
	{	

		if( (int)$validate['incontext'] == 0 )
		{

			User::setError(Rule::VALIDATE_PLAN);
			header('Location: /dashboard');
			exit;

		}//end if


	}//end if
	else
	{


		if ( (int)$user->getinplancontext() != 0  && (int)$user->getincheckout() == 0 )
		{
			# code...
			User::setError(Rule::VALIDATE_PLAN);
			header('Location: /dashboard');
			exit;

		}//end if

		if ( (int)$user->getinplancontext() == 0 )
		{
			# code...
			Payment::setError(Rule::VALIDATE_PLAN);
			header('Location: /dashboard/meu-plano');
			exit;

		}//end if



	}//end if



	if ( (int)$user->getinaccount() == 0 )
	{
		# code...
		Account::setError(Rule::VALIDATE_ACCOUNT);
		header('Location: /dashboard/cadastrar');
		exit;

	}//end if





	$bank = new Bank();

	$bank->get((int)$user->getiduser());


	


	if ( $bank->getdesbankcode() != '' )
	{
		

		$transfer = new Transfer();

		$transfer->get((int)$user->getiduser());





		/*if( !$transfer->getvlamount() ) $transfer->setvlamount('');

		



		if( !$bank->getdesbanknumber() ) $bank->setdesbanknumber('');
		if( !$bank->getdesagencynumber() ) $bank->setdesagencynumber('');
		if( !$bank->getdesagencycheck() ) $bank->setdesagencycheck('');
		if( !$bank->getdesaccounttype() ) $bank->setdesaccounttype('');
		if( !$bank->getdesaccountnumber() ) $bank->setdesaccountnumber('');
		if( !$bank->getdesaccountcheck() ) $bank->setdesaccountcheck('');*/

		
		$bankValues = Bank::getBanksValues();
		

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
			

	 
			"transfers-create", 
			
			[	
				'bankvalues'=>$bankValues,
				'user'=>$user->getValues(),
				'transfer'=>$transfer->getValues(),
				'bank'=>$bank->getValues(),
				'transfer'=>$transfer->getValues(),
				'validate'=>$validate,
				'success'=>Transfer::getSuccess(),
				'error'=>Transfer::getError()

			]
		
		);//end setTpl


	}//end if
	else
	{
		Order::setError('Para realizar uma transferência é necessário cadastrar uma conta bancária');
		header('Location: /dashboard/painel-financeiro');
		exit;

	}//end else






	
});//END route





























$app->post( "/dashboard/transferencias/transferir-saldo", function()
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


	if($validate)
	{	

		if( (int)$validate['incontext'] == 0 )
		{

			User::setError(Rule::VALIDATE_PLAN);
			header('Location: /dashboard');
			exit;

		}//end if


	}//end if
	else
	{


		if ( (int)$user->getinplancontext() != 0  && (int)$user->getincheckout() == 0 )
		{
			# code...
			User::setError(Rule::VALIDATE_PLAN);
			header('Location: /dashboard');
			exit;

		}//end if

		if ( (int)$user->getinplancontext() == 0 )
		{
			# code...
			Payment::setError(Rule::VALIDATE_PLAN);
			header('Location: /dashboard/meu-plano');
			exit;

		}//end if



	}//end if



	if ( (int)$user->getinaccount() == 0 )
	{
		# code...
		Account::setError(Rule::VALIDATE_ACCOUNT);
		header('Location: /dashboard/cadastrar');
		exit;

	}//end if








	if( 
		
		!isset($_POST['vlamount']) 
		|| 
		$_POST['vlamount'] == ''
		
	)
	{

		Transfer::setError("Digite o saldo a ser transferido");
		header("Location: /dashboard/transferencias/transferir-saldo");
		exit;

	}//end if

	if( !$vlamount = Validate::validateTransferAmount($_POST['vlamount']) )
	{

		Transfer::setError("Informe um valor inteiro ou com 2 casas decimais");
		header("Location: /dashboard/transferencias/transferir-saldo");
		exit;

	}//end if


	




	if( (float)$vlamount < 2.50 )
	{

		Transfer::setError('A quantia a ser transferida não pode ser menor que R$ 2,50 | Tente novamente, ou aguarde seu saldo futuro ser disponibilizado | Se o problema persistir, entre em conta com o suporte');
		header('Location: /dashboard/transferencias/transferir-saldo');
		exit;

	}//end if


		



	$account = new Account();

	$account->get((int)$user->getiduser());




	$wirecard = new Wirecard();

	$balances = $wirecard->getBalances($account->getdesaccesstoken());


	


	if ( (float)$vlamount > (float)$balances['current'])
	{
		# code...
		Transfer::setError('A quantia a ser transferida não pode ser maior que o saldo corrente | Observe que se você colocar o número inteiro (sem o ponto, ex: 200) o sistema acrescentará 2 zeros ao final para preencher as casas decimais | Tente realizar a transferência novamente, ou aguarde seu saldo futuro ser disponibilizado | Se o problema persistir, entre em conta com o suporte');
		header('Location: /dashboard/transferencias/transferir-saldo');
		exit;

	}//end if



	$bank = new Bank();

	$bank->get((int)$user->getiduser());



	

	$wirecardTransferData = $wirecard->createTransfer(

		$account->getdesaccesstoken(),
		$bank->getdesbankcode(),
		$vlamount

	);//end createTransfer












	


	$transfer = new Transfer();


	$transfer->setData([

		'iduser'=>$user->getiduser(),
		'destransfercode'=>$wirecardTransferData['destransfercode'],
		'intransferstatus'=>TransferStatus::REQUESTED,
		'destransferholdername'=>$user->getdesperson(),
		'desbanknumber'=>$bank->getdesbanknumber(),
		'desagencynumber'=>$bank->getdesagencynumber(),
		'desagencycheck'=>$bank->getdesagencycheck(),
		'desaccounttype'=>$bank->getdesaccounttype(),
		'desaccountnumber'=>$bank->getdesaccountnumber(),
		'desaccountcheck'=>$bank->getdesaccountcheck(),
		'vlamount'=>$vlamount

	]);//end setData


	

	$transfer->save();

	



	if( $transfer->getidtransfer() > 0 )
	{

		Transfer::setSuccess("Transferencia criada com sucesso");

		header("Location: /dashboard/transferencias");
		exit;


	}//end if


	




});//END route






























$app->get( "/dashboard/transferencias", function() 
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


	if($validate)
	{	

		if( (int)$validate['incontext'] == 0 )
		{

			User::setError(Rule::VALIDATE_PLAN);
			header('Location: /dashboard');
			exit;

		}//end if


	}//end if
	else
	{


		if ( (int)$user->getinplancontext() != 0  && (int)$user->getincheckout() == 0 )
		{
			# code...
			User::setError(Rule::VALIDATE_PLAN);
			header('Location: /dashboard');
			exit;

		}//end if

		if ( (int)$user->getinplancontext() == 0 )
		{
			# code...
			Payment::setError(Rule::VALIDATE_PLAN);
			header('Location: /dashboard/meu-plano');
			exit;

		}//end if



	}//end if



	if ( (int)$user->getinaccount() == 0 )
	{
		# code...
		Account::setError(Rule::VALIDATE_ACCOUNT);
		header('Location: /dashboard/cadastrar');
		exit;

	}//end if


	$bank = new Bank();

	$bank->get((int)$user->getiduser());



	if ( $bank->getdesbankcode() != '' )
	{
		# code...

		$transfer = new Transfer();

		$transfer->get((int)$user->getiduser());




		//if(!$transfer->getidtransfer()) $transfer->setidtransfer('');

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
			

	 
			"transfers", 
			
			[
				'user'=>$user->getValues(),
				'page'=>[],
				'search'=>'',
				'transfer'=>$transfer->getValues(),
				'validate'=>$validate,
				'success'=>Transfer::getSuccess(),
				'error'=>Transfer::getError()

			]
		
		);//end setTpl


	}//end if
	else
	{
		Order::setError('Para realizar uma transferência é necessário cadastrar uma conta bancária');
		header('Location: /dashboard/painel-financeiro');
		exit;

	}//end else


	
	
	
});//END route














?>