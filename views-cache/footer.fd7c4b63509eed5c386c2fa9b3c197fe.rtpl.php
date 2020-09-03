<?php if(!class_exists('Rain\Tpl')){exit;}?><footer class="text-center">

    <div class="container-fluid">

        







    <div class="row centralizer">

        <div class="col-md-12 bottom-footer">

            <div class="caption">

                <p>Bem Casei © <?php echo getYear(); ?> - CNPJ 34.700.513/0001-27<br><a href="/dashboard/termos-uso">Termos de Uso</a> | <a href="/dashboard/termos-lista">Termos da Lista de Presentes Virtuais</a> | <a href="/dashboard/politica-privacidade">Política de Privacidade</a> | <a href="/dashboard/central-ajuda">Dúvidas e Suporte</a></p>

            <h6><i class="fa fa-lock"></i>&nbsp;&nbsp;Site Protegido</h6>

            </div><!--caption-->

        </div><!--col-xs-12-->

    </div><!--row-->







    <!-- Modal -->
    <div class="modal fade" id="ModalCheckDesdomain" tabindex="-1" role="dialog" aria-labelledby="ModalCheckDesdomainTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="ModalCheckDesdomainTitle">Para visualizar seu site é preciso antes configurar um domínio</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Vá em "Configurações" > "Domínio" ou clique no botão abaixo 
          </div>
          <div class="modal-footer">
            <a href="/dashboard/dominio" role="button" class="btn btn-secondary popover-test" title="Título do popover" data-content="O conteúdo do popover é definido aqui.">Configurar Domínio</a>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
          </div>
        </div>
      </div>
    </div><!-- Modal -->






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
    </div><!-- Modal -->














    <!-- Modal -->
    <div class="modal fade" id="ExemploModalCentralizadoTags" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="TituloModalCentralizado">Adquira seu plano já!</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Para ter acesso a esta <strong>e muitas outras Tags</strong>, é preciso adquirir um plano
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            <a href="/dashboard/meu-plano" role="button" class="btn btn-secondary popover-test" title="Título do popover" data-content="O conteúdo do popover é definido aqui.">Comprar já!</a>
          </div>
        </div>
      </div>
    </div><!-- Modal -->





    <a href="https://api.whatsapp.com/send?phone=5531984050125&text=Quero%20falar%20com%20algu%C3%A9m%20da%20Equipe%20de%20Suporte%20do%20Bem%20Casei!" style="position:fixed;width:60px;height:60px;bottom:40px;right:40px;background-color:#25d366;color:#FFF;border-radius:50px;text-align:center;font-size:30px;box-shadow: 1px 1px 2px #888;z-index:1000;" target="_blank">
      <i style="margin-top:16px" class="fa fa-whatsapp"></i>
  </a>


    </div><!--container-->

</footer>
   





    <script type="text/javascript" src="/res/js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="/res/js/popper.min.js"></script>

    
    
    <script type="text/javascript" src="/res/js/jscolor.js"></script>

    <script type="text/javascript" src="/res/js/bootstrap.min.js"></script>

    <?php if( getDashPageConfig('card-payment-js') == 1 ){ ?>
    <script type="text/javascript" src="/res/js/jquery.payment.min.js"></script>
    <script type="text/javascript" src="/res/js/card-payment.js"></script>
    <?php } ?>
    
    <script type="text/javascript" src="/res/js/main2.js"></script>






    <!--

    <script type="text/javascript" src="/res/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="/res/js/jquery.easing.1.3.min.js"></script>

    <script type="text/javascript" src="/res/js/bootstrap.bundle.min.js"></script>


    <script type="text/javascript" src="/res/js/handlebars-v4.0.10.js"></script>


    



    
    <script type="text/javascript" src="/res/js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="/res/js/jquery.sticky.js"></script>
    
    <script type="text/javascript" src="/res/js/jquery.easing.1.3.min.js"></script>
    
    
    <script type="text/javascript" src="/res/js/bxslider.min.js"></script>
    <script type="text/javascript" src="/res/js/script.slider.js"></script>
  -->











    

  </body>
</html>