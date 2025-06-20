<?php if(!class_exists('Rain\Tpl')){exit;}?><style type="text/css">




    
    section h1{
        color: <?php if( $customstyle["descolor1"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["descolor1"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>#FFFFFF<?php } ?>;
        font-family: <?php if( $customstyle["desfontfamily1"] != '' ){ ?>'<?php echo htmlspecialchars( $customstyle["desfontfamily1"], ENT_COMPAT, 'UTF-8', FALSE ); ?>'<?php }else{ ?>'Norican'<?php } ?>;
    }
    section h2{
        color: <?php if( $customstyle["descolordate"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["descolordate"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>#FFFFFF<?php } ?>;
        font-family: <?php if( $customstyle["desfontfamilydate"] != '' ){ ?>'<?php echo htmlspecialchars( $customstyle["desfontfamilydate"], ENT_COMPAT, 'UTF-8', FALSE ); ?>'<?php }else{ ?>'Norican'<?php } ?>;
    }
    section h3{
        color: <?php if( $customstyle["descolor2"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["descolor2"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>#DD716F<?php } ?>;
        font-family: <?php if( $customstyle["desfontfamily1"] != '' ){ ?>'<?php echo htmlspecialchars( $customstyle["desfontfamily1"], ENT_COMPAT, 'UTF-8', FALSE ); ?>'<?php }else{ ?>'Norican'<?php } ?>;
    }
    section h4{
        font-family: <?php if( $customstyle["desfontfamily1"] != '' ){ ?>'<?php echo htmlspecialchars( $customstyle["desfontfamily1"], ENT_COMPAT, 'UTF-8', FALSE ); ?>'<?php }else{ ?>'Norican'<?php } ?>;
    }
    section h5{
        font-family: <?php if( $customstyle["desfontfamily2"] != '' ){ ?>'<?php echo htmlspecialchars( $customstyle["desfontfamily2"], ENT_COMPAT, 'UTF-8', FALSE ); ?>'<?php }else{ ?>'OpenSans'<?php } ?>;
    }
    section h6{
        font-family: <?php if( $customstyle["desfontfamily2"] != '' ){ ?>'<?php echo htmlspecialchars( $customstyle["desfontfamily2"], ENT_COMPAT, 'UTF-8', FALSE ); ?>'<?php }else{ ?>'OpenSans'<?php } ?>;
    }








    /********************************HEADER*****************************************/
    header .header-title h3{
        color: <?php if( $customstyle["descolor2"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["descolor2"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>#DD716F<?php } ?>;
        font-family: <?php if( $customstyle["desfontfamily1"] != '' ){ ?>'<?php echo htmlspecialchars( $customstyle["desfontfamily1"], ENT_COMPAT, 'UTF-8', FALSE ); ?>'<?php }else{ ?>'Norican'<?php } ?>;

    }
    header #domain-dropdown-menu a:hover{
        color: <?php if( $customstyle["descolortexthover"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["descolortexthover"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>#DD716F<?php } ?>;
    }
    header .cart-amount {
        color: <?php if( $customstyle["descolor2"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["descolor2"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>#DD716F<?php } ?>;
        font-weight: 700;
    }
    
    header #shopping-item-mobile .shopping-item:hover .product-count {
        background-color: <?php if( $customstyle["descolor2"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["descolor2"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>#DD716F<?php } ?>;
    }
    header .product-count {
        background: none repeat scroll 0 0 <?php if( $customstyle["descolor2"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["descolor2"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>#DD716F<?php } ?>;
    }
    header #menu-condensed i{
        font-size: 30px;
        color: <?php if( $customstyle["descolor2"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["descolor2"], ENT_COMPAT, 'UTF-8', FALSE ); ?>99<?php }else{ ?>#DD716F<?php } ?>;
    }
    header .bar-close .btn-close {
        background:none;
        border: none;
        color: <?php if( $customstyle["descolor2"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["descolor2"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>#DD716F<?php } ?>;
        font-size: 22px;
    }
    /********************************HEADER*****************************************/








    /********************************FOOTER*****************************************/

    footer{
        padding: 5% 5% 2% 5%;
        color: <?php if( $customstyle["descolorfooter"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["descolorfooter"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>#FFFFFF<?php } ?>;
        background-color: <?php if( $customstyle["desbgcolorfooter"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["desbgcolorfooter"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>#DD716F<?php } ?>;
    }
    footer a{
        color: <?php if( $customstyle["descolorfooter"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["descolorfooter"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>#FFFFFF<?php } ?>;
    }
    footer a:hover{
        color: <?php if( $customstyle["descolorfooterhover"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["descolorfooterhover"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>#F7D9E1<?php } ?>;
    }
    footer .bottom-footer p {
      line-height: 24px;
      font-size: 15px;
      padding-top: 20px;
      border-top: 1px solid <?php if( $customstyle["descolorfooter"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["descolorfooter"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>#FFFFFF<?php } ?>;
      color: <?php if( $customstyle["descolorfooter"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["descolorfooter"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>#FFFFFF<?php } ?>;
    }
    footer .footer-title h3{
        font-size: 3rem;
        color: <?php if( $customstyle["descolorfooter"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["descolorfooter"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>#FFFFFF<?php } ?>;
        font-family: <?php if( $customstyle["desfontfamily1"] != '' ){ ?>'<?php echo htmlspecialchars( $customstyle["desfontfamily1"], ENT_COMPAT, 'UTF-8', FALSE ); ?>'<?php }else{ ?>'Norican'<?php } ?>;
    }
    footer .list-group-item{
        margin: 2% 0;
        background: none;
        color: <?php if( $customstyle["descolorfooter"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["descolorfooter"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>#FFFFFF<?php } ?>;
    }
    footer .list-group-item:hover{
        background: none;
        color: <?php if( $customstyle["descolorfooterhover"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["descolorfooterhover"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>#F7D9E1<?php } ?>;
    }
    footer .list-socials a {
      border: <?php if( $customstyle["descolorfooter"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["descolorfooter"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>#FFFFFF<?php } ?> 1px solid;
    }
    footer .list-socials a:hover {
      border: <?php if( $customstyle["descolorfooterhover"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["descolorfooterhover"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>#F7D9E1<?php } ?> 1px solid;
    }
    /********************************FOOTER*****************************************/









    /********************************BANNER*****************************************/
    #banner {
        background: url("/res/images/template/banner/banner2.jpg") no-repeat center;
        background-size: cover;
        width: 100%;
        position: relative;
    }
    #frame{
        background: url("/res/images/frame/frame2.png") no-repeat center;
        background-size: contain;
        display: -webkit-flex;
        display: flex;
        -webkit-align-items: center;
        align-items: center;
        -webkit-justify-content: center;
        justify-content: center;
        margin: 0 auto;
        height: 400px;
    }
    /********************************BANNER*****************************************/








    /***ALBUM,  BESTFRIENDS, EVENTS, MESSAGES, OUTERLISTS, STAKEHOLDERS, VIDEOS, STORE****/
    .alert-domain h1{
        text-align: center;
        color: <?php if( $customstyle["descolor2"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["descolor2"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>#DD716F<?php } ?>;
        font-family: <?php if( $customstyle["desfontfamily1"] != '' ){ ?>'<?php echo htmlspecialchars( $customstyle["desfontfamily1"], ENT_COMPAT, 'UTF-8', FALSE ); ?>'<?php }else{ ?>'Norican'<?php } ?>;

    }
    /***ALBUM,  BESTFRIENDS, EVENTS, MESSAGES, OUTERLISTS, STAKEHOLDERS, VIDEOS, STORE****/











    /********************************DOMAIN*****************************************/
    .dropdown a:hover{
        color: <?php if( $customstyle["descolortexthover"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["descolortexthover"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>#171F26<?php } ?>;

    }
    .section-title hr{
        background-color: <?php if( $customstyle["descolor2"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["descolor2"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>#171F26<?php } ?>;
    }
    /********************************DOMAIN*****************************************/

















    /****************INDEX, WEDDING, PARTY , EVENTS , MESSAGE, STORE ********************/

    .buttons-wrapper button{
      padding: 10px 34px;
      border-radius: <?php if( $customstyle["desborderradiusbutton"] != '' ){ ?><?php echo htmlspecialchars( $customstyle["desborderradiusbutton"], ENT_COMPAT, 'UTF-8', FALSE ); ?>px<?php }else{ ?>20px<?php } ?>;
      font-family: <?php if( $customstyle["desfontfamily1"] != '' ){ ?>'<?php echo htmlspecialchars( $customstyle["desfontfamily1"], ENT_COMPAT, 'UTF-8', FALSE ); ?>'<?php }else{ ?>'Norican'<?php } ?>;

      <?php if( $customstyle["inbgcolorbutton"] == '0' ){ ?>
      background-color: transparent;
      color: <?php if( $customstyle["descolor2"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["descolor2"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>#DD716F<?php } ?>;
      border: 1px solid <?php if( $customstyle["descolor2"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["descolor2"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>#DD716F<?php } ?>;
      <?php }else{ ?>
      background-color: <?php if( $customstyle["descolor2"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["descolor2"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>#DD716F<?php } ?>;;
      color: #FFFFFF;
      border: none;
      <?php } ?>
    }
    /****************INDEX, WEDDING, PARTY , EVENTS , MESSAGE, STORE ********************/



  



    

    /********************************WEDDING, PARTY*****************************************/
    <?php if( $customstyle["inroundborderimage"] == '1' ){ ?>.main-image img{ border-radius: 50%; border: <?php echo htmlspecialchars( $customstyle["desborderimagesize"], ENT_COMPAT, 'UTF-8', FALSE ); ?>px solid #<?php echo htmlspecialchars( $customstyle["descolor2"], ENT_COMPAT, 'UTF-8', FALSE ); ?>99;}<?php } ?>;
    /********************************WEDDING, PARTY*****************************************/






    
</style>










    
<section id="banner">
    
    <div class="domain">
        
        <div class="container">
        

            <div class="row centralizer">
                

                <div class="col-md-6">




                    <div id="frame">       

                        <img alt="Bem Casei Site de Casamento" src="/res/images/template/photo/<?php echo htmlspecialchars( $customstyle["desbanner"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                    </div><!--couple-->




                </div><!--col-md-6-->

           
                

                <div class="col-md-6 text-center">
                    



                    <div class="banner-title-wrapper">

                        
                        <div class="banner-title-box">
                            
                            <h1><?php echo getTemplateNames(1); ?></h1> 
                            <h1>&</h1> 
                            <h1><?php echo getTemplateNames(2); ?></h1>

                        </div><!--banner-title-box-->
                        

                        <div class="banner-date-box">

                            <h2><?php echo getDateDiff($wedding["dtwedding"]); ?></h2>
                            

                        </div><!--banner-date-box-->


                    </div><!--"banner-title-wrapper-->


                </div><!--col-->


            </div><!--row-->



        </div><!--container-->

    </div>
    

</section>












<section class="domain">

    <div class="container-fluid">            
            
            
        <div class="row">
            
            <div class="col-12">


                <div class="section-title">
                        

                    <h3>
                        Casamento
                    </h3>

                    <hr>


                </div><!--section-title-->

                     
               
            </div><!--col-->
        
        </div><!--row-->



      




        <div class="row ">

            <div class="col-12">


                <div class="card-wrapper">


                    <div class="card2 unshadow">
                        

                       
                            
                        <div class="body-header row">

                            <div class="main-image">
                            
                                <img alt="Bem Casei Site de Casamento" src="/res/images/template/photo/<?php echo htmlspecialchars( $wedding["desphoto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                            </div><!--card-photo-->

                        </div><!--card-header-->










                        <div class="body-row centralizer row">
                    


                            <div class="col-md-3 col-5">

                                <h5>                           

                                    <?php if( $wedding["dtwedding"] != '' ){ ?>                       
                                        <?php echo formatDate($wedding["dtwedding"]); ?>
                                    <?php }else{ ?>
                                        -
                                    <?php } ?>

                                </h5>
                                <hr>

                                <div class="card-label">

                                    <h6>Data</h6>

                                </div><!--card-label-->

                            </div><!--col-->






                            <div class="col-md-3 col-5">
                                
                                <h5>
                                    <?php if( $wedding["tmwedding"] != '' ){ ?>
                                        <?php echo formatTime($wedding["tmwedding"]); ?>
                                    <?php }else{ ?>
                                        -
                                    <?php } ?>
                                </h5>
                                <hr>

                                <div class="card-label">

                                    <h6>Horário</h6>

                                </div><!--card-label-->

                            </div><!--col-->

                        </div><!--row-->








                        <div class="body-row row">

                            <div class="col-12">
                                
                                <textarea readonly="readonly" class="description-area"><?php echo htmlspecialchars( $wedding["desdescription"], ENT_COMPAT, 'UTF-8', FALSE ); ?></textarea>

                            </div>

                        </div><!--big-body-row-->












                        <div class="body-row centralizer row">
                    

                            <div class="col-md-3 col-12 inside-row">
                                
                                <h6><?php if( $wedding["descostume"] != '' ){ ?><?php echo htmlspecialchars( $wedding["descostume"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>-<?php } ?></h6>
                                <hr>

                                <div class="card-label">

                                    <h6>Traje</h6>

                                </div><!--card-label-->
                               
                            </div><!--col-->



                            <div class="col-md-6 col-12 inside-row">

                                <h6>

                                    <?php if( $wedding["desaddress"] != '' ){ ?>

                                        <?php echo htmlspecialchars( $wedding["desaddress"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $wedding["desnumber"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                                        <?php if( $wedding["desdistrict"] != '' ){ ?> - Bairro <?php echo htmlspecialchars( $wedding["desdistrict"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?>

                                        <?php if( $wedding["descity"] != '' ){ ?> - <?php echo htmlspecialchars( $wedding["descity"], ENT_COMPAT, 'UTF-8', FALSE ); ?> / <?php echo htmlspecialchars( $wedding["desstate"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?>

                                        <?php if( $wedding["descountry"] != '' ){ ?> / <?php echo htmlspecialchars( $wedding["descountry"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?>

                                    <?php }else{ ?>


                                        -


                                    <?php } ?>

                                </h6>
                                <hr>

                                <div class="card-label">

                                    <h6>Local</h6>

                                </div><!--card-label-->

                            </div><!--col-->

                            


                            <div class="col-md-3 col-12 inside-row">
                                
                                
                                <h6><?php if( $wedding["desdirections"] != '' ){ ?><?php echo htmlspecialchars( $wedding["desdirections"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>-<?php } ?></h6>
                                <hr>

                                <div class="card-label">

                                    <h6>Ponto de Referência</h6>

                                </div><!--card-label-->

                            </div><!--col-->





                        </div><!--row-->












                        <?php if( $wedding["desaddress"] != '' ){ ?>

                        
                        <div class="body-footer row">


                            <div class="buttons-wrapper">
                                
                                <a target="_blank" href='<?php echo setQueryString($wedding["desaddress"],$wedding["desnumber"],$wedding["desdistrict"],$wedding["descity"],$wedding["desstate"],"bicycling"); ?>'>

                                    <button>Bicicleta</button>

                                </a>
                                


                                <a target="_blank" href='<?php echo setQueryString($wedding["desaddress"],$wedding["desnumber"],$wedding["desdistrict"],$wedding["descity"],$wedding["desstate"],"transit"); ?>'>

                                    <button>Transporte Público</button>

                                </a>


                                


                                <a target="_blank" href='<?php echo setQueryString($wedding["desaddress"],$wedding["desnumber"],$wedding["desdistrict"],$wedding["descity"],$wedding["desstate"],"driving"); ?>'>

                                    <button>Carro</button>

                                </a>

                            </div><!--buttons-wrapper-->
                                
                               
                        </div><!--body-footer-->

                        <?php } ?> 



                        
                    </div><!--card-->

                </div><!--wrapper-->    

            </div><!--col-->
    
        </div><!--row-->

       


                

        <div class="row">
            
            <div class="col-12">


                <div class="section-see-more">
                        

                    <a href='/template/<?php echo getTemplate(); ?>/casamento'>
                        
                        <h4>
                            Ver Mais...
                        </h4>

                    </a>


                </div><!--section-see-more-->

                     
               
            </div><!--col-->
        
        </div><!--row-->







    </div><!--container-->

</section>




























<section class="domain">

    <div class="container-fluid">            
            
            
        <div class="row">
            
            <div class="col-12">


                <div class="section-title">
                        

                    <h3>
                        Festa de Casamento
                    </h3>

                    <hr>


                </div><!--section-title-->

                     
               
            </div><!--col-->
        
        </div><!--row-->


             




        <div class="row">

            <div class="col-12">


                <div class="card-wrapper">


                    <div class="card2 unshadow">
                        

                       
                            
                        <div class="body-header row">

                            <div class="main-image">
                            
                                <img alt="Bem Casei Site de Casamento" src="/res/images/template/photo/<?php echo htmlspecialchars( $party["desphoto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                            </div><!--card-photo-->

                        </div><!--card-header-->










                        <div class="body-row centralizer row">
                    


                            <div class="col-md-3 col-5">

                                <h5>                           

                                    <?php if( $party["dtparty"] != '' ){ ?>                       
                                        <?php echo formatDate($party["dtparty"]); ?>
                                    <?php }else{ ?>
                                        -
                                    <?php } ?>

                                </h5>
                                <hr>

                                <div class="card-label">

                                    <h6>Data</h6>

                                </div><!--card-label-->

                            </div><!--col-->






                            <div class="col-md-3 col-5">
                                
                                <h5>
                                    <?php if( $party["tmparty"] != '' ){ ?>
                                        <?php echo formatTime($party["tmparty"]); ?>
                                    <?php }else{ ?>
                                        -
                                    <?php } ?>
                                </h5>
                                <hr>

                                <div class="card-label">

                                    <h6>Horário</h6>

                                </div><!--card-label-->

                            </div><!--col-->

                        </div><!--row-->








                        <div class="body-row row">

                            <div class="col-12">
                                
                                <textarea readonly="readonly" class="description-area"><?php echo htmlspecialchars( $party["desdescription"], ENT_COMPAT, 'UTF-8', FALSE ); ?></textarea>

                            </div>

                        </div><!--big-body-row-->












                        <div class="body-row centralizer row">
                    

                            <div class="col-md-3 col-12 inside-row">
                                
                                <h6><?php if( $party["descostume"] != '' ){ ?><?php echo htmlspecialchars( $party["descostume"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>-<?php } ?></h6>
                                <hr>

                                <div class="card-label">

                                    <h6>Traje</h6>

                                </div><!--card-label-->
                               
                            </div><!--col-->



                            <div class="col-md-6 col-12 inside-row">

                                <h6>

                                    <?php if( $party["desaddress"] != '' ){ ?>

                                        <?php echo htmlspecialchars( $party["desaddress"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $party["desnumber"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                                        <?php if( $party["desdistrict"] != '' ){ ?> - Bairro <?php echo htmlspecialchars( $party["desdistrict"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?>

                                        <?php if( $party["descity"] != '' ){ ?> - <?php echo htmlspecialchars( $party["descity"], ENT_COMPAT, 'UTF-8', FALSE ); ?> / <?php echo htmlspecialchars( $party["desstate"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?>

                                        <?php if( $party["descountry"] != '' ){ ?> / <?php echo htmlspecialchars( $party["descountry"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?>

                                    <?php }else{ ?>


                                        -


                                    <?php } ?>

                                </h6>
                                <hr>

                                <div class="card-label">

                                    <h6>Local</h6>

                                </div><!--card-label-->

                            </div><!--col-->

                            


                            <div class="col-md-3 col-12 inside-row">
                                
                                
                                <h6><?php if( $party["desdirections"] != '' ){ ?><?php echo htmlspecialchars( $party["desdirections"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>-<?php } ?></h6>
                                <hr>

                                <div class="card-label">

                                    <h6>Ponto de Referência</h6>

                                </div><!--card-label-->

                            </div><!--col-->





                        </div><!--row-->












                        <?php if( $party["desaddress"] != '' ){ ?>

                        
                        <div class="body-footer row">


                            <div class="buttons-wrapper">
                                
                                <a target="_blank" href='<?php echo setQueryString($party["desaddress"],$party["desnumber"],$party["desdistrict"],$party["descity"],$party["desstate"],"bicycling"); ?>'>

                                    <button>Bicicleta</button>

                                </a>
                                


                                <a target="_blank" href='<?php echo setQueryString($party["desaddress"],$party["desnumber"],$party["desdistrict"],$party["descity"],$party["desstate"],"transit"); ?>'>

                                    <button>Transporte Público</button>

                                </a>


                                


                                <a target="_blank" href='<?php echo setQueryString($party["desaddress"],$party["desnumber"],$party["desdistrict"],$party["descity"],$party["desstate"],"driving"); ?>'>

                                    <button>Carro</button>

                                </a>

                            </div><!--buttons-wrapper-->
                                
                               
                        </div><!--body-footer-->

                        <?php } ?> 



                        
                    </div><!--card-->

                </div><!--wrapper-->    

            </div><!--col-->
    
        </div><!--row-->

       


                

        <div class="row">
            
            <div class="col-12">


                <div class="section-see-more">
                        

                    <a href='/template/<?php echo getTemplate(); ?>/festa-de-casamento'>
                        
                        <h4>
                            Ver Mais...
                        </h4>

                    </a>


                </div><!--section-see-more-->

                     
               
            </div><!--col-->
        
        </div><!--row-->







    </div><!--container-->

</section>















































<section class="domain">

    <div class="container-fluid">            
            
            
        <div class="row">
            
            <div class="col-12">


                <div class="section-title">
                        

                    <h3>
                        Padrinhos e Madrinhas
                    </h3>

                    <hr>

                </div><!--section-title-->

                     
               
            </div><!--col-->
        
        </div><!--row-->



    



        <div class="row">

            <div class="col-12">
                 

                <div class="card-wrapper">









                    <?php $counter1=-1;  if( isset($bestfriend) && ( is_array($bestfriend) || $bestfriend instanceof Traversable ) && sizeof($bestfriend) ) foreach( $bestfriend as $key1 => $value1 ){ $counter1++; ?>


                    <div class="card1 card-bestfriend">
                        

                       
                            
                        


                        <div class="body-header">

                            <div class="card-image">
                            
                                <img alt="Bem Casei Site de Casamento" src="/res/images/template/photo/<?php echo htmlspecialchars( $value1["desphoto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                            </div><!--card-photo-->

                        </div><!--card-header-->





                        <div class="card-body">
                            


                            <div class="title">


                                <h5><?php echo htmlspecialchars( $value1["desbestfriend"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h5>

                                <hr>


                            </div><!--body-title-->





                            <div class="body-footer">

                                <textarea readonly="readonly" class="description"><?php echo htmlspecialchars( $value1["desdescription"], ENT_COMPAT, 'UTF-8', FALSE ); ?></textarea>

                            </div><!--body-row-->







                        </div><!--card-body-->


                         

                        
                            
                        
                    </div><!--card1-->

                                
                    <?php } ?>


                </div><!--wrapper-->

            </div><!--col-->
    
        </div><!--row-->


        



        <div class="row">
            
            <div class="col-12">


                <div class="section-see-more">
                        

                    <a href='/template/<?php echo getTemplate(); ?>/padrinhos-madrinhas'>
                        
                        <h4>
                            Ver Mais...
                        </h4>

                    </a>


                </div><!--section-see-more-->

                     
               
            </div><!--col-->
        
        </div><!--row-->
        






    </div><!--container-->

</section>
























<section class="domain">

    <div class="container-fluid">            
            
            
        <div class="row">
            
            <div class="col-12">


                <div class="section-title">
                        

                    <h3>
                        Album
                    </h3>

                    <hr>

                </div><!--section-title-->

                     
               
            </div><!--col-->
        
        </div><!--row-->



    



        <div class="row">

            <div class="col-12">
                 

                <div class="card-wrapper">


                    <?php $counter1=-1;  if( isset($album) && ( is_array($album) || $album instanceof Traversable ) && sizeof($album) ) foreach( $album as $key1 => $value1 ){ $counter1++; ?>


                    <div class="card1">
                        

                       
                            
                        


                        <div class="body-header">

                            <div class="card-image">
                            
                                <img alt="Bem Casei Site de Casamento" src="/res/images/template/photo/<?php echo htmlspecialchars( $value1["desphoto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                            </div><!--card-photo-->

                        </div><!--card-header-->





                        <div class="card-body">
                            


                            <div class="title">


                                <h5><?php echo htmlspecialchars( $value1["desalbum"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h5>

                                <hr>


                            </div><!--body-title-->





                            <div class="body-row">

                                <textarea readonly="readonly" class="description"><?php echo htmlspecialchars( $value1["desdescription"], ENT_COMPAT, 'UTF-8', FALSE ); ?></textarea>

                            </div><!--body-row-->






                            <div class="body-footer buttons-wrapper">
                                
                                <a target="_blank" href="/res/images/template/photo/<?php echo htmlspecialchars( $value1["desphoto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                
                                    <i class="fa fa-eye"></i>&nbsp;&nbsp;&nbsp;<span>Ver</span>

                                </a>

                            </div>





                        </div><!--card-body-->


                         

                        
                            
                        
                    </div><!--card1-->

                                
                    <?php } ?>






                </div><!--wrapper-->

            </div><!--col-->
    
        </div><!--row-->


        


        <div class="row">
            
            <div class="col-12">


                <div class="section-see-more">
                        

                    <a href='/template/<?php echo getTemplate(); ?>/album'>
                        
                        <h4>
                            Ver Mais...
                        </h4>

                    </a>


                </div><!--section-see-more-->

                     
               
            </div><!--col-->
        
        </div><!--row-->

        






    </div><!--container-->

</section>


