<?php


 
// $ip = '127.0.0.1';
// $port = '9051';
// $auth = 'PASSWORD';
// $command = 'signal NEWNYM';
 
// $fp = fsockopen($ip,$port,$error_number,$err_string,10);
// if(!$fp) { echo "ERROR: $error_number : $err_string";
//     return false;
// } else {
//     fwrite($fp,"AUTHENTICATE \"".$auth."\"\n");
//     $received = fread($fp,512);
//     fwrite($fp,$command."\n");
//     $received = fread($fp,512);
// }
 
// fclose($fp);
 
// $ch = curl_init();
// curl_setopt($ch, CURLOPT_URL, "http://whatismyip.org");
// curl_setopt($ch, CURLOPT_PROXY, "127.0.0.1:9050");
// curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// curl_setopt($ch, CURLOPT_VERBOSE, 0);
// $response = curl_exec($ch);
// 
 	$course = isset($_GET['course'])? $_GET['course']:'';
  	$enrolment = isset($_GET['enrol'])? $_GET['enrol']:'';


echo http_socket::download('https://stusupport12.ignou.ac.in/Result.asp?'."Program=$course&eno=$enrolment&submit=Submit&hidden_submit=OK", '55.55.44.33');

final class http_socket
{
    static public function download($url, $bind_ip = false)
    { 
        $components = parse_url($url);
        $header = '';
        $response = '';
       
        // if(!isset($components['query'])) $components['query'] = false;

        // if(!$bind_ip) 
        // {
        //     $bind_ip = $_SERVER['SERVER_ADDR'];
        // }

        // $header = array();
        // $header[] = 'POST ' . $components['path'] . ($components['query'] ?  '?' . $components['query'] : '');
        // $header[] = 'Host: ' . $components['host'];
        // $header[] = 'User-Agent: Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.9.1.7) Gecko/20100106 Ubuntu/9.10 (karmic) Firefox/3.5.7';
        // $header[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8';
        // $header[] = 'Accept-Language: en-us,en;q=0.5';
        // $header[] = 'Accept-Encoding: gzip,deflate';
        // $header[] = 'Content-Type: application/x-www-form-urlencoded';
        // $header[] = 'Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7';
        // $header[] = 'Keep-Alive: 300';
        // $header[] = 'Connection: keep-alive';
        // $header = implode("\n", $header) . "\n\n";
        // echo $header;
        // $packet = $header;

        // //----------------------------------------------------------------------
        // // Connect to server
        // //----------------------------------------------------------------------
        // $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        // var_dump($socket);
        // socket_bind($socket, $bind_ip);
        // // socket_connect($socket, $components['host'], 80);

        // //----------------------------------------------------------------------
        // // Send First Packet to Server
        // //----------------------------------------------------------------------
        // // socket_write($socket, $packet);
        // //----------------------------------------------------------------------
        // // Receive First Packet to Server
        // //----------------------------------------------------------------------
        // $html = '';
        // // while(1) {
        // //     socket_recv($socket, $packet, 4096, MSG_WAITALL);
        // //     if(empty($packet)) break;
        // //     $html .= $packet;
        // // }
        // // socket_close($socket);

        // return $html;
         $scheme = 'ssl://';           $port = 443;
        $fp = fsockopen($scheme.$components['host'], $port);
        
		parse_str($components['query'], $vars);
		$content = http_build_query($vars);

		fwrite($fp, "POST {$components['path']} HTTP/1.1\r\n");
		fwrite($fp, "Host: {$components['host']}\r\n");
		fwrite($fp, "Content-Type: application/x-www-form-urlencoded\r\n");
		fwrite($fp, "Content-Length: ".strlen($content)."\r\n");
		fwrite($fp, "Connection: close\r\n");
		fwrite($fp, "\r\n");

		fwrite($fp, $content);

		while (!feof($fp)) {
		     $header .= fgets($fp, 1024);
		    if (preg_match('/Content\\-Length:\\s+([0-9]*)\\r\\n/',$header,$matches)) {
		     	if(preg_match('/\\r\\n\\r\\n$/',$header)) {
		     		$tmpHeader = $header;
		     		$header = '';
		     	}
		     }
		}
		return $header;
    }
}