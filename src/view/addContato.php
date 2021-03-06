<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link
    href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300;500;700&display=swap"
    rel="stylesheet"
  />
  <link rel="stylesheet" type="text/css" 
  href="http://localhost/projetos/Agenda/assets/css/addcontato.css">
  <title>Adicionar Contato</title>
</head>
<body>
  <div class="container">
    <div class="container-main">
      <aside>
        <form action="addContato" method="POST" id="cadForm" enctype="multipart/form-data">
          <h1>Adicione um novo contato</h1>
          <input style="display: none;" name="arquivo" id="image" type="file" alt="Perfil">
          <input type="text" id="email" name="email" placeholder="Email">
          <input type="submit" value="Salvar Contato" id="btCadastro" name="acaoCadastro">
        </form>
      </aside>
    </div>
  </div>
  <script src="assets/js/components/cadastro.js"></script>
</body>
</html>