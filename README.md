# sorteio

Sistema de sorteio

Ao baixar o códido desse rodar os seguintes comandos

Rode o comando que irá criar o arquivo sqlite. Você deve estar dentro da pasta "protected" para rodar esse comando. Esse comando também vai criar alguns registros de exemplos. Para ter detalhes desses registros acesse os arquivos dentro de "protected/migrations".  

php yiic.php migrate


Algumas pastas com a "data" devem permitir escrita. Como nesse caso é um teste, rode o comando para liberar tudo :)
sudo chmod -R 777 ./


Agora o sistema está pronto para ser utilizado. Os usuários foram criados nas migrations, assim como um sorteio inicial de exemplo.
