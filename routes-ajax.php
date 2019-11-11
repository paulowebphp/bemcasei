<?php

use \Core\Model\Address;
use \Core\Model\Coupon;





$app->get( "/address/state", function()
{

	
	
	
	if( !isset($_GET['idstate']) )
	{

		header('Location: /');
		exit;			

	}//end if


	Address::getCitiesJson($_GET['idstate']);

	

});//END route

















$app->get( "/coupon/validate", function()
{

	
	
	
	if( isset($_GET['descupomcode']) )
	{

		Coupon::getCouponJson($_GET['descupomcode']);	

	}//end if


	

	

});//END route










?>