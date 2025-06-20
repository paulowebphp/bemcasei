<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="list-group">





    <div class="menu-main-pages">
        
        <a href="/dashboard" class="list-group-item list-group-item-action">Início</a>

        <a href="/dashboard/meus-dados" class="list-group-item list-group-item-action">Meus Dados</a>

        <a href="/dashboard/meu-plano" class="list-group-item list-group-item-action">Meu Plano</a>

    </div>








    <div class="accordion" id="accordion">




        



        <div class="card">

            <div data-toggle="collapse" data-target="#collapseTwo" class="card-header btn" id="headingTwo">

                    <button>Configurações</button>  

            </div><!--card-hader-->

            <div id="collapseTwo" class="collapse<?php if( in_array(getUri($_SERVER['REQUEST_URI']) , ['dominio','meu-template','personalizar-site','menu','pagina-inicial']) ){ ?> show<?php } ?>" aria-labelledby="headingTwo" data-parent="#accordion">

                <div class="card-body card-body-text">

                    <p>
                        
    
                        <a href="/dashboard/dominio" class="list-group-item list-group-item-action">Domínio</a>

                        <a href="/dashboard/meu-template" class="list-group-item list-group-item-action">Meu Template</a>

                        <a href="/dashboard/personalizar-site" class="list-group-item list-group-item-action">Personalizar Site</a>

                        <a href="/dashboard/menu" class="list-group-item list-group-item-action">Menu</a>

                        <a href="/dashboard/pagina-inicial" class="list-group-item list-group-item-action">Página Inicial</a>

                    </p>

                </div><!--card-body-->

            </div><!--collapseTwo-->

        </div><!--card-->






        <div class="card">

            <div data-toggle="collapse" data-target="#collapseOne" class="card-header btn collapsed" id="headingOne">

                    <button>Loja</button>

            </div><!--card-header-->

            <div id="collapseOne" class="collapse<?php if( in_array(getUri($_SERVER['REQUEST_URI']) , ['painel-financeiro','presentes-virtuais','lista-pronta','sua-carteira','conta-bancaria','cadastrar','transferencias']) ){ ?> show<?php } ?>" aria-labelledby="headingOne" data-parent="#accordion">
                
                <div class="card-body card-body-text">
                

                    <a href="/dashboard/presentes-virtuais" class="list-group-item list-group-item-action">Presentes Virtuais</a>


                    <a href="/dashboard/painel-financeiro" class="list-group-item list-group-item-action">Painel Financeiro</a>


        
                </div><!--card-body-->

            </div><!--collapseOne-->

        </div><!--card-->







        <div class="card">

            <div data-toggle="collapse" data-target="#collapseThree" class="card-header btn collapsed" id="headingThree">


                    <button>Meu Casamento</button>


            </div><!--card-header-->

            <div id="collapseThree" class="collapse<?php if( in_array(getUri($_SERVER['REQUEST_URI']), ['meu-casamento','meu-amor','festa-de-casamento']) ){ ?> show<?php } ?>" aria-labelledby="headingThree" data-parent="#accordion">

                <div class="card-body card-body-text">

                        <a href="/dashboard/meu-amor" class="list-group-item list-group-item-action">Meu Amor</a>
                    
                        <a href="/dashboard/meu-casamento" class="list-group-item list-group-item-action">Casamento</a>         
                        
                        <a href="/dashboard/festa-de-casamento" class="list-group-item list-group-item-action">Festa</a>
                        
                                                
                </div><!--card-body-->

            </div><!--collapseThree-->

        </div><!--card-->



   



    </div><!--accordion-->







    
    <div class="menu-main-pages">

        <a href="/dashboard/padrinhos-madrinhas" class="list-group-item list-group-item-action">Padrinhos e Madrinhas</a>

        <a href="/dashboard/rsvp" class="list-group-item list-group-item-action">RSVP</a>
    
        <a href="/dashboard/mensagens" class="list-group-item list-group-item-action">Mensagens</a>

        <a href="/dashboard/eventos" class="list-group-item list-group-item-action">Eventos</a>

        <a href="/dashboard/album" class="list-group-item list-group-item-action">Album</a>
        
        <a href="/dashboard/videos" class="list-group-item list-group-item-action">Vídeos</a>
        
        <a href="/dashboard/fornecedores" class="list-group-item list-group-item-action">Fornecedores</a>

        <a href="/dashboard/listas-de-fora" class="list-group-item list-group-item-action">Listas de Fora</a>  

        <a href="/dashboard/social" class="list-group-item list-group-item-action">Redes Sociais</a>  

         
        
        
        <a href="/dashboard/tags-papelaria" class="list-group-item list-group-item-action">Tags e Papelaria</a>


    </div><!--menu-main-pages-->




    <div class="accordion" id="accordion2">




        






        <div class="card">

            <div data-toggle="collapse" data-target="#collapse-guide3" class="card-header btn collapsed" id="heading-guide3">


                    <button>Guia de Casamento</button>


            </div><!--card-header-->

            <div id="collapse-guide3" class="collapse<?php if( in_array(getUri($_SERVER['REQUEST_URI']) , ['guia-de-casamento']) ){ ?> show<?php } ?>" aria-labelledby="heading-guide3" data-parent="#accordion">

                <div class="card-body card-body-text">

                        <a href="/dashboard/guia-de-casamento/noivado" class="list-group-item list-group-item-action">Noivado</a>
                        

                        <a href="/dashboard/guia-de-casamento/padrinhos-madrinhas" class="list-group-item list-group-item-action">Padrinhos, Madrinhas, Daminhas e Pajens</a>
                        

                        <a href="/dashboard/guia-de-casamento/planejamento" class="list-group-item list-group-item-action">Planejamento</a>


                        <a href="/dashboard/guia-de-casamento/eventos" class="list-group-item list-group-item-action">Eventos</a>
                        
                        <a href="/dashboard/guia-de-casamento/listas" class="list-group-item list-group-item-action">Listas de Presentes e Confirmação de Presença</a>


                        <a href="/dashboard/guia-de-casamento/cerimonial" class="list-group-item list-group-item-action">Cerimonial e Decoração</a>

                        <a href="/dashboard/guia-de-casamento/buffet" class="list-group-item list-group-item-action">Buffet</a>


                        <a href="/dashboard/guia-de-casamento/roupa" class="list-group-item list-group-item-action">Roupa, Cabelo e Maquiagem</a>


                        <a href="/dashboard/guia-de-casamento/fotos" class="list-group-item list-group-item-action">Fotos, Filmagens e DJ</a>



                        <a href="/dashboard/guia-de-casamento/ensaios" class="list-group-item list-group-item-action">Ensaios</a>


                        <a href="/dashboard/guia-de-casamento/lua-de-mel" class="list-group-item list-group-item-action">Lua de Mel</a>


                </div><!--card-body-->

            </div><!--collapse-guide-->

        </div><!--card-->



        
        
        <div class="card">

            <div data-toggle="collapse" data-target="#collapseFour" class="card-header btn collapsed" id="headingFour">

                    <button>Termos de Serviço</button>

            </div><!--card-header-->

            <div id="collapseFour" class="collapse<?php if( in_array(getUri($_SERVER['REQUEST_URI']), ['termos-uso','politica-privacidade','termos-lista']) ){ ?> show<?php } ?>" aria-labelledby="headingFour" data-parent="#accordion2">
                
                <div class="card-body card-body-text">
                
                    <a href="/dashboard/termos-uso" class="list-group-item list-group-item-action">Termos de Uso</a>


                    <a href="/dashboard/politica-privacidade" class="list-group-item list-group-item-action">Política de Privacidade</a>

                    <a href="/dashboard/termos-lista" class="list-group-item list-group-item-action">Termos da Lista de Presentes Virtuais</a>
        
                </div><!--card-body-->

            </div><!--collapseFour-->

        </div><!--card-->
    </div>

    





    <div class="menu-main-pages">

        <a href="/dashboard/central-ajuda" class="list-group-item list-group-item-action">Central de Ajuda</a>

        <a href="/dashboard/testemunho" class="list-group-item list-group-item-action">Testemunho</a> 

        <a href="/dashboard/mudar-senha" class="list-group-item list-group-item-action">Alterar Senha</a>  
        
        <a href="/logout" class="list-group-item list-group-item-action">Sair</a>

    </div><!--menu-main-pages-->




</div><!--list-group-->