<?php if(!class_exists('Rain\Tpl')){exit;}?><footer class="text-center">

    <div class="container-fluid">

        <!--

        <div id="footer-first-row" class="row">



            <div class="col-md-4 text-left">


                <div class="footer-logo">
                    <a target="_blank" href="/"><img src="/res/images/logo/logo-white.png" class="img-responsive"></a>
                </div>

                


                                

            </div>





        





            <div class="col-md-4 text-left">


                <div class="caption">

                    <h2>Sobre o Bem Casei</h2>
                    <p><a target="_blank" href="/quem-somos">Quem Somos</a></p>
                    <p><a target="_blank" href="/termos-uso">Termos de Uso</a></p>
                    <p><a target="_blank" href="/politica-privacidade">Politica de Privacidade</a></p>
                    

                </div><

                


            </div>







            <div class="col-md-4 text-left">

                

                <div class="caption">

                    <h2>Dúvidas e Suporte</h2>
                    <p><a target="_blank" href="/central-ajuda">Central de Ajuda</a></p>

                </div>



                


           





            </div>



        </div>
    -->


















    <div class="row centralizer">

        <div class="col-md-12 bottom-footer">

            <div class="caption">

                <p>Bem Casei © <?php echo getYear(); ?> - CNPJ 34.700.513/0001-27
                    <!--<br><a target="_blank" href="/termos-uso">Termos de Uso</a> | <a target="_blank" href="/politica-privacidade">Política de Privacidade</a> | <a target="_blank" href="/central-ajuda">Dúvidas e Suporte</a></p>-->



            <h6><i class="fa fa-lock"></i>&nbsp;&nbsp;Site Protegido</h6>

            </div><!--caption-->

        </div><!--col-xs-12-->

    </div><!--row-->




    <!--
    <a href="https://wa.me/5531984050125?text=Quero%20falar%20com%20um%20consultor%20do%20Bem%20Casei" style="position:fixed;width:60px;height:60px;bottom:40px;right:40px;background-color:#25d366;color:#FFF;border-radius:50px;text-align:center;font-size:30px;box-shadow: 1px 1px 2px #888;z-index:1000;" target="_blank">
        <i style="margin-top:16px" class="fa fa-whatsapp"></i>
    </a>
-->
    

    

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

    
    
    <script type="text/javascript" src="/res/js/main.js"></script>
    

  </body>
</html>