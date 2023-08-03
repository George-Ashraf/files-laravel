
// user account dropdown menu
function menutoggle(){
    const togglemenu=document.querySelector('.menuu')
    togglemenu.classList.toggle('open')
}

function hidediv(){
let alert= document.querySelector('.alert')

alert.classList.add('hide')
}
setTimeout(() => {
hidediv()
}, 2000);

