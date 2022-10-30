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