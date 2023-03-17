window.addEventListener('DOMContentLoaded', () =>{

    let page = document.querySelector("[data-page]");
    console.log(page.dataset.page)

    const links = document.querySelectorAll('[data-link]');

    console.log()
    console.log()

    for (let i = 0; i < links.length; i++){
        links[i].classList.remove('active');
        if (links[i].dataset.link == page.dataset.page){
            links[i].classList.add('active');
        }

    }



});
