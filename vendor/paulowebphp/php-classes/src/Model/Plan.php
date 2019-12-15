<?php 

namespace Core\Model;

use \Core\DB\Sql;
use \Core\Model;
use \Core\Rule;





class Plan extends Model
{

	const ERROR = "PlanError";
	const SUCCESS = "PlanSuccess";

	


	

	/*public function save()
	{

		

		$sql = new Sql();

		$results = $sql->select("

			CALL sp_plans_save(

				:idplan,
				:iduser,
				:inplancode,
				:inmigration,
				:inperiod,
				:desplan,
				:vlprice,
				:dtbegin,
				:dtend


			)", 
			
			[

				':idplan'=>$this->getidplan(),
				':iduser'=>$this->getiduser(),
				':inplancode'=>$this->getinplancode(),
				':inmigration'=>$this->getinmigration(),
				':inperiod'=>$this->getinperiod(),
				':desplan'=>$this->getdesplan(),
				':vlprice'=>$this->getvlprice(),
				':dtbegin'=>$this->getdtbegin(),
				':dtend'=>$this->getdtend()

			]
		
		);//end select



		//$results[0]['desplan'] = utf8_encode($results[0]['desplan']);

		
		


		if( count($results[0]) > 0 )
		{

			$this->setData($results[0]);

		}//end if



	}//END save*/



	














	public function save()
	{

		

		$sql = new Sql();

		

		
		
		if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
		{
			# code...

			$results = $sql->select("

				CALL sp_plans_save(

					:idplan,
					:iduser,
					:inplancode,
					:incontext,
					:inmigration,
					:inperiod,
					:desplan,
					:vlprice,
					:dtbegin,
					:dtend


				)", 
				
				[

					':idplan'=>$this->getidplan(),
					':iduser'=>$this->getiduser(),
					':inplancode'=>$this->getinplancode(),
					':incontext'=>$this->getincontext(),
					':inmigration'=>$this->getinmigration(),
					':inperiod'=>$this->getinperiod(),
					':desplan'=>utf8_decode($this->getdesplan()),
					':vlprice'=>$this->getvlprice(),
					':dtbegin'=>$this->getdtbegin(),
					':dtend'=>$this->getdtend()

				]
			
			);//end select



			$results[0]['desplan'] = utf8_encode($results[0]['desplan']);
			
				

		}//end if
		else
		{


			$results = $sql->select("

				CALL sp_plans_save(

					:idplan,
					:iduser,
					:inplancode,
					:incontext,
					:inmigration,
					:inperiod,
					:desplan,
					:vlprice,
					:dtbegin,
					:dtend


				)", 
				
				[

					':idplan'=>$this->getidplan(),
					':iduser'=>$this->getiduser(),
					':inplancode'=>$this->getinplancode(),
					':incontext'=>$this->getincontext(),
					':inmigration'=>$this->getinmigration(),
					':inperiod'=>$this->getinperiod(),
					':desplan'=>$this->getdesplan(),
					':vlprice'=>$this->getvlprice(),
					':dtbegin'=>$this->getdtbegin(),
					':dtend'=>$this->getdtend()

				]
			
			);//end select


	        


		}//end else







		if( count($results) > 0 )
		{

			$this->setData($results[0]);

		}//end if



	}//END save




















