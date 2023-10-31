<form action="{{route('crmUpdateSetting')}}" method="post">
    @csrf
    <div>
        <input type="hidden" name="crm_enabled" value="0">
        <label for="crm_enabled">Включить отправку заявок в CRM</label>
        <input id="crm_enabled" type="checkbox" name="crm_enabled" value="1" {{$crm_enabled ? "checked" : ""}}>
    </div>
    <div>
        <label for="crm">Api - token</label>
        <input id="crm" name="crm_token" type="text" value="{{$crm_token ?? null}}">
    </div>
    <div>
        <label for="crm">Host</label>
        <input id="crm" name="crm_host" type="text" value="{{$crm_host ?? null}}">
    </div>

    <button type="submit">Сохранить </button>
</form>