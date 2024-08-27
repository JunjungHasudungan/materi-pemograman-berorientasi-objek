window.onload = function() {
    const message = document.getElementById('message');
    if (message) {
        message.style.display = 'block';
        setTimeout(function() {
            message.style.display = 'none';
        }, 3000);
    }
};
