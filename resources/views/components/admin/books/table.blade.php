<div class="w-100 overflow-auto table-responsive" style="height: 40rem;">
  <table class="table table-striped" id="allBooks"
    style="min-width: fit-content; max-height: 100%; height: 100%; table-layout: fixed;">
    <thead class="position-sticky top-0" style="background-color: #fff; z-index: 1;">
      <tr>
        <th scope="col">Accession No.</th>
        <th scope="col">Title</th>
        <th scope="col">Author</th>
        <th scope="col">Publisher</th>
        <th scope="col">Status</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>

      @foreach ($datas as $data)
      <tr>
      <td scope="row">{{ $data['name'] }}</td>
      <td>{{ $data['home'] }}</td>
      <td>{{ $data['office'] }}</td>
      <td>{{ $data['age']}}</td>
      <td>{{ $data['age']}}</td>
      <td>
        <div class="action-buttons">
        <a href="#" class="btn"
          style="background-color: #193c71; color: #fff; font-size: .9rem; padding: .4rem .6rem;"
          data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="view"><i class="bi bi-eye"></i></a>
        <a href="#" class="btn btn-danger" style="font-size: .9rem; padding: .4rem .6rem;" type="submit"
          data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="delete"><i class="bi bi-trash3"></i></a>
        </div>
      </td>
      </tr>
    @endforeach



    </tbody>
  </table>
</div>