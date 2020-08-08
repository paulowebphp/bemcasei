<?php if(!class_exists('Rain\Tpl')){exit;}?><section class="dashboard dashboard-index">

    <div class="container-fluid">            
            

            
        <div class="row">

                


            <div class="col-md-3 col-12 dash-menu">


                <?php if( $lead["inlead"] == 1 ){ ?>

                    <?php require $this->checkTemplate("panel-menu1");?>

                <?php } ?>
                    

            </div><!--col-->




            <div class="col-md-9 col-12 dash-panel">


                

                
                <?php if( $success != '' ){ ?>
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?php echo htmlspecialchars( $success, ENT_COMPAT, 'UTF-8', FALSE ); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div> 
                </div>  
                <?php } ?>

                <?php if( $error != '' ){ ?>
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div> 
                </div>  
                <?php } ?>





                    

                <div class="row">
                    
                    <div class="col-md-6 col-12">

                        <h3>Olá!</h3>

                        <p>Para fazer o Download do seu E-book, clique no botão abaixo:</p>

                        

                        <div class="bottom2">
                            <button id="ebook-download" type="button" class="button7">Download</button>
                        </div>

                        <p>Se preferir, abra o E-book em uma Nova Aba:</p>

                        <div class="bottom2">
                            <a target="_blank" href="/ebook/7_Passos_Seguros_e_Eficientes_Para_Realizar_Seu_Casamento.pdf"><button type="button" class="button7">Abrir Em Outra Aba</button></a>
                        </div>


                    </div><!--col-lg-3-->




                    <div class="col-md-6 col-12">

                        &nbsp;

                    </div><!--col-lg-3-->


                </div><!--row-->



                






            </div><!--col-->
        


      
        </div><!--row-->
    
    </div><!--container-->

</section>

