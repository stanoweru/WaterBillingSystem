<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from avenxo.kaijuthemes.com/ui-typography.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 06 Jun 2016 12:09:25 GMT -->
<head>
    <meta charset="utf-8">
    <title>JCORE - <?php echo $title; ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="description" content="Avenxo Admin Theme">
    <meta name="author" content="">


    <?php echo $_def_css_files; ?>


    <link type="text/css" href="assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet">
    <link type="text/css" href="assets/plugins/datatables/dataTables.themify.css" rel="stylesheet">
    <link href="assets/plugins/datapicker/datepicker3.css" rel="stylesheet">
    <link href="assets/plugins/select2/select2.min.css" rel="stylesheet">
    <!--/twitter typehead-->
    <link href="assets/plugins/twittertypehead/twitter.typehead.css" rel="stylesheet">
    <style>
        .toolbar{
            float: left;
        }
        td.details-control {
            background: url('assets/img/Folder_Closed.png') no-repeat center center;
            cursor: pointer;
        }
        tr.details td.details-control {
            background: url('assets/img/Folder_Opened.png') no-repeat center center;
        }

        .child_table{
            padding: 5px;
            border: 1px #ff0000 solid;
        }

        .glyphicon.spinning {
            animation: spin 1s infinite linear;
            -webkit-animation: spin2 1s infinite linear;
        }


        .select2-container{
            min-width: 100%;
        }

        .dropdown-menu > .active > a,.dropdown-menu > .active > a:hover{
            background-color: dodgerblue;
        }

        @keyframes spin {
            from { transform: scale(1) rotate(0deg); }
            to { transform: scale(1) rotate(360deg); }
        }

        @-webkit-keyframes spin2 {
            from { -webkit-transform: rotate(0deg); }
            to { -webkit-transform: rotate(360deg); }
        }

        .custom_frame{
            background-color: white;
            border: 1px solid lightgray;
            margin: 0% 1% 1% 0%;
            padding: 0%;

        }

        .numeric{
            text-align: right;
        }

        @media screen and (max-width: 480px) {
            table{
                min-width: 800px;
            }

            .dataTables_filter{
                min-width: 800px;
            }

            .dataTables_info{
                min-width: 800px;
            }

            .dataTables_paginate{
                float: left;
                width: 100%;
            }
        }

        #tbl_payments_filter{
            display: none;
        }
        div.dataTables_processing{ 
        position: absolute!important; 
        top: 0%!important; 
        right: -45%!important; 
        left: auto!important; 
        width: 100%!important; 
        height: 40px!important; 
        background: none!important; 
        background-color: transparent!important; 
        }

       .select2-results__options {
                overflow-x: hidden;
        } 
    </style>
</head>

<body class="animated-content"  style="font-family: tahoma;text-transform: none;">

<?php echo $_top_navigation; ?>

