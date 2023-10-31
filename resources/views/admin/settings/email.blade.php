<form action="{{route('emailUpdateSetting')}}" method="post">
    @csrf
    <div>
        <input type="hidden" name="email_enabled" value="0">
        <label for="email_enabled">Включить отправку заявок в почту</label>
        <input id="email_enabled" type="checkbox" name="email_enabled" value="1" {{$email_enabled ? "checked" : ""}}>
    </div>
    <div>
        <label for="email">Ввести e-mail</label>
        <input id="email" name="email" type="text" value="{{$email ?? null}}">
    </div>

    <button type="submit">Сохранить </button>
</form>