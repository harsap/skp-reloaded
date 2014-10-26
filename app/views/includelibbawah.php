<script src="<?php echo base_url(); ?>static/assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript" ></script>
<script src="<?php echo base_url(); ?>static/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>static/assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>static/assets/plugins/jquery.cookie.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>static/assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript" ></script>

<script type="text/javascript" src="<?php echo base_url(); ?>static/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>static/assets/scripts/maskedinput.js"></script>
<script type='text/javascript' src="<?php echo base_url(); ?>static/assets/plugins/jquery-timer/jquery.timer.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>static/assets/plugins/jquery-numberformat/akunting.js"></script>
<script type='text/javascript' src="<?php echo base_url(); ?>static/assets/plugins/jquery-numberformat/numericpack.min.js"></script>
<script src="<?php echo base_url(); ?>static/assets/scripts/app.js"></script>
<script src="<?php echo base_url(); ?>static/assets/scripts/sidebar.js"></script>
<script src="<?php echo base_url(); ?>static/assets/plugins/chosen/chosen.jquery.js"></script>
<script type="text/javascript">

    $(document).ready(function () {

        App.init();

        var nowTemp = new Date();
        var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
        $(".dropdown-toggle").dropdown();
        $("#dp1").datepicker({endDate: "+0d", language: "id", autoclose: "true", todayHighlight: "true"});
        $("#dp2").datepicker({endDate: "+0d", language: "id", autoclose: "true"});
        $("#dp3").datepicker({endDate: "+0d", language: "id", autoclose: "true"});
        $("#dp4").datepicker({endDate: "+0d", language: "id", autoclose: "true"});
        $("#dp5").datepicker({endDate: "+0d", language: "id", autoclose: "true"});
        $("#dp6").datepicker({endDate: "+0d", language: "id", autoclose: "true"});
        $("#dp7").datepicker({endDate: "+0d", language: "id", autoclose: "true"});
        $("#dp8").datepicker({endDate: "+0d", language: "id", autoclose: "true"});
        $("#dp9").datepicker({endDate: "+0d", language: "id", autoclose: "true"});
        $("#dp10").datepicker({endDate: "+0d", language: "id", autoclose: "true"});
        $("#loading").append("<div class='loadingAjax' id='ajaxBusy'><p><img src='<?php echo base_url(); ?>/static/ico/ajaxLoading.gif'></p></div>");
        $(document).ajaxStart(function () {
            $("#ajaxBusy").show()
        }).ajaxStop(function () {
            $("#ajaxBusy").hide()
        });
        $(".inputinvoice").priceFormat({prefix: "", suffix: "", centsSeparator: ",", thousandsSeparator: ".", limit: 15});
        $.validator.addMethod("accept", function (value, element, param) {
            return value.match(new RegExp("^" + param + "$")) || value == ""
        }, "Hanya boleh huruf dan angka!");
        $.validator.addMethod("ruleWajib", function (value, element) {
            console.log(value);
            return parseFloat(accounting.unformat(value)) > 0
        }, "Wajib diisi .");
        $.validator.addMethod("ruleA03", function (value, element) {
            return this.optional(element) || /^[0-9.,]+$/.test(value)
        }, "Hanya boleh menggunakan angka dan simbol .");
        $.validator.addMethod("ruleA04", function (value, element) {
            return this.optional(element) || /^[a-zA-Z0-9]+$/.test(value)
        }, "Hanya boleh menggunakan huruf dan angka");
        $.validator.addMethod("ruleA05", function (value, element) {
            return this.optional(element) || /^[a-zA-Z0-9/.,+: '"()-]*$/i.test(value)
        }, "Hanya boleh menggunakan huruf, angka dan simbol .,''':+-/() spasi");
        $.validator.addMethod("ruleAlamat", function (value, element) {
            return this.optional(element) || /^[AC-IK-NP-TVWY\r\sa-zA-Z0-9/.,+: '"()-]*$/i.test(value)
        }, "Hanya boleh menggunakan huruf, angka dan simbol .,''':+-/() spasi enter");
        $.validator.addMethod("ruleCekKabupaten", function (value, element) {
            return eval(value) > 0
        }, "Wajib diisi .");
        $.validator.addMethod("indoDate", function (value, element) {
            return value.match(/^\d\d?\/\d\d?\/\d\d\d\d$/) || value == ""
        }, " format hanya boleh dd/mm/yyyy.");
        $.validator.addMethod("bulanLebihBesar",
                function (value, element, params) {
                    var valBulanAwal = moment("01/" + value, "DD/MM/YYYY");
                    var valBulanAkhir = moment("01/" + $(params).val(), "DD/MM/YYYY");

                    return   (valBulanAwal.diff(valBulanAkhir, 'days') >= 0);
                }, 'Harus lebih besar dari {0}  ');
        $.validator.addMethod("angkaLebihBesar",
                function (value, element, params) {
                    console.log(" angkaLebihBesar ");
                    var nilaiSpd = accounting.unformat($(params).val(), ",");
                    var nilaiangg = accounting.unformat(value, ",");
                    return   (nilaiSpd > nilaiangg);
                }, 'Nilai SPD harus lebih kecil dari nilai anggaran!');
        $.validator.addMethod("ceknourutltklexist", function (value, element) {
            var result = false;
            var noltklself = "${noltkl}";
            if ($.trim(noltklself).length > 0) {
                var arrltkl = noltklself.split("-");
                result = arrltkl[2] == value ? true : false
            }
            if (!result) {
                $.ajax({type: "POST", async: false, url: "<?php echo base_url(); ?>/historyltkl/json/ceknoltklisexist", data: {noltklsegmendua: value}, success: function (data) {
                        result = data
                    }})
            }
            return result
        }, "No urut   Sudah Digunakan");
        accounting.settings = {currency: {symbol: "Rp", format: "%s%v", decimal: ",", thousand: ".", precision: 2}, number: {precision: 0, thousand: ".", decimal: ","}}
    });
    $(document).ajaxStart(function () {
        $("#ajaxBusy").show()
    }).ajaxStop(function () {
        $("#ajaxBusy").hide()
    });
    function IsNumeric(b) {
        b = parseInt(b);
        return(b - 0) == b && b.length > 0
    }
    function popupwindow(i, k, j, h) {
        var l = (screen.width / 2) - (j / 2);
        var g = (screen.height / 2) - (h / 2);
        return window.open(i, k, "toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=no, copyhistory=no, width=" + j + ", height=" + h + ", top=" + g + ", left=" + l)
    }
    function preventBack() {
        window.history.forward()
    }
    function settextbootalert(d, f, e) {
        $("#" + f).empty();
        $("#" + d).show();
        $("#" + f).html(e)
    }
    function closewindow() {
        /* if (screenfull.enabled) {
         screenfull.toggle(this);
         }*/
    }
    function getbasepath() {
        return '<?php echo base_url(); ?>';
    }
    ;


</script>
