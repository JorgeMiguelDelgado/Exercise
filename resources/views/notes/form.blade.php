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
            {{ __('Título de la nota') }}
        </label>
        <input name="title" value="{{ old('title') ?? $note->title }}" class="form-control" id="name"
            type="text">
        <p class="text-gray-600 text-xs italic">{{ __('Ejem: Junta de trabajo') }}</p>
        @error('name')
            <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="form-group">
        <label for="name" class="exampleInput">
            {{ __('Descripción') }}
        </label>
        <textarea name="body" id="body" cols="30" rows="10" class="form-control" >{{$note->body}}</textarea>
        <p class="text-gray-600 text-xs italic">{{ __('Ejem: Tengo reunion en la calle XYZ  a horas 7pm ') }}</p>
        @error('name')
            <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="form-group">
        <label for="name">{{ __('Categoria') }}</label>
        <select class="form-control" name="category_id" id="category_id">
            @foreach ($categories as $cat)
                <option value="{{ $cat->id }}"{{ old('category', $note->category_id) == $cat->id ? 'selected' : '' }}>
                    {{ $cat->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <p> <label for="">Etiquetas</label></p>
        @foreach ($tags as $tag)
        <input type="checkbox" name="tag[]" value="{{$tag->id}}"{{ old('tag') == $tag->id ? 'checked' : '' }} id="tag[]">
        <label for="">{{$tag->name}}</label>
        @endforeach
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
