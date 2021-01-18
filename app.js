function init(){

    const navBar = document.querySelector('nav');
    const main = document.querySelector('main');
    const yOffSet = main.offsetTop;
    const menuButton = document.querySelector('.menu button');

    function changeNavBar(){
        if(window.pageYOffset >= yOffSet){
            navBar.style.backgroundColor = "white";
            menuButton.style.backgroundColor = "green"
        }else{
            navBar.style.backgroundColor = "#FFC017";
            menuButton.style.backgroundColor = "black"
        }
    }

    window.onscroll = () => {
        changeNavBar();
    }
}

init();