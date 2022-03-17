@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                  {{ __('Envio de e-mail com MailHog') }}
                </div>
                <div class="card-body">
                    <h3>
                        {{ __('E-mail enviado com sucesso!') }}                    
                    </h3>
                    <br />
                    <a class="btn btn-primary" href="{{ url('/send-email') }}">
                        {{ __('Voltar') }}
                    </a> 
                </div>                
            </div>
        </div>
    </div>
</div>
@endsection
