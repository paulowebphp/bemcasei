<?php 

namespace Core;


use \Core\Model;
use \Core\Model\Bank;
use \Core\Model\Plan;




class Validate extends Model
{



	const SUCCESS = "Validate-Success";
	const ERROR = "Validate-Error";


















	public static function setHash( $value )
	{

		try 
		{

			return base64_encode($value);


		}//end try
		catch ( \Exception $e ) 
		{

			return '';


		}//end catch

		

	}//END setHash










	public static function getHash( $value )
	{

		try
		{

			return base64_decode($value);
			
		}//end try
		catch ( \Exception $e )
		{

			return '';
			
		}//end catch
		

	}//END setHash














	public static function validateFullName( $desname )
	{

		$desname = trim($desname);

		if ( !preg_match('/\\s/', $desname) )
		{

			return false;

		}//end if
		else
		{
			return true;

		}//end else


	}//end validateFullName










	public static function validateString( $string, $may_be_empty = false )
	{

		$string = preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"), $string);
		

		$string = preg_replace('/[^A-Za-z0-9\ç\Ç\s_\-]/', '', $string);

		$string = trim($string);

		



		if( !$may_be_empty )
		{


			if( $string != '')
			{
				return $string;

			}//end if
			else
			{
				return false;

			}//end else



		}//end
		else
		{

			return $string;

		}//end else


		


	}//end validateString
























	public static function validateStringWithAccent( $string, $may_be_empty = false )
	{

		/*$string = preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"), $string);*/
		

		$string = preg_replace('/[^A-Za-z0-9\ç\Ç\s_\-\í\Í\á\Á\à\À\ã\Ã\â\Â\é\É\ê\Ê\ó\Ó\ú\Ú\ñ\Ñ\!\?\@\#\$\%\&\*\+]/', '', $string);

		$string = trim($string);

		



		if( !$may_be_empty )
		{


			if( $string != '')
			{
				return $string;

			}//end if
			else
			{
				return false;

			}//end else



		}//end
		else
		{

			return $string;

		}//end else


		


	}//end validateString

























	public static function validateRsvpAccompanies( $string, $may_be_empty = false )
	{

		/*$string = preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"), $string);*/
		

		$string = preg_replace('/[^A-Za-z0-9\ç\Ç\s_\-\í\Í\á\Á\à\À\ã\Ã\â\Â\é\É\ê\Ê\ó\Ó\ú\Ú\ñ\Ñ\!\?\@\#\$\%\&\*\+\,\;]/', '', $string);

		$string = preg_replace('/[\\n]/', '', $string);

		$string = preg_replace('/[\,]/', ';', $string);

		$string = trim($string);

		



		if( !$may_be_empty )
		{


			if( $string != '')
			{
				return $string;

			}//end if
			else
			{
				return false;

			}//end else



		}//end
		else
		{

			return $string;

		}//end else


		


	}//end validateString













































	public static function validateDescription( $string, $may_be_empty = false )
	{

		/*$string = preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"), $string);*/
		

		//$string = preg_replace('/[^A-Za-z0-9çÇ\s_-]/', '', $string);

		$string = trim($string);

		



		if( !$may_be_empty )
		{


			if( $string != '')
			{
				return $string;

			}//end if
			else
			{
				return false;

			}//end else



		}//end
		else
		{

			return $string;

		}//end else


		


	}//end validateString







































	public static function validateCouponCode( $value )
	{

		$value = strtoupper($value);
	
		$value = preg_replace('/[^A-Z0-9]/', '', $value);

		$value = trim($value);

		


		if( $value != '')
		{

			if( (int)strlen($value) <= Rule::COUPON_LENGTH )
			{

				
				return $value;


			}//end if
			else
			{

				return false;

			}//en else



		}//end if
		else
		{
			return false;

		}//end else


		


	}//end validateCouponCode





























