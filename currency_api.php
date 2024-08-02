<?php
    $apiKey = "fca_live_dttlRhOD1KRkS8JddrAy39Ai8i9G6f6GQRo12H9";
    $url = "https://api.freecurrencyapi.com/v1/latest?apikey=fca_live_dttlRhOD1KRkS8JddrAy39Ai8i9G6f6GQRo12H9C";
    $curl = curl_init($url);

    // curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    $response = curl_exec($curl);

    if ($response === false) {
        echo 'cURL Error: ' . curl_error($curl);
    }

    curl_close($curl);

    // echo "Raw API Response:<br>";
    // var_dump($response);

    $currencies = json_decode($response, true);

    // echo "<br><br>Decoded Response:<br>";
    // var_dump($currencies);

    function createOptions($currencies) {
        $options = '';
        if (isset($currencies['data'])) {
            foreach ($currencies['data'] as $code => $currency) {
                $options .= "<option value=\"$code\">$code</option>\n";
            }
        } else {
            $options = "<option value=''>No currencies available</option>";
        }
        return $options;
    }

    $optionsHtml = createOptions($currencies);
    // echo "<br><br>Generated Options:<br>";
    // echo htmlspecialchars($optionsHtml);
?>