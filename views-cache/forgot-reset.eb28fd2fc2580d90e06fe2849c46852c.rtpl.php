<?php if(!class_exists('Rain\Tpl')){exit;}?><section id="dash-forgot">
    
    <div class="container">
        
        <div class="row">
            
            <div class="col-md-12 dash-forgot-wrapper">
                



                <div class="dash-forgot-box">
                    
                  


                    <div class="dash-forgot-form">
                        
                        <form action="/recuperar-senha/redefinir" method="post">


                        

                        <p>
                            
                            <div class="dash-forgot-logo">
                        
                                <img src="/res/images/logo/logo-main.png">

                            </div>


                        </p>


                        <p>
                            
                            <div class="dash-forgot-logo">
                        
                                <h2>Olá <?php echo htmlspecialchars( $name, ENT_COMPAT, 'UTF-8', FALSE ); ?>, digite uma nova senha:</h2>

                            </div>


                        </p>



                        <p>

                            <!--<label for="forgot">E-mail <span class="required">*</span>
                            </label>-->

                            <input type="password" id="password" name="password" class="input-text" placeholder="Insira a Nova Senha">

                            <input type="hidden" name="code" value="<?php echo htmlspecialchars( $code, ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                        </p>




                        <div>

                            <input class="dash-forgot-button" type="submit" value="Enviar" name="login" class="button">

                        </div>

                        

                        <div class="clear"></div>



                    </form> 

                    </div>




                </div>





            </div><!--col-->

        </div><!--row-->

    </div><!--container-->


</section>

