<!-- Returned Tab -->
<div class="card-header d-flex justify-content-start pe-4 ps-3 pt-3 pb-3"
    style="border-bottom:  1px solid #c4c2c2">

    <h3 class="m-0">Member's Returned Books</h3>

</div>

<div class="card-body pt-0 pb-4" style="height: 39rem; border: 1px solid #c4c2c2;">
    <table id="returned" class="table table-striped"  style="height: 33rem; table-layout: fixed;">
        <thead style="position: sticky; top: 0%;">
            <tr>
                <th scope="col">Member No.</th>
                <th scope="col">Borrow date</th>
                <th scope="col">Return date</th>
            </tr>
        </thead>

        <tbody class="pt-0">
            @foreach ($datas as $data)
            <tr>
                <td scope="row">{{ $data['name'] }}</td>
                <td>{{ $data['home'] }}</td>
                <td>{{ $data['office'] }}</td>
            </tr> 
            @endforeach
        </tbody>
    </table>
</div>