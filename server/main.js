// <!-- development warning -->



// for creating mobile menu

const openBtn = document.querySelector('.menu-icon');
const closeBtn = document.querySelector('.close-btn');
const mobileMenu = document.querySelector('.mobile-menu-list')

console.log(closeBtn);

closeBtn.addEventListener('click', e=>{
    mobileMenu.style.display = "none";
})

openBtn.addEventListener('click', e=>{
    mobileMenu.style.display = "block";

    window.addEventListener('scroll', e =>{
        mobileMenu.style.display = "none";
        console.log('scrolling')
    })  //to close menu on scroll
   
})


//class for smooth scroll feature

var scroll = new SmoothScroll('.smooth-scroll', {
    speed : 800,
    updateURL:false,
    offset:80
});

//for testimony
console.log(window.innerWidth)
let totWidth = window.innerWidth;
let slides = document.querySelectorAll(".testimony-says")
let totSlides = slides.length;
let midSlide = Math.floor(totSlides/2);
slides.forEach(slide =>{
     slide.style.display = "none";
})

const nextBtn = document.querySelector('.next-btn');
const prevBtn = document.querySelector('.prev-btn');

let curSlide = [];
console.log(slides[0].getBoundingClientRect().left)

if(totWidth < 500){
//    for mobile client
 curSlide =[midSlide];

}
else if(totWidth < 800){
//    for tablet 2 testimony
curSlide =[midSlide-1 , midSlide];

} 
else{
//    for desktop 3 testimony
curSlide =[midSlide-1 , midSlide, midSlide +1];
}

curSlide.forEach((i) =>{
 slides[i].style.display = "flex"

})
console.log(slides[1].style.right)

console.log(slides[1].style.right)

forwardSlide = () =>{
 let push = curSlide[curSlide.length -1] +1;
 if(push >= totSlides) push = 0;
 curSlide.push(push);
 curSlide.shift();
 console.log(curSlide);
}

revertSlide = () =>{
 let push = curSlide[0] - 1;
 if(push < 0) push = totSlides -1
 curSlide.unshift(push);
 curSlide.pop();
}


nextBtn.addEventListener("click", e =>{
 forwardSlide();
 slides.forEach( slide =>{
     slide.style.display = "none";

     
 })
 curSlide.forEach((i) =>{
     slides[i].style.display = "flex"

 })

})

prevBtn.addEventListener("click", e =>{
 revertSlide();
 slides.forEach( slide =>{
     slide.style.display = "none"

 })
 curSlide.forEach(i =>{
     slides[i].style.display = "flex"
 })

})

// for demo submit button
const demo = document.querySelector('.demo-content-form');
const demoBeforeSubmit = document.querySelector('.demo-before-submit');
const demoAfterSubmit = document.querySelector('.demo-after-submit');

demoBeforeSubmit.querySelector('input[type="submit"]').addEventListener('click', (e) =>{
    // trying async form submission
    e.preventDefault();
    let formElement = demoBeforeSubmit.querySelectorAll('input');

    if(demoValidator(formElement) == true){
        postDemoData();
    
        demoAfterSubmit.style.display = "flex";
    
        demoBeforeSubmit.classList.remove('demo-transition-to');
        demoBeforeSubmit.classList.add('demo-transition-from');
        
        demoAfterSubmit.classList.remove('demo-transition-from');
        demoAfterSubmit.classList.add('demo-transition-to');
        
        demo.style.transform = "rotateY(180deg)";
        demoBeforeSubmit.style.display = "none";    
    }

});

