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


                
                <div class="row centralizer">
            

                    <div class="col-md-10 col-12 text-center">
                            
                        <h3>404 - Infelizmente não foi encontrado nenhum conteúdo :(</h3>
        
                        <h5>Por favor, verifique como digitou e tente novamente</h5>
                        
                        <img alt="404 - Infelizmente não foi encontrado nenhum conteúdo" src="/res/images/banner/404.jpg">  
        
                    </div>
        
        
                </div>
                



            </div><!--col-->
        



      
        </div><!--row-->
    
    </div><!--container-->

</section>

