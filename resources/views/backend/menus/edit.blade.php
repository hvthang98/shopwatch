<form role="form" method="post" action="{{ route('admin.menu.update', $menu->id) }}" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="form-group">
        <label for="name">{{ __('Name') }}</label>
        <input type="text" name="name" class="form-control" placeholder="{{ __('Enter name menu') }}" required value="{{ $menu->name }}">
    </div>
    <div class="form-group">
        <label for="status">{{ __('Status') }}</label>
        <select name="status" class="form-control">
            <option value="1" {{ $menu->status == 1 ? 'selected' : ''}}>{{ __('Show') }}</option>
            <option value="0" {{ $menu->status == 0 ? 'selected' : ''}}>{{ __('Hide') }}</option>
        </select>
    </div>
    <div class="form-group">
        <label for="">{{ __('Parent') }}</label>
        <select id="my-select" class="form-control" name="parent">
            <option value="">--</option>
            @if (isset($menus))
                @foreach ($menus as $m)
                    <option value="{{ $m->id }}" {{ $menu->parent_menu == $m->id ? ' selected="selected"' : '' }}>{{ $m->name }}</option>
                @endforeach
            @endif
        </select>
    </div>
    <div class="form-group">
        <label for="sort">{{ __('Sort') }}</label>
        <select id="my-select" class="form-control" name="sort">
            <option value="">{{ __('First') }}</option>
            @if (isset($menus))
                @foreach ($menus as $menu)
                    <option value="{{ $menu->id }}">{{ __('After') }} {{ $menu->name }}</option>
                @endforeach
            @endif
        </select>
    </div>
    <div class="form-action">
        <button type="submit" class="btn btn-info">{{ __('Save') }}</button>
        <button type="button" class="btn btn-secondary ml-5-important" data-dismiss="modal">{{ __('Close') }}</button>
    </div>
</form>
