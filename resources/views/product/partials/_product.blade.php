<div class="row">

    <div class="col-md-8">

            <span class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            {{ Form::text('name', null, array('class' => 'form-control input-lg', 'placeholder' => 'Nombre')) }}
            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('title') }}</strong>
                </span>
            @endif
            </span>

            <br>

            <div class="input-group">
              <span class="input-group-btn">
                <label class="btn btn-default btn-file">
                  Selecciona una imagen
                  {{ Form::file('image', ['style' => 'display: none;']) }}
                </label>
              </span>
              <input type="text" id="title" name="title" readonly class="form-control" placeholder="...">
            </div><!-- /input-group -->

            <br>

            {!! Form::label('description', 'Descripcion') !!}
            <span class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
            {{ Form::textarea('description', null, array('class' => 'form-control')) }}
            @if ($errors->has('description'))
                <span class="help-block">
                    <strong>{{ $errors->first('description') }}</strong>
                </span>
            @endif
            </span>

    </div><!-- .col-md-8 -->

    <div class="col-md-4">

      <div class="well">
            <dl class="dl-horizontal">
                <dt>{{ Form::checkbox('public','Publico', isset($product)?$product->public:true) }}</dt>
                <dd>Publicar</dd>
            </dl>
            <dl class="dl-horizontal">

                <dt>Precio</dt>
                <dd>
                  <span class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                  {{ Form::text('price', null, array('class' => 'form-control', 'placeholder' => 'Precio')) }}
                  @if ($errors->has('title'))
                      <span class="help-block">
                          <strong>{{ $errors->first('price') }}</strong>
                      </span>
                  @endif
                  </span>
                </dd>
            </dl>
            <dl class="dl-horizontal">
                <dt>Tipo</dt>
                <dd>
                  <span class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                  {{ Form::select('type', ['product' => 'Producto', 'service' => 'Servicio'], isset($product)?$product->type:'product' , ['class' => 'form-control']) }}
                  @if ($errors->has('type'))
                      <span class="help-block">
                          <strong>{{ $errors->first('type') }}</strong>
                      </span>
                  @endif
                  </span>
                </dd>
            </dl>
            <hr>
            {{ Form::submit('Publicar', array('class' => 'btn btn-primary btn-sm')) }}
      </div>

      <div class="panel panel-default">
          <div class="panel-heading"><strong>Categoria</strong></div>
          <div class="panel-body">
            <span class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">

            </span>
          </div>
      </div>

      <div class="panel panel-default">
          <div class="panel-heading"><strong>Etiquetas</strong></div>
          <div class="panel-body">
            <span class="form-group{{ $errors->has('tags') ? ' has-error' : '' }}">

            </span>
          </div>
      </div>

      <div class="panel panel-default">
          <div class="panel-heading"><strong>Imagen destacada</strong></div>
          <div class="panel-body">

          </div>
      </div>

    </div><!-- .col-md-4 -->
</div><!-- .row -->
