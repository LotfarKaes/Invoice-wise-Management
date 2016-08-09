$(document).ready(function () {
    $('form').validator();
        var t = $('.datatable').DataTable( {
            "columnDefs": [ {
                "searchable": false,
                "orderable": false,
                "targets": 0
            } ],
            "order": [[ 1, 'asc' ]],
            "bLengthChange": true,
            "bInfo" : false,
            "filter" : true,
            "oLanguage": { "sSearch": ""}
        } );
        $('div.dataTables_filter input').addClass('form-control input-sm');
        $('div.dataTables_length select').addClass('form-control input-sm');
        t.on( 'order.dt search.dt', function () {
            t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );
        } ).draw();

    $('.datepicker').datepicker({format:'yyyy-mm-dd', autoclose:true});
    $(document).ajaxStart(function() { Pace.restart(); });
    $(".chosen").chosen({ width: '100%' });
    $('[data-rel="tooltip"]').tooltip();
    /*======================================
       CUSTOM SCRIPTS
    ========================================*/
    var $modal = $('#ajax-modal');
    $('[data-toggle="ajax-modal"]').bind('click',function(e) {
        e.preventDefault();
        var url = $(this).attr('href');

        if (url.indexOf('#') === 0) {
            $('#mainModal').modal('open');
        } else {
            $.get(url, function(data) {
                $modal.modal();
                $modal.html(data);
                $('.datepicker').datepicker({format:'yyyy-mm-dd', autoclose:true });
                $('form').validator().on('submit', function (e) {
                    if (e.isDefaultPrevented()) {
                        return false;
                    }});
                $(".chosen").chosen({ width: '100%' });
            });
        }
    });

    $(document).on('submit', '.ajax-submit', function(e){
        e.preventDefault();
        var $form = $(this),$modal = $form.closest('.modal-dialog'),$modalBody = $form.find('.modal-body');
        $modalBody.find('.alert-danger').remove();
        var formData = new FormData(this);

        $.ajax({
            type: "POST",
            url: $form.attr('action'),
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend : function(){
                $modal.addClass('spinner');
            },
            success : function(){
                window.location.reload();
            },
            error : function(jqXhr, json, errorThrown){
                var errors = jqXhr.responseJSON;
                var errorStr = '';
                $.each( errors, function( key, value ) {
                    $('input[name="'+key+'"]').parents('.form-group').addClass("has-error");
                    errorStr += '- ' + value[0] + '<br/>';
                });
                var errorsHtml= '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' + errorStr + '</div>';
                $modalBody.prepend(errorsHtml);
            },
            complete : function(){
                $modal.removeClass('spinner');
            }
        });

    });

    $(".animsition").animsition({
        inClass               :   'fade-in',
        outClass              :   'fade-out',
        inDuration            :    1500,
        outDuration           :    800,
        linkElement           :   '.animsition-link',
        loading               :    true,
        loadingParentElement  :   'body', //animsition wrapper element
        loadingClass          :   'animsition-loading',
        unSupportCss          : [ 'animation-duration', '-webkit-animation-duration', '-o-animation-duration'],
        //"unSupportCss" option allows you to disable the "animsition" in case the css property in the array is not supported by your browser.
        //The default setting is to disable the "animsition" in a browser that does not support "animation-duration".
        overlay               :   false,
        overlayClass          :   'animsition-overlay-slide',
        overlayParentElement  :   'body'
    });

});
/*--------------------------------------------------------------
 Template select navigation
 --------------------------------------------------------------*/
$(document).on('change', '#template_select', function(){
    window.location.href = this.value;
});
$(document).on('click', '#btn_add_row', function() {
    cloneRow('item_table');
});
$( document ).on('change', '#currency', function() {
    if ( $(this).val() != '') {
        $( '.currencySymbol' ).text( $( "[name='currency']").val() );
    }
});



      