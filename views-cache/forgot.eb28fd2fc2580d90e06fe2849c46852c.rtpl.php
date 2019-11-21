<?php if(!class_exists('Rain\Tpl')){exit;}?><section id="dash-forgot">
    
    <div class="container">
        
        <div class="row">
            
            <div class="col-md-12 dash-forgot-wrapper">
                



                <div class="dash-forgot-box">
                    
                  


                    <div class="dash-forgot-form">
                        
                        <form action="/recuperar-senha" method="post">

                        

                        <p>
                            
                            <div class="dash-forgot-logo">
                        
                                <img src="/res/images/logo/logo-main.png">

                            </div>


                        </p>



                        <p>
                            
                            <div class="dash-forgot-logo">
                        
                                <h2>Recuperar Senha</h2>

                            </div>


                        </p>


                        <div class="error-login-row">
                            
                            <?php if( $error != '' ){ ?>
                            <div class="alert alert-danger">
                                <?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?>
                            </div>
                            <?php } ?>
                            
                        </div>



                        <p>

                            <!--<label for="forgot">E-mail <span class="required">*</span>
                            </label>-->

                            <input type="email" id="email" name="email" class="input-text" placeholder="E-mail">
                        
                        </p>




                        <div>

                            <input class="dash-forgot-button" type="submit" value="Enviar" name="login" class="button">

                        </div>

                        

                        <div class="dash-login-pass-recovery">

                            <a href="/login">Voltar para Login</a>

                        </div>

                    </form> 

                    </div>




                </div>





            </div><!--col-->

        </div><!--row-->

    </div><!--container-->


</section>

