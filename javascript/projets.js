
document.querySelectorAll('.image_container img').forEach(image => {
    image.onclick = () => {
        const popup = document.querySelector('.popup_image');
            popup.style.display = 'block';
            popup.querySelector('img').src = image.src;
     }
});
document.querySelector('.popup_image img').onclick = () => {
    document.querySelector('.popup_image').style.display = 'none';
}

document.querySelector('.popup_image').onclick = (event) => {
    if (event.target === event.currentTarget) {
        event.currentTarget.style.display = 'none';
    }
}
