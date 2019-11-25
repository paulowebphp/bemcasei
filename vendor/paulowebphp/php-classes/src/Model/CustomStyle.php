<?php 

namespace Core\Model;


use \Core\DB\Sql;
use \Core\Model;




class CustomStyle extends Model
{

	# Session
	const SESSION = "CustomStyleSession";

	# Error - Success
	const SUCCESS = "CustomStyle-Success";
	const ERROR = "CustomStyle-Error";












	public function update()
	{

		$sql = new Sql();

		$results = $sql->select("

			CALL sp_customstyle_update(
			               
                :idcustomstyle,
                :iduser,
                :idtemplate,
                :desbanner,
                :desbannerextension,
                :desbgcolorbanner,
                :desbgcolorfooter,
                :descolorfooter,
                :descolorfooterhover,
                :descolor1,
                :descolor2,
                :descolortexthover,
                :descolordate,
                :desfontfamilydate,
                :desfontfamily1,
                :desfontfamily2,
                :inbgcolorgradient,
                :inbgcolorbutton,
                :inroundborderimage,
                :inbordersocial,
                :desborderimagesize,
                :desborderradiusbutton


  
			)", 
			
			[

				':idcustomstyle'=>$this->getidcustomstyle(),
				':iduser'=>$this->getiduser(),
				':idtemplate'=>$this->getidtemplate(),
				':desbanner'=>$this->getdesbanner(),
				':desbannerextension'=>$this->getdesbannerextension(),
				':desbgcolorbanner'=>$this->getdesbgcolorbanner(),
				':desbgcolorfooter'=>$this->getdesbgcolorfooter(),
				':descolorfooter'=>$this->getdescolorfooter(),
				':descolorfooterhover'=>$this->getdescolorfooterhover(),
				':descolor1'=>$this->getdescolor1(),
				':descolor2'=>$this->getdescolor2(),
				':descolortexthover'=>$this->getdescolortexthover(),
				':descolordate'=>$this->getdescolordate(),
				':desfontfamilydate'=>$this->getdesfontfamilydate(),
				':desfontfamily1'=>$this->getdesfontfamily1(),
				':desfontfamily2'=>$this->getdesfontfamily2(),
				':inbgcolorgradient'=>$this->getinbgcolorgradient(),
				':inbgcolorbutton'=>$this->getinbgcolorbutton(),
				':inroundborderimage'=>$this->getinroundborderimage(),
				':inbordersocial'=>$this->getinbordersocial(),
				':desborderimagesize'=>$this->getdesborderimagesize(),
				':desborderradiusbutton'=>$this->getdesborderradiusbutton()
				
			]
        
            
        );//end select

		

		

		if( count($results) > 0 )
		{

			$this->setData($results[0]);

		}//end if

        

	}//END save










    
    /*public function update()
	{

		$sql = new Sql();

		$results = $sql->select("

			CALL sp_customstyle_update(
			               
                :idcustomstyle,
                :iduser,
                :idtemplate,
                :desbanner,
                :desbannerextension,
                :descolorheader,
                :descolorheaderhover,
                :desbgcolorfooter,
                :descolorfooter,
                :descolorfooterhover,
                :descolorh1,
                :desfontfamilyh1,
                :descolorh2,
                :desfontfamilyh2,
                :descolorh3,
                :desfontfamilyh3,
                :descolorh4,
                :desfontfamilyh4,
                :descolorh5,
                :desfontfamilyh5,
                :descolortext,
                :desfontfamilytext,
                :descolorlinkhover,
                :desbgcolorbutton,
                :descolorbutton,
                :desborderradiusbutton,
                :desfontfamilybutton,
                :inroundborder,
                :desroundbordersize


  
			)", 
			
			[

				':idcustomstyle'=>$this->getidcustomstyle(),
				':iduser'=>$this->getiduser(),
				':idtemplate'=>$this->getidtemplate(),
				':desbanner'=>$this->getdesbanner(),
				':desbannerextension'=>$this->getdesbannerextension(),
				':descolorheader'=>$this->getdescolorheader(),
				':descolorheaderhover'=>$this->getdescolorheaderhover(),
				':desbgcolorfooter'=>$this->getdesbgcolorfooter(),
				':descolorfooter'=>$this->getdescolorfooter(),
				':descolorfooterhover'=>$this->getdescolorfooterhover(),
				':descolorh1'=>$this->getdescolorh1(),
				':desfontfamilyh1'=>$this->getdesfontfamilyh1(),
				':descolorh2'=>$this->getdescolorh2(),
				':desfontfamilyh2'=>$this->getdesfontfamilyh2(),
				':descolorh3'=>$this->getdescolorh3(),
				':desfontfamilyh3'=>$this->getdesfontfamilyh3(),
				':descolorh4'=>$this->getdescolorh4(),
				':desfontfamilyh4'=>$this->getdesfontfamilyh4(),

				':descolorh5'=>$this->getdescolorh5(),
				':desfontfamilyh5'=>$this->getdesfontfamilyh5(),

				':descolortext'=>$this->getdescolortext(),
				':desfontfamilytext'=>$this->getdesfontfamilytext(),
				':descolorlinkhover'=>$this->getdescolorlinkhover(),
				':desbgcolorbutton'=>$this->getdesbgcolorbutton(),
				':descolorbutton'=>$this->getdescolorbutton(),
				':desborderradiusbutton'=>$this->getdesborderradiusbutton(),
				':desfontfamilybutton'=>$this->getdesfontfamilybutton(),
				':inroundborder'=>$this->getinroundborder(),
				':desroundbordersize'=>$this->getdesroundbordersize()
				
			]
        
            
        );//end select

		

		

		if( count($results) > 0 )
		{

			$this->setData($results[0]);

		}//end if

        

	}//END save*/








