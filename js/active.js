// function ActiveFunction() {
//     // var linkActive = document.querySelector('.nav__link');
//     // linkActive.classList.add('active');
//     // document.querySelector(".nav__link").className = "active";
//     document.querySelector(".nav__link").classList.add('active');
// }
/*===== LINK ACTIVE  =====*/ 
const linkColor = document.querySelectorAll('.nav__link')
function colorLink(){
    if(linkColor){
        linkColor.forEach(l=> l.classList.remove('active'))
        this.classList.add('active')
    }
}
linkColor.forEach(l=> l.addEventListener('click', colorLink))

  