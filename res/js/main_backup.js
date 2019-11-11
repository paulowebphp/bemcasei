$(document).ready(function(){


/******************** MENU SALSICHA ***************************************************/

$("#btn-bars").on("click", function(){
    
    $("#header-mobile").toggleClass("open-menu");

});//end on



$("#menu-mobile-mask, .btn-close").on("click", function(){

    $("#header-mobile").removeClass("open-menu");


});//end on











/******************** BOOTSTRAP TOOLTIP ***************************************************/

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
});









/******************** MENU DROPDOWN TEMPLATES ***************************************************/

$(document).on('click', '#domain-dropdown-button', function(){
	$('#domain-dropdown').addClass('show');
	$('#domain-dropdown-menu').addClass('show');

});



$(document).on('mouseleave', '#domain-dropdown-menu', function(){
	$('#domain-dropdown').removeClass('show');
	$('#domain-dropdown-menu').removeClass('show');

});














/******************** COLOR PICKER ***************************************************/
/*$('#descolorheader').ColorPicker(
	{	
		eventName: 'click',
		color: '#ffffff',
		onShow: function (colpkr) {
			$(colpkr).fadeIn(500);

			return false;
		},
		onHide: function (colpkr) {
			$(colpkr).fadeOut(500);
			return false;
		},

		onSubmit: function(hsb, hex, rgb, el) 
		{	
			$(el).val(hex);
			$(el).ColorPickerHide();

		},

		onBeforeShow: function() 
		{
			$(this).ColorPickerSetColor(this.value);

		}

	})
	.bind('keyup', function()
	{
		$(this).ColorPickerSetColor(this.value);
	});*/
	













/******************** DASHBOARD RANGE BORDER SIZE INPUT ***************************************************/

$(document).on('change', '#desroundbordersize', function(){
	let value = $(this).val();
	$('#border-size').html(value);

});













/******************** DASHBOARD RANGE BORDER RADIUS INPUT ***************************************************/

$(document).on('change', '#desborderradiusbutton', function(){
	let radius = $(this).val();
	$('#border-radius').html(radius);

});


















/******************** DASHBOARD FONT FAMILY  ***************************************************/



$(document).on(

	'change', 
	'#desfontfamilyh1, #desfontfamilyh2, #desfontfamilyh3, #desfontfamilyh4, #desfontfamilybutton, #desfontfamilytext', 

	function(){

	let fontfamily = $("option:selected", this).attr('data-fontfamily');
	$(this).css("font-family", fontfamily);

});
















/******************** PLANS ***************************************************/


$('#plan1').on('change', function(){

	let vlsaleprice = $("option:selected", this).attr('data-vlsaleprice');
	$('#plan1-vlsaleprice').html('R$ '+vlsaleprice.replace('.',','));

	let vlinteger = $("option:selected", this).attr('data-vlinteger');
	$('#plan1-vlinteger').html(vlinteger);

	let vldecimal = $("option:selected", this).attr('data-vldecimal');
	$('#plan1-vldecimal').html(','+vldecimal);


});//end on




$('#plan2').on('change', function(){

	let vlsaleprice = $("option:selected", this).attr('data-vlsaleprice');
	$('#plan2-vlsaleprice').html('R$ '+vlsaleprice.replace('.',','));

	let vlinteger = $("option:selected", this).attr('data-vlinteger');
	$('#plan2-vlinteger').html(vlinteger);

	let vldecimal = $("option:selected", this).attr('data-vldecimal');
	$('#plan2-vldecimal').html(','+vldecimal);


});//end on




$('#plan3').on('change', function(){

	let vlsaleprice = $("option:selected", this).attr('data-vlsaleprice');
	$('#plan3-vlsaleprice').html('R$ '+vlsaleprice.replace('.',','));

	let vlinteger = $("option:selected", this).attr('data-vlinteger');
	$('#plan3-vlinteger').html(vlinteger);

	let vldecimal = $("option:selected", this).attr('data-vldecimal');
	$('#plan3-vldecimal').html(','+vldecimal);


});//end on












$(document).on('change', '#state', function(e){

	var idstate = $(this).val();


	 $.ajax({

        type:"GET",
        data: "idstate="+idstate,
        url: "/address/state"

    }).done( function( data ) {

        var city = '';

        $.each($.parseJSON(data), function(key,value){

            city += '<option value="'+ value.idcity+'">' + value.descity + '</option>';
        });

        $('#city').html(city);


    }).fail(function(data){

        console.error("Houve um erro no carregamento das cidades devido a uma lentidão na internet, tente novamente");

    });



});






