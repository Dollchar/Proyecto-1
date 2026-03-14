const slides = document.querySelectorAll(".slide")

let angle = 0
const step = 360 / slides.length

slides.forEach((slide,i)=>{

slide.style.transform =
`rotateY(${i*step}deg) translateZ(400px)`

})

function rotateSlider(){

angle += step

slides.forEach((slide,i)=>{

slide.style.transform =
`rotateY(${i*step-angle}deg) translateZ(400px)`

})

}

setInterval(rotateSlider,3000)