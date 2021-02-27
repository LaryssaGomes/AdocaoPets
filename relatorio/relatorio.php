<?php
require_once __DIR__ . '../../vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', 'laryssa');
define('DBNAME', 'pets');

$conn = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME . ';', USER, PASS);
$query = "SELECT  users.name AS records, pets.name AS pet, record_pet.name AS adopted FROM users, pets, (SELECT DISTINCT users.id AS id,users.name AS name ,records.pet_id AS record_pet_id FROM records INNER JOIN users ON records.user_id = users.id) record_pet WHERE pets.user_id = users.id and record_pet.record_pet_id = pets.id";//quem ADOTOU
$stm = $conn->prepare($query);
$stm->execute();
$data = $stm->fetchAll(PDO:: FETCH_ASSOC);
$html = "";
$html .= "
<html>
<head>

</head>
<body>
        <h1>Relatório de adoção</h1>
        <br/> 
        <table>
            <tr>
                <th>Animais adotados</th>
                <th>Pessoa que adotaram</th>
                <th>Pessoa que registro</th>
            </tr>";

for($i=0;$i<=count($data);$i++){
    $html.="<tr>";
    $html.="<td>{$data[$i]['pet']} </td>";
    $html.="<td>{$data[$i]['adopted']} </td>";
    $html.=" <td>{$data[$i]['records']} </td>";     
    $html.="</tr>";
    
}
$html.="</table></body></html>";
$mpdf->WriteHTML($html);
$mpdf->Output();































/*
$query = "SELECT  users.name AS registro, pets.name AS pet, record_pet.name AS adotou FROM users, pets, (SELECT DISTINCT users.id AS id,users.name AS name ,records.pet_id AS record_pet_id FROM records INNER JOIN users ON records.user_id = users.id) record_pet WHERE pets.user_id = users.id and record_pet.record_pet_id = pets.id";//quem ADOTOU
$stm = $conn->prepare($query);
$stm->execute();
$data = $stm->fetchAll(PDO:: FETCH_OBJ);
foreach ($data as $valor) {
$html = "<h1>Relatório de adoção</h1>
        <br/> 
        <table>
            <tr>
                <th>Animais adotados</th>
                <th>Pessoa que adotaram</th>
                <th>Pessoa que registro</th>
            </tr>
            

            <tr>
                <td>oooo</td>
                <td>Alface</td>
                <td>Arroz</td>
            </tr>
            
        </table>
";
$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
$mpdf->Output();
*/