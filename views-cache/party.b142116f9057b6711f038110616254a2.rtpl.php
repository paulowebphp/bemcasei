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
        <?php if( $customstyle["inbgcolorgradient"] == '0' ){ ?>
        background-color: <?php if( $customstyle["desbgcolorfooter"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["desbgcolorfooter"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>#DD716F<?php } ?>;
        <?php }else{ ?>
        text-shadow: 4px 4px 4px rgba(0, 0, 0, .45);
        background: radial-gradient(ellipse at center, <?php if( $customstyle["desbgcolorfooter"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["desbgcolorfooter"], ENT_COMPAT, 'UTF-8', FALSE ); ?>99<?php }else{ ?>#F7D9E199<?php } ?> 0%, <?php if( $customstyle["desbgcolorfooter"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["desbgcolorfooter"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>#F7D9E1<?php } ?> 60%);
        <?php } ?>
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
    <?php if( $customstyle["inroundborderimage"] == '1' ){ ?>.main-image img{ border-radius: 50%; border: <?php echo htmlspecialchars( $customstyle["desborderimagesize"], ENT_COMPAT, 'UTF-8', FALSE ); ?>px solid #<?php echo htmlspecialchars( $customstyle["descolor2"], ENT_COMPAT, 'UTF-8', FALSE ); ?>DD;}<?php } ?>;
    /********************************WEDDING, PARTY*****************************************/






    
</style>




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




        <?php if( $error != '' ){ ?>
        <div class="row">
            <div class="col-12">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div><!--alert-->
            </div><!--col-->
        </div><!--row--> 
        <?php } ?> 
    


               




        <div class="row ">

            <div class="col-12">


                <div class="card-wrapper">


                    <div class="card2 unshadow">
                        

                       
                            
                        <div class="body-header row">

                            <div class="main-image">
                            
                                <img alt="Amar Casar Site de Casamento" src="/uploads/parties/<?php echo htmlspecialchars( $party["desphoto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

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

       


                

            







    </div><!--container-->

</section>



