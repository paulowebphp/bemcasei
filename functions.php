<?php 

use \Core\Wirecard;
use \Core\Validate;
use \Core\Rule;
use \Core\Maintenance;
use \Core\PageConfig;
use \Core\Model\User;
use \Core\Model\Cart;
use \Core\Model\Bank;
use \Core\Model\Product;
use \Core\Model\ProductConfig;
use \Core\Model\Consort;
use \Core\Model\SocialMedia;
use \Core\Model\Wedding;
use \Core\Model\Template;
use \Core\Model\Plan;
use \Core\Model\PaymentStatus;
use \Core\Model\Menu;












function setHash( $value )
{

	return Validate::setHash($value);

}//END setHash



function getHash( $value )
{

	return Validate::getHash($value);
	

}//END setHash




/*function getAntecipationDate( $date )
{	
	$timezone = new DateTimeZone('America/Sao_Paulo');

	$dt_antecipation = new \DateTime('now + '.Rule::CARD_ANTECIPATION_PERIOD.' day');

	$dt_antecipation->setTimezone($timezone);

	

	return $dt_antecipation->format('d/m/y');

	
}//END getAntecipationDate*/







function formatTax( $value )
{

	
	return number_format(($value*100),2,',','.');


}//END getAntecipationValue



function getRule( $value )
{

	
	return Rule::getRule( (string)$value );


}//END getRule





function expirationDate($dtplanend)
{

	if ( $dtplanend === null )
	{
		# code...
		return false;


	}//end if
	else
	{


		$dt_now = new \DateTime('now');

		//$dt_now->setTimezone($timezone);

		$dt_plan_end = new \DateTime($dtplanend);

		//$dtplanend->setTimezone($timezone);

		


		if( $dt_plan_end > $dt_now )
		{

			return true;

		}//end if
		else
		{

			return false;

		}//end else


	}//end else

}//END expirationDate










function checkValidEvent( $dtevent, $dt_now )
{


	if ( $dtevent >= $dt_now )
	{
		# code...
		return true;


	}//end if
	else
	{

		return false;

	}//end else



}//END checkValidEvent








/*function checkValidEvent( $instatus, $dtevent, $dt_now )
{


	if ( 

		(int)$instatus == 1
		&&
		$dtevent >= $dt_now

	)
	{
		# code...
		return true;


	}//end if
	else
	{

		return false;

	}//end else



}//END checkValidEvent*/





function getInterestTotal( $inpaymentmethod, $nrinstallment, $incharge )
{


	$cart = Cart::getFromSession();
 	
	return $cart->getInterestTotal( $inpaymentmethod, $nrinstallment, $incharge);


}//end getInterest






function checkItem( $iditem )
{
	$uri = explode('/', $_SERVER["REQUEST_URI"]);
	
	$user = new User();

	$user->getFromUrl($uri[1]);



	$cart = Cart::getFromSession();

	return Cart::checkItem( $cart->getidcart(), $iditem );

}//END getUserName










function getInterest( $value, $inpaymentmethod, $nrinstallment, $incharge )
{


	return Wirecard::getInterest($value, $inpaymentmethod, $nrinstallment, $incharge);



}//end getInterest








function getCartVlSubTotal()
{

	$cart = Cart::getFromSession();

	//$totals = $cart->getProductsTotals();


	$uri = explode('/', $_SERVER["REQUEST_URI"]);


	$user = new User();

	$user->getFromUrl($uri[1]);




	$productconfig = new ProductConfig();

	$productconfig->get((int)$user->getiduser());



	return formatPrice($cart->getInterestTotal('1','1',$productconfig->getincharge()));
	


}//END getCartVlSubTotal








/*function getCartVlSubTotal()
{

	$cart = Cart::getFromSession();

	$totals = $cart->getProductsTotals();

	return formatPrice($totals['vlprice']);
	
}//END getCartVlSubTotal*/





/*function getCartVlSubTotal()
{

	$cart = Cart::getFromSession();

	//$totals = $cart->getProductsTotals();


	$uri = explode('/', $_SERVER["REQUEST_URI"]);


	$user = new User();

	$user->getFromUrl($uri[1]);




	$productconfig = new ProductConfig();

	$productconfig->get((int)$user->getiduser());



	return formatPrice(Wirecard::getInterest($totals['vlprice'],'1','1',$productconfig->getincharge()));
	


}//END getCartVlSubTotal*/





