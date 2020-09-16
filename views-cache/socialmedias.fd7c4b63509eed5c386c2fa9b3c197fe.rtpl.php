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
                        <div class="col-md-12">
                            
                            <div class="dash-title">
                                <h1>Redes Sociais</h1>
                            </div><!--dash-title-->

                        </div><!--col-->
                    </div><!--row-->






                  


                    <?php if( $success != '' ){ ?>
                    <div class="row centralizer">
                        <div class="col-md-8 col-12">
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
                    <div class="row centralizer">
                        <div class="col-md-8 col-12">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div> 
                    </div>  
                    <?php } ?>

                                          



                    <div class="row dash-input-row centralizer">



                        <div class="col-md-6 col-12 custom-style-row">



                            <div class="row">
                            
                                <div class="col-md-12">
                                
                                    <div class="dash-title social-title">
                                        <h3>Facebook</h3>
                                        <hr>
                                    </div><!--dash-title-->

                                </div><!--col-->

                            </div>


                            <div class="row row-item">
                                
                                <div class="col-12">

                                    <form id="dash-form" method="post" action="/dashboard/social">

                                    <label for="desfacelink1">Casal</label>

                                    <div>   

                                        <input type="text" class="form-control" id="desfacelink1" name="desfacelink1" value="<?php echo htmlspecialchars( $socialmedia["desfacelink1"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                        
                                    </div><!--nrddd-->

                                </div>

                            </div>



                            <div class="row row-item">

                                <div class="col-12">
                                    
                                    <label for="desfacelink2"><?php echo htmlspecialchars( $user["desnick"], ENT_COMPAT, 'UTF-8', FALSE ); ?></label>

                                    <div>

                                        <input type="text" class="form-control" id="desfacelink2" name="desfacelink2" value="<?php echo htmlspecialchars( $socialmedia["desfacelink2"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                        
                                    </div><!--nrphone-->

                                </div>

                            </div>



                            <div class="row row-item">

                                <div class="col-12">
                                    
                                    <label for="desfacelink3"><?php echo htmlspecialchars( $consort["desconsort"], ENT_COMPAT, 'UTF-8', FALSE ); ?></label>

                                    <div>

                                        <input type="text" class="form-control" id="desfacelink3" name="desfacelink3" value="<?php echo htmlspecialchars( $socialmedia["desfacelink3"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                        
                                    </div><!--nrphone-->

                                </div>

                            </div>
                            

                        </div><!--col-->






                         <div class="col-md-6 col-12 custom-style-row">


                            <div class="row">
                            
                                <div class="col-md-12">
                                
                                    <div class="dash-title social-title">
                                        <h3>Instagram</h3>
                                        <hr>
                                    </div><!--dash-title-->

                                </div><!--col-->

                            </div>



                            <div class="row row-item">
                                
                                <div class="col-12">

                                    <form id="dash-form" method="post" action="/dashboard/social">

                                    <label for="desinstalink1">Casal</label>

                                    <div>   

                                        <input type="text" class="form-control" id="desinstalink1" name="desinstalink1" value="<?php echo htmlspecialchars( $socialmedia["desinstalink1"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                        
                                    </div><!--nrddd-->

                                </div>

                            </div>



                            <div class="row row-item">

                                <div class="col-12">
                                    
                                    <label for="desinstalink2"><?php echo htmlspecialchars( $user["desnick"], ENT_COMPAT, 'UTF-8', FALSE ); ?></label>

                                    <div>

                                        <input type="text" class="form-control" id="desinstalink2" name="desinstalink2" value="<?php echo htmlspecialchars( $socialmedia["desinstalink2"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                        
                                    </div><!--nrphone-->

                                </div>

                            </div>



                            <div class="row row-item">

                                <div class="col-12">
                                    
                                    <label for="desinstalink3"><?php echo htmlspecialchars( $consort["desconsort"], ENT_COMPAT, 'UTF-8', FALSE ); ?></label>

                                    <div>

                                        <input type="text" class="form-control" id="desinstalink3" name="desinstalink3" value="<?php echo htmlspecialchars( $socialmedia["desinstalink3"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                        
                                    </div><!--nrphone-->

                                </div>

                            </div>
                            

                        </div><!--col-->




                    </div><!--row-->
























                    <div class="row dash-input-row centralizer">


                        



                        <div class="col-md-6 col-12 custom-style-row">



                            <div class="row">
                            
                                <div class="col-md-12">
                                
                                    <div class="dash-title social-title">
                                        <h3>YouTube</h3>
                                        <hr>
                                    </div><!--dash-title-->

                                </div><!--col-->

                            </div>

                            <div class="row row-item">
                                
                                <div class="col-12">

                                    <form id="dash-form" method="post" action="/dashboard/social">

                                    <label for="desyoutubelink1">Casal</label>

                                    <div>   

                                        <input type="text" class="form-control" id="desyoutubelink1" name="desyoutubelink1" value="<?php echo htmlspecialchars( $socialmedia["desyoutubelink1"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                        
                                    </div><!--nrddd-->

                                </div>

                            </div>



                            <div class="row row-item">

                                <div class="col-12">
                                    
                                    <label for="desyoutubelink2"><?php echo htmlspecialchars( $user["desnick"], ENT_COMPAT, 'UTF-8', FALSE ); ?></label>

                                    <div>

                                        <input type="text" class="form-control" id="desyoutubelink2" name="desyoutubelink2" value="<?php echo htmlspecialchars( $socialmedia["desyoutubelink2"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                        
                                    </div><!--nrphone-->

                                </div>

                            </div>



                            <div class="row row-item">

                                <div class="col-12">
                                    
                                    <label for="desyoutubelink3"><?php echo htmlspecialchars( $consort["desconsort"], ENT_COMPAT, 'UTF-8', FALSE ); ?></label>

                                    <div>

                                        <input type="text" class="form-control" id="desyoutubelink3" name="desyoutubelink3" value="<?php echo htmlspecialchars( $socialmedia["desyoutubelink3"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                        
                                    </div><!--nrphone-->

                                </div>

                            </div>
                            

                        </div><!--col-->






                         <div class="col-md-6 col-12 custom-style-row">



                            <div class="row">
                            
                                <div class="col-md-12">
                                
                                    <div class="dash-title social-title">
                                        <h3>Twitter</h3>
                                        <hr>
                                    </div><!--dash-title-->

                                </div><!--col-->

                            </div>




                            <div class="row row-item">
                                
                                <div class="col-12">

                                    <form id="dash-form" method="post" action="/dashboard/social">

                                    <label for="destwitterlink1">Casal</label>

                                    <div>   

                                        <input type="text" class="form-control" id="destwitterlink1" name="destwitterlink1" value="<?php echo htmlspecialchars( $socialmedia["destwitterlink1"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                        
                                    </div><!--nrddd-->

                                </div>

                            </div>



                            <div class="row row-item">

                                <div class="col-12">
                                    
                                    <label for="destwitterlink2"><?php echo htmlspecialchars( $user["desnick"], ENT_COMPAT, 'UTF-8', FALSE ); ?></label>

                                    <div>

                                        <input type="text" class="form-control" id="destwitterlink2" name="destwitterlink2" value="<?php echo htmlspecialchars( $socialmedia["destwitterlink2"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                        
                                    </div><!--nrphone-->

                                </div>

                            </div>



                            <div class="row row-item">

                                <div class="col-12">
                                    
                                    <label for="destwitterlink3"><?php echo htmlspecialchars( $consort["desconsort"], ENT_COMPAT, 'UTF-8', FALSE ); ?></label>

                                    <div>

                                        <input type="text" class="form-control" id="destwitterlink3" name="destwitterlink3" value="<?php echo htmlspecialchars( $socialmedia["destwitterlink3"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                        
                                    </div><!--nrphone-->

                                </div>

                            </div>
                            

                        </div><!--col-->




                    </div><!--row-->





















                    <div class="row dash-input-row custom-style-row">

                        <div class="col-12">
 
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

