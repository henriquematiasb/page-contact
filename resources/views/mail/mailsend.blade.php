<!DOCTYPE html>
<html lang="en">
<head>
    <style>
    * {
        font-family: 'Neutrif Pro', Arial, Helvetica, sans-serif;
    }

    h1 {
        font-size: 30px;
        width: 100%;
        background: #17a2b8;
        height: 45px;
        color: #fff;
    }

    h2 {
        font-size: 24px;
    }

    ul {
        list-style: none;
    }

    li {
      font-size: 20px;
    }

</style>
</head>
<body>
    <h1>Novo contato cadastrado</h1>
    <h2>Informações submetidas</h2>
    <ul>
        <li>Nome: {{$informationRegistered->name}}</li>
        <li>E-mail: {{$informationRegistered->email}}</li>
        <li>Telefone: {{$informationRegistered->phone}}</li>
        <li>Mensagem: {{$informationRegistered->message}}</li>
        <li>Caminho do upload: {{$informationRegistered->attached_file}}</li>
        <li>IP do remetente: {{$informationRegistered->sender_ip}}</li>
        <li>Data e hora de envio: {{$informationRegistered->shipping_date}}</li>
    </ul>
</body>
</html>
