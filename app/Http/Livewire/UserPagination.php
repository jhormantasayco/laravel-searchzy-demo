<?php

namespace App\Http\Livewire;

use App\Models\Usuario;
use Livewire\Component;
use Livewire\WithPagination;

class UserPagination extends Component
{
	use WithPagination;

	protected $paginationTheme = 'bootstrap';

	protected $queryString = ['keyword', 'rol_id'];

	public function mount()
    {
        //
    }

    public function search()
    {
        //
    }

    public function render()
    {
    	$params = Usuario::searchzyInputs();

    	$oUsuarios = Usuario::withCount(['posts AS posts_count'])
                        ->with(['posts'])
                        ->searchzy()
                        ->orderBy('name')
                        ->paginate();

        return view('livewire.user-pagination', compact('oUsuarios', 'params'));
    }
}
