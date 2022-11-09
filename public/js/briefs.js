// let table = document.querySelector("#search_table");
// let inp_s = document.querySelector("#search_inp");
// let promo_id = document.getElementsByName("id")[0];

// inp_s.addEventListener("keyup", (e) => {
//     fetch("/search_appr/" + promo_id.value + "/promotion/" + inp_s.value)
//         .then((res) => {
//             return res.text();
//         }).then((data) => {
//             console.log(data);
//             table.innerHTML = data;
//         })
// }
// )

let popup = document.querySelector("#edit_popup");
let close_popup = document.querySelector("#edit_close");
let edit_popup = document.querySelectorAll("#briefs .details-btn");
let loading = document.querySelector("#loading");

let title_brief = document.getElementsByName("title_brief")[0];
let descrip_brief = document.getElementsByName("descrip_brief")[0];
let date_from = document.getElementsByName("date_from")[0];
let date_to = document.getElementsByName("date_to")[0];

let brief_form = document.querySelector("#edit_form");
let brief_edit = document.querySelector("#edit_brief");
let brief_cancel = document.querySelector("#brief_cancel");
let brief_delete = document.querySelector("#brief_delete");

let title_temp = "";
let descrip_temp = "";
let date_from_temp = "";
let date_to_temp = "";

edit_popup.forEach(el => {
    el.addEventListener("click", (e) => {
        brief_edit.setAttribute("idvalue", el.getAttribute("id-value"))
        loading.classList.remove("hide-grow");
        fetch("/briefs/" + el.getAttribute("id-value") + "/get")
            .then((res) => {
                return res.json();
            }).then((data) => {
                loading.classList.add("hide-grow");
                if (data.length > 0) {
                    popup.classList.remove("hide-slide");
                    console.log(data);
                    edit_name.innerHTML = data[0].title_brief;
                    title_brief.value = data[0].title_brief;
                    descrip_brief.value = data[0].descrip_brief;
                    date_from.value = data[0].date_from;
                    date_to.value = data[0].date_to;
                }
                else {
                    alert("not found");
                }
            }).catch(() => {
                loading.classList.add("hide-grow");
                popup.classList.add("hide-slide");
                alert("error");
            });
    });
});

close_popup.addEventListener("click", (e) => {
    popup.classList.add("hide-slide");
    brief_save_to_edit();
});

popup.addEventListener("click", (e) => {
    if (e.target.classList.contains("popup")) {
        popup.classList.add("hide-slide");
        brief_save_to_edit();
    }
});




brief_form.addEventListener("submit", (e) => {
    e.preventDefault();
    if (brief_edit.getAttribute("mode") === "edit") {

        // Enable inputs and change the mode attribute to "Save"
        enable_inputs();
        brief_edit_to_save();
        store_inputs();
    }
    else if (brief_edit.getAttribute("mode") === "save") {
        let form_data = new FormData();
        form_data.append("title_brief", title_brief.value);
        form_data.append("descrip_brief", descrip_brief.value);
        form_data.append("date_from", date_from.value);
        form_data.append("date_to", date_to.value);
        form_data.append("_token", brief_form.children._token.value);
        fetch("briefs/" + brief_edit.getAttribute("idvalue") + "/edit", {
            method: "POST",
            body: form_data
        }).then((res) => {
            return res.text();
        }).then((data) => {
            if (data == "success") {
                let brief_div = document.querySelector("[div-id='" + brief_edit.getAttribute("idvalue") + "']");
                brief_div.getElementsByClassName("title_brief")[0].innerHTML = title_brief.value;
                brief_div.getElementsByClassName("descrip_brief")[0].innerHTML = descrip_brief.value;
                brief_div.getElementsByClassName("date_from")[0].innerHTML = date_from.value;
                brief_div.getElementsByClassName("date_to")[0].innerHTML = date_to.value;
                alert("updated!");
            }
            else {
                alert("error");
                enable_inputs();
                brief_edit_to_save();

            }
        })
        disable_inputs();
        brief_save_to_edit();
    }
});

brief_cancel.addEventListener("click", () => {
    disable_inputs();
    brief_save_to_edit();
    reset_inputs();
});


function brief_edit_to_save() {
    brief_edit.setAttribute("mode", "save");
    brief_edit.value = "Save";
    brief_delete.style.display = "none";
    brief_cancel.style.display = "inline-block";
}

function brief_save_to_edit() {
    brief_edit.setAttribute("mode", "edit");
    brief_edit.value = "Edit";
    brief_cancel.style.display = "none";
    brief_delete.style.display = "inline-block";
}

function enable_inputs() {
    title_brief.removeAttribute("readonly");
    descrip_brief.removeAttribute("readonly");
    date_from.removeAttribute("readonly");
    date_to.removeAttribute("readonly");
}

function disable_inputs() {
    title_brief.setAttribute("readonly", true);
    descrip_brief.setAttribute("readonly", true);
    date_from.setAttribute("readonly", true);
    date_to.setAttribute("readonly", true);
}

// Store input values in temporary variables
function store_inputs() {
    title_temp = title_brief.value;
    descrip_temp = descrip_brief.value;
    date_from_temp = date_from.value;
    date_to_temp = date_to.value;
}

// Reset input values
function reset_inputs() {
    title_brief.value = title_temp;
    descrip_brief.value = descrip_temp;
    date_from.value = date_from_temp;
    date_to.value = date_to_temp;
}


// let popup_add = document.querySelector("#add_promo");
// let close_popup_add = document.querySelector("#close_btn");
// let open_popup_add = document.querySelector("#add_appr");

// close_popup_add.addEventListener("click", (e) => {
//     popup_add.classList.add("hide-slide");
// });

// popup_add.addEventListener("click", (e) => {
//     if (e.target.classList.contains("popup")) {
//         popup_add.classList.add("hide-slide");
//     }
// });

// open_popup_add.addEventListener("click", (e) => {
//     popup_add.classList.remove("hide-slide");
// });


// let select_promo = document.querySelector("#select_promo");

// select_promo.addEventListener("change", (e) => {
//     window.location.href = "/promotion/" + select_promo.value + "/edit";
// });