<?php if(!class_exists('Rain\Tpl')){exit;}?><section id="dash-login">
    
    <div class="container">
        
        <div class="row">
            
            <div class="col-md-12 dash-login-wrapper">
                



                <div class="dash-login-box">
                    



                    


                    


                    <div class="dash-login-form">



                        <form id="login-form" action="/painel/login" method="post">

                        
                            <p>
                                
                                <div class="dash-login-logo">
                            
                                    <img src="/res/images/logo/logo-main.png">

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

                                <!--<label for="login">E-mail <span class="required">*</span>
                                </label>-->

                                <input type="text" id="login" name="login" placeholder="E-mail" class="input-text">
                            
                            </p>




                            <p>

                                <!--<label for="senha">Senha <span class="required">*</span>
                                </label>-->

                                <input type="password" id="senha" name="password" placeholder="Senha" class="input-text">

                            </p>






                            <div>

                                <input id="login-button" class="dash-login-button" type="submit" value="Entrar" class="button">

                            </div>

                            <!--<div class="dash-login-pass-recovery">

                                <a href="/recuperar-senha">Esqueceu a senha?</a>

                            </div>-->

                            <div class="clear"></div>

                        </form> 

                    </div>




                </div><!--box-->





            </div><!--col-->

        </div><!--row-->

    </div><!--container-->


</section>