demoAfterSubmit.querySelector('button').addEventListener('click', () =>{
    demoBeforeSubmit.style.display = "flex";
    
    demoAfterSubmit.classList.remove('demo-transition-to');
    demoAfterSubmit.classList.add('demo-transition-from');
    
    demoBeforeSubmit.classList.remove('demo-transition-from');
    demoBeforeSubmit.classList.add('demo-transition-to');
    
    demo.style.transform = "rotateY(180deg)";
    demoAfterSubmit.style.display = "none";
    
})
function demoValidator(input){
    let validate = false;
    const notification = demoBeforeSubmit.querySelectorAll(".demo-notification");
    // input[0].style.animation = "vibrate 0.5s infinte";
// for email or phone number error handling
    if(input[0].value == ''){
        notification[0].style.visibility = "visible";
        notification[0].innerHTML = "Please give a email or phone number";
        input[0].style.borderColor = "red";
    }
    else if(!emailValidator(input[0].value) && !phoneValidator(input[0].value)){
        notification[0].style.visibility = "visible";
        notification[0].innerHTML = "Email or Phone no. incorrect";
        input[0].style.borderColor = "red";
    }
    else{
        if(emailValidator(input[0].value)) {
            notification[0].style.visibility = "hidden";
            input[0].style.borderColor = "green";
        }
        if(phoneValidator(input[0].value)) {
            notification[0].style.visibility = "hidden";
            input[0].style.borderColor = "green";
        }
    }
// for name error handling
    if(input[1].value == ''){
        notification[1].style.visibility = "hidden";
        input[1].style.borderColor = "white";
    }
    else if(!nameValidator(input[1].value)){
        notification[1].style.visibility = "visible";
        notification[1].innerHTML = "Incorrect Name";
        input[1].style.borderColor = "red";
    }
    else{
        if(nameValidator(input[1].value)) {
            notification[1].style.visibility = "hidden";
            input[1].style.borderColor = "green";
        }
    }
// setting validation to true if everything is right
    if(emailValidator(input[0].value) || phoneValidator(input[0].value)){
        if(nameValidator(input[1].value || input[1].value == '')){
            validate = true;
        }
    }
    return validate;
}

// async post function
async function postDemoData(){
// ------ make a data validator function here 
    // ajax handling of data

    // data storing
    let formElement = demoBeforeSubmit.querySelectorAll('input');
    let formData = new FormData;
    for(let i =0; i < formElement.length-1; i++){
        formData.append(formElement[i].name, formElement[i].value );
    }
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            demoAfterSubmit.querySelector('.demo-response').innerHTML = this.responseText;
        }
    }
    xmlhttp.open("POST", "responses/demoResponse.php", true);
    xmlhttp.send(formData);
}



// for feedback submit button
const feedbackBeforeSubmit = document.querySelector('.feedback-before-submit');
const feedbackAfterSubmit = document.querySelector('.feedback-after-submit');

feedbackBeforeSubmit.querySelector('input[type="submit"]').addEventListener('click', (e) =>{
    e.preventDefault();
    let formElement = feedbackBeforeSubmit.querySelectorAll('input');
    if(feedbackValidator(formElement) == true){
        postFeedbackData()
        feedbackBeforeSubmit.style.display = "none";
        feedbackAfterSubmit.style.display = "flex";    
    }
});

feedbackAfterSubmit.querySelector('button').addEventListener('click', () =>{
    feedbackBeforeSubmit.style.display = "flex";
    feedbackAfterSubmit.style.display = "none";
    
})

