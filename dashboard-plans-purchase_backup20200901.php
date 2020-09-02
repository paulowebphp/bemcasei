<?php

use Core\Mailer;
use Core\Maintenance;
use Core\PageDashboard;
use Core\Rule;
use Core\Validate;
use Core\Wirecard;
use Core\Model\Account;
use Core\Model\Address;
use Core\Model\Cart;
use Core\Model\Consort;
use Core\Model\Coupon;
use Core\Model\Customer;
use Core\Model\Fee;
use Core\Model\Order;
use Core\Model\Plan;
use Core\Model\Payment;
use Core\Model\PaymentStatus;
use Core\Model\User;






$app->get( "/dashboard/comprar-plano/cadastrar", function()
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



	if ( (int)$user->getinplancontext() != 0 )
	{
		# code...
		Payment::setError(Rule::VALIDATE_PLAN);
		header('Location: /dashboard/meu-plano');
		exit;

	}//end if




	
	



	if ( 


		isset($_GET['plano'])
		&&
		Validate::validateInplancode($_GET['plano'])
		&&
		(int)$_GET['plano'] != 0
		&&
		!in_array((int)$_GET['plano'], [101,201,301])


	)
	{

		$inplancode = $_GET['plano'];



	}//end if
	else
	{

		Plan::setError(Rule::VALIDATE_PLAN_PURCHASE_CODE);
		header('Location: /dashboard/comprar-plano');
		exit;

	}//end else if






	if ( (int)$user->getinaccount() == 1 )
	{
		# code...
		header("Location: /dashboard/comprar-plano/checkout?plano=".$inplancode);
		exit;

	}//end if




	$state = Address::listAllStates();

	$city = Address::listAllCitiesByState(1);
	




	$page = new PageDashboard();

	$page->setTpl(
		
		"plans-purchase-account",

		[
			'user'=>$user->getValues(),
			//'payment'=>$payment->getValues(),
			'inplancode'=>$inplancode,
			'city'=>$city,
			'state'=>$state,
			'validate'=>$validate,
			'error'=>Account::getError(),
			'success'=>Account::getSuccess(),
			'planPurchaseRegisterValues'=> (isset($_SESSION["planPurchaseRegisterValues"])) ? $_SESSION["planPurchaseRegisterValues"] : ['desdocument'=>'', 'nrddd'=>'', 'nrphone'=>'', 'dtbirth'=>'', 'zipcode'=>'', 'desaddress'=>'', 'desnumber'=>'', 'descomplement'=>'', 'desdistrict'=>'', 'desstate'=>'', 'descity'=>'']


		]
	
	);//end setTpl

});//END route













































