<!doctype html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Album {{$album->name}}</title>
    <style>
      img {
        padding: 5px;
        width: 150px;
      }
    </style>
  </head>
  <body>
    {{ Html::ul($errors->all()) }}

    {{ Form::open(["route" => "pictures.store"]) }}

      <div class="form-group">
          {{ Form::label("url", "Url") }}
          {{ Form::text("url"), Illuminate\Support\Facades\Input::old("url"), array("class" => "form-control") }}
      </div>
      {{ Form::hidden("album_id", $album->id) }}

      {{ Form::submit("Add picture") }}

    {{ Form::close() }}

    <div id="pictures">
      <div class="row">
        @foreach($album->pictures as $picture)
          <div class="col-lg-3">
            <a target="_blank" href={{$picture->url}}>
              <img src={{$picture->url}} alt={{$picture->created_at}}}>
            </a>
              {{ Form::open(["route" => ["pictures.destroy", $picture->id], "method" => "delete"]) }}
                {{ Form::submit("Delete") }}
              {{ Form::close() }}

          </div>
        @endforeach
      </div>
    </div>
  </body>
</html>