	public static function validateCouponAction( $value )
	{
		
		$value = preg_replace('/[^a-z]/', '', $value);

		$value = trim($value);

		



		if( $value != '')
		{

			if( in_array($value, ['aplicar','desaplicar']) )
			{

				
				return $value;


			}//end if
			else
			{

				return false;

			}//en else



		}//end if
		else
		{
			return false;

		}//end else


		


	}//end validateCouponCode


































	public static function validateQuaesitum( $value )
	{


		$value = trim($value);


		if ( $value != '' )
		{
			# code...
			if ( substr_count($value, '@') != 1 )
			{
				# code...
				$value = Validate::validateStringWithAccent($value);


			}//end if
			else
			{
				$value = Validate::validateEmail($value);

				
			}//end else


			if( (bool)$value !== false )
			{

				return $value;

			}//end if
			else
			{

				return false;

			}//end else

		}//end if
		else
		{

			return false;

		}//end else


		


	}//end validateString





















	public static function validateHexa( $value )
	{

		$value = preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"), $value);
		
		$value = strtoupper($value);

		$value = preg_replace('/[^A-F0-9]/', '', $value);

		$value = trim($value);

		

		if( (int)strlen($value) == 6 )
		{
			return $value;

		}//end if
		else
		{
			return false;

		}//end else

		


	}//end validateString

















	public static function validateFontFamily( $value )
	{

		$value = preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"), $value);
		

		$value = preg_replace('/[^A-Za-z0-9\s_-]/', '', $value);

		$value = trim($value);


		$fonts = [

			'Arial',
			'Heebo',
			'OpenSans',
			'Poppins',
			'Roboto',	
			'Rubik',

			'Euphoria',
			'KaushanScript',
			'Norican',
			'Pacifico',
			'Satisfy'

		];
		

		if( in_array($value, $fonts) )
		{
			return $value;

		}//end if
		else
		{
			return false;

		}//end else

		


	}//end validateString















	public static function validateCardName( $string )
	{

		$string = preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"), $string);
		

		$string = preg_replace('/[^A-Za-zçÇ\s]/', '', $string);

		$string = trim($string);

		$string = strtoupper($string);



		if( $string != '')
		{
			return $string;

		}//end if
		else
		{
			return false;

		}//end else



		


	}//end validateString































	/*public static function validateCheckoutMethod( $method )
	{


		$method = trim($method);


		if (


			in_array( $method, [

				'cartao-proprio',
				'boleto',
				'cartao',
			
			])

		)
		{
			# code...
			return true;



		}//end if
		else
		{


			return false;


		}//end else


	}//END checkOrdination*/

















	public static function validateCheckoutMethod( $method, $inpaymentmethod )
	{


		$method = trim($method);

		$array = [

			'0'=>'checkout-boleto',
			'1'=>'checkout-third-part-card',
			'2'=>'checkout-own-card',
			'3'=>'checkout-voucher'

		];


		if ( $method != '' )
		{
			

			if ( $method == $array[$inpaymentmethod] )
			{
				# code...
				return true;

			}//end if
			else
			{
				return false;

			}//end else


		}//end if
		else
		{


			return false;


		}//end else


	}//END checkOrdination
















	public static function validateCheckoutInstallment( $installment )
	{


		$installment = trim($installment);


		if ( in_array( $installment, [1,2,3,4,5,6]) )
		{
			# code...
			return true;



		}//end if
		else
		{


			return false;


		}//end else


	}//END checkOrdination













	public static function validateDomain( $string )
	{

		$string = trim($string);

		if( 

			strlen($string) > 2
			&&
			preg_match('/^[a-z0-9-_]+$/', $string) 

		)
		{
			return $string;

		}//end if
		else
		{

			return false;


		}//end else

		

		



	}//end validateString
















	public static function validateNumber( $desnumber )
	{
		


		$number = preg_replace('/[^0-9]/', '', $desnumber);

			

		if( 

			$number != ''
			&&
			(int)$number < 100000000000


		)
		{

			return $number;

		}//end if
		else
		{
			return false;

		}//end else


	}//END formatNumber






















