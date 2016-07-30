<blockquote>
  <div>{{ $comment->comment }}</div>
  <div>{{ $comment->author_name }}</div>
  <div>Front End Developer</div>
  <a href="#" onclick="document.getElementById({{$comment->id}}).className=''; return false;" class="testimonial-writer-company">Responder</a>

    <div>
        @include('comment.partials._reply')
    </div>

@foreach($comment->replies as $comment)
  @include('comment.partials._showreply')
@endforeach
</blockquote>
