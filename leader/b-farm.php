<html> 
<head>
    <title>Kontrol Manual WO</title> 

    <?php
    include "index2.php";
    include "format_tabel.php";
    ?>

</head> 
<body> 

<?php
    ini_set('max_execution_time',60);
    $time1 = microtime(true);

    $lap=$_GET['lap'];
    if(!$lap or $lap==''){$lap=1;}
    $tanggal=$_GET['tanggal'];
    $hari=$_GET['hari'];
    if(!$tanggal or $tanggal=='' or !$hari or $hari==''){$tanggal=date('j/n/y');}
    if(!$hari or $hari=='') {$hari=0;}
    if($hari>31) {$hari=31;}
    $selisih = "-".$hari." days";
    $tanggal=date('j/n/y',strtotime($selisih));
    $tgl_array=explode('/',$tanggal);
    $tgl=$tgl_array[0];
    $no_bulan=$tgl_array[1];
    $thn=$tgl_array[2]+2000;

    if($no_bulan=='1'){$nama_bulan='Januari';}
    elseif($no_bulan=='2'){$nama_bulan='Februari';}
    elseif($no_bulan=='3'){$nama_bulan='Maret';}
    elseif($no_bulan=='4'){$nama_bulan='April';}
    elseif($no_bulan=='5'){$nama_bulan='Mei';}
    elseif($no_bulan=='6'){$nama_bulan='Juni';}
    elseif($no_bulan=='7'){$nama_bulan='Juli';}
    elseif($no_bulan=='8'){$nama_bulan='Agustus';}
    elseif($no_bulan=='9'){$nama_bulan='September';}
    elseif($no_bulan=='10'){$nama_bulan='Oktober';}
    elseif($no_bulan=='11'){$nama_bulan='Nopember';}
    elseif($no_bulan=='12'){$nama_bulan='Desember';}
    
    $teritori=strtoupper($_GET['teritori']);
    $gid=array(1494384457,635771051,202430796,1224561183); //Gid Subang lama 1111168908
    $b=count($gid);
    $nama=array('Karawang','Purwakarta','Subang','Migrate');
    $b=3;
    $teritori=array('KWA','PWK','SUB','MIG');
    $kendala=$_GET['kendala'];
    $status=array('Estimasi PS','Kendala Teknis','Kendala Pelanggan','Kendala System','WO OGP');
    $mulai=array(0,4,8,15,22);
    $cek_wo_kdl=array('PS','OMP','wos','AHR','enuh','los','pt','go','resc','rukos','onfir','rna','end','atal','alam','vat','data','wfm','MANDE','voke','alah','oub','urve','upd','ore','wait','over');
    $no_huruf=array('a','b','c','d','e','f','g','h');
    $nama_wo=array('PS','ACT COMP','RWOS','AHR','ODP Penuh','ODP Loss','Harus PT2/3','ODP belum golive','Reschedule','Rumah kosong','Menunggu konfirmasi','CP RNA','Pending','Pelanggan batal','Alamat tidak valid','Fallout Activation','Fallout Data','Fallout WFM','System Mandeg','Revoke','Salah input','Double input','Sedang disurvey teknisi','Belum ada update info','WO sore','Wait for payment','WO overload');
    $est_prosen=array('100','100','100','80','0','0','0','0','0','0','40','0','0','0','0','80','40','40','40','0','0','0','5','0','0','0','0');
    $e=array_search($kendala,$cek_wo_kdl);
    $nama_kendala=$nama_wo[$e];

    if($lap==1){
        echo '<div align="center" valign="middle" style="height:100%;vertical-align:middle;">';
        echo "<b><big><big><big>Kontrol Manual WO Witel Karawang</big></big></big></b><br>";
        echo '<b><big><big>Tanggal : <font color=red>'.$tgl.' '.bulan($no_bulan).' '.$thn.'</font></big></big></b><br><br>';

        $d=$e=$f=$g=$h=$i=$j=$k=0;
        for($a=0; $a<$b; $a++){
            $sumber='https://docs.google.com/spreadsheets/d/e/2PACX-1vS3HycyNM3NDAf8z0yoRg2DLxG0yowdIrw9rTvZIrikBPkzU1xDoV-a1I98qWL9iG4g2KuqAP8qRxOk/pub?gid='.$gid[$a].'&single=true&output=csv';
            if (($handle = fopen($sumber, "r")) !== FALSE) { 
                while (($baris = fgetcsv($handle, 1000, ',')) !== FALSE) { 
                    if($baris[1]==$tanggal) {
                    //if($baris[1]==$tanggal and $baris[2]<>'') { aslinya ini
                        if(substr($baris[10],0,2)=='AO' and ($baris[11]!=='VOICE' or $baris[11]!=='1P')){
                            $kendala[$d]=$baris[17];
                        }
                        //All progress WO
                        $cek_wo_kdl=array('PS','OMP','wos','AHR','enuh','los','pt','go','resc','rukos','onfir','rna','end','atal','alam','vat','data','wfm','MANDE','voke','alah','oub','urve','upd','ore','wait','over');
                        $jml_cek_wo_kdl=count($cek_wo_kdl);
                        for($m=0; $m<$jml_cek_wo_kdl; $m++){
                            if(preg_match('/'.$cek_wo_kdl[$m].'/i', $kendala[$d])) {$jml_wo_kdl[$a][$m]++;}
                        }
                        $d++; $e++; $f++; $g++; $h++; $i++; $j++;
                    }
                } 
                fclose($handle); 
            }
        }

        echo '<table>';
        echo '<tr>';
        echo "<th>No.</th>";
        echo "<th>Progress WO</th>";
        for($a=0; $a<$b; $a++){
            echo '<th>'.$teritori[$a].'</th>';
        }
        echo '<th>Jumlah</th>';
        echo '<th></th>';
        echo '<th>Est. PS</th>';
        echo '<th>Jml. Est.</th>';

        $jml_cek_wo_kdl=count($cek_wo_kdl);

        for($d=0; $d<count($mulai); $d++){
            $e=$mulai[$d];
            $f=$mulai[$d+1];
            if($d==4){$f=$jml_cek_wo_kdl;}
            for($m=$e; $m<$f; $m++){
                echo '<tr>';
                echo '<td align="center">'.$no_huruf[$m-$e].'.</td>';
                echo '<td>'.$nama_wo[$m].'</td>';
                $tot_ps=0;
                for($a=0; $a<$b; $a++){
                    echo '<td align="center"><a href="fam2.php?lap=2&teritori='.$teritori[$a].'&tanggal='.$tanggal.'&hari='.$hari.'&kendala='.$cek_wo_kdl[$m].'" target="_blank">'.$jml_wo_kdl[$a][$m].'</a></td>';
                    $tot_ps=$tot_ps+$jml_wo_kdl[$a][$m];
                }
                echo '<td align="center"><a href="fam2.php?lap=3&tanggal='.$tanggal.'&hari='.$hari.'&kendala='.$cek_wo_kdl[$m].'" target="_blank">'.$tot_ps.'</a></td>';
                echo '<td></td>';
                echo '<td align="center">'.$est_prosen[$m].'%</td>';
                $jml_est_ps=$est_prosen[$m]/100*$tot_ps;
                $tot_est_ps=$tot_est_ps+$jml_est_ps;
                $jml_3p=0.45*$tot_est_ps;
                $jml_2p=$tot_est_ps-$jml_3p;
                echo '<td align="center">'.number_format($jml_est_ps,0).'</td>';
            }
            echo '<tr>';
            echo '<td></td>';
            if($status[$d]=='Kendala Teknis'){
                echo '<td><b><a href="fam2.php?lap=5" target="_blank">Jumlah '.$status[$d].'</a></b></td>';
            }
            else{
                echo '<td><b>Jumlah '.$status[$d].'</b></td>';
            }
            for($a=0; $a<$b; $a++){
                $jml_ps[$a]=0;
            }
            $tot_est=0;
            for($a=0; $a<$b; $a++){
                for($m=$e; $m<$f; $m++){
                    $jml_ps[$a]=$jml_ps[$a]+$jml_wo_kdl[$a][$m];
                }
                echo '<td align="center"><b>'.$jml_ps[$a].'</b></td>';
                $tot_est=$tot_est+$jml_ps[$a];
            }
            echo '<td align="center"><b>'.$tot_est.'</b></td>';
            echo '<td></td>';
            echo '<td></td>';
            echo '<td align="center"><b>'.number_format($tot_est_ps,0).'</b></td>';
            echo '</tr>';
        }
        for($a=0; $a<$b; $a++){
            $jml_ps[$a]=0;
        }
        $tot_est=0;

        echo '<tr>';
        echo '<td></td>';
        echo '<td><b>Total WO</b></td>';
        for($a=0; $a<$b; $a++){
            for($m=0; $m<$jml_cek_wo_kdl; $m++){
                $jml_ps[$a]=$jml_ps[$a]+$jml_wo_kdl[$a][$m];
            }
            echo '<td align="center"><b>'.$jml_ps[$a].'</b></td>';
            $tot_est=$tot_est+$jml_ps[$a];
        }
        echo '<td align="center"><b>'.$tot_est.'</b></td>';
        echo '<td></td>';
        echo '<td colspan="2" align="center"><b>3P = '.number_format($jml_3p,0).', 2P = '.number_format($jml_2p,0).'</b></td>';
        echo '</tr>';
    }

    if($lap==2){
        $teritori=strtoupper($_GET['teritori']);

        if(!$teritori or $teritori==''or $teritori=='KWA') {$gid=1494384457; $nama='Karawang';}
        if($teritori=='PWK') {$gid=635771051; $nama='Purwakarta';}
        if($teritori=='SUB') {$gid=202430796; $nama='Subang';}
        if($teritori=='MIG') {$gid=1224561183; $nama='Migrate';}
        $sumber='https://docs.google.com/spreadsheets/d/e/2PACX-1vS3HycyNM3NDAf8z0yoRg2DLxG0yowdIrw9rTvZIrikBPkzU1xDoV-a1I98qWL9iG4g2KuqAP8qRxOk/pub?gid='.$gid.'&single=true&output=csv';
        
        echo '<div align="center" valign="middle" style="height:100%;vertical-align:middle;">';
        echo "<b><big><big><big>Kontrol Manual WO ".$nama."</big></big></big></b><br>";
        echo "<b><big><big>Status : <font color=red>".$nama_kendala."</font></big></big></b><br>";
        echo "<b><big><big>Tanggal : <font color=red>".$tgl." ".$nama_bulan." ".$thn."</font></big></big></b><br><br>";
    
        echo '<table>';
        echo '<tr>';
        echo "<th>No.</th>";
        echo "<th>Tgl.</th>";
        echo "<th>No. SC</th>";
        echo "<th>No. WO.</th>";
        echo "<th>Nama</th>";
        echo "<th>Alamat</th>";
        echo "<th>Transaksi</th>";
        echo "<th>STO</th>";
        echo "<th>Teknisi</th>";
        echo "<th>Keterangan</th>";
        $d=1;
        if (($handle = fopen($sumber, "r")) !== FALSE) { 
            $i = 1; 
            while (($baris = fgetcsv($handle, 1000, ',')) !== FALSE) { 
                if($baris[1]==$tanggal) {
                //if($baris[1]==$tanggal and $baris[2]<>'') { aslinya ini
                    if(preg_match('/'.$kendala.'/i', $baris[17]) and substr($baris[10],0,2)=='AO'){
                        echo '<tr>';
                        echo '<td align="center">'.$d.'</td>';
                        echo '<td>'.$baris[1].'</td>';
                        echo '<td><a href="../ncx/detailsc.php?cari='.$baris[2].'" target="_blank">'.$baris[2].'</a></td>';
                        echo '<td>'.$baris[3].'</td>';
                        echo '<td><a href="fam2.php?lap=4&cari='.$baris[7].'" target="_blank">'.$baris[7].'</a></td>';
                        echo '<td>'.$baris[8].'</td>';
                        echo '<td>'.$baris[10].' - '.$baris[11].'</td>';
                        echo '<td>'.$baris[12].'</td>';
                        echo '<td>'.$baris[14].'</td>';
                        echo '<td>'.$baris[16].'</td>';
                        $d++;
                    }
                }
                $i++; 
            } 
            fclose($handle); 
        }
    }

    if($lap==3){
        $kendala=$_GET['kendala'];

        echo '<div align="center" valign="middle" style="height:100%;vertical-align:middle;">';
        echo "<b><big><big><big>Kontrol Manual WO Karawang</big></big></big></b><br>";
        echo "<b><big><big>Status : <font color=red>".$nama_kendala."</font></big></big></b><br>";
        echo "<b><big><big>Tanggal : <font color=red>".$tgl." ".$nama_bulan." ".$thn."</font></big></big></b><br><br>";
    
        echo '<table>';
        echo '<tr>';
        echo "<th>No.</th>";
        echo "<th>Datel</th>";
        //echo "<th>Tgl.</th>";
        echo "<th>No. SC</th>";
        echo "<th>No. WO.</th>";
        echo "<th>Nama</th>";
        echo "<th>Alamat</th>";
        echo "<th>Transaksi</th>";
        echo "<th>STO</th>";
        echo "<th>Teknisi</th>";
        echo "<th>Keterangan</th>";
        $d=1;
        for($a=0; $a<$b; $a++){
            $sumber='https://docs.google.com/spreadsheets/d/e/2PACX-1vS3HycyNM3NDAf8z0yoRg2DLxG0yowdIrw9rTvZIrikBPkzU1xDoV-a1I98qWL9iG4g2KuqAP8qRxOk/pub?gid='.$gid[$a].'&single=true&output=csv';
            if (($handle = fopen($sumber, "r")) !== FALSE) { 
                $i = 1; 
                while (($baris = fgetcsv($handle, 1000, ',')) !== FALSE) { 
                    if($baris[1]==$tanggal) {
                    //if($baris[1]==$tanggal and $baris[2]<>'') { aslinya ini
                            if(preg_match('/'.$kendala.'/i', $baris[17]) and substr($baris[10],0,2)=='AO'){
                            echo '<tr>';
                            echo '<td align="center">'.$d.'</td>';
                            echo '<td>'.$nama[$a].'</td>'; 
                            //echo '<td>'.$baris[1].'</td>';
                            echo '<td><a href="../ncx/detailsc.php?cari='.$baris[2].'" target="_blank">'.$baris[2].'</a></td>';
                            echo '<td>'.$baris[3].'</td>';
                            echo '<td><a href="fam2.php?lap=4&cari='.$baris[7].'" target="_blank">'.$baris[7].'</a></td>';
                            echo '<td>'.$baris[8].'</td>';
                            echo '<td>'.$baris[10].' - '.$baris[11].'</td>';
                            echo '<td>'.$baris[12].'</td>';
                            echo '<td>'.$baris[14].'</td>';
                            echo '<td>'.$baris[16].'</td>';
                            $d++;
                        }
                    }
                    $i++; 
                } 
                fclose($handle); 
            }
        }
    }

    if($lap==4){
        if($_GET['cari']){$cari=$_GET['cari'];}else{$cari=$_POST['cari'];}
        if(strlen($cari)<4)
        {
            echo "<script>alert('Data input tidak lengkap !!');history.go(-1);</script>"; 
            exit;   
        }

        echo '<div align="center" valign="middle" style="height:100%;vertical-align:middle;">';
        echo "<b><big><big><big>Hasil Pencarian di <font color=red>Gdocs FAM</font></big></big></big></b><br><br>";

        echo '<table>';
        echo '<tr>';
        echo "<th>No.</th>";
        echo "<th>Datel</th>";
        echo "<th>Tgl.</th>";
        echo "<th>No. SC</th>";
        echo "<th>No. WO.</th>";
        echo "<th>Nama</th>";
        echo "<th>Alamat</th>";
        echo "<th>Transaksi</th>";
        echo "<th>STO</th>";
        echo "<th>Teknisi</th>";
        echo "<th>Keterangan</th>";
        echo '</tr>';

        $b=1;
        for($a=0; $a<count($gid); $a++){
            $sumber = 'https://docs.google.com/spreadsheets/d/e/2PACX-1vS3HycyNM3NDAf8z0yoRg2DLxG0yowdIrw9rTvZIrikBPkzU1xDoV-a1I98qWL9iG4g2KuqAP8qRxOk/pub?gid='.$gid[$a].'&single=true&output=csv';
            if (($handle = fopen($sumber, "r")) !== FALSE) { 
                while (($baris = fgetcsv($handle, 1000, ',')) !== FALSE) { 
                    if($baris[1]<>'') {
                        if(preg_match('/'.$cari.'/i', $baris[2]) or preg_match('/'.$cari.'/i', $baris[7])){
                            echo '<tr>';
                            echo '<td align="center">'.$b.'</td>';
                            echo '<td>'.$nama[$a].'</td>';
                            echo '<td>'.$baris[1].'</td>';
                            echo '<td><a href="../ncx/detailsc.php?cari='.$baris[2].'" target="_blank">'.$baris[2].'</a></td>';
                            echo '<td>'.$baris[3].'</td>';
                            echo '<td>'.$baris[7].'</td>';
                            echo '<td>'.$baris[8].'</td>';
                            echo '<td>'.$baris[10].' - '.$baris[11].'</td>';
                            echo '<td>'.$baris[12].'</td>';
                            echo '<td>'.$baris[14].'</td>';
                            echo '<td>'.$baris[16].'</td>';
                            echo '</tr>';
                            $b++;
                        }
                    }
                } 
                fclose($handle); 
            }
        }    
        echo '</table>';
        echo '<br><br>';
        /*
        echo '<b><big><big><big>Hasil Pencarian di <font color=red>Gdocs Input Sales</font></big></big></big></b><br><br>';

        echo '<table>';
        echo '<tr>';
        echo "<th>No.</th>";
        echo "<th>Tgl. Input Gdocs</th>";
        echo "<th>Nama</th>";
        echo "<th>Alamat</th>";
        echo "<th>No. HP</th>";
        echo "<th>Paket Indihome</th>";
        echo "<th>Datek ODP</th>";
        echo "<th>Kode SF</th>";
        echo "<th>STO</th>";
        echo '</tr>';
        $gid_sales=array(1231269391,2125962050);
        $b=1;
        for($a=0; $a<count($gid_sales); $a++){
            $sumber = 'https://docs.google.com/spreadsheets/d/e/2PACX-1vQhWyUvviO0VjDqMZItJLYgOn5xrC3EpuVMYO8um_atP5oQPAC-YImmj5tJGeIWzJVtxKJef033nQnp/pub?gid='.$gid_sales[$a].'&single=true&output=csv';
            if (($handle = fopen($sumber, "r")) !== FALSE) { 
                while (($baris = fgetcsv($handle, 1000, ',')) !== FALSE) { 
                    if($baris[1]<>'') {
                        if(preg_match('/'.$cari.'/i', $baris[1])){
                            echo '<tr>';
                            echo '<td align="center">'.$b.'</td>';
                            echo '<td>'.$baris[1].'</td>';
                            echo '<td>'.$baris[0].'</td>';
                            echo '<td>'.$baris[2].', '.$baris[3].', '.$baris[4].'</td>';
                            echo '<td>'.$baris[5].'</td>';
                            echo '<td>'.$baris[7].'</td>';
                            echo '<td>'.$baris[8].'</td>';
                            echo '<td>'.$baris[9].'</td>';
                            echo '<td>'.substr($baris[10],0,3).'</td>';
                            echo '</tr>';
                            $b++;
                        }
                    }
                } 
                fclose($handle); 
            }
        }    
        */
    }

    echo '</table>';
    echo '<br>';

?>
    <table class="table1" align="center">
    <tr>
    <td class="table1" align="center" valign="middle">
    <form action="fam2.php?lap=4" method="post" target="_blank">
        <input type="text" size="20" value="" placeholder='No. SC / Nama Pelanggan' name="cari" id="cari" style="background-color:lightgreen;font-size:10px;" autofocus>
        <input type="submit" value="  Cari di Gdocs FAM & Input Sales "  style="font-size : 10px;">
    </form>
    <?php echo '<a href="ffdigichannel.php?lap=3" target="_blank">WO Pull On Progress</a>';
    ?>
    </td>
    </tr>
    </table>

<?php        
    //onchange="this.form.submit()" sebelum autofocus
    //echo '<a href="cbd_ps.php?lap=4"><button class="button2 button1">- Progress WO per Channel -</button></a><br>';
    echo "<center><i><small><font color=grey>Processed at ".date('d-m-Y H:i:s')." in ".number_format(microtime(true) - $time1, 1)." s</font></i></small></center>";
    echo "<center><i><small><font color=grey>Copyright@Witel Karawang 2019 - ver 1.0</font></i></small></center>";

?>

</body> 
</html>