let table = document.querySelector("#search_table");

let inp_s = document.querySelector("#search_prom");

inp_s.addEventListener("keyup", (e) => {
    fetch("search/" + inp_s.value)
        .then((res) => {
            return res.text();
        }).then((data) => {
            console.log(data);
            table.innerHTML = data;
        })
}
)