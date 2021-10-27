<form role="form" action="{{ route('admin.menu.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="name">{{ __('Name') }}</label>
        <input type="text" name="name" class="form-control" placeholder="{{ __('Enter name menu') }}" required>
    </div>
    <div class="form-group">
        <label for="status">{{ __('Status') }}</label>
        <select name="status" class="form-control">
            <option value="1">{{ __('Show') }}</option>
            <option value="0">{{ __('Hide') }}</option>
        </select>
    </div>
    <div class="form-group">
        <label for="">{{ __('Parent') }}</label>
        <select id="my-select" class="form-control" name="parent">
            <option value="">--</option>
            @if (isset($menus))
                @foreach ($menus as $menu)
                    <option value="{{ $menu->id }}">{{ $menu->name }}</option>
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
