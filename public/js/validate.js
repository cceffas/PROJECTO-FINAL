
const regex_anyText = /[^A-Za-z-0-\s]/g


function gerateValidationElements(id, regex) {

    $array = document.querySelectorAll(`#${id}`)

    if ($array != null) {

        $array.forEach((item) => {

            item.addEventListener('input', function () {

                this.value = this.value.replace(regex,'')
            })

        })
    }

}

gerateValidationElements('any-text', regex_anyText)
// gerateValidationElements('any-tel', regex_tel)
