var CON_MSG_AT_LEAST_ONE = "Please select at least one!";
var CON_MSG_DEL = "Are you sure to delete?";
var CON_TITLE_CON = "Confirm";
var CON_TITLE_WAR = "<span class='text-warning'>Warning</span>";
var CON_MSG_NO_DATA = "No data";
var CON_MSG_WHICH_ONE = "Which one do you want to edit?";
var cur_page = 0;
var gl_url = '';
var gl_name = '';

function setBaseUrl(url){
	gl_url = url;
}
function getBaseUrl(){
	return gl_url;
}
function getLinkSearch(){
	return getBaseUrl() + '/search/' + cur_page;
}
//var pleaseWaitDiv = $('<div class="modal fade" id="pleaseWaitDialog" data-backdrop="static" data-keyboard="false"><div class="modal-header"><h1>Processing...</h1></div><div class="modal-body"><div class="progress progress-striped active"><div class="bar" style="width: 100%;"></div></div></div></div>');
var pleaseWaitDiv = 
		$('<div class="modal fade" id="pleaseWaitDialog" data-backdrop="static" data-keyboard="false">' +    
			'<div class="modal-dialog">' +
				'<div class="modal-content">' +
					'<div class="modal-header">' +
						'<h3 class="modal-title">Processing...</h3>' +
					'</div>' +
					'<div class="modal-body">' +
						'<div class="progress progress-striped active">' +
							'<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>' +
						'</div>' +
					'</div>' +
				'</div>' +
			'</div>' +
		'</div>');
		
function validateForm1(th){			
	var txt = th.val();
	if(txt==''){
		th.parent().addClass('has-error');
		return false;
	}else{
		th.parent().removeClass('has-error');
		return true;
	}
}

function digit_format( num, len, pattern) {
	pattern = typeof(pattern)=='undefined'?" ":pattern;
	len = typeof(len)=='undefined'?3:len;
	num = num.toString().replace( /\B(?=(?:\d{3})+)$/g, pattern );
	return num;
}

function valid(frm){
	var cnt = 0;
	frm = typeof(frm) == 'undefined' ? '':frm +' ';
	$.each($(frm + '.required'),function(){
		var th = $(this);
		var is_valid = validateForm(th);

		if(!is_valid){
			cnt++;
		}
	});
	return cnt;
}

function validateForm(obj) {
	var res = true;
	var txt = obj.val();
	if (txt == '' || txt == null || parseFloat(txt) == 0) {
		res = false;
		obj.parent().addClass('has-error');
	} else {
		obj.parent().removeClass('has-error');
	}
	var id = obj.attr("id");
	if(typeof(id)!='undefined' && id != ''){
		var multi = obj.attr("multiple");
		var eleChosen = '#'+id+'_chosen a.chosen-single';
		if(typeof(multi)!='undefined'){
			eleChosen = '#'+id+'_chosen ul.chosen-choices';
		}
		var is_check = (txt != null && txt != '');
		if( is_check ){
			$(eleChosen).removeClass("invalid");
		}else{
			res = false;
			$(eleChosen).addClass("invalid");
		}
	}
	return res;
}

$(document).on('keyup','.required',function(){
	var th = $(this);
	validateForm(th);
});
$(document).on('click','#all-chk',function(){
	$('.chk').prop('checked',this.checked);
});

$(document).on('keydown','.number',is_number);


function is_number(e){
	var nKeyCode = e.which || e.keyCode; 
	//Ignore Backspace and Tab keys
	if (nKeyCode == 8 || nKeyCode == 9 || nKeyCode==190 || nKeyCode==110 || nKeyCode==116 || (nKeyCode>=35 && nKeyCode<=40))
		return;
	if (nKeyCode < 95){
		if (nKeyCode < 48 || nKeyCode > 57)
			e.preventDefault();
	}else{                    
		if (nKeyCode < 96 || nKeyCode > 105)
			e.preventDefault();
	}
}

function format2Digit(txt) {
	return txt > 9 ? txt : '0' + txt;
}

