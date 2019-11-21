<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html lang="pt-br">


<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
    <meta name="description"
        content="Pesquise por suas dúvidas ou inicie um chat na nossa Central de Ajuda. Bem Casei, o site de casamento mais elegante do Brasil!">
    <meta name="robots" content="noindex">


    <meta property="og:title" content="{function=" getSitePageConfig('pagetitle')"}">
    <meta property="og:description" content="{function=" getSitePageConfig('metadescription')"}">
    <meta property="og:url" content='https://<?php echo getHttpHost(); ?>'>
    <meta property="og:site_name" content="Bem Casei">
    <meta property="og:type" content="website">
    <meta property="og:image" content='https://<?php echo getHttpHost(); ?>/res/images/logo/logo-square.png'>


    <title>Central de Ajuda | Bem Casei</title>
    <link rel="icon" type="image/png" href="/res/images/favicon/site/favicon.png" />
    <link rel="stylesheet" href="/res/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/res/css/font-awesome.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/res/css/site/stylesheet.css">
    <link rel="stylesheet" href="/res/css/site/stylesheet-mobile.css">



    <script type="application/ld+json">
    {
      "@context": "http://schema.org/",
      "@type": "Service",
      "serviceType": "Software as a Service",
      "logo": "https://bemcasei.com.br/res/images/logo/bem-casei-logo-round-white.png",
      "termsOfService": "https://bemcasei.com.br/termos-uso",
      "category": "Service",
      "areaServed": {
        "@type": "Country",
        "name": "BR"
      },
      "audience": {
        "@type": "PeopleAudience",
        "geographicArea": {
          "@type": "Country",
          "name": "BR"
        }
      },
      "brand": {
        "@type": "Organization",
        "name": "Bem Casei Site de Casamentos"
      },
      "provider": {
        "@type": "Organization",
        "name": "Bem Casei Site de Casamentos"
      }
    }
    </script>





    <!-- Start of bemcasei Zendesk Widget script -->
    <script id="ze-snippet"
        src="https://static.zdassets.com/ekr/snippet.js?key=565637ed-1709-4f89-b406-1ce62941de4b"> </script>
    <!-- End of bemcasei Zendesk Widget script -->

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

        <div class="container-fluid">


            <div id="header-device">


                <div class="row centralizer">


                    <div class="col-3">



                        <div id="logo">


                            <a href="/"><img id="logotipo" src="/res/images/logo/logo-main.png" alt="Logotipo"></a>

                            <!--<img id="logotipo" src="/res/images/logo/logo-main.png" width="203" height="65" alt="Logotipo">-->

                        </div>


                    </div>
                    <!--col-md-->






                    <div class="col-9">


                        <div id="menu">
                            <ul>
                                <li><a href="/site-casamento">SITE DE CASAMENTO</a></li>
                                <li><a href="/lista-presentes">LISTA DE PRESENTES</a></li>
                                <li><a href="/planos">PLANOS</a></li>
                                <!--<li><a href="https://blog.amarcasar.com/" target="_blank">BLOG</a></li>-->
                                <!--<li><a href="/buscar">BUSCAR CASAL</a></li>-->

                                <li><a href="/criar-site-de-casamento"><button id="nav-free">TESTE GRÁTIS</button></a>
                                </li>

                                <li><a href="/login"><button id="nav-login">LOGIN</button></a></li>
                            </ul>
                        </div>



                    </div>
                    <!--col-md-->


                </div>
                <!--row-->


            </div>
            <!--header-device-->



            <div id="header-mobile">

                <div class="row">



                    <div class="col-md-12">




                        <div id="menu-condensed">

                            <button id="btn-bars" type="button"><i class="fa fa-bars"></i></button>

                        </div>






                        <div id="menu-mobile">

                            <ul>
                                <li><a href="/">INICIO</a></li>
                                <li><a href="/site-casamento">SITE DE CASAMENTO</a></li>
                                <li><a href="/lista-presentes">LISTA DE PRESENTES</a></li>
                                <li><a href="/planos">PLANOS</a></li>
                                <!--<li><a href="https://blog.amarcasar.com/" target="_blank">BLOG</a></li>-->
                                <!--<li><a href="/buscar">BUSCAR CASAL</a></li>-->

                                <li><a href="/criar-site-de-casamento"><button id="nav-free">TESTE GRÁTIS</button></a>
                                </li>

                                <li><a href="/login"><button id="nav-login">LOGIN</button></a></li>
                            </ul>

                            <div class="bar-close">
                                <button type="button" class="btn btn-close"><i class="fa fa-close"></i></button>
                            </div>

                        </div>


                        <div id="menu-mobile-mask"></div>



                    </div>
                    <!--col-->



                </div>
                <!--row-->

            </div>
            <!--header-mobile-->






        </div>
        <!--container-fluid-->


    </header>