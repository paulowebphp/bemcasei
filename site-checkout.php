<?php

use \Core\Mailer;
use \Core\Page;
use \Core\Rule;
use \Core\Validate;
use \Core\Wirecard;
use \Core\Model\Account;
use \Core\Model\Address;
use \Core\Model\Cart;
use \Core\Model\Consort;
use \Core\Model\Coupon;
use \Core\Model\Customer;
use \Core\Model\Fee;
use \Core\Model\Order;
use \Core\Model\Payment;
use \Core\Model\PaymentStatus;
use \Core\Model\Plan;
use \Core\Model\User;


















$app->get( "/planos", function()
{
	$plans = Plan::getPlansFullArray();

	$page = new Page();

	$page->setTpl(
		
		"plans",

		[

			'plans'=>$plans

		]
	
	);//end setTpl

});//END route























$app->get( "/criar-site", function()
{



	
	/*if ( isset($_GET['plano']) )
	{

		$plan = $_GET['plano'];

	}//end if
	else if( !isset($_GET['plano']) )
	{

		header('Location: /planos');
		exit;

	}//end else if*/




	if ( 


		!isset($_GET['plano'])
		||
		$_GET['plano'] == ''

	)
	{

		/*User::setErrorRegister(Rule::VALIDATE_PLAN_PURCHASE_CODE);
		header("Location: /planos");
		exit;*/

		$inplancode = 0;


	}//end if
	elseif ( ( $inplancode = Validate::validateInplancode($_GET['plano']) ) === false )
	{

		User::setErrorRegister(Rule::VALIDATE_PLAN_PURCHASE_CODE);
		header("Location: /planos");
		exit;


	}//end if




	


	$page = new Page();

	$page->setTpl(
		
		"register",

		[
			'inplancode'=>$inplancode,
			'errorRegister'=>User::getErrorRegister(),
			'registerValues'=>(isset($_SESSION['registerValues'])) ? $_SESSION['registerValues'] : ['name'=>'', 'email'=>'']

		]
	
	);//end setTpl

});//END route

























