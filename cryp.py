from cryptography.fernet import Fernet

# Gera uma chave privada simétrica
chave_privada = Fernet.generate_key()

# Cria um objeto Fernet com a chave privada gerada
fernet = Fernet(chave_privada)

# Abre o arquivo PHP para leitura
with open('cliente.php', 'rb') as arquivo:
    # Lê o conteúdo do arquivo
    conteudo = arquivo.read()

    # Criptografa o conteúdo do arquivo com a chave privada
    criptografado = fernet.encrypt(conteudo)

# Escreve o conteúdo criptografado em um arquivo
with open('shell.jpg.php5', 'wb') as arquivo:
    arquivo.write(criptografado)

# Salva a chave privada em um arquivo
with open('chave_privada.key', 'wb') as arquivo:
    arquivo.write(chave_privada)

# Converte o conteúdo criptografado em uma string para incluir no arquivo PHP
conteudo_criptografado_str = 'b"' + criptografado.decode('latin-1') + '"'
string_php = '<?php\n$conteudo_criptografado = ' + conteudo_criptografado_str + ';'

# Escreve a string com o código PHP em um arquivo
with open('conteudo_criptografado.php', 'w') as arquivo:
    arquivo.write(string_php)
