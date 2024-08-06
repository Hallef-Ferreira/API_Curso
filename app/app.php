<?php

define('API_BASE', 'http://localhost/API_Curso/api/?option=');

echo '<p>Aplicação</p>';

 for($i=0; $i<10; $i++)
{

    $resultado = api_request('hash');

    // verify if response is ok ( success)
    if($resultado['status'] == 'ERROR'){
        die('Aconteceu um erro na chamada da API!');
    
    }

echo "O valor randomico: " . $resultado['data'] . "<br>";


}

echo '<pre>';
print_r(api_request('status'));




function api_request($option)
{
    $client = curl_init(API_BASE . $option);
    curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($client);
    return json_decode($response, true);


}


?>