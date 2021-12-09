//Rendre les lignes du tableau cliquable (avec lien)
document.addEventListener("DOMContentLoaded", () => {
    const rows = document.querySelectorAll("tr[data-href]");
    rows.forEach(row => {
        row.addEventListener("click", () => {
            window.location.href = row.dataset.href;
        })
    })
});

//Montrer/masquer formulaire lieu
function showHideLieu() {
    let formLieu = document.getElementById("formLieu");
    let labelLieu = document.getElementById("labelLieu");
    let listLieu = document.getElementById("listLieu");
    if (formLieu.style.display === "block") {
        formLieu.style.display = "none";
        labelLieu.style.display = "block";
        listLieu.style.display = "block";
    } else {
        formLieu.style.display = "block";
        labelLieu.style.display = "none";
        listLieu.style.display = "none";
    }
}