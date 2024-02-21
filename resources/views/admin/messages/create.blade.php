<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message-Form</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">



    <!-- (script per VueJs)	
    <script src="https://unpkg.com/vue@3.3.4/dist/vue.global.js"></script> -->


</head>
<body>
    

    <div class="container my-2">
        <div class="row my-2">
            <form action="{{ route('message.store') }}" method="POST" id="form">

                <div class="mb-3">
                    <label for="name" class="form-label">Inserire Nome e Cognome</label>
                    <input class="form-control" id="name" placeholder="Mario Rossi">
                  </div>            
                  
                  <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" placeholder="name@e-mail.com">
                  </div>
    
                  <div class="mb-3">
                    <label for="text" class="form-label">Messaggio</label>
                    <textarea class="form-control" id="text" rows="3" placeholder="Contatta il titolare dell'appartamento"></textarea>
                  </div>


                  <input type="submit" value="Conferma">
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>



