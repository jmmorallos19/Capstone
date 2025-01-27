<!-- Books List Tab -->
<div class="card-header d-flex flex-wrap  align-items-center pe-3 ps-3 pt-2 pb-2"
    style="border-bottom:  1px solid #c4c2c2">
    <h3 class="m-0">Book Lists</h3>

    <div class="card-button-container d-flex justify-content-end gap-2 p-0" style="width: fit-content">
        <button class="w-min-fit button-2 pt-1 pb-1 ps-3 pe-3">Add New Book</button>
        <button class="w-min-fit button-2 pt-1 pb-1 ps-3 pe-3">See All</button>
    </div>
</div>

<div class="card-body p-2 pb-2 " style="height: 39rem; border: 1px solid #c4c2c2;">
    <table id="bookList" class="table table-striped bordered" style="height: 33rem; table-layout: fixed;">
        <thead style="position: sticky; top: 0%;">
            <tr>
                <th scope="col">Accession No.</th>
                <th scope="col">Title</th>
                <th scope="col">Author</th>
                <th scope="col">Status</th>
            </tr>
        </thead>

        <tbody class="pt-0">
            @foreach ($datas as $data)
            <tr>
                <td scope="row">{{ $data['name'] }}</td>
                <td>{{ $data['home'] }}</td>
                <td>{{ $data['office'] }}</td>
                <td>{{ $data['age']}}</td>
            </tr> 
            @endforeach
        </tbody>
    </table>
</div>

