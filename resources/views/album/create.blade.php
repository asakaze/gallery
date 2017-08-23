<!doctype html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">      <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Create album</title>
  </head>
  <body>
    {{ Html::ul($errors->all()) }}

    {{ Form::open(["route" => "albums.store"]) }}

      <div class="form-group">
          {{ Form::label("name", "Name") }}
          {{ Form::text("name"), Illuminate\Support\Facades\Input::old("name"), array("class" => "form-control") }}
      </div>

      {{ Form::submit("Create album") }}

    {{ Form::close() }}

  </body>
</html>