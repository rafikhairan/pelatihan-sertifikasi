@extends('layout.app')

@section('content')
<!-- Content -->
<div class="d-flex justify-content-between align-items-center mt-2 mb-3">
    <div>
        <h2>Edit Game</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('games.index') }}">Games</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Game</li>
            </ol>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-lg-8">
        <div class="card rounded-0 shadow-sm mb-4">
            <div class="card-header bg-white pt-3">
                <h6>{{ $data->name }}</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('games.update', $data->id) }}"  method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-3">
                        <label class="form-label" for="name">Name</label>
                        <input id="name" class="form-control" type="text" name="name" placeholder="Game Name" value="{{ $data->name }}">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label" for="publisher">Publisher</label>
                        <input id="publisher" class="form-control" type="text" name="publisher" placeholder="Game Publisher" value="{{ $data->publisher }}">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label" for="release">Release Date</label>
                        <input id="release" class="form-control" type="date" name="release" value="{{ $data->release_date }}">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label" for="platform">Platform</label>
                        <select id="platform" class="form-select" aria-label="Default select example" name="platform">
                            @foreach($platforms as $platform)
                            <option value="{{ $platform->id }}" @if($data->platform_id == $platform->id) selected @endif>{{ $platform->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label" for="publisher">Genre</label>
                        <select class="form-select" id="multiple-select-field" data-placeholder="Choose anything" name="genres[]" multiple>
                            @foreach($genres as $genre)
                            <option value="{{ $genre->id }}" @if(in_array($genre->id, $gameGenreIds)) selected @endif>{{ $genre->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label" for="photo">Genre</label>
                        <input id="photo" class="form-control" type="file" name="photo" accept="image/*">
                    </div>
                    <button class="btn btn-success rounded-0 w-100 py-2">Simpan</button> 
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <img src="{{ $data->photo ? asset('storage/uploads/' . $data->photo) : asset('assets/img/disc.png') }}" class="img-thumbnail" alt="Photo">
    </div>
</div>


@endsection

@push('scripts')
    <script>
        $( '#multiple-select-field' ).select2( {
            theme: "bootstrap-5",
            width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
            placeholder: $( this ).data( 'placeholder' ),
            closeOnSelect: false,
        } );

        const $photo = $('#photo');
        $photo.change(function(event) {
            const imageUrl = URL.createObjectURL(event.target.files[0])
            $('.img-thumbnail').attr('src', imageUrl)
        });
</script>
@endpush