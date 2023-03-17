window.addEventListener('DOMContentLoaded', () =>{
    const loginForm = document.querySelector('#loginForm');
    const toRegister = document.querySelector('#toRegister');
    const registerForm = document.querySelector('#registerForm');
    const toLogin = document.querySelector('#toLogin');

    toRegister.addEventListener('click', (e)=>{
        e.preventDefault();
        registerForm.classList.remove('hide')
        loginForm.classList.add('hide')
    });

    toLogin.addEventListener('click', (e)=>{
        e.preventDefault();
        loginForm.classList.remove('hide')
        registerForm.classList.add('hide')
    });


});
