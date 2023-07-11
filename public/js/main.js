// signin & signup
const signinbtn=document.querySelector('.signinbtn')
const signupbtn=document.querySelector('.signupbtn')
const formbx=document.querySelector('.formbx')

signupbtn.onclick=function(){
    formbx.classList.add('activee')
}
signinbtn.onclick=function (){
    formbx.classList.remove('activee')

}
// user account dropdown menu
function menutoggle(){
    const togglemenu=document.querySelector('.menuu')
    togglemenu.classList.toggle('open')
}