function feedbackValidator(input){
    let validate = true;
    let textarea = feedbackBeforeSubmit.querySelector('textarea');
    const notification = feedbackBeforeSubmit.querySelectorAll(".fd-notification");
// name validation
    if(input[0].value !== '' && !nameValidator(input[0].value)){
        notification[0].style.visibility = "visible";
        input[0].style.borderColor = 'red';
        notification[0].innerHTML = "Incorrect Name";
        validate= false;
    }
    if(input[0].value !== '' && nameValidator(input[0].value)){
        input[0].style.borderColor = 'green';
    }
    if(input[1].value !== '' && !nameValidator(input[1].value)){
        notification[0].style.visibility = "visible";
        input[1].style.borderColor = 'red';
        notification[0].innerHTML = "Incorrect Name";
        validate = false;
    }
    if(input[1].value !== '' && nameValidator(input[1].value)){
        input[1].style.borderColor = 'green';
    }

    if(input[0].value == '' && input[1].value == ''){
        input[0].style.borderColor = 'black';
        input[1].style.borderColor = 'black';
        notification[0].style.visibility = "hidden";
    }
    else if(input[0].value == '' && nameValidator(input[1].value)){
        input[0].style.borderColor = 'black';
        notification[0].style.visibility = "hidden";
    }
    else if(input[1].value == '' && nameValidator(input[0].value)){
        input[1].style.borderColor = 'black';
        notification[0].style.visibility = "hidden";
    }
    else if(nameValidator(input[0].value) && nameValidator(input[1].value)){
        notification[0].style.visibility = "hidden";
    }
// email and phone validation
    if(input[2].value == '' && input[3].value == ''){
        input[2].style.borderColor = 'red';
        input[3].style.borderColor = 'red';
        notification[1].style.visibility = "visible";
        notification[1].innerHTML = 'Please give email or phone number';
        validate = false;
    }else {
        if(input[2].value != '' && !emailValidator(input[2].value)){
            input[2].style.borderColor = 'red';
            notification[1].style.visibility = "visible";
            notification[1].innerHTML = "Please Give valid Email";
            validate= false;
        }
        if(input[3].value != '' && !phoneValidator(input[3].value)){
            input[3].style.borderColor = 'red';
            notification[2].style.visibility = "visible";
            notification[2].innerHTML = "Please Give valid Phone no.";
            validate= false;
        }    
    }
    if(input[2].value != '' || input[3].value != ''){
        if(input[2].value == ''){
            input[2].style.borderColor = 'black';
            notification[1].style.visibility = "hidden";
        }
        else if(emailValidator(input[2].value)){
            input[2].style.borderColor = "green";
            notification[1].style.visibility = "hidden";
        }
    
        if(input[3].value == ''){
            input[3].style.borderColor = 'black';
            notification[2].style.visibility = "hidden";
        }
        else if(phoneValidator(input[3].value)){
            input[3].style.borderColor = "green";
            notification[2].style.visibility = "hidden";
        }    
    }


// subject and message validation
    if(input[4].value === '' && textarea.value === ''){
        input[4].style.borderColor = 'red';
        textarea.style.borderColor = 'red';
        notification[3].style.visibility = "visible";
        notification[3].innerHTML = "Please give atleast subject or message";
        validate = false;
    }
    else{
        if(input[4].value !== '' ) input[4].value = sanitize(input[4].value);
        if(textarea.value !== '') textarea.value = sanitize(textarea.value)
    }
    if(input[4].value != '' || textarea.value != ''){
        if(input[4].value == ''){
            input[4].style.borderColor = 'black';
            notification[3].style.visibility = "hidden";
        }
        else{
            input[4].style.borderColor = "green";
            notification[3].style.visibility = "hidden";
        }
    
        if(textarea.value == ''){
            textarea.style.borderColor = 'black';
            notification[3].style.visibility = "hidden";
        }
        else{
            textarea.style.borderColor = "green";
            notification[3].style.visibility = "hidden";
        }    
    }


return validate;

}

// async post function
async function postFeedbackData(){
// ------ make a data validator function here 
    // ajax handling of data

    // data storing
    let formElement = feedbackBeforeSubmit.querySelectorAll('input');
    let formData = new FormData;
    for(let i =0; i < formElement.length-1; i++){
        formData.append(formElement[i].name, formElement[i].value );
    }
    formData.append('fd-message', feedbackBeforeSubmit.querySelector('textarea').value);
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            feedbackAfterSubmit.querySelector('.feedback-response').innerHTML = this.responseText;
        }
    }
    xmlhttp.open("POST", "responses/feedbackResponse.php", true);
    xmlhttp.send(formData);
}

//validator function

function nameValidator(name){
    let shouldcontain = /^[A-Za-z ]+$/;
    console.log("insided validator")
    if(name.match(shouldcontain))   return true;
    else    return false;
}

function emailValidator(email){
    let shouldcontain = /^(?:[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+\.)*[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+@(?:(?:(?:[a-zA-Z0-9](?:[a-zA-Z0-9\-](?!\.)){0,61}[a-zA-Z0-9]?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9\-](?!$)){0,61}[a-zA-Z0-9]?)|(?:\[(?:(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\.){3}(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\]))$/;
    if(email.match(shouldcontain))  return true;
    return false;
}

function phoneValidator(phone){
    let shouldcontain = /^[-+]?[0-9]+$/;
    if(phone.match(shouldcontain)) return true;
    return false;
}

function sanitize(str) {
    const map = {
        '&': '&amp;',
        '<': '&lt;',
        '>': '&gt;',
        '"': '&quot;',
        "'": '&#x27;',
        "/": '&#x2F;',
    };
    const reg = /[&<>"'/]/ig;
    return str.replace(reg, (match)=>(map[match]));
  }
  

