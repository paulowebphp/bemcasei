<?php if(!class_exists('Rain\Tpl')){exit;}?><section id="checkout">
    
    <div class="container-fluid">
        


    	



        <div id="checkout-box" class="checkout-accounts-rows row">
            

        
            <div class="col-md-5 purchase-resume">
               








				<div class="row card-dash-header2">

              
                        


	                <div class="col-4">


	                        <div class="row1">
	                            <span>Plano</span>
	                        </div>


	                    
	                </div>






	                 






	                <div class="col-4">


	                        <div class="row1">
	                            <span>
	                                Período
	                            </span>
	                        </div>

	                    
	                </div>



	                       



	                
	          
	                        

	                

	                <div class="col-4">


	                        <div class="row1">
	                            <span>Valor</span>
	                        </div>

	                    
	                </div>




	        
	            </div><!--row-->


















	            <div class="row card-dash-product centralizer">

              
                        


	                <div class="col-4">

	                    <div class="row1">
                            <span><?php echo htmlspecialchars( $inplan["desplan"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                        </div>

	                    
	                </div>






	                 






	                <div class="col-4">


	                        <div class="row1">
	                            <span>
	                                <?php echo htmlspecialchars( $inplan["inperiod"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php echo htmlspecialchars( $inplan["desperiod"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
	                            </span>
	                        </div>

	                    
	                </div>



	                       



	          
	                        

	                

	                <div class="col-4">


	                        <div class="row1">
	                            <span>R$<?php echo formatPrice($inplan["vlprice"]); ?></span>
	                        </div>

	                    
	                </div>




	        
	            </div><!--row-->













	            <div id="nrinstallment">
	            	
	            	<div class="row checkout-dash-installment centralizer">

              
                        
                     



		                <div class="col-md-6 col-4 text-right">


		                        <div class="installment-title" class="row1">

		                            <span>Parcelamento</span>

		                        </div>


		                </div>

		          
		                        

		                

		                <div class="col-md-6 col-8">


		                        <div class="row1">
		                            

		                        	<select id="installment" form="checkout-form3" name="installment">
					                    <option data-installment="1" value="1" selected="selected">À vista - <?php echo formatPrice($inplan["vlprice"]); ?></option> 
					                    <option data-installment="2" value="2">2 x R$ <?php echo formatPrice($inplan["vlprice"]/2); ?></option> 
					                    <option data-installment="3" value="3">3 x R$ <?php echo formatPrice($inplan["vlprice"]/3); ?></option> 
					                    <option data-installment="4" value="4">4 x R$ <?php echo formatPrice($inplan["vlprice"]/4); ?></option> 
					                    <option data-installment="5" value="5">5 x R$ <?php echo formatPrice($inplan["vlprice"]/5); ?></option>
					                    <option data-installment="6" value="6">6 x R$ <?php echo formatPrice($inplan["vlprice"]/6); ?></option>
					                </select>



		                    </div><!--row1-->
		                    
		                </div><!--col-->


		            </div><!--row-->


	            </div><!--nrinstallment-->
	           














	            <div class="row checkout-dash-totals">

              
                        


	                <div class="col-3">


	                        <div class="row1">
	                            &nbsp;
	                        </div>


	                    
	                </div>






	                 






	                <div class="col-3">


	                        <div class="row1">
	                            <span>
	                                &nbsp;
	                            </span>
	                        </div>

	                    
	                </div>



	                       



	                <div class="col-3 centralizer">


	                        <div class="row1">

	                            <span>Total</span>

	                        </div>


	                </div>

	          
	                        

	                

	                <?php if( $oldVlprice == '' ){ ?>
	                <div class="col-3">


	                        <div class="row1">
	                            

	                        	<span>
	                        		R$ <?php echo formatPrice($inplan["vlprice"]); ?>
	                        	</span>



	                        </div>

	                    
	                </div>
	                <?php }else{ ?>
	                <div class="col-3">


	                        <div class="row1">
	                            <span id="old-vlprice">
	                        		R$ <?php echo formatPrice($oldVlprice); ?>
	                        	</span>

	                        	<span>
	                        		R$ <?php echo formatPrice($inplan["vlprice"]); ?>
	                        	</span>



	                        </div>

	                    
	                </div>

	                <?php } ?>


	            </div><!--row-->
















	            <div class="row coupon">

	            	

					<div class="col-md-8 col-12">


						<form action="/checkout/<?php echo htmlspecialchars( $hash, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
						

						<div class="row centralizer">
							

							<div class="col-4">


		                        <div class="row1">

		                            <span>Tem um cupom ou voucher?</span>

		                        </div>


			                </div>

			          
			                        

			                

			                <div class="col-5">


		                        <div class="row1">
		                            

		                        	<input type="text" name="cupom" value="<?php echo htmlspecialchars( $coupon, ENT_COMPAT, 'UTF-8', FALSE ); ?>">

		                        </div>

			                    
			                </div>









			                <div class="col-3">


		                        <div class="row1">
		                            <input type="hidden" name="acao" value="<?php if( $action == 'aplicar' ){ ?>aplicar<?php }else{ ?>desaplicar<?php } ?>">

		                            
		                            
		                            <button type="submit"><?php if( $action == 'aplicar' ){ ?>Aplicar<?php }else{ ?>Desaplicar<?php } ?></button>
		                        </div>


			                    
			                </div>

						</div><!--row-->



					</form>



					</div><!--col-->            	                       


					

	            
	            </div><!--row-->

















            </div><!--col-->






            <div class="col-md-7">
       			




       			<?php if( $invoucher == 0 ){ ?>
            	<div class="row">
    				
    				<div class="col-12 text-center">
    					<button id="options-payments3" class="nav-item options-button">Cartão de Crédito de Terceiro</button>
						<button id="options-payments2" class="nav-item options-button">Boleto</button>
    				</div>

    			</div><!--row-->
            		






				<?php if( $error != '' ){ ?>
				<div class="row">
					<div class="col-12">
						<div id="error-container">
			                <div class="alert alert-danger alert-dismissible fade show" role="alert">
			                    <?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?>
			                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
			                </div>
		    			</div><!--error-container-->
					</div>	
				</div>
               	<?php } ?>
               








    			

























    			<div id="payment-inputs2" style="display:none;">

    				


					<div class="row centralizer">





						<div class="col-md-10 col-12">


							<div class="payment-block">


								<form id="checkout-form2" action="/checkout/<?php echo htmlspecialchars( $hash, ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post" name="checkout">




								<input type="hidden" name="cupom" value="<?php echo htmlspecialchars( $coupon, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
			    				
			    				<input type="hidden" name="checkout-boleto" value="checkout-boleto">
								


								<div class="tight-bottom1">
									<input type="text" placeholder="Nome" name="desname" class="input-text" value="<?php echo htmlspecialchars( $siteCheckoutValues["desname"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
								</div>




								<div class="tight-bottom1">
									<input type="text" placeholder="CPF" name="desholderdocument" class="input-text" value="<?php echo htmlspecialchars( $siteCheckoutValues["desholderdocument"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
								</div>

									
								






								<div class="tight-bottom1 row">

									<div class="col-md-5">
										<input type="text" placeholder="DDD" name="nrholderddd" class="input-text" value="<?php echo htmlspecialchars( $siteCheckoutValues["nrholderddd"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
									</div>



									<div class="col-md-7">
										<input type="text" placeholder="Telefone" name="nrholderphone" class="input-text" value="<?php echo htmlspecialchars( $siteCheckoutValues["nrholderphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
									</div>

								</div>









								<div class="birth-field-text tight-bottom1 row">

									<div class="birth-field-label col-4">
										
										<label for="payment_birth_1">Nascimento:</label>
										
									</div>



									<div class="col-8">
										<input type="date" placeholder="Nascimento" name="dtholderbirth" class="input-text" value="<?php echo htmlspecialchars( $siteCheckoutValues["dtholderbirth"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
										
									</div>

								</div>




								<div class="tight-bottom1">
									<input type="text" placeholder="CEP" name="zipcode" class="input-text" value="<?php echo htmlspecialchars( $siteCheckoutValues["zipcode"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
									<!--<input type="submit" Atualizar CEP" id="place_order" class="button alt" formaction="/checkout" formmethod="get">-->
								</div>

								<div class="tight-bottom1">
									<input type="text" placeholder="Logradouro, rua, avenida" name="desholderaddress" class="input-text" value="<?php echo htmlspecialchars( $siteCheckoutValues["desholderaddress"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
								</div>

								<div class="tight-bottom1">
									<input type="text" placeholder="Número da Residência" name="desholdernumber" class="input-text" value="<?php echo htmlspecialchars( $siteCheckoutValues["desholdernumber"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
								</div>

								<div class="tight-bottom1">
									<input type="text" placeholder="Complemento ou Apartamento" name="desholdercomplement" class="input-text" value="<?php echo htmlspecialchars( $siteCheckoutValues["desholdercomplement"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
				                </div>

				                <div class="tight-bottom1">
									<input type="text" placeholder="Bairro" name="desholderdistrict" class="input-text" value="<?php echo htmlspecialchars( $siteCheckoutValues["desholderdistrict"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
								</div>




								


								<div class="state-city">
									
									<label for="state2">Estado</label>
									<select id="state2" form="checkout-form2" name="desholderstate">
				                    	<option value="1">Acre</option> 
				                    	<option value="2">Alagoas</option> 
				                    	<option value="3">Amazonas</option> 
				                    	<option value="4">Amapá</option> 
				                    	<option value="5">Bahia</option> 
				                    	<option value="6">Ceará</option> 
				                    	<option value="7">Distrito Federal</option> 
				                    	<option value="8">Espírito Santo</option> 
				                    	<option value="9">Goiás</option> 
				                    	<option value="10">Maranhão</option> 
				                    	<option value="11">Minas Gerais</option> 
				                    	<option value="12">Mato Grosso do Sul</option> 
				                    	<option value="13">Mato Grosso</option> 
				                    	<option value="14">Pará</option> 
				                    	<option value="15">Paraíba</option> 
				                    	<option value="16">Pernambuco</option> 
				                    	<option value="17">Piauí</option> 
				                    	<option value="18">Paraná</option> 
				                    	<option value="19">Rio de Janeiro</option> 
				                    	<option value="20">Rio Grande do Norte</option> 
				                    	<option value="21">Rondônia</option> 
				                    	<option value="22">Roraima</option> 
				                    	<option value="23">Rio Grande do Sul</option> 
				                    	<option value="24">Santa Catarina</option> 
				                    	<option value="25">Sergipe</option> 
				                    	<option value="26">São Paulo</option> 
				                    	<option value="27">Tocantins</option> 
				                	</select>

								</div>





								<div class="state-city bottom2">
									
									<label for="city2">Cidade</label>
									<select id="city2" form="checkout-form2" name="desholdercity">
				                    	<option value="79">Acrelândia</option> 
				                    	<option value="80">Assis Brasil</option> 
				                    	<option value="81">Brasiléia</option> 
				                    	<option value="82">Bujari</option> 
				                    	<option value="83">Capixaba</option> 
				                    	<option value="84">Cruzeiro do Sul</option> 
				                    	<option value="85">Epitaciolândia</option> 
				                    	<option value="86">Feijó</option> 
				                    	<option value="87">Jordão</option> 
				                    	<option value="88">Mâncio Lima</option> 
				                    	<option value="89">Manoel Urbano</option> 
				                    	<option value="90">Marechal Thaumaturgo</option> 
				                    	<option value="91">Plácido de Castro</option> 
				                    	<option value="92">Porto Acre</option> 
				                    	<option value="93">Porto Walter</option> 
				                    	<option value="94">Rio Branco</option> 
				                    	<option value="95">Rodrigues Alves</option> 
				                    	<option value="96">Santa Rosa do Purus</option> 
				                    	<option value="97">Sena Madureira</option> 
				                    	<option value="98">Senador Guiomard</option> 
				                    	<option value="99">Tarauacá</option> 
				                    	<option value="100">Xapuri</option> 
				                	</select>

								</div>


								<div class="tight-bottom1">
									<input type="submit" id="checkout2" name="checkout2" class="button4" value="Gerar Boleto">
			    					<div class="load" id="load2"></div>
								</div>
								

								
			    				</form>

							</div><!--payment-block-->
							

						</div><!--col-md-6-->










    				</div><!--row-->

    			</div><!--payment-inputs3-->

























































				<div id="payment-inputs3" style="display:block;">

    				<div class="row">
    				
	    				<div class="col-12">
	    					
	    					<div class="payment-warn payment-block">

										    				
								<p>Sabemos que é chato, mas pedimos que nos ajude a nos proteger de compras fraudulentas, e preencha com os dados exatos do <strong>Titular</strong> do cartão de crédito.</p>

								<p>Se você for o <strong>Titular</strong>, preencha com seus dados.</p>

								<u><p>Se o <strong>titular</strong> for outra pessoa, preencha com os dados exatos dela, inclusive a Data de Nascimento e o Endereço.</p></u>

							</div>

	    				</div>

					</div>











					<div class="row">





						<div class="col-md-6 col-12">


							<div class="payment-block">


								<form id="checkout-form3" action="/checkout/<?php echo htmlspecialchars( $hash, ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="checkout" method="post" name="checkout">




								<input type="hidden" name="cupom" value="<?php echo htmlspecialchars( $coupon, ENT_COMPAT, 'UTF-8', FALSE ); ?>">

    							<input type="hidden" name="checkout-third-part-card" value="checkout-third-part-card">
								


								<div class="tight-bottom1">
									<input type="text" placeholder="Nome do Titular do Cartão" name="desname" class="input-text" value="<?php echo htmlspecialchars( $siteCheckoutValues["desname"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
								</div>




								<div class="tight-bottom1">
									<input type="text" placeholder="CPF do Titular do Cartão" name="desholderdocument" class="input-text" value="<?php echo htmlspecialchars( $siteCheckoutValues["desholderdocument"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
								</div>

									
								






								<div class="tight-bottom1 row">

									<div class="col-md-5">
										<input type="text" placeholder="DDD" name="nrholderddd" class="input-text" value="<?php echo htmlspecialchars( $siteCheckoutValues["nrholderddd"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
									</div>



									<div class="col-md-7">
										<input type="text" placeholder="Telefone" name="nrholderphone" class="input-text" value="<?php echo htmlspecialchars( $siteCheckoutValues["nrholderphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
									</div>

								</div>









								<div class="birth-field-text tight-bottom1 row">

									<div class="birth-field-label col-4">
										
										<label for="payment_birth_1">Nascimento:</label>
										
									</div>



									<div class="col-8">
										<input type="date" placeholder="Nascimento" name="dtholderbirth" class="input-text" value="<?php echo htmlspecialchars( $siteCheckoutValues["dtholderbirth"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
										
									</div>

								</div>




								<div class="tight-bottom1">
									<input type="text" placeholder="CEP do Titular do Cartão" name="zipcode" class="input-text" value="<?php echo htmlspecialchars( $siteCheckoutValues["zipcode"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
									<!--<input type="submit" Atualizar CEP" id="place_order" class="button alt" formaction="/checkout" formmethod="get">-->
								</div>

								<div class="tight-bottom1">
									<input type="text" placeholder="Logradouro, rua, avenida" name="desholderaddress" class="input-text" value="<?php echo htmlspecialchars( $siteCheckoutValues["desholderaddress"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
								</div>

								<div class="tight-bottom1">
									<input type="text" placeholder="Número da Residência" name="desholdernumber" class="input-text" value="<?php echo htmlspecialchars( $siteCheckoutValues["desholdernumber"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
								</div>

								<div class="tight-bottom1">
									<input type="text" placeholder="Complemento ou Apartamento" name="desholdercomplement" class="input-text" value="<?php echo htmlspecialchars( $siteCheckoutValues["desholdercomplement"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
				                </div>

				                <div class="tight-bottom1">
									<input type="text" placeholder="Bairro" name="desholderdistrict" class="input-text" value="<?php echo htmlspecialchars( $siteCheckoutValues["desholderdistrict"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
								</div>




								


								<div class="state-city">
									
									<label for="state">Estado</label>
									<select id="state" form="checkout-form3" name="desholderstate">
				                    	<option value="1">Acre</option> 
				                    	<option value="2">Alagoas</option> 
				                    	<option value="3">Amazonas</option> 
				                    	<option value="4">Amapá</option> 
				                    	<option value="5">Bahia</option> 
				                    	<option value="6">Ceará</option> 
				                    	<option value="7">Distrito Federal</option> 
				                    	<option value="8">Espírito Santo</option> 
				                    	<option value="9">Goiás</option> 
				                    	<option value="10">Maranhão</option> 
				                    	<option value="11">Minas Gerais</option> 
				                    	<option value="12">Mato Grosso do Sul</option> 
				                    	<option value="13">Mato Grosso</option> 
				                    	<option value="14">Pará</option> 
				                    	<option value="15">Paraíba</option> 
				                    	<option value="16">Pernambuco</option> 
				                    	<option value="17">Piauí</option> 
				                    	<option value="18">Paraná</option> 
				                    	<option value="19">Rio de Janeiro</option> 
				                    	<option value="20">Rio Grande do Norte</option> 
				                    	<option value="21">Rondônia</option> 
				                    	<option value="22">Roraima</option> 
				                    	<option value="23">Rio Grande do Sul</option> 
				                    	<option value="24">Santa Catarina</option> 
				                    	<option value="25">Sergipe</option> 
				                    	<option value="26">São Paulo</option> 
				                    	<option value="27">Tocantins</option> 
				                	</select>

								</div>





								<div class="state-city">
									
									<label for="city">Cidade</label>
									<select id="city" form="checkout-form3" name="desholdercity">
				                    	<option value="79">Acrelândia</option> 
				                    	<option value="80">Assis Brasil</option> 
				                    	<option value="81">Brasiléia</option> 
				                    	<option value="82">Bujari</option> 
				                    	<option value="83">Capixaba</option> 
				                    	<option value="84">Cruzeiro do Sul</option> 
				                    	<option value="85">Epitaciolândia</option> 
				                    	<option value="86">Feijó</option> 
				                    	<option value="87">Jordão</option> 
				                    	<option value="88">Mâncio Lima</option> 
				                    	<option value="89">Manoel Urbano</option> 
				                    	<option value="90">Marechal Thaumaturgo</option> 
				                    	<option value="91">Plácido de Castro</option> 
				                    	<option value="92">Porto Acre</option> 
				                    	<option value="93">Porto Walter</option> 
				                    	<option value="94">Rio Branco</option> 
				                    	<option value="95">Rodrigues Alves</option> 
				                    	<option value="96">Santa Rosa do Purus</option> 
				                    	<option value="97">Sena Madureira</option> 
				                    	<option value="98">Senador Guiomard</option> 
				                    	<option value="99">Tarauacá</option> 
				                    	<option value="100">Xapuri</option> 
				                	</select>

								</div>




								


							</div><!--payment-block-->
							

						</div><!--col-md-6-->
















						<div class="col-md-6 col-12">


							<div class="col-12 payment-block card-info">


								<div class='card-wrapper'></div>
											          					
								<div class="tight-bottom1">
									<input type="text" placeholder="Número do Cartão" name="descardcode_number" class="input-text cc-number">
								</div>

								<div class="tight-bottom1">
									<input type="text" placeholder="Nome como está no cartão" name="desholdername" class="input-text ">
								</div>


								<div class="tight-bottom1 row">

									<div class="col-6">
										<input type="text" placeholder="Mês (XX)" name="descardcode_month" class="input-text ">
											
									</div>



									<div class="col-6">
										<input type="text" placeholder="Ano (XXXX)" id="payment_cardyear_1" name="descardcode_year" class="input-text ">
											
									</div>

								</div>



								<div class="tight-bottom1">
									<input type="text" placeholder="Código de Segurança" name="descardcode_cvc" class="input-text ">
								</div>		


								<div class="flex">
									<input type="submit" id="checkout3" name="checkout3" class="button4" value="Efetuar Pagamento">
									<div class="load" id="load3"></div>
								</div>







								</form>
								


							</div><!--payment-block-->
							

						</div><!--col-md-6-->





    				</div><!--row-->

    			</div><!--payment-inputs3-->








    			<?php }else{ ?>
    			<div id="payment-inputs6" style="display:block;">              

    				<div class="row">
    					<div class="col-12 payment-block flex">
    						<form id="checkout-form6" action="/checkout/<?php echo htmlspecialchars( $hash, ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="width100 flex" method="post" name="checkout">


			    				
    							

								<input type="hidden" name="cupom" value="<?php echo htmlspecialchars( $coupon, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
			    				
			    				<input type="hidden" name="checkout-voucher" value="checkout-voucher">


			    				<input type="submit" id="checkout6" name="checkout6" class="button4" value="Aplicar Voucher">
			    				<div class="load" id="load6"></div>
							</form>
    					</div>
    				</div>

    			</div>

				<?php } ?>











                    	
            </div><!--col-->

        </div><!--row-->


    </div><!--container-->
    

</section>


