	public static function validateRatingToTen( $value )
	{
		

		$value = preg_replace('/[^0-9]/', '', $value);


		$value = trim($value);



		if( 

			$value != ''
			&&
			(int)$value >= 0
			&&
			(int)$value <= 10
			


		)
		{

			return $value;

		}//end if
		else
		{
			return false;

		}//end else


	}//END formatNumber















	public static function validatePassword( $password )
	{

		$password = trim($password);
		
		$lenght = strlen($password);

		if ( $password != '' ) 
		{
			# code...
			if( 

				(int)$lenght >= 6
				&&
				(int)$lenght <= 20

			)
			{

				return $password;

			}//end if
			else
			{
				return false;

			}//end else


		}//end if


	}//END formatNumber
















	public static function validateCurrency( $value )
	{
		


		$value = preg_replace('/[^0-9\.]/', '', $value);

			

		if( 

			$value != ''
			&&
			(int)$value < 100000000000


		)
		{

			return $value;

		}//end if
		else
		{
			return false;

		}//end else


	}//END formatNumber

































	public static function validatePercentage( $value )
	{
		
		$value = trim($value);



		$value = preg_replace('/[^0-9]/', '', $value);

		



		if( $value != '')
		{

			if (

				(int)$value > 0
				&&
				(int)$value <= 100

			) 
			{
				# code...
				return ($value/100);

			}//end if
			else
			{

				return false;
			}

		}//end if
		else
		{
			return false;

		}//end else


	}//END formatNumber




































	/*public static function validateCouponUsage( $value )
	{
		
		$value = trim($value);

		$value = preg_replace('/[^0-9]/', '', $value);

		
		if( $value != '')
		{

			if (

				(int)$value >= 0
				&&
				(int)$value <= 1000000000

			) 
			{
				# code...
				return $value;

			}//end if
			else
			{

				return false;
			}

		}//end if
		else
		{
			return false;

		}//end else


	}//END formatNumber*/





































	public static function validateCouponExpire( $value )
	{
		
		$value = trim($value);

		$value = preg_replace('/[^0-9]/', '', $value);

		
		if( $value != '')
		{

			if (

				(int)$value > 0
				&&
				(int)$value <= 180

			) 
			{
				# code...
				return $value;

			}//end if
			else
			{

				return false;
			}

		}//end if
		else
		{
			return false;

		}//end else


	}//END formatNumber





























	/*public static function validateDtexpire( $value )
	{
		
		$value = trim($value);

		$value = preg_replace('/[^0-9]/', '', $value);

		
		if( $value != '')
		{

			if (

				(int)$value > 0
				&&
				(int)$value <= 180

			) 
			{
				# code...
				return $value;

			}//end if
			else
			{

				return false;
			}

		}//end if
		else
		{
			return false;

		}//end else


	}//END formatNumber*/






































	public static function validateTemplateId( $value )
	{
		


		$value = preg_replace('/[^0-9]/', '', $value);


		if( $value != '')
		{

			if (in_array((int)$value, [1,2,3,4,5,6,7,8])) {
				# code...
				return $value;
			}//end if
			else
			{

				return false;

				
			}//end if

		}//end if
		else
		{
			return false;

		}//end else


	}//END formatNumber
















	public static function validateBoolean( $bool )
	{

		if( preg_match('/^([0-1]{1})$/', $bool) )
		{

			return $bool;


		}//end if
		else
		{
			return false;
		}


	}//END validateBoolean











	public static function validatePosition( $inposition )
	{

		$inposition = trim($inposition);

		$inposition = preg_replace('/[^0-9]/', '', $inposition);

		if( (int)$inposition != 0 )
		{


			if( strlen($inposition) < 3 )
			{

				return $inposition;

			}//end if
			else
			{
				return false;

			}//end else


		}//end if
		else
		{

			return false;

		}//emd else


		


	}//end validatePosition









