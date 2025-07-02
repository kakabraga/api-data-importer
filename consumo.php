<?php
include 'Database.php';
$url = "https://restcountries.com/v3.1/all?fields=name,capital,currencies";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // retorna como string
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // ignora SSL (somente para testes)
$resposta = curl_exec($ch);
curl_close($ch);

$dados = json_decode($resposta, true);
echo "<pre>";
print_r($dados);
echo "</pre>";
foreach ($dados as $key => $dado) {
    $common   = $dado['name']['common'];
    $official = $dado['name']['official'];
    foreach($dado['currencies'] as $moeda) {
        $moedas = $moeda['name'];
    };
    $capital = $dado['capital']['0'];
    $stmt = $conn->prepare("INSERT INTO pais (nome_comum, nome_oficial, capital, moeda) values(:nome_comum, :nome_oficial, :capital, :moeda)");
    $stmt->bindParam(':nome_comum', $common);
    $stmt->bindParam(':nome_oficial', $official);
    $stmt->bindParam(':capital', $capital);
    $stmt->bindParam(':moeda', $moedas);
    $stmt->execute();
}

