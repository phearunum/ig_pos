var clearMoney = function (url) {
    setBaseUrl(url);
    var _urlSearch = url + '/search';
    gl_name = 'clm';
    var frm = gl_name + '-form';
    var frmId = '#' + frm;
    var tblId = '#' + gl_name + '-table';

    $(document).ready(function () {
        setDatePicker('.datepickr');
        var dat = new Date();
        $('input[name="start_date"]').datepicker('setDate', dat);
        $('input[name="end_date"]').datepicker('setDate', dat);
        if($('select.changeDropdown').length>0){
            updateDropdown($('select.changeDropdown'));        
        }
        doSearch(_urlSearch);
    });

    //todo edit row
    $(document).on('click', '.btn-clm-clear', function () {
        var th = $(this);
        var _id = th.attr('data-id');
        var _cat = th.attr('data-type');
        var _add_link = url + '/get_clear_form';
        var _frm = remotePost(_add_link, {"id": _id, "category": _cat}, 'html');
        modalCustomForm('Clear', _frm, function () {
            $('form' + frmId).attr('data-action', getBaseUrl() + "/clear_save");
            setDatePicker('.datepickr');
            $('input[name="clm\\[clear_date\\]"]').val($('input[name="end_date"]').val());
        });
    });
    
    $(document).on('change', 'select.changeDropdown', function (e) {        
        updateDropdown($('select.changeDropdown'));
    });    

    //todo search
    $(document).on('click', '.btn-search', function () {
        doSearch(_urlSearch);
    });

    //todo save
    $(document).on('click', '#btn-clear-save', function (e) {
        e.preventDefault();
        if (valid(frmId) == 0) {
            $('input[type="hidden"][name="dateCreated"]').val(getCurrentDate());
            var _frm = $(frmId);
            var _data = _frm.serializeArray();
            $.ajax({
                type: 'post',
                url: _frm.attr('data-action'),
                data: _data,
                dataType: 'json',
                beforeSend: function () {
                    _frm.append('<div class="loading"></div>');
                },
                success: function (res) {
                    var _msg = $('#msg-error');
                    if (res.result == 'ok') {
                        $('#myModal').modal('toggle');                        
                        doSearch(_urlSearch);
                    }
                    if (res.result == 'error') {
                        _msg.html(res.msg);
                    }
                    isDenyOrLogin(res, $('#msg-error'));
                },
                complete: function () {
                    $('.loading').remove();
                }
            });
        }
    });

}