<div id="wrapper">
    <div id="layout-static">
        <?php echo $_side_bar_navigation;
        ?>
        <div class="static-content-wrapper white-bg">
            <div class="static-content"  >
                <div class="page-content"><!-- #page-content -->
                    <ol class="breadcrumb"  style="margin-bottom: 0px;">
                        <li><a href="Dashboard">Dashboard</a></li>
                        <li><a href="Payable_payments">AR Payments</a></li>
                    </ol>
                    <div class="container-fluid"">
                    <div data-widget-group="group1">
                        <div class="row">
                            <div class="col-md-12">
                                <div id="div_payment_list">
                                    <div class="panel panel-default">
                                        <div class="panel-body table-responsive" style="overflow-x: hidden;">
                                      <h2 class="h2-panel-heading">Billing Payments</h2><hr>   
                                        <div class="row">
                                            <div class="col-lg-3"><br>
                                                <button class="btn btn-primary"  id="btn_new" style="text-transform: capitalize;font-family: Tahoma, Georgia, Serif;" data-toggle="modal" data-target="" data-placement="left" title="New Payment" ><i class="fa fa-plus"></i>  New Payment</button>
                                            </div>
                                            <div class="col-lg-2">
                                                    From :<br />
                                                    <div class="input-group">
                                                        <input type="text" id="txt_start_date" name="" class="date-picker form-control" value="<?php echo date("m").'/01/'.date("Y"); ?>">
                                                         <span class="input-group-addon">
                                                                <i class="fa fa-calendar"></i>
                                                         </span>
                                                    </div>
                                            </div>
                                            <div class="col-lg-2">
                                                    To :<br />
                                                    <div class="input-group">
                                                        <input type="text" id="txt_end_date" name="" class="date-picker form-control" value="<?php echo date("m/t/Y"); ?>">
                                                         <span class="input-group-addon">
                                                                <i class="fa fa-calendar"></i>
                                                         </span>
                                                    </div>
                                            </div>
                                            <div class="col-lg-2">
                                                    Filter :<br />
                                                        <select id="cbo_filter_active"  class="form-control">
                                                            <option value="1" selected>ALL</option>
                                                            <option value="2">Active</option>
                                                            <option value="3">Cancelled</option>
                                                        </select>
                                            </div>
                                            <div class="col-lg-3">
                                                    Search :<br />
                                                     <input type="text" id="searchbox_payment" class="form-control">
                                            </div>
                                        </div>
                                        <br>          
                                            <table id="tbl_payments" class="table table-striped" cellspacing="0" width="100%">
                                                <thead class="">
                                                <tr>
                                                    <th></th>
                                                    <th>Receipt #</th>
                                                    <th>Customer</th>
                                                    <th>Method</th>
                                                    <th width="20%">Remarks</th>
                                                    <th>Posted by</th>
                                                    <th>Date Paid</th>
                                                    <th>Amount</th>
                                                    <th>Status</th>
                                                    <th><center>Action</center></th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="panel-footer"></div>
                                    </div>
                                </div>

                                <div id="div_payment_fields" style="display: none;">
                                    <div class="panel panel-default">
                                    <div class="panel-body">
                                    <h2 class="h2-panel-heading">Billing Payments <small> | Post</small></h2><hr>

                                    <div class="row-panel">
                                        <div class="container-fluid">
                                        <form id="frm_payments" role="form" class="form-horizontal">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                           <b class="required">*</b>  <label>Receipt type :</label> <br />
                                                            <select id="cbo_receipt_type" name="receipt_type">
                                                                <option value="1" selected>Official Receipt</option>
                                                                <option value="2">Acknowledgement Receipt</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                           <b class="required">*</b>  <label>Payment Date:</label> <br />
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                     <i class="fa fa-calendar"></i>
                                                                </span>
                                                                <input type="text" name="date_paid" class="date-picker form-control" value="<?php echo date("m/d/Y"); ?>" placeholder="Date of Payment" data-error-msg="Payment Date is required!" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                           <b class="required">*</b> <label>Receipt # :</label> <br />
                                                            <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <i class="fa fa-code"></i>
                                                            </span>
                                                                <input type="text" name="receipt_no" class="form-control" placeholder="Receipt #" data-error-msg="Receipt number is required!" required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                    <div class="col-lg-3 col-lg-offset-3">
                                                        <div class="row">

                                                        </div>
                                                        <div class="row" style="">
                                                            <div class="col-lg-12">
                                                               <b class="required">*</b> <label>Payment Method  :</label> <br />
                                                                <select id="cbo_payment_method" name="payment_method_id" class="form-control">
                                                                    <?php foreach($methods as $method){ ?>
                                                                        <option value="<?php echo $method->payment_method_id; ?>"><?php echo $method->payment_method; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div  id="div_check_details" style="display: none;">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <b class="required">*</b>  <label>Check #   :</label> <br />
                                                                <div class="input-group">
                                                                    <input type="text" name="check_no" class="form-control">
                                                                     <span class="input-group-addon">
                                                                        <i class="fa fa-code"></i>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <b class="required">*</b>  <label>Check Date :</label> <br />
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                         <i class="fa fa-calendar"></i>
                                                                    </span>
                                                                    <input type="text" name="check_date" class="date-picker form-control" value="<?php echo date("m/d/Y"); ?>" placeholder="Date of Payment" data-error-msg="Payment Date is required!" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                            </div>
                                        </form>
                                        <hr>
                                        <form id="frm_payment_items">
                                            <div class="row-panel">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <label class="control-label"><strong>Please select an Account<b class="required">*</b> :</strong></label>
                                                        <select id="cbo_accounts" style="width: 100%;" name="connection_id">
                                                            <optgroup label="Account # | Customer Name | Meter Serial">
                                                                <?php foreach($accounts as $account){ ?>
                                                                    <option value="<?php echo $account->connection_id; ?>"><?php echo $account->account_no; ?> | <?php echo $account->customer_name; ?> | <?php echo $account->serial_no; ?></option>
                                                                <?php } ?>
                                                            </optgroup>
                                                        </select>
                                                    </div>
                                                </div>

                                                <br />
                                                
                                                <div class="table-responsive">
                                                    <table id="tbl_items" class="table table-striped" cellspacing="0" width="100%" style="font-font:tahoma;">
                                                        <thead class="">    
                                                            <tr>        
                                                                <th>Control No</th>
                                                                <th>Description</th>
                                                                <th width="15%">Due Date</th>
                                                                <th width="15%" style="text-align: right;">Amount due</th>
                                                                <th width="15%">Payment</th>
                                                                <th width="5%">Action</th>
                                                                <th width="5%" style="display: none;">Billing ID</th>
                                                                <th width="5%" style="display: none;">Disconnection ID</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                        </tbody>
                                                        <tfoot>
                                                        <tr>
                                                            <td colspan="6" style="height: 50px;">&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3" align="right"><b>Total : </b></td>
                                                            <td id="td_total_payables" align="right"><b>0.00</b></td>
                                                            <td id="td_total_payments" align="right"><b>0.00</b></td>
                                                            <td></td>
                                                        </tr>

                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </form>
                                        <br />

                                        <div class="row" style="margin: 3px;">
                                            Remarks :<br />
                                            <textarea name="remarks" class="form-control" placeholder="Remarks"></textarea>
                                        </div>
                                        <div class="row" style="display: none;">
                                            <div class="col-lg-3 col-lg-offset-9">
                                                <div class="table-responsive">
                                                    <table id="tbl_purchase_summary" width="100%" class="table" style="font-family: tahoma;">
                                                        <tbody>

                                                        <tr style="border-bottom: 1px solid lightgray;">
                                                            <td align="right"><strong>Total Payable :</strong></td>
                                                            <td id="td_total_payable" align="right"><b>0.00</b></td>
                                                        </tr>

                                                        <tr style="border-bottom: 1px solid lightgray;">
                                                            <td align="right"><strong>Total Payment :</strong></td>
                                                            <td id="td_total_payment" align="right"><b>0.00</b></td>
                                                        </tr>


                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <br /> <br />
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <button id="btn_save" class="btn-primary btn" style="text-transform: capitalize;font-family: Tahoma, Georgia, Serif;"><span class=""></span> <i class="fa fa-floppy-o"></i> Record Payment</button>
                                                <button id="btn_cancel" class="btn-default btn" style="text-transform: capitalize;font-family: Tahoma, Georgia, Serif;"">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- .container-fluid -->
        </div> <!-- #page-content -->
    </div>


    <div id="modal_confirmation" class="modal fade" tabindex="-1" role="dialog"><!--modal-->
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close"   data-dismiss="modal" aria-hidden="true">X</button>
                    <h4 class="modal-title" style="color:white;"><span id="modal_mode"> </span>Confirmation</h4>

                </div>

                <div class="modal-body">
                    <p id="modal-body-message">Are you sure ?</p>
                </div>

                <div class="modal-footer">
                    <button id="btn_yes" type="button" class="btn btn-danger" data-dismiss="modal" style="text-transform: capitalize;font-family: Tahoma, Georgia, Serif;">Yes</button>
                    <button id="btn_close" type="button" class="btn btn-default" data-dismiss="modal" style="text-transform: capitalize;font-family: Tahoma, Georgia, Serif;">No</button>
                </div>
            </div>
        </div>
        <footer role="contentinfo">
            <div class="clearfix">
                <ul class="list-unstyled list-inline pull-left">
                    <li><h6 style="margin: 0;">&copy; 2018 - JDEV OFFICE SOLUTION INC</h6></li>
                </ul>
                <button class="pull-right btn btn-link btn-xs hidden-print" id="back-to-top"><i class="ti ti-arrow-up"></i></button>
            </div>
        </footer>
    </div>
</div>


</div>


<?php echo $_switcher_settings; ?>
<?php echo $_def_js_files; ?>
<script type="text/javascript" src="assets/plugins/datatables/jquery.dataTables.js"></script>
<script type="text/javascript" src="assets/plugins/datatables/dataTables.bootstrap.js"></script>
<script type="text/javascript" src="assets/plugins/datatables/ellipsis.js"></script>



<!-- Date range use moment.js same as full calendar plugin -->
<script src="assets/plugins/fullcalendar/moment.min.js"></script>
<!-- Data picker -->
<script src="assets/plugins/datapicker/bootstrap-datepicker.js"></script>

<!-- Select2 -->
<script src="assets/plugins/select2/select2.full.min.js"></script>



<!-- twitter typehead -->
<script src="assets/plugins/twittertypehead/handlebars.js"></script>
<script src="assets/plugins/twittertypehead/bloodhound.min.js"></script>
<script src="assets/plugins/twittertypehead/typeahead.bundle.min.js"></script>
<script src="assets/plugins/twittertypehead/typeahead.jquery.min.js"></script>

<!-- touchspin -->
<script type="text/javascript" src="assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js"></script>

<script src="assets/plugins/formatter/autoNumeric.js" type="text/javascript"></script>
<script src="assets/plugins/formatter/accounting.js" type="text/javascript"></script>

<script>




    $(document).ready(function(){
        var dt; var _txnMode; var _selectedID; var _selectRowObj;  var _cboFilterActive; 
        var _cboReceiptType; var _cboPaymentMethod;

        var oTableItems={
            amount_due : 'td:eq(3)',
            amount_payment : 'td:eq(4)'

        };

        var initializeControls=function(){
            _cboAccounts=$("#cbo_accounts").select2({
                templateResult: function(data) {
                    var r = data.text.split('|');
                        var $result = $(
                            '<div class="row">' +
                                '<div class="col-md-3">' + r[0] + '</div>' +
                                '<div class="col-md-6">' + r[1] + '</div>' +
                                '<div class="col-md-3">' + r[2] + '</div>' +
                            '</div>'
                        );
                        return $result;
                },
                placeholder: "Please Select an Account.",
                allowClear: false
            });
            _cboAccounts.select2('val',null);

            _cboReceiptType = $('#cbo_receipt_type').select2({
                placeholder: "Please select receipt type.",
                minimumResultsForSearch: -1,
                allowClear: false
            });

            _cboPaymentMethod = $('#cbo_payment_method').select2({
                placeholder: "Please select receipt type.",
                minimumResultsForSearch: -1,
                allowClear: false
            });

            dt=$('#tbl_payments').DataTable({
                "dom": '<"toolbar">frtip',
                "bLengthChange":false,
                oLanguage: {
                        sProcessing: '<center><br /><img src="assets/img/loader/ajax-loader-sm.gif" /><br /><br /></center>'
                },
                processing : true,
                "ajax" : {
                    "url" : "Billing_payments/transaction/list",
                    "bDestroy": true,            
                    "data": function ( d ) {
                            return $.extend( {}, d, {
                                "tsd":$('#txt_start_date').val(),
                                "ted":$('#txt_end_date').val(),
                                "flt": $('#cbo_filter_active').val()
                            });
                        }
                }, 
                "columns": [
                    {
                        "targets": [0],
                        "class":          "details-control hidden",
                        "orderable":      false,
                        "data":           null,
                        "defaultContent": ""
                    },
                    { targets:[1],data: "receipt_no" },
                    { targets:[2],data: "customer_name" },
                    { targets:[3],data: "payment_method" },
                    { targets:[4],data: "remarks" ,render: $.fn.dataTable.render.ellipsis(60)},
                    { targets:[5],data: "posted_by_user" },
                    { targets:[6],data: "date_paid" },
                    { targets:[7],data: "total_paid_amount" },
                    {
                        targets:[8],data: "is_active",
                        render: function (data, type, full, meta){
                            if(data=="1"){
                                _attribute='class="fa fa-check" style="color:#4caf50;font-size:30px;"';
                            }else{
                                _attribute='class="fa fa-times" style="color:#f55246;font-size:30px;"';
                            }
                            return '<center><i '+_attribute+'></i></center>';
                        }
                    },
                    {
                        targets:[8],data: "is_active",
                        render: function (data, type, full, meta){
                            if(data=="1"){
                                return '<center><button type="button" class="btn btn-default btn_cancel_or"><i class="fa fa-times-circle"></i></button></center>';
                            } else {
                                return '<center><button type="button" class="btn btn-default btn_cancel_or" disabled><i class="fa fa-times-circle"></i></button></center>';
                            }

                            
                        }

                    }
                ]
            });

            _cboFilterActive = $('#cbo_filter_active').select2({
                placeholder: "Please select Filter.",
                allowClear: false,
                minimumResultsForSearch: -1

            });

            $('.date-picker').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true

            });
            $('.number').autoNumeric('init',{mDec:0});
            $('.numeric').autoNumeric('init',{mDec:2});
        }();






        var bindEventHandlers=(function(){
            var detailRows = [];

            $('#tbl_payments tbody').on( 'click', 'tr td.details-control', function () {
                var tr = $(this).closest('tr');
                var row = dt.row( tr );
                var idx = $.inArray( tr.attr('id'), detailRows );

                if ( row.child.isShown() ) {
                    tr.removeClass( 'details' );
                    row.child.hide();

                    // Remove from the 'open' array
                    detailRows.splice( idx, 1 );
                }
                else {
                    tr.addClass( 'details' );
                    var d=row.data();

                    console.log(d);

                    $.ajax({
                        "dataType":"html",
                        "type":"POST",
                        "url":"Templates/layout/po/" + d.purchase_order_id,
                        "beforeSend" : function(){
                            row.child( '<center><br /><img src="assets/img/loader/ajax-loader-lg.gif" /><br /><br /></center>' ).show();
                        }
                    }).done(function(response){
                        row.child( response,'no-padding' ).show();
                        // Add to the 'open' array
                        if ( idx === -1 ) {
                            detailRows.push( tr.attr('id') );
                        }
                    });
                }
            });


            $('#btn_new').click(function(){
                _txnMode="new";
                clearFields($('#div_payment_fields'));
                $('#td_total_payables').html('<b>0.00</b>');
                $('#td_total_payments').html('<b>0.00</b>');
                _cboAccounts.select2('val',null);
                showList(false);


            });

            $("#searchbox_payment").keyup(function(){         
                dt
                    .search(this.value)
                    .draw();
            });

            $('#btn_yes').click(function(){
                cancelPayment().done(function(response){
                    showNotification(response);
                    if(response.stat=="success"){
                        dt.row(_selectRowObj).data(response.row_updated[0]).draw();
                    }

                });

            });

            $("#txt_start_date,#txt_end_date").on("change", function () {        
                $('#tbl_payments').DataTable().ajax.reload()
            });

            _cboFilterActive.on('select2:select',function(e){
                $('#tbl_payments').DataTable().ajax.reload()
            });

            _cboPaymentMethod.on("select2:select", function (e) {
                var method_id=$(this).select2('val');
                if(method_id==2){
                    $('#div_check_details').show();
                }else{
                    $('#div_check_details').hide();
                }
            });

            $('#btn_cancel').click(function(){
                showList(true);
            });


            _cboAccounts.on('select2:select', function(){
            var i= $(this).val();
            $.ajax({
                url : 'Billing_payments/transaction/billing-receivables/'+i,
                type : "GET",
                cache : false,
                dataType : 'json',
                processData : false,
                contentType : false,
                beforeSend : function(){
                    $('#tbl_items > tbody').html('<tr><td align="center" colspan="8"><br /><img src="assets/img/loader/ajax-loader-sm.gif" /><br /><br /></td></tr>');
                },
                success : function(response){
                    var rows=response.receivables;
                    $('#tbl_items > tbody').html('');

                    if(rows.length == 0){

                        $('#tbl_items > tbody').append(newRowItemBlank());

                    }


                    $.each(rows,function(i,value){
                        $('#tbl_items > tbody').append(newRowItem({
                            disconnection_id: value.disconnection_id,
                            billing_id: value.billing_id,
                            control_no: value.control_no,
                            receivable_amount:value.receivable_amount,
                            description: value.description,
                            due_date: value.due_date,
                            amount_due: value.amount_due,
                            payment_amount: value.payment_amount
                        }));
                    });
                    reInitializeNumeric();
                    reComputeDetails();
                }
            });

                
            });

            $('#btn_save').click(function(){
                if(validateRequiredFields($('#frm_payments'))){
                    if(_txnMode=="new"){
                        postPayment().done(function(response){
                            showNotification(response);
                            $('#btn_save').attr('disabled',true);
                            if(response.stat=="success"){
                                dt.row.add(response.row_added[0]).draw();
                                clearFields($('#frm_payments'));
                                showList(true);
                                $('#btn_save').attr('disabled',false);
                            }
                        }).always(function(){
                            showSpinningProgress($('#btn_save'));
                        });
                    }
                }
            });


            $('#tbl_payments > tbody').on('click','button.btn_cancel_or',function(e){
                _selectRowObj=$(this).closest('tr');
                var d=dt.row(_selectRowObj).data();
                _selectedID= d.billing_payment_id;
                $('#modal_confirmation').modal('show');
            });

            $('#tbl_items > tbody').on('click','button.btn_set_amount',function(e){
                var row=$(this).closest('tr');
                var payableAmount=getFloat(row.find('input[name="receivable_amount[]"]').val());
                row.find('input[name="payment_amount[]"]').val(accounting.formatNumber(payableAmount,2));
                reComputeDetails();
            });

            $('#tbl_items > tbody').on('keyup','input.numeric',function(e){
                var row=$(this).closest('tr');
                var payment=getFloat($(this).val());
                var payable=getFloat(row.find('input[name="receivable_amount[]"]').val());
                if(payment>payable){
                    showNotification({
                        "title": "Invalid!",
                        "stat" : "error",
                        "msg" : "Sorry, payment amount is greater than receivable amount."
                    });
                    $(this).val('');
                }
                reComputeDetails();
            });


        })();


        var validateRequiredFields=function(f){
            var stat=true;

            $('div.form-group').removeClass('has-error');
            $('input[required],textarea[required],select[required]',f).each(function(){
                if($(this).is('select')){
                    if($(this).select2('val')==0||$(this).select2('val')==null){
                        showNotification({title:"Error!",stat:"error",msg:$(this).data('error-msg')});
                        $(this).closest('div.form-group').addClass('has-error');
                        $(this).focus();
                        stat=false;
                        return false;
                    }
                }else{
                    if($(this).val()==""){
                        showNotification({title:"Error!",stat:"error",msg:$(this).data('error-msg')});
                        $(this).closest('div.form-group').addClass('has-error');
                        $(this).focus();
                        stat=false;
                        return false;
                    }
                }
            });
            return stat;
        };


        var postPayment=function(){
            var _data=$('#frm_payments,#frm_payment_items').serializeArray();
            _data.push({name:"total_paid_amount",value:getFloat($('#td_total_payment').text())});
            _data.push({name:"remarks",value:$('textarea[name="remarks"]').val()});
            console.log(_data);
            return $.ajax({
                "dataType":"json",
                "type":"POST",
                "url":"Billing_payments/transaction/create",
                "data":_data,
                "beforeSend": showSpinningProgress($('#btn_save'))
            });
        };


        var cancelPayment=function(){
            return $.ajax({
                "dataType":"json",
                "type":"POST",
                "url":"Billing_payments/transaction/cancel",
                "data":{billing_payment_id : _selectedID}
            });
        };

        var showList=function(b){
            if(b){
                $('#div_payment_list').show();
                $('#div_payment_fields').hide();
            }else{
                $('#div_payment_list').hide();
                $('#div_payment_fields').show();
            }
        };

        var showNotification=function(obj){
            PNotify.removeAll(); //remove all notifications
            new PNotify({
                title:  obj.title,
                text:  obj.msg,
                type:  obj.stat
            });
        };



        var showSpinningProgress=function(e){
            $(e).find('span').toggleClass('glyphicon glyphicon-refresh spinning');
            $(e).toggleClass('disabled');
        };

        var clearFields=function(f){
            $('input:not(.date-picker),textarea',f).val('');
            $('#tbl_items > tbody').html('');

        };

        var arrayClean = function(thisArray, thisName) {
            "use strict";
            $.each(thisArray, function(index, item) {
                if (item.name == thisName) {
                    delete array[index];      
                }
            });
        }

        var getFloat=function(f){
            return parseFloat(accounting.unformat(f));
        };


        var reInitializeNumeric=function(){
            $('.number').autoNumeric('init',{mDec:0});
            $('.numeric').autoNumeric('init',{mDec:2});
        };

        var reComputeDetails=function(){
            var rows=$('#tbl_items > tbody > tr');
            var total_payment=0; var total_payable=0;

            $.each(rows,function(i,value){
                var row=$(this);
                total_payment+=getFloat(row.find('input[name="payment_amount[]"]').val());
                total_payable+=getFloat(row.find('input[name="receivable_amount[]"]').val());
            });

            $('#td_total_payment').html('<b>'+accounting.formatNumber(total_payment,2)+'</b>');
            $('#td_total_payable').html('<b>'+accounting.formatNumber(total_payable,2)+'</b>');


            $('#td_total_payments').html('<b>'+accounting.formatNumber(total_payment,2)+'</b>');
            $('#td_total_payables').html('<b>'+accounting.formatNumber(total_payable,2)+'</b>');

        };

        var resetSummaryDetails=function(){
            $('#td_total_payment').html('<b>0.00</b>');
            $('#td_total_payable').html('<b>0.00</b>');
        };

        var showTableLoader=function(obj){
            var i=obj.find('thead').find('tr').first().find('th').length;
            obj.find('tbody').html('<tr><td colspan="'+i+'" align="center"><br /><img src="assets/img/loader/ajax-loader-sm.gif" /><br /><br /></td></tr>');
        };


    var newRowItem=function(d){
        return '<tr>'+
        '<td>'+d.control_no+'</td>'+
        '<td>'+d.description+'</td>'+
        '<td>'+d.due_date+'</td>'+
        '<td><input name="receivable_amount[]" type="text" class="numeric form-control" value="'+d.amount_due+'" readonly></td>'+
        '<td><input name="payment_amount[]" type="text" class="numeric form-control" value="'+d.payment_amount+'" ></td>'+
        '<td align="center"><button type="button" class="btn btn-success btn_set_amount"><i class="fa fa-check"></i></button></td>'+
        '<td class="hidden"><input name="billing_id[]" type="text" class="number form-control" value="'+d.billing_id+'" readonly></td>'+
        '<td class="hidden"><input name="disconnection_id[]" type="text" class="number form-control" value="'+d.disconnection_id+'" readonly></td>'+
        '</tr>';
    };

     var newRowItemBlank=function(d){
        return '<tr>'+
        '<td colspan="8"><i><b>No receivables found.</b></i></td>'+
        '</tr>';
    };   



    });




</script>


</body>


</html>