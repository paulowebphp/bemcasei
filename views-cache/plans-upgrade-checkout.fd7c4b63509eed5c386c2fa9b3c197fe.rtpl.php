<?php if(!class_exists('Rain\Tpl')){exit;}?><section class="dashboard">

    <div class="container-fluid">            
            

            
        <div class="row">

                


            <div class="col-md-3 col-12 dash-menu">


                <?php if( $user["inplancontext"] == 0 ){ ?>

                    <?php require $this->checkTemplate("dashboard-menu-free");?>


                <?php }elseif( !$validate ){ ?>

                    <?php require $this->checkTemplate("dashboard-menu-expirated");?>
               

                <?php }else{ ?>

                    <?php require $this->checkTemplate("dashboard-menu");?>

                <?php } ?>
                    

            </div><!--col-->




            <div id="checkout" class="col-md-9 col-12 dash-panel">


                


            	<div id="checkout-box" class="checkout-accounts-rows row">
            

        
		            <div class="col-md-5 purchase-resume">
		               








						<div class="row card-dash-header2">

		              
		                        


			                <div class="col-4">


			                        <div class="card-dash-content">
			                            <span>Plano</span>
			                        </div>


			                    
			                </div>






			                 






			                <div class="col-4">


			                        <div class="card-dash-content">
			                            <span>
			                                Período
			                            </span>
			                        </div>

			                    
			                </div>



			                       



			                
			          
			                        

			                

			                <div class="col-4">


			                        <div class="card-dash-content">
			                            <span>Valor</span>
			                        </div>

			                    
			                </div>




			        
			            </div><!--row-->


















			            <div class="row card-dash-product centralizer">

		              
		                        


			                <div class="col-4">

			                    <div class="card-dash-content">
		                            <span><?php echo htmlspecialchars( $inplan["desplan"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
		                        </div>

			                    
			                </div>






			                 






			                <div class="col-4">


			                        <div class="card-dash-content">
			                            <span>
			                                <?php echo htmlspecialchars( $inplan["inperiod"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php echo htmlspecialchars( $inplan["desperiod"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
			                            </span>
			                        </div>

			                    
			                </div>



			                       



			          
			                        

			                

			                <div class="col-4">


			                        <div class="card-dash-content">
			                            <span>R$<?php echo formatPrice($inplan["vlprice"]); ?></span>
			                        </div>

			                    
			                </div>




			        
			            </div><!--row-->













			            <div id="nrinstallment">
			            	
			            	<div class="row checkout-dash-installment centralizer">

		              
		                        
		                     



				                <div class="col-4 text-right">


			                        <div id="installment-title" class="card-dash-content">

			                            <span>Parcelamento</span>

			                        </div>


				                </div>

				          
				                        

				                

				                <div class="col-8">


				                        <div class="card-dash-content">
				                            

				                        	<select id="installment" form="checkout-form1" name="installment">
							                    <option value="1" selected="selected">À vista - <?php echo formatPrice($inplan["vlprice"]); ?></option> 
							                    <option value="2">2 x R$ <?php echo formatPrice($inplan["vlprice"]/2); ?></option> 
							                    <option value="3">3 x R$ <?php echo formatPrice($inplan["vlprice"]/3); ?></option> 
							                    <option value="4" >4 x R$ <?php echo formatPrice($inplan["vlprice"]/4); ?></option> 
							                    <option value="5">5 x R$ <?php echo formatPrice($inplan["vlprice"]/5); ?></option>
							                    <option value="6">6 x R$ <?php echo formatPrice($inplan["vlprice"]/6); ?></option>
							                </select>



				                    </div>
				                    
				                </div>


				            </div><!--row-->

			            
			            </div>















			            <div class="row checkout-dash-totals">

		              
		                        


			                			                       



			                <div class="col-8 text-right">


			                        <div class="card-dash-content">

			                            <span>Total</span>

			                        </div>


			                </div>

			          
			                        

			                

			                <div class="col-4">


								<div class="row1">
									

									<span>
										R$ <?php echo formatPrice($inplan["vlprice"]); ?>
									</span>



								</div>

							
						</div>  


			            </div><!--row-->












			           











		            </div><!--col-->






		            <div class="col-md-7">




						
		            

							  
						



						<div class="row">
		    				
		    				<ul class="nav domain-checkout-buttons">

								<li id="options-payments1" class="nav-item options-button options-selected"><button>Cartão de Crédito Próprio</button></li>
								<li id="options-payments2" class="nav-item options-button"><button>Boleto</button></li>
								<li id="options-payments3" class="nav-item options-button"><button>Cartão de Crédito de Terceiro</button></li>
								
							</ul>

		    			</div><!--row-->

		            		






						
						<?php if( $success != '' ){ ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <?php echo htmlspecialchars( $success, ENT_COMPAT, 'UTF-8', FALSE ); ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div> 
                        </div>  
                    	<?php } ?>

                    	<?php if( $error != '' ){ ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div> 
                        </div>  
                    	<?php } ?>
						

































						<div id="payment-inputs1" style="display:block;">

		    				
							<div class="row">

								<div class="col-md-6">

									<div class="payment-block">
								                				
																	
										

										<form id="checkout-form1" action="/dashboard/upgrade/checkout" class="checkout" method="post" name="checkout">

											<input type="hidden" value="<?php echo htmlspecialchars( $inplan["inplancode"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" name="inplancode">
	
	
											<input type="hidden" name="checkout-own-card" value="checkout-own-card">

										

											


											<div class="row2">
												<input type="text" placeholder="Nome do Titular do Cartão" name="desname" class="input-text" value="<?php echo htmlspecialchars( $user["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
											</div>


											

												
											






											<div class="row2 row">

												<div class="col-md-5">
													<input type="text" placeholder="DDD" name="nrddd" class="input-text" value="<?php echo htmlspecialchars( $user["nrddd"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
												</div>



												<div class="col-md-7">
													<input type="text" placeholder="Telefone" name="nrphone" class="input-text" value="<?php echo htmlspecialchars( $user["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
												</div>

											</div>









											<div class="birth-field-text row2 row">

												<div class="birth-field-label col-4">
													
													<label for="payment_birth_1">Nascimento:</label>
													
												</div>



												<div class="col-8">
													<input type="date" placeholder="Nascimento" name="dtbirth" class="input-text" value="<?php echo htmlspecialchars( $user["dtbirth"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
													
												</div>

											</div>


										</div><!--payment-block-->


										<div class="payment-block">



									
											<div class="row2">
												<input type="text" placeholder="CEP do Titular do Cartão" name="deszipcode" class="input-text" value="<?php echo htmlspecialchars( $address["deszipcode"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
												<!--<input type="submit" Atualizar CEP" id="place_order" class="button alt" formaction="/checkout" formmethod="get">-->
											</div>

											<div class="row2">
												<input type="text" placeholder="Logradouro, rua, avenida" name="desaddress" class="input-text" value="<?php echo htmlspecialchars( $address["desaddress"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
											</div>

											<div class="row2">
												<input type="text" placeholder="Número" name="desnumber" class="input-text" value="<?php echo htmlspecialchars( $address["desnumber"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
											</div>

											<div class="row2">
												<input type="text" placeholder="Complemento (opcional)" name="descomplement" class="input-text" value="<?php echo htmlspecialchars( $address["descomplement"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
							                </div>

							                <div class="row2">
												<input type="text" placeholder="Bairro" name="desdistrict" class="input-text" value="<?php echo htmlspecialchars( $address["desdistrict"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
											</div>




											


											<div class="state-city">
												
												<label for="state">Estado</label>
												<select id="state" form="checkout-form1" name="desstate">
							                    	
													<?php $counter1=-1;  if( isset($state) && ( is_array($state) || $state instanceof Traversable ) && sizeof($state) ) foreach( $state as $key1 => $value1 ){ $counter1++; ?> 
														<option value="<?php echo htmlspecialchars( $value1["idstate"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" <?php if( $value1["idstate"] == $address["idstate"] ){ ?>selected="selected"<?php } ?>><?php echo htmlspecialchars( $value1["desstate"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
													<?php } ?>

												</select>
												

												

											</div>





											<div class="state-city">
												
												<label for="city">Cidade</label>
												<select id="city" form="checkout-form1" name="descity">
							                    	<?php $counter1=-1;  if( isset($city) && ( is_array($city) || $city instanceof Traversable ) && sizeof($city) ) foreach( $city as $key1 => $value1 ){ $counter1++; ?>
														<option value="<?php echo htmlspecialchars( $value1["idcity"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" <?php if( $value1["idcity"] == $address["idcity"] ){ ?>selected="selected"<?php } ?>><?php echo htmlspecialchars( $value1["descity"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
													<?php } ?>
							                </select>

											</div>

										</div>

									</div>

									<div class="col-md-6">

										<div class="row">
											<div class="col-12">
												<div class="payment-block">
													<div class="row2">
														<input type="text" placeholder="Seu CPF" name="desdocument" class="input-text" value="<?php echo htmlspecialchars( $user["desdocument"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
													</div>
												</div>
											</div>
										</div>
										


									<div class="row">
										<div class="col-12 payment-block card-info">


											<div class='card-wrapper'></div>
	
																					
											<div class="row2">
												<input type="text" placeholder="Número do Cartão" name="descardcode_number" class="input-text cc-number">
											</div>
	
											<div class="row2">
												<input type="text" placeholder="Nome como está no cartão" name="desholdername" class="input-text ">
											</div>
	
	
											<div class="row2 row">
	
												<div class="col-6">
													<input type="text" placeholder="Mês (XX)" name="descardcode_month" class="input-text ">
														
												</div>
	
	
	
												<div class="col-6">
													<input type="text" placeholder="Ano (XXXX)" id="payment_cardyear_1" name="descardcode_year" class="input-text ">
														
												</div>
	
											</div>
	
	
	
											<div class="row2">
												<input type="text" placeholder="Código de Segurança" name="descardcode_cvc" class="input-text ">
											</div>		
	
	
											<div class="flex">
												<input id="checkout-button1" class="checkout-button" type="submit" value="Efetuar Pagamento" name="checkout-own-card2">
												<div class="load" id="load1"></div>
											</div>
	
										</form>
	
										</div>
									</div>

								</div>

		    				</div>

						</div>








		    			




















						















						<div id="payment-inputs2" style="display:none;">

		    				
							<div class="row">

								<div class="col-md-6">

									<div class="payment-block">
								                				
										
														
											
																			
										<form id="checkout-form2" action="/dashboard/upgrade/checkout" class="checkout" method="post" name="checkout">

											<input type="hidden" value="<?php echo htmlspecialchars( $inplan["inplancode"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" name="inplancode">
	
											<input type="hidden" name="checkout-boleto" value="checkout-boleto">






											<div class="row2">
												<input type="text" placeholder="Nome do Titular do Cartão" name="desname" class="input-text" value="<?php echo htmlspecialchars( $user["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
											</div>


											

												
											






											<div class="row2 row">

												<div class="col-md-5">
													<input type="text" placeholder="DDD" name="nrddd" class="input-text" value="<?php echo htmlspecialchars( $user["nrddd"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
												</div>



												<div class="col-md-7">
													<input type="text" placeholder="Telefone" name="nrphone" class="input-text" value="<?php echo htmlspecialchars( $user["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
												</div>

											</div>









											<div class="birth-field-text row2 row">

												<div class="birth-field-label col-4">
													
													<label for="payment_birth_1">Nascimento:</label>
													
												</div>



												<div class="col-8">
													<input type="date" placeholder="Nascimento" name="dtbirth" class="input-text" value="<?php echo htmlspecialchars( $user["dtbirth"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
													
												</div>

											</div>


										</div><!--payment-block-->


										<div class="payment-block">



									
											<div class="row2">
												<input type="text" placeholder="CEP do Titular do Cartão" name="zipcode" class="input-text" value="<?php echo htmlspecialchars( $address["deszipcode"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
												<!--<input type="submit" Atualizar CEP" id="place_order" class="button alt" formaction="/checkout" formmethod="get">-->
											</div>

											<div class="row2">
												<input type="text" placeholder="Logradouro, rua, avenida" name="desaddress" class="input-text" value="<?php echo htmlspecialchars( $address["desaddress"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
											</div>

											<div class="row2">
												<input type="text" placeholder="Número" name="desnumber" class="input-text" value="<?php echo htmlspecialchars( $address["desnumber"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
											</div>

											<div class="row2">
												<input type="text" placeholder="Complemento (opcional)" name="descomplement" class="input-text" value="<?php echo htmlspecialchars( $address["descomplement"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
							                </div>

							                <div class="row2">
												<input type="text" placeholder="Bairro" name="desdistrict" class="input-text" value="<?php echo htmlspecialchars( $address["desdistrict"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
											</div>




											


											<div class="state-city">
												
												<label for="state2">Estado</label>
												<select id="state2" form="checkout-form1" name="desstate">
							                    	
													<?php $counter1=-1;  if( isset($state) && ( is_array($state) || $state instanceof Traversable ) && sizeof($state) ) foreach( $state as $key1 => $value1 ){ $counter1++; ?> 
														<option value="<?php echo htmlspecialchars( $value1["idstate"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" <?php if( $value1["idstate"] == $address["idstate"] ){ ?>selected="selected"<?php } ?>><?php echo htmlspecialchars( $value1["desstate"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
													<?php } ?>

												</select>
												

												

											</div>





											<div class="state-city">
												
												<label for="city2">Cidade</label>
												<select id="city2" form="checkout-form1" name="descity">
							                    	<?php $counter1=-1;  if( isset($city) && ( is_array($city) || $city instanceof Traversable ) && sizeof($city) ) foreach( $city as $key1 => $value1 ){ $counter1++; ?>
														<option value="<?php echo htmlspecialchars( $value1["idcity"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" <?php if( $value1["idcity"] == $address["idcity"] ){ ?>selected="selected"<?php } ?>><?php echo htmlspecialchars( $value1["descity"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
													<?php } ?>
							                </select>

											</div>

										</div>

									</div>

									<div class="col-md-6">

										<div class="row">
											<div class="col-12">
												<div class="payment-block">
													<div class="row2">
														<input type="text" placeholder="Seu CPF" name="desdocument" class="input-text" value="<?php echo htmlspecialchars( $user["desdocument"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
													</div>
												</div>
											</div>
										</div>
										


									<div class="row">
										<div class="col-12 payment-block">
	
											<div class="flex">
												<input id="checkout-boleto-button" type="submit" value="Gerar Boleto" name="checkout-boleto2">
					    					<div class="load" id="load2"></div>
											</div>
	
										</form>
	
										</div>
									</div>

								</div>

		    				</div>

						</div>

































						<div id="payment-inputs3" style="display:none;">

		    				<div class="row">
		    				
			    				<div class="col-12">
			    					
			    					<div class="payment-warn payment-block">

												    				
										<p>Preencha com os dados do titular do cartão!</p>


										<p id="desdocument-warn">Sabemos que é chato, mas pedimos que nos ajude a nos proteger de compras fraudulentas, e preencha com os dados exatos do <strong>Titular</strong> do cartão de crédito, inclusive o endereço!</p>

									</div>

			    				</div>

							</div>


							<div class="row">

								<div class="col-md-6">

									<div class="payment-block">
								                				
										
														
											
																			
										<form id="checkout-form3" action="/dashboard/upgrade/checkout" class="checkout" method="post" name="checkout">

			    							<input type="hidden" value="<?php echo htmlspecialchars( $inplan["inplancode"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" name="inplancode">


											<input type="hidden" name="checkout-third-part-card" value="checkout-third-part-card">



											<div class="row2">
												<input type="text" placeholder="Nome do Titular do Cartão" name="desname" class="input-text" value="<?php echo htmlspecialchars( $planUpgradeValues["desname"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
											</div>







											<div class="row2 row">

												<div class="col-md-5">
													<input type="text" placeholder="DDD" name="nrddd" class="input-text" value="<?php echo htmlspecialchars( $planUpgradeValues["nrddd"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
												</div>



												<div class="col-md-7">
													<input type="text" placeholder="Telefone" name="nrphone" class="input-text" value="<?php echo htmlspecialchars( $planUpgradeValues["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
												</div>

											</div>









											<div class="birth-field-text row2 row">

												<div class="birth-field-label col-4">
													
													<label for="payment_birth_1">Nascimento:</label>
													
												</div>



												<div class="col-8">
													<input type="date" placeholder="Nascimento" name="dtbirth" class="input-text" value="<?php echo htmlspecialchars( $planUpgradeValues["dtbirth"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
													
												</div>

											</div>


										</div><!--payment-block-->


										<div class="payment-block">



									
											<div class="row2">
												<input type="text" placeholder="CEP do Titular do Cartão" name="deszipcode" class="input-text" value="<?php echo htmlspecialchars( $planUpgradeValues["deszipcode"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
												
											</div>

											<div class="row2">
												<input type="text" placeholder="Logradouro, rua, avenida" name="desaddress" class="input-text" value="<?php echo htmlspecialchars( $planUpgradeValues["desaddress"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
											</div>

											<div class="row2">
												<input type="text" placeholder="Número" name="desnumber" class="input-text" value="<?php echo htmlspecialchars( $planUpgradeValues["desnumber"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
											</div>

											<div class="row2">
												<input type="text" placeholder="Complemento (opcional)" name="descomplement" class="input-text" value="<?php echo htmlspecialchars( $planUpgradeValues["descomplement"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
							                </div>

							                <div class="row2">
												<input type="text" placeholder="Bairro" name="desdistrict" class="input-text" value="<?php echo htmlspecialchars( $planUpgradeValues["desdistrict"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
											</div>




											


											<div class="state-city">
												
												<label for="state3">Estado</label>
												<select id="state3" form="checkout-form3" name="desstate">
							                    	<?php $counter1=-1;  if( isset($state) && ( is_array($state) || $state instanceof Traversable ) && sizeof($state) ) foreach( $state as $key1 => $value1 ){ $counter1++; ?> 
														<option value="<?php echo htmlspecialchars( $value1["idstate"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" <?php if( $value1["idstate"] == $planUpgradeValues["desstate"] ){ ?>selected="selected"<?php } ?>><?php echo htmlspecialchars( $value1["desstate"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
													<?php } ?> 
							                	</select>

											</div>





											<div class="state-city">
												
												<label for="city3">Cidade</label>
												<select id="city3" form="checkout-form3" name="descity">
							                    	<?php $counter1=-1;  if( isset($city2) && ( is_array($city2) || $city2 instanceof Traversable ) && sizeof($city2) ) foreach( $city2 as $key1 => $value1 ){ $counter1++; ?>
														<option value="<?php echo htmlspecialchars( $value1["idcity"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" <?php if( $value1["idcity"] == $planUpgradeValues["descity"] ){ ?>selected="selected"<?php } ?>><?php echo htmlspecialchars( $value1["descity"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
													<?php } ?>
							                </select>

											</div>

										</div>

									</div>

									<div class="col-md-6">


										<div class="row">
											<div class="col-12">
												<div class="payment-block">
													<div class="row2">
														<input type="text" placeholder="CPF do Titular do Cartão" name="desdocument" class="input-text" value="<?php echo htmlspecialchars( $planUpgradeValues["desdocument"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
													</div>
												</div>
											</div>
										</div>


										<div class="row">
											<div class="col-12 payment-block card-info">


												<div class='card-wrapper'></div>
																						
												<div class="row2">
													<input type="text" placeholder="Número do Cartão" name="descardcode_number" class="input-text cc-number">
												</div>

												<div class="row2">
													<input type="text" placeholder="Nome como está no cartão" name="desholdername" class="input-text ">
												</div>


												<div class="row2 row">

													<div class="col-6">
														<input type="text" placeholder="Mês (XX)" name="descardcode_month" class="input-text ">
															
													</div>



													<div class="col-6">
														<input type="text" placeholder="Ano (XXXX)" id="payment_cardyear_1" name="descardcode_year" class="input-text ">
															
													</div>

												</div>



												<div class="row2">
													<input type="text" placeholder="Código de Segurança" name="descardcode_cvc" class="input-text ">
												</div>		


												<div class="flex">
													<input id="checkout-button3" class="checkout-button" type="submit" value="Efetuar Pagamento" name="checkout-third-part-card2">
													<div class="load" id="load3"></div>
												</div>

												</form>

											</div>
										</div>

								</div>

		    				</div>

						</div>
						





		            		             	
		            </div><!--col-->



		        </div><!--row-->





            </div><!--checkout-->
        



      
        </div><!--row-->
    
    </div><!--container-->

</section>





