const parentScrollButton = document.querySelector('.scroll')
const scrollButton = document.getElementById('scrollButton')
const positionFooter = document.getElementById('positionFooter')

document.addEventListener("DOMContentLoaded", () => {
    window.scrollY <= 80 ? parentScrollButton.classList.add('d-none') : parentScrollButton.classList.remove('d-none')
    if((window.scrollY + window.screen.height) >= getOffset(positionFooter).top + 140){
        if(scrollButton.firstChild.nextSibling.getAttribute('fill') == 'currentColor') {
            scrollButton.firstChild.nextSibling.setAttribute('fill', 'white')
        }
    } else {
        scrollButton.firstChild.nextSibling.setAttribute('fill', 'currentColor')
    }
});

document.addEventListener('scroll', () => {
    window.scrollY <= 80 ? parentScrollButton.classList.add('d-none') : parentScrollButton.classList.remove('d-none')
    if((window.scrollY + window.screen.height) >= getOffset(positionFooter).top + 140){
        if(scrollButton.firstChild.nextSibling.getAttribute('fill') == 'currentColor') {
            scrollButton.firstChild.nextSibling.setAttribute('fill', 'white')
        }
    } else {
        scrollButton.firstChild.nextSibling.setAttribute('fill', 'currentColor')
    }
})

scrollButton.addEventListener('click', () => {
    window.scrollTo(0, 0)
});

// function getposition element
function getOffset(el) {
    const rect = el.getBoundingClientRect();
    return {
        left: parseInt(rect.left + window.scrollX),
        top: parseInt(rect.top + window.scrollY)
    };
}