	public static function validateBorderSize( $value )
	{


		$value = trim($value);


		if ($value != '')
		{
			# code...
			if( 

				(int)$value >= 0
				&&
				(int)$value <= 12

			)
			{

				return $value;

			}//end if
			else
			{
				return false;

			}//end else

		}//end if
		else
		{
			return false;

		}//end else


	}//end validateBorderSize











	public static function validateBorderRadius( $value )
	{


		$value = trim($value);


		if ($value != '')
		{
			# code...
			if( 

				(int)$value >= 0
				&&
				(int)$value <= 20

			)
			{

				return $value;

			}//end if
			else
			{
				return false;

			}//end else

		}//end if
		else
		{
			return false;

		}//end else


	}//end validateBorderSize





	/*public static function validateBorderRadius( $value )
	{

		$value = trim($value);

		$value = preg_replace('/[^0-20]/', '', $value);

		

		if ($value != '')
		{
			# code...
			if( (int)$value <= 20 )
			{

				return $value;

			}//end if
			else
			{
				return false;

			}//end else

		}//end if
		else
		{
			return false;

		}//end else


	}//end validateBorderSize*/












	/*public static function validateBorderRadius( $value )
	{

		$value = trim($value);

		$value = preg_replace('/[^1-9]/', '', $value);

		if ($value != '')
		{
			# code...
			if( (int)$value <= 12 )
			{

				return $value;

			}//end if
			else
			{
				return false;

			}//end else

		}//end if
		else
		{
			return false;

		}//end else


	}//end validateBorderSize*/







	public static function validateProductCategory( $value )
	{

		if( preg_match('/^([11-17]{2})$/', $value) )
		{

			return $value;


		}//end if
		else
		{
			return false;
		}


	}//END validateProductCategory









	public static function validatePrice( $price )
	{

		
		$price = trim($price);

		$price = preg_replace('/[^0-9\.]/', '', $price);



		if($price != '')
		{


			if( substr_count($price, '.') == 1 )
			{
				

				$priceArray = explode('.', $price);
				

				if( 

					(int)$price <= 2000.00
					&&
					(int)$price >= 100.00
					&&
					$priceArray[0] != ''
					&&
					$priceArray[1] != ''
					&&
					strlen($priceArray[1]) < 3
					

				)
				{	

					return $price;



				}//end if
				else
				{
					return false;

				}//end else


			}//end if
			else if( substr_count($price, '.') == 0 )
			{


				if( 

					(int)$price < 2000.00
								
					
				)
				{	

					return $price;



				}//end if
				else
				{
					return false;

				}//end else


			}//end else

		}//end if
		else 
		{


			return false;

			

		}//end else

		

		


	}//END validatePrice















	public static function validateTransferAmount( $value )
	{

		

		$value = preg_replace('/[^0-9\.]/', '', $value);

		$value = trim($value);



		if($value != '' || (int)$value != 0 )
		{


			if( substr_count($value, '.') == 1 )
			{
				

				$valueArray = explode('.', $value);

				$decimalLenght = strlen($valueArray[1]);
				

				if( 

					$valueArray[0] != ''
					&&
					$valueArray[1] != ''
					&&
					$decimalLenght < 3
					&&
					$decimalLenght != 0
					

				)
				{	

					if( (int)$decimalLenght == 2 ) 
					{
						# code...
						return $value;

					}//end if
					elseif( (int)$decimalLenght == 1 )
					{

						return $value.'0';

					}//end elseif
					else
					{
						return false;

					}//end else



				}//end if
				else
				{
					return false;

				}//end else


			}//end if
			else if( substr_count($value, '.') == 0 )
			{


				return $value.'.00';

			}//end else

		}//end if
		else 
		{


			return false;

			

		}//end else

		

		


	}//END validateTransferAmount




























