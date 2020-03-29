<?php 

use \Core\Page;
use \Core\Validate;
use \Core\Mailer;
use \Core\Model\Mailing;
use \Core\Wirecard;
//use \Core\Model\Category;
//use \Core\Model\Cart;
//use \Core\Model\Address;
//use \Core\Model\User;
//use \Core\Model\Order;
//use \Core\Model\OrderStatus;






$app->get( '/', function()
{
	


	$page = new Page();


	$page->setTpl(
		
		"index"
	
	);//end setTpl

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








$app->get( '/base', function()
{
	

	Wirecard::wirecardTestBasic();

	/*echo '<img width="300px" src="/res/images/template/1.jpg"><br>';
	echo '<img width="300px" src="/res/images/template/2.jpg"><br>';
	echo '<img width="300px" src="/res/images/template/3.jpg"><br>';
	echo '<img width="300px" src="/res/images/template/4.jpg"><br>';
	echo '<img width="300px" src="/res/images/template/5.jpg"><br>';
	echo '<img width="300px" src="/res/images/template/6.jpg"><br>';
	echo '<img width="300px" src="/res/images/template/7.jpg"><br>';
	exit;*/


});//END route








?>