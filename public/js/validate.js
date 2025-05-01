const anyText = document.querySelectorAll('#any-text')




if (anyText != null) {

    anyText.forEach((input) => {


        input.addEventListener('input', function() {



            this.value = this.value.replace(/[^A-Za-z]/g, "")
        })



    });


}
