<?php

namespace App\Http\Livewire;

use App\Models\Board;
use App\Models\Tache;
use Livewire\Component;

class SortableTask extends Component
{

    public $projet;
    public $boards;
    protected $listeners = ['refreshComponent' => '$refresh'];

    public function mount($projet, $boards)
    {
        $this->projet = $projet;
        $this->boards = $boards;
    }


    public function render()
    {
        return view('livewire.sortable-task', [
            'projet' => $this->projet,
            'boards' => $this->boards
        ]);
    }


    public function updateTaskOrder($orderedIds)
    {
        foreach ($orderedIds as $items) {
            foreach ($items['items'] as  $item) {
                Tache::find($item['value'])->update(['ordre' => $item['order'] , 'board_id' => $items['value']]);
            }
        }
        $this->emit('refreshComponent');
    }

    public function updateGroupOrder($orderedIds)
    {
        foreach ($orderedIds as $item) {
            Board::find($item['value'])->update(['ordre' => $item['order']]);
        }
        $this->emit('refreshComponent');
    }
}