function getCartNrQtd()
{

	$cart = Cart::getFromSession();

	$totals = $cart->getProductsTotals();

	return $totals['nrqtd'];

}//END getCartNrQtd















function getNames()
{
	$uri = explode('/', $_SERVER["REQUEST_URI"]);
	
	$user = new User();

	$user->getFromUrl($uri[1]);

	$consort = new Consort();

	$consort->get((int)$user->getiduser());

	return $user->getdesnick() . " & " . $consort->getdesconsort();
	
	//return $user->getdesnick() . " & " . $user->getdesconsort();

}//END getUserName






















function getDesnick()
{
	$uri = explode('/', $_SERVER["REQUEST_URI"]);
	
	$user = new User();

	$user->getFromUrl($uri[1]);

	
	return $user->getdesnick();

}//END getUserName





function getDesconsort()
{
	$uri = explode('/', $_SERVER["REQUEST_URI"]);
	
	$user = new User();

	$user->getFromUrl($uri[1]);

	$consort = new Consort();

	$consort->get((int)$user->getiduser());

	return $consort->getdesconsort();
	
	//return $user->getdesconsort();

}//END getUserName





function getUnifiedSocialMedia()
{
	$uri = explode('/', $_SERVER["REQUEST_URI"]);
	
	$user = new User();

	$user->getFromUrl($uri[1]);

	$socialmedia = new SocialMedia();

	$socialmedia->get((int)$user->getiduser());

	


	if (

		$socialmedia->getdesfacelink1() != ''
		||
		$socialmedia->getdesinstalink1() != ''
		||
		$socialmedia->getdesyoutubelink1() != ''
		||
		$socialmedia->getdestwitterlink1() != ''

	)
	{
		# code...
		return true;

	}//end if
	else
	{
		return false;

	}//end else

}//END getUserName








function getPersonSocialMedia()
{
	$uri = explode('/', $_SERVER["REQUEST_URI"]);
	
	$user = new User();

	$user->getFromUrl($uri[1]);

	$socialmedia = new SocialMedia();

	$socialmedia->get((int)$user->getiduser());

	
	if (

		$socialmedia->getdesfacelink2() != ''
		||
		$socialmedia->getdesinstalink2() != ''
		||
		$socialmedia->getdesyoutubelink2() != ''
		||
		$socialmedia->getdestwitterlink2() != ''

	)
	{
		# code...
		return true;

	}//end if
	else
	{
		return false;
		
	}//end else

}//END getUserName






function getConsortSocialMedia()
{
	$uri = explode('/', $_SERVER["REQUEST_URI"]);
	
	$user = new User();

	$user->getFromUrl($uri[1]);

	$socialmedia = new SocialMedia();

	$socialmedia->get((int)$user->getiduser());

	if (

		$socialmedia->getdesfacelink3() != ''
		||
		$socialmedia->getdesinstalink3() != ''
		||
		$socialmedia->getdesyoutubelink3() != ''
		||
		$socialmedia->getdestwitterlink3() != ''

	)
	{
		# code...
		return true;

	}//end if
	else
	{
		return false;
		
	}//end else

}//END getUserName







function checkAllSocialMedia()
{
		
	if ( 

		getUnifiedSocialMedia() != false
		&&
		getPersonSocialMedia() != false
		&&
		getConsortSocialMedia() != false
		
	)
	{
		# code...
		return true;

	}//end if
	else
	{
		return false;

	}//end else
	



}//END getUserName













function checkSocialMedia( $value )
{
	$uri = explode('/', $_SERVER["REQUEST_URI"]);
	
	$user = new User();

	$user->getFromUrl($uri[1]);


	$social = SocialMedia::getSocialMediaArray((int)$user->getiduser());

	
	if ( $social[$value] != '' )
	{
		# code...
		return true;
	}//end if
	else
	{
		return false;

	}//end else
	



}//END getUserName


















