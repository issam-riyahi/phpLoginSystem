

let name = document.getElementById('name');
let email = document.getElementById('email');
let uid = document.getElementById('uid');

let password = document.getElementById('password');

if(document.getElementById('login') !== null){

    document.getElementById('login').addEventListener('click', (e)=>{
        if(uid.value === ''){
            e.preventDefault();
            
        }
        
    })
}
if(document.getElementById('signup') !== null){

    document.getElementById('signup').addEventListener('click', (e)=>{
        if(uid.value === '' || name.value === '' || email.value === '' || password.value === ''){
            e.preventDefault();
            
        }
        
    })
}