	public static function updateTemplate( $iduser, $idcustomstyle, $idtemplate )
	{

		$sql = new Sql();

		$sql->query("

			UPDATE tb_customstyle
			SET idtemplate = :idtemplate
			WHERE iduser = :iduser
			AND idcustomstyle = :idcustomstyle

			", 
			
			[

				':iduser'=>$iduser,
				':idcustomstyle'=>$idcustomstyle,
				':idtemplate'=>$idtemplate

			]
		
		);//end select


	}//END updateTemplate









	public function get( $iduser )
	{

		$sql = new Sql();

		$results = $sql->select("

			SELECT *
			FROM tb_customstyle
			WHERE iduser = :iduser

			", 
			
			[

				':iduser'=>$iduser

			]
		
		);//end select

		
		

		if( count($results) > 0 )
		{

			$this->setData($results[0]);
			
		}//end if

	}//END get









	/*public static function getTemplateNames( $idtemplate )
	{

		$names = [


			'1'=>[

				'0'=>'Carla',
				'1'=>'Sabrina'

			],


			'2'=>[

				'0'=>'Henrique',
				'1'=>'Carlos'

			],


			'3'=>[

				'0'=>'Gustavo',
				'1'=>'Vicente'

			],


			'4'=>[

				'0'=>'Thais',
				'1'=>'Rebeca'

			],


			'5'=>[

				'0'=>'Carla',
				'1'=>'Sabrina'

			]


		];

		return $names[$idtemplate];

	}//END getTemplateNames
*/














	public static function getTemplateInfoFullArray()
	{

		$fullArray = [


			'1'=>[

				'name'=>'Rainbow',
				'thumb'=>'tpl1.jpg'

			],

			'2'=>[

				'name'=>'Freedom',
				'thumb'=>'tpl2.jpg'

			],

			'3'=>[

				'name'=>'Gold',
				'thumb'=>'tpl3.jpg'

			],

			'4'=>[

				'name'=>'Hot',
				'thumb'=>'tpl4.jpg'

			],

			'5'=>[

				'name'=>'Lovers',
				'thumb'=>'tpl5.jpg'

			]


		];//end fullArray

		
		return $fullArray;

		//return $fullArray[$idtemplate];


	}//END getTemplateNames

































	public static function getTemplateInfo( $idtemplate )
	{


		$fullArray = CustomStyle::getTemplateInfoFullArray();

		
		return $fullArray[$idtemplate];

		//return $fullArray[$idtemplate];


	}//END getTemplateNames
