function getSocialMediaLink( $value )
{
	$uri = explode('/', $_SERVER["REQUEST_URI"]);
	
	$user = new User();

	$user->getFromUrl($uri[1]);


	$socialmedia = new SocialMedia();

	$socialmedia->get((int)$user->getiduser());

	
	switch ( $value ) 
	{

		case 'desfacelink1':
			return $socialmedia->getdesfacelink1();

		case 'desfacelink2':
			return $socialmedia->getdesfacelink2();

		case 'desfacelink3':
			return $socialmedia->getdesfacelink3();



		case 'desinstalink1':
			return $socialmedia->getdesinstalink1();

		case 'desinstalink2':
			return $socialmedia->getdesinstalink2();

		case 'desinstalink3':
			return $socialmedia->getdesinstalink3();



		case 'desyoutubelink1':
			return $socialmedia->getdesyoutubelink1();

		case 'desyoutubelink2':
			return $socialmedia->getdesyoutubelink2();

		case 'desyoutubelink3':
			return $socialmedia->getdesyoutubelink3();



		case 'destwitterlink1':
			return $socialmedia->getdestwitterlink1();

		case 'destwitterlink2':
			return $socialmedia->getdestwitterlink2();

		case 'destwitterlink3':
			return $socialmedia->getdestwitterlink3();




	}//end switch
	



}//END getUserName











function getTemplateNames( $consort = 0 )
{
	$uri = explode('/', $_SERVER["REQUEST_URI"]);
	
	$names = Template::getTemplateNames($uri[2]);


	if ( (int)$consort == 0 ) 
	{
		# code...
		return $names[0] .' & '. $names[1];


	}//end if
	else if ( (int)$consort == 1 ) 
	{

		return $names[0];

	}//end else if
	else
	{

		return $names[1];

	}//end else

	

}//END getTemplateNames





















function getCategoryName( $value )
{

	if($value != '')
	{
		return Product::getCategory($value);

	}//end if
	else
	{
		return $value;

	}//endelse


}//end getProductCategory











function getDesdomain()
{

	$uri = explode('/', $_SERVER["REQUEST_URI"]);

	return $uri[1];

}//end getDesdomain







function getTemplate()
{


	$uri = explode('/', $_SERVER["REQUEST_URI"]);


	return $uri[2];

}//end getDesdomain










function setTemplateMenu( $page )
{

	$uri = explode('/', $_SERVER["REQUEST_URI"]);


	$user = new User();

	$user->getFromUrl($uri[1]);

	$menu = new Menu();

	$menu->get((int)$user->getiduser());

	switch ($page) 
	{
				
		case 'party': 
			return ((int)$menu->getinparty() == 1) ? true : false;

		
		case 'bestfriend': 
			return ((int)$menu->getinbestfriend() == 1) ? true : false;

		
		case 'rsvp': 
			return ((int)$menu->getinrsvp() == 1) ? true : false;

		
		case 'message': 
			return ((int)$menu->getinmessage() == 1) ? true : false;

		
		case 'store': 
			return ((int)$menu->getinstore() == 1) ? true : false;

		
		case 'event': 
			return ((int)$menu->getinevent() == 1) ? true : false;

		
		case 'album': 
			return ((int)$menu->getinalbum() == 1) ? true : false;

		
		case 'video': 
			return ((int)$menu->getinvideo() == 1) ? true : false;


		case 'stakeholder': 
			return ((int)$menu->getinstakeholder() == 1) ? true : false;

		
		case 'outerlist': 
			return ((int)$menu->getinouterlist() == 1) ? true : false;

		
	}//end switch



	

}//end getDesdomain







