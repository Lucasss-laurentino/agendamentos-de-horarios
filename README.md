# agendamento de horarios
 
### Ferramentas utilizadas

<a href = "https://laravel.com/docs/9.x/installation"><img src="https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" targe="_blank"></a>
<a href = "https://getbootstrap.com/"><img src="https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white" targe="_blank"></a>
<a href = "https://jquery.com/"><img src="https://img.shields.io/badge/jQuery-0769AD?style=for-the-badge&logo=jquery&logoColor=white" targe="_blank"></a>

Esse projeto ilustra agendamento de horários de uma barbearia
 
<div align="left">
<img src="https://user-images.githubusercontent.com/96303722/155771389-778bc09a-943a-4379-bcb4-1b791602236d.png" width="400px"> 
</div>

<br><br>

<div align="left">
<img src="https://user-images.githubusercontent.com/96303722/155771408-640ca8ac-c4be-4aed-9523-e15f1b21c713.png" width="200px"> 
</div>

### Com painel administrativo

<div align="left">
 
<img src="https://user-images.githubusercontent.com/96303722/155774342-06078e9b-cdcf-4b9e-bdb4-2d7d1908509e.png" width="400px"> 
</div>
<br><br>
<div align="left">
<img src="https://user-images.githubusercontent.com/96303722/155774362-1f9c9ed5-2a86-45ce-823c-215581681bc0.png" width="200px"> 
</div>

## Rodando o projeto

+ <p>Renomeie o arquivo ".env.example" para ".env" na raiz do projeto</p>
+ <p>Configure o banco no arquivo .env da linha 11 á 16 e da linha 31 á 38 para envio de e-mails</p>
+ <p>Vá em "app/mail/redefinir.php" na linha 36 no método "from()" e digite seu email</p>
+ <p>Após isso, na raiz do projeto abra um terminal faça as migrate com "php artisan migrate" e depois excecute "composer update"</p>
+ <p>Pronto, agora é só rodar o projeto com "php artisan serve"</p>

## Funcionalidades

<p>Após se cadastrar o usuário é redirecionado para pagina de login, quando efetuado o login é mostrado uma tabela com todos horários disponíveis,
ao clicar em cima do horário automaticamento o usuário é marcado e redirecionado á uma pagina com o horário escolhido e a opção de desmarcar</p>

<p>Envio de e-mail para recuperação de senha</p>

<p>Para ter acesso ao painel administrativo é necessário setar manualmente no banco o campo "admin" para 1 e depois fazer o login normalmente, ao logar o administrador será redirecionado para
 uma página com a opção de ver os horários e os usuários, também podendo excluir ou desmarcar um horário ou usuário, ou adicionar um horário.</p>
