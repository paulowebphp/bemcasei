<?php if(!class_exists('Rain\Tpl')){exit;}?><section class="dashboard">

    <div class="container-fluid">            
            

            
        <div class="row">

                


            <div class="col-md-3 col-12 dash-menu">


            <?php if( !$validate ){ ?>

				<?php if( $user["incheckout"] == 0 or $user["inaccount"] == 0 ){ ?>

					<?php require $this->checkTemplate("dashboard-menu-noorders");?>

				<?php }else{ ?>

					<?php require $this->checkTemplate("dashboard-menu-expirated");?>

				<?php } ?>

			<?php }elseif( $validate["incontext"] == 0 ){ ?>

				<?php require $this->checkTemplate("dashboard-menu-free");?>

			<?php }else{ ?>

				<?php require $this->checkTemplate("dashboard-menu");?>

			<?php } ?>
                    

            </div><!--col-->




            <div class="col-md-9 col-12 dash-panel">


                

                <div class="row">

                        <div class="col-md-12 centralizer bottom3">
                        
                            <h1>Fale Conosco</h1>
            
                        </div><!--col-->
            
                    </div><!--row-->
            
            
            
            
                    
                    <div class="row centralizer">
                        
            
            
                        
            
                        <div class="col-md-8 col-12 text-center">
                            
                            <!--<h2>Precisa de ajuda?</h2>-->
                            <div class="purple bottom2">
                                <h2>Teve dúvidas a respeito do site? Basta clicar no botão abaixo e falar conosco pelo WhatsApp!</h2>
                            </div>

                            <div class="purple bottom2">
                                <h2>Atendemos de 10:00 às 22:00, todos os dias da semana.</h2>
                            </div>
                            <!--<p>Muitas dúvidas já estão resolvidas na Central de Ajuda. Visite-a  para obter sua resposta!<br><br>
                            <a href="#" class="btn-amarcasar4">Central de Ajuda</a>-->
                            
                            <h3>O Bem Casei está à sua inteira disposição para críticas, sugestões e comentários!</h3> 
                            <!--Para críticas, sugestões e comentários, use o formulário ao lado:</p>-->
            
                        </div><!--col-->
            
            
                        
                    </div><!--row-->



            </div><!--col-->
        



      
        </div><!--row-->
    
    </div><!--container-->

</section>