/*
function setTemplateMenu( $page )
{

	$uri = explode('/', $_SERVER["REQUEST_URI"]);


	$user = new User();

	$user->getFromUrl($uri[1]);

	$menu = new Menu();

	$menu->get((int)$user->getiduser());


	switch ($page) 
	{
		case 'wedding':
			# code...
			if( (int)$menu->getinwedding() == 1 )
			{
				return true;

			}//end if
			else
			{
				return false;

			}//end else




		case 'party':
			# code...
			if( (int)$menu->getinparty() == 1 )
			{
				return true;

			}//end if
			else
			{
				return false;

			}//end else







			case 'bestfriend':
			# code...
			if( (int)$menu->getinbestfriend() == 1 )
			{
				return true;

			}//end if
			else
			{
				return false;

			}//end else








			case 'rsvp':
			# code...
			if( (int)$menu->getinrsvp() == 1 )
			{
				return true;

			}//end if
			else
			{
				return false;

			}//end else








			case 'message':
			# code...
			if( (int)$menu->getinmessage() == 1 )
			{
				return true;

			}//end if
			else
			{
				return false;

			}//end else







			case 'store':
			# code...
			if( (int)$menu->getinstore() == 1 )
			{
				return true;

			}//end if
			else
			{
				return false;

			}//end else





			case 'event':
			# code...
			if( (int)$menu->getinevent() == 1 )
			{
				return true;

			}//end if
			else
			{
				return false;

			}//end else





			case 'album':
			# code...
			if( (int)$menu->getinalbum() == 1 )
			{
				return true;

			}//end if
			else
			{
				return false;

			}//end else





			case 'video':
			# code...
			if( (int)$menu->getinvideo() == 1 )
			{
				return true;

			}//end if
			else
			{
				return false;

			}//end else





			case 'stakeholder':
			# code...
			if( (int)$menu->getinstakeholder() == 1 )
			{
				return true;

			}//end if
			else
			{
				return false;

			}//end else





			case 'outerlist':
			# code...
			if( (int)$menu->getinouterlist() == 1 )
			{
				return true;

			}//end if
			else
			{
				return false;

			}//end else


		
		
	}//end switch



	

}//end getDesdomain
*/







function getSitePageConfig( $parameter )
{

	$uri = explode('/', $_SERVER["REQUEST_URI"]);

	

	if ( 

		!isset($uri[1]) 
		||
		$uri[1] == ''

	)
	{
		# code...
		return PageConfig::getSitePageConfig('index', $parameter);

	}//end if
	else
	{

		return PageConfig::getSitePageConfig($uri[1], $parameter);

	}//end else	


}//END getUserName











function getDashPageConfig( $parameter )
{

	$uri = explode('/', $_SERVER["REQUEST_URI"]);

	

	if ( 

		!isset($uri[2]) 
		||
		$uri[2] == ''

	)
	{
		# code...
		return PageConfig::getDashPageConfig('index', $parameter);

	}//end if
	else
	{

		return PageConfig::getDashPageConfig($uri[2], $parameter);

	}//end else	


}//END getUserName










function getTemplatePageConfig( $parameter )
{


	$uri = explode('/', $_SERVER["REQUEST_URI"]);
	
	$user = new User();

	$user->getFromUrl($uri[1]);

	$consort = new Consort();

	$consort->get((int)$user->getiduser());

	if ( 

		!isset($uri[2]) 
		||
		$uri[2] == ''

	)
	{
		# code..

		return $user->getdesnick() . " & " . $consort->getdesconsort();


	}//end if
	else
	{

		$pagetitle = PageConfig::getTemplatePageConfig($uri[2], $parameter);
		
		return $pagetitle . $user->getdesnick() . " & " . $consort->getdesconsort();

	}//end else





}//END getUserName
























function getTemplateModelPageConfig( $parameter )
{


	$uri = explode('/', $_SERVER["REQUEST_URI"]);
	
	$user = new User();

	$user->getFromUrl($uri[1]);

	$consort = new Consort();

	$consort->get((int)$user->getiduser());

	$names = Template::getTemplateNames($uri[2]);


	if ( 

		!isset($uri[3]) 
		||
		$uri[3] == ''

	)
	{
		# code..

		return $names[0] .' & '. $names[1];


	}//end if
	else
	{

		$pagetitle = PageConfig::getTemplatePageConfig($uri[3], $parameter);
		
		return $pagetitle . $names[0] .' & '. $names[1];

	}//end else





}//END getUserName



















function getHttpHost()
{

	return $_SERVER['HTTP_HOST'];

}//END getHost








function getBankName( $bankNumber )
{

	
	$banks = Bank::getBanksValues();



	foreach ($banks as $bank)
	{
		# code...
		if( (int)$bank['value'] == (int)$bankNumber ) 
		{

			return $bank['name'];
		
		}//end if
		 

	}//end foreach


	return $bankNumber;


}//end getBankName








