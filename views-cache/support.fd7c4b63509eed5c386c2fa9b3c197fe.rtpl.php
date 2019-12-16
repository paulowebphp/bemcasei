<?php if(!class_exists('Rain\Tpl')){exit;}?><section class="dashboard">

    <div class="container-fluid">            
            

            
        <div class="row">

                


            <div class="col-md-3 col-12 dash-menu">


                <?php if( $user["inplancontext"] == 0 ){ ?>

                    <?php require $this->checkTemplate("dashboard-menu-free");?>


                <?php }elseif( !$validate ){ ?>

                    <?php require $this->checkTemplate("dashboard-menu-expirated");?>
               

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
                            <div class="purple">
                                <h2>Teve dúvidas a respeito do site? Fale conosco pelo chat abaixo!</h2>
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

