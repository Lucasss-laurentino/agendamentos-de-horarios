@extends('layout.layout')

@section('content')

@if (session()->get('redefinir') != null)
<div id="redefinicao" class="align-self-center col-sm-3 col-lg-5 col-3" style="width: 50%">
    <div class=" d-flex justify-content-start">
        <button class="mb-3" id="fechar_cadastro" onclick="location.href = '/recuperar'">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-square-fill" viewBox="0 0 16 16">
                <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 4.646L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708z"/>
            </svg>
        </button>
    </div>
    <form style="width: 100%;" method="post" id="formulario_de_redefinicao">
        @csrf
        <input type="email" name="email" id="email_confirmar" class="form-control border border-dark text-dark mb-2" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Exemplo@exemplo.com">
        <input type="password" name="password" id="senha_redefinicao" class="form-control border border-dark text-dark mb-2" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Escolha sua senha">
        <input type="password" name="password" id="confirmar_senha_redefinicao" class="form-control border border-dark text-dark mb-2" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Confirme sua senha">
        <button type="button" id="redefinir_dados" class="btn btn-dark btn-sm d-block m-auto mb-2 mt-0 w-100 mt-2" data-toggle="modal" data-target="#exampleModalCenter">Redefinir</button>
        <p id="erros_redefinicao" class="text-danger m-0"></p>
    </form>
</div>
@else

<script type="text/javascript">
    location.href = '/';
</script>

@endif

<!--- modal --->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close border-none" data-dismiss="modal" aria-label="Close" onclick="location.href = '/login'">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h5 class="modal-title" id="exampleModalLongTitle">Senha redefinida com sucesso</h5>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="location.href = '/login'" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
<!--- end modal --->
@endsection