function getUri($uri)
{	


	$array = explode('/', $uri);

	if( isset($array[2]) )
	{
		return $array[2];

	}//end if

}//end getUri
















function validatePlanEnd( $dtplanend )
{

	return User::validatePlanEnd($dtplanend);

}//end validatePlanEnd







function validatePlan()
{


	$user = User::getFromSession();


	
	$plans = [];


	if( (int)$user->getinplancontext() != 0 )
	{

		$plan = new Plan();

		$plans = $plan->get((int)$user->getiduser());

	}//end if


	return User::validatePlan( $user->getinplancontext(), $user->getdtplanend(), $plans );



}//end validatePlanEnd





















function validatePlanDomain()
{


	$uri = explode('/', $_SERVER["REQUEST_URI"]);
	
	$user = new User();

	$user->getFromUrl($uri[1]);


	
	$plans = [];


	if( (int)$user->getinplancontext() != 0 )
	{

		$plan = new Plan();

		$plans = $plan->get((int)$user->getiduser());

	}//end if


	return User::validatePlan( $user->getinplancontext(), $user->getdtplanend(), $plans );



}//end validatePlanEnd





















function checkMaintenance()
{

	return Maintenance::checkMaintenance();

}//end checkMaintenance




function getMaintenanceDescription()
{

	$maintenance = new Maintenance();

	$maintenance->getMaintenance();

	return $maintenance->getdesdescription();

}//end getMaintenanceDescription
























/*function validatePlan( $inpaymentstatus, $inpaymentmethod, $inplancontext, $dtplanend )
{

	return User::validatePlan( $inpaymentstatus, $inpaymentmethod, $inplancontext, $dtplanend );

}//end validatePlanEnd*/






function validatePlanFree()
{

	$user = User::getFromSession();


	if( (int)$user->getinplancontext() != 0 )
	{
		
		return false;
						
		
	}//end if
	else
	{
		
		return true;

	}//end else


	

}//end validatePlanFree






/*function validatePlanFree( $inplancontext )
{
	return User::validatePlanFree( $inplancontext);

}//end validatePlanFree*/







function roundValue( $value )
{

	

	return number_format($value, 2, ".","");


}// end ceil












function getValuePartial( $value, $integer = 1 )
{

	$roundValue = roundValue($value);

	$array = explode('.', $roundValue);
	

	if( $integer == 1 )
	{
		//return $array[0];

		return number_format($array[0], 0, ",",".");

	}//end if
	else
	{

		return $array[1];

	}//end else



}//endgetValuePartial






	








function setQueryString(
	
	$desaddress,
	$desnumber,
	$desdistrict,
	$descity,
	$desstate,
	$travelmode

)
{

	$data = [

		'destination'=>$desaddress." ".$desnumber." ".$desdistrict." ".$descity." ".$desstate,
		'travelmode'=>$travelmode

	];


	return 'https://www.google.com/maps/dir/?api=1&'.http_build_query($data);

	
}//end setQueryString








function getPaymentStatus($inpaymentstatus)
{


	return PaymentStatus::getPaymentStatus($inpaymentstatus);	



}//end getDtPlanEnd


















function getPaymentStatusClass( $inpaymentstatus, $inrefunded )
{

	switch ( (int)$inpaymentstatus ) 
	{
		case 6:
			# code...
			return 'cancelled';

		case 8:
		case (int)$inpaymentstatus == 7 && (int)$inrefunded == 0:
			# code...
			return 'reversed';
		
		default:
			# code...
			return false;


	}//end switch

}//END getPaymentStatusClass

















function checkBoletoPrintHref( $inpaymentmethod, $inpaymentstatus )
{

	if ( in_array( (int)$inpaymentmethod, [1,2] ) ) 
	{
		# code...
		return false;
	}//end if
	else
	{

		if ( in_array((int)$inpaymentstatus, [1,2,3,4]) ) 
		{
			# code...
			return true;

		}//end if
		else
		{

			return false;

		}//end else


	}//end else

}//END getPaymentStatusClass

















