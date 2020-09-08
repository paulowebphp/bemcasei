<?php if(!class_exists('Rain\Tpl')){exit;}?><section class="dashboard">

    <div class="container-fluid">            
            

            
        <div class="row">

                


            <div class="col-md-3 col-12 dash-menu">


                <?php if( $user["inplancontext"] == 0 ){ ?>

                    <?php require $this->checkTemplate("dashboard-menu-free");?>

                
                <?php }elseif( $user["incheckout"] == 0 ){ ?>

                    <?php require $this->checkTemplate("dashboard-menu-nocheckout");?>
                

                <?php }elseif( !$validate ){ ?>

                    <?php require $this->checkTemplate("dashboard-menu-expirated");?>
                

                <?php }else{ ?>

                    <?php require $this->checkTemplate("dashboard-menu");?>

                <?php } ?>
                    

            </div><!--col-->




            <div class="col-md-9 col-12 dash-panel">


               

                <form method="post" action="/dashboard/testemunho" enctype="multipart/form-data">

                    <div class="row">
                        <div class="col-md-12">
                            
                            <div class="dash-title">
                                <h1>Testemunho</h1>
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



                            <div class="dash-input-row">

                                <div>
                                    <label for="desdescription">Opinião do Casal</label>
                                    <!--<input type="text" class="form-control" id="desdescription" name="desdescription" value="<?php echo htmlspecialchars( $testimonial["desdescription"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">-->
                                </div>
                                
                                <textarea rows="10" cols="90" maxlength="500" id="desdescription" name="desdescription"><?php echo htmlspecialchars( $testimonial["desdescription"], ENT_COMPAT, 'UTF-8', FALSE ); ?></textarea>

                            </div><!--dash-input-row-->






                            <div class="dash-input-row input-date">
                                
                                <div class="input-group mb-3">

                                  <div class="input-group-prepend">

                                    <label class="input-group-text" for="instatus">Permissão</label>

                                  </div><!--input-group-prepend-->

                                  <select id="instatus" name="instatus" class="custom-select">

                                    <option value="0" <?php if( $testimonial["instatus"] == '0' ){ ?>selected<?php } ?>>Não</option>
                                    <option value="1" <?php if( $testimonial["instatus"] == '1' ){ ?>selected<?php } ?>>Sim</option>

                                  </select>

                                
                                </div><!--mb-3-->

                            </div><!--dash-input-row-->






                            <div class="dash-input-row input-date">
                                
                                <div class="input-group mb-3">

                                  <div class="input-group-prepend">

                                    <label class="input-group-text" for="inrating">Avaliação</label>

                                  </div><!--input-group-prepend-->

                                  <select id="inrating" name="inrating" class="custom-select">

                                    <option value="0" <?php if( $testimonial["inrating"] == '0' ){ ?>selected<?php } ?>>0</option>
                                    <option value="1" <?php if( $testimonial["inrating"] == '1' ){ ?>selected<?php } ?>>1</option>
                                    <option value="2" <?php if( $testimonial["inrating"] == '2' ){ ?>selected<?php } ?>>2</option>
                                    <option value="3" <?php if( $testimonial["inrating"] == '3' ){ ?>selected<?php } ?>>3</option>
                                    <option value="4" <?php if( $testimonial["inrating"] == '4' ){ ?>selected<?php } ?>>4</option>
                                    <option value="5" <?php if( $testimonial["inrating"] == '5' ){ ?>selected<?php } ?>>5</option>
                                    <option value="6" <?php if( $testimonial["inrating"] == '6' ){ ?>selected<?php } ?>>6</option>
                                    <option value="7" <?php if( $testimonial["inrating"] == '7' ){ ?>selected<?php } ?>>7</option>
                                    <option value="8" <?php if( $testimonial["inrating"] == '8' ){ ?>selected<?php } ?>>8</option>
                                    <option value="9" <?php if( $testimonial["inrating"] == '9' ){ ?>selected<?php } ?>>9</option>
                                    <option value="10" <?php if( $testimonial["inrating"] == '10' ){ ?>selected<?php } ?>>10</option>
                                

                                  </select>

                                
                                </div><!--mb-3-->

                            </div><!--dash-input-row-->











                                

                        </div><!--col-md-6-->





                        <div class="col-md-6">






                            
                            
                            
                            &nbsp;





                            
                            
                        </div><!--col-md-6-->


                    </div><!--row-->





                    <div class="row">

                        <div class="col-md-12">

                            <div class="dash-input-row input-footer">
                                
                                <button type="submit" class="btn btn-primary">Salvar</button>

                                <a href="/dashboard" class="btn btn-danger">Voltar</a>

                            </div><!--dash-input-row-->
                            
                        </div><!--col-->

                    </div><!--row-->



                </form>



            </div><!--col-->
        



      
        </div><!--row-->
    
    </div><!--container-->

</section>

