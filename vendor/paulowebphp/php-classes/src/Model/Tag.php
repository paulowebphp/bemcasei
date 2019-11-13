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

						'thumb'=>'casal1.png',
						'file'=>'casal1.pdf'

					],

					'1'=>
					[

						'thumb'=>'casal2.png',
						'file'=>'casal2.pdf'

					],


					'3'=>
					[

						'thumb'=>'familia-noivo.png',
						'file'=>'familia-noivo.pdf'

					],

					'4'=>
					[

						'thumb'=>'familia-noiva.png',
						'file'=>'familia-noiva.pdf'

					],

					'5'=>
					[

						'thumb'=>'familia1.png',
						'file'=>'familia1.pdf'

					],

					'6'=>
					[

						'thumb'=>'familia2.png',
						'file'=>'familia2.pdf'

					],

					'7'=>
					[

						'thumb'=>'familia3.png',
						'file'=>'familia3.pdf'

					],

					'8'=>
					[

						'thumb'=>'padrinhos.png',
						'file'=>'padrinhos.pdf'

					],

					'9'=>
					[

						'thumb'=>'numeros.png',
						'file'=>'numeros.pdf'

					],

					'10'=>
					[

						'thumb'=>'reservado.png',
						'file'=>'reservado.pdf'

					]
			

					


				],//end freedom




				'love'=>
				[

					'0'=>
					[

						'thumb'=>'casal1.png',
						'file'=>'casal1.pdf'

					],

					'1'=>
					[

						'thumb'=>'casal2.png',
						'file'=>'casal2.pdf'

					],


					'3'=>
					[

						'thumb'=>'familia-noivo.png',
						'file'=>'familia-noivo.pdf'

					],

					'4'=>
					[

						'thumb'=>'familia-noiva.png',
						'file'=>'familia-noiva.pdf'

					],

					'5'=>
					[

						'thumb'=>'familia1.png',
						'file'=>'familia1.pdf'

					],

					'6'=>
					[

						'thumb'=>'familia2.png',
						'file'=>'familia2.pdf'

					],

					'7'=>
					[

						'thumb'=>'familia3.png',
						'file'=>'familia3.pdf'

					],

					'8'=>
					[

						'thumb'=>'padrinhos.png',
						'file'=>'padrinhos.pdf'

					],

					'9'=>
					[

						'thumb'=>'numeros.png',
						'file'=>'numeros.pdf'

					],

					'10'=>
					[

						'thumb'=>'reservado.png',
						'file'=>'reservado.pdf'

					]


				],//end love





				'classic'=>
				[

					'0'=>
					[

						'thumb'=>'casal1.png',
						'file'=>'casal1.pdf'

					],

					'1'=>
					[

						'thumb'=>'casal2.png',
						'file'=>'casal2.pdf'

					],


					'3'=>
					[

						'thumb'=>'familia-noivo.png',
						'file'=>'familia-noivo.pdf'

					],

					'4'=>
					[

						'thumb'=>'familia-noiva.png',
						'file'=>'familia-noiva.pdf'

					],

					'5'=>
					[

						'thumb'=>'familia1.png',
						'file'=>'familia1.pdf'

					],

					'6'=>
					[

						'thumb'=>'familia2.png',
						'file'=>'familia2.pdf'

					],

					'7'=>
					[

						'thumb'=>'familia3.png',
						'file'=>'familia3.pdf'

					],

					'8'=>
					[

						'thumb'=>'padrinhos.png',
						'file'=>'padrinhos.pdf'

					],

					'9'=>
					[

						'thumb'=>'numeros.png',
						'file'=>'numeros.pdf'

					],

					'10'=>
					[

						'thumb'=>'reservado.png',
						'file'=>'reservado.pdf'

					]


				],//end classic
				


				'gold'=>
				[

					'0'=>
					[

						'thumb'=>'casal1.png',
						'file'=>'casal1.pdf'

					],

					'1'=>
					[

						'thumb'=>'casal2.png',
						'file'=>'casal2.pdf'

					],


					'3'=>
					[

						'thumb'=>'familia-noivo.png',
						'file'=>'familia-noivo.pdf'

					],

					'4'=>
					[

						'thumb'=>'familia-noiva.png',
						'file'=>'familia-noiva.pdf'

					],

					'5'=>
					[

						'thumb'=>'familia1.png',
						'file'=>'familia1.pdf'

					],

					'6'=>
					[

						'thumb'=>'familia2.png',
						'file'=>'familia2.pdf'

					],

					'7'=>
					[

						'thumb'=>'familia3.png',
						'file'=>'familia3.pdf'

					],

					'8'=>
					[

						'thumb'=>'padrinhos.png',
						'file'=>'padrinhos.pdf'

					],

					'9'=>
					[

						'thumb'=>'numeros.png',
						'file'=>'numeros.pdf'

					],

					'10'=>
					[

						'thumb'=>'reservado.png',
						'file'=>'reservado.pdf'

					]


				]//end gold



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