<?php 

use \Core\PageAdmin;
use \Core\Rule;
use \Core\Validate;
use \Core\Model\User;
use \Core\Model\Coupon;







 



$app->get( "/481738admin/cupons/adicionar", function() 
{
	
	User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl(

		"coupons-create",


		[


			'success'=>Coupon::getSuccess(),
			'error'=>Coupon::getError()


		]



	);//end setTpl

});//END route



















$app->post( "/481738admin/cupons/adicionar", function() 
{

	User::verifyLogin();

	$user = new User();


	







	if(
		
		!isset($_POST['desdescription']) 
		|| 
		$_POST['desdescription'] === ''
		
	)
	{

		Coupon::setError("Preencha a descrição do Cupom");
		header('Location: /481738admin/cupons/adicionar');
		exit;

	}//end if

	if( ($desdescription = Validate::validateDescription($_POST['desdescription'])) === false )
	{	
		

		Coupon::setError("A descrição não pode ser formada apenas com caracteres especiais, tente novamente");
		header('Location: /481738admin/cupons/adicionar');
		exit;

	}//end if












	if(
			
		!isset($_POST['vlpercentage']) 
		|| 
		$_POST['vlpercentage'] === ''
		
	)
	{

		Coupon::setError("Preencha o Valor Percentual");
		header('Location: /481738admin/cupons/adicionar');
		exit;

	}//end if

	if( !$vlpercentage = Validate::validatePercentage($_POST['vlpercentage']) )
	{	
		
		Coupon::setError("O valor percentual pode ser formada apenas com caracteres especiais, e deve estar entre 1 e 90 | Por favor, tente novamente");
		header('Location: /481738admin/cupons/adicionar');
		exit;

	}//end if




























	if(
			
		!isset($_POST['inusage']) 
		|| 
		$_POST['inusage'] === ''
		
	)
	{

		Coupon::setError("Preencha quantas vezes o cupom pode ser aplicado");
		header('Location: /481738admin/cupons/adicionar');
		exit;

	}//end if

	if( ($inusage = Validate::validateBoolean($_POST['inusage'])) === false )
	{	
		
		Coupon::setError("A quantidade de vezes que o cupom pode ser aplicado não pode ser formada apenas com caracteres especiais e deve ser 0 ou 1 | Por favor, tente novamente");
		header('Location: /481738admin/cupons/adicionar');
		exit;

	}//end if





















	if(
			
		!isset($_POST['dtexpire']) 
		|| 
		$_POST['dtexpire'] === ''
		
	)
	{

		Coupon::setError("Preencha em quantos dias o cupom irá expirar");
		header('Location: /481738admin/cupons/adicionar');
		exit;

	}//end if

	if( !$date_handler = Validate::validateDate( $_POST['dtexpire'],1  ) )
	{	
		
		Coupon::setError("A quantidade de dias em que o cupom irá expirar não pode ser formada apenas com caracteres especiais e deve ser um valor entre 1 e 180 | Por favor, tente novamente");
		header('Location: /481738admin/cupons/adicionar');
		exit;

	}//end if











	do 
	{
		# code...
		$descouponcode = Coupon::generate([

			'length'=>Rule::COUPON_LENGTH

		]);//end generate

	}//end do

	while ( Coupon::checkCouponExists($descouponcode) );



	



	




	//$timezone = new DateTimeZone('America/Sao_Paulo');

	//$dtexpire = new DateTime("now + ".$nrdays." day");

	$dtexpire = new DateTime($date_handler);

	//$dtexpire->setTimezone($timezone);

	

	


	$coupon = new Coupon();

	$coupon->setData([

		'inusage'=>$inusage,
		'descouponcode'=>$descouponcode,
		'desdescription'=>$desdescription,
		'vlpercentage'=>number_format((1-$vlpercentage),2),
		'vlinverse'=>$vlpercentage,
		'dtexpire'=>$dtexpire->format('Y-m-d')


	]);//end setData


	$coupon->update();
	

	

	Coupon::setSuccess("Cupom Criado");
	header("Location: /481738admin/cupons");
	exit;

});//END route














$app->get( "/481738admin/cupons/:idcoupon/deletar", function( $idcoupon ) 
{
	User::verifyLogin();

	$coupon = new Coupon();

	$coupon->getCoupon((int)$idcoupon);

	$coupon->delete();

	header("Location: /481738admin/cupons");
	exit;

});//END route






















$app->get( "/481738admin/cupons", function() 
{
	User::verifyLogin();



	

	$coupon = Coupon::listAll();


	$page = new PageAdmin();

	$page->setTpl( 
		
		"coupons",

		[

			'coupon'=>$coupon,
			'search'=>'',
			'pages'=>'',
			'success'=>Coupon::getSuccess(),
			'error'=>Coupon::getError()

		]
	
	);//end setTpl

});//END route
























 ?>