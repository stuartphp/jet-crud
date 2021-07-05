<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;

class CategoriesChild extends Component
{

    protected $listeners = [
        'showDeleteForm',
        'showCreateForm',
        'showEditForm',
    ];
    public $item;

    protected $rules = [
        'item.attela_reference' => '',
        'item.created_by' => 'required',
        'item.trading_name' => 'required|min:3',
        'item.registered_as' => '',
        'item.registration_number' => '',
        'item.vat_number' => '',
        'item.contact_name' => 'required',
        'item.contact_number' => 'required',
        'item.email' => 'required',
        'item.physical_address' => 'required',
        'item.postal_address' => 'required',
        'item.domain' => '',
        'item.url_contact_us' => '',
        'item.url_terms_and_conditions' => '',
        'item.url_privacy_policy' => '',
        'item.slogan' => '',
        'item.document_logo' => '',
        'item.website_logo' => '',
    ];

    protected $validationAttributes = [
        'item.attela_reference' => 'AttelaReference',
        'item.created_by' => 'CreatedBy',
        'item.trading_name' => 'TradingName',
        'item.registered_as' => 'RegisteredAs',
        'item.registration_number' => 'RegistrationNumber',
        'item.vat_number' => 'VatNumber',
        'item.contact_name' => 'ContactName',
        'item.contact_number' => 'ContactNumber',
        'item.email' => 'Email',
        'item.physical_address' => 'PhysicalAddress',
        'item.postal_address' => 'PostalAddress',
        'item.domain' => 'Domain',
        'item.url_contact_us' => 'UrlContactUs',
        'item.url_terms_and_conditions' => 'UrlTermsAndConditions',
        'item.url_privacy_policy' => 'UrlPrivacyPolicy',
        'item.slogan' => 'Slogan',
        'item.document_logo' => 'DocumentLogo',
        'item.website_logo' => 'WebsiteLogo',
    ];

    public $confirmingItemDeletion = false;
    public $primaryKey;
    public $confirmingItemCreation = false;
    public $confirmingItemEdition = false;

    public function render()
    {
        return view('livewire.admin.categories-child');
    }

    public function showDeleteForm($id)
    {
        $this->confirmingItemDeletion = true;
        $this->primaryKey = $id;
        $this->dispatchBrowserEvent('modal', ['modal'=>'delModal', 'action'=>'show']);
    }

    public function deleteItem()
    {
        Category::destroy($this->primaryKey);
        $this->dispatchBrowserEvent('modal', ['modal'=>'delModal', 'action'=>'hide']);
        $this->primaryKey = '';
        $this->reset(['item']);
        $this->emitTo('product-units', 'refresh');
    }

    public function showCreateForm()
    {
        $this->dispatchBrowserEvent('modal', ['modal'=>'addModal', 'action'=>'show']);
        $this->resetErrorBag();
        $this->reset(['item']);
    }

    public function createItem()
    {
        $this->validate();
        Category::create([
            'company_id' => $this->item['company_id'],
            'name' => $this->item['name'],
        ]);
        $this->dispatchBrowserEvent('modal', ['modal'=>'addModal', 'action'=>'hide']);
        $this->emitTo('product-units', 'refresh');
    }

    public function showEditForm(Category $item)
    {
        $this->resetErrorBag();
        $this->item = $item;
        $this->dispatchBrowserEvent('modal', ['modal'=>'editModal', 'action'=>'show']);
    }

    public function editItem()
    {
        $this->validate();
        $this->item->save();
        $this->dispatchBrowserEvent('modal', ['modal'=>'editModal', 'action'=>'hide']);
        $this->primaryKey = '';
        $this->emitTo('product-units', 'refresh');
    }
}
