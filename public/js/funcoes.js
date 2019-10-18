function esconderPessoaFisica(x) {
    if (x.checked) {
      document.getElementById("pessoaFisica").style.display = "none";
      document.getElementById("pessoaJuridica").style.display = "inherit";
    }
  }
 
function esconderPessoaJuridica(x) {
  if (x.checked) {
    document.getElementById("pessoaJuridica").style.display = "none";
    document.getElementById("pessoaFisica").style.display = "inherit";
  }
}

function formatarCampo(mascara, campo){
  var i = campo.value.length;
  var saida = mascara.substring(0,1);
  var numero = mascara.substring(i);

  if(numero.substring(0,1) != saida){
      campo.value += numero.substring(0,1);
  }
}

var telCounter = 0;

//Funções de telefones de pessoa fisica
$('.adicionarTelFisico').on('click', function(e){
  e.preventDefault();
  $('.telefoneFisico:last').
  after('<div class="input-group telefoneFisico"><input type="tel" class="form-control" placeholder="(12) 34567-8910" name="telefone[]" pattern="\\([0-9]{2}\\) [0-9]{4,6}-[0-9]{3,4}$" required><div class="input-group-append" ><span class="input-group-text" ><button class="btn btn-danger btn-sm removerTelFisico" style="font-size: 0.5rem"><i class="fas fa-minus fa-xs"></i></button></span></div></div>');
});

$('#telefoneFisico').on('click', '.removerTelFisico', function(e){
  e.preventDefault();
  $(this).parents('.telefoneFisico').remove();
});

//Funções de telefones de pessoa juridica
$('.adicionarTelJuridico').on('click', function(e){
  e.preventDefault();
  $('.telefoneJuridico:last').
  after('<div class="input-group telefoneJuridico"><input type="tel" class="form-control" placeholder="(12) 34567-8910" name="telefone[]" pattern="\\([0-9]{2}\\) [0-9]{4,6}-[0-9]{3,4}$" required><div class="input-group-append" required><span class="input-group-text" ><button class="btn btn-danger btn-sm removerTelJuridico" style="font-size: 0.5rem"><i class="fas fa-minus fa-xs"></i></button></span></div></div>');
});

$('#telefoneJuridico').on('click', '.removerTelJuridico', function(e){
  e.preventDefault();
  $(this).closest('.telefoneJuridico').remove();
});