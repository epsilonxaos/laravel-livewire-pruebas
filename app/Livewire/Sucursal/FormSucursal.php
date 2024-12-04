<?php

namespace App\Livewire\Sucursal;

use App\Models\Sucursal;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class FormSucursal extends Component
{

	use WithFileUploads;

	public $mode = "create";
	public $dataID;
	public $originalData;
	public $formData = [
		'name' => '',
		'cover' => '',
		'description' => '',
		'address' => '',
		'phone' => '',
		'email' => '',
		'status' => 1,
	];

	protected $rules = [
		'formData.name' => 'required',
		'formData.description' => 'required',
		'formData.cover' => '',
		'formData.address' => 'required',
		'formData.phone' => 'required|integer',
		'formData.email' => 'required|email',
	];

	protected function getRuless()
	{
		$rules = $this->rules;
		$rules['formData.cover'] = $this->mode === 'create' ? 'required|image|max:1024' : 'nullable|max:1024';
		return $rules;
	}

	public function mount($id = null)
	{
		if ($id) {
			$this->mode = "edit";
			$this->dataID = $id;
			$this->loadData();
		}
	}

	public function loadData()
	{
		$sucursal = Sucursal::find($this->dataID);

		$this->originalData = $sucursal;
		$this->formData = [
			'name' => $sucursal->name,
			'cover' => $sucursal->cover,
			'description' => $sucursal->description,
			'address' => $sucursal->address,
			'phone' => $sucursal->phone,
			'email' => $sucursal->email,
			'status' => $sucursal->status,
		];
	}

	public function save()
	{
		$this->validate($this->getRuless());

		if ($this->formData['cover'] && ($this->mode == "create" || $this->formData['cover'] !== $this->originalData->cover)) {

			if ($this->mode !== "create" && $this->formData['cover'] !== $this->originalData->cover && File::exists($this->originalData->cover)) {
				File::delete($this->originalData->cover);
			}

			$ruta = $this->formData['cover']->store('covers', 'public');
			$this->formData['cover'] = 'storage/' . $ruta;
		}

		if ($this->mode == "create") {
			Sucursal::create($this->formData);
		} else {
			$data = Sucursal::findOrFail($this->dataID);
			$data->update($this->formData);
		}

		flash()->success($this->mode === 'create' ? 'Recurso creado con éxito.' : 'Recurso actualizado con éxito.');

		return redirect()->route('sucursales.index');
	}

	public function render()
	{
		return view('livewire.sucursal.form-sucursal');
	}
}
