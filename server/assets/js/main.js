

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
