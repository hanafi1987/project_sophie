Dropzone.autoDiscover = false;

$(document).ready(function () {
    $("#min_quantity,#min_purchase, #fee, #min1, #min2, #dsc1, #dsc2, #unitprice, #discounts, #quantity").keydown(function (e) {
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
            (e.keyCode == 65 && e.ctrlKey === true) ||
            (e.keyCode >= 35 && e.keyCode <= 39)) {
            return;
        }
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });

    (function ($) {
        $.fn.currencyFormat = function () {
            this.each(function (i) {
                $(this).change(function (e) {
                    if (isNaN(parseFloat(this.value))) return;
                    this.value = parseFloat(this.value).toFixed(2);
                });
            });
            return this;
        }
    })(jQuery);
    $(function () {
        $('#min_purchase, #fee, #min1, #dsc2, #unitprice, #discounts').currencyFormat();
    });
    $('#min_type').change(function () {
        if ($('#min_type').val() == '8') {
            $('#min_purch').show();
            $('#min_qtty').hide();
            $('#min2').val(null);
        } else if ($('#min_type').val() == '9') {
            $('#min_qtty').show();
            $('#min_purch').hide();
            $('#min1').val(null);
        }
    });
    $('#disc_type').change(function () {
        if ($('#disc_type').val() == '10') {
            $('#disc_percent').show();
            $('#disc_money').hide();
            $('#dsc2').val(null);
        } else if ($('#disc_type').val() == '11') {
            $('#disc_money').show();
            $('#disc_percent').hide();
            $('#dsc1').val(null);
        }
    });
    $('select[data-selectsplitter-selector]').selectsplitter();

    if (document.getElementById('featureddropzone') != null) {
        var preview_id = $('#featuredfile').val();
        var myDropzone = new Dropzone("#featureddropzone",
            {
                url: "/products/image/feature/upload",
                thumbnailWidth: null,
                thumbnailHeight: null,
                acceptedFiles: 'image/*',
                paramName: "featuredFile", // The name that will be used to transfer the file
                maxFiles: 1,
                maxfilesexceeded: function (file) {
                    this.removeAllFiles();
                    this.addFile(file);
                },
                addRemoveLinks: true,
                removedfile: function (file) {
                    var preview = $('#featuredfile').val();
                    var name = file.name;
                    $.ajax({
                        type: 'POST',
                        url: '/products/image/feature/preview/delete',
                        data: "id=" + preview,
                    });
                    var _ref;
                    $('#featuredfile').val(null);
                    return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
                },
                init: function () {
                    thisDropzone = this;

                    this.on("thumbnail", function (file, dataUrl) {
                        $('.dz-image').last().find('img').attr({width: '100%', height: '100%'});
                    });
                    this.on("success", function (file, response) {
                        var obj = jQuery.parseJSON(response);
                        console.log(obj.id);
                        $('#featuredfile').val(obj.id);
                        $('#imgpath').val(obj.img_path);
                        $('.dz-image').css({"width": "100%", "height": "auto"});
                    });
                    if (preview_id != '') {
                        $.get('/products/image/feature/preview?preview_id=' + preview_id, function (data) {
                            console.log(data);
                            var obj = jQuery.parseJSON(data);
                            var mockFile = {name: obj.name, size: obj.size};
                            thisDropzone.options.thumbnailHeight = null;
                            thisDropzone.options.thumbnailWidth = null;
                            thisDropzone.emit("addedfile", mockFile);
                            thisDropzone.emit("thumbnail", mockFile, '/' + obj.img_path);
                            thisDropzone.emit("complete", mockFile);
                            thisDropzone.options.maxFiles = 1;


                        });
                    }

                }

            });
    }


    $('#unitprice').change(function () {
        var unitprice = $(this).val();
        var sellingprice = unitprice - $('#discounts').val();
        if (sellingprice > 0.00) {

            sellingprice = parseFloat(Math.round(sellingprice * 100) / 100).toFixed(2);
            document.getElementById('price_after_discount').innerHTML = "RM " + sellingprice;
        } else {
            alert('Unit price should be higher than discount');
            $(this).val(null);
        }
    })
    $('#discounts').change(function () {
        var unitprice = $('#unitprice').val();
        var sellingprice = unitprice - $(this).val();
        if (sellingprice > 0.00) {

            sellingprice = parseFloat(Math.round(sellingprice * 100) / 100).toFixed(2);
            document.getElementById('price_after_discount').innerHTML = "RM " + sellingprice;
        } else {
            alert('Discount price is higher than unit price');
            $('#discounts').val(null);
        }
    })
    if(tinymce != undefined) {
        var host = window.location.hostname;
        if(host=='hermo-backend.dev'){
            host = 'hermo-frontend.dev'
        }
        tinymce.init({
            selector: '#desc',
            height: 300,
            theme: "modern",
            relative_urls: true,
            remove_script_host: false,
            document_base_url : "http://"+host,
            plugins: [
                "advlist autolink link image lists charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
                "table contextmenu directionality emoticons paste textcolor responsivefilemanager code codesample"
            ],
            toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
            toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code | codesample ",
            image_advtab: true,

            external_filemanager_path: "/filemanager/",
            filemanager_title: "Responsive Filemanager",
            external_plugins: {"filemanager": "/filemanager/plugin.min.js"}
        });
    }

});