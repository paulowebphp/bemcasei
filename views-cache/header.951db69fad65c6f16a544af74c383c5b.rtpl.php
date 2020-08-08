<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html lang="pt-br">


<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo getSitePageConfig('metadescription'); ?>">
    <?php if( getSitePageConfig('noindex') == 1 ){ ?>
    <meta name="robots" content="noindex">
    <?php } ?>



    <meta property="og:title" content="<?php echo getSitePageConfig('pagetitle'); ?>">
    <meta property="og:description" content="<?php echo getSitePageConfig('metadescription'); ?>">
    <meta property="og:url" content='https://<?php echo getHttpHost(); ?>'>
    <meta property="og:site_name" content="Bem Casei">
    <meta property="og:type" content="website">
    <meta property="og:image"
        content='https://<?php echo getHttpHost(); ?>/res/images/logo/bem-casei-logo-square.jpg'>


    <title><?php echo getSitePageConfig('pagetitle'); ?></title>
    <!-- <link rel="stylesheet" type="text/css" href="/res/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!--<link rel="stylesheet" type="text/css" href="/res/css/font-awesome.min.css">-->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="/res/css/site/stylesheet-lead.css">
    <link rel="stylesheet" type="text/css" href="/res/css/site/stylesheet-mobile-lead.css">
    <link rel="stylesheet" type="text/css" href="/res/css/site/print.css" media="print">

    <link rel="icon" type="image/png" href="/res/images/favicon/site/favicon.ico" />



    <script type="application/ld+json">
    {
      "@context": "http://schema.org/",
      "@type": "Service",
      "serviceType": "Software as a Service",
      "logo": "https://bemcasei.com.br/res/images/favicon/site/favicon.ico",
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
        "name": "Bem Casei Site de Casamento"
      },
      "provider": {
        "@type": "Organization",
        "name": "Bem Casei Site de Casamento"
      }
    }
    </script>

    <?php if( getSitePageConfig('recaptcha') == 1 ){ ?>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <?php } ?>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-152061464-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'UA-152061464-1');
    </script>

    <!-- Start of bemcasei Zendesk Widget script 
    <script id="ze-snippet"
        src="https://static.zdassets.com/ekr/snippet.js?key=565637ed-1709-4f89-b406-1ce62941de4b"></script>
     End of bemcasei Zendesk Widget script -->

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


    
    

    <header style="display:none!important;"></header>


    