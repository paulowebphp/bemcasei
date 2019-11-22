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














    /****************INDEX, WEDDING, PARTY , EVENTS ********************/
    .card2 .card-image img{
        border: 8px solid <?php if( $customstyle["descolor2"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["descolor2"], ENT_COMPAT, 'UTF-8', FALSE ); ?>99<?php }else{ ?>#DD716F99<?php } ?>;
    }
    /****************INDEX, WEDDING, PARTY , EVENTS ********************/





    
</style>









<section class="domain">

    <div class="container-fluid">            
            
            
        <div class="row">
            
            <div class="col-12">


                <div class="section-title">
                        

                    <a href="/<?php echo htmlspecialchars( $user["desdomain"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/eventos">
                        
                        <h3>
                            Eventos
                        </h3>
                        
                    </a>

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
    


               


        <?php if( $nrtotal == 0 ){ ?>

        <div class="row">
            <div class="col-12">
                <div class="alert alert-info alert-domain" role="alert">
                    <h1>Ainda não há eventos cadastrados</h1>
                </div><!--alert-->
            </div><!--col-->
        </div><!--row-->

               


        <?php }else{ ?>

        <?php $counter1=-1;  if( isset($event) && ( is_array($event) || $event instanceof Traversable ) && sizeof($event) ) foreach( $event as $key1 => $value1 ){ $counter1++; ?>

        <?php if( checkValidEvent($value1["dtevent"],$dt_now) ){ ?>

        <div class="row ">

            <div class="col-12">


                <div class="card-wrapper">


                    <div class="card2">
                        

                       
                            
                        <div class="body-header row">

                            <div class="card-image">
                            
                                <img alt="Amar Casar Site de Casamento" src="/uploads/events/<?php echo htmlspecialchars( $value1["desphoto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                            </div><!--card-photo-->

                        </div><!--card-header-->









                        <div class="title row">
                            
                            <div class="col-12">
                                
                                <h5><?php echo htmlspecialchars( $value1["desevent"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h5>

                                <hr>

                            </div>

                        </div>









                        <div class="body-row centralizer row">
                    


                            <div class="col-md-3 col-5">

                                <h5>                           

                                    <?php if( $value1["dtevent"] != '' ){ ?>                       
                                        <?php echo formatDate($value1["dtevent"]); ?>
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
                                    <?php if( $value1["tmevent"] != '' ){ ?>
                                        <?php echo formatTime($value1["tmevent"]); ?>
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
                                
                                <textarea readonly="readonly" class="description-area"><?php echo htmlspecialchars( $value1["desdescription"], ENT_COMPAT, 'UTF-8', FALSE ); ?></textarea>

                            </div>

                        </div><!--big-body-row-->












                        <div class="body-row centralizer row">
                    

                            <div class="col-md-3 col-12 inside-row">
                                
                                <h6><?php if( $value1["nrphone"] != '' ){ ?><?php echo htmlspecialchars( $value1["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>-<?php } ?></h6>
                                <hr>

                                <div class="card-label">

                                    <h6>Contato</h6>

                                </div><!--card-label-->
                               
                            </div><!--col-->



                            <div class="col-md-6 col-12 inside-row">

                                <h6>

                                    <?php if( $value1["desaddress"] != '' ){ ?>
                                        <?php echo htmlspecialchars( $value1["desaddress"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $value1["desnumber"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                                        
                                        <?php if( $value1["desdistrict"] != '' ){ ?> - Bairro <?php echo htmlspecialchars( $value1["desdistrict"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?>

                                        <?php if( $value1["descity"] != '' ){ ?> - <?php echo htmlspecialchars( $value1["descity"], ENT_COMPAT, 'UTF-8', FALSE ); ?> / <?php echo htmlspecialchars( $value1["desstate"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?>

                                        <?php if( $value1["descountry"] != '' ){ ?> / <?php echo htmlspecialchars( $value1["descountry"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?>
                                    <?php }else{ ?>
                                        -
                                    <?php } ?>

                                </h6>
                                <hr>

                                <div class="card-label">

                                    <h6>Endereço</h6>

                                </div><!--card-label-->

                            </div><!--col-->

                            


                            <div class="col-md-3 col-12 inside-row">
                                
                                
                                <h6><?php if( $value1["desdirections"] != '' ){ ?><?php echo htmlspecialchars( $value1["desdirections"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>-<?php } ?></h6>
                                <hr>

                                <div class="card-label">

                                    <h6>Ponto de Referência</h6>

                                </div><!--card-label-->

                            </div><!--col-->





                        </div><!--row-->




                        <?php if( $value1["desaddress"] != '' ){ ?>


                        <div class="body-footer row">


                            <div class="buttons-wrapper">
                                
                                <a target="_blank" href='<?php echo setQueryString($value1["desaddress"],$value1["desnumber"],$value1["desdistrict"],$value1["descity"],$value1["desstate"],"bicycling"); ?>'>

                                    <button>Bicicleta</button>

                                </a>
                                


                                <a target="_blank" href='<?php echo setQueryString($value1["desaddress"],$value1["desnumber"],$value1["desdistrict"],$value1["descity"],$value1["desstate"],"transit"); ?>'>

                                    <button>Transporte Público</button>

                                </a>


                                


                                <a target="_blank" href='<?php echo setQueryString($value1["desaddress"],$value1["desnumber"],$value1["desdistrict"],$value1["descity"],$value1["desstate"],"driving"); ?>'>

                                    <button>Carro</button>

                                </a>

                            </div><!--buttons-wrapper-->
                                
                               
                        </div><!--body-footer-->  

                        <?php } ?>

                            
                                                
                        
                    </div><!--card-->

                </div><!--wrapper-->    

            </div><!--col-->
    
        </div><!--row-->

        <?php }elseif( $counter1 == 0 ){ ?>

        <div class="row">
            <div class="col-12">
                <div class="alert alert-info alert-domain" role="alert">
                    <h1>Todos os eventos já foram encerrados</h1>
                </div><!--alert-->
            </div><!--col-->
        </div><!--row-->

        <?php } ?>

        <?php } ?>

        <?php } ?> 


                

            


        




        <div class="row justify-content-center">
                
            <div class="col-6 centralizer">

                <div class="pagination">
                    
                    <ul>
                        <?php $counter1=-1;  if( isset($pages) && ( is_array($pages) || $pages instanceof Traversable ) && sizeof($pages) ) foreach( $pages as $key1 => $value1 ){ $counter1++; ?>
                            <li><a href="<?php echo htmlspecialchars( $value1["href"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["text"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>                             
                        <?php } ?>
                    </ul>

                </div>

            </div><!--col-->

        </div><!--row-->






    </div><!--container-->

</section>