	public static function validateInplancode( $value )
	{

		$value = trim($value);

		if ( $value != '' )
		{
			
			# code...
			if ( preg_match('/^[0-9]+$/', $value) ) 
			{
				# code...
				$results = Plan::getPlansFullArray();

				foreach ($results as $row ) 
				{
					# code...
					if ( isset($results[$value]) )
					{
						# code...
						return $value;

					}//end if

				}//end foreach

				return false;

			}//end if
			else
			{

				return false;

			}//end else

		}//end if
		else
		{

			return false;

		}//end else



	}//END validateInplancode




















	/*public static function validateInplancode( $value )
	{

		$value = trim($value);

		if ( 

			(int)$value != 0
			||
			$value != ''

		)
		{
			
			# code...
			if ( preg_match('/^[0-9]+$/', $value) ) 
			{
				# code...
				$results = Plan::getPlansFullArray();

				foreach ($results as $row ) 
				{
					# code...
					if ( isset($results[$value]) )
					{
						# code...
						return $value;

					}//end if

				}//end foreach

				return false;

			}//end if
			else
			{

				return false;

			}//end else

		}//end if
		else
		{

			return false;

		}//end else



	}//END validateInplancode*/
























	public static function validateMaxRsvp( $value )
	{

		$value = trim($value);

		$value = preg_replace('/[^0-9]/', '', $value);

		if( $value != '' )
		{

			return $value;

		}//end if
		else
		{
			return false;

		}//end else





		/*if( $value != ''
			&&
			strlen($value) < 3 )
		{

			return $value;

		}//end if
		else
		{
			return false;

		}//end else
*/


		


	}//end validateMaxRsvp
























	public static function validateChildrenAge( $value )
	{

		$value = trim($value);

		$value = preg_replace('/[^0-9]/', '', $value);

		if( 
			
			$value != ''
			&&
			(int)$value <= 21
			
		)
		{

			return $value;

		}//end if
		else
		{
			return false;

		}//end else





		/*if( $value != ''
			&&
			strlen($value) < 3 )
		{

			return $value;

		}//end if
		else
		{
			return false;

		}//end else
*/


		


	}//end validateMaxRsvp



























	public static function validateDate( $date, $halo )
	{


		if( (bool)preg_match('/^([0-9]{4})[-.\/]([0-9]{2})[-.\/]([0-9]{2})$/', $date) == true )
		{

			$dt_input = new \DateTime($date);

			$dt_150_year = new \DateTime(date('Y-m-d') . ' - 150 year');
			




			if( $dt_input >= $dt_150_year )
			{



				switch ( $halo ) 
				{



					case 0:
						// de 150 anos para cá até a data atual
						$now = new \DateTime(date('Y-m-d'));

						
						if( $dt_input <= $now )
						{
							return $date;
						}//end if
						else
						{
							return false;
						}//end else




					case 1:
						// da data atual até inifinito dentro do formato de 4 digitos
						$now = new \DateTime(date('Y-m-d'));


						if( $dt_input >= $now )
						{
							return $date;
						}//end if
						else
						{
							return false;
						}//end else


					case 2:
						// desde 150 anos para cá até inifinito dentro do formato de 4 digitos
						return $date;

					
					
				}//end switch






			}//end if
			else
			{
				//-150 anos
				return false;

			}//end else




		}//end if 
		else
		{	

			//wrong format date
			return false;


		}//end else
		




	}//END validateDate












	public static function validateTime( $time )
	{


		if( 

			(bool)preg_match('/^(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]:[0-5][0-9]$/', $time)
			||
			(bool)preg_match('/^(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$/', $time)

		 )
		{

			return $time;

			
		}//end if 
		else
		{	

			//wrong format date
			return false;


		}//end else
		


	}//END validateTime