var passportAdd = function (data, url, action) {
    var UPDATE = 'update';
    setBaseUrl(url);
    var edit = -1;
    var incr = 0;
    var _nam = 'passport';
    var _ppTable = '#' + _nam + '-table';
    var _ppForm = '#' + _nam + '-form';
    var _invoiceForm = '#invoice-form';

    $(document).ready(function () {
        setDatePicker('.datepickr');
        resetForm(_ppForm);
        resetForm(_invoiceForm);
        resetTable(_ppTable);
        if (action == UPDATE) {
            editForm();
        }
        updateChosen('select');
    });

    function editForm(_inv_id) {
        var _cor_id = '';
        $(data).each(function (index, item) {
            _cor_id = item.corporation_id;
            var _tr = generateRow(item, incr);
            $(_ppTable + ' tbody').append(_tr);
            incr++;
        });
        $('#corporation').val(_cor_id);
        if (typeof (_inv_id) != 'undefined') {
            $('#deposit_no').val(_inv_id);
        }
        $(_ppTable + ' #no-data').hide();
        updateChosen('select');
    }

    $(document).on('change', '#deposit_no', function (e) {
        var _inv_id = $(this).val();
        if (_inv_id == '')
            redirect(url);
        var _edit_url = url + '/edit_passport';
        var _data = remotePost(_edit_url, {'id': _inv_id});
        clearForm();
        if (typeof (_data.invoice_id) != 'undefined') {
            data = _data.passports;
            $('input[type="hidden"][name="invoice_id"]').val(_data.invoice_id);
            $('input[type="radio"][name="invoice\\[invoice_type\\]"][value="' + _data.invoice_type + '"]').prop('checked', true);
            changeInvoiceType();
            $('input[type="text"][name="invoice\\[deposit\\]"]').val(_data.deposit);
            $('input[type="checkbox"][name="invoice\\[invoice_pay_sleep\\]"][value="' + _data.invoice_pay_sleep + '"]').prop('checked', true);
            editForm(_inv_id);
        }
    })

    $(document).on('click', 'input[name="invoice\\[invoice_type\\]"]', function (e) {
        changeInvoiceType();
    });

    function changeInvoiceType() {
        var _obj = $('input[name="invoice\\[invoice_type\\]"]:checked');
        var _depo = $('input[type="text"][name="invoice\\[deposit\\]"]');
        _depo.val('').removeClass('required');
        $('#deposit').addClass('hidden');
        if (_obj.val() == 0) {
            $('#deposit').removeClass('hidden');
            _depo.addClass('required');
        }
    }

    $(document).on('click', '.btn-passport-add', function (e) {
        e.preventDefault();
        var _th = $(this);
        if (valid(_ppForm) == 0) {
            var _data = $(_ppForm).serializeArray();
            var tmp = {};
            var _si = 0;
            for (var _ind = 0; _ind < _data.length; _ind++) {
                var _row = _data[_ind]
                var _nam = _row.name;
                if (_nam != '') {
                    var _val = _row.value;
                    tmp[_nam] = _val;
                }
            }
            if (edit >= 0) {
                var _cus_id = 0;
                if (typeof (data[edit].customer_id) != 'undefined') {
                    _cus_id = data[edit].customer_id;
                }
                tmp['customer_id'] = _cus_id;
                data[edit] = tmp;
                var _tr = generateRow(tmp, edit);
                $(_ppTable + ' tbody tr[data-index="' + edit + '"]').replaceWith(_tr);
            } else {
                data.push(tmp);
                var _tr = generateRow(tmp, incr);
                $(_ppTable + ' tbody').append(_tr);
                incr++;
            }
            $(_ppTable + ' #no-data').hide();
            resetPassportForm();
        }
    });

    function resetPassportForm() {
        edit = -1;
        var _eleCor = '#corporation';
        var _cor = $(_eleCor).val();
        resetForm(_ppForm);
        $(_eleCor).val(_cor);
        updateChosen(_eleCor);
    }

    $(document).on('click', '.btn-passport-edit', function (e) {
        var _index = $(this).attr('data-index');
        edit = -1;
        if (typeof (data[_index] != 'undefined')) {
            edit = _index;
            var _row = data[_index];

            $('select[name="corporation_id"]').val(_row.corporation_id);
            $('input[name="first_name"]').val(_row.first_name);
            $('input[name="last_name"]').val(_row.last_name);
            $('select[name="sex"]').val(_row.sex);
            $('input[name="dob"]').val(_row.dob);
            $('input[name="passport"]').val(_row.passport);

            $('input[name="national_id"]').val(_row.national_id);
            $('input[name="passport_expire"]').val(_row.passport_expire);
            $('input[name="price"]').val(_row.price);
            $('input[name="phone"]').val(_row.phone);
            $('input[name="nationality"]').val(_row.nationality);
            $('textarea[name="address"]').val(_row.address);

            $('input[name="build_net"]').val(_row.build_net);
            $('select[name="supplier_id"]').val(_row.supplier_id);
            $('textarea[name="build_memo"]').val(_row.build_memo);

            updateChosen('select');
        }
    });

    $(document).on('click', '.btn-passport-reset', function (e) {
        resetPassportForm();
    });

    function generateRow(data, index) {
        console.log(data);
        var _tr = "<tr data-index='" + index + "'>";
        var _act = '<div class="btn-action">';
        _act += '	<a data-index="' + index + '" class="btn btn-primary btn-xs btn-passport-edit"><i class="fa fa-edit"></i></a>';
        _act += '</div>';
        _tr += generateColumn(index + 1);
        _tr += generateColumn(getDropdownTextBy('corporation_id', data.corporation_id));
        _tr += generateColumn(getDropdownTextBy('supplier_id', data.supplier_id));
        _tr += generateColumn(data.first_name);
        _tr += generateColumn(data.last_name);
        _tr += generateColumn(data.sex == 'f' ? 'Female' : 'Male');
        _tr += generateColumn(data.dob);
        _tr += generateColumn(data.passport);
        _tr += generateColumn(data.passport_expire);
        _tr += generateColumn(data.national_id);
        _tr += generateColumn(data.phone);
        _tr += generateColumn(data.nationality);
        var _price = parseFloat(data.price);
        var _net = parseFloat(data.build_net);
        var _profit = _price - _net;
        _tr += generateColumn(_price);
        _tr += generateColumn(_net);
        _tr += generateColumn(_profit + _act);
        _tr += "</tr>";
        return _tr;
    }

    //todo save
    $(document).on('click', '.btn-passport-print', function (e) {
        e.preventDefault();
        //$.post(url+'/print_visa',{},function(res){
        //	printReport(res.page);
        //},'json');
        //return;
        if (data.length == 0) {
            var _msg = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Please add ticket!</div>';
            $('#msg-error').html(_msg);
        } else if (valid(_invoiceForm) == 0) {
            $('input[type="hidden"][name="dateCreated"]').val(getCurrentDate());
            var _frm = $(_invoiceForm);
            var _data = _frm.serializeArray();
            var _obj = {name: "passports", value: JSON.stringify(data)};
            _data.push(_obj);
            _data.push({name: 'invoice[corporation_id]', value: $('#corporation').val()})

            $.ajax({
                type: 'post',
                url: _frm.attr('data-action'),
                data: _data,
                dataType: 'json',
                beforeSend: function () {
                    $(_invoiceForm).append('<div class="loading"></div>');
                },
                success: function (res) {
                    var _msg = $('#msg-error');
                    if (res.result == 'ok') {
                        _msg.html(res.msg);
//                        setInterval(function () {
//                            redirect(url);
//                        }, 2000);
//                        printReport(res.page);
                        //clearForm();
                        clearForm();
                        setTimeout(function () {
                            _msg.html('');
                        }, 5000);
                        modalPrint('Print Passport',res.page, function(){
                            $('#btn-cancel-modal').attr('href',getBaseUrl());
                            $('#btn-print-modal')
                                    .attr('data-action','print_passport')
                                    .attr('data-id',res.return_id);
                        });
                    }
                    if (res.result == 'error') {
                        _msg.html(res.msg);
                    }
                    isDenyOrLogin(res, $('#msg-error'));
                },
                complete: function () {
                    $('.loading').remove();
                }
            });
        }
    });

    //todo save
    $(document).on('click', '.btn-passport-update', function (e) {
        e.preventDefault();
        if (valid(_ppForm) == 0) {
            $('input[type="hidden"][name="dateCreated"]').val(getCurrentDate());
            var _frm = $(_ppForm);
            var _data = _frm.serializeArray();
            $.ajax({
                type: 'post',
                url: _frm.attr('data-action'),
                data: _data,
                dataType: 'json',
                beforeSend: function () {
                    _frm.append('<div class="loading"></div>');
                },
                success: function (res) {
                    var _msg = $('#msg-error');
                    if (res.result == 'ok') {
                        _msg.html(res.msg);
                        setTimeout(function () {
                            redirect(url + '/np');
                        }, 1000);
                    }
                    if (res.result == 'error') {
                        _msg.html(res.msg);
                    }
                    isDenyOrLogin(res, $('#msg-error'));
                },
                complete: function () {
                    $('.loading').remove();
                }
            });
        }
    });

    function clearForm() {
        data = [];
        incr = 0;
        resetForm(_ppForm);
        resetForm(_invoiceForm);
        resetTable(_ppTable);
    }
}

