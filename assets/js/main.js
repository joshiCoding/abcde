

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