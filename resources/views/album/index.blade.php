<!doctype html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">      <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Albums</title>
    <style>
      #albums {
        margin-top: 10px;
      }
      .album {
        margin: 5px;
      }
    </style>
  </head>
  <body>
    {{ Form::open(["route" => ["albums.create"], "method" => "get"]) }}
      {{ Form::submit("Create album") }}
    {{ Form::close() }}
    <div id="albums">
        @foreach($albums as $album)
          <div class="album">
          <a href="{{ route("albums.show", ["id" => $album->id]) }}"
            <h3>{{ $album->name }}</h3>
          </a>
              <p>{{ count($album->pictures) }} image(s).</p>
              {{ Form::open(["route" => ["albums.destroy", $album->id], "method" => "delete"]) }}
                {{ Form::submit("Delete") }}
              {{ Form::close() }}
            </div>
        @endforeach
    </div>
  </body>
</html>