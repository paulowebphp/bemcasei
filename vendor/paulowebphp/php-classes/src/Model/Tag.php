<?php 

namespace Core\Model;

use \Core\Model;



class Tag extends Model
{

	# Session
	const SESSION = "TagSession";

	# Error - Success
	const SUCCESS = "Tag-Success";
	const ERROR = "Tag-Error";








		public function getTags()
		{

			
			$this->setData([


				'freedom'=>
				[

					'0'=>
					[

						'thumb'=>'Casal_1.png',
						'file'=>'Casal_1.pdf'

					],

					'1'=>
					[

						'thumb'=>'Casal_2.png',
						'file'=>'Casal_2.pdf'

					],

					'3'=>
					[

						'thumb'=>'Familia_1.png',
						'file'=>'Familia_1.pdf'

					],

					'4'=>
					[

						'thumb'=>'Familia_2.png',
						'file'=>'Familia_2.pdf'

					],

					'5'=>
					[

						'thumb'=>'Familia_3.png',
						'file'=>'Familia_3.pdf'

					],

					'6'=>
					[

						'thumb'=>'Mesa_Reservada.png',
						'file'=>'Mesa_Reservada.pdf'

					],

					'7'=>
					[

						'thumb'=>'Numeros.png',
						'file'=>'Numeros.pdf'

					],

					'8'=>
					[

						'thumb'=>'Padrinhos.png',
						'file'=>'Padrinhos.pdf'

					]


				],//end freedom




				'love'=>
				[

					'0'=>
					[

						'thumb'=>'Casal_1.png',
						'file'=>'Casal_1.pdf'

					],

					'1'=>
					[

						'thumb'=>'Casal_2.png',
						'file'=>'Casal_2.pdf'

					],

					'3'=>
					[

						'thumb'=>'Familia_1.png',
						'file'=>'Familia_1.pdf'

					],

					'4'=>
					[

						'thumb'=>'Familia_2.png',
						'file'=>'Familia_2.pdf'

					],

					'5'=>
					[

						'thumb'=>'Familia_3.png',
						'file'=>'Familia_3.pdf'

					],

					'6'=>
					[

						'thumb'=>'Mesa_Reservada.png',
						'file'=>'Mesa_Reservada.pdf'

					],

					'7'=>
					[

						'thumb'=>'Numeros.png',
						'file'=>'Numeros.pdf'

					],

					'8'=>
					[

						'thumb'=>'Padrinhos.png',
						'file'=>'Padrinhos.pdf'

					]


				],//end love





				'classic'=>
				[

					'0'=>
					[

						'thumb'=>'Casal_1.png',
						'file'=>'Casal_1.pdf'

					],

					'1'=>
					[

						'thumb'=>'Casal_2.png',
						'file'=>'Casal_2.pdf'

					],

					'3'=>
					[

						'thumb'=>'Familia_1.png',
						'file'=>'Familia_1.pdf'

					],

					'4'=>
					[

						'thumb'=>'Familia_2.png',
						'file'=>'Familia_2.pdf'

					],

					'5'=>
					[

						'thumb'=>'Familia_3.png',
						'file'=>'Familia_3.pdf'

					],

					'6'=>
					[

						'thumb'=>'Mesa_Reservada.png',
						'file'=>'Mesa_Reservada.pdf'

					],

					'7'=>
					[

						'thumb'=>'Numeros.png',
						'file'=>'Numeros.pdf'

					],

					'8'=>
					[

						'thumb'=>'Padrinhos.png',
						'file'=>'Padrinhos.pdf'

					]


				],//end classic
				


				'gold'=>
				[

					'0'=>
					[

						'thumb'=>'Casal_1.png',
						'file'=>'Casal_1.pdf'

					],

					'1'=>
					[

						'thumb'=>'Casal_2.png',
						'file'=>'Casal_2.pdf'

					],

					'3'=>
					[

						'thumb'=>'Familia_1.png',
						'file'=>'Familia_1.pdf'

					],

					'4'=>
					[

						'thumb'=>'Familia_2.png',
						'file'=>'Familia_2.pdf'

					],

					'5'=>
					[

						'thumb'=>'Familia_3.png',
						'file'=>'Familia_3.pdf'

					],

					'6'=>
					[

						'thumb'=>'Mesa_Reservada.png',
						'file'=>'Mesa_Reservada.pdf'

					],

					'7'=>
					[

						'thumb'=>'Numeros.png',
						'file'=>'Numeros.pdf'

					],

					'8'=>
					[

						'thumb'=>'Padrinhos.png',
						'file'=>'Padrinhos.pdf'

					]


				],//end gold




				'convite'=>
				[

					'0'=>
					[

						'thumb'=>'Cha_Bar_1.png',
						'file'=>'Cha_Bar_1.pdf'

					],

					'1'=>
					[

						'thumb'=>'Cha_Bar_2.png',
						'file'=>'Cha_Bar_2.pdf'

					],

					'3'=>
					[

						'thumb'=>'Cha_da_Casa_Nova_1.png',
						'file'=>'Cha_da_Casa_Nova_1.pdf'

					],

					'4'=>
					[

						'thumb'=>'Cha_da_Casa_Nova_2.png',
						'file'=>'Cha_da_Casa_Nova_2.pdf'

					],

					'5'=>
					[

						'thumb'=>'Cha_da_Casa_Nova_3.png',
						'file'=>'Cha_da_Casa_Nova_3.pdf'

					],

					'6'=>
					[

						'thumb'=>'Cha_de_Barnela_1.png',
						'file'=>'Cha_de_Barnela_1.pdf'

					],

					'7'=>
					[

						'thumb'=>'Cha_de_Barnela_2.png',
						'file'=>'Cha_de_Barnela_2.pdf'

					],

					'8'=>
					[

						'thumb'=>'Save_the_Date_1.png',
						'file'=>'Save_the_Date_1.pdf'

					],

					'9'=>
					[

						'thumb'=>'Save_the_Date_2.png',
						'file'=>'Save_the_Date_2.pdf'

					],

					'10'=>
					[

						'thumb'=>'Save_the_Date_3.png',
						'file'=>'Save_the_Date_3.pdf'

					]


				],//end convite




				'plaquinha'=>
				[

					'0'=>
					[

						'thumb'=>'Plaquinha_1.png',
						'file'=>'Plaquinha_1.pdf'

					],

					'1'=>
					[

						'thumb'=>'Plaquinha_2.png',
						'file'=>'Plaquinha_2.pdf'

					],

					'3'=>
					[

						'thumb'=>'Plaquinha_3.png',
						'file'=>'Plaquinha_3.pdf'

					],

					'4'=>
					[

						'thumb'=>'Plaquinha_4.png',
						'file'=>'Plaquinha_4.pdf'

					],

					'5'=>
					[

						'thumb'=>'Plaquinha_5.png',
						'file'=>'Plaquinha_5.pdf'

					]


				]//end plaquinha



			]);//end setData






		}//END get







    









	public static function setError( $msg )
	{

		$_SESSION[Tag::ERROR] = $msg;

	}//END setError









	public static function getError()
	{

		$msg = (isset($_SESSION[Tag::ERROR]) && $_SESSION[Tag::ERROR]) ? $_SESSION[Tag::ERROR] : '';

		Tag::clearError();

		return $msg;

	}//END getError







	public static function clearError()
	{
		$_SESSION[Tag::ERROR] = NULL;

	}//END clearError








	public static function setSuccess($msg)
	{

		$_SESSION[Tag::SUCCESS] = $msg;

	}//END setSuccess






	public static function getSuccess()
	{

		$msg = (isset($_SESSION[Tag::SUCCESS]) && $_SESSION[Tag::SUCCESS]) ? $_SESSION[Tag::SUCCESS] : '';

		Tag::clearSuccess();

		return $msg;

	}//END getSuccess







	public static function clearSuccess()
	{
		$_SESSION[Tag::SUCCESS] = NULL;

	}//END clearSuccess 









}//END class Tag





 ?>