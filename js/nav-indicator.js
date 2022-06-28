const activePage = window.location.pathname;
// console.log(activePage);
const navLinks = document.querySelectorAll('nav ul li a').
forEach(link => {
    // console.log(link.href);
    if(link.href.includes(`${activePage}`)){
        link.classList.add('active');
    }
})
