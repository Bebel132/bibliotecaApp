let loginBtn = document.querySelectorAll(".loginBtn");
loginBtn.forEach(e => {
    e.addEventListener("click", () => { 
        if(e.id == "acervo"){
            window.location.href = "acervo.html";
        } else if(e.id == "membroBiblioteca"){
            document.querySelector(".login-form").classList.toggle("displayNone");
            document.querySelector(".loginBtn-container").classList.toggle("displayNone");
        }
    })
})

let form = document.querySelector(".login-form");
form.addEventListener("submit", e => {
    e.preventDefault()
    let senha = document.querySelector("#senha").value;
    if(senha == "HUdeRChEl"){
        window.location.href = "appBase.html";
    } else {
        alert("senha incorreta");
    }
    // HUdeRChEl
    console.log(senha);
})