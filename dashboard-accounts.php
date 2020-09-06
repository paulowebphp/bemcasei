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














$app->get( "/dashboard/sua-carteira", function() 
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




	$bankValues = Bank::getBanksValues();

	$bankName = '';


	$bank = new Bank();

	
	if( $bankExists = Bank::checkActiveBankExists((int)$user->getiduser()) )
	{

		

		$bank->get((int)$user->getiduser());


		
		foreach ($bankValues as $banking) 
		{
			if( $banking['value'] == $bank->getdesbanknumber() ) $bankName = $banking['shortname'];

		}//end foreach

		/*if( !$bank->getdesbanknumber()) $bank->setdesbanknumber('');
		if( !$bank->getdesagencynumber()) $bank->setdesagencynumber('');
		if( !$bank->getdesagencycheck()) $bank->setdesagencycheck('');
		if( !$bank->getdesaccounttype()) $bank->setdesaccounttype('');
		if( !$bank->getdesaccountnumber()) $bank->setdesaccountnumber('');
		if( !$bank->getdesaccountcheck()) $bank->setdesaccountcheck('');*/
		

	}//end if



	



	$account = new Account();

	$account->get((int)$user->getiduser());

	
	

	

	

	

	$page = new PageDashboard();

	$page->setTpl(
		

 
		"accounts", 
		
		[
			'user'=>$user->getValues(),
			'account'=>$account->getValues(),
			'bankvalues'=>$bankValues,
			'bank'=>($bankExists)?$bank->getValues():$bank->setData(['desname'=>'','desdocument'=>'','desbankcode'=>'','desbanknumber'=>'','desagencynumber'=>'','desagencycheck'=>'','desaccountnumber'=>'','desaccountcheck'=>'','desaccounttype'=>'']),
			'bankExists'=>$bankExists,
			'bankName'=>$bankName,
			'validate'=>$validate,
			'success'=>Account::getSuccess(),
			'error'=>Account::getError()

		]
	
	);//end setTpl
	
});//END route













?>