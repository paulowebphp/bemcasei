<?php if(!class_exists('Rain\Tpl')){exit;}?><section class="dashboard">

    <div class="container-fluid">            
            

            
        <div class="row">

                


            <div class="col-md-3 col-12 dash-menu">


                <?php if( !$validate ){ ?>

                    <?php require $this->checkTemplate("dashboard-menu-expirated");?>
               

                <?php }elseif( $user["inplancontext"] == 0 ){ ?>

                    <?php require $this->checkTemplate("dashboard-menu-free");?>

                <?php }else{ ?>

                    <?php require $this->checkTemplate("dashboard-menu");?>

                <?php } ?>
                    

            </div><!--col-->




            <div class="col-md-9 col-12 dash-panel">


               

                <form method="post" action="/dashboard/meu-casamento" enctype="multipart/form-data">

                    <div class="row">
                        <div class="col-md-12">
                            
                            <div class="dash-title">
                                <h1>Casamento</h1>
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

                                <label for="dtwedding">Data do Casamento</label>
                                <input type="date" class="form-control" id="dtwedding" name="dtwedding" value="<?php echo htmlspecialchars( $wedding["dtwedding"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                            </div><!--dash-input-row-->










                            <div class="dash-input-row input-date">

                                <label for="tmwedding">Horário do Casamento</label>
                                <input type="time" class="form-control" id="tmwedding" name="tmwedding" value="<?php echo htmlspecialchars( $wedding["tmwedding"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                            </div><!--dash-input-row-->









                            <div class="dash-input-row">


                                <label for="descostume">Traje</label>
                                <input type="text" class="form-control" id="descostume" name="descostume" value="<?php echo htmlspecialchars( $wedding["descostume"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">


                            </div><!--dash-input-row-->







                            <div class="dash-input-row">

                                <div>
                                    <label for="desdescription">História do Casal</label>
                                    <!--<input type="text" class="form-control" id="desdescription" name="desdescription" value="<?php echo htmlspecialchars( $wedding["desdescription"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">-->
                                </div>
                                
                                <textarea rows="10" cols="90" maxlength="500" id="desdescription" name="desdescription"><?php echo htmlspecialchars( $wedding["desdescription"], ENT_COMPAT, 'UTF-8', FALSE ); ?></textarea>

                            </div><!--dash-input-row-->








                            <div class="dash-input-row">

                                <input type="hidden" class="form-control" id="idwedding" name="idwedding" value="<?php echo htmlspecialchars( $wedding["idwedding"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                            </div><!--dash-input-row-->









                            <div class="dash-input-row input-photo">

                            
                                    <div class="input-group mb-3">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                      </div>
                                      <div class="custom-file">
                                        <input type="file" name="file" class="custom-file-input" id="file" aria-describedby="inputGroupFileAddon01">
                                        <label class="custom-file-label" for="inputGroupFile01"></label>

                                      </div>
                                    </div>
                                    <div class="input-rows">
                                        <img class="img-responsive" id="image-preview" src="/uploads/weddings/<?php echo htmlspecialchars( $wedding["desphoto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="">
                                    </div>

                                
                            </div><!--dash-input-row-->











                                

                        </div><!--col-md-6-->





                        <div class="col-md-6">






                            
                            
                            
                            <div class="dash-input-row">


                                <label for="desaddress">Logradouro</label>
                                <input type="text" class="form-control" id="desaddress" name="desaddress" value="<?php echo htmlspecialchars( $wedding["desaddress"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">


                            </div><!--dash-input-row-->






                            <div class="dash-input-row">

                                <label for="desnumber">Número</label>
                                <input type="text" class="form-control" id="desnumber" name="desnumber" value="<?php echo htmlspecialchars( $wedding["desnumber"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                            </div><!--dash-input-row-->




      



                            <div class="dash-input-row">

                                <label for="desdistrict">Bairro (opcional)</label>
                                <input type="text" class="form-control" id="desdistrict" name="desdistrict" value="<?php echo htmlspecialchars( $wedding["desdistrict"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                            </div><!--dash-input-row-->



 



                            <div class="dash-input-row">

                                <label for="descity">Cidade</label>
                                <input type="text" class="form-control" id="descity" name="descity" value="<?php echo htmlspecialchars( $wedding["descity"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                            </div><!--dash-input-row-->





                            <div class="dash-input-row">

                                <label for="desstate">Estado</label>
                                <input type="text" class="form-control" id="desstate" name="desstate" value="<?php echo htmlspecialchars( $wedding["desstate"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                            </div><!--dash-input-row-->







                            <div class="dash-input-row">

                                <label for="descountry">País (opcional)</label>
                                <input type="text" class="form-control" id="descountry" name="descountry" value="<?php echo htmlspecialchars( $wedding["descountry"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                            </div><!--dash-input-row-->









                            <div class="dash-input-row">

                                <div>
                                    <label for="desdirections">Pontos de Referência</label>
                                    <!--<input type="text" class="form-control" id="desdirections" name="desdirections" value="<?php echo htmlspecialchars( $wedding["desdirections"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">-->
                                </div>
                                
                                <textarea rows="4" cols="90" maxlength="500" id="desdirections" name="desdirections"><?php echo htmlspecialchars( $wedding["desdirections"], ENT_COMPAT, 'UTF-8', FALSE ); ?></textarea>

                            </div><!--dash-input-row-->





                            
                            
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

