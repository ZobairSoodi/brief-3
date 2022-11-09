let table = document.querySelector("#search_table");
let inp_s = document.querySelector("#search_inp");
let promo_id = document.getElementsByName("id")[0];

inp_s.addEventListener("keyup", (e) => {
    fetch("/search_appr/" + promo_id.value + "/promotion/" + inp_s.value)
        .then((res) => {
            return res.text();
        }).then((data) => {
            console.log(data);
            table.innerHTML = data;
        })
}
)

let form = document.querySelector("#edit_form");
let popup = document.querySelector("#edit_popup");
let close_popup = document.querySelector("#edit_close");
let edit_popup = document.querySelectorAll("#appr_content .edit-btn");
let loading = document.querySelector("#loading");

let edit_form = document.querySelector("#edit_form");
let edit_name = document.querySelector("#edit_name");
let nom_e = document.getElementsByName("nom_e")[0];
let prenom_e = document.getElementsByName("prenom_e")[0];
let email_e = document.getElementsByName("email_e")[0];
let telephone_e = document.getElementsByName("telephone_e")[0];
let CIN_e = document.getElementsByName("CIN_e")[0];
let id_promo_e = document.getElementsByName("id_promo_e")[0];
let date_naissance_e = document.getElementsByName("date_naissance_e")[0];
let parent_telephone_e = document.getElementsByName("parent_telephone_e")[0];
let address_e = document.getElementsByName("address_e")[0];
let filiere_e = document.getElementsByName("filiere_e")[0];
let delete_appr = document.querySelector("#delete_appr");

edit_popup.forEach(el => {
    el.addEventListener("click", (e) => {
        form.setAttribute("action", "/promotion/apprenants/" + el.getAttribute("id-value") + "/edit")
        loading.classList.remove("hide-grow");
        fetch("/get_appr/" + el.getAttribute("id-value"))
            .then((res) => {

                return res.json();
            }).then((data) => {
                loading.classList.add("hide-grow");
                if (data.length > 0) {
                    popup.classList.remove("hide-slide");
                    console.log(data);
                    edit_name.innerHTML = data[0].nom + " " + data[0].prenom;
                    nom_e.value = data[0].nom;
                    prenom_e.value = data[0].prenom;
                    email_e.value = data[0].email;
                    telephone_e.value = data[0].telephone;
                    CIN_e.value = data[0].CIN;
                    id_promo_e.value = data[0].promo_id;
                    date_naissance_e.value = data[0].date_naissance;
                    parent_telephone_e.value = data[0].parent_telephone;
                    address_e.value = data[0].address;
                    filiere_e.value = data[0].filiere;
                    delete_appr.setAttribute("href", "/promotion/apprenants/" + el.getAttribute("id-value") + "/delete")
                }
                else {
                    alert("not found");
                }
            }).catch(() => {
                loading.classList.add("hide-grow");
                alert("error");
            });
    });
});

close_popup.addEventListener("click", (e) => {
    popup.classList.add("hide-slide");
});

popup.addEventListener("click", (e) => {
    if (e.target.classList.contains("popup")) {
        popup.classList.add("hide-slide");
    }
});


let popup_add = document.querySelector("#add_promo");
let close_popup_add = document.querySelector("#close_btn");
let open_popup_add = document.querySelector("#add_appr");

close_popup_add.addEventListener("click", (e) => {
    popup_add.classList.add("hide-slide");
});

popup_add.addEventListener("click", (e) => {
    if (e.target.classList.contains("popup")) {
        popup_add.classList.add("hide-slide");
    }
});

open_popup_add.addEventListener("click", (e) => {
    popup_add.classList.remove("hide-slide");
});


let select_promo = document.querySelector("#select_promo");

select_promo.addEventListener("change", (e) => {
    window.location.href = "/promotion/" + select_promo.value + "/edit";
});