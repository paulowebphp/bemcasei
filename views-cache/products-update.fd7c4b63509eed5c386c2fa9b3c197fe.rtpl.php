<?php if(!class_exists('Rain\Tpl')){exit;}?><section class="dashboard">

    <div class="container-fluid">            
            

            
        <div class="row">

                


            <div class="col-md-3 col-12 dash-menu">


                <?php if( !validatePlan() ){ ?>

                    <?php require $this->checkTemplate("dashboard-menu-expirated");?>
               

                <?php }elseif( validatePlanFree() ){ ?>

                    <?php require $this->checkTemplate("dashboard-menu-free");?>

                <?php }else{ ?>

                    <?php require $this->checkTemplate("dashboard-menu");?>

                <?php } ?>
                    

            </div><!--col-->




            <div class="col-md-9 col-12 dash-panel">


                

               <form method="post"  enctype="multipart/form-data" action='/dashboard/presentes-virtuais/<?php echo setHash($product["idproduct"]); ?>'>


                    <div class="row">
                        <div class="col-md-12">
                            
                            <div class="dash-title">
                                <h1>Editar</h1>
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



                    

                    <div class="row">
                        
                        <div class="col-md-6 dash-column">





                            <div class="dash-input-row input-date">

                                <label for="desproduct">Nome do Presente</label>
                                <input type="text" class="form-control" id="desproduct" name="desproduct" value="<?php echo htmlspecialchars( $product["desproduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                            </div><!--dash-input-row-->





                            <!--<div class="dash-input-row">


                                <label for="incategory">Categoria</label>
                                <input type="text" class="form-control" id="incategory" name="incategory">


                            </div>-->




                            <div class="dash-input-row">
                                
                                <div class="input-group mb-3">

                                  <div class="input-group-prepend">

                                    <label class="input-group-text" for="incategory">Categoria</label>

                                  </div><!--input-group-prepend-->

                                  <select id="incategory" name="incategory" class="custom-select">

                                    <option value="11" <?php if( $product["incategory"] == '11' ){ ?>selected<?php } ?>>Bar e Adega</option>
                                    <option value="12" <?php if( $product["incategory"] == '12' ){ ?>selected<?php } ?>>Cama, Mesa e Banho</option>
                                    <option value="13" <?php if( $product["incategory"] == '13' ){ ?>selected<?php } ?>>Cozinha</option>
                                    <option value="14" <?php if( $product["incategory"] == '14' ){ ?>selected<?php } ?>>Eletrodomésticos</option>
                                    <option value="15" <?php if( $product["incategory"] == '15' ){ ?>selected<?php } ?>>Eletrônicos</option>
                                    <option value="16" <?php if( $product["incategory"] == '16' ){ ?>selected<?php } ?>>Lua de Mel</option>
                                    <option value="17" <?php if( $product["incategory"] == '17' ){ ?>selected<?php } ?>>Móveis</option>

                                  </select>

                                
                                </div><!--mb-3-->

                            </div><!--dash-input-row-->




                            <div class="dash-input-row">


                                <label for="vlprice">Valor</label>
                                <input type="number" min="100.00" max="2000.00" step="0.01" class="form-control" id="vlprice" name="vlprice" value="<?php echo htmlspecialchars( $product["vlprice"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">


                            </div><!--dash-input-row-->







                            <div class="dash-input-row">

                                <input type="hidden" class="form-control" id="idproduct" name="idproduct" value='<?php echo setHash($product["idproduct"]); ?>'>

                            </div><!--dash-input-row-->





                             




                            <div class="dash-input-row input-photo">

                            
                                    <div class="input-group mb-3">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                      </div>
                                      <div class="custom-file">
                                        <input type="file" name="file" class="custom-file-input" id="file" aria-describedby="inputGroupFileAddon01">
                                        <label class="custom-file-label" for="file"></label>

                                      </div>
                                    </div>
                                    <div class="input-rows">
                                        <img class="img-responsive" id="image-preview" src="/uploads/products/<?php echo htmlspecialchars( $product["desphoto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="">
                                    </div>

                                
                            </div><!--dash-input-row-->


                            





                                

                        </div><!--col-md-6-->





                        <div class="col-md-6">
                            
                            
                            
                            &nbsp;

                            
                            
                        </div><!--col-md-6-->


                    </div><!--row-->





                    <div class="row">

                        <div class="col-md-6">

                            <div class="dash-input-row input-footer">
                                
                                <button type="submit" class="btn btn-primary">Salvar</button>

                                <a href="/dashboard/presentes-virtuais" class="btn btn-danger">Voltar</a>

                            </div><!--dash-input-row-->
                            
                        </div><!--col-->



                        <div class="col-md-6">

                            &nbsp;
                            
                        </div><!--col-->



                    </div><!--row-->



                </form>



            </div><!--col-->
        



      
        </div><!--row-->
    
    </div><!--container-->

</section>