$app->post( "/dashboard/comprar-plano/cadastrar", function()
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



	if ( (int)$user->getinplancontext() != 0 )
	{
		# code...
		Payment::setError(Rule::VALIDATE_PLAN);
		header('Location: /dashboard/meu-plano');
		exit;

	}//end if





	





	if ( 


		isset($_POST['plano'])
		&&
		Validate::validateInplancode($_POST['plano'])
		&&
		(int)$_POST['plano'] != 0
		&&
		!in_array((int)$_POST['plano'], [101,201,301])


	)
	{

		$inplancode = $_POST['plano'];



	}//end if
	else
	{

		Plan::setError(Rule::VALIDATE_PLAN_PURCHASE_CODE);
		header('Location: /dashboard/comprar-plano');
		exit;

	}//end else if



	



	if ( (int)$user->getinaccount() == 1 )
	{
		# code...
		header("Location: /dashboard/comprar-plano/checkout?plano=".$inplancode);
		exit;
		
	}//end if



















	if(
		
		!isset($_POST['desdocument']) 
		|| 
		$_POST['desdocument'] === ''
		
	)
	{

		Account::setError(Rule::ERROR_CPF);
		header('Location: /dashboard/comprar-plano/cadastrar?plano='.$inplancode);
		exit;

	}//end if







	if( !$desdocument = Validate::validateDocument($user->intypedoc(), $_POST['desdocument']) )
	{

		Account::setError(Rule::VALIDATE_CPF);
		header('Location: /dashboard/comprar-plano/cadastrar?plano='.$inplancode);
		exit;

	}//end if





	




	if(
		
		!isset($_POST['dtbirth']) 
		|| 
		$_POST['dtbirth'] === ''
		
	)
	{

		Account::setError(Rule::ERROR_DATE_BIRTH);
		header('Location: /dashboard/comprar-plano/cadastrar?plano='.$inplancode);
		exit;

	}//end if






	if( !$dtbirth = Validate::validateUserMajority($_POST['dtbirth']) )
	{

		Account::setError(Rule::VALIDATE_DATE_MAJORITY);
		header('Location: /dashboard/comprar-plano/cadastrar?plano='.$inplancode);
		exit;

	}//end if



	






	if(
		
		!isset($_POST['nrddd']) 
		|| 
		$_POST['nrddd'] === ''
		
	)
	{

		Account::setError(Rule::ERROR_DDD);
		header('Location: /dashboard/comprar-plano/cadastrar?plano='.$inplancode);
		exit;

	}//end if






	if( !$nrddd = Validate::validateDDD($_POST['nrddd']) )
	{

		Account::setError(Rule::VALIDATE_DDD);
		header('Location: /dashboard/comprar-plano/cadastrar?plano='.$inplancode);
		exit;

	}//end if








	if(
		
		!isset($_POST['nrphone']) 
		|| 
		$_POST['nrphone'] === ''
		
	)
	{

		Account::setError(Rule::ERROR_PHONE);
		header('Location: /dashboard/comprar-plano/cadastrar?plano='.$inplancode);
		exit;

	}//end if







	if( !$nrphone = Validate::validatePhone($_POST['nrphone']) )
	{

		Account::setError(Rule::VALIDATE_PHONE);
		header('Location: /dashboard/comprar-plano/cadastrar?plano='.$inplancode);
		exit;

	}//end if














	
	if( 
		
		!isset($_POST['zipcode']) 
		|| 
		$_POST['zipcode'] === ''
	)
	{

		Account::setError(Rule::ERROR_ZIPCODE);
		header('Location: /dashboard/comprar-plano/cadastrar?plano='.$inplancode);
		exit;
		
	}//end if







	if( !$deszipcode = Validate::validateCEP($_POST['zipcode']) )
	{

		Account::setError(Rule::VALIDATE_ZIPCODE);
		header('Location: /dashboard/comprar-plano/cadastrar?plano='.$inplancode);
		exit;

	}//end if
	










	if(
		!isset($_POST['desaddress']) 
		|| 
		$_POST['desaddress'] === ''
		
	)
	{

		Account::setError(Rule::ERROR_ADDRESS);
		header('Location: /dashboard/comprar-plano/cadastrar?plano='.$inplancode);
		exit;

	}//end if






	if( ( $desaddress = Validate::validateStringNumber($_POST['desaddress'])  ) === false )
	{

		Account::setError(Rule::VALIDATE_ADDRESS);
		header('Location: dashboard/comprar-plano//checkout?plano='.$inplancode);
		exit;

	}//end if













	

	if(
		
		!isset($_POST['desnumber']) 
		|| 
		$_POST['desnumber'] === ''
		
	)
	{

		Account::setError(Rule::ERROR_NUMBER);
		header('Location: /dashboard/comprar-plano/cadastrar?plano='.$inplancode);
		exit;

	}//end if






	if( !$desnumber = Validate::validateNumber($_POST['desnumber']) )
	{

		Account::setError(Rule::VALIDATE_NUMBER);
		header('Location: /dashboard/comprar-plano/cadastrar?plano='.$inplancode);
		exit;

	}//end if










	if(
		
		!isset($_POST['desdistrict']) 
		|| 
		$_POST['desdistrict'] === ''
		
	)
	{

		Account::setError(Rule::ERROR_DISTRICT);
		header('Location: /dashboard/comprar-plano/cadastrar?plano='.$inplancode);
		exit;

	}//end if






	if( ( $desdistrict = Validate::validateStringNumber($_POST['desdistrict'])  ) === false )
	{

		Account::setError(Rule::VALIDATE_DISTRICT);
		header('Location: /dashboard/comprar-plano/cadastrar?plano='.$inplancode);
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
		header('Location: /dashboard/comprar-plano/cadastrar?plano='.$inplancode);
		exit;

	}//end if


	


	








	if(
				
		!isset($_POST['descity']) 
		|| 
		$_POST['descity'] === ''
		
	)
	{

		Account::setError(Rule::ERROR_CITY);
		header('Location: /dashboard/comprar-plano/cadastrar?plano='.$inplancode);
		exit;

	}//end if



	if ( ( $descity = Address::getCity($_POST['descity']) ) === false ) 
	{
		# code...
		Account::setError(Rule::VALIDATE_CITY);
		header('Location: /dashboard/comprar-plano/cadastrar?plano='.$inplancode);
		exit;

	}//end if
















	if(
				
		!isset($_POST['desstate']) 
		|| 
		$_POST['desstate'] === ''
		
	)
	{

		Account::setError(Rule::ERROR_STATE);
		header('Location: /dashboard/comprar-plano/cadastrar?plano='.$inplancode);
		exit;

	}//end if



	if ( ( $desstate = Address::getState($_POST['desstate']) ) === false ) 
	{
		# code...
		Account::setError(Rule::VALIDATE_STATE);
		header('Location: /dashboard/comprar-plano/cadastrar?plano='.$inplancode);
		exit;

	}//end if


	






	$descomplement = Validate::validateStringNumber($_POST['descomplement'], false, true);
	




	/*echo '<pre>';
	var_dump($user->getdesperson());
	var_dump($user->getdesemail());
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
	exit;*/



	$wirecard = new Wirecard();

	//$inplan = Wirecard::getPlan($user->getinplan());
	



	$wirecardAccountData = $wirecard->createAccount(

		$user->getdesperson(),
		$user->getdesemail(),
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



	


	$account = new Account();


	$account->get((int)$user->getiduser());


	


	$account->setData([


		'idaccount'=>$account->getidaccount(),
		'iduser'=>$user->getiduser(),
		'desaccountcode'=>$wirecardAccountData['desaccountcode'],
		'desaccesstoken'=>$wirecardAccountData['desaccesstoken'],
		'deschannelid'=>$wirecardAccountData['deschannelid'],
		'desname'=>$user->getdesperson(),
		'desemail'=>$user->getdesemail(),
		'nrcountryarea'=>Rule::NR_COUNTRY_AREA,
		'nrddd'=>$nrddd,
		'nrphone'=>$nrphone,
		'intypedoc'=>$user->getintypedoc(),
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

	

	$account->save();












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









	





	$timezone = new DateTimeZone('America/Sao_Paulo');

	$dt_now = new DateTime("now");

	$dt_now->setTimezone($timezone);


	


	$user->setdesdocument($account->getdesdocument());
	$user->setnrcountryarea($account->getnrcountryarea());
	$user->setnrddd($account->getnrddd());
	$user->setnrphone($account->getnrphone());
	$user->setdtbirth($account->getdtbirth());
	$user->setdtterms($dt_now->format('Y-m-d H:i:s'));
	$user->setdesipterms($_SERVER['REMOTE_ADDR']);
	$user->setinterms($_POST['interms']);
	$user->setinaccount(1);

	


	$user->update();
	$user->setToSession();









	

	if(isset($_SESSION['planPurchaseRegisterValues'])) unset($_SESSION['planPurchaseRegisterValues']);

	
	
	//User::loginAfterPlanPurchase($user->getdeslogin(), $user->getdespassword());

	header("Location: /dashboard/comprar-plano/checkout?plano=".$inplancode);
	exit;
	



});//END route












































$app->get( "/dashboard/comprar-plano/checkout", function()
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



	if ( (int)$user->getinplancontext() != 0 )
	{
		# code...
		Payment::setError(Rule::VALIDATE_PLAN);
		header('Location: /dashboard/meu-plano');
		exit;

	}//end if


	

	


	


	//$plans = Plan::getPlansFullArray();




	//$lastplan = Plan::getLastPlan((int)$user->getiduser());
	
	



	if ( 

		isset($_GET['plano'])
		&&
		Validate::validateInplancode($_GET['plano'])
		&&
		(int)$_GET['plano'] != 0
		&&
		!in_array((int)$_GET['plano'], [101,201,301])


	)
	{

		$inplancode = $_GET['plano'];



	}//end if
	else
	{

		Plan::setError(Rule::VALIDATE_PLAN_PURCHASE_CODE);
		header('Location: /dashboard/comprar-plano');
		exit;

	}//end else if




	if ( (int)$user->getinaccount() == 0 )
	{
		# code...
		header("Location: /dashboard/comprar-plano/cadastrar?plano=".$inplancode);
		exit;
		
	}//end if




	/*$payment = new Payment();

	if( !$payment->getdesholderaddress() ) $payment->setdesholderaddress('');
	if( !$payment->getdesemail() ) $payment->setdesemail('');
	if( !$payment->getdesholdernumber() ) $payment->setdesholdernumber('');
	if( !$payment->getdesholdercomplement() ) $payment->setdesholdercomplement('');
	if( !$payment->getdesholderdistrict() ) $payment->setdesholderdistrict('');
	if( !$payment->getdesholdercity() ) $payment->setdesholdercity('');
	if( !$payment->getdesholderstate() ) $payment->setdesholderstate('');
	if( !$payment->getdesholderzipcode() ) $payment->setdesholderzipcode('');
	if( !$payment->getinholdertypedoc() ) $payment->setinholdertypedoc('');
	if( !$payment->getdesholderdocument() ) $payment->setdesholderdocument('');
	if( !$payment->getdtholderbirth() ) $payment->setdtholderbirth('');
	if( !$payment->getnrholderddd() ) $payment->setnrholderddd('');
	if( !$payment->getnrholderphone() ) $payment->setnrholderphone('');
	if( !$payment->getdesholdername() ) $payment->setdesholdername('');
	if( !$payment->getdescardcode_number() ) $payment->setdescardcode_number('');
	if( !$payment->getdescardcode_month() ) $payment->setdescardcode_month('');
	if( !$payment->getdescardcode_year() ) $payment->setdescardcode_year('');
	if( !$payment->getdescardcode_cvc() ) $payment->setdescardcode_cvc('');*/



	$inplan = Plan::getPlanArray($inplancode);

	//$address = new Address();

	//$lastAddressPlan = Address::getLastAddressPlan($user->getiduser());




	/*$inplancode = new Plan();


	if( (int)$user->getinplancontext() == 0 )
	{

		$inplancode->setinpaymentstatus('0');
		$inplancode->setinpaymentmethod('0');

	}//end if
	else
	{

		$inplancodes = $inplancode->get((int)$user->getiduser());

		$inplancode->setinpaymentstatus($inplancodes['results'][0]['inpaymentstatus']);
		$inplancode->setinpaymentmethod($inplancodes['results'][0]['inpaymentmethod']);

	}//end else*/



	$coupon = '';
	$action = 'aplicar';
	$oldVlprice = '';

	$invoucher = 0;


	if ( 

		isset($_GET['cupom'])
		&&
		isset($_GET['acao'])


	)
	{

		if ( 


			($coupon = Validate::validateCouponCode($_GET['cupom']))
			&&
			($action = Validate::validateCouponAction($_GET['acao']))


		)
		{
			# code...

			//$coupon = $_GET['cupom'];
			//$action = $_GET['acao'];
			
			

			if ( $couponExists = Coupon::checkCouponExists($coupon) ) 
			{



				$timezone = new DateTimeZone('America/Sao_Paulo');

				$dtnow = new DateTime('now');

				$dtnow->setTimezone($timezone);



				$dtexpire = new DateTime($couponExists['dtexpire']);

				//$dtexpire->setTimezone($timezone);

				
				
				


				if ( $dtexpire > $dtnow ) 
				{
					

					# code...
					if ( (int)$couponExists['inusage'] == 0 ) 
					{

						if ( $couponExists['vlpercentage'] == 0 )
						{
							# code...
							//Aqui não pode ser voucher, pois o usage é ilimitado
							//$invoucher = 1;

							Payment::setError(Rule::CHECK_IS_VOUCHER);
							header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode);
							exit;

						}//end if


						$couponIsApplied = Coupon::checkAndApplyCoupon(

							(int)$user->getiduser(),
							(int)$couponExists['idcoupon']

						);//end checkAndApplyCoupon


						if ( 

							$action == 'aplicar'
							&&
							(int)$couponIsApplied['instatus'] == 0							

						) 
						{
							# code...

							
							$oldVlprice = $inplan['vlprice'];

							$inplan['vlprice'] *= $couponExists['vlpercentage'];

							$inplan['vlprice'] = number_format($inplan['vlprice'],2);

							$action = 'desaplicar';

						}//end if
						elseif(

							$action == 'aplicar'
							&&
							(int)$couponIsApplied['instatus'] == 1

						)
						{

							
							Payment::setError("Olá, ".$user->getdesperson().", sentimos muito, mas você já aplicou este cupom em: ".formatDate($couponIsApplied['dtregister']));
							header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode);
							exit;
							

						}//end elseif
						elseif (

							$action == 'desaplicar'
							&&
							(int)$couponIsApplied['instatus'] == 0

						) 
						{
							# code...
							Coupon::deleteCouponUser(

								(int)$user->getiduser(), 
								(int)$couponExists['idcoupon']

							);//end deleteCouponUser

							//$action = 'aplicar';

							header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode);
							exit;


						}//end elseif
						elseif (

							$action == 'desaplicar'
							&&
							(int)$couponIsApplied['instatus'] == 1
						)
						{
							# code...
							Payment::setError("Olá, ".$user->getdesperson().", sentimos muito, mas você já aplicou este cupom em: ".formatDate($couponIsApplied['dtregister'])." e não pode desaplicá-lo");
							header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode);
							exit;


						}//end elseif
						


					}//end if
					else
					{

						if ( !Coupon::checkCouponIsApplied((int)$couponExists['idcoupon']) ) 
						{

							# code...
							$couponIsApplied = Coupon::checkAndApplyCoupon(

								(int)$user->getiduser(),
								(int)$couponExists['idcoupon']

							);//end checkAndApplyCoupon


							if ( 

								$action == 'aplicar'
								&&
								(int)$couponIsApplied['instatus'] == 0							

							) 
							{
								# code...

								if ( (int)$couponExists['vlpercentage'] == 0 )
								{

									$inplan['inperiod'] = Rule::VOUCHER_INPERIOD;
									$inplan['desplan'] = Rule::PLAN_NAME_ADVANCED;
									$inplan['inplancontext'] = Rule::VOUCHER_INPLANCONTEXT;
									$inplan['inplancode'] = Rule::VOUCHER_INPLANCODE;
									$inplan['desvlprice'] = Rule::VOUCHER_DESVLPRICE;
									
									$invoucher = 1;

								}//end if

								
								$oldVlprice = $inplan['vlprice'];

								$inplan['vlprice'] *= $couponExists['vlpercentage'];

								$inplan['vlprice'] = number_format($inplan['vlprice'],2);

								$action = 'desaplicar';

							}//end if
							elseif(

								$action == 'aplicar'
								&&
								(int)$couponIsApplied['instatus'] == 1

							)
							{

								
								Payment::setError("Olá, ".$user->getdesperson().", sentimos muito, mas você já aplicou este cupom em: ".formatDate($couponIsApplied['dtregister']));
								header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode);
								exit;
								

							}//end elseif
							elseif (

								$action == 'desaplicar'
								&&
								(int)$couponIsApplied['instatus'] == 0

							) 
							{
								# code...
								Coupon::deleteCouponUser(

									(int)$user->getiduser(), 
									(int)$couponExists['idcoupon']

								);//end deleteCouponUser

								//$action = 'aplicar';

								header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode);
								exit;


							}//end elseif
							elseif (

								$action == 'desaplicar'
								&&
								(int)$couponIsApplied['instatus'] == 1
							)
							{
								# code...
								Payment::setError("Olá, ".$user->getdesperson().", sentimos muito, mas você já aplicou este cupom em: ".formatDate($couponIsApplied['dtregister'])." e não pode desaplicá-lo");
								header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode);
								exit;


							}//end elseif

						}//end if
						else
						{

							Payment::setError(Rule::CHECK_COUPON_IS_APPLIED);
							header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode);
							exit;

						}//end else


					}//end else


				}//end if
				else
				{

					
				
					Payment::setError("Este cupom expirou em ".$dtexpire->format('d/m/y'));
					header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode);
					exit;




				}//end else
				

			}//end if
			else
			{

				
		
				Payment::setError(Rule::VALIDATE_COUPON_EXISTS);
				header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode);
				exit;



			}//end else




		}//end if
		else
		{


			Payment::setError("O código não pode estar vazio e deve ter ".Rule::COUPON_LENGTH." digitos entre letras maiúsculas e números | Por favor, tente novamente");
			header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode);
			exit;





		}//end else



	}//end if









	$page = new PageDashboard();

	$page->setTpl(
		
		"plans-purchase-checkout",

		[
			'user'=>$user->getValues(),
			//'payment'=>$payment->getValues(),
			'inplan'=>$inplan,
			'inplancode'=>$inplancode,
			'oldVlprice'=>$oldVlprice,
			'coupon'=>$coupon,
			'action'=>$action,
			'invoucher'=>$invoucher,
			'validate'=>$validate,
			'error'=>Payment::getError(),
			'success'=>Payment::getSuccess(),
			'planPurchaseValues'=> (isset($_SESSION["planPurchaseValues"])) ? $_SESSION["planPurchaseValues"] : ['desholderdocument'=>'', 'nrholderddd'=>'', 'nrholderphone'=>'', 'dtholderbirth'=>'', 'zipcode'=>'', 'desholderaddress'=>'', 'desholdernumber'=>'', 'desholdercomplement'=>'', 'desholderdistrict'=>'', 'desholderstate'=>'', 'desholdercity'=>'']


		]
	
	);//end setTpl

});//END route






















































































