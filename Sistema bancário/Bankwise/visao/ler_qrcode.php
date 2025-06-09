<!DOCTYPE html>
<html>
<head>
    <title>Ler QR Code</title>
    <script src="https://unpkg.com/html5-qrcode"></script>
</head>
<body>
    <h2>Escanear QR Code</h2>
    <div id="reader" style="width:300px;"></div>
    <p id="resultado"></p>
    <script>
        function onScanSuccess(decodedText, decodedResult) {
            document.getElementById("resultado").innerText = "QR Code lido: " + decodedText;
            html5QrcodeScanner.clear();
        }
        const html5QrcodeScanner = new Html5QrcodeScanner("reader", { fps: 10, qrbox: 250 });
        html5QrcodeScanner.render(onScanSuccess);
    </script>
    <p><a href="dashboard.php">Voltar</a></p>
</body>
</html>