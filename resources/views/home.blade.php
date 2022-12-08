<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Alisveris Listesi</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.js"></script>
</head>

<body class="bg-info">
    <div class="container w-25 mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <h3>ALIŞVERİŞ LİSTESİ</h3>
                <form action="{{route('store')}}" method="POST" autocomplete="off">
                @csrf
                <div class="input-group">
                    <input type="text" name="content" class="form-control" placeholder="Yeni Ekle" >
                    <button type="submit" class="btn btn-dark btn-sm px-4"><i class="fas fa-plus"></i></button>
                </div>
                </form>
                {{-- liste doluysa --}}
                @if (count($todolists))
                <ul class="list-group list-group-flush mt-3">
                        @foreach ($todolists as $todolist)
                        <li class="list-group-item">
                            <form action="{{ route('destroy', $todolist->id)}}" method="POST">
                            @csrf
                            {{$todolist->content}}
                            @method('delete')
                            <button type="submit" class="btn btn-link btn-sm float-end"><i class="fas fa-trash"></i></button>
                            </form>
                        </li>
                        @endforeach
                    </ul>
                    @else
                    <p class="text-center mt-3">Alınacak Yok.</p>
                @endif
            </div>
            @if (count($todolists))
            <div class="card-footer">
                Alınacak {{count($todolists)}} ürününüz var.
            </div>
            @else
            @endif
        </div>
    </div>
</body>

</html>