	public static function validateUserMajority( $date )
	{


		if( (bool)preg_match('/^([0-9]{4})[-.\/]([0-9]{2})[-.\/]([0-9]{2})$/', $date) == true )
		{

			$dt_input = new \DateTime($date);

			$dt_150_year = new \DateTime(date('Y-m-d') . ' - 150 year');
			




			if( $dt_input >= $dt_150_year )
			{



				$dt_majority = new \DateTime(date('Y-m-d') . ' - 18 year');



				if( $dt_input <= $dt_majority )
				{
					return $date;

				}//end if
				else
				{
					return false;

				}//end else




			}//end if
			else
			{
				//-150 anos
				return false;

			}//end else




		}//end if 
		else
		{	

			//wrong format date
			return false;


		}//end else
		




	}//END validateUserMajority













	public static function validateYear( $year )
	{

		

		if( preg_match('/^([0-9]{4})$/', (string)$year) )
		{

			return $year;


		}//end if
		else
		{
			return false;
		}
		


	}//END validateYear









	public static function validateMonth( $month )
	{


	

		if( preg_match('/^([0-9]{2})$/', (string)$month) )
		{

			return $month;


		}//end if
		else
		{
			return false;
		}
		
		


	}//END validateMonth







	public static function validateCvc( $desnumber )
	{

		$number = preg_replace('/[^0-9]/', '', (string)$desnumber);

		$number = trim($number);

		$lenght = strlen($number);

		if( in_array((int)$lenght, [3,4]))
		{
			return $number;

		}//end if
		else
		{
			return false;

		}//end else


	}//END formatNumber







	public static function validateCardNumber( $value )
	{

		$value = preg_replace('/[^0-9]/', '', (string)$value);

		$value = trim($value);
	

		if( 

			strlen($value) < 13
			||
			strlen($value) > 19

		)
		{

			return false;


		}//end if
		else
		{
			return $value;
		}
		
		


	}//END validateMonth

















	public static function validateCEP( $nrcep )
	{

		$nrcep = preg_replace('/[^0-9]/', '', (string)$nrcep);

		if( strlen($nrcep) != 8 )
		{
			return false;
		}//end if
		else
		{	
			return $nrcep;

		}//end else

		

	}//END validateCEP







	public static function validateDDD( $nrddd )
	{

		$nrddd = preg_replace('/[^0-9]/', '', (string)$nrddd);

		$nrddd = trim($nrddd);

		if( strlen($nrddd) != 2 )
		{
			return false;
		}//end if
		else
		{	
			return $nrddd;

		}//end else

		

	}//END validateDDD











	public static function validatePhone( $nrphone )
	{

		$nrphone = preg_replace('/[^0-9]/', '', (string)$nrphone);

		$nrphone = trim($nrphone);

		if( !in_array((int)strlen($nrphone), [8,9])  )
		{
			return false;
		}//end if
		else
		{	
			return $nrphone;

		}//end validatePhone

		

	}//END formatNumberCEP











	public static function validateLongPhone( $nrphone )
	{

		$nrphone = preg_replace('/[^0-9]/', '', (string)$nrphone);

		$nrphone = trim($nrphone);

		$lenght = strlen($nrphone);

		if( $lenght < 8 || $lenght > 13 )
		{
			return false;
		}//end if
		else
		{	
			return $nrphone;

		}//end validatePhone

		

	}//END formatNumberCEP












	public static function validateURL( $url, $may_be_empty = false )
	{
		$url = trim($url);

		//$url = strtolower($url);

		$url = str_replace('https://', '', $url);
		$url = str_replace('http://', '', $url);
		$url = str_replace('www.', '', $url);




		if( preg_match( '/((http|https)\:\/\/)?[a-zA-Z0-9\.\/\?\:@\-_=#]+\.([a-zA-Z0-9\&\.\/\?\:@\-_=#])*/', $url ) )
		{

			return $url;


		}//end if
		else
		{

			if($may_be_empty === true)
			{
				return '';
			}//end if
			else
			{
				return false;
			}//end if


		}//end else

	


	}//END validateURL








