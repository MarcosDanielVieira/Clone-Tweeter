<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
<div 
  style="
    align-items: center;
    justify-content: center;

    min-height: 100%;  
    min-height: 100vh; 

    display: flex;
    align-items: center;
    margin: 0 auto;
    width: 80%; 
  " 
  class="container text-center erroInterno">
  <div class="alert alert-danger" role="alert">
    <h4 class="alert-heading">
      Ops, algo deu errado!
    </h4>
    
      @isset($erroGrave)
        <b>{{$erroGrave}} </b>
      @endisset
    
    <hr>
    <p class="mb-0">
      Entre em contato com nossa equipe, cliclando no botão de enviar.
    </p>
    <div class="mt-3">
      <div class="row">
        <div class="col col-md-6">
          <a 
          type="button" 
          href="{{ route('homePage') }}"  
          class="btn btn-secondary text-white">
          <i class="fa fa-arrow-circle-left"></i> Voltar 
        </a>
        </div>
         <div class="col col-md-6">
          <a 
            target="_blank"
            type="button"
            href="@isset($whatsApp){{$whatsApp}}@endisset"  
            class="btn btn-success">
            <i class="fa fa-whatsapp" aria-hidden="true"></i> Enviar
          </a>
         </div>
      </div>      
    </div>
  </div>
</div>