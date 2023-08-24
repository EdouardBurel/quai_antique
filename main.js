/* MENU PAGE - SELECTION */

let list = document.querySelectorAll(".listMenu li");
let boxes = document.querySelectorAll(".boxMenu");

list.forEach((el)=>{
    el.addEventListener("click", (e)=>{
        list.forEach((li)=>{
            li.classList.remove("active");
        });
        e.target.classList.add("active");

        boxes.forEach((el2)=>{
            el2.style.display = "none";
        });
        document.querySelectorAll(e.target.dataset.filter).forEach((li)=>{
            li.style.display = "flex";
        });
    });
});

/* NAVBAR TOGGLE  */
const toggleButton = document.getElementsByClassName('toggle-button')[0];
const navbarLinks = document.getElementsByClassName('navbar-links')[0];

toggleButton.addEventListener('click', () => {
    navbarLinks.classList.toggle('active');
});


/* PASSWORD SECURITY */
function togglePasswordVisibility() {
    var passwordInput = document.getElementById("passwordInput");
    var eyeIcon = document.getElementById("eyeIcon");

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        eyeIcon.classList.remove("fa-eye");
        eyeIcon.classList.add("fa-eye-slash");
    } else {
        passwordInput.type = "password";
        eyeIcon.classList.remove("fa-eye-slash");
        eyeIcon.classList.add("fa-eye");
    }
}