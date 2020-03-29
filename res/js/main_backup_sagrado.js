$(document).ready(function(){







/******************** MENU SALSICHA ***************************************************/
/******************** MENU SALSICHA ***************************************************/
/******************** MENU SALSICHA ***************************************************/
/******************** MENU SALSICHA ***************************************************/

$("#btn-bars").on("click", function(){
    
    $("#header-mobile").toggleClass("open-menu");

});//end on



$("#menu-mobile-mask, .btn-close").on("click", function(){

    $("#header-mobile").removeClass("open-menu");


});//end on
/******************** MENU SALSICHA ***************************************************/
/******************** MENU SALSICHA ***************************************************/
/******************** MENU SALSICHA ***************************************************/
/******************** MENU SALSICHA ***************************************************/































/******************** SEARCH INFO ***************************************************/
/******************** SEARCH INFO ***************************************************/
/******************** SEARCH INFO ***************************************************/
/******************** SEARCH INFO ***************************************************/

$("#search-info").on("click", function(){
    
    $("#header-mobile").toggleClass("open-menu");

});//end on



$("#search-info, .btn-close").on("click", function(){

    $("#header-mobile").removeClass("open-menu");


});//end on
/******************** SEARCH INFO ***************************************************/
/******************** SEARCH INFO ***************************************************/
/******************** SEARCH INFO ***************************************************/
/******************** SEARCH INFO ***************************************************/



















/***********DESABILITANDO SUBMIT / DUPLICADAS****************************/
/***********DESABILITANDO SUBMIT / DUPLICADAS****************************/
/***********DESABILITANDO SUBMIT / DUPLICADAS****************************/
/***********DESABILITANDO SUBMIT / DUPLICADAS****************************/


$(document).on('submit', 'form', function(e){


	$('input[type="submit"], button[type="submit"]').prop('disabled', true);


});



/***********DESABILITANDO SUBMIT / DUPLICADAS****************************/
/***********DESABILITANDO SUBMIT / DUPLICADAS****************************/
/***********DESABILITANDO SUBMIT / DUPLICADAS****************************/
/***********DESABILITANDO SUBMIT / DUPLICADAS****************************/





















/***********LOAD NOS BOTÕES E SUBMITS****************************/
/***********LOAD NOS BOTÕES E SUBMITS****************************/
/***********LOAD NOS BOTÕES E SUBMITS****************************/
/***********LOAD NOS BOTÕES E SUBMITS****************************/

$(document).on(

	'click', 

	'#site-register, #site-accounts', 

	function(e){
	
		let load = `<img src="/res/images/loading3.gif">`;

		$('#load1').html(load);

});










$(document).on('click', '#checkout1', function(e){
	
	let load = `<img src="/res/images/loading3.gif">`;

	$('#load1').html(load);

});





$(document).on('click', '#checkout2', function(e){
	
	
	let load = `<img src="/res/images/loading3.gif">`;

	$('#load2').html(load);

});






$(document).on('click', '#checkout3', function(e){
	
	

	let load = `<img src="/res/images/loading3.gif">`;

	$('#load3').html(load);

});




$(document).on('click', '#checkout6', function(e){
	
	

	let load = `<img src="/res/images/loading3.gif">`;

	$('#load6').html(load);

});





$(document).on('click', '#checkout4', function(e){
	
	let load = `<img src="/res/images/loading3.gif">`;

	$('#load4').html(load);

});





$(document).on('click', '#checkout5', function(e){
	
	
	let load = `<img src="/res/images/loading3.gif">`;

	$('#load5').html(load);

});





/***********LOAD NOS BOTÕES E SUBMITS****************************/
/***********LOAD NOS BOTÕES E SUBMITS****************************/
/***********LOAD NOS BOTÕES E SUBMITS****************************/
/***********LOAD NOS BOTÕES E SUBMITS****************************/


























/******************** TEXTAREA AUTOFIT ***************************************************/
/******************** TEXTAREA AUTOFIT ***************************************************/
/******************** TEXTAREA AUTOFIT ***************************************************/
/******************** TEXTAREA AUTOFIT ***************************************************/
var tx = document.getElementsByTagName('textarea');

for (var i = 0; i < tx.length; i++) {
  tx[i].setAttribute('style', 'height:' + (tx[i].scrollHeight) + 'px;overflow-y:hidden;');
  tx[i].addEventListener("input", OnInput, false);
}

function OnInput() {
  this.style.height = 'auto';
  this.style.height = (this.scrollHeight) + 'px';
}
/******************** TEXTAREA AUTOFIT ***************************************************/
/******************** TEXTAREA AUTOFIT ***************************************************/
/******************** TEXTAREA AUTOFIT ***************************************************/
/******************** TEXTAREA AUTOFIT ***************************************************/

















































/***********************DOMAIN STORE************************************/
/***********************DOMAIN STORE************************************/
/***********************DOMAIN STORE************************************/
/***********************DOMAIN STORE************************************/
/***********************DOMAIN STORE************************************/
$('#sort-by').on('change', function(){

	
	/*$("option:selected", this).attr("selected","selected");

	let value = $(this).val();


	if( value == 'nome-asc' ) 
	{

		$("#sort-by [value='nome-desc']").attr("selected",false);
		$("#sort-by [value='valor-desc']").attr("selected",false);
		$("#sort-by [value='valor-desc']").attr("selected",false);


	}//end if
	if( value == 'nome-desc' ) 
	{

		$("#sort-by [value='nome-asc']").attr("selected",false);
		$("#sort-by [value='valor-desc']").attr("selected",false);
		$("#sort-by [value='valor-desc']").attr("selected",false);


	}//end if
	if( value == 'valor-asc' ) 
	{

		$("#sort-by [value='nome-asc']").attr("selected",false);
		$("#sort-by [value='nome-desc']").attr("selected",false);
		$("#sort-by [value='valor-desc']").attr("selected",false);


	}//end if
	if( value == 'valor-desc' ) 
	{

		$("#sort-by [value='nome-asc']").attr("selected",false);
		$("#sort-by [value='nome-desc']").attr("selected",false);
		$("#sort-by [value='valor-asc']").attr("selected",false);


	}//end if*/


	this.form.submit();

});//end on
/***********************DOMAIN STORE************************************/
/***********************DOMAIN STORE************************************/
/***********************DOMAIN STORE************************************/
/***********************DOMAIN STORE************************************/








































/************************************DOMAIN STORE CATEGORIES****************************************
$('#categories').on('change', function(){


	let categories = $("option:selected", this).attr('data-categories');
	let desdomain = $("option:selected", this).attr('data-desdomain');

	window.location.href = '/'+desdomain+'/loja/'+categories;

});//end on
*/




































/******************** BOOTSTRAP POPOVER ***************************************************/
/******************** BOOTSTRAP POPOVER ***************************************************/
/******************** BOOTSTRAP POPOVER ***************************************************/
/******************** BOOTSTRAP POPOVER ***************************************************/
$(function () {
  $('[data-toggle="popover"]').popover()
});

$(document).on('mouseleave', '#popover-template', function(e){
	$('[data-toggle="popover"]').popover('hide');
});

$(document).on('mouseleave', '#popover-template-mobile', function(e){
	$('[data-toggle="popover"]').popover('hide');
});

$(document).on('mouseleave', '#popover-template2', function(e){
	$('[data-toggle="popover"]').popover('hide');
});

$(document).on('mouseleave', '#popover-template3', function(e){
	$('[data-toggle="popover"]').popover('hide');
});

$(document).on('mouseleave', '#search-info', function(e){
	$('[data-toggle="popover"]').popover('hide');
});

$(document).on('mouseleave', '#search-info', function(e){
	$('[data-toggle="popover"]').popover('hide');
});

$(document).on('mouseleave', '#popover1', function(e){
	$('[data-toggle="popover"]').popover('hide');
});

$(document).on('mouseleave', '#popover2', function(e){
	$('[data-toggle="popover"]').popover('hide');
});
/******************** BOOTSTRAP POPOVER ***************************************************/
/******************** BOOTSTRAP POPOVER ***************************************************/
/******************** BOOTSTRAP POPOVER ***************************************************/
/******************** BOOTSTRAP POPOVER ***************************************************/
























/******************** MAILING ***************************************************/
/******************** MAILING ***************************************************/
/******************** MAILING ***************************************************/
/******************** MAILING ***************************************************/
/******************** MAILING ***************************************************/

$(document).on('click', '#mailing-submit', function(e){
	
	e.preventDefault();

	$('#mailing-alert').html('');

	let name = $("#mailing-form input[type=text][name=name]").val();
	let email = $("#mailing-form input[type=email][name=email]").val();
	let load = `<img src="/res/images/loading3.gif">`;

	$('#mailing-load').html(load);


	

	$.ajax({

        type:"GET",
        data: {'name': name, 'email': email},
        url: "/news"

    }).done( function( data ){

       	let html = `<div class="alert alert-info alert-dismissible fade show" role="alert">
						`+data+`
					    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					        <span aria-hidden="true">&times;</span>
					    </button>
					</div>
					`;


		$('#mailing-load').html('');
		$("#mailing-form input[type=text][name=name]").val('');
		$("#mailing-form input[type=email][name=email]").val('');
        $('#mailing-alert').html(html);


    }).fail(function( data ){

        console.error(data);

        let html = `<div class="alert alert-danger alert-dismissible fade show" role="alert">
					    `+data+`
					    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					        <span aria-hidden="true">&times;</span>
					    </button>
					</div>
					`;

		$('#mailing-load').html('');
		$("#mailing-form input[type=text][name=name]").val('');
		$("#mailing-form input[type=email][name=email]").val('');
		$('#mailing-alert').html(html);


    });


});
/******************** MAILING ***************************************************/
/******************** MAILING ***************************************************/
/******************** MAILING ***************************************************/
/******************** MAILING ***************************************************/








































/******************** MENU DROPDOWN TEMPLATES ***************************************************/
/******************** MENU DROPDOWN TEMPLATES ***************************************************/
/******************** MENU DROPDOWN TEMPLATES ***************************************************/
/******************** MENU DROPDOWN TEMPLATES ***************************************************/

$(document).on('click', '#domain-dropdown-button', function(){
	$('#domain-dropdown').addClass('show');
	$('#domain-dropdown-menu').addClass('show');

});



$(document).on('mouseleave', '#domain-dropdown-menu', function(){
	$('#domain-dropdown').removeClass('show');
	$('#domain-dropdown-menu').removeClass('show');

});
/******************** MENU DROPDOWN TEMPLATES ***************************************************/
/******************** MENU DROPDOWN TEMPLATES ***************************************************/
/******************** MENU DROPDOWN TEMPLATES ***************************************************/
/******************** MENU DROPDOWN TEMPLATES ***************************************************/




































/******************** MENU CATEGORIES STORE ***************************************************/
/******************** MENU CATEGORIES STORE ***************************************************/
/******************** MENU CATEGORIES STORE ***************************************************/
/******************** MENU CATEGORIES STORE ***************************************************/

$(document).on('click', '#categories-button', function(){
	$('#categories').addClass('show');
	$('#categories-menu').addClass('show');

});



$(document).on('mouseleave', '#categories-menu', function(){
	$('#categories').removeClass('show');
	$('#categories-menu').removeClass('show');

});
/******************** MENU CATEGORIES STORE ***************************************************/
/******************** MENU CATEGORIES STORE ***************************************************/
/******************** MENU CATEGORIES STORE ***************************************************/
/******************** MENU CATEGORIES STORE ***************************************************/











































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
/******************** DASHBOARD RANGE BORDER SIZE INPUT ***************************************************/
/******************** DASHBOARD RANGE BORDER SIZE INPUT ***************************************************/
/******************** DASHBOARD RANGE BORDER SIZE INPUT ***************************************************/

$(document).on('change', '#desborderimagesize', function(){
	let value = $(this).val();
	$('#border-size').html(value);

});
/******************** DASHBOARD RANGE BORDER SIZE INPUT ***************************************************/
/******************** DASHBOARD RANGE BORDER SIZE INPUT ***************************************************/
/******************** DASHBOARD RANGE BORDER SIZE INPUT ***************************************************/
/******************** DASHBOARD RANGE BORDER SIZE INPUT ***************************************************/


































/******************** DASHBOARD RANGE BORDER RADIUS INPUT ***************************************************/
/******************** DASHBOARD RANGE BORDER RADIUS INPUT ***************************************************/
/******************** DASHBOARD RANGE BORDER RADIUS INPUT ***************************************************/
/******************** DASHBOARD RANGE BORDER RADIUS INPUT ***************************************************/

$(document).on('change', '#desborderradiusbutton', function(){
	let radius = $(this).val();
	$('#border-radius').html(radius);

});

/******************** DASHBOARD RANGE BORDER RADIUS INPUT ***************************************************/
/******************** DASHBOARD RANGE BORDER RADIUS INPUT ***************************************************/
/******************** DASHBOARD RANGE BORDER RADIUS INPUT ***************************************************/
/******************** DASHBOARD RANGE BORDER RADIUS INPUT ***************************************************/












































/******************** DASHBOARD TEMPLATES MODELS ***************************************************/
/******************** DASHBOARD TEMPLATES MODELS ***************************************************/
/******************** DASHBOARD TEMPLATES MODELS ***************************************************/
/******************** DASHBOARD TEMPLATES MODELS ***************************************************/

$(document).on('click', '#thumb1', function(){

	$('#template1').attr('checked',true);
	$('#template1').prop('checked',true);
	$(this).addClass('checked');

	$('#thumb2').removeClass('checked');
	$('#template2').attr('checked',false);
	$('#thumb3').removeClass('checked');
	$('#template3').attr('checked',false);
	$('#thumb4').removeClass('checked');
	$('#template4').attr('checked',false);
	$('#thumb5').removeClass('checked');
	$('#template5').attr('checked',false);



	$('#preview').html('<img src="/res/images/template/thumb/tpl1.jpg">');
	$('#preview-button').html('<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#ModalTemplate">Template Rainbow</button>');

	$(".alert").alert('close');
	$('#ModalTemplate').modal('hide');

	

});







$(document).on('click', '#thumb2', function(){

	$('#template2').attr('checked',true);
	$('#template2').prop('checked',true);
	$(this).addClass('checked');

	$('#thumb1').removeClass('checked');
	$('#template1').attr('checked',false);
	$('#thumb3').removeClass('checked');
	$('#template3').attr('checked',false);
	$('#thumb4').removeClass('checked');
	$('#template4').attr('checked',false);
	$('#thumb5').removeClass('checked');
	$('#template5').attr('checked',false);

	$('#preview').html('<img src="/res/images/template/thumb/tpl2.jpg">');
	$('#preview-button').html('<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#ModalTemplate">Template Freedom</button>');

	$(".alert").alert('close');
	$('#ModalTemplate').modal('hide');

});









$(document).on('click', '#thumb3', function(){

	$('#template3').attr('checked',true);
	$('#template3').prop('checked',true);
	$(this).addClass('checked');


	$('#thumb1').removeClass('checked');
	$('#template1').attr('checked',false);
	$('#thumb2').removeClass('checked');
	$('#template2').attr('checked',false);
	$('#thumb4').removeClass('checked');
	$('#template4').attr('checked',false);
	$('#thumb5').removeClass('checked');
	$('#template5').attr('checked',false);

	$('#preview').html('<img src="/res/images/template/thumb/tpl3.jpg">');
	$('#preview-button').html('<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#ModalTemplate">Template Gold</button>');

	$(".alert").alert('close');
	$('#ModalTemplate').modal('hide');

});








$(document).on('click', '#thumb4', function(){

	$('#template4').attr('checked',true);
	$('#template4').prop('checked',true);
	$(this).addClass('checked');


	$('#thumb1').removeClass('checked');
	$('#template1').attr('checked',false);
	$('#thumb3').removeClass('checked');
	$('#template3').attr('checked',false);
	$('#thumb2').removeClass('checked');
	$('#template2').attr('checked',false);
	$('#thumb5').removeClass('checked');
	$('#template5').attr('checked',false);

	$('#preview').html('<img src="/res/images/template/thumb/tpl4.jpg">');
	$('#preview-button').html('<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#ModalTemplate">Template Hot</button>');

	$(".alert").alert('close');
	$('#ModalTemplate').modal('hide');

});







$(document).on('click', '#thumb5', function(){

	$('#template5').attr('checked',true);
	$('#template5').prop('checked',true);
	$(this).addClass('checked');


	$('#thumb1').removeClass('checked');
	$('#template1').attr('checked',false);
	$('#thumb3').removeClass('checked');
	$('#template3').attr('checked',false);
	$('#thumb4').removeClass('checked');
	$('#template4').attr('checked',false);
	$('#thumb2').removeClass('checked');
	$('#template2').attr('checked',false);

	$('#preview').html('<img src="/res/images/template/thumb/tpl5.jpg">');
	$('#preview-button').html('<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#ModalTemplate">Template Lovers</button>');

	$(".alert").alert('close');
	$('#ModalTemplate').modal('hide');

});







$(document).on('click', '#preview img', function(){

	$('#ModalTemplate').modal('show');

});

/******************** DASHBOARD TEMPLATES MODELS ***************************************************/
/******************** DASHBOARD TEMPLATES MODELS ***************************************************/
/******************** DASHBOARD TEMPLATES MODELS ***************************************************/
/******************** DASHBOARD TEMPLATES MODELS ***************************************************/




































/******************** DASHBOARD FONT FAMILY  ***************************************************/
/******************** DASHBOARD FONT FAMILY  ***************************************************/
/******************** DASHBOARD FONT FAMILY  ***************************************************/
/******************** DASHBOARD FONT FAMILY  ***************************************************/
$(document).on(

	'change', 
	'#desfontfamily1, #desfontfamily2', 

	function(){

	let fontfamily = $("option:selected", this).attr('data-fontfamily');
	$(this).css("font-family", fontfamily);

});

/******************** DASHBOARD FONT FAMILY  ***************************************************/
/******************** DASHBOARD FONT FAMILY  ***************************************************/
/******************** DASHBOARD FONT FAMILY  ***************************************************/
/******************** DASHBOARD FONT FAMILY  ***************************************************/
















































/******************** PLANS ***************************************************/
/******************** PLANS ***************************************************/
/******************** PLANS ***************************************************/
/******************** PLANS ***************************************************/


$('#plan1').on('change', function(){

	let vlprice = $("option:selected", this).attr('data-vlprice');
	$('#plan1-vlprice').html('R$ '+vlprice.replace('.',','));

	let vlinteger = $("option:selected", this).attr('data-vlinteger');
	$('#plan1-vlinteger').html(vlinteger);

	let vldecimal = $("option:selected", this).attr('data-vldecimal');
	$('#plan1-vldecimal').html(','+vldecimal);


});//end on




$('#plan2').on('change', function(){

	let vlprice = $("option:selected", this).attr('data-vlprice');
	$('#plan2-vlprice').html('R$ '+vlprice.replace('.',','));

	let vlinteger = $("option:selected", this).attr('data-vlinteger');
	$('#plan2-vlinteger').html(vlinteger);

	let vldecimal = $("option:selected", this).attr('data-vldecimal');
	$('#plan2-vldecimal').html(','+vldecimal);


});//end on




$('#plan3').on('change', function(){

	let vlprice = $("option:selected", this).attr('data-vlprice');
	$('#plan3-vlprice').html('R$ '+vlprice.replace('.',','));

	let vlinteger = $("option:selected", this).attr('data-vlinteger');
	$('#plan3-vlinteger').html(vlinteger);

	let vldecimal = $("option:selected", this).attr('data-vldecimal');
	$('#plan3-vldecimal').html(','+vldecimal);


});//end on
/******************** PLANS ***************************************************/
/******************** PLANS ***************************************************/
/******************** PLANS ***************************************************/
/******************** PLANS ***************************************************/




































/******************** STATE ***************************************************/
/******************** STATE ***************************************************/
/******************** STATE ***************************************************/
/******************** STATE ***************************************************/

$(document).on('change', '#state', function(e){

	var idstate = $(this).val();



	 $.ajax({

        type:"GET",
        data: "idstate="+idstate,
        url: "/address/state"

    }).done( function( data ) {

        var city = '';

        console.log(data);

        $.each($.parseJSON(data), function(key,value){

            city += '<option value="'+ value.idcity+'">' + value.descity + '</option>';
        });

        $('#city').html(city);


    }).fail(function(data){

        console.error("Houve um erro no carregamento das cidades devido a uma lentidão na internet, tente novamente");

    });



});
/******************** STATE ***************************************************/
/******************** STATE ***************************************************/
/******************** STATE ***************************************************/
/******************** STATE ***************************************************/






































/************************ UPLOAD IMAGE PREVIEW image-preview ********************************/
/************************ UPLOAD IMAGE PREVIEW image-preview ********************************/
/************************ UPLOAD IMAGE PREVIEW image-preview ********************************/
/************************ UPLOAD IMAGE PREVIEW image-preview ********************************/
$(function(){

	$('#file').change(function(){


		let file = $(this)[0].files[0];

		let fileReader = new FileReader();

		fileReader.onloadend = function(){


			$('#image-preview').attr('src', fileReader.result);

		}

		fileReader.readAsDataURL(file);

	});

});
/************************ UPLOAD IMAGE PREVIEW image-preview ********************************/
/************************ UPLOAD IMAGE PREVIEW image-preview ********************************/
/************************ UPLOAD IMAGE PREVIEW image-preview ********************************/
/************************ UPLOAD IMAGE PREVIEW image-preview ********************************/



























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