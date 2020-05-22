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







$app->get( '/baixar-ebook/obrigado/:hash', function( $hash )
{
	
	$idlead = base64_decode($hash);

	if( $idlead == '' )
	{

		Lead::setError(Rule::VALIDATE_ID_HASH);
		header('Location: /baixar-ebook');
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



















$app->get( '/baixar-ebook', function()
{
	

	$page = new PageLead();

	$page->setTpl(

		"index",


		[

			'error'=>Lead::getError(),
			'registerLead'=>(isset($_SESSION['registerLead'])) ? $_SESSION['registerLead'] : ['desemail'=>'']

		]
	
	);//end setTpl

});//END route












$app->post( '/baixar-ebook', function()
{
	

	
	$_SESSION['registerLead'] = $_POST;





	if(
		
		!isset($_POST['desemail']) 
		|| 
		$_POST['desemail'] == ''
	)
	{

		Lead::setError(Rule::ERROR_EMAIL);
		header("Location: /baixar-ebook");
		exit;

	}//end if

	if( ($desemail = Validate::validateEmail($_POST['desemail'])) === false )
	{	
		
		Lead::setError(Rule::VALIDATE_EMAIL);
		header("Location: /baixar-ebook");
		exit;

	}//end if










	if ( $_SERVER['HTTP_HOST'] != Rule::CANONICAL_NAME )
	{
		# code...

		if( Lead::checkLeadExists($desemail) === true )
		{

			Lead::setError(Rule::CHECK_LEAD_EXISTS);
			header("Location: /baixar-ebook");
			exit;

		}//end if

		
	}//end if







	$despassword = CodeFactory::generate([

		'length'=>Rule::LEAD_PASSWORD_LENGTH

	]);//end generate






	$lead = new Lead();


	$lead->setData([


		'instatus'=>1,
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


	if(isset($_SESSION['registerLead'])) unset($_SESSION['registerLead']);





	


	/*
	echo '<pre>';
	var_dump($lead->getValues());
	exit;
	*/

	



	/*

	if ( (int)$lead->getidlead() > 0 )
	{

		$lead->setoriginalpassword(base64_decode($lead->getoriginalpassword()));

		# code...
		$leadMailer = new Mailer(
												
			Rule::EMAIL_LEAD,

			"lead", 
			
			array(

				"lead"=>$lead->getValues(),

			),

			$lead->getdesemail()
		
		);//end Mailer




		$leadMailer->send();


		

	}//end if*/


	


	$hash = base64_encode($lead->getidlead());

	header("Location: /baixar-ebook/obrigado/".$hash);
	exit;
	



});//END route














$app->get( '/news', function()
{
	





	if( 
		
		!isset($_GET['name']) 
		|| 
		$_GET['name'] == ''
	)
	{

		//Mailing::setError("Preencha o seu nome");
		//header("Location: /");
		//exit;

		echo 'Preencha o seu nome';
		return false;


	}//end if


	
	if( !$desname = Validate::validateString($_GET['name']) )
	{

		//Mailing::setError("O seu nome não pode ser formado apenas com caracteres especiais, tente novamente");
		//header("Location: /");
		//exit;

		echo 'O seu nome não pode ser formado apenas com caracteres especiais, tente novamente';
		return false;

	}//end if


	


	if(
		
		!isset($_GET['email']) 
		|| 
		$_GET['email'] == ''
	)
	{

		//Mailing::setError("Preencha o seu e-mail");
		//header("Location: /");
		//exit;


		echo 'Preencha o seu e-mail';
		return false;


	}//end if

	if( ($desemail = Validate::validateEmail($_GET['email'])) === false )
	{	
		
		//Mailing::setError("O e-mail parece estar num formato inválido, tente novamente");
		//header("Location: /");
		//exit;


		echo 'O e-mail parece estar num formato inválido, tente novamente';
		return false;


	}//end if


	if ( Mailing::checkMailing($desemail) ) 
	{
		# code...
		echo 'Este email já foi enviado uma vez';
		return false;

	}//end if



	$mailing = new Mailing();


	$mailing->setData([

		'desname'=>$desname,
		'desemail'=>$desemail,
		'desip'=>$_SERVER['REMOTE_ADDR']

	]);//end setData


	$mailing->save();



	if ( $mailing->getidmailing() > 0 )
	{
		# code...
		$mailer = new Mailer(
									 
			"Amar Casar - Obrigado por enviar seu e-mail!",

			"mailing-success", 
			
			array(

				"mailing"=>$mailing->getValues()

			),

			$desemail,

			$desname
		
		);//end Mailer
		
		$mailer->send();

		/*Mailing::setSuccess('Obrigado por enviar seu e-mail!');
		header("Location: /");
		exit;*/

		echo 'Obrigado por enviar seu e-mail!';
		return true;

	}//end if
	else
	{

		/*Mailing::setError('Não foi possível cadastrar o seu e-mail, possivelmente devido à lentidão na internet | Por favor, tente novamente');
		header("Location: /");
		exit;*/

		echo 'Não foi possível cadastrar o seu e-mail, possivelmente devido à lentidão na internet | Por favor, tente novamentee';
		return false;

	}//end else

	

});//END route












?>