var visaAdd = function (data, url, action) {
    console.log(data);
    var UPDATE = 'update';
    setBaseUrl(url);
    var edit = -1;
    var incr = 0;
    var _nam = 'visa';
    var _visaTable = '#' + _nam + '-table';
    var _visaForm = '#' + _nam + '-form';
    var _invoiceForm = '#invoice-form';
    $(document).ready(function () {
        setDatePicker('.datepickr');
        resetForm(_visaForm);
        resetForm(_invoiceForm);
        resetTicketTable();
        if (action == UPDATE) {
            editForm();
        }
        updateChosen('select');
        //setInterval(getNoTicketNumber,5000);
    });

    function editForm(_inv_id) {
        var _cor_id = '';
        $(data).each(function (index, item) {
            _cor_id = item.corporation_id;
            var _tr = generateRow(item, incr);
            $(_visaTable + ' tbody').append(_tr);
            incr++;
        });
        $('#corporation').val(_cor_id);
        if (typeof (_inv_id) != 'undefined') {
            $('#deposit_no').val(_inv_id);
        }
        updateChosen('select');
        $(_visaTable + ' #no-data').hide();
        updateDropdown($('select[name="corporation_id"]'));
    }

    $(document).on('change', '#customer', function (e) {
        var _cus = $(this).val();
        var _cor = $('select[name="corporation_id"]').val();

        var _url = url + '/get_customer_by';
        var _data = remotePost(_url, {id: _cus});
        var _cor = '';
        var _fn = '';
        var _ln = '';
        var _sex = '';
        var _dob = '';
        var _pp = '';
        if (typeof (_data.customer_id) != 'undefined') {
            _cor = _data.corporation_id;
            _fn = _data.first_name;
            _ln = _data.last_name;
            _sex = _data.sex;
            _dob = _data.dob;
            _pp = _data.passport;
        }
        $('input[name="first_name"]').val(_fn);
        $('input[name="last_name"]').val(_ln);
        $('select[name="sex"]').val(_sex);
        $('input[name="dob"]').val(_dob);
        $('input[name="passport"]').val(_pp);
        $('select[name="corporation_id"]').val(_cor);
        updateDropdown($('select[name="corporation_id"]'));
        $('#customer').val(_cus);

        updateChosen('select');
    });

    $(document).on('change', '#deposit_no', function (e) {
        var _inv_id = $(this).val();
        if (_inv_id == '')
            redirect(url);
        var _edit_url = url + '/edit_visa';
        var _data = remotePost(_edit_url, {'id': _inv_id});
        clearForm();
        if (typeof (_data.invoice_id) != 'undefined') {
            data = _data.visas;
            $('input[type="hidden"][name="invoice_id"]').val(_data.invoice_id);
            $('input[type="radio"][name="invoice\\[invoice_type\\]"][value="' + _data.invoice_type + '"]').prop('checked', true);
            changeInvoiceType();
            $('input[type="text"][name="invoice\\[deposit\\]"]').val(_data.deposit);
            $('input[type="checkbox"][name="invoice\\[invoice_pay_sleep\\]"][value="' + _data.invoice_pay_sleep + '"]').prop('checked', true);
            editForm(_inv_id);
        }
    })

    $(document).on('change', 'select[name="corporation_id"]', function (e) {
        var _th = $(this);
        var _cor = _th.val();
        updateDropdown($('select[name="corporation_id"]'));
        clearForm();
        _th.val(_cor);
        updateChosen('#corporation');
    });

    $(document).on('click', 'input[name="invoice\\[invoice_type\\]"]', function (e) {
        changeInvoiceType();
    });

    function changeInvoiceType() {
        var _obj = $('input[name="invoice\\[invoice_type\\]"]:checked');
        var _depo = $('input[type="text"][name="invoice\\[deposit\\]"]');
        _depo.val('').removeClass('required');
        $('#deposit').addClass('hidden');
        if (_obj.val() == 0) {
            $('#deposit').removeClass('hidden');
            _depo.addClass('required');
        }

    }

    $(document).on('click', '.btn-visa-add', function (e) {
        e.preventDefault();
        var _th = $(this);
        if (valid(_visaForm) == 0) {
            var _data = $(_visaForm).serializeArray();
            var tmp = {};
            var _si = 0;
            for (var _ind = 0; _ind < _data.length; _ind++) {
                var _row = _data[_ind]
                var _nam = _row.name;
                if (_nam != '') {
                    var _val = _row.value;
                    tmp[_nam] = _val;
                }
            }
            if (edit >= 0) {
                var _visa_id = 0;
                if (typeof (data[edit].visa_id) != 'undefined') {
                    _visa_id = data[edit].visa_id;
                }
                tmp['visa_id'] = _visa_id;
                data[edit] = tmp;
                var _tr = generateRow(tmp, edit);
                $(_visaTable + ' tbody tr[data-index="' + edit + '"]').replaceWith(_tr);
            } else {
                data.push(tmp);
                var _tr = generateRow(tmp, incr);
                $(_visaTable + ' tbody').append(_tr);
                incr++;
            }
            $(_visaTable + ' #no-data').hide();
            resetVisaForm();
        }
    });

    function resetVisaForm() {
        edit = -1;
        var _eleCor = '#corporation';
        var _cor = $(_eleCor).val();
        resetForm(_visaForm);
        $(_eleCor).val(_cor);
        updateChosen(_eleCor);
    }

    $(document).on('click', '.btn-visa-edit', function (e) {
        var _index = $(this).attr('data-index');
        edit = -1;
        if (typeof (data[_index] != 'undefined')) {
            edit = _index;
            var _row = data[_index];

            $('input[name="first_name"]').val(_row.first_name);
            $('input[name="last_name"]').val(_row.last_name);
            $('select[name="sex"]').val(_row.sex);
            $('input[name="dob"]').val(_row.dob);
            $('input[name="passport"]').val(_row.passport);
            $('select[name="customer_id"]').val(_row.customer_id);

            $('input[name="issueing_post"]').val(_row.issueing_post);
            $('input[name="visa_number"]').val(_row.visa_number);
            $('input[name="entries"]').val(_row.entries);
            $('input[name="issue_date"]').val(_row.issue_date);
            $('input[name="expiry_date"]').val(_row.expiry_date);

            $('input[name="price"]').val(_row.price);
            $('input[name="visa_type"]').val(_row.visa_type);
            $('input[name="length_of_stay"]').val(_row.length_of_stay);
            $('textarea[name="remarks"]').val(_row.remarks);

            $('input[name="build_net"]').val(_row.build_net);
            $('select[name="supplier_id"]').val(_row.supplier_id);
            $('textarea[name="build_memo"]').val(_row.build_memo);

            updateChosen('select');
        }
    })

    $(document).on('click', '.btn-visa-reset', function (e) {
        resetVisaForm();
    });

    function generateRow(data, index) {
        console.log(data);
        var _tr = "<tr data-index='" + index + "'>";
        var _act = '<div class="btn-action">';
        _act += '	<a data-index="' + index + '" class="btn btn-primary btn-xs btn-visa-edit"><i class="fa fa-edit"></i></a>';
        _act += '</div>';
        _tr += generateColumn(index + 1);
        _tr += generateColumn(getDropdownTextBy('corporation_id', data.corporation_id));
        _tr += generateColumn(getDropdownTextBy('supplier_id', data.supplier_id));
        _tr += generateColumn(data.first_name);
        _tr += generateColumn(data.last_name);
        _tr += generateColumn(data.sex == 'f' ? 'Female' : 'Male');
        _tr += generateColumn(data.dob);
        _tr += generateColumn(data.passport);
        _tr += generateColumn(data.visa_number);
        _tr += generateColumn(data.visa_type);
        _tr += generateColumn(data.issueing_post);
        _tr += generateColumn(data.issue_date);
        _tr += generateColumn(data.expiry_date);
        var _price = parseFloat(data.price);
        var _net = parseFloat(data.build_net);
        var _profit = _price - _net;
        _tr += generateColumn(_price);
        _tr += generateColumn(_net);
        _tr += generateColumn(_profit + _act);
        _tr += "</tr>";
        return _tr;
    }

    //todo save
    $(document).on('click', '.btn-visa-print', function (e) {
        e.preventDefault();
        //$.post(url+'/print_visa',{},function(res){
        //	printReport(res.page);
        //},'json');
        //return;
        if (data.length == 0) {
            var _msg = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Please add ticket!</div>';
            $('#msg-error').html(_msg);
        } else if (valid(_invoiceForm) == 0) {
            $('input[type="hidden"][name="dateCreated"]').val(getCurrentDate());
            var _frm = $(_invoiceForm);
            var _data = _frm.serializeArray();
            var _obj = {name: "visas", value: JSON.stringify(data)};
            _data.push(_obj);
            _data.push({name: 'invoice[corporation_id]', value: $('#corporation').val()})

            $.ajax({
                type: 'post',
                url: _frm.attr('data-action'),
                data: _data,
                dataType: 'json',
                beforeSend: function () {
                    $(_invoiceForm).append('<div class="loading"></div>');
                },
                success: function (res) {
                    var _msg = $('#msg-error');
                    if (res.result == 'ok') {
                        _msg.html(res.msg);
                        //setInterval(function () {
                        //    redirect(url);
                        //}, 2000);
                        //printReport(res.page);
                        clearForm();
                        setTimeout(function () {
                            _msg.html('');
                            
                        }, 5000);
                        modalPrint('Print Visa',res.page, function(){
                            $('#btn-cancel-modal').attr('href',getBaseUrl());
                            $('#btn-print-modal')
                                    .attr('data-action','print_visa')
                                    .attr('data-id',res.return_id);
                        });
                    }
                    if (res.result == 'error') {
                        _msg.html(res.msg);
                    }
                    isDenyOrLogin(res, $('#msg-error'));
                },
                complete: function () {
                    $('.loading').remove();
                }
            });
        }
    });

    //todo save
    $(document).on('click', '.btn-visa-update', function (e) {
        e.preventDefault();
        if (valid(_visaForm) == 0) {
            $('input[type="hidden"][name="dateCreated"]').val(getCurrentDate());
            var _frm = $(_visaForm);
            var _data = _frm.serializeArray();
            $.ajax({
                type: 'post',
                url: _frm.attr('data-action'),
                data: _data,
                dataType: 'json',
                beforeSend: function () {
                    _frm.append('<div class="loading"></div>');
                },
                success: function (res) {
                    var _msg = $('#msg-error');
                    if (res.result == 'ok') {
                        _msg.html(res.msg);
                        setTimeout(function () {
                            redirect(url + '/nv');
                        }, 1000);
                    }
                    if (res.result == 'error') {
                        _msg.html(res.msg);
                    }
                    isDenyOrLogin(res, $('#msg-error'));
                },
                complete: function () {
                    $('.loading').remove();
                }
            });
        }
    });
    function clearForm() {
        data = [];
        incr = 0;
        resetForm(_visaForm);
        resetForm(_invoiceForm);
        resetTicketTable();
    }
    function resetTicketTable() {
        $(_visaTable + ' tbody tr:not(:first)').remove();
        $(_visaTable + ' tbody tr#no-data').show();
    }
}

