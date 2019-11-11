<?php 

namespace Core\Model;

use \Core\DB\Sql;
use \Core\Model;


class Status extends Model
{


	/**const EM_ABERTO = 1;
	const AGUARDANDO_PAGAMENTO = 2;
	const PAGO = 3;
	const ENTREGUE = 4; 

	const AGUARDANDO_PAGAMENTO = 1;
	const EM_ANALISE = 2;
	const PAGA = 3;
	const DISPONIVEL = 4;
	const EM_DISPUTA = 5;
	const DEVOLVIDA = 6;
	const CANCELADA = 7;
	*/

	const ORD_CREATED = 1;
	const ORD_WAITING = 2;
	const ORD_PAID = 3;
	const ORD_NOT_PAID = 4;
	const ORD_REVERTED = 5;



	const PAY_CREATED = 1;
	const PAY_WAITING = 2;
	const PAY_IN_ANALYSIS = 3;
	const PAY_PRE_AUTHORIZED = 4;
	const PAY_AUTHORIZED = 5;
	const PAY_CANCELLED = 6;
	const PAY_REFUNDED = 7;
	const PAY_REVERSED = 8;
	const PAY_SETTLED = 9;



	public static function listAll()
	{

		$sql = new Sql();

		$results = $sql->select("

			SELECT * FROM tb_ordersstatus
			ORDER BY idstatus

		");//end select

		foreach( $results as &$row )
		{
			# code...		
			$row['desstatus'] = utf8_encode($row['desstatus']);
			
		}//end foreach

		return $results;
		
		
	}//END listAll





}//END class Status




 ?>