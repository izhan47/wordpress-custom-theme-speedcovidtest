let $header = document.querySelector('.header');
if($header) {
    let $menu = document.querySelector('.menu');
    let $burger = document.querySelector('.burger');
    let $menuClose = document.querySelector('.menu__mobile-close');
    let $body = document.querySelector('body');
    
    window.addEventListener('scroll', () => {
        $header.classList.toggle('_is-scroll', window.pageYOffset > 50);
    })

    $burger.addEventListener('click', () => {
        $menu.classList.add('_open');
        $body.classList.add('_lock');
    })
    $menuClose.addEventListener('click', () => {
        $menu.classList.remove('_open');
        $body.classList.remove('_lock');
    })
}


(function dropDownInit() {
    let $elements = [].slice.call(document.querySelectorAll('.drop-down'));
    if($elements.length) {
        $elements.forEach(element => {
            let dropList = element.querySelector('.drop-down__list');
            let trigger = element.querySelector('.drop-down__title');
            trigger.addEventListener('click', (e) => {
                if(document.documentElement.clientWidth < 992) {
                    e.preventDefault();
                    _slideToggle(dropList);
                    element.classList.toggle('_is-open');
                }
            })
        });
    }
})();

(function menuItemHasChildren() {
    let $elements = [].slice.call(document.querySelectorAll('.menu-item-has-children'));
    if($elements.length) { 
        $elements.forEach(element => {
            let dropList = element.querySelector('.sub-menu');
            let trigger = element.querySelector('.menu__link');
            trigger.addEventListener('click', (e) => {
                if(document.documentElement.clientWidth < 992) {
                    e.preventDefault();
                    _slideToggle(dropList);
                    element.classList.toggle('_is-open');
                }
            })
        });
    }
})();