<?php

use Core\Maintenance;
use Core\PageDashboard;
use Core\Rule;
use Core\Validate;
use Core\Photo;
use Core\Model\User;
//use Core\Model\Wedding;
use Core\Model\CustomStyle;
//use Core\Model\Plan;









$app->get( "/dashboard/personalizar-site/resetar", function()
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

	

	

	$customstyle = new CustomStyle();

	$customstyle->get((int)$user->getiduser());


	



	$template = CustomStyle::getTemplateStyle( $customstyle->getidtemplate() );


	


	$customstyle->setData([

	
		'idcustomstyle'=>$customstyle->getidcustomstyle(),
		'iduser'=>$user->getiduser(),
		'idtemplate'=>$customstyle->getidtemplate(),
		'desbanner'=>$customstyle->getdesbanner(),
		'desbannerextension'=>$customstyle->getdesbannerextension(),

		'desbgcolorbanner'=>$template['desbgcolorbanner'],
		'desbgcolorfooter'=>$template['desbgcolorfooter'],
		'descolorfooter'=>$template['descolorfooter'],
		'descolorfooterhover'=>$template['descolorfooterhover'],

		'descolor1'=>$template['descolor1'],
		'descolor2'=>$template['descolor2'],
		'descolortexthover'=>$template['descolortexthover'],
		'descolordate'=>$template['descolordate'],
		'desfontfamilydate'=>$template['desfontfamilydate'],
		'desfontfamily1'=>$template['desfontfamily1'],
		'desfontfamily2'=>$template['desfontfamily2'],

		'inbgcolorgradient'=>$template['inbgcolorgradient'],
		'inbgcolorbutton'=>$template['inbgcolorbutton'],
		'inroundborderimage'=>$template['inroundborderimage'],
		'inbordersocial'=>$template['inbordersocial'],
		'desborderimagesize'=>$template['desborderimagesize'],
		'desborderradiusbutton'=>$template['desborderradiusbutton']

	]);//end setData



	
	$customstyle->update();





	CustomStyle::setSuccess('Configurações padrão restauradas');
	header("Location: /dashboard/personalizar-site");
	exit;

});//END route
































