<?php
//require_once("lib/Escpos.php");
require_once("escpos/autoload.php");
header("content-type: text/html; charset=UTF-8");  
require_once("escpos/autoload.php");
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\EscposImage;
require_once("lib/Escpos.php");

class haktest extends CI_Controller{
    public function print_out(){
        try{
            //$connector = new NetworkPrintConnector("192.168.1.91",9100);
            var_dump($_SERVER);
            return;
            $connector = new FilePrintConnector("php://stdout");
            //$connector = new WindowsPrintConnector("smb://computer/printer");
        //$connector = new NetworkPrintConnector('Bar',9100);
            $printer = new Printer($connector);
            // $printer -> bitImage($tux,Printer::IMG_DOUBLE_WIDTH | Printer::IMG_DOUBLE_HEIGHT);
            $printer -> text("Hello World!\n");
            $printer -> feed();
            $printer -> cut();
            $printer -> close();
        } catch(Exception $e) {
            echo "Couldn't print to this printer: " . $e -> getMessage() . "\n";
        }
    }
     function get_client_ip()
     {
        var_dump(printer_list(PRINTER_ENUM_LOCAL | PRINTER_ENUM_SHARED));
        return;
          $ipaddress = '';
          if (getenv('HTTP_CLIENT_IP'))
              $ipaddress = getenv('HTTP_CLIENT_IP');
          else if(getenv('HTTP_X_FORWARDED_FOR'))
              $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
          else if(getenv('HTTP_X_FORWARDED'))
              $ipaddress = getenv('HTTP_X_FORWARDED');
          else if(getenv('HTTP_FORWARDED_FOR'))
              $ipaddress = getenv('HTTP_FORWARDED_FOR');
          else if(getenv('HTTP_FORWARDED'))
              $ipaddress = getenv('HTTP_FORWARDED');
          else if(getenv('REMOTE_ADDR'))
              $ipaddress = getenv('REMOTE_ADDR');
          else
              $ipaddress = 'UNKNOWN';

          //return $ipaddress;
          var_dump($ipaddress);
     }
}



