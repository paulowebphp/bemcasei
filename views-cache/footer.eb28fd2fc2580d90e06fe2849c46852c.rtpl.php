<?php if(!class_exists('Rain\Tpl')){exit;}?><footer class="text-center">

    <div class="container-fluid">

        <div id="footer-first-row" class="row">



            <div class="col-md-4 text-left">


                <div class="footer-logo">
                    <a href="/"><img src="/res/images/logo/logo-white.png" class="img-responsive"></a>
                </div>

                <div class="caption">

                    <h2>Sobre o Bem Casei</h2>
                    <p><a href="/quem-somos">Quem Somos</a></p>
                    <p><a href="/termos-uso">Termos de Uso</a></p>
                    <p><a href="/politica-privacidade">Politica de Privacidade</a></p>
                    <!--<p><a target="_blank" href="https://blog.amarcasar.com/">Blog</a></p>-->

                </div><!--caption-->


                <div class="caption">

                    <h2>Convidados</h2>
                    <p><a href="/buscar">Buscar Casal > Confirmar Presença > Presentear</a></p>
                    <!-- 
                    <p><a href="buscar">Presenteie o Casal</a></p>
                    <p><a href="buscar">Confirme sua Presença</a></p>
                    <p>Convidado: compre seu presente para os Noivos<br/>Deixe seu recado para os Noivos no Mural</p> -->

                </div><!--caption-->
                

            </div><!--col-lg-6-->





        





            <div class="col-md-4 text-left">


                <div class="caption">

                    <h2>Experimente</h2>

                    <p><a href="/site-casamento">Site de Casamento</a></p>
                    <p><a href="/modelos-templates">Modelos de Templates</a></p>
                    <p><a href="/planos">Planos</a></p>
                    

                </div><!--caption-->


                
                <div class="caption">

                    <h2>Presentes em Dinheiro</h2>
                    <p><a href="/lista-presentes">Lista de Presentes</a></p> 
                    <p><a href="/tarifas-condicoes">Tarifas e Condições</a></p>
                    <p><a href="/termos-lista">Termos da Lista de Presentes Virtuais</a></p>

                </div><!--caption-->


                


            </div><!--col-md-3-->







            <div class="col-md-4 text-left">

                <div class="caption mailing">

                    <h2>Novidades</h2>

                    <div id="mailing-alert"></div>                

                    <form id="mailing-form">  

                        <div class="form-group">

                            <input type="text" name="name" class="form-control" id="name" placeholder="Seu nome">

                            <input type="email" name="email" class="form-control" id="email" placeholder="Seu melhor e-maill">

                            <button id="mailing-submit" type="submit" class="btn-send">Enviar
                            </button><div id="mailing-load"></div>

                        </div><!--form-group-->
                        
                    </form>
                    
                </div><!--caption-->




                <div class="caption">

                    <h2>Dúvidas e Suporte</h2>
                    <!--<p><a href="central-ajuda">Central de Ajuda</a></p>-->
                    <p><a href="/central-ajuda">Central de Ajuda</a></p>

                </div><!--caption-->



                <!--
                <div class="caption">

                    <h2>Redes Sociais</h2>


                    <ul class="list-socials list-unstyled list-group list-group-horizontal">

                        

                        <li>
                            <a href="https://www.facebook.com/bemcaseioficial" target="_blank"><i class="fa fa-facebook"></i></a>
                        </li>

                        <li>
                            <a href="https://www.instagram.com/bemcaseioficial" target="_blank"><i class="fa fa-instagram"></i></a>
                        </li>
           
                    </ul>


                </div>
                -->


           





            </div><!--col-md-3-->




    </div><!--row-->


















    <div class="row centralizer">

        <div class="col-md-12 bottom-footer p">

            <div class="caption">

                <p>Bem Casei © <?php echo getYear(); ?> - CNPJ 34.700.513/0001-27<br><a href="/termos-uso">Termos de Uso</a> | <a href="/termos-lista">Termos da Lista de Presentes Virtuais</a> | <a href="/politica-privacidade">Política de Privacidade</a> | <a href="/central-ajuda">Dúvidas e Suporte</a></p>



            <h6><i class="fa fa-lock"></i>&nbsp;&nbsp;Site Protegido</h6>

            </div><!--caption-->

        </div><!--col-xs-12-->

    </div><!--row-->



    

    

    

    </div><!--container-->

</footer>

<!--
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <script type="text/javascript" src="/res/js/bootstrap.min.js"></script>
-->
    
    <script type="text/javascript" src="/res/js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="/res/js/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    

    <?php if( getSitePageConfig('card-payment-js') == 1 ){ ?>
    <script type="text/javascript" src="/res/js/jquery.payment.min.js"></script>
    <script type="text/javascript" src="/res/js/card-payment.js"></script>
    <?php } ?>

    
    
    <script type="text/javascript" src="/res/js/main2.js"></script>
    

  </body>
</html>