$app->post( "/dashboard/comprar-plano/checkout", function()
{

	$_SESSION['planPurchaseValues'] = $_POST;





	if ( 

		isset($_POST['checkout-own-card'])
		||
		isset($_POST['checkout-boleto'])
		||
		isset($_POST['checkout-voucher'])

	) 
	{
		# code...
		$_SESSION['planPurchaseValues']['dtholderbirth'] = '';
		$_SESSION['planPurchaseValues']['desholderaddress'] = '';
		$_SESSION['planPurchaseValues']['desholderdocument'] = '';
		$_SESSION['planPurchaseValues']['desholdernumber'] = '';
		$_SESSION['planPurchaseValues']['desholdercomplement'] = '';
		$_SESSION['planPurchaseValues']['desholderdistrict'] = '';
		$_SESSION['planPurchaseValues']['desholderstate'] = '';
		$_SESSION['planPurchaseValues']['desholdercity'] = '';
		$_SESSION['planPurchaseValues']['nrholderddd'] = '';
		$_SESSION['planPurchaseValues']['nrholderphone'] = '';
		$_SESSION['planPurchaseValues']['zipcode'] = '';
	

	}//end if
	







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



	if ( (int)$user->getinplancontext() != 0 )
	{
		# code...
		Payment::setError(Rule::VALIDATE_PLAN);
		header('Location: /dashboard/meu-plano');
		exit;

	}//end if





	





	if ( 


		isset($_POST['plano'])
		&&
		Validate::validateInplancode($_POST['plano'])
		&&
		(int)$_POST['plano'] != 0
		&&
		!in_array((int)$_POST['plano'], [101,201,301])


	)
	{

		$inplancode = $_POST['plano'];



	}//end if
	else
	{

		Plan::setError(Rule::VALIDATE_PLAN_PURCHASE_CODE);
		header('Location: /dashboard/comprar-plano');
		exit;

	}//end else if
	




	

	if ( (int)$user->getinaccount() == 0 )
	{
		# code...
		header("Location: /dashboard/comprar-plano/cadastrar?plano=".$inplancode);
		exit;
		
	}//end if








	$timezone = new DateTimeZone('America/Sao_Paulo');

	$dtnow = new DateTime('now');

	$dtnow->setTimezone($timezone);









	$plan = new Plan();

	//$lastplan = $plan->getLastPlanPurchased($user->getiduser());




	//can't remove from here or it won't be the last anymore
	$lastplan = $plan->getFreePlan($user->getiduser());

	
	$inplan = Plan::getPlanArray($inplancode);


	//$inplan = Plan::getPlanArray($user->getinplan());


	$coupon = '';
	$invoucher = 0;





	if ( 

		isset($_POST['cupom'])
		&&
		$_POST['cupom'] != ''


	)
	{

		if ( ($coupon = Validate::validateCouponCode($_POST['cupom'])) )
		{
			# code...

			//$coupon = $_GET['cupom'];
			//$action = $_GET['acao'];
			
			

			if ( $couponExists = Coupon::checkCouponExists($coupon) ) 
			{



				



				$dtexpire = new DateTime($couponExists['dtexpire']);

				//$dtexpire->setTimezone($timezone);

				
				
				


				if ( $dtexpire > $dtnow ) 
				{
					

					# code...
					if ( (int)$couponExists['inusage'] == 0 ) 
					{


						if ( $couponExists['vlpercentage'] == 0 )
						{
							# code...
							//Aqui não pode ser voucher, pois o usage é ilimitado
							//$invoucher = 1;

							Payment::setError(Rule::CHECK_IS_VOUCHER);
							header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode);
							exit;

						}//end if


						$couponIsApplied = Coupon::checkAndApplyCoupon(

							(int)$user->getiduser(),
							(int)$couponExists['idcoupon']

						);//end checkAndApplyCoupon


						if ( (int)$couponIsApplied['instatus'] == 0 ) 
						{
							# code...
							
							//$oldVlprice = $inplan['vlprice'];


							$inplan['vlprice'] *= $couponExists['vlpercentage'];

							$inplan['vlprice'] = number_format($inplan['vlprice'],2);

							//$action = 'desaplicar';

						}//end if
						elseif( (int)$couponIsApplied['instatus'] == 1 )
						{

							
							Payment::setError("Olá, ".$user->getdesperson().", sentimos muito, mas você já aplicou este cupom em: ".formatDate($couponIsApplied['dtregister']));
							header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode);
							exit;
							

						}//end elseif
						
						


					}//end if
					else
					{

						if ( !Coupon::checkCouponIsApplied((int)$couponExists['idcoupon']) ) 
						{

							# code...
							$couponIsApplied = Coupon::checkAndApplyCoupon(

								(int)$user->getiduser(),
								(int)$couponExists['idcoupon']

							);//end checkAndApplyCoupon


							if ( (int)$couponIsApplied['instatus'] == 0	) 
							{
								# code...
								
								//$oldVlprice = $inplan['vlprice'];


								$inplan['vlprice'] *= $couponExists['vlpercentage'];

								$inplan['vlprice'] = number_format($inplan['vlprice'],2);

								//$action = 'desaplicar';



								if ( (int)$couponExists['vlpercentage'] == 0 )
								{

									$inplan['inperiod'] = Rule::VOUCHER_INPERIOD;
									$inplan['desplan'] = Rule::PLAN_NAME_ADVANCED;
									$inplan['inplancontext'] = Rule::VOUCHER_INPLANCONTEXT;
									$inplan['inplancode'] = Rule::VOUCHER_INPLANCODE;
									$inplan['desvlprice'] = Rule::VOUCHER_DESVLPRICE;
									
									$invoucher = 1;

								}//end if

							}//end if
							elseif( (int)$couponIsApplied['instatus'] == 1 )
							{

								
								Payment::setError("Olá, ".$user->getdesperson().", sentimos muito, mas você já aplicou este cupom em: ".formatDate($couponIsApplied['dtregister']));
								header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode);
								exit;
								

							}//end elseif
							
						}//end if
						else
						{

							Payment::setError(Rule::CHECK_COUPON_IS_APPLIED);
							header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode);
							exit;

						}//end else


					}//end else


				}//end if
				else
				{

					
				
					Payment::setError("Este cupom expirou em ".$dtexpire->format('d/m/y'));
					header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode);
					exit;




				}//end else
				

			}//end if
			else
			{

				
		
				Payment::setError(Rule::VALIDATE_COUPON_EXISTS);
				header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode);
				exit;



			}//end else




		}//end if
		else
		{


			Payment::setError("O código não pode estar vazio e deve ter ".Rule::COUPON_LENGTH." digitos entre letras maiúsculas e números | Por favor, tente novamente");
			header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode);
			exit;





		}//end else



	}//end if
	

	
 



	$address = new Address();

	$address->get((int)$user->getiduser());


	







	$payment = new Payment();


	


	
	if( 

		isset($_POST['checkout-boleto'])
		&&
		Validate::validateCheckoutMethod($_POST['checkout-boleto'],0)
	)
	{



		/*$_POST['nrholderddd'] = $user->getnrholderddd();
		$_POST['nrholderphone'] = $user->getnrholderphone();
		$_POST['desholdername'] = $user->getdesholdername();
		$_POST['dtholderbirth'] = $user->getdtholderbirth();
		0 = $user->getinholdertypedoc();
		$_POST['desholderdocument'] = $user->getdesholderdocument();
		$_POST['zipcode'] = $address->getdeszipcode();
		$_POST['desholderaddress'] = $address->getdesholderaddress();
		$_POST['desholdernumber'] = $address->getdesholdernumber();
		$_POST['desholdercomplement'] = $address->getdesholdercomplement();
		$_POST['desholderdistrict'] = $address->getdesholderdistrict();
		$_POST['desholdercity'] = $address->getdesholdercity();
		$_POST['desholderstate'] = $address->getdesholderstate();*/

		/*$inholdertypedoc = $user->getintypedoc();
		$desholderdocument = $user->getdesdocument();
		$nrholderddd = $user->getnrddd();
		$nrholderphone = $user->getnrphone();
		$dtholderbirth = $user->getdtbirth();
		
		$deszipcode = $address->getdeszipcode();
		$desholderaddress = $address->getdesaddress();
		$desholdernumber = $address->getdesnumber();
		$desholdercomplement = $address->getdescomplement();
		$desholderdistrict = $address->getdesdistrict();
		$desholdercity = $address->getdescity();
		$desholderstate = $address->getdesstate();*/


		$inholdertypedoc = null;
		$desholderdocument = null;
		$nrholderddd = null;
		$nrholderphone = null;
		$dtholderbirth = null;
		
		$desholderzipcode = null;
		$desholderaddress = null;
		$desholdernumber = null;
		$desholdercomplement = null;
		$desholderdistrict = null;
		$desholdercity = null;
		$desholderstate = null;

		$desholdername = null;
		$descardcode_number = null;
		$descardcode_month = null;
		$descardcode_year = null;
		$descardcode_cvc = null;

		$payment->setinpaymentmethod(0);
		$payment->setnrinstallment(1);






	}//end if
	elseif( 

		isset($_POST['checkout-third-part-card'])
		&&
		Validate::validateCheckoutMethod($_POST['checkout-third-part-card'],1)

	)
	{






		if(
			
			!isset($_POST['desholderdocument']) 
			|| 
			$_POST['desholderdocument'] === ''
			
		)
		{


			if ( $coupon == '')
			{
				# code...
				
				Payment::setError(Rule::ERROR_CPF);
				header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode);
				exit;


			}//end if
			else
			{


			
				Payment::setError(Rule::ERROR_CPF);
				header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode.'&cupom='.$coupon.'&acao=aplicar');
				exit;


			}//end else


		}//end if

		if( !$desholderdocument = Validate::validateDocument(0, $_POST['desholderdocument']) )
		{

			if ( $coupon == '')
			{
				# code...
				
				Payment::setError(Rule::VALIDATE_CPF);
				header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode);
				exit;


			}//end if
			else
			{


			
				Payment::setError(Rule::VALIDATE_CPF);
				header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode.'&cupom='.$coupon.'&acao=aplicar');
				exit;


			}//end else

		}//end if
		











		if(
			
			!isset($_POST['nrholderddd']) 
			|| 
			$_POST['nrholderddd'] === ''
			
		)
		{

			if ( $coupon == '')
			{
				# code...
				
				Payment::setError(Rule::ERROR_DDD);
				header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode);
				exit;


			}//end if
			else
			{


			
				Payment::setError(Rule::ERROR_DDD);
				header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode.'&cupom='.$coupon.'&acao=aplicar');
				exit;


			}//end else



		}//end if












		if( !$nrholderddd = Validate::validateDDD($_POST['nrholderddd']) )
		{

			if ( $coupon == '')
			{
				# code...
				
				Payment::setError(Rule::VALIDATE_DDD);
				header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode);
				exit;


			}//end if
			else
			{


			
				Payment::setError(Rule::VALIDATE_DDD);
				header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode.'&cupom='.$coupon.'&acao=aplicar');
				exit;


			}//end else



		}//end if














		if(
			
			!isset($_POST['nrholderphone']) 
			|| 
			$_POST['nrholderphone'] === ''
			
		)
		{

			if ( $coupon == '')
			{
				# code...
				
				Payment::setError(Rule::ERROR_PHONE);
				header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode);
				exit;


			}//end if
			else
			{


			
				Payment::setError(Rule::ERROR_PHONE);
				header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode.'&cupom='.$coupon.'&acao=aplicar');
				exit;


			}//end else



		}//end if

		







		if( !$nrholderphone = Validate::validatePhone($_POST['nrholderphone']) )
		{

			if ( $coupon == '')
			{
				# code...
				
				Payment::setError(Rule::VALIDATE_PHONE);
				header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode);
				exit;


			}//end if
			else
			{


			
				Payment::setError(Rule::VALIDATE_PHONE);
				header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode.'&cupom='.$coupon.'&acao=aplicar');
				exit;


			}//end else



		}//end if














		if(
			
			!isset($_POST['dtholderbirth']) 
			|| 
			$_POST['dtholderbirth'] === ''
			
		)
		{

			if ( $coupon == '')
			{
				# code...
				
				Payment::setError(Rule::ERROR_DATE_BIRTH);
				header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode);
				exit;


			}//end if
			else
			{


			
				Payment::setError(Rule::ERROR_DATE_BIRTH);
				header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode.'&cupom='.$coupon.'&acao=aplicar');
				exit;


			}//end else



		}//end if

		if( !$dtholderbirth = Validate::validateDate($_POST['dtholderbirth'], 0) )
		{

			if ( $coupon == '')
			{
				# code...
				
				Payment::setError(Rule::VALIDATE_DATE_PAST_TO_NOW);
				header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode);
				exit;


			}//end if
			else
			{


			
				Payment::setError(Rule::VALIDATE_DATE_PAST_TO_NOW);
				header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode.'&cupom='.$coupon.'&acao=aplicar');
				exit;


			}//end else



		}//end if










		if( 
		
			!isset($_POST['zipcode']) 
			|| 
			$_POST['zipcode'] === ''
		)
		{

			if ( $coupon == '')
			{
				# code...
				
				Payment::setError(Rule::ERROR_ZIPCODE);
				header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode);
				exit;


			}//end if
			else
			{


			
				Payment::setError(Rule::ERROR_ZIPCODE);
				header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode.'&cupom='.$coupon.'&acao=aplicar');
				exit;


			}//end else


			
		}//end if


		if( !$desholderzipcode = Validate::validateCEP($_POST['zipcode']) )
		{

			if ( $coupon == '')
			{
				# code...
				
				Payment::setError(Rule::VALIDATE_ZIPCODE);
				header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode);
				exit;


			}//end if
			else
			{


			
				Payment::setError(Rule::VALIDATE_ZIPCODE);
				header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode.'&cupom='.$coupon.'&acao=aplicar');
				exit;


			}//end else



		}//end if












		if(
			!isset($_POST['desholderaddress']) 
			|| 
			$_POST['desholderaddress'] === ''
			
		)
		{

			if ( $coupon == '')
			{
				# code...
				
				Payment::setError(Rule::ERROR_ADDRESS);
				header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode);
				exit;


			}//end if
			else
			{


			
				Payment::setError(Rule::ERROR_ADDRESS);
				header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode.'&cupom='.$coupon.'&acao=aplicar');
				exit;


			}//end else



		}//end if

		if( !$desholderaddress = Validate::validateStringNumber($_POST['desholderaddress']) )
		{

			if ( $coupon == '')
			{
				# code...
				
				Payment::setError(Rule::VALIDATE_ADDRESS);
				header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode);
				exit;


			}//end if
			else
			{


			
				Payment::setError(Rule::VALIDATE_ADDRESS);
				header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode.'&cupom='.$coupon.'&acao=aplicar');
				exit;


			}//end else



		}//end if












		

		if(
			
			!isset($_POST['desholdernumber']) 
			|| 
			$_POST['desholdernumber'] === ''
			
		)
		{

			if ( $coupon == '')
			{
				# code...
				
				Payment::setError(Rule::ERROR_NUMBER);
				header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode);
				exit;


			}//end if
			else
			{


			
				Payment::setError(Rule::ERROR_NUMBER);
				header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode.'&cupom='.$coupon.'&acao=aplicar');
				exit;


			}//end else



		}//end if

		if( !$desholdernumber = Validate::validateNumber($_POST['desholdernumber']) )
		{

			if ( $coupon == '')
			{
				# code...
				
				Payment::setError(Rule::VALIDATE_NUMBER);
				header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode);
				exit;


			}//end if
			else
			{


			
				Payment::setError(Rule::VALIDATE_NUMBER);
				header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode.'&cupom='.$coupon.'&acao=aplicar');
				exit;


			}//end else



		}//end if











		if(
			
			!isset($_POST['desholderdistrict']) 
			|| 
			$_POST['desholderdistrict'] === ''
			
		)
		{

			if ( $coupon == '')
			{
				# code...
				
				Payment::setError(Rule::ERROR_DISTRICT);
				header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode);
				exit;


			}//end if
			else
			{


			
				Payment::setError(Rule::ERROR_DISTRICT);
				header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode.'&cupom='.$coupon.'&acao=aplicar');
				exit;


			}//end else



		}//end if

		if( !$desholderdistrict = Validate::validateStringNumber($_POST['desholderdistrict']) )
		{

			if ( $coupon == '')
			{
				# code...
				
				Payment::setError(Rule::VALIDATE_DISTRICT);
				header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode);
				exit;


			}//end if
			else
			{


			
				Payment::setError(Rule::VALIDATE_DISTRICT);
				header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode.'&cupom='.$coupon.'&acao=aplicar');
				exit;


			}//end else



		}//end if








		if(
		
			!isset($_POST['descardcode_number']) 
			|| 
			$_POST['descardcode_number'] === ''
			
		)
		{

			if ( $coupon == '')
			{
				# code...
				
				Payment::setError(Rule::ERROR_CARD_NUMBER);
				header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode);
				exit;


			}//end if
			else
			{


			
				Payment::setError(Rule::ERROR_CARD_NUMBER);
				header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode.'&cupom='.$coupon.'&acao=aplicar');
				exit;


			}//end else



		}//end if

		if( !$descardcode_number = Validate::validateCardNumber($_POST['descardcode_number']) )
		{

			if ( $coupon == '')
			{
				# code...
				
				Payment::setError(Rule::VALIDATE_CARD_NUMBER);
				header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode);
				exit;


			}//end if
			else
			{


			
				Payment::setError(Rule::VALIDATE_CARD_NUMBER);
				header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode.'&cupom='.$coupon.'&acao=aplicar');
				exit;


			}//end else



		}//end if












		if(
			
			!isset($_POST['desholdername']) 
			|| 
			$_POST['desholdername'] === ''
			
		)
		{

			if ( $coupon == '')
			{
				# code...
				
				Payment::setError(Rule::ERROR_HOLDER_NAME);
				header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode);
				exit;


			}//end if
			else
			{


			
				Payment::setError(Rule::ERROR_HOLDER_NAME);
				header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode.'&cupom='.$coupon.'&acao=aplicar');
				exit;


			}//end else



		}//end if

		if( !$desholdername = Validate::validateCardName($_POST['desholdername']) )
		{

			if ( $coupon == '')
			{
				# code...
				
				Payment::setError(Rule::VALIDATE_HOLDER_NAME);
				header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode);
				exit;


			}//end if
			else
			{


			
				Payment::setError(Rule::VALIDATE_HOLDER_NAME);
				header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode.'&cupom='.$coupon.'&acao=aplicar');
				exit;


			}//end else



		}//end if











		if(
			
			!isset($_POST['descardcode_month']) 
			|| 
			$_POST['descardcode_month'] === ''
			
		)
		{

			if ( $coupon == '')
			{
				# code...
				
				Payment::setError(Rule::ERROR_CARD_MONTH);
				header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode);
				exit;


			}//end if
			else
			{


			
				Payment::setError(Rule::ERROR_CARD_MONTH);
				header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode.'&cupom='.$coupon.'&acao=aplicar');
				exit;


			}//end else



		}//end if

		if( !$descardcode_month = Validate::validateMonth($_POST['descardcode_month']) )
		{

			if ( $coupon == '')
			{
				# code...
				
				Payment::setError(Rule::VALIDATE_CARD_MONTH);
				header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode);
				exit;


			}//end if
			else
			{


			
				Payment::setError(Rule::VALIDATE_CARD_MONTH);
				header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode.'&cupom='.$coupon.'&acao=aplicar');
				exit;


			}//end else



		}//end if











		if(
			
			!isset($_POST['descardcode_year']) 
			|| 
			$_POST['descardcode_year'] === ''
			
		)
		{

			if ( $coupon == '')
			{
				# code...
				
				Payment::setError(Rule::ERROR_CARD_YEAR);
				header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode);
				exit;


			}//end if
			else
			{


			
				Payment::setError(Rule::ERROR_CARD_YEAR);
				header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode.'&cupom='.$coupon.'&acao=aplicar');
				exit;


			}//end else



		}//end if

		if( !$descardcode_year = Validate::validateYear($_POST['descardcode_year']) )
		{

			if ( $coupon == '')
			{
				# code...
				
				Payment::setError(Rule::VALIDATE_CARD_YEAR);
				header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode);
				exit;


			}//end if
			else
			{


			
				Payment::setError(Rule::VALIDATE_CARD_YEAR);
				header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode.'&cupom='.$coupon.'&acao=aplicar');
				exit;


			}//end else



		}//end if









		if(
			
			!isset($_POST['descardcode_cvc']) 
			|| 
			$_POST['descardcode_cvc'] === ''
			
		)
		{

			if ( $coupon == '')
			{
				# code...
				
				Payment::setError(Rule::ERROR_CARD_CVC);
				header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode);
				exit;


			}//end if
			else
			{


			
				Payment::setError(Rule::ERROR_CARD_CVC);
				header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode.'&cupom='.$coupon.'&acao=aplicar');
				exit;


			}//end else



		}//end if

		if( !$descardcode_cvc = Validate::validateCvc($_POST['descardcode_cvc']) )
		{

			if ( $coupon == '')
			{
				# code...
				
				Payment::setError(Rule::VALIDATE_CARD_CVC);
				header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode);
				exit;


			}//end if
			else
			{


			
				Payment::setError(Rule::VALIDATE_CARD_CVC);
				header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode.'&cupom='.$coupon.'&acao=aplicar');
				exit;


			}//end else



		}//end if









		



		if(
				
			!isset($_POST['desholdercity']) 
			|| 
			$_POST['desholdercity'] === ''
			
		)
		{

			Payment::setError(Rule::ERROR_CITY);
			header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode.'&cupom='.$coupon.'&acao=aplicar');
			exit;

		}//end if



		if ( ( $cityArray = Address::getCity($_POST['desholdercity']) ) === false ) 
		{
			# code...
			Payment::setError(Rule::VALIDATE_CITY);
			header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode.'&cupom='.$coupon.'&acao=aplicar');
			exit;

		}//end if

		$desholdercity = $cityArray['descity'];







		if(
				
			!isset($_POST['desholderstate']) 
			|| 
			$_POST['desholderstate'] === ''
			
		)
		{

			Payment::setError(Rule::ERROR_STATE);
			header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode.'&cupom='.$coupon.'&acao=aplicar');
			exit;

		}//end if



		if ( ( $stateArray = Address::getState($_POST['desholderstate']) ) === false ) 
		{
			# code...
			Payment::setError(Rule::VALIDATE_STATE);
			header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode.'&cupom='.$coupon.'&acao=aplicar');
			exit;

		}//end if


		
		$desholderstate = $stateArray['desstatecode'];


		









		
		$desholdercomplement = Validate::validateStringNumber($_POST['desholdercomplement'], false, true);

		$inholdertypedoc = 0;






		$payment->setinpaymentmethod(1);
		$payment->setnrinstallment($_POST['installment']);




		




	}//end else if
	elseif( 

		isset($_POST['checkout-own-card'])
		&&
		Validate::validateCheckoutMethod($_POST['checkout-own-card'],2)

	)
	{






		if(
		
			!isset($_POST['descardcode_number']) 
			|| 
			$_POST['descardcode_number'] === ''
			
		)
		{

			if ( $coupon == '')
			{
				# code...
				
				Payment::setError(Rule::ERROR_CARD_NUMBER);
				header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode);
				exit;


			}//end if
			else
			{


			
				Payment::setError(Rule::ERROR_CARD_NUMBER);
				header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode.'&cupom='.$coupon.'&acao=aplicar');
				exit;


			}//end else



		}//end if

		if( !$descardcode_number = Validate::validateCardNumber($_POST['descardcode_number']) )
		{

			if ( $coupon == '')
			{
				# code...
				
				Payment::setError(Rule::VALIDATE_CARD_NUMBER);
				header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode);
				exit;


			}//end if
			else
			{


			
				Payment::setError(Rule::VALIDATE_CARD_NUMBER);
				header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode.'&cupom='.$coupon.'&acao=aplicar');
				exit;


			}//end else



		}//end if







		if(
			
			!isset($_POST['desholdername']) 
			|| 
			$_POST['desholdername'] === ''
			
		)
		{

			if ( $coupon == '')
			{
				# code...
				
				Payment::setError(Rule::ERROR_HOLDER_NAME);
				header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode);
				exit;


			}//end if
			else
			{


			
				Payment::setError(Rule::ERROR_HOLDER_NAME);
				header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode.'&cupom='.$coupon.'&acao=aplicar');
				exit;


			}//end else



		}//end if

		if( !$desholdername = Validate::validateCardName($_POST['desholdername']) )
		{

			if ( $coupon == '')
			{
				# code...
				
				Payment::setError(Rule::VALIDATE_HOLDER_NAME);
				header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode);
				exit;


			}//end if
			else
			{


			
				Payment::setError(Rule::VALIDATE_HOLDER_NAME);
				header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode.'&cupom='.$coupon.'&acao=aplicar');
				exit;


			}//end else



		}//end if









		if(
			
			!isset($_POST['descardcode_month']) 
			|| 
			$_POST['descardcode_month'] === ''
			
		)
		{

			if ( $coupon == '')
			{
				# code...
				
				Payment::setError(Rule::ERROR_CARD_MONTH);
				header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode);
				exit;


			}//end if
			else
			{


			
				Payment::setError(Rule::ERROR_CARD_MONTH);
				header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode.'&cupom='.$coupon.'&acao=aplicar');
				exit;


			}//end else



		}//end if

		if( !$descardcode_month = Validate::validateMonth($_POST['descardcode_month']) )
		{

			if ( $coupon == '')
			{
				# code...
				
				Payment::setError(Rule::VALIDATE_CARD_MONTH);
				header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode);
				exit;


			}//end if
			else
			{


			
				Payment::setError(Rule::VALIDATE_CARD_MONTH);
				header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode.'&cupom='.$coupon.'&acao=aplicar');
				exit;


			}//end else



		}//end if









		if(
			
			!isset($_POST['descardcode_year']) 
			|| 
			$_POST['descardcode_year'] === ''
			
		)
		{

			if ( $coupon == '')
			{
				# code...
				
				Payment::setError(Rule::ERROR_CARD_YEAR);
				header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode);
				exit;


			}//end if
			else
			{


			
				Payment::setError(Rule::ERROR_CARD_YEAR);
				header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode.'&cupom='.$coupon.'&acao=aplicar');
				exit;


			}//end else



		}//end if

		if( !$descardcode_year = Validate::validateYear($_POST['descardcode_year']) )
		{

			if ( $coupon == '')
			{
				# code...
				
				Payment::setError(Rule::VALIDATE_CARD_YEAR);
				header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode);
				exit;


			}//end if
			else
			{


			
				Payment::setError(Rule::VALIDATE_CARD_YEAR);
				header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode.'&cupom='.$coupon.'&acao=aplicar');
				exit;


			}//end else



		}//end if












		if(
			
			!isset($_POST['descardcode_cvc']) 
			|| 
			$_POST['descardcode_cvc'] === ''
			
		)
		{

			if ( $coupon == '')
			{
				# code...
				
				Payment::setError(Rule::ERROR_CARD_CVC);
				header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode);
				exit;


			}//end if
			else
			{


			
				Payment::setError(Rule::ERROR_CARD_CVC);
				header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode.'&cupom='.$coupon.'&acao=aplicar');
				exit;


			}//end else



		}//end if

		if( !$descardcode_cvc = Validate::validateCvc($_POST['descardcode_cvc']) )
		{

			if ( $coupon == '')
			{
				# code...
				
				Payment::setError(Rule::VALIDATE_CARD_CVC);
				header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode);
				exit;


			}//end if
			else
			{


			
				Payment::setError(Rule::VALIDATE_CARD_CVC);
				header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode.'&cupom='.$coupon.'&acao=aplicar');
				exit;


			}//end else



		}//end if









		/*$_POST['nrholderddd'] = $user->getnrddd();
		$_POST['nrholderphone'] = $user->getnrphone();
		$_POST['desholdername'] = $user->getdesperson();
		$_POST['dtholderbirth'] = $user->getdtbirth();
		0 = $user->getintypedoc();
		$_POST['desholderdocument'] = $user->getdesdocument();
		$_POST['zipcode'] = $address->getdeszipcode();
		$_POST['desholderaddress'] = $address->getdesaddress();
		$_POST['desholdernumber'] = $address->getdesnumber();
		$_POST['desholdercomplement'] = $address->getdescomplement();
		$_POST['desholderdistrict'] = $address->getdesdistrict();
		$_POST['desholdercity'] = $address->getdescity();
		$_POST['desholderstate'] = $address->getdesstate();*/
		

		$inholdertypedoc = $user->getintypedoc();
		$desholderdocument = $user->getdesdocument();
		$nrholderddd = $user->getnrddd();
		$nrholderphone = $user->getnrphone();
		$dtholderbirth = $user->getdtbirth();
		
		$desholderzipcode = $address->getdeszipcode();
		$desholderaddress = $address->getdesaddress();
		$desholdernumber = $address->getdesnumber();
		$desholdercomplement = $address->getdescomplement();
		$desholderdistrict = $address->getdesdistrict();
		$desholdercity = $address->getdescity();

		$desholderstate = $address->getdesstatecode();

		//$desholdername = $_POST['desholdername'];
		//$descardcode_number = $_POST['descardcode_number'];
		//$descardcode_month = $_POST['descardcode_month'];
		//$descardcode_year = $_POST['descardcode_year'];
		//$descardcode_number = $_POST['descardcode_number'];

		$payment->setinpaymentmethod(2);
		$payment->setnrinstallment($_POST['installment']);

		
	

	}//end elseif
	elseif( 


		isset($_POST['checkout-voucher'])
		&&
		Validate::validateCheckoutMethod($_POST['checkout-voucher'],3)
		&&
		(int)$invoucher == 1

	)
	{



		


		/*$_POST['nrholderddd'] = $user->getnrholderddd();
		$_POST['nrholderphone'] = $user->getnrholderphone();
		$_POST['desholdername'] = $user->getdesholdername();
		$_POST['dtholderbirth'] = $user->getdtholderbirth();
		0 = $user->getinholdertypedoc();
		$_POST['desholderdocument'] = $user->getdesholderdocument();
		$_POST['zipcode'] = $address->getdeszipcode();
		$_POST['desholderaddress'] = $address->getdesholderaddress();
		$_POST['desholdernumber'] = $address->getdesholdernumber();
		$_POST['desholdercomplement'] = $address->getdesholdercomplement();
		$_POST['desholderdistrict'] = $address->getdesholderdistrict();
		$_POST['desholdercity'] = $address->getdesholdercity();
		$_POST['desholderstate'] = $address->getdesholderstate();*/

		/*$inholdertypedoc = $user->getintypedoc();
		$desholderdocument = $user->getdesdocument();
		$nrholderddd = $user->getnrddd();
		$nrholderphone = $user->getnrphone();
		$dtholderbirth = $user->getdtbirth();
		
		$deszipcode = $address->getdeszipcode();
		$desholderaddress = $address->getdesaddress();
		$desholdernumber = $address->getdesnumber();
		$desholdercomplement = $address->getdescomplement();
		$desholderdistrict = $address->getdesdistrict();
		$desholdercity = $address->getdescity();
		$desholderstate = $address->getdesstate();*/


		$inholdertypedoc = null;
		$desholderdocument = null;
		$nrholderddd = null;
		$nrholderphone = null;
		$dtholderbirth = null;
		
		$desholderzipcode = null;
		$desholderaddress = null;
		$desholdernumber = null;
		$desholdercomplement = null;
		$desholderdistrict = null;
		$desholdercity = null;
		$desholderstate = null;

		$desholdername = null;
		$descardcode_number = null;
		$descardcode_month = null;
		$descardcode_year = null;
		$descardcode_cvc = null;

		$payment->setinpaymentmethod(3);
		$payment->setnrinstallment(1);





	}//end if
	else
	{

		Payment::setError(Rule::VALIDATE_CHECKOUT_METHOD);
		header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode);
		exit;

	}//end else



	/*echo "<pre>";
	var_dump($inholdertypedoc);
	var_dump($desholderdocument);
	var_dump($nrholderddd);
	var_dump($nrholderphone);
	var_dump($dtholderbirth);
	
	var_dump($desholderzipcode);
	var_dump($desholderaddress);
	var_dump($desholdernumber);
	var_dump($desholdercomplement);
	var_dump($desholderdistrict);
	var_dump($desholdercity);
	
	var_dump($desholdername);
	var_dump($descardcode_number);
	var_dump($descardcode_month);
	var_dump($descardcode_year);
	var_dump($descardcode_number);

	exit;*/





	$desholderstate = $address->getdesstatecode();


	$cart = new Cart();

	$data = [

		'dessessionid'=>session_id(),
		'iduser'=>$user->getiduser(),
		'incartstatus'=>0

	];//end data


	$cart->setData($data);

	$cart->update();





	//$account = new Account();
	//$account->get((int)$user->getiduser());






	
	if ( (int)$invoucher == 0 )
	{
		# code...
		$wirecard = new Wirecard();

		//$account = new Account();
		//$account->get((int)$user->getiduser());

		$wirecardCustomerData = $wirecard->createCustomer(

			$user->getdesperson(),
			$user->getdesemail(),
			$user->getdtbirth(),
			$user->getintypedoc(),
			$user->getdesdocument(),
			$payment->getinpaymentmethod(),
			$user->getnrcountryarea(),
			$user->getnrddd(),
			$user->getnrphone(),
			$address->getdeszipcode(),
			$address->getdesaddress(),
			$address->getdesnumber(),
			$address->getdescomplement(),
			$address->getdesdistrict(),
			$address->getdescity(),
			$address->getdesstatecode(),
			$descardcode_month,
			(int)$descardcode_year,
			$descardcode_number,
			$descardcode_cvc


		);//END createCustomer

	}//end if
	else
	{



		$wirecardCustomerData = [


			'descustomercode'=>'',
			'descardcode'=>'',
			'desbrand'=>'',
			'infirst6'=>'',
			'inlast4'=>''

		];//END createCustomer



	}//end else


	



	$customer = new Customer();

	try
	{

		$customer->setData([

			'iduser'=>$user->getiduser(),
			'descustomercode'=>$wirecardCustomerData['descustomercode'],
			'desname'=>$user->getdesperson(),
			'desemail'=>$user->getdesemail(),
			'nrcountryarea'=>$user->getnrcountryarea(),
			'nrddd'=>$user->getnrddd(),
			'nrphone'=>$user->getnrphone(),
			'intypedoc'=>$user->getintypedoc(),
			'desdocument'=>$user->getdesdocument(),
			'deszipcode'=>$address->getdeszipcode(),
			'desaddress'=>$address->getdesaddress(),
			'desnumber'=>$address->getdesnumber(),
			'descomplement'=>$address->getdescomplement(),
			'desdistrict'=>$address->getdesdistrict(),
			'descity'=>$address->getdescity(),
			'desstate'=>$address->getdesstatecode(),
			'descountry'=>$address->getdescountrycode(),
			'descardcode'=>$wirecardCustomerData['descardcode'],
			'desbrand'=>$wirecardCustomerData['desbrand'],
			'infirst6'=>$wirecardCustomerData['infirst6'],
			'inlast4'=>$wirecardCustomerData['inlast4'],
			'dtbirth'=>$user->getdtbirth()

		]);//end setData

			

		$customer->save();
		
	}//end try
	catch ( \Exception $e) 
	{

	
		if ( $coupon == '')
		{
			# code...
			
			Payment::setError(Rule::GENERAL_ERROR);
			header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode);
			exit;


		}//end if
		else
		{


		
			Payment::setError(Rule::GENERAL_ERROR);
			header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode.'&cupom='.$coupon.'&acao=aplicar');
			exit;


		}//end else
		
	}//end catch




	

	

	//new Plan acima de validação de coupons








	/*$timezone = new DateTimeZone('America/Sao_Paulo');


	$dtnow = new DateTime('now');

	$dtnow->setTimezone($timezone);*/







	$dtend = new DateTime('now +'.$inplan['inperiod'].' month');

	$dtend->setTimezone($timezone);






	$plan->setData([

		'iduser'=>$user->getiduser(),
		'inplancode'=>$inplan['inplancode'],
		'incontext'=>$inplan['inplancontext'],
		'inmigration'=>0,
		'inperiod'=>$inplan['inperiod'],
		'desplan'=>$inplan['desplan'],
		'vlprice'=>$inplan['vlprice'],
		'dtbegin'=>$dtnow->format('Y-m-d'),
		'dtend'=>$dtend->format('Y-m-d')

	]);//end setData

	

	$plan->save();

	



	


	$cart->addItem( $plan->getidplan(), 0);


				


	


	if ( (int)$invoucher == 0 )
	{
		# code...
		$wirecardPaymentData = $wirecard->payOrderPlan(

			$customer->getdescustomercode(),
			$cart->getidcart(),
			Rule::NR_COUNTRY_AREA,
			$nrholderddd,
			$nrholderphone,
			$desholdername,
			$dtholderbirth,
			$inholdertypedoc,
			$desholderdocument,
			$desholderzipcode,
			$desholderaddress,
			$desholdernumber,
			$desholdercomplement,
			$desholderdistrict,
			$desholdercity,
			$desholderstate,
			$payment->getinpaymentmethod(),
			$payment->getnrinstallment(),
			$descardcode_month,
			$descardcode_year,
			$descardcode_number,
			$descardcode_cvc

		);//end wirecardPaymentData


	}//end if
	else
	{

		$wirecardPaymentData = [

			'despaymentcode'=>'',
			'inpaymentstatus'=>PaymentStatus::AUTHORIZED,
			'deslinecode'=>'',
			'desprinthref'=>'',
			'desordercode'=>'',
			'vlantecipation'=>0,
			'vltotal'=>0,
			'vlseller'=>0,
			'vlmarketplace'=>0,
			'vlprocessor'=>0

		];//end payPlan


	}//end else




		

	try 
	{


		$payment->setData([

			'iduser'=>$user->getiduser(),
			'despaymentcode'=>$wirecardPaymentData['despaymentcode'],
			'inpaymentstatus'=>$wirecardPaymentData['inpaymentstatus'],
			'incharge'=>0,
			'inrefunded'=>0,
			'inpaymentmethod'=>$payment->getinpaymentmethod(),
			'nrinstallment'=>$payment->getnrinstallment(),
			'deslinecode'=>$wirecardPaymentData['deslinecode'],
			'desprinthref'=>$wirecardPaymentData['desprinthref'],
			'desholdername'=>$desholdername,
			'nrholdercountryarea'=>Rule::NR_COUNTRY_AREA,
			'nrholderddd'=>$nrholderddd,
			'nrholderphone'=>$nrholderphone,
			'inholdertypedoc'=>$inholdertypedoc,
			'desholderdocument'=>$desholderdocument,
			'desholderzipcode'=>$desholderzipcode,
			'desholderaddress'=>$desholderaddress,
			'desholdernumber'=>$desholdernumber,
			'desholdercomplement'=>$desholdercomplement,
			'desholderdistrict'=>$desholderdistrict,
			'desholdercity'=>$desholdercity,
			'desholderstate'=>$desholderstate,
			'dtholderbirth'=>$dtholderbirth

		]);//end setData



		$payment->update();
		
	}//end try 
	catch ( \Exception $e) 
	{


		if ( $coupon == '')
		{
			# code...
			
			Payment::setError(Rule::GENERAL_ERROR);
			header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode);
			exit;


		}//end if
		else
		{


		
			Payment::setError(Rule::GENERAL_ERROR);
			header('Location: /dashboard/comprar-plano/checkout?plano='.$inplancode.'&cupom='.$coupon.'&acao=aplicar');
			exit;


		}//end else
		
	}//end catch



		




	if( in_array((int)$payment->getinpaymentmethod(), [1,2]) )
	{

		//$vlmktpercentage = Rule::MKT_CARD_PERCENTAGE;
		//$vlmktfixed = Rule::MKT_CARD_FIXED;
		
		$vlpropercentage = Rule::PRO_CARD_PERCENTAGE;
		$vlprofixed = Rule::PRO_CARD_FIXED;
		$nrantecipationperiod = Rule::CARD_ANTECIPATION_PERIOD;

	}//end if
	elseif( (int)$payment->getinpaymentmethod() == 0 )
	{

		//$vlmktpercentage = Rule::MKT_BOLETO_PERCENTAGE;
		//$vlmktfixed = Rule::MKT_BOLETO_FIXED;
		$vlpropercentage = NULL;
		$vlprofixed = Rule::PRO_BOLETO;
		$nrantecipationperiod = Rule::BOLETO_ANTECIPATION_PERIOD;

	}//end else
	elseif( (int)$payment->getinpaymentmethod() == 3 )
	{

		//$vlmktpercentage = Rule::MKT_BOLETO_PERCENTAGE;
		//$vlmktfixed = Rule::MKT_BOLETO_FIXED;
		$vlpropercentage = NULL;
		$vlprofixed = NULL;
		$nrantecipationperiod = NULL;

	}//end else



	//$vlantecipation = Wirecard::getAntecipationValue($payment->getnrinstallment());

	

	$fee = new Fee();

	$fee->setData([

		'iduser'=>$user->getiduser(),
		'idpayment'=>$payment->getidpayment(),
		'vlmktpercentage'=>NULL,
		'vlmktfixed'=>NULL,
		'vlpropercentage'=>$vlpropercentage,
		'vlprofixed'=>$vlprofixed,
		'vlantecipation'=>$wirecardPaymentData['vlantecipation'],
		'nrantecipationperiod'=>$nrantecipationperiod
		

	]);//end setData

	$fee->save();





	$cart->setincartstatus(1);
	$cart->update();
	Cart::removeFromSession();



	if (


		isset($_POST['cupom'])
		&&
		$_POST['cupom'] != ''


	)
	{


		Coupon::setCouponUser( 

			(int)$user->getiduser(), 
			$couponIsApplied['idcoupon'], 
			$couponIsApplied['idcouponuser'], 
			1

		);//end setCouponUser



	}//end if

	



	
	$order = new Order();

	$order->setData([

		'iduser'=>$user->getiduser(),
		'idcart'=>$cart->getidcart(),
		'idcustomer'=>$customer->getidcustomer(),
		'idpayment'=>$payment->getidpayment(),
		'idfee'=>$fee->getidfee(),
		'desordercode'=>$wirecardPaymentData['desordercode'],
		'vltotal'=>$wirecardPaymentData['vltotal'],
		'vlseller'=>$wirecardPaymentData['vlseller'],
		'vlmarketplace'=>$wirecardPaymentData['vlmarketplace'],
		'vlprocessor'=>$wirecardPaymentData['vlprocessor']

	]);//end setData

	

	$order->save();

	




	$consort = new Consort();

	$consort->get((int)$user->getiduser());


	if ( (int)$payment->getinpaymentmethod() != 0 )
	{
		# code...
		$userMailer = new Mailer(
				
			Rule::EMAIL_PLAN,

			"plan", 
			
			array(

				"user"=>$user->getValues(),
				"plan"=>$plan->getValues(),
				"order"=>$order->getValues(),
				"consort"=>$consort->getValues()

			),

			$user->getdeslogin(),

			$user->getdesnick(),

			$consort->getdesconsortemail(),

			$consort->getdesconsort()

		
		);//end Mailer

	}//end if
	else
	{


		$userMailer = new Mailer(
				
			Rule::EMAIL_PLAN,

			"plan-boleto", 
			
			array(

				"user"=>$user->getValues(),
				"plan"=>$plan->getValues(),
				"order"=>$order->getValues(),
				"consort"=>$consort->getValues()

			),

			$user->getdeslogin(),

			$user->getdesnick(),

			$consort->getdesconsortemail(),

			$consort->getdesconsort()

		
		);//end Mailer


	}//end else

	
	$userMailer->send();




	


	if ( (int)$invoucher == 1 )
	{

		$inplancontext = substr($plan->getinplancode(), 0, 1);


		$user->setinplan((int)$plan->getinplancode());
		$user->setinplancontext((int)$inplancontext);
		

	}//end if
	else
	{

		$user->setinplancontext(1);
		
	}//end else
	
	/*
	else
	{


		//$user->setinplan((int)$plan->getinplancode());
		//$user->setinplancontext((int)$inplancontext);


	}//end else
	*/

	//$plan->updateLastPlanDtEnd($lastplan['idplan'], $user->getiduser(), $plan->getdtbegin());

	//$user->setinstatus('1');
	
	//$user->setdtplanend($plan->getdtend());

	

	
	$user->update();
	$user->setToSession();

	if(isset($_SESSION['planPurchaseValues'])) unset($_SESSION['planPurchaseValues']);

	
	Payment::setSuccess('Compra de Plano realizada');
	
	//User::loginAfterPlanPurchase($user->getdeslogin(), $user->getdespassword());

	header("Location: /dashboard/meu-plano");
	exit;
	



});//END route




































$app->get( "/dashboard/comprar-plano", function()
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



	if ( (int)$user->getinplancontext() != 0 )
	{
		# code...
		Payment::setError(Rule::VALIDATE_PLAN);
		header('Location: /dashboard/meu-plano');
		exit;

	}//end if






	


	   
	$plans = Plan::getPlansFullArray();




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
		
 		"plans-purchase", 
		
		[
			'user'=>$user->getValues(),
			//'user'=>$user->getValues(),
			'validate'=>$validate,
			'plans'=>$plans,
			'error'=>Plan::getError(),
			'success'=>Plan::getSuccess(),
			

		]
	
	);//end setTpl

});//END route









?>