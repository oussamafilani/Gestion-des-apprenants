// validation script here
const inp_field = {
    user: /^[a-z\d]{1,3}$/i,
    pass: /^[a-zA-Z\d]{8,20}$/,
    
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