<div wire:ignore>
    <select style="width: 100%" class="js-example-basic-multiple" multiple>
        @foreach ($items as $item)
            <option value="{{ $item->id }}">{{ $item->name }}</option>
        @endforeach
    </select>
</div>
