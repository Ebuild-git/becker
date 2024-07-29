<?php

namespace App\Livewire\Front;

use App\Models\favoris as ModelsFavoris;
use Livewire\Component;

class Favoris extends Component
{
    public function render()
    {
        $favoris= ModelsFavoris::where('id_user', auth()->id() )->get();
        return view('livewire.front.favoris', compact("favoris"));
    }


  
    public function delete($id){
        $favoris = ModelsFavoris::find($id);
        if ($favoris) {
            $favoris->delete();
            session()->flash('success', 'Favoris supprimé avec succès');
           // $this->dispatchBrowserEvent('post-deleted', ['message' => 'Post deleted successfully!']);
           
        }
    }

    public function remove_favoris(Request $request)
    {
        $id_favoris = $request->get("id_favoris");
        $favoris = favoris::where("id", $id_favoris)->where("id_user", Auth::user()->id)->first();
        if ($favoris) {
            $favoris->delete();
            $count = favoris::where("id_user", Auth::user()->id)->count();
            return response()->json(
                [
                    "status" => true,
                    "message" => "Article retiré de mes favoris !",
                    "count" => $count,
                ]
            );
        }
    }


}
