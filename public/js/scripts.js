$(document).ready(function(){
	$(".button-collapse").sideNav({
         edge: 'left', // Choose the horizontal origin
         // closeOnClick: true
     });

	$(".dropdown-button").dropdown();

	if($('#flash-overlay-modal')[0]){
		$('#flash-overlay-modal').openModal();   
	}
	$('.modal-trigger').leanModal();
	$('select').material_select();

});