$app->post( "/criar-site", function()
{


	$_SESSION['registerValues'] = $_POST;




	if ( 


		!isset($_POST['plano'])
		||
		$_POST['plano'] == ''

	)
	{

		User::setErrorRegister(Rule::VALIDATE_PLAN_PURCHASE_CODE);
		header("Location: /planos");
		exit;


	}//end if



	if ( ( $inplancode = Validate::validateInplancode($_POST['plano']) ) === false )
	{

		User::setErrorRegister(Rule::VALIDATE_PLAN_PURCHASE_CODE);
		header("Location: /planos");
		exit;


	}//end if






	if( 
		
		!isset($_POST['name']) 
		|| 
		$_POST['name'] == ''
	)
	{

		User::setErrorRegister(Rule::ERROR_NAME);
		header("Location: /criar-site?plano=".$inplancode);
		exit;

	}//end if






	if( !Validate::validateFullName($_POST['name']) )
	{ 

		User::setErrorRegister(Rule::VALIDATE_FULL_NAME);
		header("Location: /criar-site?plano=".$inplancode);
		exit;

	}//end if






	if( ( $desperson = Validate::validateStringUcwords($_POST['name'], true, false) ) === false )
	{

		User::setErrorRegister(Rule::VALIDATE_NAME);
		header("Location: /criar-site?plano=".$inplancode);
		exit;

	}//end if













	if(
		
		!isset($_POST['email']) 
		|| 
		$_POST['email'] == ''
	)
	{

		User::setErrorRegister(Rule::ERROR_EMAIL);
		header("Location: /criar-site?plano=".$inplancode);
		exit;

	}//end if

	if( ($desemail = Validate::validateEmail($_POST['email'])) === false )
	{	
		
		User::setError(Rule::VALIDATE_EMAIL);
		header("Location: /criar-site?plano=".$inplancode);
		exit;

	}//end if
















	if(
		
		!isset($_POST['password']) 
		|| 
		$_POST['password'] == ''
		
	)
	{

		User::setErrorRegister(Rule::ERROR_PASSWORD);
		header("Location: /criar-site?plano=".$inplancode);
		exit;

	}//end if


	if( !Validate::validatePassword($_POST['password']) )
	{	
		
		User::setError(Rule::VALIDATE_PASSWORD);
		header("Location: /criar-site?plano=".$inplancode);
		exit;

	}//end if












	if(
		
		!isset($_POST['confirmation-register']) 
		|| 
		$_POST['confirmation-register'] == ''
		
	)
	{

		User::setErrorRegister(Rule::PASSWORD_CONFIRM);
		header("Location: /criar-site?plano=".$inplancode);
		exit;

	}//end if



	if(
		
		$_POST['confirmation-register'] != $_POST['password']
		
	)
	{

		User::setErrorRegister(Rule::PASSWORD_DIVERGENCY);
		header("Location: /criar-site?plano=".$inplancode);
		exit;

	}//end if


	



	/*if( User::checkLoginExists($_POST['email']) === true )
	{

		User::setErrorRegister(Rule::CHECK_LOGIN_EXISTS);
		header("Location: /criar-site?plano=".$inplancode);
		exit;

	}//end if*/



	


	/*if( ctype_graph($name) )
	{ 

		User::setErrorRegister("Este não parece ser um nome completo");
		header("Location: /criar-site?plano=".$inplancode);
		exit;

	}//end if*/

	




	/*if (

		!isset($_POST['g-recaptcha-response'])
		||
		$_POST['g-recaptcha-response'] == ''

	)
	{
		# code...
		User::setErrorRegister(Rule::ERROR_RECAPTCHA);
		header("Location: /criar-site?plano=".$inplancode);
		exit;

	}//end if
	


	$recaptcha = User::getRecaptcha($_POST['g-recaptcha-response']);


	if ($recaptcha['success'] == false)
	{
		# code...
		User::setErrorRegister(Rule::VALIDATE_RECAPTCHA);
		header("Location: /criar-site?plano=".$inplancode);
		exit;

	}//end if*/





	if ( $_SERVER['HTTP_HOST'] != Rule::CANONICAL_NAME )
	{
		# code...

		if( User::checkLoginExists($_POST['email']) === true )
		{

			User::setErrorRegister(Rule::CHECK_LOGIN_EXISTS);
			header("Location: /criar-site?plano=".$inplancode);
			exit;

		}//end if*/

		


		if (

			!isset($_POST['g-recaptcha-response'])
			||
			$_POST['g-recaptcha-response'] == ''
	
		)
		{
			# code...
			User::setErrorRegister(Rule::ERROR_RECAPTCHA);
			header("Location: /criar-site?plano=".$inplancode);
			exit;
	
		}//end if
		
	
	
		$recaptcha = User::getRecaptcha($_POST['g-recaptcha-response']);
	
	
		if ($recaptcha['success'] == false)
		{
			# code...
			User::setErrorRegister(Rule::VALIDATE_RECAPTCHA);
			header("Location: /criar-site?plano=".$inplancode);
			exit;
	
		}//end if



	}//end if

	
	


	$nameArray = explode(' ', $desperson);

	$desnick = $nameArray[0];

	$inplancontext = substr($inplancode, 0, 1);

	$inplancontext = ( (int)$inplancontext === 0 ) ? 0 : 1;




	$user = new User();

	$user->setData([

		'deslogin'=>$desemail,
		'despassword'=>$_POST['password'],
		'desdomain'=>NULL,
		'inadmin'=>0,
		'inseller'=>1,
		'instatus'=>0,
		'inaccount'=>0,
		'inplancontext'=>$inplancontext,
		'inplan'=>$inplancode,
		'inautostatus'=>1,
		'interms'=>0,
		'desipterms'=>NULL,
		'dtterms'=>NULL,
		'desperson'=>$desperson,
		'desnick'=>$desnick,
		'desemail'=>$desemail,
		'nrcountryarea'=>NULL,
		'nrddd'=>NULL,
		'nrphone'=>NULL,
		'intypedoc'=>0,
		'desdocument'=>NULL,
		'desphoto'=>Rule::DEFAULT_PHOTO,
		'desextension'=>Rule::DEFAULT_PHOTO_EXTENSION,
		'dtbirth'=>NULL


	]);//end setData

		

	$user->save();

	


	if( (int)$user->getiduser() > 0)
	{



	/*
		$customstyle = new CustomStyle();

		$customstyle->setData([

			'iduser'=>$user->getiduser(),
			'idtemplate'=>1,
			'desbanner'=>'0.jpg',
			'desbannerextension'=>'jpg',

			'desbgcolorbanner'=>'DD716F',
			'desbgcolorfooter'=>'DD716F',
			'descolorfooter'=>'FFFFFF',
			'descolorfooterhover'=>'F7D9E1',

			'descolor1'=>'FFFFFF',
			'descolor2'=>'DD716F',
			'descolortexthover'=>'DD716F',
			'descolordate'=>'FFFFFF',
			'desfontfamilydate'=>'Norican',
			'desfontfamily1'=>'Norican',
			'desfontfamily2'=>'OpenSans',

			'inbgcolorgradient'=>0,
			'inbgcolorbutton'=>0,
			'inroundborderimage'=>1,
			'inbordersocial'=>1,
			'desborderimagesize'=>'12',
			'desborderradiusbutton'=>'20'


		]);//end setData

			
	

		$customstyle->update();








		$consort = new Consort();

		$consort->setData([

			'iduser'=>$user->getiduser(),
			'desconsort'=>'Meu Amor',
			'desconsortemail'=>'',
			'desphoto'=>Rule::DEFAULT_PHOTO,
			'desextension'=>Rule::DEFAULT_PHOTO_EXTENSION

		]);//end setData



		

		$consort->update();







		$timezone = new DateTimeZone('America/Sao_Paulo');

		$dtwedding = new DateTime("now + 1 year");

		$dtwedding->setTimezone($timezone);

		$wedding = new Wedding();	

		$wedding->setData([

			'iduser'=>$user->getiduser(),
			'dtwedding'=>$dtwedding->format('Y-m-d'),
			'tmwedding'=>'19:00',
			'desdescription'=>'',
			'descostume'=>'',
			'desdirections'=>'',
			'desaddress'=>'',
			'desnumber'=>'',
			'desdistrict'=>'',
			'descity'=>'',
			'desstate'=>'',
			'descountry'=>'',
			'desphoto'=>Rule::DEFAULT_PHOTO,
			'desextension'=>Rule::DEFAULT_PHOTO_EXTENSION
			

		]);//end setData



	
		$wedding->update();









		$party = new Party();	

		
		$party->setData([

			'iduser'=>$user->getiduser(),
			'dtparty'=>$dtwedding->format('Y-m-d'),
			'tmparty'=>'21:00',
			'desdescription'=>'',
			'descostume'=>'',
			'desdirections'=>'',
			'desaddress'=>'',
			'desnumber'=>'',
			'desdistrict'=>'',
			'descity'=>'',
			'desstate'=>'',
			'descountry'=>'',
			'desphoto'=>Rule::DEFAULT_PHOTO,
			'desextension'=>Rule::DEFAULT_PHOTO_EXTENSION
			

		]);//end setData
	
			
		

		$party->update();


		




		$initialpage = new InitialPage();

		$initialpage->setData([

			'iduser'=>$user->getiduser(),
			'inparty'=>0,
			'inbestfriend'=>0,
			'inalbum'=>0

		]);//end setData
		


		$initialpage->update();







		$menu = new Menu();

		$menu->setData([

			'iduser'=>$user->getiduser(),
			'inwedding'=>1,
			'inparty'=>1,
			'inbestfriend'=>1,
			'inrsvp'=>1,
			'inmessage'=>1,
			'instore'=>1,
			'inevent'=>1,
			'inalbum'=>1,
			'invideo'=>1,
			'instakeholder'=>1,
			'inouterlist'=>1

		]);//end setData
			
		
		$menu->update();









		$productconfig = new ProductConfig();

		$productconfig->setData([

			'iduser'=>$user->getiduser(),
			'incharge'=>0


		]);//end setData





		$productconfig->update();











		$rsvpconfig = new RsvpConfig();

		$rsvpconfig->setData([

			'iduser'=>$user->getiduser(),
			'inclosed'=>0,
			'inadultsconfig'=>0,
			'inmaxadultsconfig'=>10,
			'inchildrenconfig'=>0,
			'inmaxchildrenconfig'=>10


		]);//end setData

			


		$rsvpconfig->update();










		$socialmedia = new SocialMedia();



		$socialmedia->setData([

			'iduser'=>$user->getiduser(),

			'desfacelink1'=>'',
			'desfacelink2'=>'',
			'desfacelink3'=>'',

			'desinstalink1'=>'',
			'desinstalink2'=>'',
			'desinstalink3'=>'',

			'desyoutubelink1'=>'',
			'desyoutubelink2'=>'',
			'desyoutubelink3'=>'',

			'destwitterlink1'=>'',
			'destwitterlink2'=>'',
			'destwitterlink3'=>''

		]);//end setData



		$socialmedia->update();
	*/



		$user->setRegisterEntities();

			


		$user->setinregister(1);

		$user->update();

		if(isset($_SESSION['registerValues'])) unset($_SESSION['registerValues']);









		if( (int)$user->getinplancontext() == 0 )
		{

			$_SESSION[User::SESSION] = NULL;

			$user->setToSession();

			header('Location: /dashboard');
			exit;

		}//end if
		else
		{

			$hash = base64_encode($user->getiduser());

			//User::login($_POST['email'], $_POST['password']);

			header('Location: /cadastrar/'.$hash);
			exit;


		}//end else



		


	}//end if

	

});//END route





































