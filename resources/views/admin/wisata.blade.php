@extends('layout.maindash')
@section('content')
@if (session('success'))
    <script>
        Swal.fire(
            'Berhasil!',
            '{{ session('success') }}',
            'success'
        )
    </script>
@endif

@if (session('error'))
    <script>
        Swal.fire(
            'Gagal!',
            '{{ session('error') }}',
            'error'
        )
    </script>
@endif

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Unggahan Wisata</h1>
    </div>

    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Posts</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{\App\Models\Galery::where('type', 'wisata')->count()}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function getData(id, type) {
                $("#wisataModal").find("input, textarea, select").hide();
                $("#wisataModal").find(".img-thumbnail").hide();
                $("#wisataModal").find("iconify-icon").show();

                if (type == 'detail') {
                    $("#wisataModal").find("input, textarea, select").prop('readonly', true);
                    $("#wisataModal").find(".btn-submit-form").addClass('d-none')
                } else {
                    $("#wisataModal").find("form").attr('action', '{{url('admin/edit/wisata')}}/' + id);
                    $("#wisataModal").find(".btn-submit-form").removeClass('d-none')
                    $("#wisataModal").find("input, textarea, select").prop('readonly', false);
                }

                $.ajax({
                    url: '{{url('admin/wisata/galery/get')}}',
                    method: "GET",
                    data: {
                        id: id,
                    },
                    success: function (response) {
                        $("#wisataModal").find("input, textarea, select").show();
                        $("#wisataModal").find("iconify-icon").hide();

                        $("#wisataModal").find(".img-thumbnail").show();
                        $("#wisataModal").find(".img-thumbnail").attr('src', '{{url('storage')}}/' + response.gambar);

                        $("#wisataModal").find('textarea[name="caption"]').val(response.caption);
                        $("#wisataModal").find('input[name="tanggal"]').val(response.tanggal_kegiatan);
                        $("#wisataModal").find('select[name="status"]').val(response.status);
                    }
                });
            }

            function addData() {
                $("#exampleModal").find("iconify-icon").hide();
            }

            function confirmDelete(id) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('delete-form-' + id).submit();
                    }
                });
            }
        </script>
        
        <div class="card-body">
            <div class="d-flex mb-2">
                <button class="btn btn-md btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="addData()">Tambahkan Data</button>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Data</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                            <form id="wisataForm" action="{{url('admin/wisata/galery')}}"  method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <img src="" class="img-thumbnail" style="width: 200" />
                                    <label for="gambar" class="w-100">
                                        Masukan Gambar : 
                                        <input type="file" name="gambar" id="gambar" class="form-control w-full">
                                        <iconify-icon icon="eos-icons:loading" width="24" height="24"></iconify-icon>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label for="caption" class="w-100">
                                        Caption : 
                                        <textarea name="caption" id="caption" cols="30" rows="10" class="form-control"></textarea>
                                    </label>
                                    <iconify-icon icon="eos-icons:loading" width="24" height="24"></iconify-icon>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal" class="w-100">
                                        Tanggal : 
                                        <input type="date" name="tanggal" id="tanggal" class="form-control w-full">
                                    </label>
                                    <iconify-icon icon="eos-icons:loading" width="24" height="24"></iconify-icon>
                                </div>
                                <div class="form-group">
                                    <label for="status" class="w-100">
                                        Status : 
                                        <select name="status" id="status" class="form-control w-full">
                                            <option value="proses">Proses</option>
                                            <option value="pending">Pending</option>
                                            <option value="diterima">Diterima</option>
                                            <option value="ditolak">Ditolak</option>
                                            {{-- <option value="pending">Pending</option>
                                            <option value="selesai">Selesai</option> --}}
                                        </select>
                                    </label>
                                    <iconify-icon icon="eos-icons:loading" width="24" height="24"></iconify-icon>
                                </div>
    
                                <input type="hidden" name="type" value="wisata">
    
                                <div class="d-flex justify-content-end">
                                    <input type="submit" class="btn btn-md btn-primary" value="Simpan Data">
                                </div>
                            </form>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="modal fade" id="wisataModal" tabindex="-1" aria-labelledby="wisataModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="wisataModalLabel">Tambahkan Data</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                            <form action=""  method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="gambar" class="w-100">
                                        <img src="" id="gambar" class="img-thumbnail" style="width: 200" />
                                        Masukan Gambar : 
                                        <input type="file" name="gambar" id="gambar" class="form-control w-full">
                                        <iconify-icon icon="eos-icons:loading" width="24" height="24"></iconify-icon>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label for="caption" class="w-100">
                                        Caption : 
                                        <textarea name="caption" id="caption" cols="30" rows="10" class="form-control"></textarea>
                                        <iconify-icon icon="eos-icons:loading" width="24" height="24"></iconify-icon>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal" class="w-100">
                                        Tanggal : 
                                        <input type="date" name="tanggal" id="tanggal" class="form-control w-full">
                                        <iconify-icon icon="eos-icons:loading" width="24" height="24"></iconify-icon>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label for="status" class="w-100">
                                        Status : 
                                        <select name="status" id="status" class="form-control w-full">
                                            <option value="proses">Proses</option>
                                            <option value="pending">Pending</option>
                                            <option value="diterima">Diterima</option>
                                            <option value="ditolak">Ditolak</option>
                                            {{-- <option value="pending">Pending</option>
                                            <option value="selesai">Selesai</option> --}}
                                        </select>
                                        <iconify-icon icon="eos-icons:loading" width="24" height="24"></iconify-icon>
                                    </label>
                                </div>
    
                                <input type="hidden" name="type" value="wisata">
    
                                <div class="d-flex justify-content-end">
                                    <input type="submit" class="btn btn-md btn-primary btn-submit-form" value="Simpan Data">
                                </div>
                            </form>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-User ">
                    <thead>
                        <tr style="width: 100%">
                            <th scope="col" style="width: 1%" class="text-center">NO.</th>
                            <th scope="col" style="width: 20%" class="text-center">Gambar</th>
                            <th scope="col" style="width: 10%" class="text-center">Caption</th>
                            <th scope="col" style="width: 10%" class="text-center">Tanggal</th>
                            <th scope="col" style="width: 20%" class="text-center">Status</th>
                            <th scope="col" style="width: 20%" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($wisata as $item)     
                            <tr class="text-center">
                                <th scope="row">{{$item->id}}</th>
                                <td><img src="{{url('').'/storage/'.$item->gambar}}" alt="img" style="width: 200px;"></td>
                                <td>{{$item->caption}}</td>
                                <td>{{$item->created_at}}</td>
                                @php
                                $statuses = [
                                        'proses' => ['class' => 'btn-sm btn-warning', 'label' => 'Proses'],
                                        'pending' => ['class' => 'btn-sm btn-secondary', 'label' => 'Pending'],
                                        'diterima' => ['class' => 'btn-sm btn-success', 'label' => 'Diterima'],
                                        'ditolak' => ['class' => 'btn-sm btn-danger', 'label' => 'Ditolak'],
                                    ];
                                
                                    $default = ['class' => 'btn-primary', 'label' => 'Unknown Status'];
                                    $status = $statuses[$item->status] ?? $default;
                                @endphp
                                
                                <td>
                                    <button type="button" class="btn {{ $status['class'] }}">{{ $status['label'] }}</button>
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#wisataModal" onclick="getData({{$item->id}}, 'detail')">Detail</button>
                                    <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#wisataModal" onclick="getData({{$item->id}}, 'edit')">Edit</button>
                                    <form id="delete-form-{{ $item->id }}" action="{{ route('admin.delete.wisata', $item->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $item->id }})">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                $(".datatable-User").dataTable();
            })
        </script>
    @endsection
