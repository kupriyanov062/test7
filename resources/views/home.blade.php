@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Главная</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                   Вы авторизированы
                        </br>
                   Баланс : {{ $wallets->balance }}
                    </br>
                        <form class="form-horizontal" method="POST" action="/deposit/put" >
                            {{ csrf_field() }}
                        <p><b>Пополнение/Снятие:</b><Br>
                        <input type="number"  min="-100" max="100"  value="0" step ="0,01" name="money">
                        </p>
                            <button type="submit">Выполнить</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
