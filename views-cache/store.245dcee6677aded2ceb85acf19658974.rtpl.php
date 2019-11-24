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















    /********************************STORE 2*****************************************/
    .card-add-cart button{
        font-family: 'OpenSans'!important;
        box-shadow: 0 8px 12px 0 rgba(0, 0, 0, 0.16), 0 0 12px 0 rgba(0, 0, 0, 0.12);
        border: 0;
        border-radius: 12px;
        padding: 10px 34px;
        color: #fff;
        background-color: <?php if( $customstyle["descolor2"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["descolor2"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>#333333<?php } ?>;
    }
    .card-add-cart button:hover{
        color: #fff;
        background-color: <?php if( $customstyle["descolor2"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["descolor2"], ENT_COMPAT, 'UTF-8', FALSE ); ?>DD<?php }else{ ?>#333333<?php } ?>;
    }
    .card-add-continue button{
        font-family: 'OpenSans'!important;
        box-shadow: 0 8px 12px 0 rgba(0, 0, 0, 0.16), 0 0 12px 0 rgba(0, 0, 0, 0.12);
        background: #e6e6e6;
        border: 0;
        border-radius: 12px;
        padding: 10px 34px;
        font-size: 0.9rem;
        color: <?php if( $customstyle["descolor2"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["descolor2"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>#333333<?php } ?>;
    }
    .card-add-continue button:hover{
      background: #e1e1e1;
      color: <?php if( $customstyle["descolor2"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["descolor2"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>#333333<?php } ?>;
      
    }
    /********************************STORE 2*****************************************/






    
</style>























<section class="domain">

    <div class="container-fluid">            
            
            
        <div class="row">




            
            <div class="col-md-10 col-12">


                <div class="section-title">
                        

                    <a href='/template/<?php echo getTemplate(); ?>/loja'>
                        
                        <h3>
                            Presentes Virtuais
                        </h3>

                    </a>

                    <hr>

                </div><!--section-title-->

                     
               
            </div><!--col-->









            <div class="col-md-2 col-12">
                

                <div class="row">
                    
                    <div class="col-12">
                        
                        <div class="sort-by">
                    
                            <form action='/template/<?php echo getTemplate(); ?>/loja'>


                                <select id="sort-by" name="ordenar" class="custom-select">

                                    <option value="valor-menor" <?php if( $orderby == '' ){ ?>selected="selected"<?php }elseif( $orderby == 'valor-menor' ){ ?>selected="selected"<?php } ?>>Menor Preço</option>
                                    <option value="valor-maior" <?php if( $orderby == 'valor-maior' ){ ?>selected="selected"<?php } ?>>Maior Preço</option>
                                    <option value="nome-a-z" <?php if( $orderby == 'nome-a-z' ){ ?>selected="selected"<?php } ?>>Nome A > Z</option>
                                    <option value="nome-z-a" <?php if( $orderby == 'nome-z-a' ){ ?>selected="selected"<?php } ?>>Nome Z > A</option>
                        
                                </select>


                            </form>


                        </div><!--sort-by-->

                    </div><!--col-->

                </div><!--row-->



                <div class="row">
                    
                    <div class="col-12">
                

                        <div class="categories">
                            
                            
                            <div id="categories" class="dropdown">
                              <button id="categories-button" class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Categorias
                              </button>
                              <div id="categories-menu" class="dropdown-menu" aria-labelledby="domain-dropdown-button">

                                <?php $counter1=-1;  if( isset($categories) && ( is_array($categories) || $categories instanceof Traversable ) && sizeof($categories) ) foreach( $categories as $key1 => $value1 ){ $counter1++; ?>
                                    <a href='/template/<?php echo getTemplate(); ?>/loja/<?php echo htmlspecialchars( $categories["$counter1"]["desurl"], ENT_COMPAT, 'UTF-8', FALSE ); ?>' class="list-group-item list-group-item-action"><?php echo htmlspecialchars( $categories["$counter1"]["descategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a>
                                <?php } ?>
                                    

                              </div><!--domain-dropdown-menu-->

                            </div><!--domain-dropdown-->


                        </div><!--categories-->
                            

                    </div><!--col-->

                </div><!--row-->





                

            </div><!--col-->





        
        </div><!--row-->



        <?php if( $success != '' ){ ?>
        <div class="row">
            <div class="col-12">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo htmlspecialchars( $success, ENT_COMPAT, 'UTF-8', FALSE ); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div> 
        </div>  
        <?php } ?>


        <?php if( $error != '' ){ ?>
        <div class="row">
            <div class="col-12">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div><!--balert-->
            </div><!--col-->
        </div><!--row--> 
        <?php } ?> 
    



        <div class="row">

            <div class="col-12">
                 

                <div class="card-wrapper">



                    <?php if( $nrtotal == 0 ){ ?>

                    <div class="row">
                        <div class="col-12">
                            <div class="alert alert-info alert-domain" role="alert">
                                <h1>Ainda não há presentes cadastrados</h1>
                            </div><!--alert-->
                        </div><!--col-->
                    </div><!--row-->

                            
                    <?php }else{ ?>

                    <?php $counter1=-1;  if( isset($gift) && ( is_array($gift) || $gift instanceof Traversable ) && sizeof($gift) ) foreach( $gift as $key1 => $value1 ){ $counter1++; ?>


                    <div class="card1 card-store">
                        

                       
                            
                        


                        <div class="body-header">

                            <div class="card-image">
                            
                                <img alt="Amar Casar Site de Casamento" src="/uploads/gifts/<?php echo htmlspecialchars( $value1["desphoto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                            </div><!--card-photo-->

                        </div><!--card-header-->





                        <div class="card-body">
                            


                            <div class="title">


                                <h5><?php echo htmlspecialchars( $value1["desgift"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h5>

                                <hr>


                            </div><!--body-title-->





                            <div class="description body-row">

                                <h5><?php echo getCategoryName($value1["incategory"]); ?></h5>

                            </div><!--body-row-->






                            <div class="card-price-wrapper">

                                <div class="card-currency"> 

                                    <span class="card-coin">R$</span> 


                                </div><!--currency-->


                                
                                <span class="card-price"><?php echo getValuePartial($value1["vlprice"],1); ?></span>

                                <span>,<?php echo getValuePartial($value1["vlprice"],0); ?></span>


                            </div>






                            <div class="body-footer">
                                
                                

                                <div class="buttons-wrapper2">
                                
                                    <a class="card-add-cart">

                                        <button>Comprar</button>

                                    </a>
                                    


                                    <a class="card-add-continue">

                                        <button>Adicionar e Continuar Comprando</button>

                                    </a>


                            

                                </div><!--buttons-wrapper-->




                            </div>





                        </div><!--card-body-->


                         

                        
                            
                        
                    </div><!--card1-->

                                
                    <?php } ?>

                    <?php } ?> 


                </div><!--wrapper-->

            </div><!--col-->
    
        </div><!--row-->


        




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



