
const openBtn = document.querySelector('.menu-icon');
const closeBtn = document.querySelector('.close-btn');
const mobileMenu = document.querySelector('.mobile-menu-list')

console.log(closeBtn);

closeBtn.addEventListener('click', e=>{
    mobileMenu.style.display = "none";
})

openBtn.addEventListener('click', e=>{
    mobileMenu.style.display = "block";
})