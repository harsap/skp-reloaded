<ul class="page-breadcrumb breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="<?php echo base_url(); ?>">Home</a> 
        <i class="icon-angle-right"></i>
    </li>     
    <li><a href="#">SOTK</a></li>
</ul>
<h5 class="text-center title">Daftar SKPD Pemerintah Kabupaten Bandung</h5>
<div class="row ">
    <table id='skpdtable' class="table table-bordered table-striped table-condensed flip-content">
        <thead class="flip-content">
             <tr>
                <th><input style="display: none" /></th>
                <th><input class="noborder" /></th>
                <th><input class="noborder" /></th>
                <th><input class="noborder" /></th>
                <th><input class="noborder" /></th>
                <th><input class="noborder" /></th>
            </tr>
            <tr>
                <th>No</th>
                <th>Nama SKPD</th>
                <th>Jumlah Pegawai</th>
                <th>Jumlah Struktural</th>
                <th>Jumlah Fungsional Umum</th>
                <th>Jumlah Fungsional Khusus</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listsotk as $st) { ?>
                <tr>
                    <td> </td>
                    <td><?php echo $st->satker; ?></td>
                    <td><?php echo ($st->struktural + $st->fu + $st->ft); ?></td>
                    <td><?php echo $st->struktural; ?></td>
                    <td><?php echo $st->fu; ?></td>
                    <td><?php echo $st->ft; ?></td>
                </tr>
            <?php } ?>
        </tbody>
         
    </table>
</div>

<script src="<?php echo base_url(); ?>/static/js/home/dashboard.js" type="text/javascript"></script>
<script type="text/javascript">

    var asInitVals = new Array();

    $(document).ready(function() {
        var oTable = $('#skpdtable').dataTable({
            "oLanguage": {
                "sSearch": "Search all columns:"
            }, "bPaginate": true,
            "sPaginationType": "bootstrap",
            "bInfo": true,
            "fnRowCallback": function(nRow, aData, iDisplayIndex, iDisplayIndexFull, oSettings) {
                var numStart = this.fnPagingInfo().iStart;
                var index = numStart + iDisplayIndexFull + 1;
                $('td:eq(0)', nRow).html(index);
                return nRow;
            },
            "aoColumns": [
                {"bSortable": false, sClass: "center"},
                {"bSortable": true, sDefaultContent: "-"},
                {"bSortable": true, sDefaultContent: "right"},
                {"bSortable": true, sClass: "right"},
                {"bSortable": true, sClass: "right"},
                {"bSortable": true, sClass: "right"}
            ]
        });
        $("thead input").keyup(function() {
            oTable.fnFilter(this.value, $("thead input").index(this));
        });


        $("thead input").each(function(i) {
            asInitVals[i] = this.value;
        });

        $("thead input").focus(function() {
            if (this.className == "search_init")
            {
                this.className = "";
                this.value = "";
            }
        });

        $("thead input").blur(function(i) {
            if (this.value == "")
            {
                this.className = "search_init";
                this.value = asInitVals[$("thead input").index(this)];
            }
        });

    });

</script>