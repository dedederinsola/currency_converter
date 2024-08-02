<?php
    require 'currency_api.php'
?>

<html>
    <head>
    <!-- <base href="https://websimcreationengine.com/currency-converter-with-naira/"> -->
    <link rel="stylesheet" href="currency_converter.css">
    <title>Currency Converter</title>

    </head>
    <body>
        <div class="converter">
            <h1>Currency Converter</h1>
            <input type="number" id="amount" placeholder="Enter amount" min="0" step="0.01">
            <select id="fromCurrency">
                <?php echo $optionsHtml; ?>
            </select>
            <select id="toCurrency">
                <?php echo $optionsHtml; ?>
            </select>
            <button id="convertButton">Convert</button>
            <div id="result"></div>
        </div>

        <script>
            document.getElementById('convertButton').addEventListener('click', function() {
                var amount = document.getElementById('amount').value;
                var fromCurrency = document.getElementById('fromCurrency').value;
                var toCurrency = document.getElementById('toCurrency').value;

                fetch('https://api.freecurrencyapi.com/v1/latest?apikey=fca_live_dttlRhOD1KRkS8JddrAy39Ai8i9G6f6GQRo12H9C').then(response => response.json()).then(data => {
                    var rate = data.data[toCurrency] / data.data[fromCurrency];
                    var result = amount * rate;
                    document.getElementById('result').textContent = `Converted Amount: ${result.toFixed(2)} ${toCurrency}`;
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            });
        </script>
    </body>
</html>