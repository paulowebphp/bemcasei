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

















/******************** EBOOK DOWNLOAD PANEL ***************************************************/
/******************** EBOOK DOWNLOAD PANEL ***************************************************/
/******************** EBOOK DOWNLOAD PANEL ***************************************************/
/******************** EBOOK DOWNLOAD PANEL ***************************************************/

$("#ebook-download").on("click", function(e){
    
    console.log('ok');


    e.preventDefault();

    let link = document.createElement('a');
	link.href = '/ebook/A_Maneira_Mais_Segura_e_Simples_De_Realizar_Seu_Casamento_Durante_A_Pandemia.pdf';
	link.download = 'A_Maneira_Mais_Segura_e_Simples_De_Realizar_Seu_Casamento_Durante_A_Pandemia.pdf';
	link.click();
	

});//end on





/******************** EBOOK DOWNLOAD PANEL ***************************************************/
/******************** EBOOK DOWNLOAD PANEL ***************************************************/
/******************** EBOOK DOWNLOAD PANEL ***************************************************/
/******************** EBOOK DOWNLOAD PANEL ***************************************************/













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

















/************************ UPLOAD IMAGE PREVIEW image-preview ********************************/
/************************ UPLOAD IMAGE PREVIEW image-preview ********************************/
/************************ UPLOAD IMAGE PREVIEW image-preview ********************************/
/************************ UPLOAD IMAGE PREVIEW image-preview ********************************/
$(function(){

	$('#file-rsvp').change(function(){


		//console.log(this);

		let name = $(this)[0].files[0].name;

		//console.log(name);

		html = '<i class="fa fa-check"></i> ';
		html += name;

		$('#name-preview').html(html);
		

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





 


















});//END document ready