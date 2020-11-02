<form action="/blog" method="GET" class="search">
    <input type="text" name="search_blog_text" placeholder="キーワードで探す" class="search__item">
    @isset($categories_web)
    <select name="blog_category" class="search__item">
        <option value="" selected="selected">カテゴリーで絞り込み</option>
        @foreach($categories_web as $key => $value)
        <option value="{{ $key }}">{{ $value }}</option>
        @endforeach
    @endisset
    <input type="submit" value="検索" class="search__item search__btn">
</select>
</form>