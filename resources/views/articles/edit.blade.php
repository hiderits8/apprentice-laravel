<x-head />

<x-header />

<div class="editor-page">
    <div class="container page">
      <div class="row">
        <div class="col-md-10 offset-md-1 col-xs-12">
          <ul class="error-messages">
            <li>That title is required</li>
          </ul>
  
          <form method="post" action="{{ route('articles.update', ['id' => $article->id ])}}" >
            @csrf
            <fieldset>
              <fieldset class="form-group">
                <input type="text" name="title" value="{{ $article->title }}" class="form-control form-control-lg" placeholder="Article Title" />
              </fieldset>
              <fieldset class="form-group">
                <input type="text" name="lead" value="{{ $article->lead }}" class="form-control" placeholder="What's this article about?" />
              </fieldset>
              <fieldset class="form-group">
                <textarea
                  class="form-control"
                  rows="8"
                  placeholder="Write your article (in markdown)"
                  name="text"
                >{{ $article->text }}</textarea>
              </fieldset>
              <fieldset class="form-group">
                <input type="text" name="tag" class="form-control" placeholder="Enter tags" />
                <div class="tag-list">
                  @foreach ($tags as $tag)
                  <span class="tag-default tag-pill"> <i class="ion-close-round"></i> {{ $tag->name }} </span>
                  @endforeach

                  <span class="tag-default tag-pill"> <i class="ion-close-round"></i> tag </span>
                </div>
              </fieldset>
              <button class="btn btn-lg pull-xs-right btn-primary" type="submit">
                Publish Article
              </button>
            </fieldset>
          </form>
        </div>
      </div>
    </div>
  </div>

<x-footer />