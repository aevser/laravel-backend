<form action="{{route('telegramUpdateSetting')}}" method="post">
    @csrf
    <div>
        <input type="hidden" name="telegram_enabled" value="0">
        <label for="telegram_enabled">Включить отправку заявок в Telegram</label>
        <input id="telegram_enabled" type="checkbox" name="telegram_enabled" value="1" {{$telegram_enabled ? "checked" : ""}}>
    </div>
    <div>
        <label for="email">Telegram Bot - token</label>
            <input id="telegram" name="telegram" type="text" value="{{$telegram ?? null}}">
    </div>

    <button type="submit">Сохранить </button>
</form>