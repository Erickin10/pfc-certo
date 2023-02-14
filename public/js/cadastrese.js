const enderecouserForm = document.querySelector("#msform");
const cepuserInput = document.querySelector("#cepuser");
const enderecouserInput = document.querySelector("#enderecouser");
const cidadeuserInput = document.querySelector("#cidadeuser");
const bairrouserInput = document.querySelector("#bairrouser");
const regiaouserInput = document.querySelector("#regiaouser");
const telefoneuserInput = document.querySelector("#telefoneuser")
const formInputs = document.querySelectorAll("[data-input]");
const closeButton = document.querySelector("#close-message");


//JavaScript que coloca "()" e "-" no número de telefone para facilitar o input do usario.

telefoneuserInput.addEventListener('keypress', (e) => {
  const onlyNumbers = /[0-9]/;
  const key = String.fromCharCode(e.keyCode);
  
  if (!onlyNumbers.test(key)) {
  e.preventDefault();
  return;
  }
  
  let inputLength = telefoneuserInput.value.length
  if (inputLength == 0) {
    telefoneuserInput.value += '('
  }
  if (inputLength == 3) {
    telefoneuserInput.value += ')'
  }
  if (inputLength == 9) {
    telefoneuserInput.value += '-'
  }
  });

// Validação do CEP input

cepuserInput.addEventListener("keypress", (e) => {

  const onlyNumbers = /[0-9]/;
  const key = String.fromCharCode(e.keyCode); 

  // Permite somente números 
  if (!onlyNumbers.test(key)) {
    e.preventDefault();
    retuturn;
  }

  // Adiciona hífen após 5 caracteres digitados
  if (cepuserInput.value.length === 5 && key !== "-") {
    cepuserInput.value += "-";
  }
  // Remover traço do CEP antes de enviar para a API
  if (onlyNumbers.test(key)) {
    let cepWithoutDash = cepuserInput.value.replace(/-/g, "");

    // Enviar CEP sem traço para a API
    // ...
  }
});


//Evento para obter endereço

cepuserInput.addEventListener("keyup", (e) => {

  const inputValue = e.target.value;

//Checa se temos um CEP

  if (inputValue.length === 9) {

    getenderecouser(inputValue);

  }
});

//Obtem endereço da API

  const getenderecouser = async (cepuser) => {
 
    cepuserInput.blur();
    const apiUrl = `https://viacep.com.br/ws/${cepuser}/json/`;
    const response = await fetch(apiUrl);
    const data = await response.json();
  
    if (data.erro) {

      toggleMessage("CEP não encontrado");
      return;
    }
  
    enderecouserInput.value = data.logradouro;
    cidadeuserInput.value = data.localidade;
    bairrouserInput.value = data.bairro;
    regiaouserInput.value = data.uf;
  
  
  };
  