	public function get( $iduser )
	{

		

		$sql = new Sql();

		$results = $sql->select("

			SELECT SQL_CALC_FOUND_ROWS * 
		    FROM tb_plans a
		    INNER JOIN tb_cartsitems b ON a.idplan = b.iditem
		    INNER JOIN tb_carts c ON b.idcart = c.idcart
		    INNER JOIN tb_orders d ON c.idcart = d.idcart
            INNER JOIN tb_payments e ON d.idpayment = e.idpayment
            INNER JOIN tb_customers f ON d.idcustomer = f.idcustomer
		    INNER JOIN tb_users g ON d.iduser = g.iduser
		    WHERE a.iduser = :iduser
            ORDER BY a.dtregister DESC;

			", 
			
			[

				':iduser'=>$iduser

			]
		
		);//end select






		$nrtotal = $sql->select("
			
			SELECT FOUND_ROWS() AS nrtotal;
			
		");//end select



		if ( count($results) > 0 )
		{
			# code...
			if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
			{
				

				foreach( $results as &$row )
				{
					# code...		
					$row['desplan'] = utf8_encode($row['desplan']);
					$row['desname'] = utf8_encode($row['desname']);

				}//end foreach
					
				
			}//end if
		
		}//end if



		return [

			'results'=>$results,
			'nrtotal'=>(int)$nrtotal[0]["nrtotal"]

		];//end return





	}//END get






































	/*public function getLastPlan( $iduser )
	{

		

		$sql = new Sql();

		$results = $sql->select("

			SELECT SQL_CALC_FOUND_ROWS * 
		    FROM tb_plans a
		    INNER JOIN tb_cartsitems b ON a.idplan = b.iditem
		    INNER JOIN tb_carts c ON b.idcart = c.idcart
		    INNER JOIN tb_orders d ON c.idcart = d.idcart
            INNER JOIN tb_payments e ON d.idpayment = e.idpayment
            INNER JOIN tb_customers f ON d.idcustomer = f.idcustomer
		    INNER JOIN tb_users g ON d.iduser = g.iduser
		    WHERE a.iduser = :iduser
            ORDER BY a.dtregister DESC
            LIMIT 1;

			", 
			
			[

				':iduser'=>$iduser

			]
		
		);//end select





		foreach( $results as &$row )
		{
			# code...		
			$row['desplan'] = utf8_encode($row['desplan']);

		}//end foreach


		//$results[0]['desaddress'] = utf8_encode($results[0]['desaddress']);
		//$results[0]['descity'] = utf8_encode($results[0]['descity']);
		//$results[0]['desdistrict'] = utf8_encode($results[0]['desdistrict']);


			

		$nrtotal = $sql->select("
			
			SELECT FOUND_ROWS() AS nrtotal;
			
		");//end select


	

		return [

			'results'=>$results,
			'nrtotal'=>(int)$nrtotal[0]["nrtotal"]

		];//end return

	}//END getLastPlan*/


































	public function getLastPlan( $iduser )
	{

		

		$sql = new Sql();

		$results = $sql->select("

			SELECT * 
		    FROM tb_plans a
		    INNER JOIN tb_cartsitems b ON a.idplan = b.iditem
		    INNER JOIN tb_carts c ON b.idcart = c.idcart
		    INNER JOIN tb_orders d ON c.idcart = d.idcart
            INNER JOIN tb_payments e ON d.idpayment = e.idpayment
		    INNER JOIN tb_users g ON d.iduser = g.iduser
		    WHERE a.iduser = :iduser
            ORDER BY a.dtregister DESC
            LIMIT 1;

			", 
			
			[

				':iduser'=>$iduser

			]
		
		);//end select





		$nrtotal = $sql->select("
			
			SELECT FOUND_ROWS() AS nrtotal;
			
		");//end select


		




		if ( count($results) > 0 ) 
		{
			# code...

			if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
			{
				

				$results[0]['desplan'] = utf8_encode($results[0]['desplan']);
				
				
			}//end if

	

			return $results[0];
			

		}//end if
		else
		{	

			return false;

		}//end else



		/*if (count($results) > 0 ) 
		{
			# code...

			return [

				'results'=>$results,
				'nrtotal'=>(int)$nrtotal[0]["nrtotal"]

			];//end return

		}//end if*/
	

		

	}//END getLastPlan







































	public function getById( $idplan )
	{

		

		$sql = new Sql();

		$results = $sql->select("

			SELECT * 
		    FROM tb_plans 
		    WHERE idplan = :idplan;

			", 
			
			[

				':idplan'=>$idplan

			]
		
		);//end select




		if( count($results) > 0 )
		{

			if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
			{
				
				$results[0]['desplan'] = utf8_encode($results[0]['desplan']);
					
			}//end if

			$this->setData($results[0]);
			
		}//end if


		

	}//END get






















	public function getRegularPlan( $iduser )
	{

		

		$sql = new Sql();

		$results = $sql->select("

            SELECT SQL_CALC_FOUND_ROWS * 
		    FROM tb_plans a
		    INNER JOIN tb_cartsitems b ON a.idplan = b.iditem
		    INNER JOIN tb_carts c ON b.idcart = c.idcart
		    INNER JOIN tb_orders d ON c.idcart = d.idcart
            INNER JOIN tb_payments e ON d.idpayment = e.idpayment
            INNER JOIN tb_customers f ON d.idcustomer = f.idcustomer
            INNER JOIN tb_fees h ON e.idpayment = h.idpayment
		    INNER JOIN tb_users g ON d.iduser = g.iduser
		    WHERE a.iduser = :iduser
            ORDER BY a.dtregister DESC;



			", 
			
			[

				':iduser'=>$iduser

			]
		
		);//end select






		$nrtotal = $sql->select("
			
			SELECT FOUND_ROWS() AS nrtotal;
			
		");//end select




		if ( count($results) > 0 )
		{
			# code...
			if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
			{
				

				foreach( $results as &$row )
				{
					# code...		
					$row['desplan'] = utf8_encode($row['desplan']);

				}//end foreach
					
				
			}//end if

		}//end if

		

		return [

			'results'=>$results,
			'nrtotal'=>(int)$nrtotal[0]["nrtotal"]

		];//end return





	}//END get














/*public function getFreePlan( $iduser )
{

	

	$sql = new Sql();

	$results = $sql->select("

		SELECT SQL_CALC_FOUND_ROWS * 
	    FROM tb_plans a
	    INNER JOIN tb_users g ON a.iduser = g.iduser
	    WHERE a.iduser = :iduser
	    AND a.inplancode = 0
        ORDER BY a.dtregister DESC;

		", 
		
		[

			':iduser'=>$iduser

		]
	
	);//end select





	foreach( $results as &$row )
	{
		# code...		
		$row['desplan'] = utf8_encode($row['desplan']);

	}//end foreach



	//$results[0]['desaddress'] = utf8_encode($results[0]['desaddress']);
	//$results[0]['descity'] = utf8_encode($results[0]['descity']);
	//$results[0]['desdistrict'] = utf8_encode($results[0]['desdistrict']);


		

	$nrtotal = $sql->select("
		
		SELECT FOUND_ROWS() AS nrtotal;
		
	");//end select




	return [

		'results'=>$results,
		'nrtotal'=>(int)$nrtotal[0]["nrtotal"]

	];//end return

}//END get*/
































public function getFreePlan( $iduser )
{

	

	$sql = new Sql();

	$results = $sql->select("

		SELECT * 
	    FROM tb_plans
	    WHERE iduser = :iduser
	    AND inplancode = 0
        ORDER BY dtregister DESC
        LIMIT 1;

		", 
		
		[

			':iduser'=>$iduser

		]
	
	);//end select




		



	if ( count($results) > 0) 
	{
		# code...

		if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
		{
			
			$results[0]['desplan'] = utf8_encode($results[0]['desplan']);
				
		}//end if

		return $results[0];

	}//end if
	





}//END getFreePlan

































public function getFirstPlan( $iduser )
{

	

	$sql = new Sql();

	$results = $sql->select("

		SELECT * 
	    FROM tb_plans
	    WHERE iduser = :iduser
        ORDER BY dtregister DESC
        LIMIT 1;

		", 
		
		[

			':iduser'=>$iduser

		]
	
	);//end select




		



	if ( count($results) > 0) 
	{
		# code...

		if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
		{
			
			$results[0]['desplan'] = utf8_encode($results[0]['desplan']);
				
		}//end if

		return $results[0];

	}//end if
	





}//END getFreePlan

































	/*public function get( $iduser )
	{

		

		$sql = new Sql();

		$results = $sql->select("

			SELECT SQL_CALC_FOUND_ROWS * 
		    FROM tb_plans a
		    INNER JOIN tb_cartsitems b ON a.idplan = b.iditem
		    INNER JOIN tb_carts c ON b.idcart = c.idcart
		    INNER JOIN tb_orders d ON c.idcart = d.idcart
            INNER JOIN tb_payments e ON d.idpayment = e.idpayment
            INNER JOIN tb_customers f ON d.idcustomer = f.idcustomer
		    INNER JOIN tb_users g ON d.iduser = g.iduser
		    WHERE a.iduser = :iduser
            ORDER BY a.dtregister DESC;

			", 
			
			[

				':iduser'=>$iduser

			]
		
		);//end select

		//$results[0]['desaddress'] = utf8_encode($results[0]['desaddress']);
		//$results[0]['descity'] = utf8_encode($results[0]['descity']);
		//$results[0]['desdistrict'] = utf8_encode($results[0]['desdistrict']);


			

		$nrtotal = $sql->select("
			
			SELECT FOUND_ROWS() AS nrtotal;
			
		");//end select

		return [

			'results'=>$results,
			'nrtotal'=>(int)$nrtotal[0]["nrtotal"]

		];//end return

	}//END get*/









	public static function getLastPlanPurchased( $iduser )
	{

		

		$sql = new Sql();

		$results = $sql->select("

			SELECT * 
		    FROM tb_plans a
		    INNER JOIN tb_cartsitems b ON a.idplan = b.iditem
		    INNER JOIN tb_carts c ON b.idcart = c.idcart
		    INNER JOIN tb_orders d ON c.idcart = d.idcart
            INNER JOIN tb_payments e ON d.idpayment = e.idpayment
		    INNER JOIN tb_users g ON d.iduser = g.iduser
		    WHERE a.iduser = :iduser
		    AND e.inpaymentstatus IN (5,9)
            ORDER BY a.dtregister DESC
            LIMIT 1;

			", 
			
			[

				':iduser'=>$iduser

			]
		
		);//end select

		


				

		//$results[0]['desplan'] = utf8_encode($results[0]['desplan']);


		if(count($results) > 0)
		{	

			if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
			{
				
				$results[0]['desplan'] = utf8_encode($results[0]['desplan']);
					
			}//end if

			return $results[0];

		}//end if
		else
		{

			return false;

		}//end else


	}//END getLastPlanPurchased





































	/*public static function getLastPlanPurchased( $iduser )
	{

		

		$sql = new Sql();

		$results = $sql->select("

			SELECT * 
		    FROM tb_plans a
		    INNER JOIN tb_users d ON a.iduser = d.iduser
		    WHERE a.iduser = :iduser
		    ORDER BY a.dtregister DESC
		    LIMIT 1;




		    SELECT * 
		    FROM tb_plans a
		    INNER JOIN tb_cartsitems b ON a.idplan = b.iditem
		    INNER JOIN tb_carts c ON b.idcart = c.idcart
		    INNER JOIN tb_orders d ON c.idcart = d.idcart
            INNER JOIN tb_payments e ON d.idpayment = e.idpayment
            INNER JOIN tb_customers f ON d.idcustomer = f.idcustomer
		    INNER JOIN tb_users g ON d.iduser = g.iduser
		    WHERE a.iduser = :iduser
		    AND e.inpaymentstatus IN (5,9);
            ORDER BY a.dtregister DESC
            LIMIT 1;

			", 
			
			[

				':iduser'=>$iduser

			]
		
		);//end select

		$results[0]['desplan'] = utf8_encode($results[0]['desplan']);


				

		//$results[0]['desplan'] = utf8_encode($results[0]['desplan']);


		if(count($results) > 0)
		{

			return $results[0];

		}//end if


	}//END getLastPlanPurchased*/



































	public static function updateLastPlanDtEnd( $idplan, $iduser, $dt_newest_plan_begin )
	{



		$sql = new Sql();

		$results = $sql->query("

			UPDATE tb_plans
			SET dtend = :dt_newest_plan_begin
			WHERE idplan = :idplan
			AND iduser = :iduser

			", 
			
			[

				'idplan'=>$idplan,
				'iduser'=>$iduser,
				':dt_newest_plan_begin'=>$dt_newest_plan_begin

			]
		
		);//end query


	}//END updateLastPlanDtEnd




























	public static function getPlan( $idplan )
	{

		

		$sql = new Sql();

		$results = $sql->select("

			SELECT * 
		    FROM tb_plans a
		    INNER JOIN tb_users d ON a.iduser = d.iduser
		    WHERE a.idplan = :idplan;

			", 
			
			[

				':idplan'=>$idplan

			]
		
		);//end select




		if(count($results) > 0)
		{

			if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
			{
				
				$results[0]['desplan'] = utf8_encode($results[0]['desplan']);
					
			}//end if

			return $results[0];

		}//end if


	}//END get



























	public static function getPlanArrayRenewal( $inplancontext )
	{

		$inplan = Plan::getPlansFullArray();


		return [

			'0'=>$inplan[$inplancontext.'01'],
			'1'=>$inplan[$inplancontext.'03'],
			'2'=>$inplan[$inplancontext.'04'],
			'3'=>$inplan[$inplancontext.'06'],
			'4'=>$inplan[$inplancontext.'09'],
			'5'=>$inplan[$inplancontext.'12']

		];




	}//END getPlanArrayRenewal

























	/*public static function getPlanArrayRenewal( $inplan )
	{

		

		switch ($inplan) 
		{
			
			case '103':
			case '104':
			case '106':
			case '109':
			case '112':
				return 
				[

					'0'=>'101',
					'1'=>'103',
					'2'=>'104',
					'3'=>'106',
					'4'=>'109',
					'5'=>'112'
				];
				break;


			case '203':
			case '204':
			case '206':
			case '209':
			case '212':
				return 
				[

					'0'=>'201',
					'1'=>'203',
					'2'=>'204',
					'3'=>'206',
					'4'=>'209',
					'5'=>'212'
				];
				break;


			case '303':
			case '304':
			case '306':
			case '309':
			case '312':
				return 
				[

					'0'=>'301',
					'1'=>'303',
					'2'=>'304',
					'3'=>'306',
					'4'=>'309',
					'5'=>'312'
				];
				break;

		}//end switch

	}//END getPlanArrayRenewal
*/





























	public function delete()
	{

		$sql = new Sql();

		$sql->query("

			DELETE FROM tb_plans
			WHERE idplan = :idplan

			", 
			
			[

				'idplan'=>$this->getidplan()

			]
		
		);//end query

	}//END delete





























	public static function getPlanArrayUpgrade( $inplancontext, $sufix )
	{


		switch ( $inplancontext ) 
		{

			//case '0':
				//header('Location: /dashboard/planos');
				//exit;
				//break;
			
			case '1':
				return 
				[

					'0'=>Plan::getPlanArray('2'.$sufix),
					'1'=>Plan::getPlanArray('3'.$sufix)
				];


			case '2':
				return 
				[

					// Precsa começar no indice 1. Verificar dashboard-plans-renewal.php
					'1'=>Plan::getPlanArray('3'.$sufix)
				];


			case '3':
				return [];

		}//end switch


	}//END getPlanArrayUpgrade














	public static function getPlansFullArray()
	{

		
		$plan = [

			'0'=>  
				
				[

					'vlprice'=>'0.00', 
					'inperiod'=>'10', 
					'desperiod'=>'dias', 
					'inplancontext'=>'0', 
					'inplancode'=>'0',
					'desvlprice'=>'',
					'desplan'=>Rule::PLAN_NAME_FREE
				],




			'101'=>
				[

					'vlprice'=>'25.90',  
					'inperiod'=>'1', 
					'desperiod'=>'mês', 
					'inplancontext'=>'1', 
					'inplancode'=>'101',
					'desvlprice'=>'vinte e cinco reais e noventa centavos',
					'desplan'=>Rule::PLAN_NAME_BASIC
				],
				


			'103'=>
				 [
					'vlprice'=>'48.90',
					'inperiod'=>'3',
					'desperiod'=>'meses',
					'inplancontext'=>'1',  
					'inplancode'=>'103',
					'desvlprice'=>'quarenta e oito reais e noventa centavos',
					'desplan'=>Rule::PLAN_NAME_BASIC
				],
				


			'104'=>
				[
					'vlprice'=>'62.90',
					'inperiod'=>'4',
					'desperiod'=>'meses', 
					'inplancontext'=>'1', 
					'inplancode'=>'104',
					'desvlprice'=>'sessenta e dois reais e noventa centavos',
					'desplan'=>Rule::PLAN_NAME_BASIC
				],
				


			'106'=>
				[
					'vlprice'=>'85.90',
					'inperiod'=>'6',
					'desperiod'=>'meses', 
					'inplancontext'=>'1', 
					'inplancode'=>'106',
					'desvlprice'=>'oitenta e cinco reais e noventa centavos',
					'desplan'=>Rule::PLAN_NAME_BASIC
				],
				


			'109'=>
				[
					'vlprice'=>'108.90',
					'inperiod'=>'9',
					'desperiod'=>'meses',
					'inplancontext'=>'1', 
					'inplancode'=>'109',
					'desvlprice'=>'cento e oito reais e noventa centavos',
					'desplan'=>Rule::PLAN_NAME_BASIC
				],
				


			'112'=>
				# code...
				[
					'vlprice'=>'132.90',
					'inperiod'=>'12', 
					'desperiod'=>'meses',
					'inplancontext'=>'1', 
					'inplancode'=>'112',
					'desvlprice'=>'cento e trinta e dois reais e noventa centavos',
					'desplan'=>Rule::PLAN_NAME_BASIC
				],
				


			'201'=>
				[
					'vlprice'=>'69.90',
					'inperiod'=>'1',
					'desperiod'=>'mês', 
					'inplancontext'=>'2', 
					'inplancode'=>'201',
					'desvlprice'=>'sessenta e nove reais e noventa centavos',
					'desplan'=>Rule::PLAN_NAME_INTERMEDIATE
				],
				


			'203'=>
				[
					'vlprice'=>'84.90',
					'inperiod'=>'3',
					'desperiod'=>'meses', 
					'inplancontext'=>'2',
					'inplancode'=>'203',
					'desvlprice'=>'oitenta e quatro reais e noventa centavos',
					'desplan'=>Rule::PLAN_NAME_INTERMEDIATE
				],
				


			'204'=>
				[
					'vlprice'=>'95.90',
					'inperiod'=>'4',
					'desperiod'=>'meses', 
					'inplancontext'=>'2',
					'inplancode'=>'204',
					'desvlprice'=>'noventa e cinco reais e noventa centavos',
					'desplan'=>Rule::PLAN_NAME_INTERMEDIATE
				],
				


			'206'=>

				[
					'vlprice'=>'119.90',
					'inperiod'=>'6',
					'desperiod'=>'meses', 
					'inplancontext'=>'2',
					'inplancode'=>'206',
					'desvlprice'=>'cento e dezenove reais e noventa centavos',
					'desplan'=>Rule::PLAN_NAME_INTERMEDIATE
				],
				


			'209'=>
				[
					'vlprice'=>'142.90',
					'inperiod'=>'9',
					'desperiod'=>'meses', 
					'inplancontext'=>'2',
					'inplancode'=>'209',
					'desvlprice'=>'cento e quarenta e dois reais e noventa centavos',
					'desplan'=>Rule::PLAN_NAME_INTERMEDIATE
				],
				


			'212'=>
				[
					'vlprice'=>'177.90',
					'inperiod'=>'12',
					'desperiod'=>'meses', 
					'inplancontext'=>'2',
					'inplancode'=>'212',
					'desvlprice'=>'cento e setenta e sete reais e noventa centavos',
					'desplan'=>Rule::PLAN_NAME_INTERMEDIATE
				],
				


			'301'=>
				[
					'vlprice'=>'109.90',
					'inperiod'=>'1',
					'desperiod'=>'mês', 
					'inplancontext'=>'3',
					'inplancode'=>'301',
					'desvlprice'=>'cento e nove reais e noventa centavos',
					'desplan'=>Rule::PLAN_NAME_ADVANCED
				],
				


			'303'=>
				[
					'vlprice'=>'120.90',
					'inperiod'=>'3',
					'desperiod'=>'meses', 
					'inplancontext'=>'3',
					'inplancode'=>'303',
					'desvlprice'=>'cento e vinte reais e noventa centavos',
					'desplan'=>Rule::PLAN_NAME_ADVANCED
				],
				


			'304'=>
				[
					'vlprice'=>'143.90',
					'inperiod'=>'4',
					'desperiod'=>'meses', 
					'inplancontext'=>'3',
					'inplancode'=>'304',
					'desvlprice'=>'cento e quarenta e três reais e noventa centavos',
					'desplan'=>Rule::PLAN_NAME_ADVANCED
				],
				


			'306'=>
				[
					'vlprice'=>'167.90',
					'inperiod'=>'6',
					'desperiod'=>'meses', 
					'inplancontext'=>'3',
					'inplancode'=>'306',
					'desvlprice'=>'cento e sessenta e sete reais e noventa centavos',
					'desplan'=>Rule::PLAN_NAME_ADVANCED

				],
				


			'309'=>
				[
					'vlprice'=>'190.90',
					'inperiod'=>'9',
					'desperiod'=>'meses', 
					'inplancontext'=>'3',
					'inplancode'=>'309',
					'desvlprice'=>'cento e noventa reais e noventa centavos',
					'desplan'=>Rule::PLAN_NAME_ADVANCED
				],
				


			'312'=>
				[
					'vlprice'=>'214.90',
					'inperiod'=>'12', 
					'desperiod'=>'meses',
					'inplancontext'=>'3',
					'inplancode'=>'312',
					'desvlprice'=>'duzentos e quatorze reais e noventa centavos',
					'desplan'=>Rule::PLAN_NAME_ADVANCED
				]
				
				

		];//end array
		
			

		return $plan;



	}//END getPlansFullArray


























	public static function getPlanArray( $inplan )
	{

		$plans = Plan::getPlansFullArray();


		switch( $inplan )
		{

			case '0':
				# code...
				return $plans['0'];
				break;


			case '101':
				return $plans['101'];
				break;


			case '103':
				return $plans['103'];
				break;


			case '104':
				return $plans['104'];
				break;


			case '106':
				return $plans['106'];
				break;


			case '109':
				return $plans['109'];
				break;


			case '112':
				# code...
				return $plans['112'];
				break;


			case '201':
				return $plans['201'];
				break;


			case '203':
				return $plans['203'];
				break;


			case '204':
				return $plans['204'];
				break;


			case '206':

				return $plans['206'];
				break;


			case '209':
				return $plans['209'];
				break;


			case '212':
				return $plans['212'];
				break;


			case '301':
				return $plans['301'];
				break;


			case '303':
				return $plans['303'];
				break;


			case '304':
				return $plans['304'];
				break;


			case '306':
				return $plans['306'];


			case '309':
				return $plans['309'];
				break;


			case '312':
				return $plans['312'];
				
			

		}//end switch





	}//END getPlanArray










	



	

	public static function setError( $msg )
	{

		$_SESSION[Plan::ERROR] = $msg;


	}//END setMsgErro





	public static function getError()
	{

		$msg = (isset($_SESSION[Plan::ERROR])) ? $_SESSION[Plan::ERROR] : "";

		Plan::clearError();

		return $msg;

	}//END getMsgErro





	public static function clearError()
	{

		$_SESSION[Plan::ERROR] = NULL;

	}//END clearMsgError













	public static function setSuccess( $msg )
	{

		$_SESSION[Plan::SUCCESS] = $msg;


	}//END setMsgErro





	public static function getSuccess()
	{

		$msg = (isset($_SESSION[Plan::SUCCESS])) ? $_SESSION[Plan::SUCCESS] : "";

		Plan::clearSuccess();

		return $msg;

	}//END getMsgErro





	public static function clearSuccess()
	{

		$_SESSION[Plan::SUCCESS] = NULL;

	}//END clearMsgError











}//END class Plan





 ?>