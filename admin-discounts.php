<?php 

use \Core\PageAdmin;
use \Core\Rule;
use \Core\Validate;
use \Core\Model\User;
use \Core\Model\Discount;











 



$app->get( "/481738admin/descontos/adicionar", function() 
{
	
	User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl(

		"discounts-create",


		[


			'success'=>Discount::getSuccess(),
			'error'=>Discount::getError()


		]



	);//end setTpl

});//END route



















$app->post( "/481738admin/descontos/adicionar", function() 
{

	User::verifyLogin();

	$user = new User();


	








	if(
			
		!isset($_POST['inscope']) 
		|| 
		$_POST['inscope'] === ''
		
	)
	{

		Discount::setError("Preencha o contexto");
		header('Location: /481738admin/descontos/adicionar');
		exit;

	}//end if

	if( ($inscope = Validate::validateBoolean($_POST['inscope'])) === false )
	{	
		
		Discount::setError("O contexto não pode ser formada apenas com caracteres especiais, e deve ser 1 ou 0 | Por favor, tente novamente");
		header('Location: /481738admin/descontos/adicionar');
		exit;

	}//end if







	if(
			
		!isset($_POST['instatus']) 
		|| 
		$_POST['instatus'] === ''
		
	)
	{

		Discount::setError("Preencha o status");
		header('Location: /481738admin/descontos/adicionar');
		exit;

	}//end if

	if( ($instatus = Validate::validateBoolean($_POST['instatus'])) === false )
	{	
		
		Discount::setError("O status não pode ser formada apenas com caracteres especiais, e deve ser 1 ou 0 | Por favor, tente novamente");
		header('Location: /481738admin/descontos/adicionar');
		exit;

	}//end if








	if(
			
		!isset($_POST['intype']) 
		|| 
		$_POST['intype'] === ''
		
	)
	{

		Discount::setError("Preencha o tipo de desconto");
		header('Location: /481738admin/descontos/adicionar');
		exit;

	}//end if

	if( ($intype = Validate::validateBoolean($_POST['intype'])) === false )
	{	
		
		Discount::setError("O tipo de desconto não pode ser formada apenas com caracteres especiais, e deve ser 1 ou 0 | Por favor, tente novamente");
		header('Location: /481738admin/descontos/adicionar');
		exit;

	}//end if










	if(
			
		!isset($_POST['vlpercentage']) 
		|| 
		$_POST['vlpercentage'] === ''
		
	)
	{

		Discount::setError("Preencha o Valor Percentual");
		header('Location: /481738admin/descontos/adicionar');
		exit;

	}//end if

	if( !$vlpercentage = Validate::validatePercentage($_POST['vlpercentage']) )
	{	
		
		Discount::setError("O valor percentual pode ser formada apenas com caracteres especiais, e deve estar entre 1 e 90 | Por favor, tente novamente");
		header('Location: /481738admin/descontos/adicionar');
		exit;

	}//end if
















if(
			
		!isset($_POST['vlfixed']) 
		|| 
		$_POST['vlfixed'] === ''
		
	)
	{

		Discount::setError("Preencha o Valor Fixo");
		header('Location: /481738admin/descontos/adicionar');
		exit;

	}//end if

	if( !$vlfixed = Validate::validateNumber($_POST['vlfixed']) )
	{	
		
		Discount::setError("O valor fixo não pode ser formada apenas com caracteres especiais, e deve estar entre 1 e 100000000000 | Por favor, tente novamente");
		header('Location: /481738admin/descontos/adicionar');
		exit;

	}//end if



















	if(
			
		!isset($_POST['dtexpire']) 
		|| 
		$_POST['dtexpire'] === ''
		
	)
	{

		Discount::setError("Preencha em quantos dias o Desconto irá expirar");
		header('Location: /481738admin/descontos/adicionar');
		exit;

	}//end if

	if( !$nrdays = Validate::validateDtexpire($_POST['dtexpire']) )
	{	
		
		Discount::setError("A quantidade de dias em que o Desconto irá expirar não pode ser formada apenas com caracteres especiais e deve ser um valor entre 1 e 180 | Por favor, tente novamente");
		header('Location: /481738admin/descontos/adicionar');
		exit;

	}//end if




	/*echo "<pre>";
	var_dump($inscope);
	var_dump($instatus);
	var_dump($intype);
	var_dump($vlpercentage);
	var_dump($vlfixed);
	var_dump($nrdays);
	exit;*/




	




	$timezone = new DateTimeZone('America/Sao_Paulo');

	$dtexpire = new DateTime("now + ".$nrdays." day");

	$dtexpire->setTimezone($timezone);

	

	


	$discount = new Discount();

	$discount->setData([

		'inscope'=>$inscope,
		'instatus'=>$instatus,
		'intype'=>$intype,
		'vlpercentage'=>number_format((1-$vlpercentage),2),
		'vlinverse'=>$vlpercentage,
		'vlfixed'=>$vlfixed,
		'dtexpire'=>$dtexpire->format('Y-m-d')


	]);//end setData'


	$discount->update();
	

	

	Discount::setSuccess("Desconto Criado");
	header("Location: /481738admin/descontos");
	exit;

});//END route














$app->get( "/481738admin/descontos/:iddiscount/deletar", function( $iddiscount ) 
{
	User::verifyLogin();

	$discount = new Discount();

	$discount->getDiscount((int)$iddiscount);

	$discount->delete();

	header("Location: /481738admin/descontos");
	exit;

});//END route















































