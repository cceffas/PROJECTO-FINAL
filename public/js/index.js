function reloadScreen() {

    location.reload()
}
async function changeScreen(url, id_element) {


    const element = document.querySelector(id_element)

    const response = await fetch(url)


    if (response.ok) {


        let status_response = await response.text()

        if (status_response.length != 0) element.innerHTML = status_response




    } else {

        element.innerHTML = "<h1>erro ao carregar</h1>"


    }








}




function asideHide() {

    document.getElementById('asidebar').classList.toggle('hidden')
}

/*colorir os botoens do aside bar caso forem pressinados*/

const aside_buttons = document.querySelectorAll('#asidebar a')


aside_buttons.forEach(function (element, index) {


    if (element.href == location) {
        element.classList.add('text-white', 'bi-chevron-down');
    }

});
