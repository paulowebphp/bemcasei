<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html lang="pt-br">


<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Bem Casei, o site de casamento mais elegante do Brasil! Ajudamos você a promover este evento máximo em sua vida!">
    <meta name="robots" content="noindex">


    <title><?php echo getTemplatePageConfig('pagetitle'); ?></title>
    <link rel="icon" type="image/png" href="/res/images/favicon/template/favicon.png"/>
    <link rel="stylesheet" type="text/css" href="/res/css/jquery-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="/res/css/bootstrap.min.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="/res/css/font-awesome.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="/res/css/template/stylesheet.css">
    <link rel="stylesheet" type="text/css" href="/res/css/template/stylesheet-mobile.css">


    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-152061464-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'UA-152061464-1');
    </script>
    

</head>



<body>
    

    <header>

        <div id="header-device" class="container-fluid">
            

            <div class="row">
                

                <div class="col-md-4">
                    


                    <div class="header-title caption">
                        <a href='/<?php echo getDesdomain(); ?>'><h3><?php echo getNames(); ?></h3></a>
                    </div>
         

                </div><!--col-md-->






                <div class="col-md-8">


                    

                                       
                        
                    <div class="pull-right" id="menu">


                        <div class="shopping-item">
                            <a href='/<?php echo getDesdomain(); ?>/carrinho'>Carrinho - <span id="cart-amount" class="cart-amount">R$ <?php echo getCartVlSubTotal(); ?></span> <i class="fa fa-shopping-cart"></i> <span id="product-count" class="product-count"><?php echo getCartNrQtd(); ?></span></a>
                        </div>


                        
                        <div id="domain-dropdown" class="dropdown">
                          <button id="domain-dropdown-button" class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Páginas
                          </button>
                          <div id="domain-dropdown-menu" class="dropdown-menu" aria-labelledby="domain-dropdown-button">

                                <a href='/<?php echo getDesdomain(); ?>' class="list-group-item list-group-item-action">Home</a>

                                <a href='/<?php echo getDesdomain(); ?>/casamento' class="list-group-item list-group-item-action">Casamento</a>

                                <?php if( setTemplateMenu('party') ){ ?><a href='/<?php echo getDesdomain(); ?>/festa-de-casamento' class="list-group-item list-group-item-action">Festa de Casamento</a><?php } ?>


                                <?php if( setTemplateMenu('bestfriend') ){ ?><a href='/<?php echo getDesdomain(); ?>/padrinhos-madrinhas' class="list-group-item list-group-item-action">Padrinhos e Madrinhas</a><?php } ?>


                                <?php if( setTemplateMenu('rsvp') ){ ?><a href='/<?php echo getDesdomain(); ?>/rsvp' class="list-group-item list-group-item-action">RSVP</a><?php } ?>


                                <?php if( setTemplateMenu('message') ){ ?><a href='/<?php echo getDesdomain(); ?>/mural-mensagens' class="list-group-item list-group-item-action">Mensagens</a><?php } ?>


                                <?php if( setTemplateMenu('store') ){ ?><a href='/<?php echo getDesdomain(); ?>/loja' class="list-group-item list-group-item-action">Loja</a><?php } ?>

                                

                                <?php if( setTemplateMenu('event') ){ ?><a href='/<?php echo getDesdomain(); ?>/eventos' class="list-group-item list-group-item-action">Eventos</a><?php } ?>
                                
                                

                                <?php if( setTemplateMenu('album') ){ ?><a href='/<?php echo getDesdomain(); ?>/album' class="list-group-item list-group-item-action">Album</a><?php } ?>
                                
                                

                                <?php if( setTemplateMenu('video') ){ ?><a href='/<?php echo getDesdomain(); ?>/videos' class="list-group-item list-group-item-action">Vídeos</a>  <?php } ?>

                                 

                                <?php if( setTemplateMenu('stakeholder') ){ ?><a href='/<?php echo getDesdomain(); ?>/fornecedores' class="list-group-item list-group-item-action">Fornecedores</a> <?php } ?>
                                
                                  

                                <?php if( setTemplateMenu('outerlist') ){ ?><a href='/<?php echo getDesdomain(); ?>/listas-de-fora' class="list-group-item list-group-item-action">Listas de Fora</a><?php } ?>

                          </div><!--domain-dropdown-menu-->

                        </div><!--domain-dropdown-->


                    </div><!--menu-->



                </div><!--col-md-->


            </div><!--row-->


        </div>



    <div id="header-mobile" class="container-fluid">

        <div class="row">



            <div class="col-md-12">


                
                



                <div id="menu-condensed">
                        
                    <button id="btn-bars" type="button"><i class="fa fa-bars"></i></button>


                    <div id="shopping-item-mobile" class="pull-right">
                        
                        <div class="shopping-item">
                            <a href='/<?php echo getDesdomain(); ?>/carrinho'><i class="fa fa-shopping-cart"></i> <span id="product-count-mobile" class="product-count"><?php echo getCartNrQtd(); ?></span></a>
                        </div>

                    </div>

                    
                </div>




                

                <div id="menu-mobile">
                    
                    <ul>
                        <li><a href='/<?php echo getDesdomain(); ?>' class="list-group-item list-group-item-action">Home</a></li>

               
                       <li><a href='/<?php echo getDesdomain(); ?>/casamento' class="list-group-item list-group-item-action">Casamento</a></li>

                        <?php if( setTemplateMenu('party') ){ ?><li><a href='/<?php echo getDesdomain(); ?>/festa-de-casamento' class="list-group-item list-group-item-action">Festa de Casamento</a></li><?php } ?>



                        <?php if( setTemplateMenu('bestfriend') ){ ?><li><a href='/<?php echo getDesdomain(); ?>/padrinhos-madrinhas' class="list-group-item list-group-item-action">Padrinhos e Madrinhas</a></li><?php } ?>

                        


                        <?php if( setTemplateMenu('rsvp') ){ ?><li><a href='/<?php echo getDesdomain(); ?>/rsvp' class="list-group-item list-group-item-action">RSVP</a></li><?php } ?>

                        
                    

                        <?php if( setTemplateMenu('message') ){ ?><li><a href='/<?php echo getDesdomain(); ?>/mural-mensagens' class="list-group-item list-group-item-action">Mensagens</a></li><?php } ?>

                        

                        <?php if( setTemplateMenu('store') ){ ?><li><a href='/<?php echo getDesdomain(); ?>/loja' class="list-group-item list-group-item-action">Loja</a></li><?php } ?>

                        

                        <?php if( setTemplateMenu('event') ){ ?><li><a href='/<?php echo getDesdomain(); ?>/eventos' class="list-group-item list-group-item-action">Eventos</a></li><?php } ?>
                        
                        

                        <?php if( setTemplateMenu('album') ){ ?><li><a href='/<?php echo getDesdomain(); ?>/album' class="list-group-item list-group-item-action">Album</a></li><?php } ?>
                        
                        

                        <?php if( setTemplateMenu('video') ){ ?><li><a href='/<?php echo getDesdomain(); ?>/videos' class="list-group-item list-group-item-action">Vídeos</a></li>  <?php } ?>

                         

                        <?php if( setTemplateMenu('stakeholder') ){ ?><li><a href='/<?php echo getDesdomain(); ?>/fornecedores' class="list-group-item list-group-item-action">Fornecedores</a></li> <?php } ?>
                        
                          

                        <?php if( setTemplateMenu('outerlist') ){ ?><li><a href='/<?php echo getDesdomain(); ?>/listas-de-fora' class="list-group-item list-group-item-action">Listas de Fora</a></li><?php } ?>

                    </ul>

                    <div class="bar-close">
                        <button type="button" class="btn btn-close"><i class="fa fa-close"></i></button>
                    </div>

                </div>





                <div id="menu-mobile-mask"></div>



            </div><!--row-->



        </div><!--container-->

    </div><!--header-mobile-->
        
             
</header>






