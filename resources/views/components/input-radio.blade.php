@props(['title'])
<label class="inline-flex items-center mr-6 cursor-pointer">
    <input type="radio" class="form-radio mr-2" {{ $attributes }}>
    <span class="ml-2">{{ $title }}</span>
</label>
