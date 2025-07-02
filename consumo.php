<?php
include 'Database.php';
$url = "https://restcountries.com/v3.1/name/Brazil";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // retorna como string
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // ignora SSL (somente para testes)
$resposta = curl_exec($ch);
curl_close($ch);

$dados = json_decode($resposta, true);
// echo "<pre>";
// print_r($dados);
// echo "</pre>";
foreach ($dados as $d) {
    $common   = $d['name']['common'];
    $official = $d['name']['official'];
    $language = $d['languages']['por'];
    $moeda    = $d['currencies']['BRL']['name'];
    $continente = $d['region'];
}

$stmt = $conn->prepare("INSERT INTO pais (nome_comum, nome_oficial, lingua, moeda, continente) values(:nome_comum, :nome_oficial, :lingua, :moeda, :continente)");
$stmt->bindParam(':nome_comum', $common);
$stmt->bindParam(':nome_oficial', $official);
$stmt->bindParam(':lingua', $language);
$stmt->bindParam(':moeda', $moeda);
$stmt->bindParam(':continente', $continente);
$stmt->execute();
