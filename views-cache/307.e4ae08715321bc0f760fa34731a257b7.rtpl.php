<?php if(!class_exists('Rain\Tpl')){exit;}?><section id="site-404">
    
    <div class="container">
        
        <div class="row centralizer">
            

        	<?php if( $error != '' ){ ?>
            <div class="col-md-10 col-12 text-center">
                    
                <h3><?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>

                
                <img alt="Olá! Estamos fazendo uma manutenção momentânea no nosso sistema" src="/res/images/banner/404.png">  

            </div>
            <?php }else{ ?>
            <div class="col-md-10 col-12 text-center">
                    
                <h3>Olá! Estamos fazendo uma manutenção momentânea no nosso sistema :(</h3>

                <h5>Por favor, tente novamente mais tarde!</h5>
                
                <img alt="Olá! Estamos fazendo uma manutenção momentânea no nosso sistema" src="/res/images/banner/404.png">  

            </div>
            <?php } ?>


         
        


        </div>

                    

    </div><!--container-->


</section>

