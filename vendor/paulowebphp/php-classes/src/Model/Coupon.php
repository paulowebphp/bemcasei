<?php 

namespace Core\Model;


use \Core\DB\Sql;
use \Core\Model;
use \Core\Rule;




class Coupon extends Model
{

	# Session
	const SESSION = "CouponSession";

	# Error - Success
	const SUCCESS = "Coupon-Success";
	const ERROR = "Coupon-Error";



	const MIN_LENGTH = 6;














    /*public function update()
	{

		$sql = new Sql();

		

		$results = $sql->select("

			CALL sp_coupons_update(
			               
                :idcoupon,
                :inusage,
                :descouponcode,
                :desdescription,
                :vlpercentage,
                :vlinverse,
                :dtexpire

                

			)", 
			
			[

				
				':idcoupon'=>$this->getidcoupon(),
				':inusage'=>$this->getinusage(),
				':descouponcode'=>$this->getdescouponcode(),
				':desdescription'=>$this->getdesdescription(),
				':vlpercentage'=>$this->getvlpercentage(),
				':vlinverse'=>$this->getvlinverse(),
				':dtexpire'=>$this->getdtexpire()
				
			]
        
            
        );//end select


		
	

		if( count($results) > 0 )
		{

			//$results[0]['desdescription'] = utf8_encode($results[0]['desdescription']);

			$this->setData($results[0]);

		}//end if

        

	}//END save*/































	public function update()
	{

		$sql = new Sql();

		

		


        if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
		{
			# code...

			$results = $sql->select("

				CALL sp_coupons_update(
				               
	                :idcoupon,
	                :inusage,
	                :descouponcode,
	                :desdescription,
	                :vlpercentage,
	                :vlinverse,
	                :dtexpire

	                

				)", 
				
				[

					
					':idcoupon'=>$this->getidcoupon(),
					':inusage'=>$this->getinusage(),
					':descouponcode'=>$this->getdescouponcode(),
					':desdescription'=>utf8_decode($this->getdesdescription()),
					':vlpercentage'=>$this->getvlpercentage(),
					':vlinverse'=>$this->getvlinverse(),
					':dtexpire'=>$this->getdtexpire()
					
				]
	        
	            
	        );//end select
			

			$results[0]['desdescription'] = utf8_encode($results[0]['desdescription']);

			

		}//end if
		else
		{


			$results = $sql->select("

				CALL sp_coupons_update(
				               
	                :idcoupon,
	                :inusage,
	                :descouponcode,
	                :desdescription,
	                :vlpercentage,
	                :vlinverse,
	                :dtexpire

	                

				)", 
				
				[

					
					':idcoupon'=>$this->getidcoupon(),
					':inusage'=>$this->getinusage(),
					':descouponcode'=>$this->getdescouponcode(),
					':desdescription'=>$this->getdesdescription(),
					':vlpercentage'=>$this->getvlpercentage(),
					':vlinverse'=>$this->getvlinverse(),
					':dtexpire'=>$this->getdtexpire()
					
				]
	        
	            
	        );//end select


	        


		}//end else


		
	

		if( count($results) > 0 )
		{

			//$results[0]['desdescription'] = utf8_encode($results[0]['desdescription']);

			$this->setData($results[0]);

		}//end if

        

	}//END save























	





















	public function getCoupon( $idcoupon )
	{

		$sql = new Sql();

		$results = $sql->select("

			SELECT *
			FROM tb_coupons
			WHERE idcoupon = :idcoupon
			ORDER BY dtregister DESC
			LIMIT 1;

			", 
			
			[

				':idcoupon'=>$idcoupon

			]
		
		);//end select


		if( count($results) > 0 )
		{

			if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
			{
				
				$results[0]['desdescription'] = utf8_encode($results[0]['desdescription']);
					
			}//end if


			$this->setData($results[0]);
			
		}//end if

	}//END getEvent








































	




	public static function checkCouponExists( $descouponcode )
	{
		

		$sql = new Sql();

		$results = $sql->select("

			SELECT *
			FROM tb_coupons
			WHERE descouponcode = :descouponcode
			ORDER BY dtregister DESC
			LIMIT 1;

			", 
			
			[

				':descouponcode'=>$descouponcode

			]
		
		);//end select





		if( count($results) > 0 )
		{

			if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
			{
				
				$results[0]['desdescription'] = utf8_encode($results[0]['desdescription']);
					
			}//end if

			return $results[0];
			
			
		}//end if
		else
		{

			return false;

		}//end else



	}//END checkCouponExists






























