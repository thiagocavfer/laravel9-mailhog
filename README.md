
## Laravel 9 com MailHog


### Instalação do Mail Hog no Linux
#### Distros embasadas no Debian ou Ubuntu.

<br/>  
<p>
<strong>1º - Instalando o GO.</strong>
</p>

```
$ sudo apt install golang-go
$ mkdir gocode
$ echo "export GOPATH=$HOME/gocode" >> ~/.profile
$ source ~/.profile
```
<br/>
<p>
<strong>2º - Baixando o MailHog e MHSendMail.</strong>
</p>

```
$ go get github.com/mailhog/MailHog
$ go get github.com/mailhog/mhsendmail
```
<br/>
<p>
<strong>3º - Realocando binários.</strong>
</p>

```
$ sudo cp /home/juampy/gocode/bin/MailHog /usr/local/bin/mailhog
$ sudo cp /home/juampy/gocode/bin/mhsendmail /usr/local/bin/mhsendmail
```
<br/>
<p>
<strong>4º - Encontrando o "php.ini"</strong>. 
</p>

```
$ php -i | grep "Loaded Configuration File"
```
Como resposta do comando acima, deve aparecer o local do arquivo php.ini da versão do php em execução:

> Loaded Configuration File => /etc/php/8.1/cli/php.ini

Agora vamos abrir o arquivo <strong>/etc/php/8.1/cli/php.ini</strong> e editar o arquivo em sua variável <strong>sendmail_path</strong>, deixando a sua linha assim:

```
sendmail_path = /usr/local/bin/mhsendmail
```
<br/>
<p>
<strong>5º - Iniciando o MailHog.</strong>
</p>

```
$ mailhog \
  -api-bind-addr 127.0.0.1:8025 \
  -ui-bind-addr 127.0.0.1:8025 \
  -smtp-bind-addr 127.0.0.1:1025
```
Assim o MailHog ficará disponível na porta 8025 em localhost.<br/>
Acesse-o em http://127.0.0.1:8025/.

<br/>
<p>
<strong>6º - Testando com o Laravel 9.</strong>
</p>

Criamos um simples formulário que dispara e-mails para testarmos o MailHog. Basta iniciar o projeto com os comandos:

```
$ composer install
$ composer require laravel/ui
$ php artisan ui bootstrap --auth
$ npm install && npm run dev
$ php artisan serv --port=8000
```
Acesse ao projeto em [http://localhost:8000/send-email](http://localhost:8000/send-email), preencha o formulário, clique no botão <strong>Enviar Mensagem</strong> e confira o resultado em [http://localhost:8025](http://localhost:8025).