var noTicketNumber = function (url) {
    setBaseUrl(url);
}

//todo create page build payment
var paymentAdd = function (url, action) {
    var UPDATE = 'update';
    setBaseUrl(url);
    gl_name = 'payment';

    $(document).ready(function () {
        setDatePicker('.datepickr');
        if (action != UPDATE) {
            resetPaymentForm();
        }
    });

    $(document).on('click', '#bp-table .collapse', function (e) {
        e.stopPropagation();
    });

    $(document).on('change', '#category', function (e) {
        e.preventDefault();
        var _th = $(this);
        var _cat_id = _th.val();
        var _cat_name = $('#category option[value="' + _cat_id + '"]').text();

        resetPaymentForm();
        _th.val(_cat_id);        
        
        var ele = '#invoice';
        $(ele + ' option[value!=""][value!=0]').remove();
        if (_cat_id != '') {
            var _link = getBaseUrl() + '/get_invoices_by_category';
            var data = remotePost(_link, {"id": _cat_id});
            if (data) {
                $('#viewer').html(data.page);
                for (var ind = 0; ind < data.dropdown.length; ind++) {
                    var row = data.dropdown[ind];
                    var opt = new Option(row.invoice_no, row.invoice_id);
                    $(ele).append($(opt));
                }
            }
        }
        jQuery('select').trigger("chosen:updated");
    });

    $(document).on('change', '#invoice', function () {
        var _th = $(this);
        var _url_remote = url + '/get_invoice_by';
        var _invoice = _th.val();
        var _cat = $('#category').val();        
        var _data = remotePost(_url_remote, {'category': _cat, 'invoice': _invoice});        
        var _price = 0.0;        
        
        if (typeof (_data.build_net) != 'undefined') {
            _price = parseFloat(_data.build_net);            
        }
        if (typeof (_data.page) != 'undefined') {
            $('#viewer').html(_data.page);
        }

        $('#price').html(_price);
        $('input[name="payment\\[amount\\]"]').val(0);
        $('textarea[name="payment\\[memo\\]"]').val('');
        
        jQuery('select').trigger("chosen:updated");
    });

    $(document).on('click', '.btn-payment-cancel', function () {
        redirect(url);
    });
    function resetPaymentForm() {
        $('#payment-form')[0].reset();        
        $('#price').html('0.0');
        resetTicketTable();
        $(".datepickr").datepicker("setDate", new Date());
        jQuery('select').trigger("chosen:updated");
    }

    function resetTicketTable() {
        $('#ticket-table tbody tr:not(:first)').remove();
        $('#ticket-table tbody tr#no-data').show();
    }

    $(document).on('click', '.btn-payment-save', function (e) {
        e.preventDefault();
        $('input[type="hidden"][name="dateCreated"]').val(getCurrentDate());
        var _formId = '#payment-form';
        if (valid(_formId) == 0) {
            $()
            var _frm = $(_formId);
            $.ajax({
                type: 'post',
                url: _frm.attr('data-action'),
                data: _frm.serialize(),
                dataType: 'json',
                beforeSend: function () {
                    $(_formId).append('<div class="loading"></div>');
                },
                success: function (res) {
                    var _msg = $('#msg-error');
                    if (res.result == 'ok') {
                        _msg.html(res.msg);
                        setTimeout(function () {
                            _msg.html('');
                        }, 5000);
                        if (action == UPDATE) {
                            redirect(url + '/blist');
                        } else {
                            redirect(url);
                        }
                    }
                    if (res.result == 'error') {
                        _msg.html(res.msg);
                    }
                    isDenyOrLogin(res, $('#msg-error'));
                },
                complete: function () {
                    $('.loading').remove();
                }
            });
        }
    });
}

