@csrf
<div class="md-form">
    <label>名前</label>
    <input type="text" name="name" class="form-control" required value="{{ $brewery->name ?? old('name') }}">
    {{--この行のvalue属性を変更--}}
</div>
{{----------ここから追加----------}}
<div class="form-group">
    <brewery-tags-input>
    </brewery-tags-input>
</div>
{{----------ここまで追加----------}}
<div class="form-group">
    <label></label>
    <textarea name="body" required class="form-control" rows="16"
        placeholder="本文">{{ $brewery->body ?? old('body') }}</textarea> {{--この行のtextareaタグ内を編集--}}
</div>