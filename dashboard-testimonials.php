<?php

use Core\Maintenance;
use Core\Rule;
use Core\PageDashboard;
use Core\Validate;
use Core\Model\User;
//use Core\Model\Address;
//use Core\Model\Plan;
use Core\Model\Testimonial;








$app->get( "/dashboard/testemunho", function()
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




	if ( ( $validate = User::validatePlanDashboard( $user ) ) === false )
	{
		# code...
		User::setError(Rule::VALIDATE_PLAN);
		header('Location: /dashboard');
		exit;

	}//end if



	if ( (int)$user->getincheckout() == 0 && (int)$user->getinplancontext() != 0 )
	{
		# code...
		User::setError(Rule::VALIDATE_PLAN);
		header('Location: /dashboard');
		exit;

	}//end if



	$testimonial = new Testimonial();


	$testimonial->get((int)$user->getiduser());




	


	$page = new PageDashboard();

	$page->setTpl(
		
		"testimonial", 
		
		[
			'testimonial'=>$testimonial->getValues(),
			'user'=>$user->getValues(),
			'validate'=>$validate,
			'success'=>Testimonial::getSuccess(),
			'error'=>Testimonial::getError()

		]
	
	);//end setTpl

});//END route


























$app->post( "/dashboard/testemunho", function()
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







	if ( ( $validate = User::validatePlanDashboard( $user ) ) === false )
	{
		# code...
		User::setError(Rule::VALIDATE_PLAN);
		header('Location: /dashboard');
		exit;

	}//end if


	if ( (int)$user->getincheckout() == 0 && (int)$user->getinplancontext() != 0 )
	{
		# code...
		User::setError(Rule::VALIDATE_PLAN);
		header('Location: /dashboard');
		exit;

	}//end if




	if(
		
		!isset($_POST['instatus']) 
		|| 
		$_POST['instatus'] === ''
		
	)
	{

		Testimonial::setError("Preencha o status do testemunho");
		header('Location: /dashboard/testemunho');
		exit;

	}//end if



	if( ($instatus = Validate::validateBoolean($_POST['instatus'])) === false )
	{	
		
		Testimonial::setError("O status deve conter apenas 0 ou 1 e não pode ser formado apenas com caracteres especiais, tente novamente");
		header('Location: /dashboard/testemunho');
		exit;

	}//end if








	if(
		
		!isset($_POST['inrating']) 
		|| 
		$_POST['inrating'] === ''
		
	)
	{

		Testimonial::setError("Preencha a avaliação do testemunho");
		header('Location: /dashboard/testemunho');
		exit;

	}//end if







	if( ($inrating = Validate::validateRatingToTen($_POST['inrating'])) === false )
	{	
		
		Testimonial::setError("a avaliação deve conter apenas 0 ou 1 e não pode ser formado apenas com caracteres especiais, tente novamente");
		header('Location: /dashboard/testemunho');
		exit;

	}//end if






	$desdescription = Validate::validateDescription($_POST['desdescription'], true);



	


	$testimonial = new Testimonial();


	$testimonial->get((int)$user->getiduser());


	$testimonial->setData([


		'idtestimonial'=>$testimonial->getidtestimonial(),
		'iduser'=>$user->getiduser(),
		'instatus'=>$instatus,
		'insample'=>Rule::TESTIMONIAL_INSAMPLE,
		'inrating'=>$inrating,
		'desdescription'=>$desdescription


	]);//end setData


	


	$testimonial->update();


	

	Testimonial::setSuccess("Dados alterados");

	header('Location: /dashboard/testemunho');
	exit;

});//END route










?>