	public static function checkAndApplyCoupon( $iduser, $idcoupon )
	{

		$sql = new Sql();

		$results = $sql->select("

			SELECT *
			FROM tb_couponsusers
			WHERE idcoupon = :idcoupon
			AND iduser = :iduser
			ORDER BY dtregister DESC
			LIMIT 1;

			", 
			
			[

				':iduser'=>$iduser,
				':idcoupon'=>$idcoupon

			]
		
		);//end select

		
		


		if( count($results) > 0 )
		{


			return $results[0];
			
			
		}//end if
		else
		{

			return Coupon::setCouponUser( $iduser,$idcoupon );

		}//end else



	}//END checkCouponExists















	public static function checkCouponIsApplied( $idcoupon )
	{

		$sql = new Sql();

		$results = $sql->select("

			SELECT *
			FROM tb_couponsusers
			WHERE idcoupon = :idcoupon
			AND instatus = 1
			ORDER BY dtregister DESC
			LIMIT 1;

			", 
			
			[

				':idcoupon'=>$idcoupon

			]
		
		);//end select

		
		


		if( count($results) > 0 )
		{


			return true;
			
			
		}//end if
		else
		{

			return false;

		}//end else



	}//END checkCouponExists














	/*public static function checkCouponIsApplied( $iduser, $idcoupon )
	{

		$sql = new Sql();

		$results = $sql->select("

			SELECT *
			FROM tb_couponsusers
			WHERE idcoupon = :idcoupon
			AND iduser = :iduser
			ORDER BY dtregister DESC
			LIMIT 1;

			", 
			
			[

				':iduser'=>$iduser,
				':idcoupon'=>$idcoupon

			]
		
		);//end select

		
		


		if( count($results) > 0 )
		{


			return $results[0];
			
			
		}//end if
		else
		{

			return false;

		}//end else



	}//END checkCouponExists*/
















	/*public static function addUserToCoupon( $iduser, $idcoupon, $instatus = 0 )
	{

		$sql = new Sql();

		$results = $sql->select("

			INSERT INTO tb_couponsusers (idcoupon,iduser,instatus,desipcoupon)
			VALUES(:idcoupon,:iduser,:instatus,:desipcoupon);

			", 
			
			[

				':iduser'=>$iduser,
				':idcoupon'=>$idcoupon,
				':instatus'=>$instatus,
				':desipcoupon'=>$_SERVER['REMOTE_ADDR']

			]
		
		);//end select


		if ( count($results) > 0 )
		{
			# code...
			return $results[0];

		}//end if



	}//END checkCouponExists*/






	public static function setCouponUser( 

		$iduser, 
		$idcoupon,
		$idcouponuser = null, 
		$instatus = 0 

	)
	{

		$sql = new Sql();

		
		
		$results = $sql->select("

			CALL sp_couponsusers_update(
			               
                :idcouponuser,
                :idcoupon,
                :iduser,
                :instatus,
                :desipcoupon
               

			)", 
			
			[

				':idcouponuser'=>$idcouponuser,
				':idcoupon'=>$idcoupon,
				':iduser'=>$iduser,
				':instatus'=>$instatus,
				':desipcoupon'=>$_SERVER['REMOTE_ADDR']
				
			]
        
            
        );//end select


	
        


		if ( count($results) > 0 )
		{
			# code...

			return $results[0];

		}//end if



	}//END setCouponUser


































	public static function deleteCouponUser( $iduser, $idcoupon )
	{

		$sql = new Sql();

		$results = $sql->select("

			DELETE FROM tb_couponsusers 
			WHERE idcoupon = :idcoupon
			AND iduser = :iduser;

			", 
			
			[

				':iduser'=>$iduser,
				':idcoupon'=>$idcoupon

			]
		
		);//end select


		return true;



	}//END checkCouponExists


















































