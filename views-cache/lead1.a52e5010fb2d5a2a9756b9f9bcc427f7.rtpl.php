<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="E-mail de notificação do site Bem Casei">
  <link href="https://fonts.googleapis.com/css?family=Norican|Open+Sans&display=swap" rel="stylesheet">
  
  <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
  <title>Bem Casei</title>

  <style type="text/css">
    body{
      font-family: 'Open Sans', Arial!important;
      font-size: 1.1rem;
      color: #333;
    }
    #email-canvas{
      padding: 2% 1% 5% 1%;
    }
    #email-canvas hr{
      border: 1px solid #ccc;
      text-align: left!important;
      width: 50%;
      margin-left: 0;
      margin-top: 1%;
    }
    .title{
      color: #ec656d;
      margin-bottom: 10%;
    }
    .title h1{
      font-size: 2rem;
      font-family: 'Norican',Arial!important;
    }
    .email-row{
      margin-bottom: 2%;
    }
    .email-row2{
      margin-bottom: 6%;
    }

    .info{
      width: 60%;
    }
    .detail .email-label1{
      font-style: italic;
      font-size: 0.85rem;
    }
    .detail .email-label2{
      letter-spacing: 0.1rem;
    }
    .spacing{
      margin-bottom: 50px;
    }
    .spacing2{
      margin-bottom: 90px;
    }
    .email-button{
      margin-bottom: 8%;
    }
    .email-button a{
      background-color: #ec656d;
      color: #fff;
      padding: 12px 24px;
      border-radius: 8px;
      text-decoration: none;
    }
    .email-footer{
      width: 50%;
      border-top: 1px solid #ccc;
      padding: 1% 0;
    }
    .email-footer a{
      color: #ec656d;
    }
    .boleto a{
      text-decoration: none!important;
      color: #333!important;
    }
    .boleto a:hover{
      text-decoration: underline!important;
      color: #333!important;
    }
    @media only screen and (max-width: 797px){

      body{
        font-size: 1rem;
      }
      #email-canvas{
        text-align: center;
        padding: 3% 7% 5% 7%;
      }
      #email-canvas hr{
        margin-left: auto;
      }
      .title{
        margin-bottom: 20%;
      }
      .title h1{
        font-size: 1.4rem;
      }
      .info{
        width: auto;
      }
      .email-button{
        margin-top: 10%; 
      }
      .email-footer{
        width: auto;
        margin-top: 20%;
      }
      .email-row{
        margin-bottom: 8%;
      }
      .email-row2{
        margin-bottom: 10%;
      }
      .spacing{
        margin-bottom: 80px;
      }
      .spacing2{
        margin-bottom: 120px;
      }

    }/*breakpoint*/

  </style>

</head>

<body>






  <section id="email-canvas">
    






      <div class="title">
            
        <h1>Faça o Download do seu E-book!</h1>

      </div>





      <div class="email-row">
            
        <span><strong>Olá!</strong></span>

      </div>


      <div class="email-row">
      
         
         <span>A senha para o e-mail: <strong><?php echo htmlspecialchars( $lead["desemail"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong> é: <?php echo htmlspecialchars( $lead["desoriginalpassword"], ENT_COMPAT, 'UTF-8', FALSE ); ?>.</span>

      </div>
      

      <div class="email-row2">
      
         
         <span>Clique no botão abaixo e utilize o seu e-mail e a sua senha para acessar o seu Painel e fazer o Download do E-book!</span>

      </div>


      <div class="email-row email-button">
        
        <a target="_blank" href="https://bemcasei.com.br/painel/login/<?php echo htmlspecialchars( $desemail, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
          <span>Fazer Download do E-book!</span>
        </a>

        
      </div><!--email-row-->


      <div class="email-row">
        
        <div class="email-footer">
          
          <span>
            Precisa de ajuda? <a target="_blank" href="https://bemcasei.com.br/central-ajuda"><strong>Fale conosco</a>
          </span>

        </div>


      </div><!--email-row-->


    




  </section>


  </body>
</html>