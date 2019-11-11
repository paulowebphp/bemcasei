<?php if(!class_exists('Rain\Tpl')){exit;}?><section id="register" class="site">
    
    <div class="container">
        

        <div class="row">
            

            <div class="col-md-6 text-center">

                

                <form action="/criar-site" method="post">
                    
                    <h3><a href="/"><img alt="Logo Amar Casar" src="/res/images/logo/logo-dd716f.png" width="200" class="media-object"></a></h3>

                    <p class="center-text font-18 font-type-color-3">Crie o seu site, você vai amar!</p>

                    <p id="phrase2" class="center-text font-14"></p>

                    <?php if( $errorRegister != '' ){ ?>
                    <div class="alert alert-danger">
                        <?php echo htmlspecialchars( $errorRegister, ENT_COMPAT, 'UTF-8', FALSE ); ?>
                    </div>
                    <?php } ?>
                    
                    <div class="form-row input2 bottom1">
                        <input type="text" id="name1" name="name" class="input-text" value="<?php echo htmlspecialchars( $registerValues["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" placeholder="Nome Completo">
                    </div>


                    <div class="form-row input2 bottom1">
                        <input type="email" id="email1" name="email" class="input-text" value="<?php echo htmlspecialchars( $registerValues["email"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" placeholder="E-mail">
                    </div>


                    <div class="form-row input2 bottom1">
                        <input type="password" id="password" name="password" class="input-text" placeholder="Senha">
                    </div>

                    <div class="form-row input2 bottom1 form-row-last">
                        <input type="password" id="confirmation-register" name="confirmation-register" class="input-text" placeholder="Confirmar Senha">
                    </div>


                    <div class="form-row input2 bottom1">
                        <input type="hidden" name="plano" class="input-text" value="<?php echo htmlspecialchars( $inplancode, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    </div>

                    <div class="g-recaptcha" data-sitekey="6Lenr7EUAAAAAEkU4sdxExYgJmEKhPYCgzXbeecd"></div>


                    <div class="form-row top3 bottom1">

                        <input type="submit" id="site-register" name="site-register" class="button3 width100" value="Criar Conta">
                        <div class="load" id="load1"></div>
                    </div>

                    <p class="center-text font-12">Ao se registrar, você aceita os nossos <a style="color:#dd716f" href="/termos-uso" target="_blank">Termos de Uso</a>.</p>

                    <div class="clear"></div>
                </form>     

            </div><!--col-md-12-->






            <div class="col-md-6">
                
                <div class="register-image">
                    <img alt="Banner" src="/res/images/banner/banner5.jpg">
                </div>

            </div>

        </div>

    </div><!--container-->
    

</section>
