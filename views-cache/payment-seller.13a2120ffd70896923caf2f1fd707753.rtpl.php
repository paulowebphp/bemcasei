<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="E-mail de notificação do site Amar Casar">
  <link href="https://fonts.googleapis.com/css?family=Norican|Open+Sans&display=swap" rel="stylesheet">
  
  <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
  <title>Amar Casar</title>

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
      color: #5e299a;
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
      background-color: #5e299a;
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
      color: #5e299a;
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
    






      <div class="title">
            
        <h1>Presente Recebido</h1>

      </div>





      <div class="email-row">
            
        <span>Olá, <strong><?php echo htmlspecialchars( $user["desnick"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php if( $consort["desconsort"] != '' ){ ?> & <?php echo htmlspecialchars( $consort["desconsort"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?>!</strong></span>

      </div>


      <div class="email-row">
      
         
         <span><strong><?php echo htmlspecialchars( $order["desname"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong> realizou uma compra na sua Loja Virtual. Confira os dados abaixo:</span>

      </div>
      

      

      <div class="spacing2  "></div>




    

        

      <div class="email-row info">
            
        <span>Detalhes do Comprador</span>
        <hr>

      </div>






                                    



      <div class="email-row detail">
           
        <span class="email-label1">Nome de quem presenteou: </span><span class="email-label2"><?php echo htmlspecialchars( $order["desname"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>

      </div><!--col-->


      <div class="email-row detail">
       
        <span class="email-label1">Telefone: </span><span class="email-label2"><?php echo htmlspecialchars( $order["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>

      </div><!--col-->


      <div class="email-row2 detail">
       
        <span class="email-label1">E-mail: </span><span class="email-label2"><?php echo htmlspecialchars( $order["desemail"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>

      </div><!--col-->


      






      <div class="spacing2"></div>




    

        

      <div class="email-row info">
            
        <span>Itens da Compra</span>
        <hr>

      </div>


      
                                    
                                    


      <?php $counter1=-1;  if( isset($product) && ( is_array($product) || $product instanceof Traversable ) && sizeof($product) ) foreach( $product as $key1 => $value1 ){ $counter1++; ?>
      <div class="email-row detail product">
           
        <span class="email-label1"><?php echo htmlspecialchars( $counter1+1, ENT_COMPAT, 'UTF-8', FALSE ); ?>. </span><span class="email-label2"> <strong><?php echo htmlspecialchars( $value1["desproduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong></span>

        <br>

        <span class="email-label1">R$ <?php echo formatPrice(getInterest($value1["vltotal"],'1','1',$order["incharge"])); ?></span>

      </div><!--col-->
      <?php } ?>


      <div class="email-row3 info">
            
        <hr>

      </div>


      <div class="email-row info detail product">
           
      <span class="email-label1"></span><span class="email-label2"><strong>Valor Total</strong></span>

      <br>

      <span class="email-label1">R$ <?php echo formatPrice($order["vltotal"]); ?></span>

      </div><!--col-->




      <div class="spacing2"></div>





        

      <div class="email-row info">
            
        <span>Detalhes da Compra</span>
        <hr>

      </div>






                                    
                                    


        
      <div class="email-row detail">
           
        <span class="email-label1">Data da Compra: </span><span class="email-label2"><?php echo formatDate($order["dtregister"]); ?></span>

      </div><!--col-->

      <div class="email-row detail">
       
        <span class="email-label1">ID Pagamento: </span><span class="email-label2"><?php echo htmlspecialchars( $order["despaymentcode"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>

      </div><!--col-->


      <div class="email-row detail">
       
        <span class="email-label1">Meio de Pagamento: </span><span class="email-label2">Cartão</span>

      </div><!--col-->


      <?php if( $order["nrinstallment"] > 1 ){ ?>

          <div class="email-row detail">
       
            <span class="email-label2">Parcelado em <?php echo htmlspecialchars( $order["nrinstallment"], ENT_COMPAT, 'UTF-8', FALSE ); ?> vezes de R$ <?php echo formatPrice($order["vltotal"]/$order["nrinstallment"]); ?></span>

          </div><!--col-->         

      <?php } ?>


      







      <div class="spacing2"></div>  


      <div class="spacing2"></div>  



      <div class="email-row">
            
        <span>
          Faça login no <strong>Amar Casar</strong> para gerenciar sua Loja Virtual
        </span>


      </div><!--email-row-->


      <div class="email-row email-button">
        
        <a target="_blank" href="https://amarcasar.com/login">
          <span>Login</span>
        </a>

        
      </div><!--email-row-->


      <div class="email-row">
        
        <div class="email-footer">
          
          <span>
            Precisa de ajuda? <a target="_blank" href="https://amarcasar.com/contato"><strong>Fale conosco</a>
          </span>

        </div>


      </div><!--email-row-->




  </section>


  </body>
</html>