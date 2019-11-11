
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Amar &#9825; Casar</title>

<!-- Bootstrap -->
<link rel="stylesheet" href="<?php echo DIR_RESOURCES; ?>/css/bootstrap.css">
<link rel="stylesheet" href="cadastrar-files/style.css">
<link href="https://fonts.googleapis.com/css?family=Bad+Script|Norican" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Encode+Sans+Condensed" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<link rel="icon" href="<?php echo DIR_RESOURCES; ?>/images/icone.png" type="image/png"> 
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="icon" href="<?php echo DIR_RESOURCES; ?>/images/icone.png" type="image/png">
    
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

</head>
<body>

<!-- HEADER -->

        <!-- # Content Start Here #  -->

        
            <!-- # Full Background #  -->
               
                    
                        
                            
                                <div  style="height:100%; overflow:hidden" class="row">
                                    
                                    <div class="div-geral-1 col-md-6 pad-top-40">
                                       <div class="div-geral-2 bg-cadastro login-bg  forms ">                                          
                                          <h3><a href="/"><img src="<?php echo DIR_RESOURCES; ?>/images/logo-rosa.png" alt="Amar Casar" width="200" class="media-object"></a></h3>
                                          <p class="center-text font-18 font-type-color-3">Crie o seu site, você vai amar casar!</p>
                                          <p id="frase2" class="center-text font-14"></p>
                                                                                   
                                             <div class="clearfix"></div>
                                            <form method="post" action="#" id="formNovoUsuario">
                                            
                                            	<button class="btn-facebook-login">Entrar com Facebook</button><br>
                                            	<p class="center-text font-14">ou</p>
                                              
                                                <input class="border-radius-5px " type="text" name="nome" id="nome" class="forms input" placeholder="Nome Completo" required>
                                                <input class="border-radius-5px " type="email" name="email" id="email" class="forms input" placeholder="E-mail"required>
                                                <input class="border-radius-5px " onKeyUp="check_seguranca()" type="password" name="senha" id="senha" class="form-password" placeholder="Senha" required>
                                                <div class="div-forca-senha border-radius-5px">
                                                Força de Senha <br><span id="força" class="forca-senha animate-left">&nbsp;</span>
                                                </div>
                                                <input class="border-radius-5px " type="password" name="confirma-senha" id="confirma-senha" class="form-password" placeholder="Confirme a senha" required>
                                                                                                       

                                                <input type="hidden" name="tipo" value="C">                   
                                                <input type="hidden" name="tipo_plano" value="1">                                                
												
                                                <div class="g-recaptcha" data-sitekey="6LecaWEUAAAAAH50e2RkIw1kifQB875SAGBNpx4C"></div>
                                                
                                                <input type="submit" class="border-radius-5px login-btn btn-cadastrar" value="Criar meu site" >
                                                
                                               
                                            </form>
                                          <p class="center-text font-12">Ao se cadastrar, você aceita os nossos <b><a style="color:#dd716f" href="/termos-uso" target="_blank">termos de uso.</a></b></p>
                                      </div>
                                                                          
                                    </div>


<iframe class="col-md-6 iframe-slide" src="slideshow/index.html"></iframe>


     
                                </div>
                            
                                                  
    
                             
            <!-- # End Full Background #  -->                       

<!-- / HEADER --> 

<!--  SECTION-1 -->



<!-- FOOTER -->



<!-- / FOOTER --> 
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="<?php echo DIR_RESOURCES; ?>/js/jquery-1.11.3.min.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="<?php echo DIR_RESOURCES; ?>/js/bootstrap.js"></script>  
<script src="<?php echo DIR_RESOURCES; ?>/js/_genesis/gAjax.js"></script>   
<script src="<?php echo DIR_RESOURCES; ?>/js/_genesis/bootbox.min.js"></script> 
<script src="<?php echo DIR_RESOURCES; ?>/js/_genesis/gDisplay.js"></script> 
<script src="<?php echo DIR_RESOURCES; ?>/js/jquery-mask.js"></script>
<script src="<?php echo DIR_RESOURCES; ?>/js/site.js"></script> 
<script src="<?php echo DIR_RESOURCES; ?>/js/funcoes.js"></script>

<script language="javascript">
function check_seguranca(){
        var senha = document.getElementById('senha').value;
		if(senha === ''){
				document.getElementById('força').classList.remove('status-forca-senha-1');
				document.getElementById('força').classList.remove('status-forca-senha-2');
				document.getElementById('força').classList.remove('status-forca-senha-3');
				document.getElementById('força').classList.remove('status-forca-senha-4');
		}
        var entrada = 0;
        var resultadoado;
        if(senha.length < 7){
                entrada = entrada - 1;
        }
        if(!senha.match(/[a-z_]/i) || !senha.match(/[0-9]/)){
                entrada = entrada - 1;
        }
        if(!senha.match(/\W/)){
                entrada = entrada - 1;
        }
		
		
        if(entrada == 0){
		        document.getElementById('força').classList.remove('status-forca-senha-1');
				document.getElementById('força').classList.remove('status-forca-senha-2');
				document.getElementById('força').classList.remove('status-forca-senha-3');
				document.getElementById('força').classList.add('status-forca-senha-4');	
        } else if(entrada == -1){
               	document.getElementById('força').classList.remove('status-forca-senha-1');
				document.getElementById('força').classList.remove('status-forca-senha-2');
				document.getElementById('força').classList.remove('status-forca-senha-4');
				document.getElementById('força').classList.add('status-forca-senha-3');
        } else if(entrada == -2){
                document.getElementById('força').classList.remove('status-forca-senha-1');
				document.getElementById('força').classList.remove('status-forca-senha-3');
				document.getElementById('força').classList.remove('status-forca-senha-4');
				document.getElementById('força').classList.add('status-forca-senha-2');
        } else if(entrada == -3){
        		document.getElementById('força').classList.remove('status-forca-senha-2');
				document.getElementById('força').classList.remove('status-forca-senha-3');
				document.getElementById('força').classList.remove('status-forca-senha-4');
				document.getElementById('força').classList.add('status-forca-senha-1');
        }
        
        return;
}


</script>

</body>
</html>
