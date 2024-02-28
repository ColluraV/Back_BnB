@extends('layouts.app')
@section('content')
<body>
    

    <div class="container my-2">
        <div class="row my-2">
            <form action="{{ route('admin.messages.store') }}" method="POST" id="form">
              @csrf()

                <div class="mb-3">
                    <label for="name" class="form-label">Inserire Nome e Cognome</label>
                    <input class="form-control" id="name" placeholder="Esempio: Mario Rossi" name="name">
                  </div>            
                  
                  <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" placeholder="Esempio: name@e-mail.com" name="email">
                  </div>
    
                  <div class="mb-3">
                    <label for="text" class="form-label">Messaggio</label>
                    <textarea class="form-control" id="text" rows="3" placeholder="Utilizza questo spazio per inserire il tuo messaggio" name="text"></textarea>
                  </div>


                  <input type="submit" value="Conferma">
            </form>
        </div>
    </div>

    
</body>
</html>



@endsection