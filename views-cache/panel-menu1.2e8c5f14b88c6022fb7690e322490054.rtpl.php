<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="list-group">





    <div class="menu-main-pages">
        
        <a href="/dashboard" class="list-group-item list-group-item-action">Início</a>

        <a href="/dashboard/meus-dados" class="list-group-item list-group-item-action">Meus Dados</a>


    </div>






    <!--<div class="accordion" id="accordion2">
        
        <div class="card">

            <div data-toggle="collapse" data-target="#collapseFour" class="card-header btn collapsed" id="headingFour">

                    <button>Termos de Serviço</button>

            </div>

            <div id="collapseFour" class="collapse<?php if( in_array(getUri($_SERVER['REQUEST_URI']), ['termos-uso','politica-privacidade','termos-lista']) ){ ?> show<?php } ?>" aria-labelledby="headingFour" data-parent="#accordion2">
                
                <div class="card-body card-body-text">
                
                    <a href="/dashboard/termos-uso" class="list-group-item list-group-item-action">Termos de Uso</a>


                    <a href="/dashboard/politica-privacidade" class="list-group-item list-group-item-action">Política de Privacidade</a>

                    <a href="/dashboard/termos-lista" class="list-group-item list-group-item-action">Termos da Lista de Presentes Virtuais</a>
        
                </div>

            </div>

        </div>
    </div>
-->

    





    <div class="menu-main-pages">

        <a href="/dashboard/central-ajuda" class="list-group-item list-group-item-action">Central de Ajuda</a>


        <a href="/dashboard/mudar-senha" class="list-group-item list-group-item-action">Alterar Senha</a>  
        
        <a href="/painel/logout" class="list-group-item list-group-item-action">Sair</a>

    </div><!--menu-main-pages-->




</div><!--list-group-->