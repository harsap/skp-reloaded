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
    <li><a href="#">bezetting eselon</a></li>
</ul>
<h4 class=" text-center title">Komposisi Pegawai Pemerintah Kabupaten Bandung Berdasar Eselon </h4>
<div class="row ">
    <table id='eselontable' class="table table-bordered table-striped table-condensed flip-content ">       
        <thead  >  
            <tr>
                <th><input style="display: none" /></th>
                <th><input class="noborder" /></th>
                <th  rowspan="2" >Jumlah</th>
                <th rowspan="2" >I.a</th>
                <th  rowspan="2" >I.b</th>
                <th rowspan="2" >II.a</th>
                <th  rowspan="2" >II.b</th>
                <th rowspan="2" >III.a</th>
                <th  rowspan="2" >III.b</th>
                <th  rowspan="2" >IV.a</th>
                <th rowspan="2" >IV.b</th>
                <th  rowspan="2" >V.a</th>
                <th  rowspan="2" >V.b</th>
                <th rowspan="2" >GRAFIK</th>
            </tr>
            <tr>
                <th>No</th>
                <th>SKPD</th>

            </tr>
        </thead>
        <tbody id="listroom" >
            <?php
            $dataurl = isset($jenisjabatan) && is_array($jenisjabatan) ? array('jenisjabatan' => implode(',', $jenisjabatan)) : '';

            $i = 1;
            $tia = 0;
            $tib = 0;
            $tiia = 0;
            $tiib = 0;
            $tiiia = 0;
            $tiiib = 0;
            $tiva = 0;
            $tivb = 0;
            $tva = 0;
            $tvb = 0;
            foreach ($listeselon as $es) {
                $tia += $es->ia;
                $tib += $es->ib;
                $tiia += $es->iia;
                $tiib += $es->iib;
                $tiiia += $es->iiia;
                $tiiib += $es->iiib;
                $tiva += $es->iva;
                $tivb += $es->ivb;
                $tva += $es->va;
                $tvb += $es->vb;
                ?>
                <tr>
                    <td  align='center'><?php echo $i++; ?></td>
                    <td ><?php echo $es->satker; ?></td>
                    <td align='right'><?php echo $es->ia + $es->ib + $es->iia + $es->iib + $es->iiia + $es->iiib + $es->iva + $es->ivb + $es->va + $es->vb; ?></td>
                    <td align='right'><?php echo $es->ia; ?></td>
                    <td align='right' ><?php echo $es->ib; ?></td>
                    <td align='right' ><?php echo $es->iia; ?></td>
                    <td align='right' ><?php echo $es->iib; ?></td>
                    <td align='right' ><?php echo $es->iiia; ?></td>
                    <td align='right'><?php echo $es->iiib; ?></td>
                    <td align='right' ><?php echo $es->iva; ?></td>
                    <td align='right' ><?php echo $es->ivb; ?></td>
                    <td align='right' ><?php echo $es->va; ?></td>
                    <td align='right' ><?php echo $es->vb; ?></td>
                    <td align='right'>
                        <a class="icon-bar-chart" href="<?php echo base_url(); ?>index.php/bezetting/komposisicontroller/grafikeselon/<?php echo $es->satuan_kerja_id; ?>" title="<?php echo $es->satker; ?>"></a> 
                    </td>
                </tr>
            <?php } ?>
        </tbody>
        <tfoot>
            <tr>
                <td  align='right' colspan='3'>Total</td>
                <td align='right'> <?php echo $tia; ?></td>
                <td align='right'> <?php echo $tib; ?></td>
                <td align='right'> <?php echo $tiia; ?></td>
                <td align='right'> <?php echo $tiib; ?></td>
                <td align='right'><?php echo $tiiia; ?></td>
                <td align='right'> <?php echo $tiiib; ?></td>
                <td align='right'>  <?php echo $tiva; ?></td>
                <td align='right'> <?php echo $tivb; ?></td>
                <td align='right'>  <?php echo $tva; ?></td>
                <td align='right'> <?php echo $tvb; ?></td>
                <td align='right'> <?php echo $tvb + $tva + $tivb + $tiva + $tiiib + $tiiia + $tiib + $tiia + $tib + $tia; ?></td>
            </tr>
        </tfoot>
    </table>
</div>
<script src="<?php echo base_url(); ?>/static/js/bezeting/komposisieselon.js" type="text/javascript"></script> 