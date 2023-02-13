<div class="w-full max-w-lg">
    <div class="flex flex-wrap">
        <h1 class="mb-5">{{ $title }}</h1>
    </div>
</div>

<form class="w-full max-w-lg" method="POST" action="{{ $route }}">
    @csrf
    @isset($update)
        @method('PUT')
    @endisset

    
    <div class="form-group">
        <label class="exampleInput" for="name">
            {{ __('Título de la etiqueta') }}
        </label>
        <input name="name" value="{{ old('name') ?? $tag->name }}" class="form-control" id="name"
            type="text">
        <p class="text-gray-600 text-xs italic">{{ __('Ejem: Testing') }}</p>
        @error('name')
            <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="form-group">
        <label class="exampleInput" for="name">
            {{ __('Descripcion ') }}
        </label>
        <input name="description" value="{{ old('description') ?? $tag->description }}" class="form-control" id="description"
            type="text">
        <p class="text-gray-600 text-xs italic">{{ __('No obligatorio') }}</p>
        @error('name')
            <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="form-group">
        <button class="btn btn-success btn-lg" type="submit">
            {{ $textButton }}
        </button>
    </div>
</form>

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">

@stop