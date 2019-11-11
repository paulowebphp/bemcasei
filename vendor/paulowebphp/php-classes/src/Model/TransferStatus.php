<?php 

namespace Core\Model;

use \Core\DB\Sql;
use \Core\Model;


class TransferStatus extends Model
{


	const REQUESTED = 1;
	const COMPLETED = 2;
	const FAILED = 3;




	/*const CREATED = 1;
	const WAITING = 2;
	const IN_ANALYSIS = 3;
	const PRE_AUTHORIZED = 4;
	const AUTHORIZED = 5;
	const CANCELLED = 6;
	const REFUNDED = 7;
	const REVERSED = 8;
	const SETTLED = 9;*/






	public static function getStatus( $status )
	{

		switch ( $status ) 
    	{

    		case 'REQUESTED':
    			# code...
    			return TransferStatus::REQUESTED;


    		case 'COMPLETED':
    			# code...
    			return TransferStatus::COMPLETED;


    		case 'FAILED':
    			return TransferStatus::FAILED;



    	
    	}//end switch



	}//end getStatus















}//END class TransferStatus




 ?>