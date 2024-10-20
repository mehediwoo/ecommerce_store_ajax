@if (!empty($currency) && $currency->count() > 0)
    @foreach ($currency as $key=>$row)
    <tr>
        <td>{{ $key+1 }}</td>
        <td >{{ $row->c_name }}</td>
        <td >{{ $row->c_code }}</td>
        <td >{{ $row->c_symbol }}</td>

        <td >
            <a href="" data='{{ $row->id }}' c_name="{{ $row->c_name }}"
                c_code="{{ $row->c_code }}" c_symble="{{ $row->c_symbol }}" id="editCurrency" class="d-inline-block">
                <span class="p-2 brand-color me-3">
                    <i class="fa-regular fa-pen-to-square"></i>
                </span>
            </a>
            <a href="" data='{{ $row->id }}' id="delete" class="d-inline-block">
                <span class="p-2 red-color">
                    <i class="fa-regular fa-trash-can"></i>
                </span>
            </a>
        </td>
    </tr>
    @endforeach
@endif
