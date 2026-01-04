@if (hasPermission(['sales.edit']) || hasPermission(['sales.destroy']))

    <div class="dropdown">
        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
            <i class="icon-base ti tabler-dots-vertical"></i>
        </button>
        <div class="dropdown-menu">

            @if (hasPermission(['sales.edit']))
                <!-- Edit Button -->
                <a href="{{ route('sales.edit', $row->id) }}" class="dropdown-item waves-effect edit-btn" data-id="{{ $row->id }}">
                    <i class="icon-base ti tabler-pencil"></i> Edit
                </a>
            @endif

            @if (hasPermission(['sales.destroy']))
                <!-- Delete Button -->
                <a class="dropdown-item waves-effect" href="javascript:void(0);"
                    onclick="event.preventDefault(); document.getElementById('delete-{{ $row->id }}').submit();">
                    <i class="icon-base ti tabler-trash me-1"></i> Delete
                </a>

                <!-- Hidden Delete Form -->
                <form id="delete-{{ $row->id }}" action="{{ route('sales.destroy', $row->id) }}"
                    method="POST" class="d-none">
                    @csrf
                    @method('DELETE')
                </form>
            @endif

        </div>
    </div>

@endif