var payment = function (url, data) {
    setBaseUrl(url);
    gl_name = 'payment';
    var frm = gl_name + '-form';
    var frmId = '#' + frm;
    var tblId = '#' + gl_name + '-table';
    $(document).ready(function () {
        setDatePicker('.datepickr');
        var dat = new Date();
        $('input[name="start_date"]').datepicker('setDate', dat);
        $('input[name="end_date"]').datepicker('setDate', dat);
        doSearch(getLinkSearch());
    });
    //todo search
    $(document).on('click', '.btn-search', function () {
        doSearch(getLinkSearch());
    });

    //todo edit row
    $(document).on('click', '.btn-edit', function () {
        var trs = $('.table-edit tbody tr.info');
        var _th = $(this);
        if (trs.length > 1) {
            modalAlert(CON_TITLE_WAR, CON_MSG_WHICH_ONE);
        } else {
            var _id = trs.attr('id');
            if (typeof (_id) != 'undefined') {
                var _act = _th.attr('data-action');
                var _edit_link = url + '/' + _act + '/' + _id;
                redirect(_edit_link);
            } else {
                modalAlert(CON_TITLE_WAR, CON_MSG_AT_LEAST_ONE);
            }
        }
    });

}
//todo create page supplier list
var receiveAdd = function (url, action, data_edit) {
    var UPDATE = 'update';
    setBaseUrl(url);
    gl_name = 'receive';

    $(document).ready(function () {
        setDatePicker('.datepickr');
        resetReceiveForm();
        switchTabs();
        if (action == UPDATE) {
            changeInvoiceByEdit($('select[name="receive\\[invoice_id\\]"]'));
            var _coa_id = typeof (data_edit.coa_id) != 'undefined' ? data_edit.coa_id : '';
            var _bank_name = typeof (data_edit.bank_name) != 'undefined' ? data_edit.bank_name : '';
            var _money = typeof (data_edit.money) != 'undefined' ? data_edit.money : '';
            $('#coa_id').val(_coa_id);
            $('#bank_name').val(_bank_name);
            $('#money').val(_money);
        } else {
            $('input[name="date"]').datepicker('setDate', new Date());
        }
        jQuery('select').trigger("chosen:updated");

        //doSearch(getLinkSearch());
    });

    $(document).on('click', '#tab-ticket a', function (e) {
        var _th = $(this);
        var _tab = _th.attr('data-tab');
        //todo reset tab content
        $('.tab-content .tab-pane').html('').removeClass('active');
        $('#' + _tab + '-type').prop('checked', true);
        $('#' + _tab).html(_tab).addClass('active');
        switchTabs();
    });

    $(document).on('change', '#category', function (e) {
        e.preventDefault();
        updateDropdown($(this));
    });

    function resetTabs() {
        $('#tab-ticket li').removeClass('active');
        $('#tab-ticket li:first').addClass('active');
        $('.tab-content .tab-pane').html('').removeClass('active');
        $('.tab-content .tab-pane:first').addClass('active');
    }

    function switchTabs() {
        var _obj = $('input[type="radio"][name="receive\\[type\\]"]:checked');
        var _type = _obj.val();
        var _url_post = url + '/switch_tab'
        var _html = remotePost(_url_post, {'type': _type}, 'html');
        $('.tab-content div.active').html(_html);
        jQuery('select[name="receive\\[coa_id\\]"]').chosen();
    }

    $(document).on('change', 'select[name="receive\\[invoice_id\\]"]', function () {
        changeInvoice($(this));
    });

    $(document).on('change', 'select[name="receive\\[cash_type\\]"]', function (e) {
        changeCashType();
    });

    $(document).on('click', '.btn-receive-cancel', function () {
        if (action == UPDATE) {
            redirect(url);
        } else {
            resetReceiveForm();
        }

    });

    function changeInvoice(_th) {
        var _rat = 3;
        var _id = _th.val();
        var _url_remote = url + '/get_invoice_by';
        var _data = remotePost(_url_remote, {'id': _id, 'category': $('#category').val()});

        resetReceiveForm();
        switchTabs();

        var _cor = '';
        var _price = 0.0;
        var _ct = 1;
        var _is_ser = false;
        var _ban = '';
        var _cat = '';
        if (typeof (_data.invoice_id) != 'undefined') {
            _cor = _data.corporation_id;
            _cat = _data.category_id;
            _price = _data.amount;
            _ct = _data.cash_type;
            _is_ser = _data.is_service > 0 ? true : false;
            var _type = (_data.type_name == null ? '' : _data.type_name).toLowerCase();
            if (_type == 'bank transfer' || _type == 'visa') {
                _ban = _data.bank_name;
                if (_is_ser) {
                    var _service = (_rat * _price) / 100;
                    _price += _service;
                }
            }
        }
        if (typeof (_data.items) != 'undefined') {
            var _itmes = _data.items;
            $('#viewer').html(_itmes);
        }

        $('#category').val(_cat);
        updateDropdown($('#category'));

        $('#invoice').val(_id);
        $('#corporation').val(_cor);
        $('#price').html(_price);
        $('input[name="receive\\[amount\\]"]').val(0);
        $('textarea[name="receive\\[memo\\]"]').val('');

        jQuery('select').trigger("chosen:updated");
    }

    function changeInvoiceByEdit(_th) {
        var _id = _th.val();
        var _url_remote = url + '/get_invoice_by';
        var _data = remotePost(_url_remote, {'id': _id});
        if (typeof (_data.tickets) != 'undefined') {
            var _tickets = _data.tickets;
            $('#viewer').html(_tickets);
        }
    }

    function changeCashType() {
        var _obj = $('select[name="receive\\[cash_type\\]"]');
        var _val = _obj.val();
        var _bank = $('input[name="receive\\[bank_name\\]"]');
        _bank.val('');
        _bank.attr('readonly', true);
        _bank.removeClass('required');
        if (_val != '') {
            var _txt = $('select[name="receive\\[cash_type\\]"] option[value="' + _val + '"]').text();
            _txt = _txt.toLowerCase();
            if (_txt == 'bank transfer' || _txt == 'visa') {
                _bank.attr('readonly', false);
                _bank.addClass('required');
            }
        }
    }

    function resetReceiveForm() {
        $('#price').html('0.0');
        resetForm('#receive-form');
        resetTabs();
        $(".datepickr").datepicker("setDate", new Date());
    }

    $(document).on('click', '.btn-receive-save', function (e) {
        e.preventDefault();
        var _formId = '#receive-form';
        if (valid(_formId) == 0) {
            $('input[type="hidden"][name="dateCreated"]').val(getCurrentDate());
            var _frm = $(_formId);
            $.ajax({
                type: 'post',
                url: _frm.attr('data-action'),
                data: _frm.serialize(),
                dataType: 'json',
                beforeSend: function () {
                    $(_formId).append('<div class="loading"></div>');
                },
                success: function (res) {
                    var _msg = $('#msg-error');
                    if (res.result == 'ok') {
                        _msg.html(res.msg);
                        setTimeout(function () {
                            _msg.html('');
                        }, 5000);

                        if (action == UPDATE) {
                            redirect(url + '/tlist');
                        } else {
                            redirect(url);
                        }
                    }
                    if (res.result == 'error') {
                        _msg.html(res.msg);
                    }
                    isDenyOrLogin(res, $('#msg-error'));
                },
                complete: function () {
                    $('.loading').remove();
                }
            });
        }
    });
}

