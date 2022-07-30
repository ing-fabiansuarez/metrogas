<div>
  <div class="form-group">
      <select class="form-select form-select-sm" aria-label=".form-select-sm example"  wire:model.defer="destination">
          <option value="" selected>{{ __('forms.select.selected') }}</option>
          @foreach ($objects as $object)
              <option value="{{ $object->id }}">{{ $object->name }}</option>
          @endforeach
      </select>
  </div>
</div>