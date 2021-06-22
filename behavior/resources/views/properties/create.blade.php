<form action="{{ route('imoveis.store') }}" method="post" enctype="multipart/form-data">
  @csrf

  <label for="">Título do imóvel</label>
  <input type="text" name="title">

  <br>

  <label for="">Preço de Locação</label>
  <input type="text" name="rental_price">

  <br>

  <label for="">Imagem de destaque</label>
  <input type="file" name="cover">

  <br>

  <button type="submit">Gravar Imóvel</button>

</form>