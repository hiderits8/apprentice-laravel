<x-head />

<x-header />


<div class="article-page">
  <div class="banner">
    <div class="container">
      <h1>{{ $article->title }}</h1>

      <div class="article-meta">
        <a href="/profile/eric-simons"><img src="http://i.imgur.com/Qr71crq.jpg" /></a>
        <div class="info">
          <a href="/profile/eric-simons" class="author">{{ $article->name }}</a>
          <span class="date">{{ $article->updated_at }}</span>
        </div>
        <button class="btn btn-sm btn-outline-secondary">
          <i class="ion-plus-round"></i>
          &nbsp; Follow {{ $article->name }} <span class="counter">(10)</span>
        </button>
        &nbsp;&nbsp;
        <button class="btn btn-sm btn-outline-primary">
          <i class="ion-heart"></i>
          &nbsp; Favorite Post <span class="counter">(29)</span>
        </button>
        <form method="get" action="{{ route('articles.edit', ['id' => $article->id ]) }}">
        <button class="btn btn-sm btn-outline-secondary">
          <i class="ion-edit"></i> Edit Article
        </button>
        </form>
        <form method="post" action="{{ route('articles.destroy', ['id' => $article->id ]) }}">
          @csrf
          <button class="btn btn-sm btn-outline-danger">
          <i class="ion-trash-a"></i> Delete Article
        </button>
        </form>
      </div>
    </div>
  </div>

  <div class="container page">
    <div class="row article-content">
      <div class="col-md-12">
        <p>
          {{ $article->text }}</p>
        <ul class="tag-list">
          @foreach ($article->tags as  $tag)
          <li class="tag-default tag-pill tag-outline">{{ $tag->name }}</li>
          @endforeach
        </ul>
      </div>
    </div>

    <hr />

    <div class="article-actions">
      <div class="article-meta">
        <a href="profile.html"><img src="http://i.imgur.com/Qr71crq.jpg" /></a>
        <div class="info">
          <a href="" class="author">{{ $article->name }}</a>
          <span class="date">{{ $article->updated_at }}</span>
        </div>

        <button class="btn btn-sm btn-outline-secondary">
          <i class="ion-plus-round"></i>
          &nbsp; Follow {{ $article->name }}
        </button>
        &nbsp;
        <button class="btn btn-sm btn-outline-primary">
          <i class="ion-heart"></i>
          &nbsp; Favorite Article <span class="counter">({{ $article->fav }})</span>
        </button>
        <form method="get" action="{{ route('articles.edit', ['id' => $article->id ]) }}">
        <button class="btn btn-sm btn-outline-secondary">
          <i class="ion-edit"></i> Edit Article
        </button>
        </form>
        <form method="post" action="{{ route('articles.destroy', ['id' => $article->id ]) }}">
        @csrf
          <button class="btn btn-sm btn-outline-danger">
          <i class="ion-trash-a"></i> Delete Article
        </button>
        </form>
      </div>
    </div>

    <div class="row">
      <div class="col-xs-12 col-md-8 offset-md-2">
        <form method="post" action="{{ route('articles.addComment', ['id' => $article->id ]) }}" class="card comment-form">
          @csrf
          <div class="card-block">
            <textarea name="comment" class="form-control" placeholder="Write a comment..." rows="3"></textarea>
          </div>
          <div class="card-footer">
            <img src="http://i.imgur.com/Qr71crq.jpg" class="comment-author-img" />
            <a href="/profile/jacob-schmidt" class="comment-author">sample_user</a>
            <button class="btn btn-sm btn-primary">Post Comment</button>
          </div>
        </form>
        
        @foreach ($comments as $comment)
        <div class="card">
          <div class="card-block">
            <p class="card-text">
              {{ $comment->comment}}
            </p>
          </div>
          <div class="card-footer">
            <a href="/profile/author" class="comment-author">
              <img src="http://i.imgur.com/Qr71crq.jpg" class="comment-author-img" />
            </a>
            &nbsp;
            <a href="/profile/jacob-schmidt" class="comment-author">{{ $comment->name }}</a>
            <span class="date-posted">{{ $comment->updated_at }}</span>
            <form method="post" action="">
            <span class="mod-options">
              <i class="ion-trash-a"></i>
            </span>
            </form>
          </div>
        </div>
        @endforeach

        {{ $comments->links() }}

        </div>
      </div>
    </div>
  </div>
</div>

<x-footer />