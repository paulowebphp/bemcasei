<?php if(!class_exists('Rain\Tpl')){exit;}?><section id="dash-login">
    
    <div class="container">
        
        <div class="row">
            
            <div class="col-md-12 dash-login-wrapper">
                



                <div class="dash-login-box">
                    



                    


                    


                    <div class="dash-login-form">



                        <form action="/voucher" method="post">

                        
                        <p>
                            
                            <div class="dash-login-logo">
                        
                                <img src="/res/images/logo/logo-dd716f.png">

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

                            <input type="text" id="voucher" name="voucher" class="input-text">
                        
                        </p>







                        <div>

                            <input id="login-button" class="dash-login-button" type="submit" value="Aplicar Voucher" class="button">

                        </div>

                    </form> 

                    </div>




                </div><!--box-->





            </div><!--col-->

        </div><!--row-->

    </div><!--container-->


</section>

