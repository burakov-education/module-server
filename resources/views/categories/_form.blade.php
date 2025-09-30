@php
$category = $category ?? null;
@endphp

<div class="mb-5">
    <label for="name" class="form-label fs-2">Name</label>
    <input type="text" class="form-control fs-2 @error('title') is-invalid @enderror" id="name" name="title" value="{{ old('title', $category?->title) }}" placeholder="Enter category name">
    @error('title')
        <div class="invalid-feedback fs-3">{{ $message }}</div>
    @enderror
</div>
<div class="mb-5">
    <label for="description" class="form-label fs-2">Description</label>
    <textarea class="form-control fs-2 @error('description') is-invalid @enderror" id="description" name="description" placeholder="Enter description">{{ old('description', $category?->description) }}</textarea>
    @error('description')
        <div class="invalid-feedback fs-3">{{ $message }}</div>
    @enderror
</div>
