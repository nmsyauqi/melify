<?php

namespace App\Livewire;

use App\Models\Meli;
use App\Models\MeliUri;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class MeliEr extends Component
{
    // State untuk form
    public $meli_uri_id = '';
    public $name = '';
    public $formula = '';
    public $color = '';
    public $mohs_hardness = '';
    
    protected array $casts = [
        'mohs_hardness' => 'integer',
    ];
    
    // State untuk mode edit
    public $editingMeliId = null; 

    // Validation Rules yang sangat simpel
    protected $rules = [
        'meli_uri_id' => 'required|exists:meli_uris,id',
        'name' => 'required|min:3',
        'formula' => 'nullable|max:50',
        'color' => 'nullable|max:30',
        'mohs_hardness' => 'nullable|integer|min:1|max:10',
    ];

    public function save()
    {
        if (! Auth::check()) {
        return redirect()->route('login');
        }

        // 1. Dapatkan data yang sudah terverifikasi
        $validatedData = $this->validate();

        // 2. Bersihkan/Atur ulang nilai mohs_hardness menjadi NULL jika kosong
        // Kita akan hapus mohs_hardness dari $validatedData dan masukkan kembali yang sudah bersih
        $validatedData['mohs_hardness'] = 
            empty($this->mohs_hardness) ? null : (int)$this->mohs_hardness;

        // Pastikan field lain yang nullable (formula, color) di-cast ke NULL jika kosong
        // Ini menangani kasus field yang boleh kosong (nullable) di database
        $validatedData['formula'] = empty($this->formula) ? null : $this->formula;
        $validatedData['color'] = empty($this->color) ? null : $this->color;
        
        // Pastikan ID kategori sudah masuk
        $validatedData['meli_uri_id'] = $this->meli_uri_id;

        // 3. Lakukan Create
        if ($this->editingMeliId) {
            // ... (Update logic)
        } else {
            // Gunakan data yang sudah bersih dan lengkap
            Meli::create($validatedData); 
        }

        $this->reset(['meli_uri_id', 'name', 'formula', 'color', 'mohs_hardness', 'editingMeliId']);
    }

    // Edit Method
    public function edit($meliId)
    {
        $meli = Meli::with('uri')->findOrFail($meliId);
        
        $this->editingMeliId = $meli->id;
        $this->meli_uri_id = $meli->meli_uri_id; // Muat ID grup
        $this->name = $meli->name;
        $this->formula = $meli->formula;
        $this->color = $meli->color;
        $this->mohs_hardness = $meli->mohs_hardness;
    }

    // Render Method
    public function render()
    {
        return view('livewire.meli-er', [
            // Gunakan eager loading (with('uri')) untuk memuat nama grup
            'melis' => Meli::with('uri')->get(),
            // Kirim daftar grup ke view untuk dropdown
            'uris' => MeliUri::orderBy('name')->get(), 
        ]);
    }

    // Method untuk D (Delete)
    public function delete($meliId)
    {
        if (! Auth::check()) {
        return redirect()->route('login');
        }
        
        Meli::destroy($meliId);
        session()->flash('success', 'Meli berhasil dihapus.');
    }
}
