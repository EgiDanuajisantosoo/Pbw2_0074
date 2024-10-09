<x-layout>
    <div class="container">
        <div class="row p-lg-3">
            <div class="col">
                <form action="{{ route('buku.update', $buku->id) }}" method="POST" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <h1>Ubah Buku</h1>
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" class="form-control @error('judul') is-invalid @enderror"
                            value="{{ $buku->judul }}" id="judul" name="judul">
                        @error('judul')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="penulis" class="form-label">Penulis</label>
                        <input type="text" class="form-control @error('penulis') is-invalid @enderror"
                            value="{{ $buku->penulis }}" id="penulis" name="penulis">
                        @error('penulis')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="kategori" class="form-label">Kategori</label>
                        <select class="form-select @error('kategori') is-invalid @enderror" id="kategori" name="kategori">
                            <option selected>Pilih Kategori</option>
                            <option value="Novel" {{ $buku->kategori == 'Novel' ? 'selected' : '' }}>Novel</option>
                            <option value="Komik" {{ $buku->kategori == 'Komik' ? 'selected' : '' }}>Komik</option>
                        </select>
                        @error('kategori')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="sampul" class="form-label">Sampul buku</label>
                        @if ($buku->sampul)
                            <img src="{{ asset('storage/' . $buku->sampul) }}" class="img-preview img-fluid mb-3 d-block"
                                width="250px">
                        @else
                            <img class="img-preview img-fluid mb-3" width="250px">
                        @endif
                        <input type="hidden" name="sampulLama" value="{{ $buku->sampul }}">
                        <input class="form-control @error('sampul') is-invalid @enderror" type="file" id="sampul"
                            name="sampul" onchange="previewImage()">
                        @error('sampul')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
