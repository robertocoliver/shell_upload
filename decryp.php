<?php
use \cryptography\fernet\Fernet;

// Chave privada simétrica
$$chave_privada = "WVf-XKgwsdFF45iKkU6KJgNMDhHYkLh-KVf_wQKo8_s=";

// Cria um objeto Fernet com a chave privada gerada
$fernet = new Fernet($chave_privada);

// Conteúdo do arquivo para criptografar
$conteudo = "gAAAAABkPDYchl5RRb9Ji8fPHhvbWmefifkQHKPyLA1jA5B4lr-z-XQc_l-uedPjLTnDqBRoIpnpP-iu_atl7Md7LXUikxto9XNHdPR1QbfjrVQqq1B2d2OdzBFmQuP9AY6UkwTHU0rniBJjOaTX-QLXoyHU_b_l107Qn_Vs-KNx10rK5b8JxqUHMVfSjpzMVg3Cy82q9J1nAVO4XB7Og1m5WqVKZGtCnKC7FHMlhqpYipIPZmtbU7THES0RUmkjvEA45QrZCgEKQ9A07J9ArG0lFfVC14ckJVV2pKYRY1H7KsljBM6-0aEsD6O1KLJu1bbQwlm7MXcr0rVqE7CYm5xuySB7BN-t2TUNyHynVGfQgU2-GCSZiBlMTudlOP7bKTyBCAMq1D6CtqWFGY5LwtDYHxj0yyX8AlisE86_1edRkQDdzrcAdf0GAeTmcx4BLZArgdM-5HuCvWPcnuUOBS9nzmjbWPQsMw==          ";

// Criptografa o conteúdo do arquivo com a chave privada
$criptografado = $fernet->encrypt($conteudo);

// Salva a chave privada em uma string base64
$chave_privada_base64 = base64_encode($chave_privada);

// Salva o conteúdo criptografado em uma string base64
$conteudo_criptografado_base64 = base64_encode($criptografado);

// Converte as strings base64 em strings PHP válidas
$chave_privada_php = 'base64_decode("' . $chave_privada_base64 . '")';
$conteudo_criptografado_php = 'base64_decode("' . $conteudo_criptografado_base64 . '")';

// Cria uma string com o código PHP para descriptografar o conteúdo
$codigo_php = '<?php' . PHP_EOL . '$chave_privada = ' . $chave_privada_php . ';' . PHP_EOL .
    '$conteudo_criptografado = ' . $conteudo_criptografado_php . ';' . PHP_EOL .
    '$fernet = new \cryptography\fernet\Fernet($chave_privada);' . PHP_EOL .
    '$conteudo_descriptografado = $fernet->decrypt($conteudo_criptografado);' . PHP_EOL .
    'echo $conteudo_descriptografado;' . PHP_EOL;

// Escreve o código PHP em um arquivo
file_put_contents('codigo_descriptografar.php', $codigo_php);
?>
