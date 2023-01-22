<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Desafio</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <h2>Testes resolvidos com PHP</h2>
  <section class="challenges">
    <article class="challenge-1">
      <a class="button" href="controller.php?challenge=1">Desafio 1 - Soma</a>
    </article>

    <article class="challenge-2">
      <label>Desafio 2 - Diferença de data</label>
      <form>
        <input type="hidden" name="challenge" value="2">
        <input type="date" name="date">
        <button class="button" id="date-difference">Calcular</button>
      </form>
    </article>

    <article class="challenge-3">
      <label>Desafio 3 - Criar banco de dados</label>
      <form>
        <input type="hidden" name="challenge" value="3">
        <div class="fields">
          <div class="input-group">
            <label>Host</label>
            <input type="text" name="host" placeholder="localhost ou 127.0.0.1">
          </div>
          <div class="input-group">
            <label>Port</label>
            <input type="text" name="port" placeholder="3306">
          </div>
          <div class="input-group">
            <label>User</label>
            <input type="text" name="user" placeholder="root">
          </div>
          <div class="input-group">
            <label>Password</label>
            <input type="password" name="password">
          </div>
        </div>
        <div class="input-group">
          <label>User Id</label>
          <input type="text" name="user_id" placeholder="ID do Usuário">
          <span class="fill-user-id">Preencha o id do usuario.</span>
        </div>
        <button class="button" id="create-database">Criar Banco e listar o usuário desejado</button>
      </form>
    </article>
    <article class="challenge-4">
      <a class="button" href="controller.php?challenge=4">Desafio 4 - Listar usuarios paginados por 5</a>
    </article>
    <article class="challenge-5">
      <a class="button" href="controller.php?challenge=5">Desafio 5 - Converter data para padrão americano</a>
    </article>
    <article class="challenge-6">
      <a class="button" href="controller.php?challenge=6">Desafio 6 - Trocar padrão de data</a>
    </article>
  </section>
</body>

</html>

<script src="index.js"></script>