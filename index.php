<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Desafio</title>
  <link rel="stylesheet" href="style.css">
</head>

<?php include("./header.php") ?>

<body>
  <section class="challenges container">
    <article class="challenge challenge-1">
      <label class="challenge-title">Desafio 1 - Soma do array [1, 3, 5, 9, 12, 10]</label>
      <a class="button" href="controller.php?challenge=1">Calcular</a>
    </article>

    <article class="challenge challenge-2">
      <label class="challenge-title">Desafio 2 - Diferença de data entre data selecionada e hoje</label>
      <form>
        <input type="hidden" name="challenge" value="2">
        <input type="date" name="date">
        <button class="button" id="date-difference">Calcular</button>
      </form>
    </article>

    <article class="challenge challenge-3">
      <label class="challenge-title">Desafio 3 - Criar banco de dados</label>
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
    <article class="challenge challenge-4">
      <label class="challenge-title">Desafio 4 - Listar usuários paginados por 5</label>
      <form>
        <input type="hidden" name="challenge" value="4">
        <div class="input-group">
          <label>Página</label>
          <input type="number" name="page">
        </div>
      </form>
      <button class="button" id="list-paginate-users">Listar usuários</button>
    </article>
    <article class="challenge challenge-5">
      <label class="challenge-title">Desafio 5 - Converter data para padrão americano</label>
      <div class="input-group">
        <label>Data</label>
        <input type="text" name="to-american-date" placeholder="22/01/2023">
        <span class="fill-date-to-american">Preencha a data.</span>
      </div>
      <button class="button" id="to-american-date">Converter data</button>
    </article>
    <article class="challenge challenge-6">
      <label class="challenge-title">Desafio 6 - Trocar padrão de data</label>
      <div class="input-group">
        <label>Data</label>
        <input type="text" name="toggle-date-format" placeholder="22/01/2023 ou 2023-01-22">
        <span class="fill-toogle-date-format">Preencha a data.</span>
      </div>
      <button class="button" id="toggle-date-format">Trocar padrão de data</button>
    </article>
  </section>
</body>

</html>

<script src="index.js"></script>