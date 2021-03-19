// validation script here
const inp_field = {
    pseudo: /^[a-z\d]{1,3}$/i,
    email: /^([a-z\d\.-]+)@([a-z\d-]+)\.([a-z]{2,8})(\.[a-z]{2,8})?$/,
    password: /^[a-zA-Z\d]{8,20}$/,
    cpassword: /^[a-zA-Z\d]{8,20}$/,
    phone:/^\d{12}$/
  }
  
  //spaces are not allowed in range
  //select all the input fields and add an onkeyup event listener to them
  
  const validate = (field, regex) => {
    regex.test(field.value) ? field.className = 'valid' : field.className = 'invalid';
  }
  
  let keys = document.querySelectorAll('input');
  keys.forEach(item => item.addEventListener(
    'keyup', e => {
      validate(e.target, inp_field[e.target.attributes.name.value])
    }
  ));
  //document.addEventListener('click', () => console.log('click'));