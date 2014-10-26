<ul class="page-breadcrumb breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="<?php echo base_url(); ?>">Home</a> 
        <i class="icon-angle-right"></i>
    </li>     
    <li>
        <a href="<?php echo base_url(); ?>index.php/bezetting/komposisicontroller/index">bezetting </a>
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="#">bezetting agama</a></li>
</ul>
<h4 class=" text-center title">Komposisi Pegawai Pemerintah Kabupaten Bandung Berdasar Agama </h4>
<div class="row ">
    <table id='agamatable' class="table table-bordered table-striped table-condensed flip-content ">       
        <thead  >  
            <tr>
                <th><input style="display: none" /></th>
                <th><input class="noborder" /></th>
                <th rowspan="2">Jumlah</th>
                <th rowspan="2">Islam</th>
                <th rowspan="2">Katholik</th>
                <th rowspan="2">Protestan</th>
                <th rowspan="2">Hindu</th>
                <th rowspan="2">Budha</th>
                <th rowspan="2">Konghucu</th>
                <th rowspan="2">Grafik</th>
            </tr>
            <tr>
                <th>No</th>
                <th>SKPD</th>
               
            </tr>
        </thead>
        <tbody id="listroom" >
            <?php
            $i = 1;
            $tislam = 0;
            $tkatolik = 0;
            $tprotestan = 0;
            $thindu = 0;
            $tbuda = 0;
            $tkonghucu = 0;
            $dataurl = isset($jenisjabatan) && is_array($jenisjabatan) ? array('jenisjabatan' => implode(',', $jenisjabatan)) : '';

            foreach ($listagama as $es) {
                $tislam += $es->islam;
                $tkatolik += $es->katolik;
                $tprotestan += $es->protestan;
                $thindu += $es->hindu;
                $tbuda += $es->buda;
                $tkonghucu += $es->konghucu;
                ?>
                <tr>
                    <td  align='center'><?php echo $i++; ?></td>
                    <td ><?php echo $es->satker; ?></td>
                    <td align='right'><?php echo $es->islam + $es->katolik + $es->protestan + $es->hindu + $es->buda + $es->konghucu; ?></td>
                    <td align='right'><?php echo $es->islam; ?></td>
                    <td align='right' ><?php echo $es->katolik; ?></td>
                    <td align='right' ><?php echo $es->protestan; ?></td>
                    <td align='right' ><?php echo $es->hindu; ?></td>
                    <td align='right' ><?php echo $es->buda; ?></td>
                    <td align='right'><?php echo $es->konghucu; ?></td>
                    <td align='right'> 
                        <a id="grafikagama" fancybox-width="600px" data-fancybox-height="600px" class="icon-bar-chart" href="<?php echo base_url(); ?>index.php/bezetting/komposisicontroller/grafikagama/<?php echo $es->satuan_kerja_id; ?>" title="<?php echo $es->satker; ?>"></a> 
                    </td>
                </tr>
            <?php } ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3" align='right'>Total</td>
                <td align='right'><?php echo $tislam; ?></td>
                <td align='right' ><?php echo $tkatolik; ?></td>
                <td align='right' ><?php echo $tprotestan; ?></td>
                <td align='right' ><?php echo $thindu; ?></td>
                <td align='right' ><?php echo $tbuda; ?></td>
                <td align='right'><?php echo $tkonghucu; ?></td>
                <td align='right'><?php echo $tkonghucu + $tbuda + $thindu + $tprotestan + $tkatolik + $tislam; ?></td>
            </tr>
        </tfoot>
    </table>
</div>

<script src="<?php echo base_url(); ?>/static/js/bezeting/komposisiagama.js" type="text/javascript"></script>  
 


