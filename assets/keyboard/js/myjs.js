// JavaScript Document
$(document).ready(functio(e){
	$(".drop-menu").click(function(e){
		$(".menu_drop").animate({top:"160px"},"fast");	
		$(".menu_drop").animate({top:"120px"},"fast");
	});
	$(".drop_menu").click(function(e){
		$(".menu_drop").animate({top:"-360px"});							   
	})
});