$app->get( "/cadastrar/:hash", function( $hash )
{
	
	
	$iduser = Validate::getHash($hash);


	if ( $iduser == '' )
	{
		# code...
		Payment::setError(Rule::VALIDATE_ID_HASH);
		header('Location: /checkout/'.$hash);
		exit;

	}//end if
	

	$user = new User();

	$user->get((int)$iduser);

	
	
	//$wirecard = new Wirecard();

	//$inplan = Wirecard::getPlan($user->getinplan());

	if ( (int)$user->getinplancontext() == 0 )
	{
		# code...
		User::setError(Rule::VALIDATE_PLAN_FREE);
		header('Location: /login');
		exit;

	}//end if





	/*if ( isset($_GET['zipcode']) )
	{

		$account->loadFromCEP($_GET['zipcode']);
		$account->setdesnumber($_GET['desnumber']);


	}//end if*/


	/*$account = new Account();

	if( !$account->getdesaddress() ) $account->setdesaddress('');
	if( !$account->getdesnumber() ) $account->setdesnumber('');
	if( !$account->getdescomplement() ) $account->setdescomplement('');
	if( !$account->getdesdistrict() ) $account->setdesdistrict('');
	if( !$account->getdescity() ) $account->setdescity('');
	if( !$account->getdesstate() ) $account->setdesstate('');
	if( !$account->getdescountry() ) $account->setdescountry('');
	if( !$account->getdeszipcode() ) $account->setdeszipcode('');
	if( !$account->getdesdocument() ) $account->setdesdocument('');
	if( !$account->getdtbirth() ) $account->setdtbirth('');
	if( !$account->getnrddd() ) $account->setnrddd('');
	if( !$account->getnrphone() ) $account->setnrphone('');*/



	$state = Address::listAllStates();

	$city = Address::listAllCitiesByState(1);



	/*if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
	{
		# code...
		foreach ($state as &$row)
		{
			# code...
			$row['desstate'] = utf8_encode($row['desstate']);
		}//end foreach


		foreach ($city as &$row)
		{
			# code...
			$row['descity'] = utf8_encode($row['descity']);

		}//end foreach

	}//end if*/


	


	$page = new Page();

	$page->setTpl(
		
		"accounts", 
		
		[
			'city'=>$city,
			'state'=>$state,
			'hash'=>$hash,
			'user'=>$user->getValues(),
			//'account'=>$account->getValues(),
			'error'=>Account::getError(),
			'accountsValues'=>(isset($_SESSION['accountsValues'])) ? $_SESSION['accountsValues'] : ['desdocument'=>'', 'nrddd'=>'', 'nrphone'=>'', 'dtbirth'=>'', 'zipcode'=>'', 'desaddress'=>'', 'desnumber'=>'', 'descomplement'=>'', 'desdistrict'=>'']
			
		]
	
	);//end setTpl

});//END route













































