let task_popup = document.querySelector("#task_popup");
let tasks_close = document.querySelector("#tasks_close");
let tasks_open = document.querySelectorAll("#briefs .details-btn");

let task_brief_name = document.querySelector("#task_brief_name");

let tasks_edit_form = document.querySelector("#tasks_edit_form");
let task_delete = document.querySelector("#task_delete");

let title_task = document.getElementsByName("title_task")[0];
let descrip_task = document.getElementsByName("descrip_task")[0];
let date_from_task = document.getElementsByName("date_from_task")[0];
let date_to_task = document.getElementsByName("date_to_task")[0];

let title_task_e = document.getElementsByName("title_task_e")[0];
let descrip_task_e = document.getElementsByName("descrip_task_e")[0];
let date_from_task_e = document.getElementsByName("date_from_task_e")[0];
let date_to_task_e = document.getElementsByName("date_to_task_e")[0];

tasks_open.forEach(el => {
    el.addEventListener("click", (e) => {
        // brief_edit.setAttribute("idvalue", el.getAttribute("id-value"))
        loading.classList.remove("hide-grow");
        fetch("/tasks/" + el.getAttribute("id-value"))
            .then((res) => {
                return res.json();
            }).then((data) => {
                console.log(data);
                loading.classList.add("hide-grow");
                if (data.length > 0) {
                    tasks_edit_form.setAttribute('action', "/tasks/" + data[0].id_task + "/edit");
                    task_delete.setAttribute("href", "/tasks/" + data[0].id_task + "/delete");
                    task_popup.classList.remove("hide-slide");
                    task_brief_name.innerHTML = data[0].title_task;
                    title_task_e.value = data[0].title_task;
                    descrip_task_e.value = data[0].descrip_task;
                    date_from_task_e.value = data[0].date_from_task;
                    date_to_task_e.value = data[0].date_to_task;
                    console.log(data);
                }
                else {
                    alert("not found");
                }
            }).catch(() => {
                loading.classList.add("hide-grow");
                task_popup.classList.add("hide-slide");
                alert("error");
            });
    });
});

tasks_close.addEventListener("click", (e) => {
    task_popup.classList.add("hide-slide");
});

task_popup.addEventListener("click", (e) => {
    if (e.target.classList.contains("popup")) {
        task_popup.classList.add("hide-slide");
    }
});

let add_task_popup = document.querySelector("#add_task_popup");
let open_add_task = document.querySelector("#open_add_task");
let add_task_close = document.querySelector("#add_task_close");

open_add_task.addEventListener("click", ()=>{
    add_task_popup.classList.remove("hide-slide");
})

add_task_close.addEventListener("click", (e) => {
    add_task_popup.classList.add("hide-slide");
});

add_task_popup.addEventListener("click", (e) => {
    if (e.target.classList.contains("popup")) {
        add_task_popup.classList.add("hide-slide");
    }
});

