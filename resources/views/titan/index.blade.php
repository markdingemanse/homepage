<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>titans logger</title>
  </head>
  <body>

    <h1> Submit Forms!</h1>

    <hr>

    <h3> Logs!</h3>

    <div class="container">
      <div class="row">
        <div class="col">
            <form action="/titan/log" method="post" enctype="multipart/form-data">
                @csrf
              <div>
                  <div class="form-group">
                    <label for="heroineId">Select a heroine id</label>
                    <select name="heroine" multiple class="form-control" id="heroineId" required>
                        @foreach ($heroines as $heroine)
                            <option value={{ $heroine->id }}>{{ $heroine->name }} with id {{ $heroine->id }}</option>
                        @endforeach
                    </select>
                  </div>

                <label for="newLevel">New Level</label>
                <input type="number" name="new_level" class="form-control" id="newLevel" placeholder="18" required>

                <input type="hidden" name="waifu" value="{{env('UPLOAD_PW')}}">

              </div>
              <button type="submit" class="btn btn-primary" onclick='submitLog'>Submit</button>
            </form>
        </div>
        <div class="col">

        </div>
      </div>
      </div>

      <hr>

      <h3> Heroines!</h3>


      <div class="container">
        <div class="row">
          <div class="col">
              <form action="/titan/heroine" method="post" enctype="multipart/form-data">
                  @csrf
                  <div>
                      <div class="form-group">
                        <label for="heroinename">Name</label>
                        <input type="text" name="name" class="form-control" id="heroinename">
                      </div>
                      <div class="form-group">
                        <label for="link">Image link</label>
                        <input type="text" name="link_to_picture" class="form-control" id="link">
                      </div>
                      <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" name="discription" class="form-control" id="description">
                      </div>
                      <label for="heroineattack">Select a heroine id</label>
                      <select name="attack_type" multiple class="form-control" id="heroineattack">
                          <option value="melee">melee</option>
                          <option value="cleric">cleric</option>
                          <option value="gunnar">gunnar</option>
                          <option value="ranged">ranged</option>
                          <option value="barbarian">barbarian</option>
                          <option value="bard">bard</option>
                          <option value="mage">mage</option>
                          <option value="druid">druid</option>
                      </select>
                      <input type="hidden" name="waifu" value="{{env('UPLOAD_PW')}}">
                  </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>

          </div>
          <div class="col">

          </div>
        </div>
        </div>

      <hr>
      <h1>Heroine reference cards!</h1>
      <hr>

      <div class="container">
        <div class="row">

            @foreach ($heroines as $heroine)
            <div class="col" style="padding: 20px">
                <div class="card" style="width: 15rem; padding: 20px">
                  <img class="card-img-top" src={{ $heroine->link_to_picture }} alt="Card image cap">
                  <div class="card-body">
                    <h5 class="card-title">{{ $heroine->name }}</h5>
                    <p class="card-text">{{ $heroine->name }} with id {{ $heroine->id }} Description: {{ $heroine->discription }} with type {{ $heroine->attack_type}}</p>
                  </div>
                </div>
            </div>
            @endforeach


        </div>
      </div>





    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>

        function submitLog() {
            console.log('meme');

            console.log(document.getElementById("formlog"));
        }
    </script>


  </body>
</html>
