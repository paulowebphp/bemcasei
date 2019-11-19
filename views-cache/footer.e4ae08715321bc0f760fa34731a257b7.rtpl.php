<?php if(!class_exists('Rain\Tpl')){exit;}?><footer>

    <div class="container-fluid">

        <div id="footer-first-row" class="row">



            <div class="col-md-4 footer-column">


                <div class="footer-title caption">
                    <a href='/<?php echo getDesdomain(); ?>'><h3><?php echo getNames(); ?></h3></a>
                </div>

                <div class="caption">

                    &nbsp;

                </div><!--caption-->


                
                

            </div><!--col-lg-6-->





        





            <div class="col-md-4 footer-column">


                <div class="caption">

                    <h2>Páginas</h2>

                    <a href="/<?php echo getDesdomain(); ?>" class="list-group-item list-group-item-action">Home</a>


                    <a href='/<?php echo getDesdomain(); ?>/casamento' class="list-group-item list-group-item-action">Casamento</a>

                    <?php if( setTemplateMenu('party') ){ ?><a href='/<?php echo getDesdomain(); ?>/festa-de-casamento' class="list-group-item list-group-item-action">Festa de Casamento</a><?php } ?>


                    <?php if( setTemplateMenu('bestfriend') ){ ?><a href='/<?php echo getDesdomain(); ?>/padrinhos-madrinhas' class="list-group-item list-group-item-action">Padrinhos e Madrinhas</a><?php } ?>


                    <?php if( setTemplateMenu('rsvp') ){ ?><a href='/<?php echo getDesdomain(); ?>/rsvp' class="list-group-item list-group-item-action">RSVP</a><?php } ?>


                    <?php if( setTemplateMenu('message') ){ ?><a href='/<?php echo getDesdomain(); ?>/mural-mensagens' class="list-group-item list-group-item-action">Mensagens</a><?php } ?>


                    <?php if( setTemplateMenu('store') ){ ?><a href='/<?php echo getDesdomain(); ?>/loja' class="list-group-item list-group-item-action">Loja</a><?php } ?>

                    

                    <?php if( setTemplateMenu('event') ){ ?><a href='/<?php echo getDesdomain(); ?>/eventos' class="list-group-item list-group-item-action">Eventos</a><?php } ?>
                    
                    

                    <?php if( setTemplateMenu('album') ){ ?><a href='/<?php echo getDesdomain(); ?>/album' class="list-group-item list-group-item-action">Album</a><?php } ?>
                    
                    

                    <?php if( setTemplateMenu('video') ){ ?><a href='/<?php echo getDesdomain(); ?>/videos' class="list-group-item list-group-item-action">Vídeos</a>  <?php } ?>

                     

                    <?php if( setTemplateMenu('stakeholder') ){ ?><a href='/<?php echo getDesdomain(); ?>/fornecedores' class="list-group-item list-group-item-action">Fornecedores</a> <?php } ?>
                    
                      

                    <?php if( setTemplateMenu('outerlist') ){ ?><a href='/<?php echo getDesdomain(); ?>/listas-de-fora' class="list-group-item list-group-item-action">Listas de Fora</a><?php } ?>
                    

                </div><!--caption-->                


            </div><!--col-md-3-->







            <div class="col-md-4 footer-column socials">

                

                 <?php if( getUnifiedSocialMedia() ){ ?>

                    <div class="row">
                     
                        <div class="col-12 caption">

                            <h2>Redes Sociais do Casal</h2>

                            <!-- <div class="col-xs-4 text-center"> <a href="#"><img src="&lt;?php echo DIR_RESOURCES; ?&gt;/images/twitter64.png" alt="Placeholder image" width="86" height="86" class="img-responsive"></a></div> -->


                            <ul class="list-socials list-unstyled list-group list-group-horizontal">

                                <?php if( checkSocialMedia('desfacelink1') ){ ?>
                                <li>
                                    <a href='https://<?php echo getSocialMediaLink("desfacelink1"); ?>' target="_blank"><i class="fa fa-facebook"></i></a>
                                </li>
                                <?php } ?>


                                <?php if( checkSocialMedia('desinstalink1') ){ ?>
                                <li>
                                    <a href='https://<?php echo getSocialMediaLink("desinstalink1"); ?>' target="_blank"><i class="fa fa-instagram"></i></a>
                                </li>
                                <?php } ?>

                                <?php if( checkSocialMedia('desyoutubelink1') ){ ?>
                                <li>
                                    <a href='https://<?php echo getSocialMediaLink("desyoutubelink1"); ?>' target="_blank"><i class="fa fa-youtube"></i></a>
                                </li>
                                <?php } ?>


                                <?php if( checkSocialMedia('destwitterlink1') ){ ?>
                                <li>
                                    <a href='https://<?php echo getSocialMediaLink("destwitterlink1"); ?>' target="_blank"><i class="fa fa-twitter"></i></a>
                                </li>
                                <?php } ?>

                            </ul>


                        </div><!--col-->

                    </div><!--row-->

                 <?php } ?>




                 <?php if( getPersonSocialMedia() ){ ?>

                    <div class="row">
                     
                        <div class="col-12 caption">

                            <h2>Redes Sociais de <?php echo getDesnick(); ?></h2>

                            <!-- <div class="col-xs-4 text-center"> <a href="#"><img src="&lt;?php echo DIR_RESOURCES; ?&gt;/images/twitter64.png" alt="Placeholder image" width="86" height="86" class="img-responsive"></a></div> -->


                            <ul class="list-socials list-unstyled list-group list-group-horizontal">

                                <?php if( checkSocialMedia('desfacelink2') ){ ?>
                                <li>
                                    <a href='https://<?php echo getSocialMediaLink("desfacelink2"); ?>' target="_blank"><i class="fa fa-facebook"></i></a>
                                </li>
                                <?php } ?>


                                <?php if( checkSocialMedia('desinstalink2') ){ ?>
                                <li>
                                    <a href='https://<?php echo getSocialMediaLink("desinstalink2"); ?>' target="_blank"><i class="fa fa-instagram"></i></a>
                                </li>
                                <?php } ?>

                                <?php if( checkSocialMedia('desyoutubelink2') ){ ?>
                                <li>
                                    <a href='https://<?php echo getSocialMediaLink("desyoutubelink2"); ?>' target="_blank"><i class="fa fa-youtube"></i></a>
                                </li>
                                <?php } ?>


                                <?php if( checkSocialMedia('destwitterlink2') ){ ?>
                                <li>
                                    <a href='https://<?php echo getSocialMediaLink("destwitterlink2"); ?>' target="_blank"><i class="fa fa-twitter"></i></a>
                                </li>
                                <?php } ?>

                            </ul>


                        </div><!--col-->

                    </div><!--row-->

                 <?php } ?>





                 <?php if( getConsortSocialMedia() ){ ?>

                    <div class="row">
                     
                        <div class="col-12 caption">

                            <h2>Redes Sociais de <?php echo getDesconsort(); ?></h2>

                            <!-- <div class="col-xs-4 text-center"> <a href="#"><img src="&lt;?php echo DIR_RESOURCES; ?&gt;/images/twitter64.png" alt="Placeholder image" width="86" height="86" class="img-responsive"></a></div> -->


                            <ul class="list-socials list-unstyled list-group list-group-horizontal">

                                <?php if( checkSocialMedia('desfacelink3') ){ ?>
                                <li>
                                    <a href='https://<?php echo getSocialMediaLink("desfacelink3"); ?>' target="_blank"><i class="fa fa-facebook"></i></a>
                                </li>
                                <?php } ?>


                                <?php if( checkSocialMedia('desinstalink3') ){ ?>
                                <li>
                                    <a href='https://<?php echo getSocialMediaLink("desinstalink3"); ?>' target="_blank"><i class="fa fa-instagram"></i></a>
                                </li>
                                <?php } ?>

                                <?php if( checkSocialMedia('desyoutubelink3') ){ ?>
                                <li>
                                    <a href='https://<?php echo getSocialMediaLink("desyoutubelink3"); ?>' target="_blank"><i class="fa fa-youtube"></i></a>
                                </li>
                                <?php } ?>


                                <?php if( checkSocialMedia('destwitterlink3') ){ ?>
                                <li>
                                    <a href='https://<?php echo getSocialMediaLink("destwitterlink3"); ?>' target="_blank"><i class="fa fa-twitter"></i></a>
                                </li>
                                <?php } ?>

                            </ul>


                        </div><!--col-->

                    </div><!--row-->

                <?php }elseif( !checkAllSocialMedia() ){ ?>

                    <div class="footer-title caption">

                        <h3>Sejam bem vindos ao nosso site!</h3>
                        
                    </div><!--banner-date-box-->

                <?php } ?>

               





            </div><!--col-md-3-->




    </div><!--row-->


















    <div class="row centralizer">

        <div class="col-md-12 bottom-footer">

            <div class="caption">

                <p>Bem Casei © <?php echo getYear(); ?> - CNPJ 34.700.513/0001-27<br><a href="/termos-uso">Termos de Uso</a> | <a href="/termos-lista">Termos da Lista de Presentes Virtuais</a> | <a href="/politica-privacidade">Política de Privacidade</a> | <a href="/contato">Dúvidas e Suporte</a></p>

            <h6><i class="fa fa-lock"></i>&nbsp;&nbsp;Site Protegido</h6>

            </div><!--caption-->

        </div><!--col-xs-12-->

    </div><!--row-->










    <!-- Modal -->
    <div class="modal fade" id="ExemploModalCentralizado" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="TituloModalCentralizado">Adquira seu plano já!</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Para ter acesso a estas e outras funcionalidades, é preciso adquirir um plano
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            <a href="/dashboard/meu-plano" role="button" class="btn btn-secondary popover-test" title="Título do popover" data-content="O conteúdo do popover é definido aqui.">Comprar já!</a>
          </div>
        </div>
      </div>
    </div>







    </div><!--container-->

</footer>
   
    <!-- <script src="https://code.jquery.com/jquery.min.js"></script> -->
    
    <script type="text/javascript" src="/res/js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="/res/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="/res/js/jquery.easing.1.3.min.js"></script>


    <script type="text/javascript" src="/res/js/jquery.payment.js"></script>
    <script type="text/javascript" src="/res/js/jscolor.js"></script>


    <!-- Biblioteca Handlebars tem que vir depois do JQuery -->
    <script type="text/javascript" src="/res/js/handlebars-v4.0.10.js"></script>
    
    <!-- Bootstrap JS form CDN -->
    <script type="text/javascript" src="/res/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="/res/js/bootstrap.min.js"></script>
    


    
    <!-- jQuery sticky menu -->
    <script src="/res/js/owl.carousel.min.js"></script>
    <script src="/res/js/jquery.sticky.js"></script>
    
    <!-- jQuery easing -->
    
    <!-- Main Script -->
    <script src="/res/js/main.js"></script>
    
    <!-- Slider -->
    <script type="text/javascript" src="/res/js/bxslider.min.js"></script>
	<script type="text/javascript" src="/res/js/script.slider.js"></script>


   




  </body>
</html>