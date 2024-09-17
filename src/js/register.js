import Swal from 'sweetalert2'

const validateString = (str, field) =>{
    let error = ''
    if(str.length === 0){
        error= `${field} es un campo requerido`;

        return false
    }

    if(str.length <= 3){
        error= `${field} debe de ser mayo a 3 caracteres`;

        return false
    }
    return true

}
const validateForm = () =>{
    const validationRules = {
        name: {
          required: true,
          minLength: 3,
          errorMessage: "Debe de ser mayor a 3 caracteres"
        },
        lastname: {
            required: true,
            minLength: 3,
            errorMessage: "Debe de ser mayor a 3 caracteres"
        },
        username:{
            required: true,
            minLength: 3,
            errorMessage: "Debe de ser mayor a 3 caracteres"
        },
        email: {
          required: true,
          pattern: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
          errorMessage: "Debe de ser un email valido"
        },
        hackathonCtf: {
            required: true,
            errorMessage: "Debe de ser una opción válida"
        },
        teamName: {
            required: true,
            minLength: 1,
            errorMessage: "Debe de ser mayor a 1 caracter"
        },
       
        country :{
            required: true,
            minLength: 1,
            errorMessage: "Debe de ser mayor a 3 caracteres"
        }
        

      };
      const inputElements = document.querySelectorAll('input[name]');

      let isValid = true;
      inputElements.forEach(input => {
        const validationRule = validationRules[input.name];
        if (validationRule) {
          const isValidInput = validateInput(input, validationRule);
          isValid = isValid && isValidInput;
        }
      });
    
      return isValid;

}
function validateInput(input, rule) {
    const errorMessageElement = document.getElementById(`${input.name}Error`);
  
    if (rule.required && !input.value) {
      showError(errorMessageElement, rule.errorMessage);
      return false;
    }
  
    if (rule.minLength && input.value.length < rule.minLength) {
      showError(errorMessageElement, rule.errorMessage);
      return false;
    }
  
    if (rule.pattern && !rule.pattern.test(input.value)) {
      showError(errorMessageElement, rule.errorMessage);
      return false;
    }
  
    hideError(errorMessageElement);
    return true;
}

function showError(element, message) {
    element.textContent = message;
    element.classList.add('error-message');
}
  
function hideError(element) {
    element.textContent = '';
    element.classList.remove('error-message');
}

let registerForm = document.getElementById("registerForm");

registerForm.addEventListener("submit", e =>{
    e.preventDefault();
    let name = document.getElementById("name");
    let lastname = document.getElementById("lastname");        
    let username = document.getElementById("username");
    let email = document.getElementById("email");
    let hackthonCtf = document.getElementById("hackathonCtf");
    let teamName = document.getElementById("teamName");
    let teamMemberNum = document.getElementById("teamMemberNum");
    let country = document.getElementById("country");
   
    if(validateForm()){

        const data={
            name : name.value,
            lastname: lastname.value,
            username: username.value,
            email: email.value,
            hackthonCtf: hackthonCtf.value,
            teamName: teamName.value,
            teamMemberNum: teamMemberNum.value,
            country: country.value
        }
        try {
            //1.send form
            Swal.fire({
                title: 'Registro completado exitosamente',
                icon: 'success',
                confirmButtonText: 'Cool'
              })
            //2. clear fields
            const inputElements = document.querySelectorAll('input[name]');
            inputElements.forEach(input => input.value = '')


        } catch (error) {
            
        }
        console.log(data)
    }
    
   
} )