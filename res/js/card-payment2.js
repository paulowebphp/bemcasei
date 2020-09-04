$(document).ready(function(){














/************************ options-payments1 ********************************/
/************************ options-payments1 ********************************/
/************************ options-payments1 ********************************/
/************************ options-payments1 ********************************/
$(document).on('click', '#options-payments1', function(){



	$(this).addClass('options-selected');

	$('#options-payments2').removeClass('options-selected');
	$('#options-payments3').removeClass('options-selected');
	//$('#nrinstallment1').css('display','block');
	//$('#nrinstallment2').css('display','none');
	//$('#installment-title').css('display','block');
	$('#nrinstallment').css('display','block');
	$('#installment').attr('form','checkout-form1');
	//$('#checkout-method').val('cartao-proprio');
	//$('#payment-inputs1').show();
	//$('#payment-inputs2').hide();
	//$('#payment-inputs3').hide();
	$('#payment-inputs1').css('display','block');
	$('#payment-inputs2').css('display','none');
	$('#payment-inputs3').css('display','none');
	$('#checkout').css('min-height', '1000px');
	//initializeCard();

});
/************************ options-payments1 ********************************/
/************************ options-payments1 ********************************/
/************************ options-payments1 ********************************/
/************************ options-payments1 ********************************/



































/************************ options-payments2 ********************************/
/************************ options-payments2 ********************************/
/************************ options-payments2 ********************************/
/************************ options-payments2 ********************************/

$(document).on('click', '#options-payments2', function(){


	/*$(this).addClass('options-selected');
	$('#options-payments1').removeClass('options-selected');
	$('#options-payments3').removeClass('options-selected');
	$('#nrinstallment1').css('display','none');
	$('#nrinstallment2').css('display','none');
	//$('#installment-title').css('display','none');
	$('#checkout-method').val('boleto');
	$('#payment-inputs1').hide();
	$('#payment-inputs2').show();
	$('#payment-inputs3').hide();
	$('#checkout').css('min-height', '1000px');*/



	$(this).addClass('options-selected');

	$('#options-payments1').removeClass('options-selected');
	$('#options-payments3').removeClass('options-selected');
	$('#nrinstallment').css('display','none');
	$('#installment').attr('form','checkout-form2');
	//$('#checkout-method').val('boleto');
	$('#payment-inputs1').css('display','none');
	$('#payment-inputs2').css('display','block');
	$('#payment-inputs3').css('display','none');
	$('#checkout').css('min-height', '1000px');

});
/************************ options-payments2 ********************************/
/************************ options-payments2 ********************************/
/************************ options-payments2 ********************************/
/************************ options-payments2 ********************************/

























/************************ options-payments3 ********************************/
/************************ options-payments3 ********************************/
/************************ options-payments3 ********************************/
/************************ options-payments3 ********************************/

$(document).on('click', '#options-payments3', function(){

	
	/*$(this).addClass('options-selected');
	$('#options-payments1').removeClass('options-selected');
	$('#options-payments2').removeClass('options-selected');
	//$('#nrinstallment1').css('display','none');
	
	$('#installment1').attr('form','checkout-form3');

	
	//console.log();



	//$('#nrinstallment2').css('display','block');

	//$('#installment-title').css('display','block');
	$('#checkout-method').val('cartao-terceiro');
	$('#payment-inputs1').hide();
	$('#payment-inputs2').hide();
	$('#payment-inputs3').show();
	$('#checkout').css('min-height', '1000px');
	//initializeCard();*/




	$(this).addClass('options-selected');

	$('#options-payments1').removeClass('options-selected');
	$('#options-payments2').removeClass('options-selected');
	$('#nrinstallment').css('display','block');
	$('#installment').attr('form','checkout-form3');
	//$('#checkout-method').val('cartao-terceiro');
	$('#payment-inputs1').css('display','none');
	$('#payment-inputs2').css('display','none');
	$('#payment-inputs3').css('display','block');
	$('#checkout').css('min-height', '1000px');

});


/*$(document).on('click', '#options-payments3', function(){

	
	$(this).addClass('options-selected');
	$('#options-payments1').removeClass('options-selected');
	$('#options-payments2').removeClass('options-selected');
	$('#nrinstallment1').css('display','none');
	$('#nrinstallment2').css('display','block');
	//$('#installment-title').css('display','block');
	$('#checkout-method').val('cartao-terceiro');
	$('#payment-inputs1').hide();
	$('#payment-inputs2').hide();
	$('#payment-inputs3').show();
	$('#checkout').css('min-height', '1000px');
	//initializeCard();

});*/
/************************ options-payments3 ********************************/
/************************ options-payments3 ********************************/
/************************ options-payments3 ********************************/
/************************ options-payments3 ********************************/
































/************************ options-payments5 ********************************/
/************************ options-payments5 ********************************/
/************************ options-payments5 ********************************/
/************************ options-payments5 ********************************/

$(document).on('click', '#options-payments5', function(){


	$(this).addClass('options-selected');

	

	$('#options-payments4').removeClass('options-selected');
	$('#nrinstallment').css('display','block');
	$('#installment2').attr('form','checkout-form5');
	//$('#checkout-method').val('cartao-terceiro');
	$('#payment-inputs5').css('display','block');
	$('#payment-inputs4').css('display','none');


	let card = $("#installment2>option:selected").attr('data-interest');

	let card2 = card.replace('.',',');
 
	$('#interest').html('R$ '+ card2);
	
	
	

	$('#checkout').css('min-height', '1000px');

});



/************************ options-payments5 ********************************/
/************************ options-payments5 ********************************/
/************************ options-payments5 ********************************/
/************************ options-payments5 ********************************/

































/************************ options-payments4 ********************************/
/************************ options-payments4 ********************************/
/************************ options-payments4 ********************************/
/************************ options-payments4 ********************************/

$(document).on('click', '#options-payments4', function(){

	
	$(this).addClass('options-selected');

	$('#options-payments5').removeClass('options-selected');
	$('#nrinstallment').css('display','none');
	$('#installment2').attr('form','checkout-form4');
	//$('#checkout-method').val('cartao-terceiro');
	$('#payment-inputs4').css('display','block');
	$('#payment-inputs5').css('display','none');


	let boleto = $("#interest").attr('data-boleto');
	let boleto2 = boleto.replace('.',',');
	$('#interest').html('R$ '+ boleto);

	
	



	$('#checkout').css('min-height', '1000px');

});



/************************ options-payments4 ********************************/
/************************ options-payments4 ********************************/
/************************ options-payments4 ********************************/
/************************ options-payments4 ********************************/





























/************************ SELECT INSTALLMENT1 ********************************/
/************************ SELECT INSTALLMENT1 ********************************/
/************************ SELECT INSTALLMENT1 ********************************/
/************************ SELECT INSTALLMENT1 ********************************/
$(document).on(

	'change', 
	'select', 

	function(){



	$("option", this).attr('selected', false);
	$("option:selected", this).attr('selected', true);

	/*let installment1 = $("option:selected", this).attr('data-installment');

	

	$("#installment2 option").attr('selected', false);
	$("#checkout-installment").val(installment1);

	$("#installment2 option").filter( function() {

	    return $(this).attr('data-installment') == installment1; 

	}).attr('selected', true);
*/


});
/************************ SELECT INSTALLMENT1 ********************************/
/************************ SELECT INSTALLMENT1 ********************************/
/************************ SELECT INSTALLMENT1 ********************************/
/************************ SELECT INSTALLMENT1 ********************************/























/************************ INSTALLMENT ********************************/
/************************ INSTALLMENT ********************************/
/************************ INSTALLMENT ********************************/
/************************ INSTALLMENT ********************************/

$('#installment2').on('change', function(){

	let interest = $("option:selected", this).attr('data-interest');


	//let interest2 = interest.replace('.',',');
	
	$('#interest').html('R$ '+ interest.toLocaleString('pt-BR'));

});//end on
/************************ INSTALLMENT ********************************/
/************************ INSTALLMENT ********************************/
/************************ INSTALLMENT ********************************/
/************************ INSTALLMENT ********************************/














/************************ CC-NUMBER PAYMENT JQUERY ********************************/
/************************ CC-NUMBER PAYMENT JQUERY ********************************/
/************************ CC-NUMBER PAYMENT JQUERY ********************************/
/************************ CC-NUMBER PAYMENT JQUERY ********************************/
jQuery(function($) {
  //$('[data-numeric]').payment('restrictNumeric');
  $('.cc-number').payment('formatCardNumber');
  //$('.cc-exp').payment('formatCardExpiry');
  ///$('.cc-cvc').payment('formatCardCVC');
  /*$.fn.toggleInputError = function(erred) {
    this.parent('.form-group').toggleClass('has-error', erred);
    return this;
  };*/
  /*$('form').submit(function(e) {
    e.preventDefault();
    var cardType = $.payment.cardType($('.cc-number').val());
    $('.cc-number').toggleInputError(!$.payment.validateCardNumber($('.cc-number').val()));
    //$('.cc-exp').toggleInputError(!$.payment.validateCardExpiry($('.cc-exp').payment('cardExpiryVal')));
    //$('.cc-cvc').toggleInputError(!$.payment.validateCardCVC($('.cc-cvc').val(), cardType));
    $('.cc-brand').text(cardType);
    $('.validation').removeClass('text-danger text-success');
    $('.validation').addClass($('.has-error').length ? 'text-danger' : 'text-success');
  });*/

});
/************************ CC-NUMBER PAYMENT JQUERY ********************************/
/************************ CC-NUMBER PAYMENT JQUERY ********************************/
/************************ CC-NUMBER PAYMENT JQUERY ********************************/
/************************ CC-NUMBER PAYMENT JQUERY ********************************/





	
/*$('#options-payments4').on('click', function(){

	let boleto = $("#interest").attr('data-boleto');
	let boleto2 = boleto.replace('.',',');
	$('#interest').html('R$ '+ boleto.toLocaleString('pt-BR'));
	$("#installment [value='1']").attr("selected",false);

});//end on








$(document).on('click', '#options-payments5', function(){

	let card = $("#interest").attr('data-card');
	let card2 = card.replace('.',',');
	$('#interest').html('R$ '+ card.toLocaleString('pt-BR'));
	$("#installment [value='1']").attr("selected","selected");

});//end on*/
/************************ INSTALLMENT ********************************/
/************************ INSTALLMENT ********************************/
/************************ INSTALLMENT ********************************/
/************************ INSTALLMENT ********************************/




























/************************ OWN CARD ********************************/
/************************ OWN CARD ********************************/
/************************ OWN CARD ********************************/
/************************ OWN CARD ********************************/

/*let ownCard = `<div class="col-md-8 col-12 payment-block card-info">

		<div class='card-wrapper'></div>
					          					
		<div class="row2">
			<input type="text" placeholder="Número do Cartão" name="descardcode_number" class="input-text ">
		</div>

		<div class="row2">
			<input type="text" placeholder="Nome tal como está impresso no cartão" name="desholdername" class="input-text own-card-font-size">
		</div>


		<div class="row2 row">

			<div class="col-md-6">
				<input type="text" placeholder="Mês" id="payment_cardmonth_1" name="descardcode_month" class="input-text ">
			</div>



			<div class="col-md-6">
				<input type="text" placeholder="Ano" id="payment_cardyear_1" name="descardcode_year" class="input-text ">
			</div>

		</div>



		<div class="row2">
			<input type="text" placeholder="Código de Segurança" name="descardcode_cvc" class="input-text ">
		</div>		


		<div>
			<input id="checkout-button" type="submit" value="Efetuar Pagamento" name="checkout-own-card">
		</div>



	</div>`;*/
/************************ OWN CARD ********************************/
/************************ OWN CARD ********************************/
/************************ OWN CARD ********************************/
/************************ OWN CARD ********************************/



























/************************ THIRD PART CARD ********************************/
/************************ THIRD PART CARD ********************************/
/************************ THIRD PART CARD ********************************/
/************************ THIRD PART CARD ********************************/


/*let thirdPartCard = `<div class="col-12 payment-block card-info">


			<div class='card-wrapper'></div>
					          					
			<div class="row2">
			<input type="text" placeholder="Número do Cartão" name="descardcode_number" class="input-text ">
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


		<div>
			<input id="checkout-button" type="submit" value="Efetuar Pagamento" name="checkout-third-part-card">
		</div>



	</div>`;*/
/************************ THIRD PART CARD ********************************/
/************************ THIRD PART CARD ********************************/
/************************ THIRD PART CARD ********************************/
/************************ THIRD PART CARD ********************************/





































/************************ options-payments4 ********************************/
/************************ options-payments4 ********************************/
/************************ options-payments4 ********************************/
/************************ options-payments4 ********************************/

/*$(document).on('click', '#options-payments4', function(){

	let html = `<div class="row">

					<div class="col-12">

						<div class="payment-warn payment-block">
	    				

							<p>Pagamento com Boleto!</p>


							<p id="desdocument-warn">Sabemos que é chato, mas pedimos que insira os dados abaixo para um rápido cadastro antes do pagamento em boleto!</p>

						</div>

					</div>

				</div>

				<div class="row">

					<div class="col-md-6 col-12">

						<div class="payment-block">
					                				
							
							<div class="row2">
								<input type="text" placeholder="Nome do titular do cartão" name="desname" class="input-text ">
							</div>	

							
							<div class="row2">
								<input type="text" placeholder="E-mail do titular do cartão" name="desemail" email="desemail" class="input-text ">
							</div>
				
																
													
					


							<div class="row2">
								<input type="text" placeholder="Número do documento" name="desholderdocument" class="input-text ">
							</div>

							
							<div class="row2 row">
								
								<div class="col-md-5">
									<input type="text" placeholder="DDD" name="nrholderddd" class="input-text">
								</div>



								<div class="col-md-7">
									<input type="text" placeholder="Telefone" name="nrholderphone" class="input-text">
								</div>

							</div>




							<div class="row2 row">

								<div id="birth-field-text" class="col-md-4">
									
									<label for="payment_birth_1">Nascimento:</label>
									
								</div>



								<div class="col-md-8 ">
									<input type="date" placeholder="Nascimento" name="dtholderbirth" class="input-text">
									
								</div>

							</div><!---->	



						</div><!--payment-block--->
			


					</div><!--col--->





					<div class="col-md-6 col-12">

						<div class="payment-block">
					
							<div class="row2">
								<input type="text" placeholder="CEP do Titular" name="zipcode" class="input-text">
								<!--<input type="submit" Atualizar CEP" id="place_order" class="button alt" formaction="/checkout" formmethod="get">-->
							</div>

							<div class="row2">
								<input type="text" placeholder="Logradouro, rua, avenida" name="desholderaddress" class="input-text">
							</div>

							<div class="row2">
								<input type="text" placeholder="Número" name="desholdernumber" class="input-text">
							</div>

							<div class="row2">
								<input type="text" placeholder="Complemento (opcional)" name="desholdercomplement" class="input-text">
			                </div>

			                <div class="row2">
								<input type="text" placeholder="Bairro" name="desholderdistrict" class="input-text">
							</div>




							

							<div class="state-city">
							
								<label for="state">Estado</label>
								<select id="state" form="checkout-form" name="desholderstate">
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
								<select id="city" form="checkout-form" name="desholdercity">
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


				

						</div><!--payment-block--->
		

					</div><!--col--->

				</div><!--row--->

				<div class="row">

					<div class="col-12">

						<div class="payment-block">
					
							
							<input id="checkout-boleto-button" type="submit" value="Gerar Boleto" name="checkout-boleto">
							
							
							
						</div>

					</div>

				</div>`;




	$(this).addClass('options-selected');
	$('#options-payments5').removeClass('options-selected');
	$('#installment').css('display','none');
	$('#installment-title').css('display','none');
	$('#payment-inputs').html(html);
	$('#checkout').css('min-height', '1000px');

});*/
/************************ options-payments4 ********************************/
/************************ options-payments4 ********************************/
/************************ options-payments4 ********************************/
/************************ options-payments4 ********************************/

































/************************ options-payments5 ********************************/
/************************ options-payments5 ********************************/
/************************ options-payments5 ********************************/
/************************ options-payments5 ********************************/

/*$(document).on('click', '#options-payments5', function(){

	let html = `<div class="row">

					<div class="col-md-12">

						<div class="payment-warn payment-block">
	    				

							<p>Preencha com os dados do titular do cartão!</p>


							<p id="desdocument-warn">Sabemos que é chato, mas pedimos que nos ajude a nos proteger de compras fraudulentas, e preencha com os dados exatos do <strong>Titular</strong> do cartão de crédito, inclusive o endereço!</p>

						</div>

					</div>

				</div>

				<div class="row">

					<div class="col-md-6">

						<div class="payment-block">


							
							
							
							<div class="row2">
								<input type="text" placeholder="Nome do Titular do cartão" name="desname" class="input-text ">
							</div>



							<div class="row2">
								<input type="text" placeholder="E-mail" name="desemail" email="desemail" class="input-text ">
							</div>

								
																
													
					


							<div class="row2">
								<input type="text" placeholder="CPF" name="desholderdocument" class="input-text ">
							</div>

							
							<div class="row2 row">
								
								<div class="col-md-5">
									<input type="text" placeholder="DDD" name="nrholderddd" class="input-text">
								</div>



								<div class="col-md-7">
									<input type="text" placeholder="Telefone" name="nrholderphone" class="input-text">
								</div>

							</div>




							<div class="row">

								<div id="birth-field-text" class="col-md-4">
									
									<label for="payment_birth_1">Nascimento:</label>
									
								</div>



								<div class="col-md-8">
									<input type="date" placeholder="Nascimento" name="dtholderbirth" class="input-text">
									
								</div>

							</div>




						</div><!--payment-block--->

					

						<div class="payment-block">
					
							<div class="row2">
								<input type="text" placeholder="CEP do Titular" name="zipcode" class="input-text">
								<!--<input type="submit" Atualizar CEP" id="place_order" class="button alt" formaction="/checkout" formmethod="get">-->
							</div>

							<div class="row2">
								<input type="text" placeholder="Logradouro, rua, avenida" name="desholderaddress" class="input-text">
							</div>

							<div class="row2">
								<input type="text" placeholder="Número" name="desholdernumber" class="input-text">
							</div>

							<div class="row2">
								<input type="text" placeholder="Complemento (opcional)" name="desholdercomplement" class="input-text">
			                </div>

			                <div class="row2">
								<input type="text" placeholder="Bairro" name="desholderdistrict" class="input-text">
							</div>




							


							<div class="state-city">
							
								<label for="state">Estado</label>
								<select id="state" form="checkout-form" name="desholderstate">
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
								<select id="city" form="checkout-form" name="desholdercity">
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

						</div>

					</div>

					<div class="col-md-6">

						`+thirdPartCard+`

					</div>

				</div>`;

	$(this).addClass('options-selected');
	$('#options-payments4').removeClass('options-selected');
	$('#installment').css('display','block');
	$('#installment-title').css('display','block');
	$('#payment-inputs').html(html);
	$('#checkout').css('min-height', '1000px');
	initializeCard();

});*/
/************************ options-payments5 ********************************/
/************************ options-payments5 ********************************/
/************************ options-payments5 ********************************/
/************************ options-payments5 ********************************/


















    
    
    
    
});//END document ready