@extends('layouts.site')
@section('title', '| Ver Post')
@section('content')
      <div class="row">
          <div class="col-md-7">
              <h1>{{ $post->title }}</h1>
              <span class="help-block">
                  <strong>Slug: {{ $post->slug }}</strong><br>Url: {{ route('blog.single', $post->slug) }}
              </span>
              <p class="lead">{{ $post->body }}</p>
              <hr>
              <div >
                  @foreach($post->tags as $tag)
                      <span class="label label-default">{{ $tag->name }}</span>
                  @endforeach
              </div>
          </div><!-- .col-md-8 -->
          <div class="col-md-4 col-md-offset-1">
              <div class="well">
                  <dl class="dl-horizontal">
                      <dt>Creado</dt>
                      <dd>{{ date('j M, Y h:ia', $post->created_at->getTimestamp()) }}</dd>
                  </dl>
                  <dl class="dl-horizontal">
                      <dt>Actualizado</dt>
                      <dd>{{ date('j M, Y h:ia',$post->updated_at->getTimestamp()) }}</dd>
                  </dl>
                  <dl class="dl-horizontal">
                      <dt>Categoria</dt>
                      <dd>{{ $post->category->name }}</dd>
                  </dl>
                  <hr>
                  <div class="row">
                      <div class="col-md-6">
                          {!! Html::linkRoute('post.edit', 'Editar', array($post->id), array('class' => 'btn btn-primary btn-block')) !!}
                      </div>
                      <div class="col-md-6">
                          {!! Form::open(array('route' => array('post.destroy', $post->id), 'method' =>'DELETE')) !!}
                          {{ Form::submit('Borrar', array('class' => 'btn btn-danger btn-block')) }}
                          {!! Form::close() !!}
                      </div>
                  </div>
              </div>
          </div>
      </div><!-- .row -->
@endsection
