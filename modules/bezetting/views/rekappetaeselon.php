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
    <li><a href="#">peta eselon</a></li>
</ul>
<br/>

<h4 class=" text-center title">Peta Eselon Pemerintah Kabupaten Bandung </h4>
<div align="right"><a href="<?php echo base_url(); ?>index.php/bezetting/komposisicontroller/rekappetaeselonxls" class="btn green">Cetak Ke Excel</a> </div>
<div class="row ">
   
    <table id='petaeselontable' class="table table-striped table-bordered table-condensed flip-content ">       
        
        <thead  >  
            <tr>
                <th><input style="display: none" /></th>
                <th><input class="noborder" /></th>

                <th rowspan="2"   >I.a</th>
                <th rowspan="2"  >I.b</th>
                <th rowspan="2"  >II.a</th>
                <th rowspan="2"  >II.b</th>
                <th rowspan="2"  >III.a</th>
                <th rowspan="2"  >III.b</th>
                <th rowspan="2"  >IV.a</th>
                <th rowspan="2"  >IV.b</th>
                <th rowspan="2"  >V.a</th>
                <th rowspan="2"  >V.b</th> 
                <th rowspan="2"  >Total Kursi</th>
                <th rowspan="2"  >I.a</th>
                <th rowspan="2"  >I.b</th>
                <th rowspan="2"  >II.a</th>
                <th rowspan="2"  >II.b</th>
                <th rowspan="2"  >III.a</th>
                <th rowspan="2"  >III.b</th>
                <th rowspan="2"  >IV.a</th>
                <th rowspan="2"  >IV.b</th>
                <th rowspan="2"  >V.a</th>
                <th rowspan="2"  >V.b</th>
                <th rowspan="2"  >Total Terisi</th> 
                <th rowspan="2"  >JUMLAH ESELON BELUM TERISI</th>

            </tr>
            <tr >
                <th>No</th>
                <th>SKPD</th>
                
            </tr>
        </thead>
        <tbody id="listroom" >
            <?php
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

            $triilia = 0;
            $triilib = 0;
            $triiliia = 0;
            $triiliib = 0;
            $triiliiia = 0;
            $triiliiib = 0;
            $triiliva = 0;
            $triilivb = 0;
            $triilva = 0;
            $triilvb = 0;

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

                $triilia += $es->riil_ia;
                $triilib += $es->riil_ib;
                $triiliia += $es->riil_iia;
                $triiliib += $es->riil_iib;
                $triiliiia += $es->riil_iiia;
                $triiliiib += $es->riil_iiib;
                $triiliva += $es->riil_iva;
                $triilivb += $es->riil_ivb;
                $triilva += $es->riil_va;
                $triilvb += $es->riil_vb;

                $totalkursi = $es->ia + $es->ib + $es->iia + $es->iib + $es->iiia + $es->iiib + $es->iva + $es->ivb + $es->va + $es->vb;
                $totalisi = $es->riil_ia + $es->riil_ib + $es->riil_iia + $es->riil_iib + $es->riil_iiia + $es->riil_iiib + $es->riil_iva + $es->riil_ivb + $es->riil_va + $es->riil_vb;
                ?>
                <tr>
                    <td  align='center'><?php echo $i++; ?></td>
                    <td ><?php echo $es->satker; ?></td>

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
                    <td align='right'><?php echo $totalkursi; ?></td>

                    <td align='right'><?php echo $es->riil_ia; ?> </td>
                    <td align='right' ><?php echo $es->riil_ib; ?></td>
                    <td align='right' ><span class="<?php echo $es->riil_iia != $es->iia ? 'hurufmerah' : '' ?>" ><?php echo $es->riil_iia; ?></span></td>
                    <td align='right' ><span class="<?php echo $es->riil_iib != $es->iib ? 'hurufmerah' : '' ?>" ><?php echo $es->riil_iib; ?></span></td>
                    <td align='right' ><span class="<?php echo $es->riil_iiia != $es->iiia ? 'hurufmerah' : '' ?>" ><?php echo $es->riil_iiia; ?></span></td>
                    <td align='right'><span class="<?php echo $es->riil_iiib != $es->iiib ? 'hurufmerah' : '' ?>" ><?php echo $es->riil_iiib; ?></span></td>
                    <td align='right' ><span class="<?php echo $es->riil_iva != $es->iva ? 'hurufmerah' : '' ?>" ><?php echo $es->riil_iva; ?></span></td>
                    <td align='right' ><span class="<?php echo $es->riil_ivb != $es->ivb ? 'hurufmerah' : '' ?>" ><?php echo $es->riil_ivb; ?></span></td>
                    <td align='right' ><span class="<?php echo $es->riil_va != $es->va ? 'hurufmerah' : '' ?>" ><?php echo $es->riil_va; ?></span></td>
                    <td align='right' ><span class="<?php echo $es->riil_vb != $es->vb ? 'hurufmerah' : '' ?>" ><?php echo $es->riil_vb; ?></span></td>
                    <td align='right'><span class="<?php echo $totalisi != $totalkursi ? 'hurufmerah' : '' ?>" ><?php echo $totalisi; ?></td>                    
                    <td align='right'>
                        <span class="<?php echo ($totalkursi - $totalisi) != 0 ? 'hurufmerah' : '' ?>" > 
                            <?php echo $totalkursi - $totalisi; ?> 
                        </span> 
                    </td>
                </tr>
            <?php } ?>
        </tbody>
        <tfoot>
            <tr>
                <?php $totalkursiall = $tvb + $tva + $tivb + $tiva + $tiiib + $tiiia + $tiib + $tiia + $tib + $tia; ?>
                <?php $totalisiall = $triilvb + $triilva + $triilivb + $triiliva + $triiliiib + $triiliiia + $triiliib + $triiliia + $triilib + $triilia; ?>
                <td  align='right' colspan='2'>Total</td>
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
                <td align='right'> <?php echo $totalkursiall; ?></td>
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
                <td align='right'> <?php echo $totalisiall ?></td>
                <td align='right'> <?php echo $totalkursiall - $totalisiall; ?></td>
            </tr>
        </tfoot>
    </table>
</div>
<script src="<?php echo base_url(); ?>static/js/bezeting/petaeselon.js" type="text/javascript"></script> 