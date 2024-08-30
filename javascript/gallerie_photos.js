document.querySelectorAll('.image_container img').forEach(image => {
    image.onclick = () => {
        const popup = document.querySelector('.popup_image');
        popup.style.display = 'block';
        popup.querySelector('img').src = image.src;
    }
});

// Fermer le pop-up en cliquant sur l'image à l'intérieur
document.querySelector('.popup_image img').onclick = (event) => {
    event.stopPropagation(); // Empêche la propagation du clic à l'élément parent
    document.querySelector('.popup_image').style.display = 'none';
}

// Fermer le pop-up en cliquant n'importe où à l'intérieur de '.popup_image'
document.querySelector('.popup_image').onclick = (event) => {
    if (event.target === event.currentTarget) {
        event.currentTarget.style.display = 'none';
    }
}