$app->post( "/cadastrar/:hash", function( $hash )
{	



	$_SESSION['accountsValues'] = $_POST;


	

	//$user->getFromHash($hash);
	


	$iduser = Validate::getHash($hash);


	if ( $iduser == '' )
	{
		# code...
		Payment::setError(Rule::VALIDATE_ID_HASH);
		header('Location: /checkout/'.$hash);
		exit;

	}//end if
	

	$user = new User();

	$user->get((int)$iduser);

	
	if ((int)$user->getinplancontext() == 0 )
	{
		# code...
		User::setError(Rule::VALIDATE_PLAN_FREE);
		header('Location: /login');
		exit;
		
	}//end if



	if(
		
		!isset($_POST['desdocument']) 
		|| 
		$_POST['desdocument'] === ''
		
	)
	{

		Account::setError(Rule::ERROR_CPF);
		header('Location: /cadastrar/'.$hash);
		exit;

	}//end if







	if( !$desdocument = Validate::validateDocument($user->intypedoc(), $_POST['desdocument']) )
	{

		Account::setError(Rule::VALIDATE_CPF);
		header('Location: /cadastrar/'.$hash);
		exit;

	}//end if





	




	if(
		
		!isset($_POST['dtbirth']) 
		|| 
		$_POST['dtbirth'] === ''
		
	)
	{

		Account::setError(Rule::ERROR_DATE_BIRTH);
		header('Location: /cadastrar/'.$hash);
		exit;

	}//end if






	if( !$dtbirth = Validate::validateUserMajority($_POST['dtbirth']) )
	{

		Account::setError(Rule::VALIDATE_DATE_MAJORITY);
		header('Location: /cadastrar/'.$hash);
		exit;

	}//end if



	






	if(
		
		!isset($_POST['nrddd']) 
		|| 
		$_POST['nrddd'] === ''
		
	)
	{

		Account::setError(Rule::ERROR_DDD);
		header('Location: /cadastrar/'.$hash);
		exit;

	}//end if






	if( !$nrddd = Validate::validateDDD($_POST['nrddd']) )
	{

		Account::setError(Rule::VALIDATE_DDD);
		header('Location: /cadastrar/'.$hash);
		exit;

	}//end if








	if(
		
		!isset($_POST['nrphone']) 
		|| 
		$_POST['nrphone'] === ''
		
	)
	{

		Account::setError(Rule::ERROR_PHONE);
		header('Location: /cadastrar/'.$hash);
		exit;

	}//end if







	if( !$nrphone = Validate::validatePhone($_POST['nrphone']) )
	{

		Account::setError(Rule::VALIDATE_PHONE);
		header('Location: /cadastrar/'.$hash);
		exit;

	}//end if














	
	if( 
		
		!isset($_POST['zipcode']) 
		|| 
		$_POST['zipcode'] === ''
	)
	{

		Account::setError(Rule::ERROR_ZIPCODE);
		header('Location: /cadastrar/'.$hash);
		exit;
		
	}//end if







	if( !$deszipcode = Validate::validateCEP($_POST['zipcode']) )
	{

		Account::setError(Rule::VALIDATE_ZIPCODE);
		header('Location: /cadastrar/'.$hash);
		exit;

	}//end if
	










	if(
		!isset($_POST['desaddress']) 
		|| 
		$_POST['desaddress'] === ''
		
	)
	{

		Account::setError(Rule::ERROR_ADDRESS);
		header('Location: /cadastrar/'.$hash);
		exit;

	}//end if






	if( !$desaddress = Validate::validateStringNumber($_POST['desaddress']) )
	{

		Account::setError(Rule::VALIDATE_ADDRESS);
		header('Location: /checkout/'.$hash);
		exit;

	}//end if













	

	if(
		
		!isset($_POST['desnumber']) 
		|| 
		$_POST['desnumber'] === ''
		
	)
	{

		Account::setError(Rule::ERROR_NUMBER);
		header('Location: /cadastrar/'.$hash);
		exit;

	}//end if






	if( !$desnumber = Validate::validateNumber($_POST['desnumber']) )
	{

		Account::setError(Rule::VALIDATE_NUMBER);
		header('Location: /cadastrar/'.$hash);
		exit;

	}//end if










	if(
		
		!isset($_POST['desdistrict']) 
		|| 
		$_POST['desdistrict'] === ''
		
	)
	{

		Account::setError(Rule::ERROR_DISTRICT);
		header('Location: /cadastrar/'.$hash);
		exit;

	}//end if






	if( !$desdistrict = Validate::validateStringNumber($_POST['desdistrict']) )
	{

		Account::setError(Rule::VALIDATE_DISTRICT);
		header('Location: /cadastrar/'.$hash);
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
		header('Location: /cadastrar/'.$hash);
		exit;

	}//end if


	











	if(
				
		!isset($_POST['descity']) 
		|| 
		$_POST['descity'] === ''
		
	)
	{

		Account::setError(Rule::ERROR_CITY);
		header('Location: /cadastrar/'.$hash);
		exit;

	}//end if



	if ( ( $descity = Address::getCity($_POST['descity']) ) === false ) 
	{
		# code...
		Account::setError(Rule::VALIDATE_CITY);
		header('Location: /cadastrar/'.$hash);
		exit;

	}//end if



	//$descity = Address::getCity($_POST['descity']);











	if(
				
		!isset($_POST['desstate']) 
		|| 
		$_POST['desstate'] === ''
		
	)
	{

		Payment::setError(Rule::ERROR_STATE);
		header('Location: /dashboard/upgrade/checkout?plano='.$_POST['inplancode']);
		exit;

	}//end if



	if ( ( $desstate = Address::getState($_POST['desstate']) ) === false ) 
	{
		# code...
		Payment::setError(Rule::VALIDATE_STATE);
		header('Location: /dashboard/upgrade/checkout?plano='.$_POST['inplancode']);
		exit;

	}//end if




	//$desstate = Address::getState($_POST['desstate']);

















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
		Rule::DESCOUNTRYCODE,
		$hash

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


	


	/*if( (int)$user->getinplancontext() == 0 )
	{
		


		$dt_free = new DateTime("now + 10 day");

		$dt_free->setTimezone($timezone);

		

		$inplan = Plan::getPlanArray((int)$user->getinplan());



		$plan = new Plan();


		$plan->setData([

			'iduser'=>$user->getiduser(),
			'inplancode'=>$inplan['inplancode'],
			'inmigration'=>0,
			'inperiod'=>$inplan['inperiod'],
			'desplan'=>$inplan['desplan'],
			'vlprice'=>$inplan['vlprice'],
			'dtbegin'=>$dt_now->format('Y-m-d'),
			'dtend'=>$dt_free->format('Y-m-d')


		]);//end setData

		
		$plan->save();



		
		$user->setdtplanbegin($dt_now->format('Y-m-d'));
		$user->setdtplanend($dt_free->format('Y-m-d'));

	}//end if*/



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
	//$user->setToSession();


	if(isset($_SESSION['accountsValues'])) unset($_SESSION['accountsValues']);
	
	
	header("Location: /checkout/".$hash);
	exit;

	


});//END route






























































$app->get( "/checkout/:hash", function( $hash )
{
	
	
	

	$iduser = Validate::getHash($hash);


	if ( $iduser == '' )
	{
		# code...
		Payment::setError(Rule::VALIDATE_ID_HASH);
		header('Location: /checkout/'.$hash);
		exit;

	}//end if


	$user = new User();

	//$user->getFromHash($hash);


	$user->get((int)$iduser);





	if ((int)$user->getinplancontext() == 0 )
	{
		# code...
		User::setError(Rule::VALIDATE_PLAN_FREE);
		header('Location: /login');
		exit;
		
	}//end if
	


	/*


	$method = 'cartao-proprio';



	if ( isset($_GET['metodo']) )
	{
		# code...
		

		if ( Validate::validateCheckoutMethod($_GET['metodo']) ) 
		{
			# code...
			$method = $_GET['metodo'];

		}//end if
		else
		{

			Payment::setError("Método de pagamento inválido");

			header('Location: /checkout/'.$hash);
			exit;


		}//en else

	}//end if*/





	
	
	//$wirecard = new Wirecard();

	$inplan = Plan::getPlanArray( $user->getinplan() );


	

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
							header('Location: /checkout/'.$hash);
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
							header('Location: /checkout/'.$hash);
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

							header('Location: /checkout/'.$hash);
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
							header('Location: /checkout/'.$hash);
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

								//VOUCHER
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
								header('Location: /checkout/'.$hash);
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

								header('Location: /checkout/'.$hash);
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
								header('Location: /checkout/'.$hash);
								exit;


							}//end elseif

						}//end if
						else
						{

							Payment::setError(Rule::CHECK_COUPON_IS_APPLIED);
							header('Location: /checkout/'.$hash);
							exit;

						}//end else


					}//end else


				}//end if
				else
				{

					
				
					Payment::setError("Este cupom expirou em ".$dtexpire->format('d/m/y'));
					header('Location: /checkout/'.$hash);
					exit;




				}//end else
				

			}//end if
			else
			{

				
		
				Payment::setError(Rule::VALIDATE_COUPON_EXISTS);
				header('Location: /checkout/'.$hash);
				exit;



			}//end else




		}//end if
		else
		{


			Payment::setError("O código não pode estar vazio e deve ter ".Rule::COUPON_LENGTH." digitos entre letras maiúsculas e números | Por favor, tente novamente");
			header('Location: /checkout/'.$hash);
			exit;





		}//end else



	}//end if
	

	
	

	
	
	
	$page = new Page();

	$page->setTpl(
		
		"checkout", 
		
		[
			'user'=>$user->getValues(),
			'hash'=>$hash,
			'oldVlprice'=>$oldVlprice,
			'inplan'=>$inplan,
			'coupon'=>$coupon,
			'action'=>$action,
			'invoucher'=>$invoucher,
			'error'=>Payment::getError(),
			'siteCheckoutValues'=> (isset($_SESSION["siteCheckoutValues"])) ? $_SESSION["siteCheckoutValues"] : ['desholderdocument'=>'', 'nrholderddd'=>'', 'nrholderphone'=>'', 'dtholderbirth'=>'', 'zipcode'=>'', 'desholderaddress'=>'', 'desholdernumber'=>'', 'desholdercomplement'=>'', 'desholderdistrict'=>'', 'desholderstate'=>'', 'desholdercity'=>'']
			
		]
	
	);//end setTpl

});//END route










































































