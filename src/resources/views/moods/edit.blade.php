<h1>気分を編集 🌸</h1>

<form method="POST" action="/moods/{{ $mood->id }}">
@csrf
@method('PUT')

<p>気分レベル</p>

<select name="level">
@for($i=1; $i<=5; $i++)
<option value="{{ $i }}" {{ $mood->level == $i ? 'selected' : '' }}>
{{ $i }}
</option>
@endfor
</select>


<p>気持ちワード</p>
<input type="text" name="word" value="{{ $mood->word }}">


<p>コメント</p>
<textarea name="comment">{{ $mood->comment }}</textarea>

<br><br>

<button type="submit">更新</button>

</form>