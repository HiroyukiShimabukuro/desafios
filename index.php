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
    <article>
      <a class="button" href="controller.php?challenge=1">Desafio 1 - Soma</a>
    </article>
    <article>
      <label>Desafio 2 - Diferença de data</label>
      <form action="controller.php">
        <input type="hidden" name="challenge" value="2">
        <input type="date" name="date">
        <button class="button" id="date-difference">Calcular</button>
      </form>
    </article>
    <article>
      <a class="button" href="controller.php?challenge=3">Desafio 3 - Criar banco de dados</a>
    </article>
    <article>
      <a class="button" href="controller.php?challenge=4">Desafio 4 - Listar usuarios paginados por 5</a>
    </article>
    <article>
      <a class="button" href="controller.php?challenge=5">Desafio 5 - Converter data para padrão americano</a>
    </article>
    <article>
      <a class="button" href="controller.php?challenge=6">Desafio 6 - Trocar padrão de data</a>
    </article>
  </section>
</body>

</html>

<script src="index.js"></script>