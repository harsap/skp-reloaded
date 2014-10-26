<script src="<?php echo base_url(); ?>/static/js/home/dashboard.js" type="text/javascript"></script>
<script   type="text/javascript">
 $(document).ready(function() {
        grafikbarkomposisijenisjabatan("<?php echo base_url(); ?>index.php/home/welcome/getpersenstrukturalperskpd", "chart_pegbyjenisjabatan");
    });

</script>
 <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption"><i class="icon-calendar"></i>Komposisi Jumlah Struktural Per SKPD</div>
                <div class="actions">
                    <a href="javascript:;" class="btn btn-sm  easyPieChart"><i class="icon-bar-chart"></i> </a>
                </div>
            </div>
            <div class="portlet-body">
                <div id="chart_pegbyjenisjabatan" class="chart" style="padding: 0px; position: relative;"> </div>
            </div>
        </div>