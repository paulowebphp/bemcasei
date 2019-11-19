<?php if(!class_exists('Rain\Tpl')){exit;}?><section id="site-search">
    
    <div class="container">

        
        
        <div class="row site-search-box centralizer">
            
            
            
                        
            <div class="col-md-4 col-12 text-center">
                
                <div class="site-search-title">
            
                    <h2>Buscar Casal</h2>        

                </div>

            </div>



            <div class="col-md-5 col-12">
                

                    <div class="search-input">

                        <!--<label for="login">E-mail <span class="required">*</span>
                        </label>-->

                        <form action="/buscar">

                        <input type="text" id="quaesitum" name="quaesitum" placeholder="Nome ou e-mail de um dos cônjuges" class="input-text">
                    
                    </div>

                   
            </div>



            <div class="col-md-3 col-12">
                
               
                    <div class="search-submit centralizer">

                        <input type="submit" value="Buscar">

                        </form> 


                    </div>
                    


            </div>




        </div>

                    










 
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






        <div class="row quaesitum-area">
            
            <div class="col-12 text-center">

                <?php if( $results_handler == 0 ){ ?>
                <div class="row centralizer">
                    <div class="col-md-8 col-10">
                        &nbsp;
                    </div><!--col-->
                </div><!--row-->

                <?php }elseif( $results_handler == 1 ){ ?>
                <div class="row centralizer">
                    <div class="col-md-8 col-10">
                        <div class="alert alert-info alert-domain" role="alert">
                            <h2>Nenhum Noivo ou Noiva foi encontrado</h2>
                        </div><!--alert-->
                    </div><!--col-->
                </div><!--row-->
                <?php }else{ ?>


                <?php $counter1=-1;  if( isset($user) && ( is_array($user) || $user instanceof Traversable ) && sizeof($user) ) foreach( $user as $key1 => $value1 ){ $counter1++; ?>

                
                <div class="card">
                                


                   
                                                
                    <div class="card-photo">
                
                        <img src="/uploads/banners/<?php echo htmlspecialchars( $value1["desbanner"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                    </div>

                    
            

                
                
                    <div class="card-title bottom3">
                        <h3>
                    
                            <?php echo htmlspecialchars( $value1["desnick"], ENT_COMPAT, 'UTF-8', FALSE ); ?> 

                        </h3>

                        <h3>&</h3>

                        <h3>
                            
                            <?php echo htmlspecialchars( $value1["desconsort"], ENT_COMPAT, 'UTF-8', FALSE ); ?> 

                        </h3>
                           
                    </div>     
                                    
                    







                    <div class="card-details">
                        



                        

                        <div class="card-detail-date bottom3">

                            <h5><?php echo formatDate($value1["dtwedding"]); ?></h5>

                            <hr>

                            <span>Data do Casamento</span>

                        </div>



                        <div class="card-detail bottom3">

                            <h5><?php echo htmlspecialchars( $value1["descity"], ENT_COMPAT, 'UTF-8', FALSE ); ?> / <?php echo htmlspecialchars( $value1["desstatecode"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php if( $value1["descountrycode"] != 'BRA' ){ ?> <?php echo htmlspecialchars( $value1["descountry"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php } ?></h5>

                            <hr>

                            <span>Localização</span>

                        </div>


                        

                       

                        

                    </div><!--card-detail-->
                        


                    <div class="row buttons-wrapper centralizer">
                        
                        <div class="col-12">
                            
                            <a target="_blank" href="/<?php echo htmlspecialchars( $value1["desdomain"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" role="button">
                        
                            
                                <button class="button3">Site do Casal</button>


                            </a>

                        </div>





                        <div class="col-12">
                            
                            <a target="_blank" href="/<?php echo htmlspecialchars( $value1["desdomain"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/rsvp" role="button">
                            
                                <button class="button5">
                                    Confirmar Presença

                                </button>

                            </a>

                        </div>

                        <div class="col-12">
                            
                            <a target="_blank" href="/<?php echo htmlspecialchars( $value1["desdomain"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/loja" role="button">
                            
                                <button class="button4">
                                    Presentear

                                </button>

                            </a>

                        </div>

                    </div>



                 

                   

                    


                </div><!--card-->
                <?php } ?>

                <div class="row">
                        

                    <div class="col-12 centralizer">
                        
                        <div class="dash-pagination clearfix">
                            <ul class="pagination pagination-sm no-margin">
                                <?php $counter1=-1;  if( isset($pages) && ( is_array($pages) || $pages instanceof Traversable ) && sizeof($pages) ) foreach( $pages as $key1 => $value1 ){ $counter1++; ?>
                                    <a href="<?php echo htmlspecialchars( $value1["href"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><li><?php echo htmlspecialchars( $value1["text"], ENT_COMPAT, 'UTF-8', FALSE ); ?></li></a>
                                <?php } ?>
                            </ul>
                        </div>


                    </div><!--col-->

                </div><!--row-->

                <?php } ?>
                

                
            </div>
        </div>


        



    </div><!--container-->


</section>