	public function get( $iduser )
	{

		$sql = new Sql();

		$results = $sql->select("

			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_coupons
			ORDER BY dtregister DESC

		");//end select


		/*foreach( $results as &$row )
		{
			# code...		
			$row['descouponcode'] = utf8_encode($row['descouponcode']);
			$row['desdescription'] = utf8_encode($row['desdescription']);

		}//end foreach*/



		$nrtotal = $sql->select("
			
			SELECT FOUND_ROWS() AS nrtotal;
			
		");//end select

		return [

			'results'=>$results,
			'nrtotal'=>(int)$nrtotal[0]["nrtotal"]

		];//end return


		/**if( count($results) > 0 )
		{

			$this->setData($results);
			
		}//end if  */

	}//END get





















	public function getPage( $iduser, $page = 1, $itensPerPage = 10 )
	{

		$start = ($page - 1) * $itensPerPage;

		$sql = new Sql();

		$results = $sql->select("

			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_coupons
			WHERE iduser = :iduser
			ORDER BY inposition,
			descouponcode,
			dtregister DESC
			LIMIT $start, $itensPerPage;

			", 
			
			[

				':iduser'=>$iduser

			]
		
		);//end select


		/*foreach( $results as &$row )
		{
			# code...		
			$row['descouponcode'] = utf8_encode($row['descouponcode']);
			$row['desdescription'] = utf8_encode($row['desdescription']);

		}//end foreach*/

		$nrtotal = $sql->select("
		
			SELECT FOUND_ROWS() AS nrtotal;
			
		");//end select

		return [

			'results'=>$results,
			'nrtotal'=>(int)$nrtotal[0]["nrtotal"],
			'pages'=>ceil($nrtotal[0]["nrtotal"] / $itensPerPage)

		];//end return


		

		/**if( count($results) > 0 )
		{

			$this->setData($results);
			
		}//end if */

    }//END getPage












    




    public function getSearch( $iduser, $search, $page = 1, $itensPerPage = 10 )
	{

		$start = ($page - 1) * $itensPerPage;

		$sql = new Sql();

		$results = $sql->select("

			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_coupons
			WHERE iduser = :iduser AND descouponcode LIKE :search
			ORDER BY inposition,
			descouponcode,
			dtregister DESC
			LIMIT $start, $itensPerPage;

			", 
			
			[

				':iduser'=>$iduser,
				':search'=>'%'.$search.'%'

			]
		
		);//end select



		$nrtotal = $sql->select("
		
			SELECT FOUND_ROWS() AS nrtotal;
			
		");//end select


		


		

		/*if( count($results) > 0 )
		{

			if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
			{
				

				foreach( $results as &$row )
				{
					# code...		
					$results[0]['desdescription'] = utf8_encode($results[0]['desdescription']);

				}//end foreach
					
				
			}//end if
			
		}//end if*/



		return [

			'results'=>$results,
			'nrtotal'=>(int)$nrtotal[0]["nrtotal"],
			'pages'=>ceil($nrtotal[0]["nrtotal"] / $itensPerPage)

		];//end return

		

    }//END getSearch

















































	public static function generate( $options = [] ) 
	{

        $length = (isset($options['length']) ? filter_var($options['length'], FILTER_VALIDATE_INT, ['options' => ['default' => self::MIN_LENGTH, 'min_range' => 1]]) : self::MIN_LENGTH );

        $prefix = (isset($options['prefix']) ? self::cleanString(filter_var($options['prefix'], FILTER_SANITIZE_STRING)) : '' );

        $suffix = (isset($options['suffix']) ? self::cleanString(filter_var($options['suffix'], FILTER_SANITIZE_STRING)) : '' );
        $useLetters = (isset($options['letters']) ? filter_var($options['letters'], FILTER_VALIDATE_BOOLEAN) : true );

        $useNumbers = (isset($options['numbers']) ? filter_var($options['numbers'], FILTER_VALIDATE_BOOLEAN) : true );

        $useSymbols = (isset($options['symbols']) ? filter_var($options['symbols'], FILTER_VALIDATE_BOOLEAN) : false );

        $useMixedCase = (isset($options['mixed_case']) ? filter_var($options['mixed_case'], FILTER_VALIDATE_BOOLEAN) : false );

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
            else 
            {
                $characters = array_merge($characters, $uppercase);

            }//end else

        }//end if




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
















































    public static function listAll()
	{
		$sql = new Sql();

		$results = $sql->select("

			SELECT * 
			FROM tb_coupons 
			ORDER BY dtregister DESC;

		");//end select


		if (count($results) > 0 ) 
		{
			# code...

			if ($_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME )
			{
				# code...
				foreach ($results as &$row) 
				{
					# code...
					$row['desdescription'] = utf8_encode($row['desdescription']);

				}//end foreach

			}//end if
			


			return $results;
			
		}//end if
		
	}//END listAll



















	

	




	public function delete()
	{
		$sql = new Sql();

		$sql->query("
		
			DELETE FROM tb_coupons
			WHERE idcoupon = :idcoupon
			
			",
			
			[

				':idcoupon'=>$this->getidcoupon()

			]
		
		);//end query

	}//END delete








	public static function setError( $msg )
	{

		$_SESSION[Coupon::ERROR] = $msg;

	}//END setError









	public static function getError()
	{

		$msg = (isset($_SESSION[Coupon::ERROR]) && $_SESSION[Coupon::ERROR]) ? $_SESSION[Coupon::ERROR] : '';

		Coupon::clearError();

		return $msg;

	}//END getError







	public static function clearError()
	{
		$_SESSION[Coupon::ERROR] = NULL;

	}//END clearError








	public static function setSuccess($msg)
	{

		$_SESSION[Coupon::SUCCESS] = $msg;

	}//END setSuccess






	public static function getSuccess()
	{

		$msg = (isset($_SESSION[Coupon::SUCCESS]) && $_SESSION[Coupon::SUCCESS]) ? $_SESSION[Coupon::SUCCESS] : '';

		Coupon::clearSuccess();

		return $msg;

	}//END getSuccess







	public static function clearSuccess()
	{
		$_SESSION[Coupon::SUCCESS] = NULL;

	}//END clearSuccess 











}//END class Coupon




 ?>