const inputs = document.querySelectorAll('input');

const patterns = {
  username: /^[a-z\d]{3,12}$/i,
  password: /^[\d\w@-]{6,20}$/i,
  email: /^([a-z\d\.-]+)@([a-z\d-]+)\.([a-z]{2,8})(\.[a-z]{2,8})?$/,
};

inputs.forEach((input) => {
  input.addEventListener('keyup', (e) => {
    validate(e.target, patterns[e.target.attributes.id.value]);
  });
});

function validate(field, regex) {
  if (regex.test(field.value)) {
    field.className = 'form-control valid';
  } else {
    field.className = 'form-control invalid';
  }
}
