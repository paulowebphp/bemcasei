<?php 

use \Core\Page;
use \Core\PageLead;
use \Core\Validate;
use \Core\Mailer;
use \Core\Rule;
use \Core\CodeFactory;
use \Core\Model\Lead;
//use \Core\Wirecard;
//use \Core\Model\Category;
//use \Core\Model\Cart;
//use \Core\Model\Address;
//use \Core\Model\User;
//use \Core\Model\Order;
//use \Core\Model\OrderStatus;









$app->get( "/painel/login/:desemail", function( $desemail )
{

	$desemail = Validate::getHash($desemail);

	$lead = new Lead();

	$lead->getLeadByEmail($desemail);


	

	if( 

		isset($_SESSION[Lead::SESSION])
		&&
		$_SESSION[Lead::SESSION] !== null
		&&
		$lead->getdesemail() !== ''
		&&
		(int)$_SESSION[Lead::SESSION]['idlead'] > 0
		&&
		(int)$_SESSION[Lead::SESSION]['idlead'] === (int)$lead->getidlead()

	) 
	{

		header('Location: /painel');
		exit;	

	}//end if
	else
	{



		$_SESSION[Lead::SESSION] = NULL;
		$_SESSION['loginLead1Values'] = ["desemail"=>$lead->getdesemail(),"despassword"=>((int)$lead->getinpasswordchange() == 0)? $lead->getdesoriginalpassword() : ''];

		header('Location: /painel/login');
		exit;	
		

	}//end else




	

});//END route
































$app->post( "/painel/login", function()
{
	

	try
	{

		Lead::login($_POST['desemail'], $_POST['despassword']);

	}//end try
	catch( Exception $e )
	{

		Lead::setError($e->getMessage());

	}//end catch

	header("Location: /painel");
	exit;


});//END route





















$app->get( "/painel/login", function()
{

	
	/*
	echo '<pre>';
	var_dump($_POST);
	var_dump($_SESSION);
	exit;
	*/

	if( 

		isset($_SESSION[Lead::SESSION])
		&&
		$_SESSION[Lead::SESSION] !== null
		&&
		(int)$_SESSION[Lead::SESSION]['idlead'] > 0

	) 
	{

		header('Location: /painel');
		exit;	

	}//end if
	else
	{

		
		//User::verifyLogin(false);

		//$user = new User();

		//$user->setData($_SESSION[User::SESSION]);

		

		$page = new PageLead();

		$page->setTpl(
			
			"login", 
			
			[

				'error'=>Lead::getError(),
				'errorLoginLead1'=>(isset($_SESSION['loginLead1Values'])) ? $_SESSION['loginLead1Values'] : ['desemail'=>'','despassword'=>'']


			]
		
		);//end setTpl

	}//end else




	

});//END route


















































$app->get( "/painel/logout", function()
{

	Lead::logout();

	header("Location: /painel/login");
	exit;

});//END route







































$app->get( '/7-passos-seguros-e-eficientes/obrigado', function()
{
	
	


	$page = new PageLead();

	$page->setTpl(

		"thank-you"
	
	);//end setTpl




});//END route




















/*

$app->get( '/7-passos-seguros-e-eficientes/obrigado/:hash', function( $hash )
{
	
	$idlead = base64_decode($hash);

	if( $idlead == '' )
	{

		Lead::setError(Rule::VALIDATE_ID_HASH);
		header('Location: /7-passos-seguros-e-eficientes');
		exit;

	}//end if




	$lead = new Lead();

	$lead->getLead((int)$idlead);




	$page = new PageLead();

	$page->setTpl(

		"thank-you",


		[

			'lead'=>$lead->getValues(),
			'success'=>Lead::getSuccess(),
			'error'=>Lead::getError(),
			'registerLead'=>(isset($_SESSION['registerLead'])) ? $_SESSION['registerLead'] : ['desemail'=>'']

		]
	
	);//end setTpl

});//END route

*/





























$app->post( '/7-passos-seguros-e-eficientes', function()
{
	

	
	$_SESSION['registerLead1'] = $_POST;





	if(
		
		!isset($_POST['desemail']) 
		|| 
		$_POST['desemail'] == ''
	)
	{

		Lead::setError(Rule::ERROR_EMAIL);
		header("Location: /7-passos-seguros-e-eficientes");
		exit;

	}//end if

	if( ($desemail = Validate::validateEmail($_POST['desemail'])) === false )
	{	
		
		Lead::setError(Rule::VALIDATE_EMAIL);
		header("Location: /7-passos-seguros-e-eficientes");
		exit;

	}//end if









	if ( $_SERVER['HTTP_HOST'] != Rule::CANONICAL_NAME )
	{
		# code...

		if( Lead::checkLeadExists($desemail) === true )
		{

			Lead::setError(Rule::CHECK_LEAD_EXISTS);
			header("Location: /7-passos-seguros-e-eficientes");
			exit;

		}//end if

		
	}//end if










	$despassword = CodeFactory::generate([

		'length'=>Rule::LEAD_PASSWORD_LENGTH

	]);//end generate










	$lead = new Lead();


	$lead->setData([


		'instatus'=>1,
		'inlead'=>1,
		'inpasswordchange'=>0,
		'desname'=>null,
		'desemail'=>$desemail,
		'despassword'=>$despassword,
		'desoriginalpassword'=>$despassword,
		'nrddd'=>null,
		'nrphone'=>null,
		'desip'=>$_SERVER['REMOTE_ADDR']


	]);












	//$user->setToSession();
	$lead->update();




	/*

	echo '<pre>';
	var_dump($desemail);
	var_dump($_POST);
	var_dump($_SESSION);
	var_dump('---------------------------');
	var_dump(Lead::checkLeadExists($desemail) === true);
	var_dump($_SERVER['HTTP_HOST'] != Rule::CANONICAL_NAME);
	var_dump('---------------------------');
	var_dump($despassword);
	var_dump('---------------------------');
	var_dump('---------------------------');
	var_dump('---------------22------------');
	var_dump($lead);
	exit;

	*/


	if(isset($_SESSION['registerLead1'])) unset($_SESSION['registerLead1']);





	


	/*
	echo '<pre>';
	var_dump($lead->getValues());
	exit;
	*/

	



	

	if ( (int)$lead->getidlead() > 0 )
	{

		//$lead->setoriginalpassword(base64_decode($lead->getoriginalpassword()));

		# code...
		$leadMailer = new Mailer(
												
			Rule::EMAIL_LEAD,

			"lead1", 
			
			array(

				"lead"=>$lead->getValues(),
				"desemail"=>Validate::setHash($lead->getdesemail())

			),

			$lead->getdesemail(),

			$lead->getdesemail()
		
		);//end Mailer




		$leadMailer->send();


		

	}//end if


	


	//$hash = base64_encode($lead->getidlead());

	//header("Location: /7-passos-seguros-e-eficientes/obrigado/".$hash);
	header("Location: /7-passos-seguros-e-eficientes/obrigado");
	exit;
	



});//END route




















$app->get( '/7-passos-seguros-e-eficientes', function()
{
	

	$page = new PageLead();

	$page->setTpl(

		"index",


		[

			'error'=>Lead::getError(),
			'registerLead1'=>(isset($_SESSION['registerLead1'])) ? $_SESSION['registerLead1'] : ['desemail'=>'']

		]
	
	);//end setTpl

});//END route





















?>