const burger = document.getElementById('burger')
const menu = document.getElementById('mobile')
const close = document.getElementById('close')
let open = false;

burger.addEventListener('click', () => {
    open = true
    if (open) {
        menu.classList.add('left-0')
        menu.classList.remove('-left-[100%]')
    }
})

close.addEventListener('click', () => {
    open = false
    if (!open) {
        menu.classList.add('-left-[100%]')
        menu.classList.remove('left-0')
    }

})
