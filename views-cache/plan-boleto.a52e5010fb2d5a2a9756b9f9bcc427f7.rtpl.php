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
      font-size: 0.9rem;
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
      border-radius: 20px;
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
        font-size: 0.8rem;
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











    <?php if( $plan["inmigration"] == 0 ){ ?>

      <div class="title">
            
        <h1>Compra de Plano</h1>

      </div>


      <div class="email-row">
            
        <span>Olá, <strong><?php echo htmlspecialchars( $user["desnick"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php if( $consort["desconsortemail"] != '' ){ ?> & <?php echo htmlspecialchars( $consort["desconsort"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?>!</strong></span>

      </div>


      <div class="email-row">
      
         <span>Quase lá! Efetue o pagamento do Boleto para finalizar a compra do seu plano.</span>

      </div>
      

      <div class="email-row">
      
         <span>O prazo de compensação é de até 4 dias úteis. Você receberá uma confirmação por e-mail, mas se preferir, pode visualizar o status no painel de controle do Bem Casei.</span>

      </div>

      <div class="email-row">
      
         <span>Basta fazer login com seu e-mail e ir no menu "Meu Plano".</span>

      </div>

      <?php }elseif( $plan["inmigration"] == 1 ){ ?>

      <div class="title">
            
        <h1>Renovação de Plano</h1>

      </div>





      <div class="email-row">
            
        <span>Olá, <strong><?php echo htmlspecialchars( $user["desnick"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php if( $consort["desconsortemail"] != '' ){ ?> & <?php echo htmlspecialchars( $consort["desconsort"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?>!</strong></span>

      </div>


      <div class="email-row">
      
         <span>Quase lá! Efetue o pagamento do Boleto para finalizar a compra do seu plano.</span>

      </div>
      

      <div class="email-row">
      
         <span>O prazo de compensação é de até 4 dias úteis. Você receberá uma confirmação por e-mail, mas se preferir, pode visualizar o status no painel de controle do Bem Casei.</span>

      </div>

      <div class="email-row">
      
         <span>Basta fazer login com seu e-mail e ir no menu "Meu Plano".</span>

      </div>

      <?php }else{ ?>

      <div class="title">
            
        <h1>Upgrade de Plano</h1>

      </div>





      <div class="email-row">
            
        <span>Olá, <strong><?php echo htmlspecialchars( $user["desnick"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php if( $consort["desconsortemail"] != '' ){ ?> & <?php echo htmlspecialchars( $consort["desconsort"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?>!</strong></span>

      </div>


      <div class="email-row">
      
         <span>Quase lá! Efetue o pagamento do Boleto para finalizar a compra do seu plano.</span>

      </div>
      

      <div class="email-row">
      
         <span>O prazo de compensação é de até 4 dias úteis. Você receberá uma confirmação por e-mail, mas se preferir, pode visualizar o status no painel de controle do Bem Casei.</span>

      </div>

      <div class="email-row">
      
         <span>Basta fazer login com seu e-mail e ir no menu "Meu Plano".</span>

      </div>

      <?php } ?>

    



      

      

      <div class="spacing"></div>




    

        

      <div class="email-row info">
            
        <span>Detalhes da Compra</span>
        <hr>

      </div>






                                    
                                    


        
      <?php if( $plan["inmigration"] != 2 ){ ?>
      <div class="email-row detail">
           
        <span class="email-label1">Plano: &nbsp;&nbsp;</span><span class="email-label2"><?php echo htmlspecialchars( $plan["desplan"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>

      </div><!--col-->


      <div class="email-row detail">
       
        
          <span class="email-label1">Período: &nbsp;&nbsp;</span><span class="email-label2"><?php if( $plan["inperiod"] > 1 ){ ?> <?php echo htmlspecialchars( $plan["inperiod"], ENT_COMPAT, 'UTF-8', FALSE ); ?> meses <?php }else{ ?> <?php echo htmlspecialchars( $plan["inperiod"], ENT_COMPAT, 'UTF-8', FALSE ); ?> mês <?php } ?></span>

      </div><!--col-->
      <?php }else{ ?>
      <div class="email-row detail">
           
        <span class="email-label1">Plano: &nbsp;&nbsp;</span><span class="email-label2"><?php echo htmlspecialchars( $plan["desplan"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>

      </div><!--col-->
      <?php } ?>




      <div class="email-row detail">
       
        <span class="email-label1">Valor: &nbsp;&nbsp;</span><span class="email-label2">R$ <?php echo formatPrice($order["vltotal"]); ?></span>

      </div><!--col-->


      <div class="email-row detail">
       
        <span class="email-label1">Meio de Pagamento: </span><span class="email-label2">Boleto</span>

      </div><!--col-->
      

      <div class="email-row detail">
   
        <span class="email-label1">Reimprimir o Boleto (Link Seguro): </span><span class="email-label2"><a target="_blank" href="<?php echo htmlspecialchars( $order["desprinthref"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $order["desprinthref"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></span>

      </div><!--col-->         




      <div class="email-row2 detail">
       
        <span class="email-label1">Data da Compra: &nbsp;&nbsp;</span><span class="email-label2"><?php echo formatDate($order["dtregister"]); ?></span>

      </div><!--col-->



      <div class="spacing2"></div>  



      <div class="email-row">
            
        <span>
          Faça login no <strong>Bem Casei</strong> para visualizar o status da sua compra
        </span>


      </div><!--email-row-->


      <div class="email-row email-button">
        
        <a target="_blank" href="https://bemcasei.com.br/login">
          <span>Login</span>
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