!
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ficha_{{ $aluno->nome}}</title>
</head>
<style>
* {
    box-sizing: border-box;
    font-family: sans-serif;
    list-style: none;
}

hr {
    border: none;
    border-bottom: solid 1px black;
    border-top: solid 1px black;
    background: transparent;
    height: 4px;
}

img {

    height: 96px;
    width: 96px;
}

h1 {
    display: inline;
}

li {

    margin: 4px;
}

.header {

    width: 100%;
    min-height: 64px;
    padding: 2px;
    text-transform: capitalize;
}
.pay{



	width: 100%;
	height:300px;
	border:1px solid;
}

.assinatura {


    float: right;
    border-bottom: 1px solid black;
    width: 190px;
}

</style>

<body>
    <div class="header">
        <center>
            <img src="logomark.jpg" alt="capa" />
            <h2>centro de formação profissional INDUSTEC</h2>
        </center>
        {{-- end --}}
        <hr>
        {{-- end --}}
        <ul>
            <li><b>Cidade:</b>Luanda</li>
            <li><b>endereço:</b>cacuaco</li>
            <li><b>Nif:</b>5401182937</li>
            <li><b>Email:</b>industecao@gmail.com</li>
            <li><b>telefone:</b>940 674 925</li>
        </ul>
    </div>
    {{-- end --}}
    <hr>
    {{-- end --}}
    <center>
        <h3>*Recibo de inscrição</h3>
    </center>
    {{-- end --}}
    <hr>
    {{-- end --}}
    <div>
        <center>
            <h4>dados do cliente</h4>
        </center>
        {{-- end --}}
        <ul>
            <li><b>Curso:</b> {{ $aluno->cursos()->get()[0]->nome }}</li>
            <li><b>Nome:</b> {{ $aluno->nome }} </li>
            <li><b>email:</b> {{ $aluno->email }} </li>
            <li><b>telefone:</b> {{ $aluno->tel }} </li>
            <li><b>data de nascimento:</b> {{ $aluno->dt_nascimento }} </li>
            {{-- <li><b>Nº de bilhete de identidade:</b> {{ $aluno->bi }} </li> --}}
        </ul>
    </div>
    {{-- end --}}
    <hr>
    {{-- end --}}
    <div class="pay">
    </div>
    {{-- end --}}
    <div class="assinatura">
        <p>Responsavel</p>
    </div>
    {{-- end --}}
</body>

</html>