//todo get current date
function getCurrentDate() {
	var dat = new Date();
	var yy = dat.getFullYear();
	var mm = dat.getMonth() + 1;
	var dd = dat.getDate();
	var hh = dat.getHours();
	var mn = dat.getMinutes();
	var ss = dat.getSeconds();
	mm = format2Digit(mm);
	dd = format2Digit(dd);
	mn = format2Digit(mn);
	ss = format2Digit(ss);
	hh = format2Digit(hh);

	var res = yy +'-'+ mm +'-'+  dd + ' ' + hh +':'+ mn +':'+ ss;
	return res;
}

function remoteData(){
	var res = {};
	$.ajax({
		type:'post',
		url:th.attr('action'),
		async:false,
		data:th.serialize(),
		dataType:'json',
		success:function(response){
			res = response;		
		}
	});
	return res;
}

function toEdit(url, id){
	var _url = url+'/edit/' + id;
	window.location = _url;
}
function resetForm(formId){
	var _frm = $(formId);
	if(typeof(_frm[0]) != 'undefined') {
		_frm[0].reset();
		jQuery('select').trigger("chosen:updated");
		//$(formId).trigger("reset");
	}
}
function redirect(url){
	window.location = url;
}

function opentNewTab(url,target){
	var win = window.open(url,target);
	win.focus();
}

function remotePost(url,frm, dtype){
	dtype = typeof(dtype) != 'undefined' ? dtype : 'json';
	var res;
	$.ajax({
		type:'post',
		url:url,
		async:false,
		data:frm,
		dataType:dtype,
		beforeSend: function () {
			$('form').append('<div class="loading"></div>');
		},
		success:function(data){
			res = data;
		},
		complete: function () {
			$('.loading').remove();
		}
	});
	return res;
}

function remoteTracking(url,frm, dtype){
	dtype = typeof(dtype) != 'undefined' ? dtype : 'json';
	var res;
	$.ajax({
		type:'post',
		url:url,
		async:false,
		data:frm,
		dataType:dtype,
		success:function(data){
			res = data;
		}
	});
	return res;
}

function remoteDestroy(url,data, redir){
	$.ajax({
		type:'post',
		url:url,
		data:data,
		dataType:'json',
		success:function(){
			window.location = redir;
		}
	});
}

function modalPrint(heading, elements, callback) {
	callback = typeof(callback)!='undefined'?callback:function(){};
	$('#myModal').remove();
    var frmModal = 
		$('<div class="modal fade" id="myPrintModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-keyboard="false" data-backdrop="static" aria-hidden="true">' +    
			'<div class="modal-dialog">' +
				'<div class="modal-content">' +
					'<div class="modal-header">' +
						//'<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
						'<h3 class="modal-title" id="myModalLabel">' + heading +'</h3>' +
					'</div>' +
					'<div class="modal-body">' + elements +'</div>' +
					'<div class="modal-footer">' +
						'<a id="btn-cancel-modal" class="btn btn-default"> Cancel </a>' +
						'<a id="btn-print-modal" class="btn btn-primary"> Print </a>' +
					'</div>' +
				'</div>' +
			'</div>' +
		'</div>');
	frmModal.appendTo('body');
	//todo show modal
    frmModal.modal('show',callback());
	frmModal.find('select').chosen({width:"100%",disable_search_threshold:5});
}

function modalForm(heading, elements, callback) {
	callback = typeof(callback)!='undefined'?callback:function(){};
	$('#myModal').remove();
    var frmModal = 
		$('<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">' +    
			'<div class="modal-dialog">' +
				'<div class="modal-content">' +
					'<div class="modal-header">' +
						'<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
						'<h3 class="modal-title" id="myModalLabel">' + heading +'</h3>' +
					'</div>' +
					'<div class="modal-body">' + elements +'</div>' +
					'<div class="modal-footer">' +
						'<a class="btn btn-default" data-dismiss="modal"> Cancel </a>' +
						'<a id="btn-save-form" class="btn btn-primary"> Save </a>' +
					'</div>' +
				'</div>' +
			'</div>' +
		'</div>');
	frmModal.appendTo('body');
	//todo show modal
    frmModal.modal('show',callback());
	frmModal.find('select').chosen({width:"100%",disable_search_threshold:5});
}

