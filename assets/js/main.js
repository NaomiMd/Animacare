let navbar = document.querySelector(".navbar");

window.addEventListener('scroll', () =>
{
    if(window.scrollY > 500)
    {
        navbar.classList.add('navbar-scrolled');
    }else{
        navbar.classList.remove('navbar-scrolled');
    }
})