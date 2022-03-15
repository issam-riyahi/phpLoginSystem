

let name = document.getElementById('name');
let email = document.getElementById('email');
let uid = document.getElementById('uid');

let password = document.getElementById('password');
let r_password = document.getElementById('rpsw');

if(document.getElementById('login') !== null){

    document.getElementById('login').addEventListener('click', (e)=>{
        if(uid.value === ''){
            e.preventDefault();
            
        }
        
    })
}
if(document.getElementById('signup') !== null){

    document.getElementById('signup').addEventListener('click', (e)=>{
        if(uid.value === '' || name.value === '' || email.value === '' || password.value === '' || r_password.value === ''){
            e.preventDefault();

            // console.log('heelo');
            document.querySelectorAll('input').forEach(input => {
                input.style.color = 'red';
            })
            
        }
        
        
    })
}

uid.addEventListener('keydown', (event)=> {
    console.log(uid.value.length);
    
    if(event.key === 'Backspace' && uid.value.length <= 1){
       
        uid.style.color = '';
        return
       
    }
    if(uid.value.match(/^[a-zA-Z0-9]+$/g)){
        uid.style.color = 'green';
    }
    else {
        
        uid.style.color = 'red';
    }
})