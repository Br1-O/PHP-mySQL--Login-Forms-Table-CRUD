const loginForm = document.getElementById('login-form');
const registerForm = document.getElementById('register-form');
const loginBtn = document.getElementById('login-btn');
const registerBtn = document.getElementById('register-btn');

loginBtn.addEventListener('click', () => {
  loginForm.classList.add('visible');
  registerForm.classList.remove('visible');
});

registerBtn.addEventListener('click', () => {
  loginForm.classList.remove('visible');
  registerForm.classList.add('visible');
});