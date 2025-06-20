<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html lang="pt-br">


<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="O Bem Casei é um site de casamentos onde casais apaixonados podem divulgar seu casamento e receber presentes virtuais que são convertidos em dinheiro">
    <meta name="robots" content="noindex">

    <title><?php echo getTemplateModelPageConfig('pagetitle'); ?></title>
    <link rel="icon" type="image/png" href="/res/images/favicon/template/favicon.ico"/>
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



    <!--BEM CASEI PIXEL-->
    <!-- Facebook Pixel Code -->
    <script>
      !function(f,b,e,v,n,t,s)
      {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
      n.callMethod.apply(n,arguments):n.queue.push(arguments)};
      if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
      n.queue=[];t=b.createElement(e);t.async=!0;
      t.src=v;s=b.getElementsByTagName(e)[0];
      s.parentNode.insertBefore(t,s)}(window, document,'script',
      'https://connect.facebook.net/en_US/fbevents.js');
      fbq('init', '421933245424870');
      fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
      src="https://www.facebook.com/tr?id=421933245424870&ev=PageView&noscript=1"
    /></noscript>
    <!-- End Facebook Pixel Code -->

    

</head>



<body>
    

    <header>

        <div id="header-device" class="container-fluid">
            

            <div class="row">
                

                <div class="col-md-3">
                    


                    <div class="header-title caption">
                        <a href='/template/<?php echo getTemplate(); ?>'><h3><?php echo getTemplateNames(); ?></h3></a>
                    </div>
         

                </div><!--col-md-->






                <div class="col-md-9">


                    

                                       
                        
                    <div class="pull-right" id="menu">


                        <div id="popover-template" data-container="body" data-toggle="popover" data-placement="left" data-content="Para ter acesso às funcionalidades da loja é preciso adquirir um plano" class="shopping-item">
                            Carrinho - <span class="cart-amount">R$ <?php echo getCartVlSubTotal(); ?></span> <i class="fa fa-shopping-cart"></i> <span class="product-count"><?php echo getCartNrQtd(); ?></span>


                             <!--<a href='/template/<?php echo getTemplate(); ?>/carrinho'>Carrinho - <span class="cart-amount">R$ <?php echo getCartVlSubTotal(); ?></span> <i class="fa fa-shopping-cart"></i> <span class="product-count"><?php echo getCartNrQtd(); ?></span></a>-->
                        </div>


                        
                        <div id="domain-dropdown" class="dropdown">
                          <button id="domain-dropdown-button" class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Páginas
                          </button>
                          <div id="domain-dropdown-menu" class="dropdown-menu" aria-labelledby="domain-dropdown-button">

                                <a href='/template/<?php echo getTemplate(); ?>' class="list-group-item list-group-item-action">Home</a>

                                <a href='/template/<?php echo getTemplate(); ?>/casamento' class="list-group-item list-group-item-action">Casamento</a>

                                <a href='/template/<?php echo getTemplate(); ?>/festa-de-casamento' class="list-group-item list-group-item-action">Festa de Casamento</a>


                                <a href='/template/<?php echo getTemplate(); ?>/padrinhos-madrinhas' class="list-group-item list-group-item-action">Padrinhos e Madrinhas</a>


                                <a href='/template/<?php echo getTemplate(); ?>/rsvp' class="list-group-item list-group-item-action">RSVP</a>


                                <a href='/template/<?php echo getTemplate(); ?>/mural-mensagens' class="list-group-item list-group-item-action">Mensagens</a>


                                <a href='/template/<?php echo getTemplate(); ?>/loja' class="list-group-item list-group-item-action">Loja</a>

                                

                                <a href='/template/<?php echo getTemplate(); ?>/eventos' class="list-group-item list-group-item-action">Eventos</a>
                                
                                

                                <a href='/template/<?php echo getTemplate(); ?>/album' class="list-group-item list-group-item-action">Album</a>
                                
                                

                                <a href='/template/<?php echo getTemplate(); ?>/videos' class="list-group-item list-group-item-action">Vídeos</a>  

                                 

                                <a href='/template/<?php echo getTemplate(); ?>/fornecedores' class="list-group-item list-group-item-action">Fornecedores</a> 
                                
                                  

                                <a href='/template/<?php echo getTemplate(); ?>/listas-de-fora' class="list-group-item list-group-item-action">Listas de Fora</a>

                                <a href='/modelos-templates' class="list-group-item list-group-item-action"><i class="fa fa-sign-out"></i> Voltar para o Bem Casei</a>

                                <a data-toggle="modal" data-target="#ModalTemplate1" class="list-group-item list-group-item-action pointer"><i class="fa fa-eye"></i> Ver Outro Template</a>

                          </div>

                        </div>


                    </div>



                </div><!--col-md-->


            </div><!--row-->


        </div>



    <div id="header-mobile" class="container-fluid">

        <div class="row">



            <div class="col-md-12">


                
                



                <div id="menu-condensed">
                        
                    <button id="btn-bars" type="button"><i class="fa fa-bars"></i></button>


                    <div id="shopping-item-mobile" class="pull-right">
                        
                        <div id="popover-template-mobile" data-container="body" data-toggle="popover" data-placement="left" data-content="Para ter acesso às funcionalidades da loja é preciso adquirir um plano" class="shopping-item">
                            <!--<a href='/template/<?php echo getTemplate(); ?>/carrinho"}'><i class="fa fa-shopping-cart"></i> <span class="product-count"><?php echo getCartNrQtd(); ?></span></a>-->
                            <i class="fa fa-shopping-cart"></i> <span class="product-count"><?php echo getCartNrQtd(); ?></span>
                        </div>

                    </div>

                    
                </div>




                

                <div id="menu-mobile">
                    
                    <ul>
                        <li><a href='/template/<?php echo getTemplate(); ?>' class="list-group-item list-group-item-action">Home</a></li>

                        <li><a href='/template/<?php echo getTemplate(); ?>/casamento' class="list-group-item list-group-item-action">Casamento</a></li>

                        <li><a href='/template/<?php echo getTemplate(); ?>/festa-de-casamento' class="list-group-item list-group-item-action">Festa de Casamento</a></li>



                        <li><a href='/template/<?php echo getTemplate(); ?>/padrinhos-madrinhas' class="list-group-item list-group-item-action">Padrinhos e Madrinhas</a></li>

                        


                        <li><a href='/template/<?php echo getTemplate(); ?>/rsvp' class="list-group-item list-group-item-action">RSVP</a></li>

                        
                    

                        <li><a href='/template/<?php echo getTemplate(); ?>/mural-mensagens' class="list-group-item list-group-item-action">Mensagens</a></li>

                        

                        <li><a href='/template/<?php echo getTemplate(); ?>/loja' class="list-group-item list-group-item-action">Loja</a></li>

                        

                        <li><a href='/template/<?php echo getTemplate(); ?>/eventos' class="list-group-item list-group-item-action">Eventos</a></li>
                        
                        

                        <li><a href='/template/<?php echo getTemplate(); ?>/album' class="list-group-item list-group-item-action">Album</a></li>
                        
                        

                        <li><a href='/template/<?php echo getTemplate(); ?>/videos' class="list-group-item list-group-item-action">Vídeos</a></li>  

                         

                        <li><a href='/template/<?php echo getTemplate(); ?>/fornecedores' class="list-group-item list-group-item-action">Fornecedores</a></li> 
                        
                          

                        <li><a href='/template/<?php echo getTemplate(); ?>/listas-de-fora' class="list-group-item list-group-item-action">Listas de Fora</a></li>

                        <li><a href='/modelos-templates' class="list-group-item list-group-item-action"><i class="fa fa-sign-out"></i> Voltar para o Bem Casei</a></li>

                        <li><a data-toggle="modal" data-target="#ModalTemplate1" class="list-group-item list-group-item-action pointer"><i class="fa fa-eye"></i> Ver Outro Template</a></li>

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