function getBoletoCode( $desprinthref )
{


	$desprinthref = trim($desprinthref);

	$array = explode('/', $desprinthref);

	return $array[5];


}//END getBoletoCode















function getDtPlanEnd($dtplanbegin, $inperiod)
{

	$planEnd = new DateTime($dtplanbegin . ' +'.$inperiod.' month');

	return $planEnd->format('d/m/Y');


}//end getDtPlanEnd







function getDesplan( $inplan )
{
	$plan = Wirecard::getPlan($inplan);

	return $plan['desplan'];

}//end getPlanName





function getDesperiod( $inplan )
{

	$plan = Wirecard::getPlan($inplan);

	return $plan['inperiod'] . " " . $plan['desperiod'];

}// end getDespériod







function getDateDiff( $date )
{

	//$onlyDate = explode(' ', $date);

	$finalDate = new DateTime( $date );

	$today = new DateTime(date('Y-m-d'));

	$diff = $today->diff($finalDate);

	$interval = $diff->days;


	if( $finalDate > $today )
	{
		switch( $interval > 1 )
		{
			case true;
			return 'Faltam '.$interval.' dias';

			case false;
			return 'Falta '.$interval. ' dia';

		}//end switch

	}//end switch

	else if( $finalDate < $today )
	{
		return 'O casamento aconteceu dia '.$finalDate->format('d/m/Y');

	}//end else if

	else if( $finalDate == $today )
	{
		return 'É hoje! Chegou o grande dia!';

	}//end else if


}//END getDateDiff









/*function getDateDiffFooter()
{



	$uri = explode('/', $_SERVER["REQUEST_URI"]);
	
	$user = new User();

	$user->getFromUrl($uri[1]);


	$wedding = new Wedding();

	$wedding->get((int)$user->getiduser());


	return getDateDiff($wedding->getdtwedding());


}//end getDateDiffFooter
*/










function formatPrice( $vlprice )
{

	if( !$vlprice > 0 ) $vlprice = 0;

	return number_format($vlprice, 2, ",",".");
	
}//END formatPrice











function formatDate( $date )
{

	return date( 'd/m/Y', strtotime($date) );
	
}//END formatDate










function formatTime($time)
{

	$dt = new \DateTime($time);

	return $dt->format('H:i');

}//end formatTime






function formatDateTimeWithSeconds($timestamp)
{

	$dt = new \DateTime($timestamp);


	return $dt->format('d/m/y H:i:s');

}//end formatTime










function formatDateSmall( $date )
{

	return date( 'd/m/y', strtotime($date) );
	
}//END formatDate










function getYear()
{

	return date('Y');
	
}//END getYear






function formatUtf8( $name )
{

	return utf8_encode($name);
	
}//END formatUtf8







function checkLogin( $inadmin = true )
{

	return User::checkLogin($inadmin);

}//END checkLogin








function getUserName()
{
	$user = User::getFromSession();

	return $user->getdesperson();

}//END getUserName



function getUserNick()
{
	$user = User::getFromSession();

	return $user->getdesnick();

}//END getUserName







function getMaxAdults( $inmaxadults, $inadultsconfig, $inmaxadultsconfig )
{
	//$user = User::getFromSession();


	if( (int)$inadultsconfig == 0 )
	{

		return $inmaxadults;

	}//end if
	else
	{
		return $inmaxadultsconfig;

	}//end else



}//END getUserName






function getMaxChildren( $inmaxchildren, $inchildrenconfig, $inmaxchildrenconfig )
{
	//$user = User::getFromSession();


	if( (int)$inchildrenconfig == 0 )
	{

		return $inmaxchildren;

	}//end if
	else
	{
		return $inmaxchildrenconfig;

	}//end else


}//END getUserName













function checkDesdomain()
{
	$user = User::getFromSession();

	if ( 

		$user->getdesdomain() != '' 
		&& 
		!is_null( $user->getdesdomain() )

	)
	{
	 	# code...
	 	return true;

	}//end if
	else
	{
		return false;

	}//end else


}//END getUserName







function view()
{
	$user = User::getFromSession();

	return $user->getdesdomain();

}//END getUserName



















 ?>