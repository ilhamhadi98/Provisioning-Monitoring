<?php
require('../fpdf/fpdf.php');
require('../system/connection.php');

class Index
{
    public function GetData()
    {
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(40, 10, 'Hello World!');
        $pdf->Output();
    }
 
    public function getDatUser()
    {
        $connect = new Database; // Instance Class Database
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 9); // mengatur font
 
        $pdf->Cell(190, 7, 'Daftar pengguna yang aktif', 0, 1);
        $pdf->Ln(); // Berpindah baris
 
        $heading = array(
            'id_user' => 'ID',
            'name' => 'Name',
            'username' => 'Username',
            'password' => 'Password',
            'level' => 'Level',
            'picture' => 'Picture'
        );
        $header = mysqli_query($connect->getMySQL(), "SHOW columns FROM user");
 
        foreach ($header as $item) {
            $pdf->Cell(45, 10, $heading[$item['Field']], 1);
        }
 
        $rsl  = mysqli_query($connect->getMySQL(), "SELECT *  FROM user");
 
        foreach ($rsl as $row) {
            $pdf->Ln();
            foreach ($row as $column)
                $pdf->Cell(45, 10, $column, 1);
        }
        $pdf->Output();
    }
}
 
$index = new Index();
 
$index->getDatUser();