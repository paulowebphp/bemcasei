<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html lang="pt-br">


<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Bem Casei, o site de casamento mais lindo do Brasil! Ajudamos você a promover este evento máximo em sua vida!">
    <meta name="robots" content="noindex">


    <title><?php echo getDashPageConfig('pagetitle'); ?></title>
    <link rel="icon" type="image/png" href="/res/images/favicon/dashboard/favicon.png"/>
    <link rel="stylesheet" media="screen" type="text/css" href="/res/colorpicker/css/colorpicker.css" />
    <link rel="stylesheet" type="text/css" href="/res/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="/res/css/font-awesome.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="/res/css/dashboard/stylesheet.css">
    <link rel="stylesheet" type="text/css" href="/res/css/dashboard/stylesheet-mobile.css">
    <link rel="stylesheet" type="text/css" href="/res/css/dashboard/print.css" media="print">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-144014663-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-144014663-1');
    </script>


    <!-- Start of bemcasei Zendesk Widget script -->
    <script id="ze-snippet"
        src="https://static.zdassets.com/ekr/snippet.js?key=565637ed-1709-4f89-b406-1ce62941de4b"> </script>
    <!-- End of bemcasei Zendesk Widget script -->

</head>



<body>
    

    <header>

        <div id="header-device" class="container-fluid">
            

            <div class="row">
                

                <div class="col-md-3">
                    


                    <div id="logo">

                        <img id="logotipo" src="/res/images/logo/logo-white.png" alt="Logotipo">

                    </div>
         

                </div><!--col-md-->






                <div class="col-md-9">
                                       
                        
                    <div id="menu-header">
                        <ul>

                                <?php if( checkDesdomain() ){ ?>
                                <li><a target="_blank" href='/<?php echo view(); ?>'><i class="fa fa-eye"></i> Ver Site</a></li>
                                <?php }else{ ?>
                                <li><a class="pointer" data-toggle="modal" data-target="#ModalCheckDesdomain"><i class="fa fa-eye"></i> Ver Site</a></li>
                                <?php } ?>




                                <li><a href="/dashboard"><i class="fa fa-user"></i> <?php echo getUserNick(); ?></a></li>

                                <li><a href="/logout"><i class="fa fa-sign-out"></i> Sair</a></li>

                            
                        </ul>
                    </div>



                </div><!--col-md-->


            </div><!--row-->


        </div>



    <div id="header-mobile" class="container-fluid">

        <div class="row">



            <div class="col-md-12">
                



                <div id="menu-condensed">
                        
                    <button id="btn-bars" type="button"><i class="fa fa-bars"></i></button>
                    
                </div>




                

                <div id="menu-mobile">
                    
                    <ul>




                            <?php if( checkDesdomain() ){ ?>
                            <li><a target="_blank" href='/<?php echo view(); ?>'><i class="fa fa-eye"></i> Ver Site</a></li>
                            <?php }else{ ?>
                            <li><a class="pointer" data-toggle="modal" data-target="#ModalCheckDesdomain"><i class="fa fa-eye"></i> Ver Site</a></li>
                            <?php } ?>


                            <li><a href="/dashboard"><i class="fa fa-user"></i> <?php echo getUserNick(); ?></a></li>

                            






                            <?php if( !validatePlan() ){ ?>

                                <div class="list-group">


                                    <div class="menu-main-pages">
                                        
                                        <a href="/dashboard" class="list-group-item list-group-item-action">Início</a>


                                        <a href="/dashboard/meus-dados" class="list-group-item list-group-item-action">Meus Dados</a>

                                        <a href="/dashboard/meu-plano" class="list-group-item list-group-item-action">Meu Plano</a>

                                        <a href="/dashboard/painel-financeiro" class="list-group-item list-group-item-action">Painel Financeiro</a>

                                    </div>




                                    <div class="accordion" id="accordion3">



                                        <div class="card">

                                            <div data-toggle="collapse" data-target="#collapseFive" class="card-header btn collapsed" id="headingFive">

                                                    <button>Termos de Serviço</button>

                                            </div><!--card-header-->

                                            <div id="collapseFive" class="collapse<?php if( in_array(getUri($_SERVER['REQUEST_URI']) , ['termos-uso','politica-privacidade','termos-lista']) ){ ?> show<?php } ?>" aria-labelledby="headingFive" data-parent="#accordion3">
                                                <div class="card-body card-body-text">
                                                
                                                        <a href="/dashboard/termos-uso" class="list-group-item list-group-item-action">Termos de Uso</a>


                                                        <a href="/dashboard/politica-privacidade" class="list-group-item list-group-item-action">Política de Privacidade</a>

                                                        <a href="/dashboard/termos-lista" class="list-group-item list-group-item-action">Termos da Lista de Presentes Virtuais</a>
                                        
                                                </div><!--card-body-->

                                            </div><!--collapseFive-->

                                        </div><!--card-->






                                    </div><!--accordion-->




                                    


                                    <div class="menu-main-pages">
                                        
                                        
                                        <a href="/dashboard/change-password" class="list-group-item list-group-item-action">Alterar Senha</a>
                                        
                                        
                                        <a href="/logout" class="list-group-item list-group-item-action">Sair</a>

                                    </div>
                                    



                                </div><!--list-group-->
                           

                            <?php }elseif( validatePlanFree() ){ ?>

                                <div class="list-group">





                                    <div class="menu-main-pages">
                                        
                                        <a href="/dashboard" class="list-group-item list-group-item-action">Início</a>

                                        <a href="/dashboard/meus-dados" class="list-group-item list-group-item-action">Meus Dados</a>


                                        <a href="/dashboard/meu-plano" class="list-group-item list-group-item-action">Meu Plano</a>

                                    </div>






                                    <div class="accordion" id="accordion4">






                                        <div class="card">

                                            <div data-toggle="collapse" data-target="#collapseSeven" class="card-header btn" id="headingSeven">

                                                    <button>Configurações</button>  

                                            </div><!--card-hader-->

                                            <div id="collapseSeven" class="collapse<?php if( in_array(getUri($_SERVER['REQUEST_URI']) , ['dominio','meu-template','personalizar-site','menu','pagina-inicial']) ){ ?> show<?php } ?>" aria-labelledby="headingSeven" data-parent="#accordion4">

                                                <div class="card-body card-body-text">

                                                    <p>
                                                        
                                    
                                                        <a href="/dashboard/dominio" class="list-group-item list-group-item-action">Domínio</a>

                                                        <a href="/dashboard/meu-template" class="list-group-item list-group-item-action">Meu Template</a>

                                                        <a href="/dashboard/personalizar-site" class="list-group-item list-group-item-action">Personalizar Site</a>

                                                        <a href="/dashboard/menu" class="list-group-item list-group-item-action">Menu</a>

                                                        <a href="/dashboard/pagina-inicial" class="list-group-item list-group-item-action">Página Inicial</a>

                                                    </p>

                                                </div><!--card-body-->

                                            </div><!--collapseSeven-->

                                        </div><!--card-->









                                        <div class="card">

                                            <div data-toggle="collapse" data-target="#collapseSix" class="card-header btn collapsed" id="headingSix">

                                                    <button>Loja</button>

                                            </div><!--card-header-->

                                            <div id="collapseSix" class="collapse<?php if( in_array(getUri($_SERVER['REQUEST_URI']) , ['painel-financeiro','presentes-virtuais']) ){ ?> show<?php } ?>" aria-labelledby="headingSix" data-parent="#accordion4">
                                                <div class="card-body card-body-text">
                                                

                                                        <a href="/dashboard/presentes-virtuais" class="list-group-item list-group-item-action">Presentes Virtuais</a>

                                                        <a data-toggle="modal" data-target="#ExemploModalCentralizado" class="list-group-item list-group-item-action disabled-links">Painel Financeiro</a>
                                                        


                                        
                                                </div><!--card-body-->

                                            </div><!--collapseSix-->

                                        </div><!--card-->










                                        <div class="card">

                                            <div data-toggle="collapse" data-target="#collapseEight" class="card-header btn collapsed" id="headingEight">


                                                    <button>Meu Casamento</button>


                                            </div><!--card-header-->

                                            <div id="collapseEight" class="collapse<?php if( in_array(getUri($_SERVER['REQUEST_URI']) , ['meu-casamento','meu-amor','festa-de-casamento','padrinhos-madrinhas']) ){ ?> show<?php } ?>" aria-labelledby="headingEight" data-parent="#accordion4">

                                                <div class="card-body card-body-text">

                                                    <a href="/dashboard/meu-amor" class="list-group-item list-group-item-action">Meu Amor</a>
                                                
                                                    <a href="/dashboard/meu-casamento" class="list-group-item list-group-item-action">Casamento</a>         
                                                    
                                                    <a href="/dashboard/festa-de-casamento" class="list-group-item list-group-item-action">Festa</a>

                                                    <a href="/dashboard/padrinhos-madrinhas" class="list-group-item list-group-item-action">Padrinhos e Madrinhas</a>

                                                        
                                                        
                                                </div><!--card-body-->

                                            </div><!--collapseEight-->

                                        </div><!--card-->







                                        <div class="card">

                                            <div data-toggle="modal" data-target="#ExemploModalCentralizado" class="card-header btn collapsed disabled-links" id="heading-guide1">


                                                    <button>Guia de Casamento</button>


                                            </div><!--card-header-->

                                            <div id="collapse-guide1" class="collapse<?php if( in_array(getUri($_SERVER['REQUEST_URI']) , ['guia-de-casamento']) ){ ?> show<?php } ?>" aria-labelledby="heading-guide1" data-parent="#accordion4">

                                                <div class="card-body card-body-text">

                                                        <a data-toggle="modal" data-target="#ExemploModalCentralizado" class="list-group-item list-group-item-action disabled-links">Noivado</a>
                                                        

                                                        <a data-toggle="modal" data-target="#ExemploModalCentralizado" class="list-group-item list-group-item-action disabled-links">Padrinhos, Madrinhas, Daminhas e Pajens</a>
                                                        

                                                        <a data-toggle="modal" data-target="#ExemploModalCentralizado" class="list-group-item list-group-item-action disabled-links">Planejamento</a>


                                                        <a data-toggle="modal" data-target="#ExemploModalCentralizado" class="list-group-item list-group-item-action disabled-links">Eventos</a>
                                                        
                                                        <a data-toggle="modal" data-target="#ExemploModalCentralizado" class="list-group-item list-group-item-action disabled-links">Listas de Presentes e Confirmação de Presença</a>


                                                        <a data-toggle="modal" data-target="#ExemploModalCentralizado" class="list-group-item list-group-item-action disabled-links">Cerimonial e Decoração</a>

                                                        <a data-toggle="modal" data-target="#ExemploModalCentralizado" class="list-group-item list-group-item-action disabled-links">Buffet</a>


                                                        <a data-toggle="modal" data-target="#ExemploModalCentralizado" class="list-group-item list-group-item-action disabled-links">Roupa, Cabelo e Maquiagem</a>


                                                        <a data-toggle="modal" data-target="#ExemploModalCentralizado" class="list-group-item list-group-item-action disabled-links">Fotos, Filmagens e DJ</a>



                                                        <a data-toggle="modal" data-target="#ExemploModalCentralizado" class="list-group-item list-group-item-action disabled-links">Ensaios</a>


                                                        <a data-toggle="modal" data-target="#ExemploModalCentralizado" class="list-group-item list-group-item-action disabled-links">Lua de Mel</a>


                                                </div><!--card-body-->

                                            </div><!--collapse-guide-->

                                        </div><!--card-->
                                   
                                      




                                    </div><!--accordion-->







                                    
                                    <div class="menu-main-pages">

                                        

                                        <a href="/dashboard/rsvp" class="list-group-item list-group-item-action">RSVP</a>
                                    
                                        <a href="/dashboard/mensagens" class="list-group-item list-group-item-action">Mensagens</a>

                                         <a href="/dashboard/eventos" class="list-group-item list-group-item-action">Eventos</a>

                                        <a href="/dashboard/album" class="list-group-item list-group-item-action">Album</a>
                                        
                                        <a href="/dashboard/videos" class="list-group-item list-group-item-action">Vídeos</a>
                                

                                        <a href="/dashboard/fornecedores" class="list-group-item list-group-item-action">Fornecedores</a>

                                        <a href="/dashboard/listas-de-fora" class="list-group-item list-group-item-action">Listas de Fora</a>   
                                        
                                        <a href="/dashboard/social" class="list-group-item list-group-item-action">Redes Sociais</a>

                                        
                                        <a href="/dashboard/tags-papelaria" class="list-group-item list-group-item-action">Tags e Papelaria</a>
        
        
                                        <!--<a data-toggle="modal" data-target="#ExemploModalCentralizado" class="list-group-item list-group-item-action disabled-links">Tags e Papelaria</a>  -->


                                    </div><!--menu-main-pages-->



                                    <div class="accordion" class="accordion5">



                                        <div class="card">

                                            <div data-toggle="collapse" data-target="#collapseNine" class="card-header btn collapsed" id="headingNine">

                                                    <button>Termos de Serviço</button>

                                            </div><!--card-header-->

                                            <div id="collapseNine" class="collapse<?php if( in_array(getUri($_SERVER['REQUEST_URI']), ['termos-uso','politica-privacidade','termos-lista']) ){ ?> show<?php } ?>" aria-labelledby="headingNine" data-parent="#accordion5">


                                                <div class="card-body card-body-text">
                                                
                                                        <a href="/dashboard/termos-uso" class="list-group-item list-group-item-action">Termos de Uso</a>


                                                        <a href="/dashboard/politica-privacidade" class="list-group-item list-group-item-action">Política de Privacidade</a>

                                                        <a href="/dashboard/termos-lista" class="list-group-item list-group-item-action">Termos da Lista de Presentes Virtuais</a>
                                        
                                                </div><!--card-body-->

                                            </div><!--collapseNine-->

                                        </div><!--card-->






                                    </div><!--accordion-->



                                    <div class="menu-main-pages">

                                        <a href="/dashboard/central-ajuda" class="list-group-item list-group-item-action">Central de Ajuda</a>
                                          
                                        <a href="/dashboard/mudar-senha" class="list-group-item list-group-item-action">Alterar Senha</a>
                                          
                                        <a href="/logout" class="list-group-item list-group-item-action">Sair</a>

                                    </div><!--menu-main-pages-->




                                </div><!--list-group-->

                            <?php }else{ ?>

                                <div class="list-group">





                                    <div class="menu-main-pages">
                                        
                                        <a href="/dashboard" class="list-group-item list-group-item-action">Início</a>

                                        <a href="/dashboard/meus-dados" class="list-group-item list-group-item-action">Meus Dados</a>

                                        <a href="/dashboard/meu-plano" class="list-group-item list-group-item-action">Meu Plano</a>

                                    </div>








                                    <div class="accordion" id="accordion6">






                                        <div class="card">

                                            <div data-toggle="collapse" data-target="#collapseEleven" class="card-header btn" id="headingEleven">

                                                    <button>Configurações</button>  

                                            </div><!--card-hader-->

                                            <div id="collapseEleven" class="collapse<?php if( in_array(getUri($_SERVER['REQUEST_URI']) , ['dominio','meu-template','personalizar-site','menu','pagina-inicial']) ){ ?> show<?php } ?>" aria-labelledby="headingEleven" data-parent="#accordion6">

                                                <div class="card-body card-body-text">

                                                    <p>
                                                        
                                    
                                                        <a href="/dashboard/dominio" class="list-group-item list-group-item-action">Domínio</a>

                                                        <a href="/dashboard/meu-template" class="list-group-item list-group-item-action">Meu Template</a>

                                                        <a href="/dashboard/personalizar-site" class="list-group-item list-group-item-action">Personalizar Site</a>

                                                        <a href="/dashboard/menu" class="list-group-item list-group-item-action">Menu</a>

                                                        <a href="/dashboard/pagina-inicial" class="list-group-item list-group-item-action">Página Inicial</a>

                                                    </p>

                                                </div><!--card-body-->

                                            </div><!--collapseEleven-->

                                        </div><!--card-->















                                        <div class="card">

                                            <div data-toggle="collapse" data-target="#collapseTen" class="card-header btn collapsed" id="headingTen">

                                                    <button>Loja</button>

                                            </div><!--card-header-->

                                            <div id="collapseTen" class="collapse<?php if( in_array(getUri($_SERVER['REQUEST_URI']) , ['painel-financeiro','presentes-virtuais','conta-bancaria','transferencias']) ){ ?> show<?php } ?>" aria-labelledby="headingTen" data-parent="#accordion6">
                                                
                                                <div class="card-body card-body-text">

                                                    <a href="/dashboard/presentes-virtuais" class="list-group-item list-group-item-action">Presentes Virtuais</a>

                                                
                                                    <a href="/dashboard/painel-financeiro" class="list-group-item list-group-item-action">Painel Financeiro</a>

                                        
                                                </div><!--card-body-->

                                            </div><!--collapseTen-->

                                        </div><!--card-->














                                        <div class="card">

                                            <div data-toggle="collapse" data-target="#collapseTwelve" class="card-header btn collapsed" id="headingTwelve">


                                                    <button>Meu Casamento</button>


                                            </div><!--card-header-->

                                            <div id="collapseTwelve" class="collapse<?php if( in_array(getUri($_SERVER['REQUEST_URI']), ['meu-casamento','meu-amor','festa-de-casamento','padrinhos-madrinhas']) ){ ?> show<?php } ?>" aria-labelledby="headingTwelve" data-parent="#accordion6">

                                                <div class="card-body card-body-text">

                                                        <a href="/dashboard/meu-amor" class="list-group-item list-group-item-action">Meu Amor</a>
                                                    
                                                        <a href="/dashboard/meu-casamento" class="list-group-item list-group-item-action">Casamento</a>         
                                                        
                                                        <a href="/dashboard/festa-de-casamento" class="list-group-item list-group-item-action">Festa</a>
                                                        
                                                        <a href="/dashboard/padrinhos-madrinhas" class="list-group-item list-group-item-action">Padrinhos e Madrinhas</a>

                                      
                                                </div><!--card-body-->

                                            </div><!--collapseTwelve-->

                                        </div><!--card-->






                                        <div class="card">

                                            <div data-toggle="collapse" data-target="#collapse-guide2" class="card-header btn collapsed" id="heading-guide2">


                                                    <button>Guia de Casamento</button>


                                            </div><!--card-header-->

                                            <div id="collapse-guide2" class="collapse<?php if( in_array(getUri($_SERVER['REQUEST_URI']) , ['guia-de-casamento']) ){ ?> show<?php } ?>" aria-labelledby="heading-guide2" data-parent="#accordion6">

                                                <div class="card-body card-body-text">

                                                        <a href="/dashboard/guia-de-casamento/noivado" class="list-group-item list-group-item-action">Noivado</a>
                                                        

                                                        <a href="/dashboard/guia-de-casamento/padrinhos-madrinhas" class="list-group-item list-group-item-action">Padrinhos, Madrinhas, Daminhas e Pajens</a>
                                                        

                                                        <a href="/dashboard/guia-de-casamento/planejamento" class="list-group-item list-group-item-action">Planejamento</a>


                                                        <a href="/dashboard/guia-de-casamento/eventos" class="list-group-item list-group-item-action">Eventos</a>
                                                        
                                                        <a href="/dashboard/guia-de-casamento/listas" class="list-group-item list-group-item-action">Listas de Presentes e Confirmação de Presença</a>


                                                        <a href="/dashboard/guia-de-casamento/cerimonial" class="list-group-item list-group-item-action">Cerimonial e Decoração</a>

                                                        <a href="/dashboard/guia-de-casamento/buffet" class="list-group-item list-group-item-action">Buffet</a>


                                                        <a href="/dashboard/guia-de-casamento/roupa" class="list-group-item list-group-item-action">Roupa, Cabelo e Maquiagem</a>


                                                        <a href="/dashboard/guia-de-casamento/fotos" class="list-group-item list-group-item-action">Fotos, Filmagens e DJ</a>



                                                        <a href="/dashboard/guia-de-casamento/ensaios" class="list-group-item list-group-item-action">Ensaios</a>


                                                        <a href="/dashboard/guia-de-casamento/lua-de-mel" class="list-group-item list-group-item-action">Lua de Mel</a>


                                                </div><!--card-body-->

                                            </div><!--collapse-guide-->

                                        </div><!--card-->
                                   



                                    </div><!--accordion-->







                                    
                                    <div class="menu-main-pages">



                                        <a href="/dashboard/rsvp" class="list-group-item list-group-item-action">RSVP</a>
                                    
                                        <a href="/dashboard/mensagens" class="list-group-item list-group-item-action">Mensagens</a>

                                        <a href="/dashboard/eventos" class="list-group-item list-group-item-action">Eventos</a>

                                        <a href="/dashboard/album" class="list-group-item list-group-item-action">Album</a>
                                        
                                        <a href="/dashboard/videos" class="list-group-item list-group-item-action">Vídeos</a>
                                        
                                        <a href="/dashboard/fornecedores" class="list-group-item list-group-item-action">Fornecedores</a>

                                        
                                        <a href="/dashboard/listas-de-fora" class="list-group-item list-group-item-action">Listas de Fora</a> 

                                        <a href="/dashboard/social" class="list-group-item list-group-item-action">Redes Sociais</a> 

                                        <a href="/dashboard/tags-papelaria" class="list-group-item list-group-item-action">Tags e Papelaria</a>


                                    </div><!--menu-main-pages-->




                                    <div class="accordion" id="accordion7">
                                        
                                        <div class="card">

                                            <div data-toggle="collapse" data-target="#collapseThirteen" class="card-header btn collapsed" id="headingThirteen">

                                                    <button>Termos de Serviço</button>

                                            </div><!--card-header-->

                                            <div id="collapseThirteen" class="collapse<?php if( in_array(getUri($_SERVER['REQUEST_URI']), ['termos-uso','politica-privacidade','termos-lista']) ){ ?> show<?php } ?>" aria-labelledby="headingThirteen" data-parent="#accordion7">
                                                
                                                <div class="card-body card-body-text">
                                                
                                                    <a href="/dashboard/termos-uso" class="list-group-item list-group-item-action">Termos de Uso</a>


                                                    <a href="/dashboard/politica-privacidade" class="list-group-item list-group-item-action">Política de Privacidade</a>

                                                    <a href="/dashboard/termos-lista" class="list-group-item list-group-item-action">Termos da Lista de Presentes Virtuais</a>
                                        
                                                </div><!--card-body-->

                                            </div><!--collapseThirteen-->

                                        </div><!--card-->
                                    </div>

                                    





                                    <div class="menu-main-pages">

                                        <a href="/dashboard/central-ajuda" class="list-group-item list-group-item-action">Central de Ajuda</a>

                                        <a href="/dashboard/testemunho" class="list-group-item list-group-item-action">Testemunho</a> 

                                        <a href="/dashboard/mudar-senha" class="list-group-item list-group-item-action">Alterar Senha</a>  
                                        
                                        <a href="/logout" class="list-group-item list-group-item-action">Sair</a>

                                    </div><!--menu-main-pages-->




                                </div><!--list-group-->

                            <?php } ?>

                        








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
