<?php 

namespace Core\Model;

use \Core\DB\Sql;
use \Core\Model;


class PaymentStatus extends Model
{


	


	const CREATED = 1;
	const WAITING = 2;
	const IN_ANALYSIS = 3;
	const PRE_AUTHORIZED = 4;

	const AUTHORIZED = 5;
	const CANCELLED = 6;

	const REFUNDED = 7;
	const REVERSED = 8;
	
	const SETTLED = 9;



	/*
	const WAITING = 1;
	const AUTHORIZED = 2;
	const CANCELLED = 3;
	const REVERSED = 4;
	const SETTLED = 5;
	*/




	public static function getStatus( $status )
	{

		switch ( $status ) 
    	{

    		case 'CREATED':
    			# code...
    			return PaymentStatus::CREATED;


    		case 'WAITING':
    			# code...
    			return PaymentStatus::WAITING;


    		case 'IN_ANALYSIS':
    			return PaymentStatus::IN_ANALYSIS;


    		case 'PRE_AUTHORIZED':
    			return PaymentStatus::PRE_AUTHORIZED;


    		case 'AUTHORIZED':
    			return PaymentStatus::AUTHORIZED;


    		case 'CANCELLED':
    			# code...
    			return PaymentStatus::CANCELLED;

    		case 'REFUNDED':
    			# code...
    			return PaymentStatus::REFUNDED;

    		case 'REVERSED':
				# code...
				return PaymentStatus::REVERSED;



			case 'SETTLED':
				# code...
				return PaymentStatus::SETTLED;

    	
    	}//end switch



	}//end getStatus











	public static function getPaymentStatus( $value )
	{

		switch ( $value ) 
    	{

			case PaymentStatus::CREATED:
				return 'Pedido Criado';


			case PaymentStatus::WAITING:
				return 'Aguardando';


			case PaymentStatus::IN_ANALYSIS:
				return 'Em Análise';

			case PaymentStatus::PRE_AUTHORIZED:
				return 'Pré-Autorizado';


			case PaymentStatus::AUTHORIZED:
				return 'Autorizado';

			case PaymentStatus::CANCELLED:
				return 'Cancelado';

			case PaymentStatus::REFUNDED:
				return 'Devolvido';

			case PaymentStatus::REVERSED:
				return 'Estornado';


			case PaymentStatus::SETTLED:
				return 'Concluído';

    	
    	}//end switch



	}//end getStatus








}//END class PaymentStatus




 ?>