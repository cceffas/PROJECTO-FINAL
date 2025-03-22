


function reloadScreen(){

    location.reload()
}
async function changeScreen(url, id_element) {


    const element = document.querySelector(id_element)

    const response = await fetch(url)


    if (response.ok) {


        let status_response = await response.text()

        if (status_response.length != 0) element.innerHTML = status_response




    }
    else {

        element.innerHTML = "<h1>erro ao carregar</h1>"


    }








}

// if (document.querySelector("#view") != null) {

//     change_page_request("http://127.0.0.1:8000/", "view")
// }