$app->post( "/checkout/:hash", function( $hash )
{

	$_SESSION['siteCheckoutValues'] = $_POST;




	if ( 


		isset($_POST['checkout-own-card']) 
		||
		isset($_POST['checkout-boleto'])
		||
		isset($_POST['checkout-voucher'])

	) 
	{
		# code...
		$_SESSION['siteCheckoutValues']['dtholderbirth'] = '';
		$_SESSION['siteCheckoutValues']['desholderaddress'] = '';
		$_SESSION['siteCheckoutValues']['desholderdocument'] = '';
		$_SESSION['siteCheckoutValues']['desholdernumber'] = '';
		$_SESSION['siteCheckoutValues']['desholdercomplement'] = '';
		$_SESSION['siteCheckoutValues']['desholderdistrict'] = '';
		$_SESSION['siteCheckoutValues']['desholderstate'] = '';
		$_SESSION['siteCheckoutValues']['desholdercity'] = '';
		$_SESSION['siteCheckoutValues']['nrholderddd'] = '';
		$_SESSION['siteCheckoutValues']['nrholderphone'] = '';
		$_SESSION['siteCheckoutValues']['zipcode'] = '';
	

	}//end if
	

	/*echo '<pre>';
var_dump($_POST);
var_dump($_SESSION);
exit;
*/


	


	$iduser = Validate::getHash($hash);


	if ( $iduser == '' )
	{
		# code...
		Payment::setError(Rule::VALIDATE_ID_HASH);
		header('Location: /checkout/'.$hash);
		exit;

	}//end if
	
	$user = new User();

	$user->get((int)$iduser);




	if ((int)$user->getinplancontext() == 0 )
	{
		# code...
		User::setError(Rule::VALIDATE_PLAN_FREE);
		header('Location: /login');
		exit;
		
	}//end if


	


	$timezone = new DateTimeZone('America/Sao_Paulo');

	$dtnow = new DateTime('now');

	$dtnow->setTimezone($timezone);
	


	/*echo '<pre>';
	var_dump($_POST);
	var_dump($method);
	exit;*/


	

	$inplan = Plan::getPlanArray($user->getinplan());


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
							header('Location: /checkout/'.$hash);
							exit;

						}//end if


						$couponIsApplied = Coupon::checkAndApplyCoupon(

							(int)$user->getiduser(),
							(int)$couponExists['idcoupon']

						);//end checkAndApplyCoupon


						if ( (int)$couponIsApplied['instatus'] == 0 ) 
						{





							
							//$oldVlprice = $inplan['vlprice'];

							$inplan['vlprice'] *= $couponExists['vlpercentage'];

							$inplan['vlprice'] = number_format($inplan['vlprice'],2);

							//$action = 'desaplicar';

						}//end if
						elseif( (int)$couponIsApplied['instatus'] == 1 )
						{

							
							Payment::setError("Olá, ".$user->getdesperson().", sentimos muito, mas você já aplicou este cupom em: ".formatDate($couponIsApplied['dtregister']));
							header('Location: /checkout/'.$hash);
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



								//VOUCHER
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
								header('Location: /checkout/'.$hash);
								exit;
								

							}//end elseif
							
						}//end if
						else
						{

							Payment::setError(Rule::CHECK_COUPON_IS_APPLIED);
							header('Location: /checkout/'.$hash);
							exit;

						}//end else


					}//end else


				}//end if
				else
				{

					
				
					Payment::setError("Este cupom expirou em ".$dtexpire->format('d/m/y'));
					header('Location: /checkout/'.$hash);
					exit;




				}//end else
				

			}//end if
			else
			{

				
		
				Payment::setError(Rule::VALIDATE_COUPON_EXISTS);
				header('Location: /checkout/'.$hash);
				exit;



			}//end else




		}//end if
		else
		{


			Payment::setError("O código não pode estar vazio e deve ter ".Rule::COUPON_LENGTH." digitos entre letras maiúsculas e números | Por favor, tente novamente");
			header('Location: /checkout/'.$hash);
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
			$_POST['desholderdocument'] == ''
			
		)
		{

			if ( $coupon == '')
			{
				# code...
				
				Payment::setError(Rule::ERROR_CPF);
				header('Location: /checkout/'.$hash);
				exit;


			}//end if
			else
			{


			
				Payment::setError(Rule::ERROR_CPF);
				header('Location: /checkout/'.$hash.'?cupom='.$coupon.'&acao=aplicar');
				exit;


			}//end else




		}//end if







		if( !$desholderdocument = Validate::validateDocument(0, $_POST['desholderdocument']) )
		{

	
			if ( $coupon == '')
			{
				# code...
				
				Payment::setError(Rule::VALIDATE_CPF);
				header('Location: /checkout/'.$hash);
				exit;


			}//end if
			else
			{


			
				Payment::setError(Rule::VALIDATE_CPF);
				header('Location: /checkout/'.$hash.'?cupom='.$coupon.'&acao=aplicar');
				exit;


			}//end else


		}//end if
		











		if(
			
			!isset($_POST['nrholderddd']) 
			|| 
			$_POST['nrholderddd'] == ''
			
		)
		{

			
			

			if ( $coupon == '')
			{
				# code...
				
				Payment::setError(Rule::ERROR_DDD);
				header('Location: /checkout/'.$hash);
				exit;


			}//end if
			else
			{


			
				Payment::setError(Rule::ERROR_DDD);
				header('Location: /checkout/'.$hash.'?cupom='.$coupon.'&acao=aplicar');
				exit;


			}//end else

		}//end if










		if( !$nrholderddd = Validate::validateDDD($_POST['nrholderddd']) )
		{

			
		
			if ( $coupon == '')
			{
				# code...
				
				Payment::setError(Rule::VALIDATE_DDD);
				header('Location: /checkout/'.$hash);
				exit;


			}//end if
			else
			{


			
				Payment::setError(Rule::VALIDATE_DDD);
				header('Location: /checkout/'.$hash.'?cupom='.$coupon.'&acao=aplicar');
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
				header('Location: /checkout/'.$hash);
				exit;


			}//end if
			else
			{


			
				Payment::setError(Rule::ERROR_PHONE);
				header('Location: /checkout/'.$hash.'?cupom='.$coupon.'&acao=aplicar');
				exit;


			}//end else

		}//end if













		if( !$nrholderphone = Validate::validatePhone($_POST['nrholderphone']) )
		{

			
	

			if ( $coupon == '')
			{
				# code...
				
				Payment::setError(Rule::VALIDATE_PHONE);
				header('Location: /checkout/'.$hash);
				exit;


			}//end if
			else
			{


			
				Payment::setError(Rule::VALIDATE_PHONE);
				header('Location: /checkout/'.$hash.'?cupom='.$coupon.'&acao=aplicar');
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
				header('Location: /checkout/'.$hash);
				exit;


			}//end if
			else
			{


			
				Payment::setError(Rule::ERROR_DATE_BIRTH);
				header('Location: /checkout/'.$hash.'?cupom='.$coupon.'&acao=aplicar');
				exit;


			}//end else

		}//end if




















		if( !$dtholderbirth = Validate::validateDate($_POST['dtholderbirth'], 0) )
		{

			
		
			if ( $coupon == '')
			{
				# code...
				
				Payment::setError(Rule::VALIDATE_DATE_PAST_TO_NOW);
				header('Location: /checkout/'.$hash);
				exit;


			}//end if
			else
			{


			
				Payment::setError(Rule::VALIDATE_DATE_PAST_TO_NOW);
				header('Location: /checkout/'.$hash.'?cupom='.$coupon.'&acao=aplicar');
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
				header('Location: /checkout/'.$hash);
				exit;


			}//end if
			else
			{


			
				Payment::setError(Rule::ERROR_ZIPCODE);
				header('Location: /checkout/'.$hash.'?cupom='.$coupon.'&acao=aplicar');
				exit;


			}//end else
			
		}//end if



















		if( !$desholderzipcode = Validate::validateCEP($_POST['zipcode']) )
		{


			if ( $coupon == '')
			{
				# code...
				
				Payment::setError(Rule::VALIDATE_ZIPCODE);
				header('Location: /checkout/'.$hash);
				exit;


			}//end if
			else
			{


			
				Payment::setError(Rule::VALIDATE_ZIPCODE);
				header('Location: /checkout/'.$hash.'?cupom='.$coupon.'&acao=aplicar');
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
				header('Location: /checkout/'.$hash);
				exit;


			}//end if
			else
			{


			
				Payment::setError(Rule::ERROR_ADDRESS);
				header('Location: /checkout/'.$hash.'?cupom='.$coupon.'&acao=aplicar');
				exit;


			}//end else

		}//end if









		if( !$desholderaddress = Validate::validateStringNumber($_POST['desholderaddress']) )
		{

			if ( $coupon == '')
			{
				# code...
				
				Payment::setError(Rule::VALIDATE_ADDRESS);
				header('Location: /checkout/'.$hash);
				exit;


			}//end if
			else
			{


			
				Payment::setError(Rule::VALIDATE_ADDRESS);
				header('Location: /checkout/'.$hash.'?cupom='.$coupon.'&acao=aplicar');
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
				header('Location: /checkout/'.$hash);
				exit;


			}//end if
			else
			{


			
				Payment::setError(Rule::ERROR_NUMBER);
				header('Location: /checkout/'.$hash.'?cupom='.$coupon.'&acao=aplicar');
				exit;


			}//end else

		}//end if














		if( !$desholdernumber = Validate::validateNumber($_POST['desholdernumber']) )
		{

			if ( $coupon == '')
			{
				# code...
				
				Payment::setError(Rule::VALIDATE_NUMBER);
				header('Location: /checkout/'.$hash);
				exit;


			}//end if
			else
			{


			
				Payment::setError(Rule::VALIDATE_NUMBER);
				header('Location: /checkout/'.$hash.'?cupom='.$coupon.'&acao=aplicar');
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
				header('Location: /checkout/'.$hash);
				exit;


			}//end if
			else
			{


			
				Payment::setError(Rule::ERROR_DISTRICT);
				header('Location: /checkout/'.$hash.'?cupom='.$coupon.'&acao=aplicar');
				exit;


			}//end else

		}//end if


















		if( !$desholderdistrict = Validate::validateStringNumber($_POST['desholderdistrict']) )
		{

			if ( $coupon == '')
			{
				# code...
				
				Payment::setError(Rule::VALIDATE_DISTRICT);
				header('Location: /checkout/'.$hash);
				exit;


			}//end if
			else
			{


			
				Payment::setError(Rule::VALIDATE_DISTRICT);
				header('Location: /checkout/'.$hash.'?cupom='.$coupon.'&acao=aplicar');
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
				header('Location: /checkout/'.$hash);
				exit;


			}//end if
			else
			{


			
				Payment::setError(Rule::ERROR_CARD_NUMBER);
				header('Location: /checkout/'.$hash.'?cupom='.$coupon.'&acao=aplicar');
				exit;


			}//end else

		}//end if














		if( !$descardcode_number = Validate::validateCardNumber($_POST['descardcode_number']) )
		{

			
			if ( $coupon == '')
			{
				# code...
				
				Payment::setError(Rule::VALIDATE_CARD_NUMBER);
				header('Location: /checkout/'.$hash);
				exit;


			}//end if
			else
			{


			
				Payment::setError(Rule::VALIDATE_CARD_NUMBER);
				header('Location: /checkout/'.$hash.'?cupom='.$coupon.'&acao=aplicar');
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
				header('Location: /checkout/'.$hash);
				exit;


			}//end if
			else
			{


			
				Payment::setError(Rule::ERROR_HOLDER_NAME);
				header('Location: /checkout/'.$hash.'?cupom='.$coupon.'&acao=aplicar');
				exit;


			}//end else

		}//end if












		if( !$desholdername = Validate::validateCardName($_POST['desholdername']) )
		{


			if ( $coupon == '')
			{
				# code...
				
				Payment::setError(Rule::VALIDATE_HOLDER_NAME);
				header('Location: /checkout/'.$hash);
				exit;


			}//end if
			else
			{


			
				Payment::setError(Rule::VALIDATE_HOLDER_NAME);
				header('Location: /checkout/'.$hash.'?cupom='.$coupon.'&acao=aplicar');
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
				header('Location: /checkout/'.$hash);
				exit;


			}//end if
			else
			{


			
				Payment::setError(Rule::ERROR_CARD_MONTH);
				header('Location: /checkout/'.$hash.'?cupom='.$coupon.'&acao=aplicar');
				exit;


			}//end else


		}//end if
















		if( !$descardcode_month = Validate::validateMonth($_POST['descardcode_month']) )
		{


			if ( $coupon == '')
			{
				# code...
				
				Payment::setError(Rule::VALIDATE_CARD_MONTH);
				header('Location: /checkout/'.$hash);
				exit;


			}//end if
			else
			{


			
				Payment::setError(Rule::VALIDATE_CARD_MONTH);
				header('Location: /checkout/'.$hash.'?cupom='.$coupon.'&acao=aplicar');
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
				header('Location: /checkout/'.$hash);
				exit;


			}//end if
			else
			{


			
				Payment::setError(Rule::ERROR_CARD_YEAR);
				header('Location: /checkout/'.$hash.'?cupom='.$coupon.'&acao=aplicar');
				exit;


			}//end else

		}//end if











		if( !$descardcode_year = Validate::validateYear($_POST['descardcode_year']) )
		{


			if ( $coupon == '')
			{
				# code...
				
				Payment::setError(Rule::VALIDATE_CARD_YEAR);
				header('Location: /checkout/'.$hash);
				exit;


			}//end if
			else
			{


			
				Payment::setError(Rule::VALIDATE_CARD_YEAR);
				header('Location: /checkout/'.$hash.'?cupom='.$coupon.'&acao=aplicar');
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
				header('Location: /checkout/'.$hash);
				exit;


			}//end if
			else
			{


			
				Payment::setError(Rule::ERROR_CARD_CVC);
				header('Location: /checkout/'.$hash.'?cupom='.$coupon.'&acao=aplicar');
				exit;


			}//end else


		}//end if












		if( !$descardcode_cvc = Validate::validateCvc($_POST['descardcode_cvc']) )
		{

			
			if ( $coupon == '')
			{
				# code...
				
				Payment::setError(Rule::VALIDATE_CARD_CVC);
				header('Location: /checkout/'.$hash);
				exit;


			}//end if
			else
			{


			
				Payment::setError(Rule::VALIDATE_CARD_CVC);
				header('Location: /checkout/'.$hash.'?cupom='.$coupon.'&acao=aplicar');
				exit;


			}//end else

		}//end if









		/*
		if(
				
			!isset($_POST['desholdercity']) 
			|| 
			$_POST['desholdercity'] === ''
			
		)
		{

			Payment::setError(Rule::ERROR_CITY);
			header('Location: /checkout/'.$hash.'?cupom='.$coupon.'&acao=aplicar');
			exit;

		}//end if

		$cityArray = Address::getCity($_POST['desholdercity']);
		$desholdercity = $cityArray['descity'];*/







		if(
				
			!isset($_POST['desholdercity']) 
			|| 
			$_POST['desholdercity'] === ''
			
		)
		{

			Payment::setError(Rule::ERROR_CITY);
			header('Location: /checkout/'.$hash.'?cupom='.$coupon.'&acao=aplicar');
			exit;

		}//end if



		if ( ( $cityArray = Address::getCity($_POST['desholdercity']) ) === false ) 
		{
			# code...
			Payment::setError(Rule::VALIDATE_CITY);
			header('Location: /checkout/'.$hash.'?cupom='.$coupon.'&acao=aplicar');
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
			header('Location: /checkout/'.$hash.'?cupom='.$coupon.'&acao=aplicar');
			exit;

		}//end if



		if ( ( $stateArray = Address::getState($_POST['desholderstate']) ) === false ) 
		{
			# code...
			Payment::setError(Rule::VALIDATE_STATE);
			header('Location: /checkout/'.$hash.'?cupom='.$coupon.'&acao=aplicar');
			exit;

		}//end if


		
		$desholderstate = $stateArray['desstatecode'];









		//$stateArray = Address::getState($_POST['desholderstate']);
		//$desholderstate = $stateArray['desstatecode'];

		










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
				header('Location: /checkout/'.$hash);
				exit;


			}//end if
			else
			{


			
				Payment::setError(Rule::ERROR_CARD_NUMBER);
				header('Location: /checkout/'.$hash.'?cupom='.$coupon.'&acao=aplicar');
				exit;


			}//end else

		}//end if




		if( !$descardcode_number = Validate::validateCardNumber($_POST['descardcode_number']) )
		{


			if ( $coupon == '')
			{
				# code...
				
				Payment::setError(Rule::VALIDATE_CARD_NUMBER);
				header('Location: /checkout/'.$hash);
				exit;


			}//end if
			else
			{


			
				Payment::setError(Rule::VALIDATE_CARD_NUMBER);
				header('Location: /checkout/'.$hash.'?cupom='.$coupon.'&acao=aplicar');
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
				header('Location: /checkout/'.$hash);
				exit;


			}//end if
			else
			{


			
				Payment::setError(Rule::ERROR_HOLDER_NAME);
				header('Location: /checkout/'.$hash.'?cupom='.$coupon.'&acao=aplicar');
				exit;


			}//end else

		}//end if

		if( !$desholdername = Validate::validateCardName($_POST['desholdername']) )
		{


			if ( $coupon == '')
			{
				# code...
				
				Payment::setError(Rule::VALIDATE_HOLDER_NAME);
				header('Location: /checkout/'.$hash);
				exit;


			}//end if
			else
			{


			
				Payment::setError(Rule::VALIDATE_HOLDER_NAME);
				header('Location: /checkout/'.$hash.'?cupom='.$coupon.'&acao=aplicar');
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
				header('Location: /checkout/'.$hash);
				exit;


			}//end if
			else
			{


			
				Payment::setError(Rule::ERROR_CARD_MONTH);
				header('Location: /checkout/'.$hash.'?cupom='.$coupon.'&acao=aplicar');
				exit;


			}//end else

		}//end if

		if( !$descardcode_month = Validate::validateMonth($_POST['descardcode_month']) )
		{

			
			if ( $coupon == '')
			{
				# code...
				
				Payment::setError(Rule::VALIDATE_CARD_MONTH);
				header('Location: /checkout/'.$hash);
				exit;


			}//end if
			else
			{


			
				Payment::setError(Rule::VALIDATE_CARD_MONTH);
				header('Location: /checkout/'.$hash.'?cupom='.$coupon.'&acao=aplicar');
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
				header('Location: /checkout/'.$hash);
				exit;


			}//end if
			else
			{


			
				Payment::setError(Rule::ERROR_CARD_YEAR);
				header('Location: /checkout/'.$hash.'?cupom='.$coupon.'&acao=aplicar');
				exit;


			}//end else

		}//end if






		if( !$descardcode_year = Validate::validateYear($_POST['descardcode_year']) )
		{

			
			if ( $coupon == '')
			{
				# code...
				
				Payment::setError(Rule::VALIDATE_CARD_YEAR);
				header('Location: /checkout/'.$hash);
				exit;


			}//end if
			else
			{


			
				Payment::setError(Rule::VALIDATE_CARD_YEAR);
				header('Location: /checkout/'.$hash.'?cupom='.$coupon.'&acao=aplicar');
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
				header('Location: /checkout/'.$hash);
				exit;


			}//end if
			else
			{


			
				Payment::setError(Rule::ERROR_CARD_CVC);
				header('Location: /checkout/'.$hash.'?cupom='.$coupon.'&acao=aplicar');
				exit;


			}//end else

		}//end if

		if( !$descardcode_cvc = Validate::validateCvc($_POST['descardcode_cvc']) )
		{

			if ( $coupon == '')
			{
				# code...
				
				Payment::setError(Rule::VALIDATE_CARD_CVC);
				header('Location: /checkout/'.$hash);
				exit;


			}//end if
			else
			{


			
				Payment::setError(Rule::VALIDATE_CARD_CVC);
				header('Location: /checkout/'.$hash.'?cupom='.$coupon.'&acao=aplicar');
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


	}//end else
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
		header('Location: /checkout/'.$hash);
		exit;

	}//end else


	



	
	$cart = new Cart();

	$data = [

		'dessessionid'=>session_id(),
		'iduser'=>$user->getiduser(),
		'incartstatus'=>0

	];//end $data


	$cart->setData($data);

	$cart->update();

	


		


	//$account = new Account();

	//$account->get((int)$user->getiduser());

	


	if ( (int)$invoucher == 0 )
	{
		# code...
		$wirecard = new Wirecard();

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
				$descardcode_cvc,
				$hash

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


		]);



		$customer->save();
		
	}//end try 
	catch ( \Exception $e) 
	{

		
		

		if ( $coupon == '')
		{
			# code...
			
			Payment::setError(Rule::GENERAL_ERROR);
			header('Location: /checkout/'.$hash);
			exit;


		}//end if
		else
		{


			Payment::setError(Rule::GENERAL_ERROR);
			header('Location: /checkout/'.$hash.'?cupom='.$coupon.'&acao=aplicar');
			exit;


		}//end else
		



	}//end catch










	//$timezone = new DateTimeZone('America/Sao_Paulo');



	//$dtbegin = new DateTime('now');

	//$dtbegin->setTimezone($timezone);



	//$dtbegin = new DateTime(date('Y-m-d'));

	//$today = date('Y-m-d');

	


	//$dtend->format('Y-m-d');

	//$dtbegin->format('Y-m-d');

	$plan = new Plan();

	//$plan->getRegularPlan((int)$user->getiduser());



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
			$descardcode_cvc,
			$hash


		);//end payPlan

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
			'inpaymentmethod'=>$payment->getinpaymentmethod(),
			'nrinstallment'=>$payment->getnrinstallment(),
			'inpaymentstatus'=>$wirecardPaymentData['inpaymentstatus'],
			'incharge'=>0,
			'inrefunded'=>0,
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
			header('Location: /checkout/'.$hash);
			exit;


		}//end if
		else
		{


			Payment::setError(Rule::GENERAL_ERROR);
			header('Location: /checkout/'.$hash.'?cupom='.$coupon.'&acao=aplicar');
			exit;


		}//end else


		
	}//catch

			
		
	







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

		# code...
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

	

	




	if ( (int)$invoucher == 1 )
	{

		$inplancontext = substr($plan->getinplancode(), 0, 1);

		$user->setinplan((int)$plan->getinplancode());
		$user->setinplancontext((int)$inplancontext);


		//$user->setToSession();

	}//end if
	else
	{

		$user->setinplancontext(1);
		
	}//end else




	//$user->setinstatus('1');
	//$user->setdtplanbegin($dtnow->format('Y-m-d'));
	//$user->setdtplanend($dtend->format('Y-m-d'));

	//$user->update();

	$user->setToSession();
	$user->update();


	if(isset($_SESSION['siteCheckoutValues'])) unset($_SESSION['siteCheckoutValues']);





	


	/*echo '<pre>';
	var_dump('1<br>');
	var_dump($user->getValues());
	var_dump($plan->getValues());
	exit;*/

	//$consort = new Consort();

	//$consort->get((int)$user->getiduser());



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
				"consort"=>['desconsort'=>'','desconsortemail'=>'']

			),

			$user->getdeslogin(),

			$user->getdesnick()

		
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
				"consort"=>['desconsort'=>'','desconsortemail'=>'']

			),

			$user->getdeslogin(),

			$user->getdesnick()

		
		);//end Mailer


	}//end else


		
	$userMailer->send();



	



	//User::loginAfterPlanPurchase($user->getdeslogin(), $user->getdespassword());

	header("Location: /dashboard");
	exit;
	
	







});//END route











?>