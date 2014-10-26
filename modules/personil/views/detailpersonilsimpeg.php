<ul class="page-breadcrumb breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="<?php echo base_url(); ?>">Home</a> 
        <i class="icon-angle-right"></i>
    </li>     
    <li>
        <a href="<?php echo base_url(); ?>index.php/personil/personildata/index">Daftar Pegawai </a>
        <i class="icon-angle-right"></i>
    </li>
    <li>
        <a href="<?php echo base_url(); ?>index.php/personil/personildata/indexperjenis/<?php echo $jenisjabatan; ?>">Daftar Pegawai Per Jenis Jabatan <?php echo get_nama_jenisjabatan($jenisjabatan); ?></a>
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="#">Detail Data Pegawai <?php echo $peg->peg_nama; ?></a></li>
</ul>
<div class="portlet box blue">
    <div class="portlet-title">
        <div class="caption"><i class="icon-reorder"></i><?php echo $peg->nama_lengkap; ?> - <?php echo $peg->peg_nip_baru; ?></div>
    </div>
    <div class="portlet-body form">
        <!-- BEGIN FORM-->
        <form class="form-horizontal" role="form">
            <div class="form-body">
                <div class="col-md-12">
                    <div class="col-md-5">                      
                    </div> 
                    <div class="col-md-2">
                        <img src="<?php echo PATH_FOTO; ?>/<?php echo $peg->peg_id; ?>.jpg" class="img-responsive img-rounded" />
                    </div>  
                    <div class="col-md-5">                      
                    </div>
                </div>               
                <div class="row"></div>
                <h3 class="form-section">Data Detail Pegawai</h3>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Nip:</label>
                            <div class="col-md-9">
                                <p class="form-control-static"><?php echo isset($peg->peg_nip_baru) && !empty($peg->peg_nip_baru)?$peg->peg_nip_baru:$peg->peg_nip ; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                         
                    </div>
                </div>
                <!--/row-->
                <div class="row">


                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Nama Lengkap</label>
                            <div class="col-md-9">
                                <p class="form-control-static"><?php echo $peg->peg_nama; ?></p>
                            </div>
                        </div>
                    </div>

                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Gelar Depan:</label>
                            <div class="col-md-9">
                                <p class="form-control-static"><?php echo $peg->peg_gelar_depan; ?></p>
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->        
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Tempat, Tanggal Lahir:</label>
                            <div class="col-md-9">
                                <p class="form-control-static"><?php echo $peg->peg_lahir_tempat; ?>, <?php echo strftime("%d-%m-%Y", strtotime($peg->peg_lahir_tanggal)); ?></p>
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Gelar Belakang:</label>
                            <div class="col-md-9">
                                <p class="form-control-static"><?php echo $peg->peg_gelar_belakang; ?></p>
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                </div>



                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Jenis Kelamin:</label>
                            <div class="col-md-9">
                                <p class="form-control-static"><?php echo $peg->peg_jenis_kelamin == 'L' ? "Laki-laki" : "Perempuan"; ?></p>
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Status Perkawinan:</label>
                            <div class="col-md-9">
                                <p class="form-control-static">
                                    <?php echo $peg->peg_status_perkawinan == '2' ? "Belum Kawin" : ""; ?>
                                    <?php echo $peg->peg_status_perkawinan == '3' ? "Janda" : ""; ?>
                                    <?php echo $peg->peg_status_perkawinan == '4' ? "Duda" : ""; ?>
                                    <?php echo $peg->peg_status_perkawinan == '1' ? "Kawin" : ""; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                </div>



                <!--/row-->                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Status Kepegawaian:</label>
                            <div class="col-md-9">
                                <p class="form-control-static"> <?php echo $peg->peg_status_kepegawaian == '2' ? "CPNS" : "PNS"; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">TMT CPNS:</label>
                            <div class="col-md-9">
                                <p class="form-control-static"><?php echo isset($peg->peg_cpns_tmt) ? strftime("%d-%m-%Y", strtotime($peg->peg_cpns_tmt)) : '' ?></p>
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">TMT PNS:</label>
                            <div class="col-md-9">
                                <p class="form-control-static"><?php echo isset($peg->peg_pns_tmt) ? strftime("%d-%m-%Y", strtotime($peg->peg_pns_tmt)) : ''; ?></p>
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->           
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">No. KARPEG:</label>
                            <div class="col-md-9">
                                <p class="form-control-static"><?php echo $peg->peg_karpeg; ?></p>
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">No. Karis/Karsu:</label>
                            <div class="col-md-9">
                                <p class="form-control-static"><?php echo $peg->peg_karsutri; ?></p>
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->           
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Pendidikan Awal:</label>
                            <div class="col-md-9">
                                <p class="form-control-static"><?php echo $peg->nm_pend_awal; ?></p>
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Tahun Pendidikan Awal:</label>
                            <div class="col-md-9">
                                <p class="form-control-static"><?php echo $peg->peg_pend_awal_th; ?></p>
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->           
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Pendidikan Akhir:</label>
                            <div class="col-md-9">
                                <p class="form-control-static"><?php echo $peg->nm_pend_akhir; ?></p>
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Tahun Pendidikan Akhir:</label>
                            <div class="col-md-9">
                                <p class="form-control-static"><?php echo $peg->peg_pend_akhir_th; ?></p>
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->           
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Golongan Awal:</label>
                            <div class="col-md-9">
                                <p class="form-control-static"><?php echo $peg->nm_gol_awal; ?> / <?php echo $peg->nm_pkt_awal; ?> </p>
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">TMT Golongan Awal:</label>
                            <div class="col-md-9">
                                <p class="form-control-static"><?php echo strftime("%d-%m-%Y", strtotime($peg->peg_gol_awal_tmt)); ?></p>
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Golongan Akhir:</label>
                            <div class="col-md-9">
                                <p class="form-control-static"><?php echo $peg->nm_gol_akhir; ?> / <?php echo $peg->nm_pkt_akhir; ?></p>
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">TMT Golongan Akhir:</label>
                            <div class="col-md-9">
                                <p class="form-control-static"><?php echo strftime("%d-%m-%Y", strtotime($peg->peg_gol_akhir_tmt)); ?></p>
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Masa Kerja Golongan:</label>
                            <div class="col-md-9">
                                <p class="form-control-static"> <?php echo $peg->peg_kerja_tahun; ?>&nbsp;Tahun,&nbsp;<?php echo $peg->peg_kerja_bulan; ?>&nbsp;Bulan</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Masa Kerja Sekarang:</label>
                            <div class="col-md-9">
                                <p class="form-control-static"> <?php echo $peg->peg_skr_tahun; ?> Tahun <?php echo $peg->peg_skr_bulan; ?> Bulan</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Jenis Jabatan:</label>
                            <div class="col-md-9">
                                <p class="form-control-static"> <?php echo $peg->nama_jenis_jabatan; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Eselon:</label>
                            <div class="col-md-9">
                                <p class="form-control-static"> <?php echo $peg->eselon_nm; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Nama Jabatan:</label>
                            <div class="col-md-9">
                                <p class="form-control-static"><?php echo $peg->jabatan_nama; ?></p>
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">TMT Nama Jabatan:</label>
                            <div class="col-md-9">
                                <p class="form-control-static"><?php echo strftime("%d-%m-%Y", strtotime($peg->peg_jabatan_tmt)); ?></p>
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Satuan Kerja-Unit Kerja:</label>
                            <div class="col-md-9">
                                <p class="form-control-static"> <?php echo $peg->satuan_kerja_nama; ?>
                                    - <?php echo $peg->tempat_kerja; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Golongan Darah:</label>
                            <div class="col-md-9">
                                <p class="form-control-static"> <?php echo $peg->nm_goldar; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">No. Askes:</label>
                            <div class="col-md-9">
                                <p class="form-control-static"> <?php echo $peg->peg_no_askes; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">NPWP:</label>
                            <div class="col-md-9">
                                <p class="form-control-static"> <?php echo $peg->peg_npwp; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">BAPERTARUM:</label>
                            <div class="col-md-9">
                                <p class="form-control-static"> <?php echo $peg->peg_bapertarum == '2' ? 'Belum Diambil' : 'Sudah Diambil'; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">TMT Gaji Berkala:</label>
                            <div class="col-md-9">
                                <p class="form-control-static"> <?php echo $peg->peg_tmt_kgb != '' ? strftime("%d-%m-%Y", strtotime($peg->peg_tmt_kgb)) : '-'; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Alamat Rumah:</label>
                            <div class="col-md-9">
                                <p class="form-control-static"> <?php echo $peg->peg_rumah_alamat; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Kel./Desa:</label>
                            <div class="col-md-9">
                                <p class="form-control-static"><?php echo $peg->peg_kel_desa; ?></p>
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Kec:</label>
                            <div class="col-md-9">
                                <p class="form-control-static"><?php echo $peg->kecamatan_nm; ?></p>
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Kab./Kota:</label>
                            <div class="col-md-9">
                                <p class="form-control-static"><?php echo $peg->kabupaten_nm; ?></p>
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Kode Pos:</label>
                            <div class="col-md-9">
                                <p class="form-control-static"><?php echo $peg->peg_kodepos; ?></p>
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Telp:</label>
                            <div class="col-md-9">
                                <p class="form-control-static"><?php echo $peg->peg_telp; ?></p>
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">HP:</label>
                            <div class="col-md-9">
                                <p class="form-control-static"><?php echo $peg->peg_telp_hp; ?></p>
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                </div>
            </div>


        </form>
        <!-- END FORM-->  
    </div>
</div>

<script src="<?php echo base_url(); ?>/static/js/personil/alamatriwayat.js" type="text/javascript"></script> 
<script type="text/javascript">
    $(document).ready(function() {
        linkriwayat("<?php echo $jenisjabatan; ?>", "<?php echo $peg->peg_id; ?>", "<?php echo base_url(); ?>");
    });

</script>