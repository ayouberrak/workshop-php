document.addEventListener("DOMContentLoaded", () => {
    let btn_add = document.getElementById("btn_add");
    let form_add = document.getElementById("form_add");

    btn_add.addEventListener('click', e => {
        e.preventDefault;
        form_add.style.display = "block";
    });
});