	public static function validateVideoCode( $url )
	{
		$url = trim($url);

		//$url = strtolower($url);

		$url = str_replace('https://', '', $url);
		$url = str_replace('http://', '', $url);
		$url = str_replace('www.', '', $url);




		if( preg_match( '/((http|https)\:\/\/)?[a-zA-Z0-9\.\/\?\:@\-_=#]+\.([a-zA-Z0-9\&\.\/\?\:@\-_=#])*/', $url ) )
		{


			if( $url != '' )
			{


				preg_match(
			        '/[\\?\\&]v=([^\\?\\&]+)/',
			        $url,
			        $matches
			    );

			    


				return [

					'desurl'=>$url,
					'desvideocode'=>$matches[1]

				];


			}//end if
			else
			{
				return false;

			}//end else


		}//end if
		else
		{

			return false;

		}//end else

	


	}//END validateURL











	/*public static function validateURL( $url )
	{
		$url = trim($url);

		$url = strtolower($url);

		$url = str_replace('https://', '', $url);
		$url = str_replace('http://', '', $url);
		$url = str_replace('www.', '', $url);


		if(preg_match('/^[a-z0-9.-_]+$/', $url) )
		{


			if( $url != '' && strpos($url, '.') )
			{
				return $url;
			}//end if
			else
			{
				return false;

			}//end else


		}//end if
		else
		{

			return false;

		}//end else



		


	}//END validateURL
*/













	public static function validateEmail( $email, $may_be_empty = false )
	{

		
		$email = trim($email);

		



		if( $email == '' && $may_be_empty === true )
		{
			

			return $email;


		}//end if
		else
		{

			$email = strtolower($email);

			$emailArray = explode('@', $email);

			if( 

				substr_count($email, '@') == 1
				&&
				$emailArray[0] != ''
				&&
				$emailArray[1] != ''

			)
			{

				

				if( 

					preg_match('/^[a-z0-9_@\.\-]+$/', $email)
					&&
					substr_count($emailArray[1], '.') 

				)
				{

										
					return $email;

				}//end if
				else
				{

					return false;

				}//end else



			}//end if
			else
			{

				return false;

			}//end else


		}//end else

		


	}//END validateEmail






















	public static function validateDocument( $type, $desdocument )
	{

		if( !$desdocument )
		{
			return false;
			
		}#end if

		$desdocument = preg_replace('/[^0-9]/', '', (string)$desdocument);
		//$desdocument = trim($desdocument);

		//$desdocument = str_replace(" ", "", $desdocument);
		//$desdocument = str_replace(".", "", $desdocument);



		switch ($type) 
		{
			case 0:
				# code...
				//$desdocument = str_replace("-", "", $desdocument);
				

				if( !Validate::validateCPF($desdocument) )
				{
					return false;
					
				}#end if
				else
				{
					return $desdocument;

				}//end else

			case 1:
				# code...
				//$desdocument = str_replace("-", "", $desdocument);
				

				if( !Validate::validateCNPJ($desdocument) )
				{
					return false;
					
				}#end if
				else
				{
					return $desdocument;

				}//end else

		}#end switch

	}#END validate








	public static function validateCNPJ( $desdocument ):bool
	{
		$desdocument = preg_replace('/[^0-9]/', '', (string) $desdocument);

		
		// Valida tamanho
		if (strlen($desdocument) != 14)
			return false;
		// Valida primeiro dígito verificador
		for ($i = 0, $j = 5, $sum = 0; $i < 12; $i++)
		{
			$sum += $desdocument{$i} * $j;
			$j = ($j == 2) ? 9 : $j - 1;
		}

		$rest = $sum % 11;
		if ($desdocument{12} != ($rest < 2 ? 0 : 11 - $rest))
			return false;
		// Valida segundo dígito verificador

		for ($i = 0, $j = 6, $sum = 0; $i < 13; $i++)
		{
			$sum += $desdocument{$i} * $j;
			$j = ($j == 2) ? 9 : $j - 1;
		}

		$rest = $sum % 11;

		return $desdocument{13} == ($rest < 2 ? 0 : 11 - $rest);
	}










