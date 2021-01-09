

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


// for demo submit button
const demoBeforeSubmit = document.querySelector('.demo-before-submit');
const demoAfterSubmit = document.querySelector('.demo-after-submit');

demoBeforeSubmit.querySelector('input[type="submit"]').addEventListener('click', (e) =>{
    e.preventDefault();
    demoBeforeSubmit.style.display = "none";
    demoAfterSubmit.style.display = "flex";
});

demoAfterSubmit.querySelector('button').addEventListener('click', () =>{
    demoBeforeSubmit.style.display = "flex";
    demoAfterSubmit.style.display = "none";
    
})