$app->get( "/481738admin/descontos/:iddiscount", function( $iddiscount ) 
{
	User::verifyLogin();

	$discount = new Discount();

	$discount->getDiscount((int)$iddiscount);

	$page = new PageAdmin();

	$page->setTpl(
		
		"discounts-update", 
		
		[

			'discount'=>$discount->getValues(),
			'success'=>Discount::getSuccess(),
			'error'=>Discount::getError()

		]
	
	);//end setTpl

});//END route








$app->post( "/481738admin/descontos/:iddiscount", function( $iddiscount ) 
{
	User::verifyLogin();

	$discount = new Discount();


	$discount->getDiscount((int)$iddiscount);






	if(
			
		!isset($_POST['inscope']) 
		|| 
		$_POST['inscope'] === ''
		
	)
	{

		Discount::setError("Preencha o contexto");
		header('Location: /481738admin/descontos/'.$iddiscount);
		exit;

	}//end if

	if( ($inscope = Validate::validateBoolean($_POST['inscope'])) === false )
	{	
		
		Discount::setError("O contexto não pode ser formada apenas com caracteres especiais, e deve ser 1 ou 0 | Por favor, tente novamente");
		header('Location: /481738admin/descontos/'.$iddiscount);
		exit;

	}//end if







	if(
			
		!isset($_POST['instatus']) 
		|| 
		$_POST['instatus'] === ''
		
	)
	{

		Discount::setError("Preencha o status");
		header('Location: /481738admin/descontos/'.$iddiscount);
		exit;

	}//end if

	if( ($instatus = Validate::validateBoolean($_POST['instatus'])) === false )
	{	
		
		Discount::setError("O status não pode ser formada apenas com caracteres especiais, e deve ser 1 ou 0 | Por favor, tente novamente");
		header('Location: /481738admin/descontos/'.$iddiscount);
		exit;

	}//end if








	if(
			
		!isset($_POST['intype']) 
		|| 
		$_POST['intype'] === ''
		
	)
	{

		Discount::setError("Preencha o tipo de desconto");
		header('Location: /481738admin/descontos/'.$iddiscount);
		exit;

	}//end if

	if( ($intype = Validate::validateBoolean($_POST['intype'])) === false )
	{	
		
		Discount::setError("O tipo de desconto não pode ser formada apenas com caracteres especiais, e deve ser 1 ou 0 | Por favor, tente novamente");
		header('Location: /481738admin/descontos/'.$iddiscount);
		exit;

	}//end if










	if(
			
		!isset($_POST['vlpercentage']) 
		|| 
		$_POST['vlpercentage'] === ''
		
	)
	{

		Discount::setError("Preencha o Valor Percentual");
		header('Location: /481738admin/descontos/'.$iddiscount);
		exit;

	}//end if

	if( !$vlpercentage = Validate::validatePercentage($_POST['vlpercentage']) )
	{	
		
		Discount::setError("O valor percentual pode ser formada apenas com caracteres especiais, e deve estar entre 1 e 90 | Por favor, tente novamente");
		header('Location: /481738admin/descontos/'.$iddiscount);
		exit;

	}//end if
















if(
			
		!isset($_POST['vlfixed']) 
		|| 
		$_POST['vlfixed'] === ''
		
	)
	{

		Discount::setError("Preencha o Valor Fixo");
		header('Location: /481738admin/descontos/'.$iddiscount);
		exit;

	}//end if

	if( !$vlfixed = Validate::validateCurrency($_POST['vlfixed']) )
	{	
		
		Discount::setError("O valor fixo não pode ser formada apenas com caracteres especiais, e deve estar entre 1 e 100000000000 | Por favor, tente novamente");
		header('Location: /481738admin/descontos/'.$iddiscount);
		exit;

	}//end if



















	if(
			
		!isset($_POST['dtexpire']) 
		|| 
		$_POST['dtexpire'] === ''
		
	)
	{

		Discount::setError("Preencha em quantos dias o Desconto irá expirar");
		header('Location: /481738admin/descontos/'.$iddiscount);
		exit;

	}//end if

	if( !$nrdays = Validate::validateDtexpire($_POST['dtexpire']) )
	{	
		
		Discount::setError("A quantidade de dias em que o Desconto irá expirar não pode ser formada apenas com caracteres especiais e deve ser um valor entre 1 e 180 | Por favor, tente novamente");
		header('Location: /481738admin/descontos/'.$iddiscount);
		exit;

	}//end if






	$timezone = new DateTimeZone('America/Sao_Paulo');

	$dtexpire = new DateTime("now + ".$nrdays." day");

	$dtexpire->setTimezone($timezone);

	

	


	//$discount = new Discount();

	$discount->setData([

		'iddiscount'=>$discount->getiddiscount(),
		'inscope'=>$inscope,
		'instatus'=>$instatus,
		'intype'=>$intype,
		'vlpercentage'=>number_format((1-$vlpercentage),2),
		'vlinverse'=>$vlpercentage,
		'vlfixed'=>$vlfixed,
		'dtexpire'=>$dtexpire->format('Y-m-d')


	]);//end setData'


	$discount->update();
	

	

	Discount::setSuccess("Desconto Modificado");
	header("Location: /481738admin/descontos");
	exit;




});//END route



































$app->get( "/481738admin/descontos", function() 
{
	User::verifyLogin();



		

	$discount = Discount::listAll();


	$page = new PageAdmin();

	$page->setTpl( 
		
		"discounts",

		[

			'discount'=>$discount,
			'search'=>'',
			'pages'=>'',
			'success'=>Discount::getSuccess(),
			'error'=>Discount::getError()

		]
	
	);//end setTpl

});//END route
























 ?>