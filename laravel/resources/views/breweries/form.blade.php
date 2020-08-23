@csrf
<div class="md-form">
    <label>名前</label>
    <input type="text" name="name" class="form-control" required value="{{ $brewery->name ?? old('name') }}">

</div>

<div class="form-group">
    <brewery-tags-input :initial-tags='@json($tagNames ?? [])' :autocomplete-items='@json($allTagNames ?? [])'>
    </brewery-tags-input>
</div>

<div class="form-group">
    <label></label>
    <textarea name="body" required class="form-control" rows="16"
        placeholder="本文">{{ $brewery->body ?? old('body') }}</textarea> {{--この行のtextareaタグ内を編集--}}
</div>