//todo create page supplier list
var ticket = function (url, data) {
    setBaseUrl(url);
    var _nam = 'ticket';
    var frm = _nam + '-form';
    var frmId = '#' + frm;
    var tblId = '#' + _nam + '-table';
    $(document).ready(function () {
        setDatePicker('.datepickr');
        var dat = new Date();
        $('input[name="start_date"]').datepicker('setDate', dat);
        $('input[name="end_date"]').datepicker('setDate', dat);
        doSearch(getLinkSearch());
    });

    $(document).on('change', 'select[name="corporation_id"]', function (e) {
        updateDropdown($('select[name="corporation_id"]'));
    });

    //todo search
    $(document).on('click', '.btn-search', function () {
        doSearch(getLinkSearch());
    });

    //todo edit row
    $(document).on('click', '.btn-edit', function () {
        var trs = $('.table-edit tbody tr.info');
        var _th = $(this);
        if (trs.length > 1) {
            modalAlert(CON_TITLE_WAR, CON_MSG_WHICH_ONE);
        } else {
            var _id = trs.attr('id');
            if (typeof (_id) != 'undefined') {
                var _act = _th.attr('data-action');
                var _edit_link = url + '/' + _act + '/' + _id;
                redirect(_edit_link);
            } else {
                modalAlert(CON_TITLE_WAR, CON_MSG_AT_LEAST_ONE);
            }
        }
    });

}

