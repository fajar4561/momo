<html>
<head>
    <title>Generate QR Code dengan PHP</title>
</head>
<body>
    <h3>Membuat QR Code</h3>
    <?php
        include "qrlib.php";    // Ini adalah letak pemyimpanan plugin qrcode

        $tempdir = "qrcode-img/";        // Nama folder untuk pemyimpanan file qrcode
        
        if (!file_exists($tempdir))        //jika folder belum ada, maka buat
        mkdir($tempdir);
        
        // berikut adalah parameter qr code
        $teks_qrcode    ="Membuat QR Code dengan PHP fajas ehjjskdhjskdhjskada".uniqid()." sss ";
        $namafile        ="qrcode-1".uniqid().".png";
        $quality        ="H"; // ini ada 4 pilihan yaitu L (Low), M(Medium), Q(Good), H(High)
        $ukuran            =5; // 1 adalah yang terkecil, 10 paling besar
        $padding        =1;
        
        QRCode::png($teks_qrcode, $tempdir.$namafile, $quality, $ukuran, $padding);
    ?>
    <img src="qrcode-img/<?=$namafile?>">
    <?= $namafile?>


    <div id="qr-reader" style="width:500px"></div>
    <div id="qr-reader-results"></div>
    <script src="html5-qrcode.min.js"></script>
    <script>
    	function docReady(fn) {
        // see if DOM is already available
    		if (document.readyState === "complete"
    			|| document.readyState === "interactive") {
            // call on next available tick
    			setTimeout(fn, 1);
    	} else {
    		document.addEventListener("DOMContentLoaded", fn);
    	}
    }

    docReady(function () {
    	var resultContainer = document.getElementById('qr-reader-results');
    	var lastResult, countResults = 0;
    	function onScanSuccess(decodedText, decodedResult) {
    		if (decodedText !== lastResult) {
    			++countResults;
    			lastResult = decodedText;
                // Handle on success condition with the decoded message.
    			console.log(`Scan result ${decodedText}`, decodedResult);
    			// location.href="scanner.php?check=+decodedText"
    			alert("Hasil dari barcode adalah :" +decodedText);
    		}
    	}

    	var html5QrcodeScanner = new Html5QrcodeScanner(
    		"qr-reader", { fps: 10, qrbox: 250 });
    	html5QrcodeScanner.render(onScanSuccess);
    });
</script>
</body>
</html>