function modalCustomForm(heading, elements, callback) {
	callback = typeof(callback)!='undefined'?callback:function(){};
	$('#myModal').remove();
    var frmModal = 
		$('<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">' +    
			'<div class="modal-dialog">' +
				'<div class="modal-content">' +
					'<div class="modal-header">' +
						'<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
						'<h3 class="modal-title" id="myModalLabel">' + heading +'</h3>' +
					'</div>' +
					'<div class="modal-body">' + elements +'</div>' +
					'<div class="modal-footer">' +
						'<a class="btn btn-default" data-dismiss="modal"> Cancel </a>' +
						'<a id="btn-clear-save" class="btn btn-primary"> Save </a>' +
					'</div>' +
				'</div>' +
			'</div>' +
		'</div>');
	frmModal.appendTo('body');
	//todo show modal
    frmModal.modal('show',callback());
	frmModal.find('select').chosen({width:"100%",disable_search_threshold:5});
}

function modalFormChangePassword(heading, elements, callback) {
	callback = typeof(callback)!='undefined'?callback:function(){};
	$('#myModalPassword').remove();
    var frmModal = 
		$('<div class="modal fade" id="myModalPassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">' +    
			'<div class="modal-dialog">' +
				'<div class="modal-content">' +
					'<div class="modal-header">' +
						'<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
						'<h3 class="modal-title" id="myModalLabel">' + heading +'</h3>' +
					'</div>' +
					'<div class="modal-body">' + elements +'</div>' +
					'<div class="modal-footer">' +
						'<a class="btn btn-default" data-dismiss="modal"> Cancel </a>' +
						'<a id="btn-save-change-password" class="btn btn-primary"> Save </a>' +
					'</div>' +
				'</div>' +
			'</div>' +
		'</div>');
	frmModal.appendTo('body');
	//todo show modal
    frmModal.modal('show',callback());
	frmModal.find('select').chosen({width:"100%",disable_search_threshold:5});
}

function setDatePicker(ele){
	var pattern = 'yyyy-mm-dd';
	if($(ele).attr('pattern')){
		pattern = $(ele).attr('pattern');
	}	
	$(ele).datepicker({
		format: pattern,
		autoclose: true,
		orientation: 'top'
	});
}

function removeModal(){
	$( '.modal' ).remove();
	$( '.modal-backdrop' ).remove();
}

function getOptsBy(data,pls){
	var opts = typeof(pls)=='undefined'?'':'<option value="">'+pls+'</option>';
	for(var key in data){
		var val = data[key];
		if(val!=''){
			opts += '<option value="'+key+'">'+val+'</option>';
		}
	}
	return opts;
}

function modalConfirm(heading, question, callback) {
    var confirmModal = 
		$('<div class="modal fade" id="myModalConfirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">' +    
			'<div class="modal-dialog">' +
				'<div class="modal-content">' +
					'<div class="modal-header">' +
						'<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
						'<h3 class="modal-title" id="myModalLabel">' + heading +'</h3>' +
					'</div>' +
					'<div class="modal-body">' +
						'<p>' + question + '</p>' +
					'</div>' +

					'<div class="modal-footer">' +
						'<a id="btn-cancel-confirm" class="btn btn-default" data-dismiss="modal">Cancel</a>' +
						'<a id="btn-ok-confirm" class="btn btn-primary">Ok</a>' +
					'</div>' +
				'</div>' +
			'</div>' +
		'</div>');

    confirmModal.find('#btn-ok-confirm').click(function(event) {
		callback();
		confirmModal.modal('hide');
    });
	//todo show modal
    confirmModal.modal('show');	
}
function modalAlert(heading, question) {
    var confirmModal = 
		$('<div class="modal fade" id="myModalAlert" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">' +    
			'<div class="modal-dialog">' +
				'<div class="modal-content">' +
					'<div class="modal-header">' +
						'<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
						'<h3 class="modal-title" id="myModalLabel">' + heading +'</h3>' +
					'</div>' +
					'<div class="modal-body">' +
						'<p>' + question + '</p>' +
					'</div>' +

					'<div class="modal-footer">' +
						'<a id="btn-ok-alert" data-dismiss="modal" class="btn btn-primary">Ok</a>' +
					'</div>' +
				'</div>' +
			'</div>' +
		'</div>');
	confirmModal.find('#btn-ok-alert').click(function(event) {
		confirmModal.modal('hide');
    });
	//todo show modal
    confirmModal.modal('show');	
}

