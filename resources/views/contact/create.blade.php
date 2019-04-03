@extends('layouts/base')

@section('content')
    <div class="form-content">
        @if($errors->any())
            <div class="alert-danger">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                <ul>
                    @foreach($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                    @endforeach

                </ul>
            </div>
        @elseif(session()->has('success'))
            <div class="alert-success">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                {{ session('success') }}
            </div>
        @endif
        <form method="post" action="{{ route('contacts.store') }}">
            @csrf
                <input type="text" name="name" id="inputName" placeholder="Seu nome">
                <input type="text" name="email" id="inputEmail" placeholder="Seu melhor email">
                <input type="tel" name="phone" class="phone" id="inputPhone" placeholder="Seu telefone">
                <textarea id="inputMessage" name="message" placeholder="Sua mensagem" rows="5"></textarea>
                <input type="file" name="attachedFile" id="inputFile">
                <button type="submit">Enviar</button>
        </form>
    </div>
@endsection