var ticketAdd = function (data, url, url_to, action) {
    var UPDATE = 'update';
    setBaseUrl(url);
    var edit = -1;
    var incr = 0;
    var _nam = 'ticket';
    var _tableTicket = '#ticket-table';
    $(document).ready(function () {
        resetForm('#ticket-form');
        resetForm('#invoice-form');
        resetTicketTable();

        if (action == UPDATE) {
            editTicket();
        }
        setDatePicker('.datepickr');
        changeType();
        changeCashType();
        updateChosen('select');
        //setInterval(getNoTicketNumber,5000);
    });

    $(document).on('click', '.btn-ticket-edit', function (e) {
        var _index = $(this).attr('data-index');
        edit = -1;
        if (typeof (data[_index] != 'undefined')) {
            edit = _index;
            var _row = data[_index];
            var _way = _row.way;
            $('.switch-form label[data-type="' + _way + '"]').click();

            $('select[name="customer_id"]').val(_row.customer_id);

            if (_way == 0) {
                $('input[name="date_arrive"]').val(_row.date_arrive);
                $('select[name="airline_from"]').val(_row.airline_from);
                $('input[name="flight_from"]').val(_row.flight_from);
            } else {
                $('input[type="radio"][name="type"][value="' + _row.type + '"]').click();
                changeType();
            }

            $('input[name="date_departure"]').val(_row.date_departure);
            $('select[name="airline_to"]').val(_row.airline_to);


            $('input[name="ticket_number"]').val(_row.ticket_number);
            $('input[name="flight_to"]').val(_row.flight_to);


            $('input[name="price"]').val(_row.price);
            $('input[name="length_of_stay"]').val(_row.length_of_stay);
            $('textarea[name="memo"]').val(_row.memo);

            $('input[name="build_net"]').val(_row.build_net);
            $('select[name="supplier_id"]').val(_row.supplier_id);
            $('textarea[name="build_memo"]').val(_row.build_memo);

            updateChosen('select');
        }
    });

    function editTicket(_inv_id) {
        var _cor_id = '';
        $(data).each(function (index, item) {
            _cor_id = item.corporation_id;            
            var _tr = generateRow(item, incr);
            $(_tableTicket + ' tbody').append(_tr);
            incr++;
        });
        $('#corporation').val(_cor_id);
        if (typeof (_inv_id) != 'undefined') {
            $('#deposit_no').val(_inv_id);
        }
        updateChosen('select');
        $(_tableTicket + ' #no-data').hide();
        updateDropdown($('select[name="corporation_id"]'));
    }

    $(document).on('change', 'select[name="customer_id"]', function (e) {
        var _cus = $(this).val();
        var _cor = $('select[name="corporation_id"]').val();
        if (_cor == '') {
            var _url = url + '/get_customer_by';
            var _data = remotePost(_url, {id: _cus});
            var _cor = '';
            if (typeof (_data.customer_id) != 'undefined') {
                _cor = _data.corporation_id;
            }
            $('select[name="corporation_id"]').val(_cor);
            jQuery('select[name="corporation_id"]').trigger("chosen:updated");
        }
    });

    $(document).on('change', '#deposit_no', function (e) {
        var _inv_id = $(this).val();
        var _edit_url = url + '/edit_ticket';
        var _data = remotePost(_edit_url, {'id': _inv_id});
        clearForm();
        if (typeof (_data.invoice_id) != 'undefined') {
            data = _data.tickets;
            $('input[type="hidden"][name="invoice_id"]').val(_data.invoice_id);
            $('input[type="radio"][name="invoice\\[invoice_type\\]"][value="' + _data.invoice_type + '"]').prop('checked', true);
            changeInvoiceType();
            $('input[type="text"][name="invoice\\[deposit\\]"]').val(_data.deposit);
            $('input[type="checkbox"][name="invoice\\[invoice_pay_sleep\\]"][value="' + _data.invoice_pay_sleep + '"]').prop('checked', true);
            editTicket(_inv_id);
        }
    });

    $(document).on('change', 'select[name="corporation_id"]', function (e) {
        var _th = $(this);
        var _cor = _th.val();
        updateDropdown($('select[name="corporation_id"]'));
        clearForm();
        _th.val(_cor);
        updateChosen('#corporation');
    });

    $(document).on('click', 'input[type="radio"][name="type"]', function (e) {
        changeType();
    });

    $(document).on('click', '.switch-form label', function (e) {
        var _th = $(this);
        switchForm(_th);
    });

    function switchForm(_th) {
        switchClass('.switch-form label', 'btn-success', 'btn-default');
        switchClass(_th, 'btn-default', 'btn-success');
        var _type = _th.attr('data-type');
        var _title = _th.attr('data-title');
        var _url = url + '/switch_form/' + _type;
        var _html = remotePost(_url, {}, 'html');
        $('#switch-form-title').html(_title);
        $('#switch-form').html(_html);
        setDatePicker('.datepickr');
        jQuery('select').chosen({disable_search_threshold: 5})//;

        changeType();
    }

    function switchClass(ele, oldClass, newClass) {
        $(ele).removeClass(oldClass).addClass(newClass);
    }

    $(document).on('change', 'select[name="invoice\\[cash_type\\]"]', function (e) {
        changeCashType();
    });

    function changeCashType() {
        var _obj = $('select[name="invoice\\[cash_type\\]"]');
        var _val = _obj.val();
        var _bank = $('input[name="invoice\\[bank_name\\]"]');
        _bank.val('');
        _bank.attr('readonly', true);
        _bank.removeClass('required');
        if (_val != '') {
            var _txt = $('select[name="invoice\\[cash_type\\]"] option[value="' + _val + '"]').text();
            _txt = _txt.toLowerCase();
            if (_txt == 'bank transfer' || _txt == 'visa') {
                _bank.attr('readonly', false);
                _bank.addClass('required');
            }
        }
    }

    function changeType() {
        var _obj = $('input[type="radio"][name="type"]:checked');
        var _dat = 'Departure';
        var _sup = 'To';
        var _fli = _sup;
        if (_obj.val() == 1) {
            _dat = 'Arrive';
            _sup = 'From';
            _fli = _sup;
        }
        $('#span-date').html(_dat);
        $('#span-supplier').html(_sup);
        $('#span-flight').html(_fli);
    }

    $(document).on('click', 'input[name="invoice\\[invoice_type\\]"]', function (e) {
        changeInvoiceType();
    });

    function changeInvoiceType() {
        var _obj = $('input[name="invoice\\[invoice_type\\]"]:checked');
        var _depo = $('input[type="text"][name="invoice\\[deposit\\]"]');
        _depo.val('').removeClass('required');
        $('#deposit').addClass('hidden');
        if (_obj.val() == 0) {
            $('#deposit').removeClass('hidden');
            _depo.addClass('required');
        }

    }
    $(document).on('click', '.btn-ticket-add', function (e) {
        e.preventDefault();
        var _th = $(this);
        var _formTicket = '#ticket-form';
        if (valid(_formTicket) == 0) {
            var _data = $(_formTicket).serializeArray();
            var tmp = {};
            var _si = 0;
            for (var _ind = 0; _ind < _data.length; _ind++) {
                var _row = _data[_ind]
                var _nam = _row.name;
                if (_nam != '') {
                    var _val = _row.value;
                    tmp[_nam] = _val;
                }
            }

            if (edit >= 0) {
                var _tid = 0;
                if (typeof (data[edit].ticket_id) != 'undefined') {
                    _tid = data[edit].ticket_id;
                }
                tmp['ticket_id'] = _tid;
                data[edit] = tmp;
                var _tr = generateRow(tmp, edit);
                $(_tableTicket + ' tbody tr[data-index="' + edit + '"]').replaceWith(_tr);
            } else {
                data.push(tmp);
                var _tr = generateRow(tmp, incr);
                $(_tableTicket + ' tbody').append(_tr);
                incr++;
            }
            $(_tableTicket + ' #no-data').hide();
            resetTicketForm();
        }
    });

    function resetTicketForm() {
        var _eleCor = '#corporation';
        var _cor = $(_eleCor).val();
        resetForm('#ticket-form');
        $(_eleCor).val(_cor);
        updateChosen(_eleCor);
    }
    function updateChosen(ele) {
        jQuery(ele).trigger('chosen:updated');
    }

    $(document).on('click', '.btn-ticket-reset', function (e) {
        resetTicketForm();
    });

    function generateRow(data, index) {
        var _tr = "<tr data-index='" + index + "'>";
        var _act = '<div class="btn-action">';
        _act += '	<a data-index="' + index + '" class="btn btn-primary btn-xs btn-ticket-edit"><i class="fa fa-edit"></i></a>';
        _act += '</div>';
        //_tr += generateColumn(_chk);
        _tr += generateColumn(index + 1);
        _tr += generateColumn(getDropdownTextBy('corporation_id', data.corporation_id));
        _tr += generateColumn(getDropdownTextBy('customer_id', data.customer_id));        
        _tr += generateColumn(data.ticket_number);
        _tr += generateColumn(getDropdownTextBy('airline_to', data.airline_to));
        _tr += generateColumn(data.flight_to);
        _tr += generateColumn(data.date_departure);
        _tr += generateColumn(data.flight_from);
        _tr += generateColumn(data.date_arrive);
        var _price = parseFloat(data.price);
        var _net = parseFloat(data.build_net);
        var _profit = _price - _net;
        _tr += generateColumn(_price);
        _tr += generateColumn(_net);
        _tr += generateColumn(_profit + _act);
        _tr += "</tr>";
        return _tr;
    }

    $(document).on('click', '#case', function () {
        var _is_checked = $(this).prop('checked');
        $('.select-all').prop('checked', _is_checked);
    });

    //todo save
    $(document).on('click', '.btn-ticket-print', function (e) {
        e.preventDefault();
        //$.post(url+'/print_ticket',{},function(res){
        //	printReport(res.page);
        //},'json');
        //return;
        var _formId = '#invoice-form';
        var _chk = '#invoice-form .select-all:checked';
        var _len_checked = $(_chk).length;

        if (data.length == 0) {
            var _msg = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Please add ticket!</div>';
            $('#msg-error').html(_msg);
        } else if (valid(_formId) == 0) {
            $('input[type="hidden"][name="dateCreated"]').val(getCurrentDate());
            var _frm = $(_formId);
            var _data = _frm.serializeArray();
            var _obj = {name: "tickets", value: JSON.stringify(data)};
            _data.push(_obj);
            _data.push({name: 'invoice[corporation_id]', value: $('#corporation').val()})

            $.ajax({
                type: 'post',
                url: _frm.attr('data-action'),
                data: _data,
                dataType: 'json',
                beforeSend: function () {
                    $('#ticket-form').append('<div class="loading"></div>');
                },
                success: function (res) {
                    var _msg = $('#msg-error');
                    if (res.result == 'ok') {
                        _msg.html(res.msg);
                        clearForm();
                        setTimeout(function () {
                            _msg.html('');
                        }, 5000);
//                        setInterval(function () {
//                            redirect(url_to);
//                            ;
//                        }, 2000);
                        modalPrint('Print Ticket',res.page, function(){
                            $('#btn-cancel-modal').attr('href',getBaseUrl());
                            $('#btn-print-modal')
                                    .attr('data-action','print_ticket')
                                    .attr('data-id',res.return_id);
                        });

                    }
                    if (res.result == 'error') {
                        _msg.html(res.msg);
                    }
                    isDenyOrLogin(res, $('#msg-error'));
                },
                complete: function () {
                    $('.loading').remove();
                }
            });
        }
    });

    //todo save
    $(document).on('click', '.btn-ticket-update', function (e) {
        e.preventDefault();
        if (valid(_formId) == 0) {
            $('input[type="hidden"][name="dateCreated"]').val(getCurrentDate());
            var _formId = '#ticket-form';
            var _frm = $(_formId);
            var _data = _frm.serializeArray();
            $.ajax({
                type: 'post',
                url: _frm.attr('data-action'),
                data: _data,
                dataType: 'json',
                beforeSend: function () {
                    _frm.append('<div class="loading"></div>');
                },
                success: function (res) {
                    var _msg = $('#msg-error');
                    if (res.result == 'ok') {
                        _msg.html(res.msg);
                        setTimeout(function () {
                            redirect(url + '/nt');
                        }, 2000);
                    }
                    if (res.result == 'error') {
                        _msg.html(res.msg);
                    }
                    isDenyOrLogin(res, $('#msg-error'));
                },
                complete: function () {
                    $('.loading').remove();
                }
            });
        }
    });
    function clearForm() {
        data = [];
        incr = 0;
        resetForm('#ticket-form');
        resetForm('#invoice-form');
        resetTicketTable();
    }
    function resetTicketTable() {
        $('#ticket-table tbody tr:not(:first)').remove();
        $('#ticket-table tbody tr#no-data').show();
    }
}