function modalPayslip(heading, msg) {
    var confirmModal = 
        $('<div class="modal fade" id="myPayslipModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">' +    
            '<div class="modal-dialog">' +
                '<div class="modal-content">' +
                    '<div class="modal-header">' +
                            '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                            '<h3 class="modal-title" id="myModalLabel">' + heading +'</h3>' +
                    '</div>' +
                    '<div class="modal-body">' +
                        '<div style="overflow-x:auto">' +
                            msg +
                        '</div>' +
                    '</div>' +
                '</div>' +
            '</div>' +
        '</div>');
	confirmModal.find('#btn-ok-alert').click(function(event) {
		confirmModal.modal('hide');
    });
	//todo show modal
    confirmModal.modal('show');	
}

//todo set word style
function setStyleWord(){
	tinyMCE.init({
		mode : "textareas",
		theme : "advanced",
		//plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",
		// Theme options
		theme_advanced_buttons1 : "bold,italic,underline,|,justifyleft,justifycenter,justifyright,justifyfull,|,bullist,numlist,|,outdent,indent,|,insertdate,inserttime",
		theme_advanced_buttons2 : "formatselect,fontselect,fontsizeselect,|,forecolor,backcolor",
		theme_advanced_buttons3 :'',
		theme_advanced_buttons3 :'',
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		//theme_advanced_path_location : "bottom",
		//theme_advanced_statusbar_location : "bottom",
		//theme_advanced_resizing : true,
	});
}
function isDenyOrLogin(data,obj){
	if(typeof(data.page) != 'undefined'){
		if(data.page=='login'){
			window.location = base_url + '/login';
		}		
		if(data.result=='error' && data.page=='deny'){
			if(typeof(obj) != 'undefined'){
				var msg = '<div class="alert alert-danger">'+
						'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
						'You do not have right!</div>';
				obj.html(msg);
				setTimeout(function(){
					obj.html('');
				},5000);
			}
		}
	}
}

//todo pagination
$(document).on('click','.pagination li a',function(e){
	e.preventDefault();
	var href = $(this).attr('href');
	doSearch(href);
});

function doSearch(link, id){
	var obj = $("#viewer");
	$.ajax({
		type:'post',
		url:link,
		data:$("#search-form").serialize(),
		dataType:'json',
		beforeSend:function(){
			obj.append('<div class="loading"></div>');
		},
		success:function(res){
			if(res.result=='ok'){
				cur_page = res.page;
				obj.html(res.data);

				if(typeof(id)!='undefined'){
					var tr = $('#viewer tbody tr[id='+id+']');
					tr.addClass('success');
					setTimeout(function(){
						tr.removeClass('success');
					},5000);
				}
			}
			isDenyOrLogin(res);
		},
		complete:function(){
			$('.loading').remove();
		}
	});
}

//todo set active on row
$(document).on('click',".table-edit tbody tr",function(){
	$(this).toggleClass('info');
});

$(document).on('click','.btn-delete',function(e){
	e.preventDefault();
	var th = $(this);
	var trs = $('.table-edit tbody tr.info');
	if(trs.length>0){
		modalConfirm(CON_TITLE_CON,CON_MSG_DEL,function(){
			var ids = [];
			trs.each(function(){
				var _id = $(this).attr('id');
				ids.push(_id);
			});
			var act = th.attr('data-action');
			var _link = getBaseUrl() + '/' + act;
			$.ajax({
				type:'post',
				url:_link,
				data:{"ids":ids,'dateModified':getCurrentDate()},
				dataType:'json',
				success:function(response){
					if(response.result == 'ok'){
						doSearch(gl_url + '/search/' + cur_page);
					}
				}
			});
		});
	}else{
		modalAlert(CON_TITLE_WAR, CON_MSG_AT_LEAST_ONE);
	}
       
});

