<?php 

namespace Core;


//use \Core\DB\Sql;
//use \Core\Model;
//use \Core\Rule;




class CodeFactory
{

	# Session
	//const SESSION = "CodeFactorySession";

	# Error - Success
	//const SUCCESS = "CodeFactory-Success";
	//const ERROR = "CodeFactory-Error";



	const MIN_LENGTH = 6;















	public static function generate( $options = [] ) 
	{

        $length = (isset($options['length']) ? filter_var($options['length'], FILTER_VALIDATE_INT, ['options' => ['default' => self::MIN_LENGTH, 'min_range' => 1]]) : self::MIN_LENGTH );

        $prefix = (isset($options['prefix']) ? self::cleanString(filter_var($options['prefix'], FILTER_SANITIZE_STRING)) : '' );

        $suffix = (isset($options['suffix']) ? self::cleanString(filter_var($options['suffix'], FILTER_SANITIZE_STRING)) : '' );
        $useLetters = (isset($options['letters']) ? filter_var($options['letters'], FILTER_VALIDATE_BOOLEAN) : true );

        $useNumbers = (isset($options['numbers']) ? filter_var($options['numbers'], FILTER_VALIDATE_BOOLEAN) : true );

        $useSymbols = (isset($options['symbols']) ? filter_var($options['symbols'], FILTER_VALIDATE_BOOLEAN) : false );

        $useMixedCase = (isset($options['mixed_case']) ? filter_var($options['mixed_case'], FILTER_VALIDATE_BOOLEAN) : false );




        $useLowerCase = (isset($options['lower_case']) ? filter_var($options['lower_case'], FILTER_VALIDATE_BOOLEAN) : true );




        $mask = (isset($options['mask']) ? filter_var($options['mask'], FILTER_SANITIZE_STRING) : false );

        $uppercase = ['Q', 'W', 'E', 'R', 'T', 'Y', 'U', 'I', 'O', 'P', 'A', 'S', 'D', 'F', 'G', 'H', 'J', 'K', 'L', 'Z', 'X', 'C', 'V', 'B', 'N', 'M'];

        $lowercase = ['q', 'w', 'e', 'r', 't', 'y', 'u', 'i', 'o', 'p', 'a', 's', 'd', 'f', 'g', 'h', 'j', 'k', 'l', 'z', 'x', 'c', 'v', 'b', 'n', 'm'];

        $numbers = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];

        $symbols = ['`', '~', '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '-', '_', '=', '+', '\\', '|', '/', '[', ']', '{', '}', '"', "'", ';', ':', '<', '>', ',', '.', '?'];

        $characters = [];

        $coupon = '';


        if ( $useLetters ) 
        {
            if ($useMixedCase) 
            {
                $characters = array_merge($characters, $lowercase, $uppercase);

            }//end if
            elseif($useLowerCase)
            {

                $characters = array_merge($characters, $lowercase);

            }
            else 
            {
                $characters = array_merge($characters, $uppercase);

            }//end else

        }//end if




        /*
        if ( $useLetters ) 
        {
            if ($useMixedCase) 
            {
                $characters = array_merge($characters, $lowercase, $uppercase);

            }//end if
            else 
            {
                $characters = array_merge($characters, $uppercase);

            }//end else

        }//end if
        */




        if ( $useNumbers ) 
        {
            $characters = array_merge($characters, $numbers);

        }//end if




        if ( $useSymbols ) 
        {
            $characters = array_merge($characters, $symbols);

        }//end if





        if ( $mask ) 
        {

            for ( $i = 0; $i < strlen($mask); $i++ ) 
            {

                if ( $mask[$i] === 'X' ) 
                {

                    $coupon .= $characters[mt_rand(0, count($characters) - 1)];

                }//end if
                else 
                {
                    $coupon .= $mask[$i];

                }//end else

            }//end if
        }//end if
        else 
        {
            for ( $i = 0; $i < $length; $i++ ) 
            {
                $coupon .= $characters[mt_rand(0, count($characters) - 1)];

            }//end for

        }//end else


        return $prefix . $coupon . $suffix;



    }//END generate











    /*

    public static function generate_coupons( $maxNumberOfCoupons = 1, $options = [] ) 
    {

        $coupons = [];

        for ($i = 0; $i < $maxNumberOfCoupons; $i++) 
        {

            $temp = self::generate($options);

            $coupons[] = $temp;

        }//end for

        return $coupons;

    }//END generate_coupons























    public static function generate_coupons_to_xls( $maxNumberOfCoupons = 1, $filename, $options = [] ) 
    {

        $filename = (empty(trim($filename)) ? 'coupons' : trim($filename));

        header('Content-Type: application/vnd.ms-excel');

        echo 'Coupon Codes' . "\t\n";

        for ($i = 0; $i < $maxNumberOfCoupons; $i++) 
        {

            $temp = self::generate($options);

            echo $temp . "\t\n";
        }//end for

        header('Content-disposition: attachment; filename=' . $filename . '.xls');

    }//END generate_coupons_to_xls


*/


















    private static function cleanString( $string, $options = [] ) 
    {


        $toUpper = (isset($options['uppercase']) ? filter_var($options['uppercase'], FILTER_VALIDATE_BOOLEAN) : false);
        $toLower = (isset($options['lowercase']) ? filter_var($options['lowercase'], FILTER_VALIDATE_BOOLEAN) : false);

        $striped = preg_replace('/[^a-zA-Z0-9]/', '', trim($string));

        // make uppercase
        if ($toLower && $toUpper) 
        {
            throw new Exception('You cannot set both options (uppercase|lowercase) to "true"!');

        }//end if
        elseif ($toLower) 
        {
            return strtolower($striped);

        }//end elseif
        elseif ($toUpper) 
        {
            return strtoupper($striped);

        }//end elseif
        else 
        {

            return $striped;

        }//end else


    }//END cleanString



























	/*

	public static function setError( $msg )
	{

		$_SESSION[CodeFactory::ERROR] = $msg;

	}//END setError









	public static function getError()
	{

		$msg = (isset($_SESSION[CodeFactory::ERROR]) && $_SESSION[CodeFactory::ERROR]) ? $_SESSION[CodeFactory::ERROR] : '';

		CodeFactory::clearError();

		return $msg;

	}//END getError







	public static function clearError()
	{
		$_SESSION[CodeFactory::ERROR] = NULL;

	}//END clearError








	public static function setSuccess($msg)
	{

		$_SESSION[CodeFactory::SUCCESS] = $msg;

	}//END setSuccess






	public static function getSuccess()
	{

		$msg = (isset($_SESSION[CodeFactory::SUCCESS]) && $_SESSION[CodeFactory::SUCCESS]) ? $_SESSION[CodeFactory::SUCCESS] : '';

		CodeFactory::clearSuccess();

		return $msg;

	}//END getSuccess







	public static function clearSuccess()
	{
		$_SESSION[CodeFactory::SUCCESS] = NULL;

	}//END clearSuccess 


	*/










}//END class CodeFactory




 ?>