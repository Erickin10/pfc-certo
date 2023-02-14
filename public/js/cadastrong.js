const enderecongForm = document.querySelector("#msloaderform");
const cepongInput = document.querySelector("#cepong");
const enderecongInput = document.querySelector("#enderecong");
const cidadongInput = document.querySelector("#cidadong");
const bairrongInput = document.querySelector("#bairrong");
const regiaoONGInput = document.querySelector("#regiaoONG");
const telefoneONGInput = document.querySelector("#telefoneONG")
const cnpjONGInput = document.querySelector("#cnpjong")
const formInputs = document.querySelectorAll("[data-input]");
const closeButton = document.querySelector("#close-message");

//JavaScript que coloca "()" e "-" no número de telefone para facilitar o input do usario.

telefoneONGInput.addEventListener('keypress', (e) => {
  const onlyNumbers = /[0-9]/;
  const key = String.fromCharCode(e.keyCode);
  
  if (!onlyNumbers.test(key)) {
  e.preventDefault();
  return;
  }
  
  let inputLength = telefoneONGInput.value.length
  if (inputLength == 0) {
    telefoneONGInput.value += '('
  }
  if (inputLength == 3) {
    telefoneONGInput.value += ')'
  }
  if (inputLength == 9) {
    telefoneONGInput.value += '-'
  }
  });

  //JavaScript que coloca "." e "/" no número do CNPJ para facilitar o input do usario.

  cnpjONGInput.addEventListener("keypress", (e) => {
    const onlyNumbers = /[0-9]/;
    const key = String.fromCharCode(e.keyCode);
  
    if (!onlyNumbers.test(key)) {
      e.preventDefault();
    }
  
    let inputLength = cnpjONGInput.value.length

    if (inputLength == 2) {

      cnpjONGInput.value += '.'

    }
    
    if (inputLength == 6) {

      cnpjONGInput.value += '.'

    }
    
    if(inputLength == 10){

      cnpjONGInput.value += '/'

    }
    
    if(inputLength == 15){

      cnpjONGInput.value += '-'

    }

    if(inputLength == 9){

      cnpjONGInput.value += ''

    }   
})


// Validação do CEP input

cepongInput.addEventListener("keypress", (e) => {

    const onlyNumbers = /[0-9]/;
    const key = String.fromCharCode(e.keyCode);
    console.log(key);
    console.log(onlyNumbers.test(key));

    
  // Permite somente números
  if (!onlyNumbers.test(key) ){
    e.preventDefault();
    retuturn; 
  }

  // Adiciona hífen após 5 caracteres digitados
  if (cepongInput.value.length === 5 && key !== "-") {
    cepongInput.value += "-";
  }
  // Remover traço do CEP antes de enviar para a API
  if (onlyNumbers.test(key)) {
    let cepWithoutDash = cepongInput.value.replace(/-/g, "");

    // Enviar CEP sem traço para a API
    // ...
  }
  
});

//Evento para obter endereço

cepongInput.addEventListener("keyup", (e) => {

  const inputValue = e.target.value;

  //Checa se temos um CEP

  if (inputValue.length === 9) {

    getenderecong(inputValue);

  }
});

//Obtem endereço da API

const getenderecong = async (cepong) => {

 
  cepongInput.blur();
  const apiUrl = `https://viacep.com.br/ws/${cepong}/json/`;
  const response = await fetch(apiUrl);
  const data = await response.json();
  console.log(data);
  console.log(formInputs);
  console.log(data.erro);
  enderecongInput.value = data.logradouro;
  cidadongInput.value = data.localidade;
  bairrongInput.value = data.bairro;
  regiaoONGInput.value = data.uf;
}