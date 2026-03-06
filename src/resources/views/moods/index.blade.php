<h1>気分の花 🌸</h1>
<a href="/moods/create">＋ 今日の気分を書く</a>

<div class="garden">

@foreach($moods as $mood)

<div class="petal"
style="background: {{ $mood->color }}"
title="{{ $mood->word }} / {{ $mood->comment }}">

<div class="petal-inner">

<div class="petal-word">
{{ $mood->word }}
</div>

<div class="petal-level">
Lv {{ $mood->level }}
</div>

<div class="petal-date">
{{ $mood->created_at }}
</div>

<a href="/moods/{{ $mood->id }}/edit">編集</a>

<form method="POST" action="/moods/{{ $mood->id }}" style="display:inline;">
@csrf
@method('DELETE')
<button>削除</button>
</form>

</div>

</div>

@endforeach

</div>