$app->post( "/dashboard/personalizar-site", function()
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
	
	
	
	if( 
		
		!isset($_POST['desbgcolorbanner']) 
		|| 
		$_POST['desbgcolorbanner'] === ''
	)
	{

		CustomStyle::setError("Informe a cor do texto do Header");
		header('Location: /dashboard/personalizar-site');
		exit;
		
	}//end if

	if( !$desbgcolorbanner = Validate::validateHexa($_POST['desbgcolorbanner']) )
	{

		CustomStyle::setError("A cor de fundo do Cabeçalho não pode ser formada apenas com caracteres especiais, tente novamente");
		header('Location: /dashboard/personalizar-site');
		exit;
	}




















	if( 
		
		!isset($_POST['desbgcolorfooter']) 
		|| 
		$_POST['desbgcolorfooter'] === ''
	)
	{

		CustomStyle::setError("Informe a cor do texto do Header");
		header('Location: /dashboard/personalizar-site');
		exit;
		
	}//end if

	if( !$desbgcolorfooter = Validate::validateHexa($_POST['desbgcolorfooter']) )
	{

		CustomStyle::setError("A cor de fundo do Rodapé não pode ser formada apenas com caracteres especiais, tente novamente");
		header('Location: /dashboard/personalizar-site');
		exit;
	}






















	if( 
		
		!isset($_POST['descolorfooter']) 
		|| 
		$_POST['descolorfooter'] === ''
	)
	{

		CustomStyle::setError("Informe a cor do texto do Header");
		header('Location: /dashboard/personalizar-site');
		exit;
		
	}//end if

	if( !$descolorfooter = Validate::validateHexa($_POST['descolorfooter']) )
	{

		CustomStyle::setError("A cor da fonte do Rodapé não pode ser formada apenas com caracteres especiais, tente novamente");
		header('Location: /dashboard/personalizar-site');
		exit;
	}




















	if( 
		
		!isset($_POST['descolorfooterhover']) 
		|| 
		$_POST['descolorfooterhover'] === ''
	)
	{

		CustomStyle::setError("Informe a cor do texto do Header");
		header('Location: /dashboard/personalizar-site');
		exit;
		
	}//end if

	if( !$descolorfooterhover = Validate::validateHexa($_POST['descolorfooterhover']) )
	{

		CustomStyle::setError("A cor da fonte do Rodapé quando o mouse passa por cima não pode ser formada apenas com caracteres especiais, tente novamente");
		header('Location: /dashboard/personalizar-site');
		exit;
	}


























	
	if( 
		
		!isset($_POST['descolor1']) 
		|| 
		$_POST['descolor1'] === ''
	)
	{

		CustomStyle::setError("Informe a cor do H1");
		header('Location: /dashboard/personalizar-site');
		exit;
		
	}//end if

	if( !$descolor1 = Validate::validateHexa($_POST['descolor1']) )
	{

		CustomStyle::setError("A cor do nome do casal não pode ser formada apenas com caracteres especiais, tente novamente");
		header('Location: /dashboard/personalizar-site');
		exit;
	}



















	if( 
		
		!isset($_POST['descolor2']) 
		|| 
		$_POST['descolor2'] === ''
	)
	{

		CustomStyle::setError("Informe a cor do H1");
		header('Location: /dashboard/personalizar-site');
		exit;
		
	}//end if

	if( !$descolor2 = Validate::validateHexa($_POST['descolor2']) )
	{

		CustomStyle::setError("A cor principal não pode ser formada apenas com caracteres especiais, tente novamente");
		header('Location: /dashboard/personalizar-site');
		exit;
	}















	if( 
		
		!isset($_POST['descolortexthover']) 
		|| 
		$_POST['descolortexthover'] === ''
	)
	{

		CustomStyle::setError("Informe a cor do H1");
		header('Location: /dashboard/personalizar-site');
		exit;
		
	}//end if

	if( !$descolortexthover = Validate::validateHexa($_POST['descolortexthover']) )
	{

		CustomStyle::setError("A cor dos links quando o mouse passa por cima não pode ser formada apenas com caracteres especiais, tente novamente");
		header('Location: /dashboard/personalizar-site');
		exit;
	}








	if( 
		
		!isset($_POST['descolordate']) 
		|| 
		$_POST['descolordate'] === ''
	)
	{

		CustomStyle::setError("Informe a cor do H1");
		header('Location: /dashboard/personalizar-site');
		exit;
		
	}//end if

	if( !$descolordate = Validate::validateHexa($_POST['descolordate']) )
	{

		CustomStyle::setError("A cor da contagem regressiva não pode ser formada apenas com caracteres especiais, tente novamente");
		header('Location: /dashboard/personalizar-site');
		exit;
	}










	
	if( 
		
		!isset($_POST['desfontfamily1']) 
		|| 
		$_POST['desfontfamily1'] === ''
	)
	{

		CustomStyle::setError("Informe o tipo de fonte do H1");
		header('Location: /dashboard/personalizar-site');
		exit;
		
	}//end if


	if( !$desfontfamily1 = Validate::validateFontFamily($_POST['desfontfamily1']) )
	{

		CustomStyle::setError("A fonte principal não pode ser formado apenas com caracteres especiais, tente novamente");
		header('Location: /dashboard/personalizar-site');
		exit;
	}




	




	












	if( 
		
		!isset($_POST['desfontfamily2']) 
		|| 
		$_POST['desfontfamily2'] === ''
	)
	{

		CustomStyle::setError("Informe o tipo de fonte do H2");
		header('Location: /dashboard/personalizar-site');
		exit;
		
	}//end if

	if( !$desfontfamily2 = Validate::validateFontFamily($_POST['desfontfamily2']) )
	{

		CustomStyle::setError("A fonte do texto comum não pode ser formado apenas com caracteres especiais, tente novamente");
		header('Location: /dashboard/personalizar-site');
		exit;
	}









	
	if( 
		
		!isset($_POST['desfontfamilydate']) 
		|| 
		$_POST['desfontfamilydate'] === ''
	)
	{

		CustomStyle::setError("Informe o tipo de fonte do H3");
		header('Location: /dashboard/personalizar-site');
		exit;
		
	}//end if

	if( !$desfontfamilydate = Validate::validateFontFamily($_POST['desfontfamilydate']) )
	{

		CustomStyle::setError("A fonte da contagem regressiva não pode ser formado apenas com caracteres especiais, tente novamente");
		header('Location: /dashboard/personalizar-site');
		exit;
	}








	











	if(
		
		!isset($_POST['inbgcolorgradient']) 
		|| 
		$_POST['inbgcolorgradient'] === ''
		
	)
	{

		CustomStyle::setError("Informe se deseja o arredondamento das imagens da Cerimônia e da Festa de Casamento");
		header('Location: /dashboard/personalizar-site');
		exit;

	}//end if


	if( ($inbgcolorgradient = Validate::validateBoolean($_POST['inbgcolorgradient'])) === false )
	{	
		
		CustomStyle::setError("O status do efeito esfumaçado deve conter apenas 0 ou 1 e não pode ser formado apenas com caracteres especiais, tente novamente");
		header('Location: /dashboard/personalizar-site');
		exit;

	}//end if
















	if(
		
		!isset($_POST['inbgcolorbutton']) 
		|| 
		$_POST['inbgcolorbutton'] === ''
		
	)
	{

		CustomStyle::setError("Informe se deseja o arredondamento das imagens da Cerimônia e da Festa de Casamento");
		header('Location: /dashboard/personalizar-site');
		exit;

	}//end if


	if( ($inbgcolorbutton = Validate::validateBoolean($_POST['inbgcolorbutton'])) === false )
	{	
		
		CustomStyle::setError("O status botão clar ou escuro deve conter apenas 0 ou 1 e não pode ser formado apenas com caracteres especiais, tente novamente");
		header('Location: /dashboard/personalizar-site');
		exit;

	}//end if













	if(
		
		!isset($_POST['inroundborderimage']) 
		|| 
		$_POST['inroundborderimage'] === ''
		
	)
	{

		CustomStyle::setError("Informe se deseja o arredondamento das imagens da Cerimônia e da Festa de Casamento");
		header('Location: /dashboard/personalizar-site');
		exit;

	}//end if


	if( ($inroundborderimage = Validate::validateBoolean($_POST['inroundborderimage'])) === false )
	{	
		
		CustomStyle::setError("O status de botões arredondados para carimônia e festa deve conter apenas 0 ou 1 e não pode ser formado apenas com caracteres especiais, tente novamente");
		header('Location: /dashboard/personalizar-site');
		exit;

	}//end if
















	if(
		
		!isset($_POST['inbordersocial']) 
		|| 
		$_POST['inbordersocial'] === ''
		
	)
	{

		CustomStyle::setError("Informe se deseja o arredondamento das imagens da Cerimônia e da Festa de Casamento");
		header('Location: /dashboard/personalizar-site');
		exit;

	}//end if


	if( ($inbordersocial = Validate::validateBoolean($_POST['inbordersocial'])) === false )
	{	
		
		CustomStyle::setError("O status bordas arredondadas para redes sociais deve conter apenas 0 ou 1 e não pode ser formado apenas com caracteres especiais, tente novamente");
		header('Location: /dashboard/personalizar-site');
		exit;

	}//end if











	if( 
		
		!isset($_POST['desborderimagesize']) 
		|| 
		$_POST['desborderimagesize'] === ''
	)
	{

		CustomStyle::setError("Informe a espessura da borda das imagens arredondadas");
		header('Location: /dashboard/personalizar-site');
		exit;
		
	}//end if

	

	if( !$desborderimagesize = Validate::validateBorderSize($_POST['desborderimagesize']) )
	{

		CustomStyle::setError("A espessura da borda das imagens arredondadas não pode ser formada apenas com caracteres especiais, e precisa estar entre 1 e 10 | Por favor, tente novamente");
		header('Location: /dashboard/personalizar-site');
		exit;
	}



















	if( 
		
		!isset($_POST['desborderradiusbutton']) 
		|| 
		$_POST['desborderradiusbutton'] === ''
	)
	{

		CustomStyle::setError("Informe o arredondamento dos botões");
		header('Location: /dashboard/personalizar-site');
		exit;
		
	}//end if

	if( !$desborderradiusbutton = Validate::validateBorderRadius($_POST['desborderradiusbutton']) )
	{

		CustomStyle::setError("O tamanho do arredondamento dos botões não pode ser formado apenas com caracteres especiais, tente novamente");
		header('Location: /dashboard/personalizar-site');
		exit;
	}




















	if( $_FILES["file"]["error"] === '' )
	{
		CustomStyle::setError("Falha no envio da imagem, tente novamente | Se a falha persistir, tente enviar outra imagem ou entre em contato com o suporte");
		header('Location: /dashboard/personalizar-site/');
		exit;

	}//end if

	if( $_FILES["file"]["size"] > Rule::MAX_PHOTO_UPLOAD_SIZE )
	{

		CustomStyle::setError("Só é possível fazer upload de arquivos de até ".(Rule::MAX_PHOTO_UPLOAD_SIZE/1000000)."MB");
		header('Location: /dashboard/personalizar-site/');
		exit;

	}//end if







	/*echo '<pre>';
                
                var_dump($_POST['idtemplate']);
                var_dump($_POST['idcustomstyle']);
                var_dump($desbgcolorbanner);
                var_dump($desbgcolorfooter);
                var_dump($descolorfooter);
                var_dump($descolorfooterhover);
                var_dump($descolor1);
                var_dump($descolor2);
                var_dump($descolor3);
                var_dump($descolor3hover);
                var_dump($descolordate);
                var_dump($desfontfamilydate);
                var_dump($desfontfamily1);
                var_dump($desfontfamily2);
                var_dump($inbgradialbanner);
                var_dump($inbgradialfooter);
                var_dump($insolidbgcolorbutton);
                var_dump($inroundborderimage);
                var_dump($desborderimagesize);
                var_dump($desborderradiusbutton);
                exit;
				*/

			



			






	$customstyle = new CustomStyle();

	$customstyle->get((int)$user->getiduser());




	$customstyle->setData([

		'idcustomstyle'=>$customstyle->getidcustomstyle(),
		'iduser'=>$user->getiduser(),
		'idtemplate'=>$customstyle->getidtemplate(),
		'desbanner'=>$customstyle->getdesbanner(),
		'desbannerextension'=>$customstyle->getdesbannerextension(),

		'desbgcolorbanner'=>$desbgcolorbanner,
		'desbgcolorfooter'=>$desbgcolorfooter,
		'descolorfooter'=>$descolorfooter,
		'descolorfooterhover'=>$descolorfooterhover,

		'descolor1'=>$descolor1,
		'descolor2'=>$descolor2,
		'descolortexthover'=>$descolortexthover,
		'descolordate'=>$descolordate,
		'desfontfamilydate'=>$desfontfamilydate,
		'desfontfamily1'=>$desfontfamily1,
		'desfontfamily2'=>$desfontfamily2,

		'inbgcolorgradient'=>$inbgcolorgradient,
		'inbgcolorbutton'=>$inbgcolorbutton,
		'inroundborderimage'=>$inroundborderimage,
		'inbordersocial'=>$inbordersocial,
		'desborderimagesize'=>$desborderimagesize,
		'desborderradiusbutton'=>$desborderradiusbutton

	]);//end setData




	

	$customstyle->update();





	if( $_FILES["file"]["name"] != "" )
	{

		$photo = new Photo();

		if( $customstyle->getdesbanner() != Rule::DEFAULT_PHOTO )
		{

			$photo->deletePhoto($customstyle->getdesbanner(), Rule::CODE_CUSTOMSTYLE);

		}//end if

		$basename = $photo->setPhoto(
			
			$_FILES["file"], 
			$user->getiduser(),
			Rule::CODE_CUSTOMSTYLE,
			$customstyle->getidcustomstyle(),
			0
			
		);//end setPhoto


		if( $basename['basename'] === false )
		{
			CustomStyle::setError("Falha no envio da imagem, tente novamente | Se a falha persistir, tente enviar outra imagem ou entre em contato com o suporte");
			header('Location: /dashboard/personalizar-site');
			exit;

		}//end if
		else
		{
			
	
			$customstyle->setdesbanner($basename['basename']);
			$customstyle->setdesbannerextension($basename['extension']);
	
			$customstyle->update();

		}//end else

	}//end if




	CustomStyle::setSuccess("Dados alterados");

	header('Location: /dashboard/personalizar-site');
	exit;

});//END route











































$app->get( "/dashboard/personalizar-site", function()
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


	

	$customstyle = new CustomStyle();

	$customstyle->get((int)$user->getiduser());




	




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

	}//end else
	*/




	$page = new PageDashboard();

	$page->setTpl(
		


		"customstyle", 
		
		[
			'user'=>$user->getValues(),
			'customstyle'=>$customstyle->getValues(),
			'validate'=>$validate,
			'success'=>CustomStyle::getSuccess(),
			'error'=>CustomStyle::getError()
			

		]
	
	);//end setTpl

});//END route
























?>