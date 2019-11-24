<?php if(!class_exists('Rain\Tpl')){exit;}?><section id="accounts" class="site">
    
    <div class="container">
        






    	<div class="row">
    			
    		<div class="col-12">
    			
    			<div class="payment-warn body-row width70">
    				
    				<h1>Olá, <?php echo htmlspecialchars( $user["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?><h1>

    			</div>

    			<div class="payment-warn body-row">
    				
    				<h2>Preencha com seus dados pessoais</h2>

    			</div>


    			<div class="payment-warn body-row">
    				
    				<h3 id="desdocument-warn">O CPF utilizado aqui deve ser o mesmo da conta bancária que irá receber os valores<br><small>(<a target="_blank" href="/termos-lista#bancos">Ver bancos aceitos</a>)</small></h3>

    			</div>


    		</div><!--col-->

    	</div><!--row-->







        <?php if( $error != '' ){ ?>
        <div class="row">
            <div class="col-12">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div><!--alert-->
            </div><!--col-->
        </div><!--row--> 
        <?php } ?>







        <div class="row row1">
            




            <div class="col-md-6 col-12">

                <div class="site-photo1">

                	<img src="/res/images/banner/banner4.jpg">

                </div>

            </div><!--col-->






            <div class="col-md-6 col-12">
                

                	



            	<form id="register-form" action="/cadastrar/<?php echo htmlspecialchars( $hash, ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post" name="register">
                

          



            	<div class="body-row">

					<input class="disabled" type="text" value="<?php echo htmlspecialchars( $user["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" placeholder="Nome" name="desperson" class="input-text" disabled>

				</div><!--body-row-->


				<div class="body-row">

					<input class="disabled" type="text" value="<?php echo htmlspecialchars( $user["desemail"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" placeholder="E-mail" name="desemail" class="input-text" disabled>

				</div><!--body-row-->


				<div class="body-row">

					<input type="text" placeholder="CPF" name="desdocument" class="input-text" value="<?php echo htmlspecialchars( $accountsValues["desdocument"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

				</div><!--body-row-->





				<div class="body-row row">

					<div class="col-md-3 col-4 width40">

						<input type="text" placeholder="DDD" name="nrddd" class="input-text" value="<?php echo htmlspecialchars( $accountsValues["nrddd"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

					</div><!--col-->



					<div class="col-md-9 col-8 width60">

						<input type="text" placeholder="Telefone" name="nrphone" class="input-text" value="<?php echo htmlspecialchars( $accountsValues["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

					</div><!--col-->

				</div><!--row-->







				<div class="body-row row">

					<div class="col-md-3 col-4 width30">
						
						<label for="payment_birth_1">Nascimento:</label>
						
					</div><!--col-->



					<div class="col-md-9 col-8 width70">

						<input type="date" placeholder="Nascimento" name="dtbirth" class="input-text" value="<?php echo htmlspecialchars( $accountsValues["dtbirth"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

					</div><!--col-->

				</div><!--row-->








                

            </div><!--col-->

        </div><!--row-->












        <div class="row">
            

            <div class="col-md-6 col-12">




            	<div class="body-row">
            		
            		<input type="text" placeholder="CEP apenas com números" name="zipcode" class="input-text" value="<?php echo htmlspecialchars( $accountsValues["zipcode"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

            	</div>


            	<div class="body-row">
            		
            		<input type="text" placeholder="Logradouro, rua, avenida" name="desaddress" class="input-text" value="<?php echo htmlspecialchars( $accountsValues["desaddress"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            		
            	</div>


            	<div class="body-row">
            		
            		<input type="text" placeholder="Número" name="desnumber" class="input-text" value="<?php echo htmlspecialchars( $accountsValues["desnumber"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            		
            	</div>


            	<div class="body-row">
            		
            		<input type="text" placeholder="Complemento (opcional)" name="descomplement" class="input-text" value="<?php echo htmlspecialchars( $accountsValues["descomplement"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            		
            	</div>


            	<div class="body-row">
            		
            		<input type="text" placeholder="Bairro" name="desdistrict" class="input-text" value="<?php echo htmlspecialchars( $accountsValues["desdistrict"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            		
            	</div>


            	<div class="body-row state-city row">
            		
            		<div class="col-md-2 col-3">
            			
            			<label for="state">Estado</label>

            		</div>

            		<div class="col-md-10 col-9">
            			
            			<select id="state" form="register-form" name="desstate">

		                    <?php $counter1=-1;  if( isset($state) && ( is_array($state) || $state instanceof Traversable ) && sizeof($state) ) foreach( $state as $key1 => $value1 ){ $counter1++; ?>
	                    	<option value="<?php echo htmlspecialchars( $value1["idstate"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["desstate"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option> 
		                    <?php } ?>

		                </select>

            		</div>
            		
            	</div>





            	<div class="body-row state-city row">
            		
            		<div class="col-md-2 col-3">
            			
            			<label for="city">Cidade</label>

            		</div>

            		<div class="col-md-10 col-9">
            			
            			<select id="city" form="register-form" name="descity">

		                    <?php $counter1=-1;  if( isset($city) && ( is_array($city) || $city instanceof Traversable ) && sizeof($city) ) foreach( $city as $key1 => $value1 ){ $counter1++; ?>
	                    	<option value="<?php echo htmlspecialchars( $value1["idcity"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["descity"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option> 
		                    <?php } ?>

		                </select>

            		</div>
            		
            	</div>



            	


            	<div class="body-footer flex">
            		
            		<input type="submit" id="site-accounts" name="site-accounts" class="button3" value="Continuar"><div class="load" id="load1"></div>
            	</div>


            	<div class="body-row buttons-wrapper1">
						
					<input type="checkbox" class="input-text" id="interms-check" name="interms" value="1">
					<div id="interms-text" for="interms1">Li e Concordo com os <a href="/termos-uso">Termos de Uso</a>, os <a href="/termos-lista">Termos da Lista de Presentes Virtuais</a> e a <a href="/politica-privacidade">Política de Privacidade</a>.</div>

				</div>
	





				</form>

            </div><!--col-->




            <div class="col-md-6 col-12">
                
                 <div class="site-photo1" id="register-banner2">

                	<img src="/res/images/banner/banner5.jpg">

                </div>

            </div><!--col-->





        </div><!--row-->





    </div><!--container-->
    

</section>