/*$('#state').on('change', function(e){

	var idstate = $(this).val();


	 $.ajax({

        type:"GET",
        data: "idstate="+idstate,
        url: "/state/city"

    }).done( function( data ) {


        var city = '';

        $.each($.parseJSON(data), function(key,value){

            city += '<option value="'+ value.descity+'">' + value.descity + '</option>';
        });

        $('#city').html(city);


    }).fail(function(data){

        console.error("Houve um erro no carregamento das cidades devido a uma lentidão na internet, tente novamente");

    });



});*/





 













$(document).on('mouseover', '#dtbirth-field', function(e){


	$("#dtbirth-warn").fadeIn();

});


$(document).on('mouseleave', '#dtbirth-field', function(e){


	$("#dtbirth-warn").fadeOut();

});
















let ownCard = `<div class="payment-block">
					          					
			<div id="payment_cardnumber_1_field">
			<input type="text" placeholder="Número do Cartão" id="payment_cardnumber_1" name="descardcode_number" class="input-text ">
		</div>

		<div id="payment_cardname_1_field">
			<input type="text" placeholder="Nome tal como está impresso no cartão" id="payment_cardname_1" name="desholdername" class="input-text own-card-font-size">
		</div>


		<div class="row row-2-columns">

			<div class="col-md-6">
				<div id="payment_cardmonth_1_field">
					<input type="text" placeholder="Mês" id="payment_cardmonth_1" name="descardcode_month" class="input-text ">
					
				</div>
			</div>



			<div class="col-md-6">
				<div id="payment_cardyear_1_field">
					<input type="text" placeholder="Ano" id="payment_cardyear_1" name="descardcode_year" class="input-text ">
					
				</div>
			</div>

		</div>



		<div id="payment_cardcvc_1_field">
			<input type="text" placeholder="Código de Segurança" id="payment_cardcvc_1" name="descardcode_cvc" class="input-text ">
		</div>		


		<div>
			<div>
				<input id="checkout-button" type="submit" value="Efetuar Pagamento" name="checkout-own-card">
			</div>
			<div class="clear"></div>
		</div><!--payment-->


		</form>

	</div>`;






	let thirdPartCard = `<div class="payment-block">
					          					
			<div id="payment_cardnumber_1_field">
			<input type="text" placeholder="Número do Cartão" id="payment_cardnumber_1" name="descardcode_number" class="input-text ">
		</div>

		<div id="payment_cardname_1_field">
			<input type="text" placeholder="Nome como está no cartão" id="payment_cardname_1" name="desholdername" class="input-text ">
		</div>


		<div class="row row-2-columns">

			<div class="col-md-6">
				<div id="payment_cardmonth_1_field">
					<input type="text" placeholder="Mês" id="payment_cardmonth_1" name="descardcode_month" class="input-text ">
					
				</div>
			</div>



			<div class="col-md-6">
				<div id="payment_cardyear_1_field">
					<input type="text" placeholder="Ano" id="payment_cardyear_1" name="descardcode_year" class="input-text ">
					
				</div>
			</div>

		</div>



		<div id="payment_cardcvc_1_field">
			<input type="text" placeholder="Código de Segurança" id="payment_cardcvc_1" name="descardcode_cvc" class="input-text ">
		</div>		


		<div>
			<div>
				<input id="checkout-button" type="submit" value="Efetuar Pagamento" name="checkout-third-part-card">
			</div>
			<div class="clear"></div>
		</div><!--payment-->



	</div>`;





$(document).on('click', '#options-payments1', function(){


	html = `<div class="row">

		
		<div class="col-md-12">

			`+ownCard+`	

		</div>

		

	</div>

	`;



	$(this).addClass('options-selected');

	$('#options-payments2').removeClass('options-selected');
	$('#options-payments3').removeClass('options-selected');
	$('#installment').css('display','block');
	$('#installment-title').css('display','block');
	$('#payment-inputs').html(html);
	$('#checkout').css('min-height', '1000px');

});











