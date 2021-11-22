document.addEventListener("DOMContentLoaded", function(event) {

    let elements = [];

    const showNavbar = (toggleId, navId, bodyId, headerId) =>{
    const toggle = document.getElementById(toggleId),
    nav = document.getElementById(navId),
    bodypd = document.getElementById(bodyId),
    headerpd = document.getElementById(headerId)
    
    if(toggle && nav && bodypd && headerpd){
    toggle.addEventListener('click', ()=>{
    nav.classList.toggle('show')
    toggle.classList.toggle('bx-x')
    bodypd.classList.toggle('body-base')
    headerpd.classList.toggle('body-base')
    })
    }
    }
    
    showNavbar('header-toggle','nav-bar','body-base','header')

    function debounce (func) {
        let timer;
        return function (event) {
            if (timer) clearTimeout(timer);
            timer = setTimeout(func, 100, event);
        };
    }
    
    function calculElements () {
        let totalHeight = 0;
        elements = [];
        [].forEach.call(document.querySelectorAll('.content-section'), function (div) {
            let section = {};
            section.id = div.id;
            totalHeight += div.offsetHeight;
            section.maxHeight = totalHeight - 25;
            elements.push(section);
        });
        onScroll();
    }

    function onScroll () {
        let scroll = window.pageYOffset;
        for (let i = 0; i < elements.length; i++) {
            let section = elements[i];
            if (scroll <= section.maxHeight) {
                let elems = document.querySelectorAll(".nav_list a");
                [].forEach.call(elems, function (el) {
                    el.classList.remove("active");
                });
                let activeElems = document.querySelectorAll(".nav_list a[data-target='" + section.id + "']");
                [].forEach.call(activeElems, function (el) {
                    el.classList.add("active");
                });
                break;
            }
        }
        if (window.innerHeight + scroll + 5 >= document.body.scrollHeight) { 
            let elems = document.querySelectorAll(".nav_list a");
            [].forEach.call(elems, function (el) {
                el.classList.remove("active");
            });
            let activeElems = document.querySelectorAll(".nav_list a:last-child");
            [].forEach.call(activeElems, function (el) {
                el.classList.add("active");
            });
        }
    }

    [].forEach.call(document.querySelectorAll('.scroll-to-link'), function (div) {
        div.onclick = function (e) {
            e.preventDefault();
            let target = this.dataset.target;
            document.getElementById(target).scrollIntoView({ behavior: 'smooth' });
            return false;
        };
    });
    
    calculElements();
    window.onload = () => {
        calculElements();
    };
    window.addEventListener("resize", debounce(function (e) {
        e.preventDefault();
        calculElements();
    }));
    window.addEventListener('scroll', function (e) {
        e.preventDefault();
        onScroll();
    });
});