	public static function validateCPF($desdocument):bool
	{


	    if (strlen($desdocument) != 11) return false;
	       

	    for ($i = 0, $j = 10, $sum = 0; $i < 9; $i++, $j--)
	        $sum += $desdocument{$i} * $j;
	    $rest = $sum % 11;
	    if ($desdocument{9} != ($rest < 2 ? 0 : 11 - $rest))
	        return false;

	    for ($i = 0, $j = 11, $sum = 0; $i < 10; $i++, $j--)
	        $sum += $desdocument{$i} * $j;
	    $rest = $sum % 11;

	    return ($desdocument{10} == ($rest < 2 ? 0 : 11 - $rest));

	}#END isValidCPF











	


















	public static function validateBankNumber( $value )
	{

		$value = preg_replace('/[^0-9]/', '', $value);

		$value = trim($value);


		if($value != '')
		{


			$banks = Bank::getBanksValues();

			foreach ($banks as $bank)
			{
				# code...
				if( (int)$bank['value'] === (int)$value ) 
				{

					return $value;
				
				}//end if
				 

			}//end foreach	


			return false;


		}//end if
		else
		{

			return false;			

		}//end else

		

	}//END validateBankNumber












	public static function validateAccountType( $type )
	{


		$type = trim($type);


		if($type != '')
		{


			if ( in_array($type, ['CHECKING','SAVING'])) 
			{
				# code...

				return $type;

			}//end if
			else
			{
				return false;

			}//end else


		}//end if
		else
		{

			return false;			

		}//end else

		

	}//END validateBankNumber














	public static function validateAgencyNumber( $value )
	{

		$value = preg_replace('/[^0-9]/', '', $value);

		$value = trim($value);




		if($value != '')
		{

			$lenght = strlen($value);


			if ( (int)$lenght >= 4 && (int)$lenght <= 6 ) 
			{
				# code...

				return $value;

			}//end if
			else
			{
				return false;

			}//end else
			


		}//end if
		else
		{

			return false;			

		}//end else

		

	}//END validateAgencyNumber













	public static function validateAgencyCheck( $value )
	{

		$value = preg_replace('/[^0-9]/', '', $value);

		$value = trim($value);

		

		if($value != '')
		{

			$lenght = strlen($value);

					
			if ( (int)$lenght == 1 ) 
			{
				# code...

				return $value;

			}//end if
			else
			{
				return false;

			}//end else
			


		}//end if
		else
		{

			return false;			

		}//end else

		

	}//END validateAgencyCheck






















	public static function validateAccountNumber( $value )
	{

		$value = preg_replace('/[^0-9]/', '', $value);

		$value = trim($value);




		if($value != '')
		{

			$lenght = strlen($value);


			if ( (int)$lenght >= 5 && (int)$lenght <= 9 ) 
			{
				# code...

				return $value;

			}//end if
			else
			{
				return false;

			}//end else
			


		}//end if
		else
		{

			return false;			

		}//end else

		

	}//END validateAccountNumber















	public static function validateAccountCheck( $value )
	{

		$value = preg_replace('/[^0-9]/', '', $value);

		$value = trim($value);


		if($value != '')
		{

			$lenght = strlen($value);

		
			if ( (int)$lenght == 1 ) 
			{
				# code...

				return $value;

			}//end if
			else
			{
				return false;

			}//end else
			


		}//end if
		else
		{

			return false;			

		}//end else

		

	}//END validateAgencyCheck

















	public static function setError( $msg )
	{

		$_SESSION[Validate::ERROR] = $msg;

	}//END setError









	public static function getError()
	{

		$msg = (isset($_SESSION[Validate::ERROR]) && $_SESSION[Validate::ERROR]) ? $_SESSION[Validate::ERROR] : '';

		Validate::clearError();

		return $msg;

	}//END getError







	public static function clearError()
	{
		$_SESSION[Validate::ERROR] = NULL;

	}//END clearError



















}//END class Validate




 ?>