$(document).on('click', '#options-payments2', function(){

	let html = `<div class="payment-block">
				
				<div>
					<input id="checkout-button" type="submit" value="Gerar Boleto" name="checkout-boleto">
				</div>
				<div class="clear"></div>
				</form>
			</div>`;

	$(this).addClass('options-selected');
	$('#options-payments1').removeClass('options-selected');
	$('#options-payments3').removeClass('options-selected');
	$('#installment').css('display','none');
	$('#installment-title').css('display','none');
	$('#payment-inputs').html(html);
	$('#checkout').css('min-height', '1000px');

});








$(document).on('click', '#options-payments3', function(){

	let html = `<div class="row">

				<div class="col-md-12">

					<div class="payment-warn payment-block">
    				

						<p>Preencha com os dados do titular do cartão!</p>


						<p id="checkout-desdocument-warn">Sabemos que é chato, mas pedimos que nos ajude a nos proteger de compras fraudulentas, e preencha com os dados exatos do titular do cartão de crédito, inclusive o endereço!</p>

					</div>

				</div>

			</div>

			<div class="row">

				<div class="col-md-4">

					<div class="payment-block">
				                				
						
										
							
															
						<div id="payment_inholdertypedoc_1_field">
							<select id="payment_inholdertypedoc_1" name="inholdertypedoc">
		                    	<option value="0" selected>Documento: CPF</option>
						    	<option value="1">Documento: CNPJ</option>
		              
		                	</select>
						</div>


							
				


						<div id="payment_holderdocument_1_field">
									<input type="text" placeholder="Número do documento" id="payment_holderdocument_1" name="desholderdocument" class="input-text ">
								</div>

						
						<div class="row row-2-columns">
							
							<div class="col-md-5">
								<div id="payment_nrddd_1_field">
									<input type="text" placeholder="DDD" id="payment_nrholderddd_1" name="nrholderddd" class="input-text">
								</div>
							</div>



							<div class="col-md-7">
								<div id="payment_nrphone_1_field">
									<input type="text" placeholder="Telefone" id="payment_nrholderphone_1" name="nrholderphone" class="input-text">
								</div>
							</div>

						</div>




						<div id="dtbirth-field" class="my-3" id="payment_holderbirth_1_field">
							<div id="dtbirth-warn"></div>
							<input type="date" placeholder="Nascimento" id="payment_holderbirth_1" name="dtholderbirth" class="input-text">
						</div>




					</div><!--payment-block--->

				</div>

				<div class="col-md-4">

					<div class="payment-block">
				
						<div id="billing_cep_1_field">
							<input type="text" placeholder="CEP do Titular" id="billing_cep_1" name="zipcode" class="input-text">
							<!--<input type="submit" Atualizar CEP" id="place_order" class="button alt" formaction="/checkout" formmethod="get">-->
						</div>

						<div id="billing_holderaddress_1_field">
							<input type="text" placeholder="Logradouro, rua, avenida" id="billing_holderaddress_1" name="desholderaddress" class="input-text">
						</div>

						<div id="billing_holdernumber_1_field">
							<input type="text" placeholder="Número" id="billing_address_1" name="desholdernumber" class="input-text">
						</div>

						<div id="billing_desholdercomplement_1_field">
							<input type="text" placeholder="Complemento (opcional)" id="billing_desholdercomplement_1" name="desholdercomplement" class="input-text">
		                </div>

		                <div id="billing_holderdistrict_field">
							<input type="text" placeholder="Bairro" id="billing_holderdistrict" name="desholderdistrict" class="input-text">
						</div>




						


						<div class="row state-city">
							<div class="col-md-2">
								<label class="checkout-label" for="state">Estado</label>
							</div>
							
							<div class="col-md-10">
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
						</div>





						<div class="row state-city">
							<div class="col-md-2">
								<label class="checkout-label" for="city">Cidade</label>
							</div>
							
							<div class="col-md-10">
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

				</div>

				<div class="col-md-4">

					`+thirdPartCard+`

				</div>

			</div>`;

	$(this).addClass('options-selected');
	$('#options-payments1').removeClass('options-selected');
	$('#options-payments2').removeClass('options-selected');
	$('#installment').css('display','block');
	$('#installment-title').css('display','block');
	$('#payment-inputs').html(html);
	$('#checkout').css('min-height', '1000px');

});









