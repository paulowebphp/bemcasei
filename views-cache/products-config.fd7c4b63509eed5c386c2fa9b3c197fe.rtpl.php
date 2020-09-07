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


                

                <form id="dash-form" method="post" action="/dashboard/presentes-virtuais/configurar">

                    <div class="row">
                        
                        <div class="col-md-6 dash-column">


                            <div class="row">
                                <div class="col-md-12">
                                    
                                    <div class="dash-title">
                                        <h1>Configurações</h1>
                                    </div><!--dash-title-->

                                </div><!--col-->
                            </div><!--row-->




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


                            <div class="dash-input-row">
                                
                                    <label for="incharge">Quem arca com as tarifas bancárias:</label>

                                    <select id="incharge" name="incharge">

                                        <option value="0" <?php if( $productconfig["incharge"] == '0' ){ ?>selected<?php } ?>>Casal</option>
                                        <option value="1" <?php if( $productconfig["incharge"] == '1' ){ ?>selected<?php } ?>>Convidado</option>

                                  </select>

                            </div><!--dash-input-row-->








                            <div class="dash-input-row">

                                <input type="hidden" class="form-control" id="idproductconfig" name="idproductconfig" value="<?php echo htmlspecialchars( $productconfig["idproductconfig"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                            </div><!--dash-input-row-->





                                

                        </div><!--col-md-6-->





                        <div class="col-md-6">
                            
                            
                            
                            &nbsp;

                            
                            
                        </div><!--col-md-6-->


                    </div><!--row-->





                    <div class="row">

                        <div class="col-md-12">

                            <div class="dash-input-row">
                                
                                <button type="submit" class="btn btn-primary">Salvar</button>

                                <a href="/dashboard/presentes-virtuais" class="btn btn-danger">Voltar</a>

                            </div><!--dash-input-row-->
                            
                        </div><!--col-->

                    </div><!--row-->



                </form>



            </div><!--col-->
        



      
        </div><!--row-->
    
    </div><!--container-->

</section>