//todo create page supplier list
var supplier = function (url, type, ptitle) {
    setBaseUrl(url);
    gl_name = type;
    var frm = gl_name + '-form';
    var frmId = '#' + frm;
    var tblId = '#' + gl_name + '-table';
    $(document).ready(function () {
        setDatePicker('.datepicker');
        $("input[name=date]").datepicker("setDate", new Date());
        $("input[name=start_date]").datepicker("setDate", new Date());
        $("input[name=end_date]").datepicker("setDate", new Date());
        doSearch(getLinkSearch());
    });
    //todo search
    $(document).on('click', '.btn-search', function () {
        doSearch(getLinkSearch());
    });

    //todo edit row
    $(document).on('click', '.btn-add', function () {
        var th = $(this);
        var _act = th.attr('data-action');
        var _add_link = url + '/' + _act;
        var _frm = remotePost(_add_link, {}, 'html');
        modalForm(ptitle, _frm, function () {
            $('form' + frmId).attr('data-action', getBaseUrl() + "/save");
            setDatePicker('.datepickr');
        });
    });

    //todo edit row
    $(document).on('click', '.btn-edit', function () {
        var trs = $('.table-edit tbody tr.info');
        var _th = $(this);
        if (trs.length > 1) {
            modalAlert(CON_TITLE_WAR, CON_MSG_WHICH_ONE);
        } else {
            var _id = trs.attr('id');
            if (typeof (_id) != 'undefined') {
                var _act = _th.attr('data-action');
                var _add_link = url + '/' + _act;
                var _frm = remotePost(_add_link, {'id': _id}, 'html');
                modalForm(ptitle, _frm, function () {
                    $('form' + frmId).attr('data-action', getBaseUrl() + "/update");
                    setDatePicker('.datepickr');
                });
            } else {
                modalAlert(CON_TITLE_WAR, CON_MSG_AT_LEAST_ONE);
            }
        }
    });
}













//MARY
//todo create page supplier list
var branch = function (url, type, ptitle) {
    setBaseUrl(url);
    gl_name = type;
    var frm = gl_name + '-form';
    var frmId = '#' + frm;
    var tblId = '#' + gl_name + '-table';
    $(document).ready(function () {
        setDatePicker('.datepicker');
        $("input[name=date]").datepicker("setDate", new Date());
        $("input[name=start_date]").datepicker("setDate", new Date());
        $("input[name=end_date]").datepicker("setDate", new Date());
        doSearch(getLinkSearch());
    });
    //todo search
    $(document).on('click', '.btn-search', function () {
        doSearch(getLinkSearch());
    });

    //todo edit row
    $(document).on('click', '.btn-add', function () {
        var th = $(this);
        var _act = th.attr('data-action');
        var _add_link = url + '/' + _act;
        var _frm = remotePost(_add_link, {}, 'html');
        modalForm(ptitle, _frm, function () {
            $('form' + frmId).attr('data-action', getBaseUrl() + "/save");
            setDatePicker('.datepickr');
        });
    });

    //todo edit row
    $(document).on('click', '.btn-edit', function () {
        var trs = $('.table-edit tbody tr.info');
        var _th = $(this);
        if (trs.length > 1) {
            modalAlert(CON_TITLE_WAR, CON_MSG_WHICH_ONE);
        } else {
            var _id = trs.attr('id');
            if (typeof (_id) != 'undefined') {
                var _act = _th.attr('data-action');
                var _add_link = url + '/' + _act;
                var _frm = remotePost(_add_link, {'id': _id}, 'html');
                modalForm(ptitle, _frm, function () {
                    $('form' + frmId).attr('data-action', getBaseUrl() + "/update");
                    setDatePicker('.datepickr');
                });
            } else {
                modalAlert(CON_TITLE_WAR, CON_MSG_AT_LEAST_ONE);
            }
        }
    });
}


//todo create page welcome
var welcome = function (url) {
    setBaseUrl(url);
};