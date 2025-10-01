@php
$product = $product ?? null;
@endphp

<div class="mb-5">
    <label for="name" class="form-label fs-2">Name</label>
    <input type="text" class="form-control fs-2 @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter good name" value="{{ old('name', $product?->name) }}">
    @error('name') <div class="invalid-feedback fs-3">{{ $message }}</div> @enderror
</div>
<div class="mb-5">
    <label for="description" class="form-label fs-2">Description</label>
    <textarea class="form-control fs-2 @error('description') is-invalid @enderror" id="description" name="description" placeholder="Enter description">{{ old('description', $product?->description) }}</textarea>
    @error('description') <div class="invalid-feedback fs-3">{{ $message }}</div> @enderror
</div>
<div class="mb-5">
    <label for="price" class="form-label fs-2">Price</label>
    <input type="number" min="10" step="0.01" class="form-control fs-2 @error('price') is-invalid @enderror" id="price" name="price" placeholder="Enter price" value="{{ old('price', $product?->price) }}">
    @error('price') <div class="invalid-feedback fs-3">{{ $message }}</div> @enderror
</div>
<div class="mb-5">
    <label for="productImages" class="form-label">Image(s)</label>
    <input type="file" class="form-control @error('images') is-invalid @enderror" id="productImages" name="images">
    @error('images') <div class="invalid-feedback fs-3">{{ $message }}</div> @enderror
    <div id="fileCounter" class="form-text"></div>
</div>
