@extends('layouts/base')

@section('content')
    <div class="alerts">
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
        @elseif(session()->has('warning'))
            <div class="alert-warning">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                {{ session('warning') }}
            </div>
        @endif
    </div>
    <div class="container-form">
        <form method="post" enctype="multipart/form-data" action="{{route('contact.store')}}">
            @csrf
                <input type="text" name="name" id="name" placeholder="Seu nome">
                <input type="text" name="email" id="email" placeholder="Seu melhor email">
                <input type="tel" name="phone" id="phone" placeholder="Seu telefone">
                <textarea name="message" id="message" placeholder="Sua mensagem" rows="6"></textarea>
                <input type="file" name="attachedFile" id="attachedFile">
                <button type="submit">Enviar</button>
        </form>
    </div>
@endsection
