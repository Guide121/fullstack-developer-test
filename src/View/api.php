  <div>
    <section class="mt-2 col-12">
      <div class="card p-3 m-3">
        <label for="#texto">Cadastro de Produto</label><br />
        Endpoint: <?=URL_SITE?>api/cadastro_produto<br />
        Type: POST <br />
        JSON: {
                "nome":"XXXXXXXXX",
                "valor":00.00,
                "imagem":"45twert435646" (base64)
              }

      </div>
      <div class="card p-3 m-3">
        <label for="#texto">Remove Produto</label><br />
        Endpoint: <?=URL_SITE?>apiremove_produto/{id}<br />
        Type: DELETE <br />

      </div>
      <div class="card p-3 m-3">
        <label for="#texto">Altera produto</label><br />
        Endpoint: <?=URL_SITE?>api/altera_produtos <br />
        Type: PUT <br />
        JSON: {
                "id": 0
                "nome":"XXXXXXXXX",
                "valor":00.00,
                "imagem":"45twert435646" (base64)
              }

      </div>
      <div class="card p-3 m-3">
        <label for="#texto">Lista Produtos</label><br />
        Endpoint: <?=URL_SITE?>api/lista_produtos <br />
        Type: GET <br />


      </div>
      <div class="card p-3 m-3">
        <label for="#texto">Pesquisa Produtos</label><br />
        Endpoint: <?=URL_SITE?>api/lista_produtos/{pesquisa}<br />
        Type: GET <br />
      </div>

      <div class="card p-3 m-3">
        <label for="#texto">Produto</label><br />
        Endpoint: <?=URL_SITE?>api/produto/{id}<br />
        Type: GET <br />
      </div>
    <section>
  </div>
