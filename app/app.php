<?php

define('API_BASE', 'http://localhost/API/?option=');

echo '<p>Aplicação</p>';

for($i=0; $i<10; $i++)
{

    $resultado = api_request('random');

    // verify if response is ok ( success)
    if($resultado['status'] == 'ERROR'){
        die('Aconteceu um erro na na chamada da API!');
    
    }

echo "O valor randomico: " . $resultado['data'] . "<br>";





}



echo 'Terminado';


function api_request($option)
{
    $client = curl_init(API_BASE . $option);
    curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($client);
    return json_decode($response, true);


}


?>