//btn pay
$(document).on('click','.btn-print',function(e){
	e.preventDefault();
        
//	var th = $(this);
//	var trs = $('.table-edit tbody tr.info');
//	if(trs.length>0){
//		modalConfirm(CON_TITLE_CON,CON_MSG_DEL,function(){
//			var ids = [];
//			trs.each(function(){
//				var _id = $(this).attr('id');
//				ids.push(_id);
//			});
//			var act = th.attr('data-action');
//			var _link = getBaseUrl() + '/' + act;
//			$.ajax({
//				type:'post',
//				url:_link,
//				data:{"ids":ids,'dateModified':getCurrentDate()},
//				dataType:'json',
//				success:function(response){
//					if(response.result == 'ok'){
//						doSearch(gl_url + '/search/' + cur_page);
//					}
//				}
//			});
//		});
//	}else{
//		modalAlert(CON_TITLE_WAR, CON_MSG_AT_LEAST_ONE);
//	}  
//	  
        //var act = th.attr('data-action');
        
        var _formId = '#' + gl_name + '-form';
        
	if(valid(_formId)===0) {
		$('#dateCreated').val(getCurrentDate());
		
                var frm = $(_formId);
                
		$.ajax({
			type: 'post',
			url: frm.attr('data-action'),
			data: frm.serialize(),
			dataType: 'json',
			beforeSend: function () {
				$(_formId).append('<div class="loading"></div>');
			},
			success: function (res) {
                            
				if (res.result == 'ok') {
					$('#myModal').modal('toggle');
					removeModal();
					doSearch(getLinkSearch(),res.return_id);
				}
                                
				if (res.result == 'error') {
					$('#msg-error').html(res.msg);
				}
				isDenyOrLogin(res, $('#msg-error'));
			},
			complete: function () {
				$('.loading').remove();
			}
		});
	}
});

//end btn pay

$(document).on('click','#btn-save-form',function(e){
        
	e.preventDefault();
	var _formId = '#' + gl_name + '-form';
	if(valid(_formId)==0) {
		$('#dateCreated').val(getCurrentDate());
		var frm = $(_formId);
		$.ajax({
			type: 'post',
			url: frm.attr('data-action'),
			data: frm.serialize(),
			dataType: 'json',
			beforeSend: function () {
				$(_formId).append('<div class="loading"></div>');
			},
			success: function (res) {
				if (res.result == 'ok') {
					$('#myModal').modal('toggle');
					removeModal();
					doSearch(getLinkSearch(),res.return_id);
				}
				if (res.result == 'error') {
					$('#msg-error').html(res.msg);
				}
				isDenyOrLogin(res, $('#msg-error'));
			},
			complete: function () {
				$('.loading').remove();
			}
		});
	}
});

$(document).on('click','tr[data-toggle="collapse"]',function () {
	$(this).find('.toggle-icon').toggleClass('fa-caret-right fa-caret-down');
});

//todo reset dropdown
function updateDropdown(th){
	var _id = th.val();
	var ele = '#'+th.attr('data-change');
	var act = th.attr('data-action');
	$(ele + ' option[value!=""][value!=0]').remove();
	if(_id!='0' || _id!=''){
		var _link = getBaseUrl() +'/'+ act;
		var data = remotePost(_link,{"id":_id});
		if(data){
			for(var ind=0; ind<data.length; ind++){
				var row = data[ind];
				var opt = new Option(row.value, row.id);
				$(ele).append($(opt));
			}
		}
	}
	jQuery(ele).trigger("chosen:updated");
}

function generateColumn(txt){
	txt = typeof(txt) != 'undefined' ? txt : '';
	var td = "<td>" + txt + "</td>";
	return td;
}

