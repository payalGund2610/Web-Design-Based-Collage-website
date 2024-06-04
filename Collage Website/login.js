const container = document.getElementById('container');
const registerBtn = document.getElementById('register');
const loginBtn = document.getElementById('login');

registerBtn.addEventListener('click', () => {
    container.classList.add("active");
});

loginBtn.addEventListener('click', () => {
    container.classList.remove("active");
});
{/* <script>   */ }
function validation() {
    var id = document.f1.user.value;
    var ps = document.f1.pass.value;
    if (id.length == "" && ps.length == "") {
        alert("User Name and Password fields are empty");
        return false;
    }
    else {
        if (id.length == "") {
            alert("User Name is empty");
            return false;
        }
        if (ps.length == "") {
            alert("Password field is empty");
            return false;
        }
    }
}
// </script>  