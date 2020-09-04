<?php if(!class_exists('Rain\Tpl')){exit;}?><style type="text/css">




    
    section h1{
        color: <?php if( $customstyle["descolor1"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["descolor1"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>#FFFFFF<?php } ?>;
        font-family: <?php if( $customstyle["desfontfamily1"] != '' ){ ?>'<?php echo htmlspecialchars( $customstyle["desfontfamily1"], ENT_COMPAT, 'UTF-8', FALSE ); ?>'<?php }else{ ?>'Norican'<?php } ?>;
    }
    section h2{
        color: <?php if( $customstyle["descolordate"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["descolordate"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>#FFFFFF<?php } ?>;
        font-family: <?php if( $customstyle["desfontfamilydate"] != '' ){ ?>'<?php echo htmlspecialchars( $customstyle["desfontfamilydate"], ENT_COMPAT, 'UTF-8', FALSE ); ?>'<?php }else{ ?>'Norican'<?php } ?>;
    }
    section h3{
        color: <?php if( $customstyle["descolor2"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["descolor2"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>#DD716F<?php } ?>;
        font-family: <?php if( $customstyle["desfontfamily1"] != '' ){ ?>'<?php echo htmlspecialchars( $customstyle["desfontfamily1"], ENT_COMPAT, 'UTF-8', FALSE ); ?>'<?php }else{ ?>'Norican'<?php } ?>;
    }
    section h4{
        font-family: <?php if( $customstyle["desfontfamily1"] != '' ){ ?>'<?php echo htmlspecialchars( $customstyle["desfontfamily1"], ENT_COMPAT, 'UTF-8', FALSE ); ?>'<?php }else{ ?>'Norican'<?php } ?>;
    }
    section h5{
        font-family: <?php if( $customstyle["desfontfamily2"] != '' ){ ?>'<?php echo htmlspecialchars( $customstyle["desfontfamily2"], ENT_COMPAT, 'UTF-8', FALSE ); ?>'<?php }else{ ?>'OpenSans'<?php } ?>;
    }
    section h6{
        font-family: <?php if( $customstyle["desfontfamily2"] != '' ){ ?>'<?php echo htmlspecialchars( $customstyle["desfontfamily2"], ENT_COMPAT, 'UTF-8', FALSE ); ?>'<?php }else{ ?>'OpenSans'<?php } ?>;
    }








    /********************************HEADER*****************************************/
    header .header-title h3{
        color: <?php if( $customstyle["descolor2"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["descolor2"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>#DD716F<?php } ?>;
        font-family: <?php if( $customstyle["desfontfamily1"] != '' ){ ?>'<?php echo htmlspecialchars( $customstyle["desfontfamily1"], ENT_COMPAT, 'UTF-8', FALSE ); ?>'<?php }else{ ?>'Norican'<?php } ?>;

    }
    header #domain-dropdown-menu a:hover{
        color: <?php if( $customstyle["descolortexthover"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["descolortexthover"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>#DD716F<?php } ?>;
    }
    header .cart-amount {
        color: <?php if( $customstyle["descolor2"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["descolor2"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>#DD716F<?php } ?>;
        font-weight: 700;
    }
    
    header #shopping-item-mobile .shopping-item:hover .product-count {
        background-color: <?php if( $customstyle["descolor2"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["descolor2"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>#DD716F<?php } ?>;
    }
    header .product-count {
        background: none repeat scroll 0 0 <?php if( $customstyle["descolor2"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["descolor2"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>#DD716F<?php } ?>;
	}
	header #menu-condensed i{
        font-size: 30px;
        color: <?php if( $customstyle["descolor2"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["descolor2"], ENT_COMPAT, 'UTF-8', FALSE ); ?>99<?php }else{ ?>#DD716F<?php } ?>;
    }
    header .bar-close .btn-close {
        background:none;
        border: none;
        color: <?php if( $customstyle["descolor2"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["descolor2"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>#DD716F<?php } ?>;
        font-size: 22px;
    }
    /********************************HEADER*****************************************/








    /********************************FOOTER*****************************************/

    footer{
        padding: 5% 5% 2% 5%;
        color: <?php if( $customstyle["descolorfooter"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["descolorfooter"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>#FFFFFF<?php } ?>;
        background-color: <?php if( $customstyle["desbgcolorfooter"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["desbgcolorfooter"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>#DD716F<?php } ?>;
    }
    footer a{
        color: <?php if( $customstyle["descolorfooter"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["descolorfooter"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>#FFFFFF<?php } ?>;
    }
    footer a:hover{
        color: <?php if( $customstyle["descolorfooterhover"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["descolorfooterhover"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>#F7D9E1<?php } ?>;
    }
    footer .bottom-footer p {
      line-height: 24px;
      font-size: 15px;
      padding-top: 20px;
      border-top: 1px solid <?php if( $customstyle["descolorfooter"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["descolorfooter"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>#FFFFFF<?php } ?>;
      color: <?php if( $customstyle["descolorfooter"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["descolorfooter"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>#FFFFFF<?php } ?>;
    }
    footer .footer-title h3{
        font-size: 3rem;
        color: <?php if( $customstyle["descolorfooter"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["descolorfooter"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>#FFFFFF<?php } ?>;
        font-family: <?php if( $customstyle["desfontfamily1"] != '' ){ ?>'<?php echo htmlspecialchars( $customstyle["desfontfamily1"], ENT_COMPAT, 'UTF-8', FALSE ); ?>'<?php }else{ ?>'Norican'<?php } ?>;
    }
    footer .list-group-item{
        margin: 2% 0;
        background: none;
        color: <?php if( $customstyle["descolorfooter"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["descolorfooter"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>#FFFFFF<?php } ?>;
    }
    footer .list-group-item:hover{
        background: none;
        color: <?php if( $customstyle["descolorfooterhover"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["descolorfooterhover"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>#F7D9E1<?php } ?>;
    }
    footer .list-socials a {
      border: <?php if( $customstyle["descolorfooter"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["descolorfooter"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>#FFFFFF<?php } ?> 1px solid;
    }
    footer .list-socials a:hover {
      border: <?php if( $customstyle["descolorfooterhover"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["descolorfooterhover"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>#F7D9E1<?php } ?> 1px solid;
    }
    /********************************FOOTER*****************************************/







    /********************************DOMAIN*****************************************/
    .dropdown a:hover{
        color: <?php if( $customstyle["descolortexthover"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["descolortexthover"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>#171F26<?php } ?>;

    }
    .section-title hr{
        background-color: <?php if( $customstyle["descolor2"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["descolor2"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>#171F26<?php } ?>;
    }
    /********************************DOMAIN*****************************************/





    
</style>



<?php if( $user["inplancontext"] == 0 ){ ?>
<section class="domain">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="alert alert-info alert-domain" role="alert">
                    <h1>Para liberar as funcionalidades de sua Loja é necessário adquirir um plano</h1>
                </div><!--alert-->
            </div><!--col-->
        </div><!--row-->
    </div>
</section>


<?php }elseif( $user["inaccount"] == 0 ){ ?>
<section class="domain">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="alert alert-info alert-domain" role="alert">
                    <h1>Loja Desabilitada</h1>
                </div><!--alert-->
            </div><!--col-->
        </div><!--row-->
    </div>
</section>


<?php }elseif( !$validate ){ ?>
<section class="domain">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="alert alert-info alert-domain" role="alert">
                    <h1>Checkout Desabilitado</h1>
                </div><!--alert-->
            </div><!--col-->
        </div><!--row-->
    </div>
</section>

<?php }else{ ?>






<section class="domain domain-checkout">
    
    <div class="container-fluid">
        


    	



        <div id="checkout-box" class="row">
            

        
            <div class="col-md-5 purchase-resume text-center">
               








				<div class="row table-header">

              
                        


	                <div class="col-8">


	                    <span>Presente</span>


	                    
	                </div>






	                 






	                <div class="col-4">


	                    <span>
                            Valor
                        </span>

	                    
	                </div>

      




	        
	            </div><!--row-->







	            <?php $counter1=-1;  if( isset($products) && ( is_array($products) || $products instanceof Traversable ) && sizeof($products) ) foreach( $products as $key1 => $value1 ){ $counter1++; ?>
	            <div class="table-row row">

              
                        


	                <div class="col-8">

	                    <span><?php echo htmlspecialchars( $value1["desproduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>

	                    
	                </div>






	                 






	                <div class="col-4">


	                     <span>
                            R$<?php echo formatPrice(getInterest($value1["vlprice"],'1','1',$productconfig["incharge"])); ?>
                        </span>
	                    
	                </div>




	        
	            </div><!--row-->

	            <?php } ?>












	            <div id="nrinstallment">
	            	
	            	<div class="row installment centralizer">

              
                        



		                <div class="col-6 text-right">


		                        <div id="installment-title" class="card-dash-content">

		                            <span>Parcelamento</span>

		                        </div>


		                </div>

		          
		                        

		                

		                <div class="col-6">


		                    <select id="installment2" form="checkout-form5" name="installment">

			                    <option value="1" id="installment-first-child" data-interest='<?php echo roundValue(getInterestTotal("1","1",$productconfig["incharge"])); ?>'>À vista - <?php echo formatPrice(getInterestTotal("1","1",$productconfig["incharge"])); ?></option>

			                    <option value="2" data-interest='<?php echo roundValue(getInterestTotal("1","2",$productconfig["incharge"])); ?>'>2 x R$ <?php echo formatPrice(getInterestTotal('1','2',$productconfig["incharge"])/2); ?></option> 
			                    
			                    <option value="3" data-interest='<?php echo roundValue(getInterestTotal("1","3",$productconfig["incharge"])); ?>'>3 x R$ <?php echo formatPrice(getInterestTotal('1','3',$productconfig["incharge"])/3); ?></option> 
			                    
			                    <option value="4" data-interest='<?php echo roundValue(getInterestTotal("1","4",$productconfig["incharge"])); ?>'>4 x R$ <?php echo formatPrice(getInterestTotal('1','4',$productconfig["incharge"])/4); ?></option> 
			                    
			                    <option value="5" data-interest='<?php echo roundValue(getInterestTotal("1","5",$productconfig["incharge"])); ?>'>5 x R$ <?php echo formatPrice(getInterestTotal('1','5',$productconfig["incharge"])/5); ?></option>
			                    
			                    <option value="6" data-interest='<?php echo roundValue(getInterestTotal("1","6",$productconfig["incharge"])); ?>'>6 x R$ <?php echo formatPrice(getInterestTotal('1','6',$productconfig["incharge"])/6); ?></option>
			                
			                </select>
		                    
		                </div>


		            </div><!--row-->

	            </div>















	            <div class="row table-totals">

              
                        


	                <div class="col-3">


	                    &nbsp;


	                    
	                </div>






	                 






	                <div class="col-3">


	                    &nbsp;

	                    
	                </div>



	                       



	                <div class="col-3">


	                    <span>Total</span>


	                </div>

	          
	                        

	                

	                <div class="col-3">


						<span id="interest" data-card='<?php echo formatPrice(getInterestTotal("1","1",$productconfig["incharge"])); ?>' data-boleto='<?php echo formatPrice(getInterestTotal("0","1",$productconfig["incharge"])); ?>'>R$<?php echo formatPrice(getInterestTotal('1','1',$productconfig["incharge"])); ?></span>

	                    
	                </div>


	            </div><!--row-->

















            </div><!--col-->






            <div class="col-md-7">


          			
           	



    			<div class="row centralizer">
    				
    				<ul class="nav checkout-buttons">

						<li id="options-payments5" class="nav-item options-button options-selected"><button>Cartão de Crédito</button></li>
						<li id="options-payments4" class="nav-item options-button"><button>Boleto</button></li>
						
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













    			<div id="payment-inputs5" style="display:block;">

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
						                				
								
												
									
																	
								<form id="checkout-form5" action="/<?php echo htmlspecialchars( $user["desdomain"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/checkout" class="checkout" method="post" name="checkout">

									<input type="hidden" name="checkout-third-part-card" value="checkout-third-part-card">


									<div class="row2">
										<input type="text" placeholder="Nome do Titular do cartão" name="desname" class="input-text" value="<?php echo htmlspecialchars( $domainCheckoutValues["desname"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
									</div>



									<div class="row2">
										<input type="email" placeholder="E-mail" email="desemail" name="desemail" class="input-text" value="<?php echo htmlspecialchars( $domainCheckoutValues["desemail"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
									</div>
										


									

										
									






									<div class="row2 row">

										<div class="col-md-5">
											<input type="text" placeholder="DDD" name="nrddd" class="input-text" value="<?php echo htmlspecialchars( $domainCheckoutValues["nrddd"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
										</div>



										<div class="col-md-7">
											<input type="text" placeholder="Telefone" name="nrphone" class="input-text" value="<?php echo htmlspecialchars( $domainCheckoutValues["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
										</div>

									</div>









									<div class="row2 row">

										<div id="birth-field-text" class="col-md-4">
											
											<label for="payment_birth_1">Nascimento:</label>
											
										</div>



										<div class="col-md-8">
											<input type="date" placeholder="Nascimento" name="dtbirth" class="input-text" value="<?php echo htmlspecialchars( $domainCheckoutValues["dtbirth"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
											
										</div>

									</div>


								</div><!--payment-block-->


								<div class="payment-block">



							
									<div class="row2">
										<input type="text" placeholder="CEP do Titular" name="deszipcode" class="input-text" value="<?php echo htmlspecialchars( $domainCheckoutValues["deszipcode"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
										<!--<input type="submit" Atualizar CEP" id="place_order" class="button alt" formaction="/checkout" formmethod="get">-->
									</div>

									<div class="row2">
										<input type="text" placeholder="Logradouro, rua, avenida" name="desaddress" class="input-text" value="<?php echo htmlspecialchars( $domainCheckoutValues["desaddress"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
									</div>

									<div class="row2">
										<input type="text" placeholder="Número" name="desnumber" class="input-text" value="<?php echo htmlspecialchars( $domainCheckoutValues["desnumber"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
									</div>

									<div class="row2">
										<input type="text" placeholder="Complemento (opcional)" name="descomplement" class="input-text" value="<?php echo htmlspecialchars( $domainCheckoutValues["descomplement"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
					                </div>

					                <div class="row2">
										<input type="text" placeholder="Bairro" name="desdistrict" class="input-text" value="<?php echo htmlspecialchars( $domainCheckoutValues["desdistrict"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
									</div>




									


									<div class="state-city">
										
										<label for="state">Estado</label>
										<select id="state" form="checkout-form5" name="desstate">
					                    	<?php $counter1=-1;  if( isset($state) && ( is_array($state) || $state instanceof Traversable ) && sizeof($state) ) foreach( $state as $key1 => $value1 ){ $counter1++; ?> 
												<option value="<?php echo htmlspecialchars( $value1["idstate"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" <?php if( $value1["idstate"] == $domainCheckoutValues["desstate"] ){ ?>selected="selected"<?php } ?>><?php echo htmlspecialchars( $value1["desstate"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
											<?php } ?>
					                	</select>

									</div>





									<div class="state-city">
										
										<label for="city">Cidade</label>
										<select id="city" form="checkout-form5" name="descity">
					                    	<?php $counter1=-1;  if( isset($city) && ( is_array($city) || $city instanceof Traversable ) && sizeof($city) ) foreach( $city as $key1 => $value1 ){ $counter1++; ?>
												<option value="<?php echo htmlspecialchars( $value1["idcity"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" <?php if( $value1["idcity"] == $domainCheckoutValues["descity"] ){ ?>selected="selected"<?php } ?>><?php echo htmlspecialchars( $value1["descity"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
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
												<input type="text" placeholder="Número do CPF" name="desdocument" class="input-text">
											</div>
										</div>
									</div>
								</div>


								<div class="col-12 payment-block card-info">


									<div class='card-wrapper'></div>
												          					
									<div class="row2">
										<input type="text" placeholder="Número do Cartão" name="descardcode_number" class="input-text cc-number">
									</div>

									<div class="row2">
										<input type="text" placeholder="Nome como está no cartão" name="desholdername" class="input-text ">
									</div>


									<div class="row2 row">

										<div class="col-md-6">
											<input type="text" placeholder="Mês" name="descardcode_month" class="input-text ">
												
										</div>



										<div class="col-md-6">
											<input type="text" placeholder="Ano" id="payment_cardyear_1" name="descardcode_year" class="input-text ">
												
										</div>

									</div>



									<div class="row2">
										<input type="text" placeholder="Código de Segurança" name="descardcode_cvc" class="input-text ">
									</div>		


									<div class="flex">
										<input type="submit" id="checkout4" name="checkout4" class="button4" value="Efetuar Pagamento">
										<div class="load" id="load4"></div>
									</div>

								</form>

							</div>

						</div>

    				</div>

				</div>
				




















































				<div id="payment-inputs4" style="display:none;">

		    		<div class="row">
    				
	    				<div class="col-12">
	    					
	    					<div class="payment-warn payment-block">

										    				
								<p>Pagamento com Boleto!</p>


								<p id="desdocument-warn">Sabemos que é chato, mas devido a ser uma exigência do nosso <a target="_blank" href="/termos-uso#formas-de-pagamento">processador de pagamentos</a>, pedimos que insira os dados abaixo para podermos gerar o seu boleto!</p>

							</div>

	    				</div>

					</div>

					<div class="row">

						<div class="col-md-6">

							<div class="payment-block">
														
								
												
									
																	
								<form id="checkout-form4" action="/<?php echo htmlspecialchars( $user["desdomain"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/checkout" class="checkout" method="post" name="checkout">


									<input type="hidden" name="checkout-boleto" value="checkout-boleto">






									<div class="row2">
										<input type="text" placeholder="Nome do Titular do Cartão" name="desname" class="input-text" value="<?php echo htmlspecialchars( $domainCheckoutValues["desname"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
									</div>


									<div class="row2">
										<input type="email" placeholder="E-mail" email="desemail" name="desemail" class="input-text" value="<?php echo htmlspecialchars( $domainCheckoutValues["desemail"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
									</div>

										
									






									<div class="row2 row">

										<div class="col-md-5">
											<input type="text" placeholder="DDD" name="nrddd" class="input-text" value="<?php echo htmlspecialchars( $domainCheckoutValues["nrddd"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
										</div>



										<div class="col-md-7">
											<input type="text" placeholder="Telefone" name="nrphone" class="input-text" value="<?php echo htmlspecialchars( $domainCheckoutValues["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
										</div>

									</div>









									<div class="birth-field-text row2 row">

										<div class="birth-field-label col-4">
											
											<label for="payment_birth_1">Nascimento:</label>
											
										</div>



										<div class="col-8">
											<input type="date" placeholder="Nascimento" name="dtbirth" class="input-text" value="<?php echo htmlspecialchars( $domainCheckoutValues["dtbirth"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
											
										</div>

									</div>


								</div><!--payment-block-->


								<div class="payment-block">



							
									<div class="row2">
										<input type="text" placeholder="CEP do Titular do Cartão" name="deszipcode" class="input-text" value="<?php echo htmlspecialchars( $domainCheckoutValues["deszipcode"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
										<!--<input type="submit" Atualizar CEP" id="place_order" class="button alt" formaction="/checkout" formmethod="get">-->
									</div>

									<div class="row2">
										<input type="text" placeholder="Logradouro, rua, avenida" name="desaddress" class="input-text" value="<?php echo htmlspecialchars( $domainCheckoutValues["desaddress"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
									</div>

									<div class="row2">
										<input type="text" placeholder="Número" name="desnumber" class="input-text" value="<?php echo htmlspecialchars( $domainCheckoutValues["desnumber"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
									</div>

									<div class="row2">
										<input type="text" placeholder="Complemento (opcional)" name="descomplement" class="input-text" value="<?php echo htmlspecialchars( $domainCheckoutValues["descomplement"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
									</div>

									<div class="row2">
										<input type="text" placeholder="Bairro" name="desdistrict" class="input-text" value="<?php echo htmlspecialchars( $domainCheckoutValues["desdistrict"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
									</div>




									


									<div class="state-city">
										
										<label for="state2">Estado</label>
										<select id="state2" form="checkout-form4" name="desstate">
											
											<?php $counter1=-1;  if( isset($state) && ( is_array($state) || $state instanceof Traversable ) && sizeof($state) ) foreach( $state as $key1 => $value1 ){ $counter1++; ?> 
												<option value="<?php echo htmlspecialchars( $value1["idstate"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" <?php if( $value1["idstate"] == $domainCheckoutValues["desstate"] ){ ?>selected="selected"<?php } ?>><?php echo htmlspecialchars( $value1["desstate"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
											<?php } ?>

										</select>
										

										

									</div>





									<div class="state-city">
										
										<label for="city2">Cidade</label>
										<select id="city2" form="checkout-form4" name="descity">
											<?php $counter1=-1;  if( isset($city) && ( is_array($city) || $city instanceof Traversable ) && sizeof($city) ) foreach( $city as $key1 => $value1 ){ $counter1++; ?>
												<option value="<?php echo htmlspecialchars( $value1["idcity"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" <?php if( $value1["idcity"] == $domainCheckoutValues["descity"] ){ ?>selected="selected"<?php } ?>><?php echo htmlspecialchars( $value1["descity"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
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
												<input type="text" placeholder="Seu CPF" name="desdocument" class="input-text">
											</div>
										</div>
									</div>
								</div>
								


							<div class="row">
								<div class="col-12 payment-block">

									<div class="flex">
										<input type="submit" id="checkout5" name="checkout5" class="button4" value="Gerar Boleto">

										<div class="load" id="load5"></div>
									</div>

								</form>

								</div>
							</div>

						</div>

					</div>

				</div>


























































				




















          	
           	
            </div><!--col-->

        </div><!--row-->


    </div><!--container-->
    

</section>

<?php } ?>