	public static function getTemplateStyle( $idtemplate )
	{

		
		$array = [



			'1'=>[


				//03A9F4
				
				'desbgcolorbanner'=>'03A9F4',
				'desbgcolorfooter'=>'03A9F4',
				'descolorfooter'=>'FFFFFF',
				'descolorfooterhover'=>'C7E8F7',

				'descolor1'=>'FFFFFF',
				'descolor2'=>'03A9F4',
				'descolortexthover'=>'03A9F4',
				'descolordate'=>'FFFFFF',
				'desfontfamilydate'=>'Norican',
				'desfontfamily1'=>'Norican',
				'desfontfamily2'=>'OpenSans',

				'inbgcolorgradient'=>0,
				'inbgcolorbutton'=>0,
				'inroundborderimage'=>1,
				'inbordersocial'=>1,
				'desborderimagesize'=>'12',
				'desborderradiusbutton'=>'20'





				

			],

			'2'=>[

				//D24203

				'desbgcolorbanner'=>'D24203',
				'desbgcolorfooter'=>'D24203',
				'descolorfooter'=>'FFFFFF',
				'descolorfooterhover'=>'F7D9E1',

				'descolor1'=>'FFFFFF',
				'descolor2'=>'D24203',
				'descolortexthover'=>'D24203',
				'descolordate'=>'FFFFFF',
				'desfontfamilydate'=>'Norican',
				'desfontfamily1'=>'Norican',
				'desfontfamily2'=>'OpenSans',

				'inbgcolorgradient'=>0,
				'inbgcolorbutton'=>0,
				'inroundborderimage'=>1,
				'inbordersocial'=>1,
				'desborderimagesize'=>'12',
				'desborderradiusbutton'=>'20'

			],




			'3'=>[

				//F5BE1D


				'desbgcolorbanner'=>'F5BE1D',
				'desbgcolorfooter'=>'F5BE1D',
				'descolorfooter'=>'FFFFFF',
				'descolorfooterhover'=>'F7D9E1',

				'descolor1'=>'FFFFFF',
				'descolor2'=>'F5BE1D',
				'descolortexthover'=>'F5BE1D',
				'descolordate'=>'FFFFFF',
				'desfontfamilydate'=>'Norican',
				'desfontfamily1'=>'Norican',
				'desfontfamily2'=>'OpenSans',

				'inbgcolorgradient'=>0,
				'inbgcolorbutton'=>1,
				'inroundborderimage'=>1,
				'inbordersocial'=>1,
				'desborderimagesize'=>'12',
				'desborderradiusbutton'=>'20'

			],







			'4'=>[


				//C91425

				'desbgcolorbanner'=>'C91425',
				'desbgcolorfooter'=>'C91425',
				'descolorfooter'=>'FFFFFF',
				'descolorfooterhover'=>'F7D9E1',

				'descolor1'=>'FFFFFF',
				'descolor2'=>'C91425',
				'descolortexthover'=>'C91425',
				'descolordate'=>'FFFFFF',
				'desfontfamilydate'=>'Norican',
				'desfontfamily1'=>'Norican',
				'desfontfamily2'=>'OpenSans',

				'inbgcolorgradient'=>0,
				'inbgcolorbutton'=>0,
				'inroundborderimage'=>1,
				'inbordersocial'=>1,
				'desborderimagesize'=>'12',
				'desborderradiusbutton'=>'20'


			],






			'5'=>[


				//FAB1A0

				'desbgcolorbanner'=>'FAB1A0',
				'desbgcolorfooter'=>'FAB1A0',
				'descolorfooter'=>'FFFFFF',
				'descolorfooterhover'=>'F7D9E1',

				'descolor1'=>'FFFFFF',
				'descolor2'=>'FAB1A0',
				'descolortexthover'=>'FAB1A0',
				'descolordate'=>'FFFFFF',
				'desfontfamilydate'=>'Norican',
				'desfontfamily1'=>'Norican',
				'desfontfamily2'=>'OpenSans',

				'inbgcolorgradient'=>1,
				'inbgcolorbutton'=>0,
				'inroundborderimage'=>1,
				'inbordersocial'=>1,
				'desborderimagesize'=>'12',
				'desborderradiusbutton'=>'20'

			]





		];



		return $array[$idtemplate];

	}//END listAll








	public function delete()
	{

		$sql = new Sql();

		$sql->query("

			DELETE FROM tb_customstyle
			WHERE idcustomstyle = :idcustomstyle

			", 
			
			[

				'idcustomstyle'=>$this->getidcustomstyle()

			]
		
		);//end query

	}//END delete







	public static function setError( $msg )
	{

		$_SESSION[CustomStyle::ERROR] = $msg;

	}//END setError









	public static function getError()
	{

		$msg = (isset($_SESSION[CustomStyle::ERROR]) && $_SESSION[CustomStyle::ERROR]) ? $_SESSION[CustomStyle::ERROR] : '';

		CustomStyle::clearError();

		return $msg;

	}//END getError







	public static function clearError()
	{
		$_SESSION[CustomStyle::ERROR] = NULL;

	}//END clearError








	public static function setSuccess($msg)
	{

		$_SESSION[CustomStyle::SUCCESS] = $msg;

	}//END setSuccess






	public static function getSuccess()
	{

		$msg = (isset($_SESSION[CustomStyle::SUCCESS]) && $_SESSION[CustomStyle::SUCCESS]) ? $_SESSION[CustomStyle::SUCCESS] : '';

		CustomStyle::clearSuccess();

		return $msg;

	}//END getSuccess







	public static function clearSuccess()
	{
		$_SESSION[CustomStyle::SUCCESS] = NULL;

	}//END clearSuccess 









	public function toSession()
	{
		$_SESSION[CustomStyle::SESSION] = $this->getValues();

	}//END toSession







	public function getFromSession()
	{

		$this->setData($_SESSION[CustomStyle::SESSION]);

	}//END getFromSession









}//END class CustomStyle




 ?>