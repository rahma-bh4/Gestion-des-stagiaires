<?php 
$servername="localhost";
$username="root";
$password="";
$dbname="stage";
$conn=mysqli_connect($servername,$username,$password,$dbname);
$id=$_GET['id']; 
$sql="SELECT *FROM stagiaire WHERE id=$id LIMIT 1";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
header('Content-Type: text/html; charset=utf-8');

require('./fpdf/fpdf.php');
$pdf = new FPDF('L', 'mm', 'A4');
$pdf->AddPage();
$pdf->SetMargins(20,20,20);
$pdf->SetLineWidth(1);
$pdf->SetDrawColor(0, 0, 128);
$pdf->Rect(5, 5, 285, 195, 'D');
$pdf->Rect(7, 7, 281, 191, 'D');
//$pdf->Cell(278,183,'',1,0);
$pdf->AddFont('Roboto-L','','Roboto-Light.php');

$pdf->AddFont('Roboto-R','','Roboto-Regular.php');

$pdf->Image('images/cnilogo.jpg', 225, 15, 55, 20);
$pdf->SetFont('Roboto-L',style:'',size:10);
$pdf->ln(h:5);
$pdf->SetMargins(10,10,10);

$pdf->Cell(w:70,h:7,txt:" MINISTERE DES TECHNOLOGIES DE L'INFORMATION",border:0,ln:1,align:'L');
$retrait="            ";
$h=5;
$pdf->Write($h,txt:$retrait);
$pdf->SetFont('Roboto-R',style:'',size:12);
$pdf->Cell(w:100,h:7,txt:"   CENTRE NATIONAL DE L'INFORMATIQUE",border:0,ln:1,align:'L');
$pdf->ln(h:15);
$pdf->SetFont('Roboto-R',style:'',size:22);
$pdf->SetTextColor(30,144,255);
$pdf->Cell(w:0,h:25,txt:'ATTESTATION DE STAGE',border:0,ln:1,align:'C');
$pdf->Ln(h:5);
$pdf->SetFont('Roboto-L',style:'',size:16);
$pdf->SetTextColor(0,0,0);
$h1=7;
$pdf->Write($h1,utf8_decode(" Le chargé de la gestion de la Formation et du Recyclage au Centre National de l'Informatique atteste que :"));
$nom=strtoupper($row['nom']);
$prenom=strtoupper($row['prenom']);
$pdf->SetFont('Roboto-R',style:'',size:16);
$pdf->SetTextColor(128,0,128);
$pdf->Ln(h:13);
$pdf->Cell(w:0,h:15,txt:$prenom.' '.$nom ,border:0,ln:0,align:'C');

$pdf->Ln(h:15);
$pdf->SetFont('Roboto-L',style:'',size:16);
$pdf->SetTextColor(0,0,0);
$pdf->Write($h1,utf8_decode(" a effectué un stage "));
$type=$row['typeS'];
$pdf->SetFont('Roboto-R',style:'',size:16);
$pdf->write($h1,$type);
$pdf->SetFont('Roboto-L',style:'',size:16);
$pdf->Write($h1," au sein de ");
$pdf->SetFont('Roboto-R',style:'',size:16);
$org=$row['org'];
$pdf->Write($h1,txt:$org);
$pdf->SetFont('Roboto-L',style:'',size:16);
$dateD=$row['dateD'];
$pdf->Write($h1,txt:" du ");
$pdf->SetFont('Roboto-R',style:'',size:16);
$pdf->Write($h1,txt:$dateD);
$pdf->SetFont('Roboto-L',style:'',size:16);
$pdf->Write($h1,txt:" au ");
$dateF=$row['dateF'];
$pdf->SetFont('Roboto-R',style:'',size:16);
$pdf->Write($h1,txt:$dateF);
$pdf->Ln(h:10);
$sujet=$row['sujet'];

$pdf->SetTextColor(25,25,112);
$pdf->Write($h1,txt:"\n  Sujet: ");
$pdf->SetTextColor(0,0,0);
$pdf->Write($h1,txt:utf8_decode($sujet));
$pdf->ln(h:25);
$pdf->SetFont('Roboto-R',style:'',size:10);
$pdf->Cell(w:0,h:5,txt:" CHARGE DE LA GESTION  DU CENTRE  DE  LA FORMATION  ",border:0,ln:1,align:'R');
$pdf->Write($h,txt:$retrait);
$pdf->Cell(w:0,h:5,txt:" ET DU RECYCLAGE                                   ",border:0,ln:1,align:'R');
$pdf->ln(h:15);
$pdf->Cell(w:0,h:5,txt:"AMMAR HAFEDH                                   ",border:0,ln:1,align:'R');



$pdf->Output();

?>