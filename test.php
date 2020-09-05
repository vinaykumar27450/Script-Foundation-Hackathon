<?php    

    $PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;
    //html PNG location prefix
    $PNG_WEB_DIR = 'temp/';
    include "phpqrcode/qrlib.php";    

    if (!file_exists($PNG_TEMP_DIR))
        mkdir($PNG_TEMP_DIR);
    
    
    $filename = $PNG_TEMP_DIR.'test.png';
    $errorCorrectionLevel = 'L';   
    $matrixPointSize = 4;


    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
         $url = "https://";   
    else  
         $url = "http://";  

    // Append the host(domain name, ip) to the URL.   
    $url.= $_SERVER['HTTP_HOST'];   
    
    // Append the requested resource location to the URL   
    //$url.= $_SERVER['REQUEST_URI']; 
    $url.= "/Hackathon/userdetail.php"; 
    $qrcode = $_SESSION['qrcode'];
    echo "<a href='$url?qrcode=$qrcode' target='_blank' class='btn btn-success'>QR Code Site</a>";

    $data = $url."?qrcode=".$qrcode;

       //$filename = $PNG_TEMP_DIR.'test'.md5($data.'|'.$errorCorrectionLevel.'|'.$matrixPointSize).'.png';
        QRcode::png($data, $filename, $errorCorrectionLevel, $matrixPointSize, 2);    

    echo '<br /><img src="'.$PNG_WEB_DIR.basename($filename).'" />
    <hr />';

    

?>