$(document).on('click', '#options-payments4', function(){

	let html = `<div class="row">

				<div class="col-md-12">

					<div class="payment-warn payment-block">
    				

						<p>Pagamento com Boleto!</p>


						<p id="checkout-desdocument-warn">Sabemos que é chato, mas pedimos que insira os dados abaixo para um rápido cadastro antes do pagamento em boleto!</p>

					</div>

				</div>

			</div>

			<div class="row">

				<div class="col-md-4">

					<div class="payment-block">
				                				
						
						<div id="payment_name_1_field">
							<input type="text" placeholder="Nome do titular do cartão" id="payment_name_1" name="desname" class="input-text ">
						</div>	

						
						<div id="payment_email_1_field">
							<input type="text" placeholder="E-mail do titular do cartão" name="desemail" id="payment_email_1" email="desemail" class="input-text ">
						</div>
			
															
						<div id="payment_inholdertypedoc_1_field">
							<select id="payment_inholdertypedoc_1" name="inholdertypedoc">
		                    	<option value="0" selected>Documento: CPF</option>
						    	<option value="1">Documento: CNPJ</option>
		              
		                	</select>
						</div>


							
				


						<div id="payment_holderdocument_1_field">
									<input type="text" placeholder="Número do documento" id="payment_holderdocument_1" name="desholderdocument" class="input-text ">
								</div>

						
						<div class="row row-2-columns">
							
							<div class="col-md-5">
								<div id="payment_nrddd_1_field">
									<input type="text" placeholder="DDD" id="payment_nrholderddd_1" name="nrholderddd" class="input-text">
								</div>
							</div>



							<div class="col-md-7">
								<div id="payment_nrphone_1_field">
									<input type="text" placeholder="Telefone" id="payment_nrholderphone_1" name="nrholderphone" class="input-text">
								</div>
							</div>

						</div>




						<div id="dtbirth-field" class="my-3" id="payment_holderbirth_1_field">
							<div id="dtbirth-warn"></div>
							<input type="date" placeholder="Nascimento" id="payment_holderbirth_1" name="dtholderbirth" class="input-text">
						</div>




					</div><!--payment-block--->

				</div>

				<div class="col-md-4">

					<div class="payment-block">
				
						<div id="billing_cep_1_field">
							<input type="text" placeholder="CEP do Titular" id="billing_cep_1" name="zipcode" class="input-text">
							<!--<input type="submit" Atualizar CEP" id="place_order" class="button alt" formaction="/checkout" formmethod="get">-->
						</div>

						<div id="billing_holderaddress_1_field">
							<input type="text" placeholder="Logradouro, rua, avenida" id="billing_holderaddress_1" name="desholderaddress" class="input-text">
						</div>

						<div id="billing_holdernumber_1_field">
							<input type="text" placeholder="Número" id="billing_address_1" name="desholdernumber" class="input-text">
						</div>

						<div id="billing_desholdercomplement_1_field">
							<input type="text" placeholder="Complemento (opcional)" id="billing_desholdercomplement_1" name="desholdercomplement" class="input-text">
		                </div>

		                <div id="billing_holderdistrict_field">
							<input type="text" placeholder="Bairro" id="billing_holderdistrict" name="desholderdistrict" class="input-text">
						</div>




						


						<div class="row state-city">
							<div class="col-md-2">
								<label class="checkout-label" for="state">Estado</label>
							</div>
							
							<div class="col-md-10">
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
						</div>





						<div class="row state-city">
							<div class="col-md-2">
								<label class="checkout-label" for="city">Cidade</label>
							</div>
							
							<div class="col-md-10">
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

				</div>

				<div class="col-md-4">

					&nbsp;

				</div>

			</div>

	<div class="payment-block">
				
				<div>
					<input id="checkout-button" type="submit" value="Gerar Boleto" name="checkout-boleto">
				</div>
				<div class="clear"></div>
				</form>
			</div>`;




	$(this).addClass('options-selected');
	$('#options-payments5').removeClass('options-selected');
	$('#installment').css('display','none');
	$('#installment-title').css('display','none');
	$('#payment-inputs').html(html);
	$('#checkout').css('min-height', '1000px');

});