$(document).ready(function(){
	// Set last page opened on the menu
	$('#menu a[href]').on('click', function() {
		sessionStorage.setItem('menu', $(this).attr('href'));
	});

	if (!sessionStorage.getItem('menu')) {
		$('#menu #dashboard').addClass('active');
	} else {
		// Sets active and open to selected page in the left column menu.
		$('#menu a[href=\'' + sessionStorage.getItem('menu') + '\']').parents('li').addClass('active open');
	}

	if (localStorage.getItem('column-left') == 'active') {
		$('#button-menu i').replaceWith('<i class="fa fa-dedent fa-lg"></i>');

		$('#column-left').addClass('active');

		// Slide Down Menu
		$('#menu li.active').has('ul').children('ul').addClass('collapse in');
		$('#menu li').not('.active').has('ul').children('ul').addClass('collapse');
	} else {
		$('#button-menu i').replaceWith('<i class="fa fa-indent fa-lg"></i>');

		$('#menu li li.active').has('ul').children('ul').addClass('collapse in');
		$('#menu li li').not('.active').has('ul').children('ul').addClass('collapse');
	}

	// Menu button
	$('#button-menu').on('click', function() {
		// Checks if the left column is active or not.
		if ($('#column-left').hasClass('active')) {
			localStorage.setItem('column-left', '');

			$('#button-menu i').replaceWith('<i class="fa fa-indent fa-lg"></i>');

			$('#column-left').removeClass('active');

			$('#menu > li > ul').removeClass('in collapse');
			$('#menu > li > ul').removeAttr('style');
		} else {
			localStorage.setItem('column-left', 'active');

			$('#button-menu i').replaceWith('<i class="fa fa-dedent fa-lg"></i>');

			$('#column-left').addClass('active');

			// Add the slide down to open menu items
			$('#menu li.open').has('ul').children('ul').addClass('collapse in');
			$('#menu li').not('.open').has('ul').children('ul').addClass('collapse');
		}
	});

	// Menu
	$('#menu').find('li').has('ul').children('a').on('click', function() {
		if ($('#column-left').hasClass('active')) {
			$(this).parent('li').toggleClass('open').children('ul').collapse('toggle');
			$(this).parent('li').siblings().removeClass('open').children('ul.in').collapse('hide');
		} else if (!$(this).parent().parent().is('#menu')) {
			$(this).parent('li').toggleClass('open').children('ul').collapse('toggle');
			$(this).parent('li').siblings().removeClass('open').children('ul.in').collapse('hide');
		}
	});

	// tooltips on hover
	$('[data-toggle=\'tooltip\']').tooltip({container: 'body', html: true});

	// Makes tooltips work on ajax generated content
	$(document).ajaxStop(function() {
		$('[data-toggle=\'tooltip\']').tooltip({container: 'body'});
	});

	$('[data-toggle=\'tooltip\']').on('remove', function() {
		$(this).tooltip('destroy');
	});

})

function printReport(page){
	var _printer = $('<iframe />');
	_printer[0].name = "printer";
	_printer.css({ "position": "absolute", "top": "-1000000px" });
	$("body").append(_printer);
	var frameDoc = _printer[0].contentWindow ? _printer[0].contentWindow : _printer[0].contentDocument.document ? _printer[0].contentDocument.document : _printer[0].contentDocument;
	frameDoc.document.open();
	//Create a new HTML document.
	frameDoc.document.write(page);
	frameDoc.document.close();
	setTimeout(function () {
		window.frames["printer"].focus();
		window.frames["printer"].print();
		_printer.remove();
	}, 500);
}

$(document).on('click','#btn-print-modal',function () {
    var _th = $(this);
    var _id = _th.attr('data-id');
    var _act = _th.attr('data-action');
    var _url = getBaseUrl() + '/' + _act;
    var data = remotePost(_url,{'id':_id});
    printReport(data.page);
});

function updateChosen(ele){
    jQuery(ele).trigger('chosen:updated');        
}

function getDropdownTextBy(eleName,id){
	var txt = $('select[name="'+eleName+'"] option[value="'+id+'"]').text();
	return txt;
}

function resetTable(ele){
	$(ele +' tbody tr:not(:first)').remove();
	$(ele +' tbody tr#no-data').show();
}

$(document).on('click','.btn-payslip-modal',function (e) {
    e.preventDefault();
    var _th = $(this);
    _th.closest('tbody').find('tr').removeClass('info');
    var _title = _th.attr('data-title');
    var _url = _th.attr('href');
    var data = remotePost(_url,{});
    if(data.result == 'ok'){
        modalPayslip(_title,data.page);
    }
});

