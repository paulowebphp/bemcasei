<?php 

use \Core\PageAdmin;
use \Core\Rule;
use \Core\Validate;
use \Core\Model\User;
use \Core\Maintenance;







 



$app->get( "/481738admin/manutencao/adicionar", function() 
{
	
	User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl(

		"maintenance-create",


		[


			'success'=>Maintenance::getSuccess(),
			'error'=>Maintenance::getError()


		]



	);//end setTpl

});//END route



















$app->post( "/481738admin/manutencao/adicionar", function() 
{

	User::verifyLogin();

	$user = new User();







	
	if(
			
		!isset($_POST['instatus']) 
		|| 
		$_POST['instatus'] === ''
		
	)
	{

		Maintenance::setError("Preencha o status da manutenção");
		header('Location: /481738admin/manutencao/adicionar');
		exit;

	}//end if

	if( ($instatus = Validate::validateBoolean($_POST['instatus'])) === false )
	{	
		
		Maintenance::setError("O status não pode ser formada apenas com caracteres especiais e deve ser 0 ou 1 | Por favor, tente novamente");
		header('Location: /481738admin/manutencao/adicionar');
		exit;

	}//end if





	$desdescription = Validate::validateDescription($_POST['desdescription']);





	


	$maintenance = new Maintenance();

	$maintenance->setData([

		'instatus'=>$instatus,
		'desdescription'=>$desdescription

	]);//end setData


	$maintenance->update();
	

	

	Maintenance::setSuccess("Regra de manutenção criada");
	header("Location: /481738admin/manutencao");
	exit;

});//END route














$app->get( "/481738admin/manutencao/:idmanitenance/deletar", function( $idmanitenance ) 
{
	User::verifyLogin();

	$maintenance = new Maintenance();

	$maintenance->getMaintenance((int)$idmanitenance);

	$maintenance->delete();

	header("Location: /481738admin/manutencao");
	exit;

});//END route





































$app->get( "/481738admin/manutencao/:idmaintenance", function( $idmaintenance ) 
{
	User::verifyLogin();

	$maintenance = new Maintenance();

	$maintenance->getMaintenance((int)$idmaintenance);

	$page = new PageAdmin();

	$page->setTpl(
		
		"maintenance-update", 
		
		[

			'maintenance'=>$maintenance->getValues(),
			'success'=>Maintenance::getSuccess(),
			'error'=>Maintenance::getError()

		]
	
	);//end setTpl

});//END route





















$app->post( "/481738admin/manutencao/:idmaintenance", function( $idmaintenance ) 
{
	User::verifyLogin();

	$maintenance = new Maintenance();


	//$maintenance->getMaintenance((int)$idmaintenance);




if(
			
		!isset($_POST['instatus']) 
		|| 
		$_POST['instatus'] === ''
		
	)
	{

		Maintenance::setError("Preencha o status da manutenção");
		header('Location: /481738admin/manutencao/'.$_POST['idmaintenance']);
		exit;

	}//end if

	if( ($instatus = Validate::validateBoolean($_POST['instatus'])) === false )
	{	
		
		Maintenance::setError("O status não pode ser formada apenas com caracteres especiais e deve ser 0 ou 1 | Por favor, tente novamente");
		header('Location: /481738admin/manutencao/'.$_POST['idmaintenance']);
		exit;

	}//end if





	$desdescription = Validate::validateDescription($_POST['desdescription']);







	//$maintenance = new maintenance();

	$maintenance->setData([

		'idmaintenance'=>$_POST['idmaintenance'],
		'instatus'=>$instatus,
		'desdescription'=>$desdescription


	]);//end setData'


	$maintenance->update();
	

	

	Maintenance::setSuccess("Desconto Modificado");
	header("Location: /481738admin/manutencao");
	exit;




});//END route
























$app->get( "/481738admin/manutencao", function() 
{
	User::verifyLogin();



	

	$maintenance = Maintenance::listAll();


	$page = new PageAdmin();

	$page->setTpl( 
		
		"maintenance",

		[

			'maintenance'=>$maintenance,
			'search'=>'',
			'pages'=>'',
			'success'=>Maintenance::getSuccess(),
			'error'=>Maintenance::getError()

		]
	
	);//end setTpl

});//END route
























 ?>