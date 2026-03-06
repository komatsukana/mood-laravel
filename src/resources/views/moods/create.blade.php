<h1>今日の気分を書く 🌸</h1>

<form method="POST" action="/moods">

@csrf

<p>気分レベル</p>

<select name="level" required>

@for($i=1;$i<=5;$i++)
<option value="{{ $i }}">{{ $i }}</option>
@endfor

</select>


<p>気分ワード</p>

<select name="word" id="wordSelect" required>

@foreach($words as $word => $data)

<option
value="{{ $word }}"
data-group="{{ $data['group'] }}"
data-color="{{ $data['color'] }}"
>

{{ $word }}

</option>

@endforeach

</select>


<input type="hidden" name="group" id="group">
<input type="hidden" name="color" id="color">


<p>ひとこと</p>

<textarea name="comment"></textarea>

<br><br>

<button type="submit">保存🌸</button>

</form>


<script>

const select = document.getElementById("wordSelect")
const groupInput = document.getElementById("group")
const colorInput = document.getElementById("color")

function updateMoodData(){

const option = select.options[select.selectedIndex]

groupInput.value = option.dataset.group
colorInput.value = option.dataset.color

}

// 選択変更
select.addEventListener("change", updateMoodData)

// 初期状態セット（重要）
updateMoodData()

</script>