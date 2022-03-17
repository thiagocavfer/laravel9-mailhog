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
                    <form method="POST" action="{{ route('send-email-post') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">
                              {{ __('E-mail do Destinatário') }}
                            </label>

                            <div class="col-md-6">
                                <input 
                                  id="email" 
                                  type="email" 
                                  class="form-control @error('email') is-invalid @enderror" 
                                  name="email" 
                                  value="{{ old('email') }}" 
                                  required 
                                  autocomplete="email" 
                                  autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">
                              {{ __('Assunto do E-mail') }}
                            </label>

                            <div class="col-md-6">
                                <input 
                                  id="assunto" 
                                  type="text" 
                                  class="form-control @error('assunto') is-invalid @enderror" 
                                  name="assunto" 
                                  value="{{ old('assunto') }}" 
                                  maxlength="100"
                                  required>

                                @error('assunto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="Mensagem" class="col-md-4 col-form-label text-md-end">
                              {{ __('Texto da Mensagem') }}
                            </label>

                            <div class="col-md-6">
                                <textarea 
                                  id="mensagem" 
                                  class="form-control @error('mensagem') is-invalid @enderror" 
                                  name="mensagem"
                                  rows="10"
                                  required></textarea>

                                @error('mensagem')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>                        

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Enviar Mensagem') }}
                                </button>                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
