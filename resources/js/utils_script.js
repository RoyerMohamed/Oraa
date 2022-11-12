function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#user_thumnail_img').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
}

$("#user_thumnail").change(function () {
    readURL(this);
});

tinymce.init({
    selector: '#test'
});

let menu = document.getElementById('my_nav')
menu.addEventListener('mouseover', (event) => {
    if (menu.classList.contains('nav_content_close')){
        menu.classList.remove('nav_content_close')
        menu.classList.add('nav_content_open')
    }
});
menu.addEventListener('mouseout', (event) => {
    if (menu.classList.contains('nav_content_open')){
        menu.classList.remove('nav_content_open')
        menu.classList.add('nav_content_close')
    }
});

