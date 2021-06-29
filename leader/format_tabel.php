<style type="text/css">
body {
    font-family:arial, sans-serif;
    font-size:small;
} 

table {
    border-collapse: collapse;
    margin: auto;
}

.table1 td {
    border-collapse: collapse;
    border: 0px none;
    vertical-align: top;
    align: center;
    margin: auto;
    background-color: #FFFFFF;
}

th{
    border: 1px solid lightgrey;
    padding: 1px;
    text-align: center;
    font-family:arial, sans-serif;
    font-size:small;
}

    tr:nth-child(odd) {background-color: #f2f2f2}
    tr:hover {background-color: #FFFF99}
    
td {
    border: 1px solid lightgrey;
    padding: 1px;
    vertical-align: center;
    font-family:arial, sans-serif;
    font-size:small;
}

.table2 td {
    border: 1px solid lightgrey;
    padding: 1px;
    vertical-align: center;
    font-family:arial, sans-serif;
    font-size:small;
}

.table2 tr:nth-child(odd) {background-color: #f2f2f2}
.table2 tr:hover {background-color: #FFFF99}

.is-hidden {
    display: none;
}

.btn {
    background: #ccc;
    border-radius: 3px;
    display: inline-block;
    padding: 5px;
    text-align: center;
    float: center;
}

.blink_text {
    animation:2s blinker linear infinite;
    -webkit-animation:2s blinker linear infinite;
    -moz-animation:2s blinker linear infinite;
    color: red;
}

@-moz-keyframes blinker {  
    0% { opacity: 1.0; }
    50% { opacity: 0.0; }
    100% { opacity: 1.0; }
}

@-webkit-keyframes blinker {  
    0% { opacity: 1.0; }
    50% { opacity: 0.0; }
    100% { opacity: 1.0; }
}

@keyframes blinker {  
    0% { opacity: 1.0; }
    50% { opacity: 0.0; }
    100% { opacity: 1.0; }
}

body {
    padding: 0px;
}

a:link {
    text-decoration: none;
}

a:visited {
    text-decoration: none;
    color: grey;
}

a:hover {
    text-decoration: underline;
}

a:active {
    text-decoration: underline;
}

.tooltip {
    position: relative;
    display: inline-block;
    border-bottom: 0px dotted #ccc;
}

.tooltip .tooltiptext {
    visibility: hidden;
    width:auto;
    height:auto;
    background:lightyellow;
    position:absolute;
    z-index:10001;
    padding:5px 9px 5px 9px ;
    line-height: 100%;
    border: 1px solid rgb(108, 108, 108);
    box-shadow: 1px 2px 6px rgba(0, 0, 0, 0.4);
    border-radius : 6px;
    opacity: 0;
    transition: opacity 0.5s;	
}

.tooltip:hover .tooltiptext {
    visibility: visible;
    opacity: 1;
}

.tooltip-right {
    top: -5px;
    left: 125%;  
}

.tooltip-right::after {
    content: "";
    position: absolute;
    top: 50%;
    right: 100%;
    margin-top: -5px;
    border-width: 5px;
    border-style: solid;
    border-color: transparent yellow transparent transparent;
}

.tooltip-bottom {
    top: 135%;
    left: 50%;  
    margin-left: -60px;
}

.tooltip-bottom::after {
    content: "";
    position: absolute;	
    bottom: 100%;
    left: 50%;
    margin-left: -5px;
    border-width: 5px;
    border-style: 0px solid;
    border-color: transparent transparent transparent transparent;
}

.tooltip-top {
    bottom: 125%;
    left: 50%;  
    margin-left: -60px;
}

.tooltip-top::after {
    content: "";
    position: absolute;
    top: 100%;
    left: 50%;
    margin-left: -5px;
    border-width: 5px;
    border-style: solid;
    border-color: yellow transparent transparent transparent;
}

.tooltip-left {
    top: -5px;
    bottom:auto;
    right: 128%;  
}

.tooltip-left::after {
    content: "";
    position: absolute;
    top: 50%;
    left: 100%;
    margin-top: -5px;
    border-width: 5px;
    border-style: solid;
    border-color: transparent transparent transparent yellow;
}

progress {
    /* RESETS */
    border: 1;
    width: 360px;
    height: 5px;
    border-radius: 9px;
    color: green;
    background-color: white;
}

progress::-webkit-progress-bar {
    background-color: white;
    border-radius: 9px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1) inset;
}

progress::-webkit-progress-value {
    background: green;
    border-radius: 9px;
}

progress::-moz-progress-bar {
    /*background: green;*/
    background-color: green;
    border-radius: 9px;
}

iframe {
    visibility: hidden;
    position: absolute;
    left: 0; top: 0;
    height:0; width:0;
    border: none;
}
</style>

<style>
.align-middle{
vertical-align: middle !important;
}
</style>

<style>
.button {
    background-color: grey; 
    border: none;
    color: white;
    padding: 3px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 11px;
    margin: 3px 3px;
    cursor: pointer;
}
.button2 {
    background-color: green;
    border: none;
    color: white;
    padding: 3px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 11px;
    margin: 3px 3px;
    cursor: pointer;
}
.button1 {
    border-radius: 10px;
}
</style>

<?php
    //Fungsi utk grab content web
    function file_get_contents_curl_u($url) {
        $ch = curl_init();
        //curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 200);
        curl_setopt($ch, CURLOPT_URL, $url);
        //curl_setopt($ch, CURLOPT_HTTPHEADER,$opsi);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }

    //Fungsi utk grab content web dengan header dan hasil awal karakternya aneh
    function file_get_contents_curl_uha($url,$opsi) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 200);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_ENCODING, "gzip,deflate");
        curl_setopt($ch, CURLOPT_HTTPHEADER,$opsi);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }

    //Fungsi utk grab content web dengan header dan hasil awal karakternya aneh
    function file_get_contents_curl_uhag($url,$opsi,$opsi2) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
        //curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 200);
        curl_setopt($ch, CURLOPT_URL, $url);
        //curl_setopt($ch, CURLOPT_ENCODING, "gzip,deflate");
        curl_setopt($ch, CURLOPT_HTTPHEADER, $opsi);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $opsi2);  
        //curl_setopt($ch, CURLOPT_HTTPGET, TRUE);
        //curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        //curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        //curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        //curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POST, FALSE);
        curl_setopt($ch, CURLOPT_HTTPGET, TRUE);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }

    //Fungsi utk grab content web dengan header, parameter dan hasil awal karakternya aneh
    function file_get_contents_curl_uhpa($url,$opsi,$opsi2) {
        $ch = curl_init();
        //curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 200);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_ENCODING, "gzip,deflate");
        curl_setopt($ch, CURLOPT_HTTPHEADER, $opsi);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $opsi2);  
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }

    //Fungsi utk grab content web dengan parameter dan hasil awal karakternya aneh
    function file_get_contents_curl_upa($url,$opsi2) {
        $ch = curl_init();
        //curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 200);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_ENCODING, "gzip,deflate");
        //curl_setopt($ch, CURLOPT_HTTPHEADER, $opsi);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $opsi2);  
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }

    //Fungsi utk grab content web dengan header
    function file_get_contents_curl_uh($url,$opsi) {
        $ch = curl_init();
        //curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 200);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER,$opsi);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }

    //Fungsi utk grab content web dengan parameter
    function file_get_contents_curl_up($url,$opsi2) {
        $ch = curl_init();
        //curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 200);
        curl_setopt($ch, CURLOPT_URL, $url);
        //curl_setopt($ch, CURLOPT_HTTPHEADER,$opsi1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$opsi2);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }

    //Fungsi utk grab content web dengan parameter dan header
    function file_get_contents_curl_uhp($url,$opsi1,$opsi2) {
        $ch = curl_init();
        //curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 200);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER,$opsi1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$opsi2);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }

    //Fungsi utk mengubah format tanggal agar seragam menjadi yyyy-mm-dd
    function ubah($tgl_baru){
        $tgl_aktif=explode('/',$tgl_baru); //Tgl. Aktifitas
        $tgl_saja=$tgl_aktif[1];
        $bln_saja=$tgl_aktif[0];
        $thn_saja=$tgl_aktif[2];
        if($tgl_saja<10){$tgl_saja='0'.$tgl_saja;}
        if($bln_saja<10){$bln_saja='0'.$bln_saja;}
        $tgl_aktif1=$thn_saja.'-'.$bln_saja.'-'.$tgl_saja;
        return $tgl_aktif1;
    }

    //Fungsi utk mengubah format tanggal Indonesia menjadi English, contoh: 19-Agu-20 menjadi 19-Aug-20
    function ubah_tgl1($tgl_lama){
        //$bln_saja=substr($tgl_lama,4,3);
        $tgl_aktif=explode('-',$tgl_lama); //Tgl. Aktifitas
        $bln_saja=$tgl_aktif[1];
        if($bln_saja=='Jan'){$tgl_baru=str_replace('Jan','Jan',$tgl_lama);}
        if($bln_saja=='Peb'){$tgl_baru=str_replace('Peb','Feb',$tgl_lama);}
        if($bln_saja=='Mar'){$tgl_baru=str_replace('Mar','Mar',$tgl_lama);}
        if($bln_saja=='Apr'){$tgl_baru=str_replace('Apr','Apr',$tgl_lama);}
        if($bln_saja=='Mei'){$tgl_baru=str_replace('Mei','May',$tgl_lama);}
        if($bln_saja=='Jun'){$tgl_baru=str_replace('Jun','Jun',$tgl_lama);}
        if($bln_saja=='Jul'){$tgl_baru=str_replace('Jul','Jul',$tgl_lama);}
        if($bln_saja=='Agu'){$tgl_baru=str_replace('Agu','Aug',$tgl_lama);}
        if($bln_saja=='Sep'){$tgl_baru=str_replace('Sep','Sep',$tgl_lama);}
        if($bln_saja=='Okt'){$tgl_baru=str_replace('Okt','Oct',$tgl_lama);}
        if($bln_saja=='Nop'){$tgl_baru=str_replace('Nop','Nov',$tgl_lama);}
        if($bln_saja=='Des'){$tgl_baru=str_replace('Des','Dec',$tgl_lama);}
        $tgl_baru=date('j-M-y',strtotime($tgl_baru));
        return $tgl_baru;
    }

    //Fungsi utk mengubah format tanggal English menjadi Indonesia, contoh: 19-Aug-20 menjadi 19-Agu-20
    function ubah_tgl2($tgl_lama){
        //$bln_saja=substr($tgl_lama,4,3);
        $tgl_aktif=explode('-',$tgl_lama); //Tgl. Aktifitas
        $bln_saja=$tgl_aktif[1];
        if($bln_saja=='Jan'){$tgl_baru=str_replace('Jan','Jan',$tgl_lama);}
        if($bln_saja=='Feb'){$tgl_baru=str_replace('Feb','Peb',$tgl_lama);}
        if($bln_saja=='Mar'){$tgl_baru=str_replace('Mar','Mar',$tgl_lama);}
        if($bln_saja=='Apr'){$tgl_baru=str_replace('Apr','Apr',$tgl_lama);}
        if($bln_saja=='May'){$tgl_baru=str_replace('May','Mei',$tgl_lama);}
        if($bln_saja=='Jun'){$tgl_baru=str_replace('Jun','Jun',$tgl_lama);}
        if($bln_saja=='Jul'){$tgl_baru=str_replace('Jul','Jul',$tgl_lama);}
        if($bln_saja=='Aug'){$tgl_baru=str_replace('Aug','Agu',$tgl_lama);}
        if($bln_saja=='Sep'){$tgl_baru=str_replace('Sep','Sep',$tgl_lama);}
        if($bln_saja=='Oct'){$tgl_baru=str_replace('Oct','Okt',$tgl_lama);}
        if($bln_saja=='Nov'){$tgl_baru=str_replace('Nov','Nop',$tgl_lama);}
        if($bln_saja=='Dec'){$tgl_baru=str_replace('Dec','Des',$tgl_lama);}
        //$tgl_baru=date('j-M-y',strtotime($tgl_baru));
        return $tgl_baru;
    }

    //Fungsi utk mengubah angka bulan menjadi nama bulan
    function bulan($no_bulan){
        if($no_bulan=='1' or $no_bulan=='01' or $no_bulan=='Jan'){$nama_bulan='Januari';}
        elseif($no_bulan=='2' or $no_bulan=='02' or $no_bulan=='Feb'){$nama_bulan='Februari';}
        elseif($no_bulan=='3' or $no_bulan=='03' or $no_bulan=='Mar'){$nama_bulan='Maret';}
        elseif($no_bulan=='4' or $no_bulan=='04' or $no_bulan=='Apr'){$nama_bulan='April';}
        elseif($no_bulan=='5' or $no_bulan=='05' or $no_bulan=='May'){$nama_bulan='Mei';}
        elseif($no_bulan=='6' or $no_bulan=='06' or $no_bulan=='Jun'){$nama_bulan='Juni';}
        elseif($no_bulan=='7' or $no_bulan=='07' or $no_bulan=='Jul'){$nama_bulan='Juli';}
        elseif($no_bulan=='8' or $no_bulan=='08' or $no_bulan=='Aug'){$nama_bulan='Agustus';}
        elseif($no_bulan=='9' or $no_bulan=='09' or $no_bulan=='Sep'){$nama_bulan='September';}
        elseif($no_bulan=='10' or $no_bulan=='Oct'){$nama_bulan='Oktober';}
        elseif($no_bulan=='11' or $no_bulan=='Nov'){$nama_bulan='Nopember';}
        elseif($no_bulan=='12' or $no_bulan=='Dec'){$nama_bulan='Desember';}
        return $nama_bulan;    
    }

    //Fungsi utk mengetahui nama STO dari nomor Indihome di Witel Karawang saja
    function cek_sto($no_inet){
        $kode=substr($no_inet,3,3);
        if($kode=='267'){$nama_sto='CAS';}
        if($kode=='807'){$nama_sto='CBU';}
        if($kode=='816'){$nama_sto='CKP';}
        if($kode=='818'){$nama_sto='CLM';}
        if($kode=='820'){$nama_sto='CPL';}
        if($kode=='269'){$nama_sto='JCG';}
        if($kode=='817'){$nama_sto='JTS';}
        if($kode=='265' or $kode=='725'){$nama_sto='KIA';}
        if($kode=='813'){$nama_sto='KLI';}
        if($kode=='810' or $kode=='811'){$nama_sto='KRW';}
        if($kode=='270'){$nama_sto='PBS';}
        if($kode=='268'){$nama_sto='PGD';}
        if($kode=='806'){$nama_sto='PLD';}
        if($kode=='264'){$nama_sto='PMN';}
        if($kode=='805'){$nama_sto='PWK';}
        if($kode=='814'){$nama_sto='RDK';}
        if($kode=='262'){$nama_sto='SUB';}
        if($kode=='810' or $kode=='812'){$nama_sto='TLJ';}
        if($kode=='815'){$nama_sto='WDS';}
        return $nama_sto;    
    }

    //Fungsi utk mengetahui nama STO dari nomor Indihome di Witel Karawang saja
    function cek_ubis($stonya){
        if($stonya=='CBU' or $stonya=='PLD' or $stonya=='PWK'){$nama_ubis='PWK';}
        if($stonya=='CKP' or $stonya=='CLM' or $stonya=='JTS'){$nama_ubis='CKP';}

        if($stonya=='SUB' or $stonya=='JCG'){$nama_ubis='SUB-1';}
        if($stonya=='CAS' or $stonya=='KIA' or $stonya=='PBS' or $stonya=='PGD' or $stonya=='PMN'){$nama_ubis='SUB-2';}

        if($stonya=='KRW' or $stonya=='RDK'){$nama_ubis='INN-1';}
        if($stonya=='CPL' or $stonya=='KLI' or $stonya=='TLJ' or $stonya=='WDS'){$nama_ubis='INN-2';}

        return $nama_ubis;
    }

    //Fungsi utk mengetahui nama Workzone dari kode STO
    function workzone($nama_sto){
        if($nama_sto=='CKP' or $nama_sto=='CLM' or $nama_sto=='JTS'){$nama_workzone='Cikampek';}
        if($nama_sto=='KWA' or $nama_sto=='KRW' or $nama_sto=='RDK'){$nama_workzone='Karawang';}
        if($nama_sto=='PWK' or $nama_sto=='CBU'){$nama_workzone='Purwakarta-1';}
        if($nama_sto=='PLD'){$nama_workzone='Purwakarta-2';}
        if($nama_sto=='SUB' or $nama_sto=='JCG'){$nama_workzone='Subang-1';}
        if($nama_sto=='KIA' or $nama_sto=='CAS' or $nama_sto=='PMN' or $nama_sto=='PGD' or $nama_sto=='PBS'){$nama_workzone='Subang-2';}
        if($nama_sto=='TLJ' or $nama_sto=='CPL'){$nama_workzone='Telukjambe';}
        if($nama_sto=='WDS' or $nama_sto=='KLI'){$nama_workzone='Klari';}
        return $nama_workzone;
    }

    //Fungsi utk mengetahui nama Datel dari nama STO
    function datelnya($nama_sto){
        if($nama_sto=='KRW' or $nama_sto=='KWA' or $nama_sto=='KLI' or $nama_sto=='WDS' or $nama_sto=='TLJ' or $nama_sto=='RDK' or $nama_sto=='CPL'){$nama_datel='Karawang';}
        if($nama_sto=='PWK' or $nama_sto=='PLD' or $nama_sto=='CBU' or $nama_sto=='CKP' or $nama_sto=='CLM' or $nama_sto=='JTS'){$nama_datel='Purwakarta';}
        if($nama_sto=='SUB' or $nama_sto=='JCG' or $nama_sto=='CAS' or $nama_sto=='PGD' or $nama_sto=='PMN' or $nama_sto=='KIA' or $nama_sto=='PBS'){$nama_datel='Subang';}
        return $nama_datel;
    }

    //Fungsi utk mengetahui Sales Channel dari K_Contact
    function salesnya($datanya){
        if(strpos($datanya,';MKT')!==false){$sales='MKT';}
        elseif(strpos($datanya,';GHMDM')!==false){$sales='GHMDM';}
        elseif(strpos($datanya,';CUST')!==false){$sales='Customer';}
        elseif(substr($datanya,0,8)=='MI;MYIR-'){$sales=substr($datanya,23,7);}
        elseif(substr($datanya,0,8)=='MI;MYIR;'){$sales=substr($datanya,8,7);}
        elseif(substr($datanya,0,5)=='MYIR-'){$sales=substr($datanya,20,7);}
        elseif(substr($datanya,0,2)=='SP' and substr($datanya,7,1)=='-'){$sales=substr($datanya,0,7);}
        elseif(substr($datanya,0,3)=='TAM' or strpos($datanya,'DBS')!==false){$sales='TAM';}
        elseif(substr($datanya,0,3)=='SP/' or substr($datanya,0,3)=='SF/' or strpos($datanya,'GEMILANG')!==false){$sales='BGES';}
        elseif(substr($datanya,0,3)=='PLS'){$sales='Plasa';}
        elseif(strpos($datanya,'APC')!==false){$sales='APC';}
        else{$sales='Others';}
        return $sales;
    }

    //Fungsi utk mengetahui Paket dari Detail Paket
    function paketnya($isi){
        if(strpos($isi,'10 Mbps')!==false or strpos($isi,'10Mbps')!==false){$paket='10 Mbps';}
        if(strpos($isi,'20 Mbps')!==false or strpos($isi,'20Mbps')!==false){$paket='20 Mbps';}
        if(strpos($isi,'30 Mbps')!==false or strpos($isi,'30Mbps')!==false){$paket='30 Mbps';}
        if(strpos($isi,'50 Mbps')!==false or strpos($isi,'50Mbps')!==false){$paket='50 Mbps';}
        if(strpos($isi,'100 Mbps')!==false or strpos($isi,'100Mbps')!==false){$paket='100 Mbps';}
        if(strpos($isi,'200 Mbps')!==false or strpos($isi,'200Mbps')!==false){$paket='200 Mbps';}
        if(strpos($isi,'300 Mbps')!==false or strpos($isi,'300Mbps')!==false){$paket='300 Mbps';}
        return $paket;
    }

    //Fungsi mengubah format jam AM/PM menjadi standar
    function ubah_jam($panjang){
        if(stripos($panjang,'PM')!==false & substr($panjang,11,2)!=='12')
        {
            $jamini=(int)substr($panjang,11,2)+12;
            $jam=substr($panjang,0,10).' '.$jamini.substr($panjang,12,6);
            $jam=str_replace('.',':',$jam);
        }
        else
        {                
            $jam=substr($panjang,0,18);
            $jam=str_replace('.',':',$jam);
        }
        return $jam;
    }

      //fungsi lama order berlangsung
    function lama($waktu){
        $date = new DateTime($waktu);
        $now = new DateTime();
        $lama= $date->diff($now);
        $intervalInSeconds = (new DateTime())->setTimeStamp(0)->add($lama)->getTimeStamp();
        $lamas= $intervalInSeconds;
        $jeda=round($lamas/(60*60),1);
        if ($jeda<=24)
        {$cetak="<font color=green><b>".$jeda."</b></font>";}
        else
        {$cetak="<font><b>".$jeda."</b></font>";}
        
        return $cetak;
    }

    //fungsi lama order berlangsung
    function lama2($waktu1,$waktu2){
        $date = new DateTime($waktu1);
        $now = new DateTime($waktu2);
        $lama= $date->diff($now);
        $intervalInSeconds = (new DateTime())->setTimeStamp(0)->add($lama)->getTimeStamp();
        $lamas= $intervalInSeconds;
        $jeda=round($lamas/(60*60),1);
        if ($jeda<=24)
        {$cetak="<font color=green><b>".$jeda."</b></font>";}
        else
        {$cetak="<font color=red><b>".$jeda."</b></font>";}
        
        return $cetak;
    }

    //Mewarnai kata
    function warna($color){
        if($color=='NOK' or $color<0 or $color=='Not contacted'){
            $cetak="<font color=red><b>".$color."</b></font>";
        }
        elseif($color=='UAT' or $color=='BAST' or $color=='Contacted'){
            $cetak="<font color=blue><b>".$color."</b></font>";
        }
        elseif(stripos($color,'FULL')!==false or $color=='OK' or $color>0){
            $cetak="<font color=green><b>".$color."</b></font>";
        }
        else{
            $cetak="<font>".$color."</font>";
        }
        return $cetak;
    }

    //Mewarnai angka
    function warna2($color){
        if($color<100){
            $cetak="<font color=red>".$color."</font>";
        }
        elseif($color>=100){
            $cetak="<font color=blue>".$color."</font>";
        }
        else{
            $cetak="<font>".$color."</font>";
        }
        return $cetak;
    }

    //Menghitung hari kerja di antara 2 tanggal
    function selisihHari($tglAwal, $tglAkhir)
    {
        // list tanggal merah selain hari minggu
        $tglLibur = Array("2019-12-24", "2019-12-24", "2019-12-31");
         
        // memecah string tanggal awal untuk mendapatkan
        // tanggal, bulan, tahun
        $pecah1 = explode("-", $tglAwal);
        $date1 = $pecah1&#91;2&#93;;
        $month1 = $pecah1&#91;1&#93;;
        $year1 = $pecah1&#91;0&#93;;

        // memecah string tanggal akhir untuk mendapatkan
        // tanggal, bulan, tahun
        //$tglAkhir="2019-12-31";
        $pecah2 = explode("-", $tglAkhir);
        $date2 = $pecah2&#91;2&#93;;
        $month2 = $pecah2&#91;1&#93;;
        $year2 =  $pecah2&#91;0&#93;;

        // mencari total selisih hari dari tanggal awal dan akhir
        $jd1 = GregorianToJD($month1, $date1, $year1);
        $jd2 = GregorianToJD($month2, $date2, $year2);

        $selisih = $jd2 - $jd1;

        // proses menghitung tanggal merah dan hari minggu
        // di antara tanggal awal dan akhir
        for($i=1; $i<=$selisih; $i++)
        {
            // menentukan tanggal pada hari ke-i dari tanggal awal
            $tanggal = mktime(0, 0, 0, $month1, $date1+$i, $year1);
            $tglstr = date("Y-m-d", $tanggal);
             
            // menghitung jumlah tanggal pada hari ke-i
            // yang masuk dalam daftar tanggal merah selain minggu
            if (in_array($tglstr, $tglLibur)) 
            {
               $libur1++;
            }
             
            // menghitung jumlah tanggal pada hari ke-i
            // yang merupakan hari minggu
            if ((date("N", $tanggal) == 7))
            {
               $libur2++;
            }
        }

        // menghitung selisih hari yang bukan tanggal merah dan hari minggu
        $hasil=$selisih-$libur1-$libur2;
        return $hasil;
    }

    //Inisiasi warna background tabel
    $huruf='#8A2BE2'; //Blue violet, #9932CC = Dark Orchid, #FF1493 = Deep pink,
    $latar='style="background: palegreen;"'; // lightgreen palegreen gold lightpink
    $latar2=' style="background-color:black; color:white;"';
    $latar3='style="background: gold;"'; // lightgreen palegreen gold lightpink
    $latar4=' style="background-color:red; color:white;"';
    $latar5='style="background: lightpink;"'; // lightgreen palegreen gold lightpink
    $latar6=' style="background-color:green; color:white;"';
    $latar7=' style="background-color:orange; color:white;"';

    //Inisiasi Kode SF
    $sf_ckw_pwk=array('SPARH90','SPDDN78','SPDAN71','SPRAH75','SPJRJ73','SPLAL69','SPADT86','SPSID89','SPBSO91','SPJHN93','SPYYL90','SPUYN72','SPECE89','SPIAM00','SPHRI16','SPSRI29','SPNRR07','SPYON69','SPSKH20','SPGMA28','SPGWJ16','SPHAG10','SPHKR12','SPFSD12','SPDFR13','SPRRA03','SPRMD73','SPARG93','SPAGR94','SPEMI94','SPFAU89','SPFBR95','SPJDI94','SPIRY00','SPMMH97','SPTTN90','SPQAS91','SPRZK23','SPRMZ26','SPEGY05','SPSRI90','SPYAI90','SPAHR71','SPERS27');
    $sf_ckw_tsm=array('SPHYA96','SPDKS72','SPIDO01','SPRUH68','SPULA87','SPLPH20','SPAMU81','SPNCI01','SPSID74','SPRKH76');

?>