$(document).on('click', '#options-payments5', function(){

	let html = `<div class="row">

				<div class="col-md-12">

					<div class="payment-warn payment-block">
    				

						<p>Preencha com os dados do titular do cartão!</p>


						<p id="checkout-desdocument-warn">Sabemos que é chato, mas pedimos que nos ajude a nos proteger de compras fraudulentas, e preencha com os dados exatos do titular do cartão de crédito, inclusive o endereço!</p>

					</div>

				</div>

			</div>

			<div class="row">

				<div class="col-md-4">

					<div class="payment-block">
				                				
						
						
						<div id="payment_name_1_field">
							<input type="text" placeholder="Nome do titular do cartão" id="payment_name_1" name="desname" class="input-text ">
						</div>



						<div id="payment_email_1_field">
							<input type="text" placeholder="E-mail do titular do cartão" name="desemail" id="payment_email_1" email="desemail" class="input-text ">
						</div>

							
															
						<div id="payment_inholdertypedoc_1_field">
							<select id="payment_inholdertypedoc_1" name="inholdertypedoc">
		                    	<option value="0" selected>Documento: CPF</option>
						    	<option value="1">Documento: CNPJ</option>
		              
		                	</select>
						</div>


							
				


						<div id="payment_holderdocument_1_field">
									<input type="text" placeholder="Número do documento" id="payment_holderdocument_1" name="desholderdocument" class="input-text ">
								</div>

						
						<div class="row row-2-columns">
							
							<div class="col-md-5">
								<div id="payment_nrddd_1_field">
									<input type="text" placeholder="DDD" id="payment_nrholderddd_1" name="nrholderddd" class="input-text">
								</div>
							</div>



							<div class="col-md-7">
								<div id="payment_nrphone_1_field">
									<input type="text" placeholder="Telefone" id="payment_nrholderphone_1" name="nrholderphone" class="input-text">
								</div>
							</div>

						</div>




						<div id="dtbirth-field" class="my-3" id="payment_holderbirth_1_field">
							<div id="dtbirth-warn"></div>
							<input type="date" placeholder="Nascimento" id="payment_holderbirth_1" name="dtholderbirth" class="input-text">
						</div>




					</div><!--payment-block--->

				</div>

				<div class="col-md-4">

					<div class="payment-block">
				
						<div id="billing_cep_1_field">
							<input type="text" placeholder="CEP do Titular" id="billing_cep_1" name="zipcode" class="input-text">
							<!--<input type="submit" Atualizar CEP" id="place_order" class="button alt" formaction="/checkout" formmethod="get">-->
						</div>

						<div id="billing_holderaddress_1_field">
							<input type="text" placeholder="Logradouro, rua, avenida" id="billing_holderaddress_1" name="desholderaddress" class="input-text">
						</div>

						<div id="billing_holdernumber_1_field">
							<input type="text" placeholder="Número" id="billing_address_1" name="desholdernumber" class="input-text">
						</div>

						<div id="billing_desholdercomplement_1_field">
							<input type="text" placeholder="Complemento (opcional)" id="billing_desholdercomplement_1" name="desholdercomplement" class="input-text">
		                </div>

		                <div id="billing_holderdistrict_field">
							<input type="text" placeholder="Bairro" id="billing_holderdistrict" name="desholderdistrict" class="input-text">
						</div>




						


						<div class="row state-city">
							<div class="col-md-2">
								<label class="checkout-label" for="state">Estado</label>
							</div>
							
							<div class="col-md-10">
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
						</div>





						<div class="row state-city">
							<div class="col-md-2">
								<label class="checkout-label" for="city">Cidade</label>
							</div>
							
							<div class="col-md-10">
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

				</div>

				<div class="col-md-4">

					`+thirdPartCard+`

				</div>

			</div>`;

	$(this).addClass('options-selected');
	$('#options-payments4').removeClass('options-selected');
	$('#installment').css('display','block');
	$('#installment-title').css('display','block');
	$('#payment-inputs').html(html);
	$('#checkout').css('min-height', '1000px');

});








$('#installment').on('change', function(){

	let interest = $("option:selected", this).attr('data-interest');
	/*let interest2 = interest.replace('.',',');*/
	$('#interest').html('R$ '+ interest.toLocaleString('pt-BR'));

});//end on




	
$('#options-payments4').on('click', function(){

	let boleto = $("#interest").attr('data-boleto');
	/*let boleto2 = boleto.replace('.',',');*/
	$('#interest').html('R$ '+ boleto.toLocaleString('pt-BR'));
	$("#installment [value='1']").attr("selected",false);

});//end on




$(document).on('click', '#options-payments5', function(){

	let card = $("#interest").attr('data-card');
	/*let card2 = card.replace('.',',');*/
	$('#interest').html('R$ '+ card.toLocaleString('pt-BR'));
	$("#installment [value='1']").attr("selected","selected");

});//end on

















});//END ready